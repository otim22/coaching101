<?php

namespace App\Http\Livewire;

use Auth;
use App\Facades\Cart as CartFacade;
use Illuminate\View\View;
use App\Models\Subject;
use App\Models\Wishlist;
use Livewire\Component;

class Cart extends Component
{
    public $cartItemTotal = 0;
    public $cartItems = [];
    public $wishlistItems = [];

    protected $listeners = [
        'goToCart' => 'getSubjects',
        'subjectRemoved' => 'updateCartTotal',
        'clearCart' => 'updateCartTotal',
        'wishlistSubjectRemoved' => 'updateWishlist'
    ];

    public function mount(): void
    {
        $cartFacade = new CartFacade;

        $this->cartItemTotal = count($cartFacade->get()['subjects']);

        $this->cartItems = $cartFacade->get()['subjects'];

        $this->wishlistItems = Wishlist::where('user_id', Auth::user()->id)->get();
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

    public function removeFromCart($subjectId): void
    {
        $cartFacade = new CartFacade;

        $cartFacade->remove($subjectId);

        $this->cart = $cartFacade->get();

        $this->emit('subjectRemoved');
    }

    public function getSubjects()
    {
        $cartFacade = new CartFacade;

        $this->cartItems = $cartFacade->get();
    }

    public function checkout(): void
    {
        $cartFacade = new CartFacade;

        $cartFacade->clear();

        $this->emit('clearCart');

        $this->cart = $cartFacade->get();
    }

    public function wishlistSubjectRemoved(): void
    {
        dd('Listening');
        $this->wishlistItems = Wishlist::where('user_id', Auth::user()->id)->get();
    }

    public function removeFromWishlist($id): void
    {
        $wishlist = Wishlist::findOrFail($id);
        $wishlist->delete();

        $this->emit('updateWishlist');
    }
}
