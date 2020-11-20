<?php

namespace App\Http\Livewire;

use Livewire\Component;

class AddToWishList extends Component
{
    public $subject = [];

    public function mount($subject)
    {
        $this->subject = $subject;
    }
    
    public function render()
    {
        return view('livewire.add-to-wish-list');
    }
}
