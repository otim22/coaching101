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
        'itemRemoved' => 'getItems',
        'cartTotalUpdate' => 'updateCartTotal',
        'itemAdded' => "getItems",
        'clearCart' => 'getItems',
        'updateWishlist' => 'wishlistItemUpdate',
        'itemRemovedFromWishlist' => 'deleteFromWishlist'
    ];

    public function mount(): void
    {
        $cartFacade = new CartFacade;
        $this->cartItemTotal = count($cartFacade->get()['subjects']);
        $this->cartItems = $cartFacade->get()['subjects'];
        $this->sum = $this->calculateCartSum();
    }

    public function render()
    {
        return view('livewire.cart');
    }

    public function updateCartTotal(): void
    {
        $cartFacade = new CartFacade;
        $this->cartItemTotal = count($cartFacade->get()['subjects']);
        $this->cartItems = $cartFacade->get()['subjects'];
    }

    public function calculateCartSum()
    {
        $cartFacade = new CartFacade;
        $this->cartItemTotal = count($cartFacade->get()['subjects']);
        $this->cartItems = $cartFacade->get()['subjects'];

        foreach ($this->cartItems as $cartItem) {
            $this->sum += $cartItem->price;
        }

        return $this->sum;
    }

    public function removeFromCart($subjectId): void
    {
        $cartFacade = new CartFacade;
        $cartFacade->remove($subjectId);
        $this->cart = $cartFacade->get();
        $this->emit('itemRemoved');
    }

    public function getItems()
    {
        $cartFacade = new CartFacade;
        $this->cartItems = $cartFacade->get()['subjects'];
        $this->emit('cartTotalUpdate');
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
        $this->emit('updateWishlist');
        $this->emit('itemRemovedFromWishlist', $subjectId);
    }

    public function addToWishlist(int $subjectId)
    {
        if(Auth::user()) {
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
                $this->removeFromCart($subjectId);
           }
        } else {
            redirect('/login');
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
