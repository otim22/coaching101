<?php

namespace App\Http\Livewire;

use App\Models\Topic;
use Livewire\Component;

class VideoPlayer extends Component
{
    public $topic;

    public function mount($topic)
    {
        $this->topic = $topic;
    }

    public function render()
    {
        return view('livewire.video-player');
    }
}
