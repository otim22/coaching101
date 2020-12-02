<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Subject;
use App\Facades\Cart as CartFacade;

class AddToCart extends Component
{
    public $subject = [];

    public function mount($subject)
    {
        $this->subject = $subject;
    }

    public function render()
    {
        return view('livewire.add-to-cart');
    }

    public function addToCart(int $subjectId)
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
    }
}
