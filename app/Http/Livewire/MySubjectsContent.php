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
            'subjects' => Subscription::where('user_id', Auth::id())->get()->paginate(12),
            'wishlistItems' => Wishlist::where('user_id', Auth::id())->get()->paginate(12),
        ]);
    }
}
