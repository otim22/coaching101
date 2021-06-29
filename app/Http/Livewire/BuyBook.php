<?php

namespace App\Http\Livewire;

use App\Models\Book;
use Livewire\Component;

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
}
