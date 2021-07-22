<?php

namespace App\Http\Livewire;

use Illuminate\View\View;
use App\Models\Wishlist;
use Livewire\Component;
use App\Models\Currency;
use App\Models\Standard;
use App\Models\ItemContent;
use App\Helpers\SessionWrapper;
use Illuminate\Support\Facades\Auth;
use App\Facades\Cart as CartFacade;
use App\Helpers\ProcessPayment as Payment;

class Cart extends Component
{
    public $cartItemTotal = 0;
    public $sum = 0;
    public $cartItems = [];
    public $wishlistItems = [];
    public $cardDetails = [];
    public $response = [];
    public $currency = '';

    protected $listeners = [
        'goToCart' => 'getItems',
        'itemAdded' => "getItems",
        'itemRemoved' => 'getItems',
        'clearCart' => 'getItems',
        'itemTotalUpdate' => 'updateItemTotal',
        'cartSumUpdate' => 'calculateCartSum',
        'cartDeduction' => 'calculateCartDeduction',
        'itemRemovedFromCart' => 'removeItemFromCart',
        'updateWishlist' => 'wishlistItemUpdate',
        'itemRemovedFromWishlist' => 'deleteFromWishlist'
    ];

    public function mount()
    {
        $this->currency = $this->getCurrency()->name;
        $cartFacade = new CartFacade;
        $this->cartItemTotal = count($cartFacade->get()['subjects']);
        $this->cartItems = $cartFacade->get()['subjects'];
        $this->wishlistItems = Wishlist::where('user_id', Auth::id())->get();

        foreach ($this->cartItems as $cartItem) {
            $this->sum += $cartItem->price;
        }

        if (count($this->response) > 0) {
            $this->updatedPaymentInfo($this->response[0]);
        }

        return $this->sum;
    }

    public function updatedPaymentInfo($value)
    {
        $this->response = $value;
    }

    public function render()
    {
        return view('livewire.cart');
    }

    public function updateItemTotal(): void
    {
        $cartFacade = new CartFacade;
        $this->cartItemTotal = count($cartFacade->get()['subjects']);
        $this->cartItems = $cartFacade->get()['subjects'];
    }

    public function calculateCartSum($subjectId)
    {
        $subject = ItemContent::where('id', $subjectId)->firstOrFail();
        $this->sum += $subject->price;
        return $this->sum;
    }

    public function calculateCartDeduction($subjectId)
    {
        $subject = ItemContent::findOrFail($subjectId);
        $this->sum -= $subject->price;
        return $this->sum;
    }

    public function removeFromCart($subjectId): void
    {
        $cartFacade = new CartFacade;
        $cartFacade->remove($subjectId);
        $this->cart = $cartFacade->get();
        $this->emit('itemRemoved');
        $this->emit('cartDeduction', $subjectId);
    }

    public function getItems(): void
    {
        $cartFacade = new CartFacade;
        $this->cartItems = $cartFacade->get()['subjects'];
        $this->emit('itemTotalUpdate');
    }

    public function checkout()
    {
        if(Auth::check()) {
            $data = array_merge($this->setPaymentDefaults(), [
                "payment_options" => "card",
                "card_number" => $this->cardDetails['number'],
                "cvv" => $this->cardDetails['cvv'],
                "expiry_month" => $this->cardDetails['expiryMonth'],
                "expiry_year" => $this->cardDetails['expiryYear'],
                "phone_number" => Auth::user()->profile->phone,
                "fullname" => Auth::user()->name,
                "customizations" => [
                    "title" => "onCloudLearning Payments",
                    "description" => "Your transaction is secure with us.",
                    "logo" => "https://assets.piedpiper.com/logo.png"
                ]
            ]);

            $payment = new Payment($data, config('app.flutterwave_url'));
            $response = $payment->cardPayment();
            $data = json_decode($response->body(), true);

            if ($response->successful()) {
                $status = $response['data']['status'];

                if ($status == 'successful' || $status == 'pending') {
                    $this->clearCart();
                }

                if($status == 'pending') {
                    $this->emit('onPending', $data);
                } else {
                    $this->emit('onSuccess', $data);
                }
            }

            if ($data['status'] == 'error') {
                $this->emit('onError', $data);
            }
        }
    }

