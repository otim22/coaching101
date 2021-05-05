<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\ItemContent;
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

        // Checks for duplication in the cart otherwise add subject to cart
        if(! empty($this->cartItems)) {
            foreach ($this->cartItems as $cartItem) {
                if ($cartItem->id === $subjectId) {
                    return redirect()->back()->with('flash_messaged', 'This item is already in your cart!');
                }
            }
        }

        // dd(ItemContent::where('id', $subjectId)->first());
        $cartFacade->add(ItemContent::where('id', $subjectId)->firstOrFail());

        $this->emit('itemAdded');
        $this->emit('cartSumUpdate');
    }
}
