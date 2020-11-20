<?php

namespace App\Http\Livewire;

use App\Facades\Cart as CartFacade;
use Illuminate\View\View;
use App\Models\Subject;
use Livewire\Component;

class Cart extends Component
{
    public $cartTotal = 0;
    public $cartItems = [];

    protected $listeners = [
        'goToCart' => 'getSubjects',
        'subjectRemoved' => 'updateCartTotal',
        'clearCart' => 'updateCartTotal'
    ];

    public function mount(): void
    {
        $cartFacade = new CartFacade;

        $this->cartTotal = count($cartFacade->get()['subjects']);

        $this->cartItems = $cartFacade->get()['subjects'];
    }

    public function render()
    {
        return view('livewire.cart');
    }

    public function updateCartTotal(): void
    {
        $cartFacade = new CartFacade;

        $this->cartTotal = count($cartFacade->get()['subjects']);

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
}
