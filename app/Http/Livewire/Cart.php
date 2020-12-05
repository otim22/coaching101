<?php

namespace App\Http\Livewire;

use Illuminate\View\View;
use App\Models\Subject;
use App\Models\Wishlist;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Facades\Cart as CartFacade;

class Cart extends Component
{
    public $cartItemTotal = 0;
    public $sum = 0;
    public $cartItems = [];
    public $wishlistItems = [];

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
        $cartFacade = new CartFacade;
        $this->cartItemTotal = count($cartFacade->get()['subjects']);
        $this->cartItems = $cartFacade->get()['subjects'];

        $this->wishlistItems = Wishlist::where('user_id', Auth::id())->get();

        foreach ($this->cartItems as $cartItem) {
            $this->sum = $this->sum + $cartItem->price;
        }
        return $this->sum;
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
        $subject = Subject::findOrFail($subjectId);

        $this->sum += $subject->price;

        return $this->sum;
    }

    public function calculateCartDeduction($subjectId)
    {
        $subject = Subject::findOrFail($subjectId);

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

    public function checkout(): void
    {
        $cartFacade = new CartFacade;
        $cartFacade->clear();
        $this->emit('clearCart');
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

        foreach ($this->cartItems as $cartItem) {
            if (($cartItem->id === $subjectId)) {
                return redirect()->back()->with('flash_messaged', 'This subject is already in your cart!');
            }
        }

        $cartFacade->add(Subject::where('id', $subjectId)->first());

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
                                                ->where('subject_id', $subjectId)
                                                ->first();

            if(isset($status->user_id) && isset($subjectId)) {
                return redirect()->back()->with('flash_messaged', 'This subject is already in your wishlist!');
            } else {
                Wishlist::create([
                    'user_id' => Auth::id(),
                    'subject_id' => $subjectId
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
        $wishlist = Wishlist::where('subject_id', $subjectId);
        $wishlist->delete();
        $this->emit('updateWishlist');
    }
}
