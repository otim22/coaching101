<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Http\Request;

class BuyBook extends Component
{
    public $book = [];

    public function mount($book)
    {
        $this->book = $book;
    }

    public function render()
    {
        return view('livewire.buy-book');
    }

    public function checkout($book): void
    {
        dd($book);
    }
}
