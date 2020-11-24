<?php

namespace App\Http\Livewire;

use App\Facades\Cart as CartFacade;
use Illuminate\View\View;
use App\Models\Subject;
use Livewire\Component;

class NavCart extends Component
{
    public $cartItemTotal = 0;

    protected $listeners = [
        'subjectAdded' => 'updateCartTotal',
        'subjectRemoved' => 'updateCartTotal',
        'clearCart' => 'updateCartTotal'
    ];

    public function mount(): void
    {
        $cartFacade = new CartFacade;

        $this->cartItemTotal = count($cartFacade->get()['subjects']);
    }

    public function render()
    {
        return view('livewire.nav-cart');
    }

    public function updateCartTotal(): void
    {
        $cartFacade = new CartFacade;

        $this->cartItemTotal = count($cartFacade->get()['subjects']);
    }
}
