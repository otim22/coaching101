<?php

namespace App\Facades;

use App\Models\Topic;
use App\Models\Subject;

class VideoPlayer
{
    public function __construct()
    {
        if($this->get() === null)
            $this->set($this->empty());
    }

    public function next(Topic $topic): void
    {
        $player= $this->get();

        if(!array_key_exists($topic->id, $player['playlist'])) {
            $player['playlist'][$topic->id] = $topic;

            $this->set($player);
        }
    }

    public function previous(Topic $topic): void
    {
        $player = $this->get();

        array_splice($cart['subjects'], array_search($subjectId, array_column($cart['subjects'], 'id')), 1);

        $this->set($cart);
    }

    public function clear(): void
    {
        $this->set($this->empty());
    }

    public function empty(): array
    {
        return [
            'playlist' => [],
        ];
    }

    public function get(): ?array
    {
        return request()->session()->get('topic');
    }

    private function set($cart): void
    {
        request()->session()->put('topic', $cart);
    }
}
