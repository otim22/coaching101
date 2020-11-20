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

    public function addToCart(int $subjectId): void
    {
        $cartFacade = new CartFacade;
        $cartFacade->add(Subject::where('id', $subjectId)->first());

        $this->emit('subjectAdded');
    }
}
