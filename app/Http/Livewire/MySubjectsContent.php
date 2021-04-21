<?php

namespace App\Http\Livewire;

use App\Models\Item;
use Livewire\Component;
use App\Models\Wishlist;
use App\Models\Subscription;
use Illuminate\Support\Facades\Auth;

class MySubjectsContent extends Component
{
    public function render()
    {
        return view('livewire.my-subjects-content', [
            'subjects' => Subscription::join('item_contents', function ($join) {
                $join->on('subscriptions.subscriptionable_id', '=', 'item_contents.id')
                        ->where('item_contents.item_id', '=', 1);
            })->get()->paginate(12),
            'books' => Subscription::join('item_contents', function ($join) {
                $join->on('subscriptions.subscriptionable_id', '=', 'item_contents.id')
                        ->where('item_contents.item_id', '=', 2);
            })->get()->paginate(12),
            'notes' => Subscription::join('item_contents', function ($join) {
                $join->on('subscriptions.subscriptionable_id', '=', 'item_contents.id')
                        ->where('item_contents.item_id', '=', 3);
            })->get()->paginate(12),
            'pastpapers' => Subscription::join('item_contents', function ($join) {
                $join->on('subscriptions.subscriptionable_id', '=', 'item_contents.id')
                        ->where('item_contents.item_id', '=', 4);
            })->get()->paginate(12),
            'wishlistItems' => Wishlist::where('user_id', Auth::id())->get()->paginate(12),
            'items' => Item::get(),
        ]);
    }
}
