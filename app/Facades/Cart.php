<?php

namespace App\Facades;

use App\Models\ItemContent;

class Cart
{
    public function __construct()
    {
        if($this->get() === null)
            $this->set($this->empty());
    }

    public function add(ItemContent $subject): void
    {
        $cart = $this->get();

        if(!array_key_exists($subject->id, $cart['subjects'])) {
            $cart['subjects'][$subject->id] = $subject;

            $this->set($cart);
        }
    }

    public function remove(int $subjectId): void
    {
        $cart = $this->get();
        $cart['subjects'] = array_filter($cart['subjects'], function ($value) use ($subjectId) {
            return !($subjectId == $value->id);
        });
        $this->set($cart);
    }

    public function clear(): void
    {
        $this->set($this->empty());
    }

    public function empty(): array
    {
        return [
            'subjects' => [],
        ];
    }

    public function get(): ?array
    {
        return request()->session()->get('cart');
    }

    private function set($cart): void
    {
        request()->session()->put('cart', $cart);
    }
}
