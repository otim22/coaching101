<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Wishlist;
use App\Models\Subscription;
use Illuminate\Support\Facades\Auth;

class MySubjectsContent extends Component
{
    public function render()
    {
        return view('livewire.my-subjects-content', [
            'subjects' => Subscription::where(['user_id' => Auth::id(), 'subscriptionable_type' => 'App\Models\ItemContent'])->get()->paginate(12),
            'books' => Subscription::where(['user_id' => Auth::id() , 'subscriptionable_type' => 'App\Models\ItemContent'])->get()->paginate(12),
            'notes' => Subscription::where(['user_id' => Auth::id() , 'subscriptionable_type' => 'App\Models\ItemContent'])->get()->paginate(12),
            'wishlistItems' => Wishlist::where('user_id', Auth::id())->get()->paginate(12),
        ]);
    }
}
