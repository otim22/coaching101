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
