<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Pastpaper;

class BuyPastpaper extends Component
{
    public $pastpaper = [];

    public function mount($pastpaper)
    {
        $this->pastpaper = $pastpaper;
    }

    public function render()
    {
        return view('livewire.buy-pastpaper');
    }
}