    public function proccessMobileMoney($data)
    {
        if(Auth::check()) {
            $data = array_merge($this->setPaymentDefaults(), [
                "network" => strtoupper($data['network']),
                "phone_number" => $data['phoneNumber']
            ]);
            $payment = new Payment($data, $this->url);
            $response = $payment->mobileMoney();
            $data = json_decode($response->body(), true);
            if ($response->successful()) {
                $this->emit('onSuccess', $data);
                $this->clearCart();
            }
            if ($data['status'] == 'error') {
                $this->emit('onError', $data);
            }
        }
    }

    private function setPaymentDefaults() {
        $user = Auth::user();
        $paymentToken = 'REF-' . 'TX-'. time() . '-' . $user->id;
        $itemCurrency = $this->currency;
        $userEmail = $user->email;
        $cartSum = $this->sum;
        $redirectLink = config('app.redirect_link');

        return [
            "tx_ref" => $paymentToken,
            "amount"=> $cartSum,
            "currency"=> $itemCurrency,
            "redirect_url" => $redirectLink,
            "email" => $userEmail,
            "meta" => [
                "consumer_id" => Auth::id()
            ]
        ];
    }

    private function getCurrency()
    {
        $activeStandard = Standard::where('id', SessionWrapper::getStandardId())->first();
        $currency = $activeStandard->name == 'Cambridge' ? 'USD' : 'UGX';
        return Currency::where('name', $currency)->first();
    }

    public function clearCart() {
        $cartFacade = new CartFacade;
        $this->cartItems = $cartFacade->get()['subjects'];

        foreach($this->cartItems as $item) {
            $item->subscribe();
        }

        $cartFacade->clear();
        $this->emit('clearCart');
        $this->sum = 0;
        $this->cart = $cartFacade->get();
    }

    public function wishlistItemUpdate(): void
    {
        $this->wishlistItems = Wishlist::where('user_id', Auth::id())->get();
    }

    public function addToCart($subjectId)
    {
        $cartFacade = new CartFacade;
        $this->cartItems = $cartFacade->get()['subjects'];

        if(!empty($this->cartItems)) {
            foreach ($this->cartItems as $cartItem) {
                if (($cartItem->id === $subjectId)) {
                    return redirect()->back()->with('messaged', 'This subject is already in your cart!');
                }
            }
        }

        $cartFacade->add(ItemContent::where('id', $subjectId)->first());
        $this->emit('itemAdded');
        $this->emit('cartSumUpdate', $subjectId);
        $this->emit('itemRemovedFromWishlist', $subjectId);
    }

    public function removeItemFromCart($subjectId): void
    {
        $cartFacade = new CartFacade;
        $cartFacade->remove($subjectId);
        $this->emit('itemRemoved');
        $this->emit('updateWishlist');
    }

    public function addToWishlist(int $subjectId)
    {
        if(Auth::check()) {
            $status = Wishlist::where('user_id', Auth::id())
                                                ->where('item_content_id', $subjectId)
                                                ->first();

            if(isset($status->user_id) && isset($subjectId)) {
                return redirect()->back()->with('flash_messaged', 'This subject is already in your wishlist!');
            } else {
                Wishlist::create([
                    'user_id' => Auth::id(),
                    'item_content_id' => $subjectId
                ]);

                $this->emit('updateWishlist');
                $this->emit('cartDeduction', $subjectId);
                $this->emit('itemRemovedFromCart', $subjectId);
           }
        } else {
            return redirect('/login');
        }
    }

    public function removeFromWishlist($subjectId): void
    {
        $wishlist = Wishlist::findOrFail($subjectId);
        $wishlist->delete();
        $this->emit('updateWishlist');
    }

    public function deleteFromWishlist($subjectId): void
    {
        $wishlist = Wishlist::where('item_content_id', $subjectId);
        $wishlist->delete();
        $this->emit('updateWishlist');
    }
}
