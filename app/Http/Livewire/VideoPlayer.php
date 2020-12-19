<?php

namespace App\Http\Livewire;

use App\Models\Topic;
use Livewire\Component;

class VideoPlayer extends Component
{
    public $subject;
    public $topic;
    public $next;
    public $previous;

    public function mount($subject, $topic, $next, $previous)
    {
        $this->topic = $topic;

        $this->previous = Topic::where('id', '<', $topic->id)->orderBy('id', 'desc')->first();
        $this->next  = Topic::where('id', '>', $topic->id)->orderBy('id')->first();
    }

    public function render()
    {
        return view('livewire.video-player');
    }

    public function nextItem()
    {

        $this->topic = Topic::where('id', '>', $this->topic->id)->orderBy('id')->first();
        dd($this->topic);
    }

    public function previousItem()
    {
        $this->previous = Topic::where('id', '<', $topic->id)->orderBy('id', 'desc')->first();
    }
}
