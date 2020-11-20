<?php

namespace App\Facades;

use App\Models\Subject;

class Cart
{
    public function __construct()
    {
        if($this->get() === null)
            $this->set($this->empty());
    }

    public function add(Subject $subject): void
    {
        $cart = $this->get();
        array_push($cart['subjects'], $subject);
        $this->set($cart);
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
