<?php

namespace App\Http\Livewire;

use App\Models\Note;
use Livewire\Component;

class BuyNote extends Component
{
    public $note = [];

    public function mount($note)
    {
        $this->note = $note;
    }

    public function render()
    {
        return view('livewire.buy-note');
    }
}
