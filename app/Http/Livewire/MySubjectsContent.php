<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;
use App\Models\Subscription;

class MySubjectsContent extends Component
{
    public function render()
    {
        return view('livewire.my-subjects-content', [
            'subjects' => Subscription::where(['user_id' => Auth::id(), 'subscriptionable_type' => 'App\Models\Subject'])->get()->paginate(12),
            'books' => Subscription::where(['user_id' => Auth::id() , 'subscriptionable_type' => 'App\Models\Book'])->get()->paginate(12),
            'notes' => Subscription::where(['user_id' => Auth::id() , 'subscriptionable_type' => 'App\Models\Note'])->get()->paginate(12),
            'wishlistItems' => Wishlist::where('user_id', Auth::id())->get()->paginate(12),
        ]);
    }
}
