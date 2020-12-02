<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use App\Models\Wishlist;
use Livewire\Component;

class AddToWishList extends Component
{
    public $subject = [];

    public function mount($subject)
    {
        $this->subject = $subject;
    }

    public function render()
    {
        return view('livewire.add-to-wish-list');
    }

    public function addToWishlist(int $subjectId)
    {
        if(Auth::user()) {
            $status = Wishlist::where('user_id', Auth::id())
                                                ->where('subject_id', $subjectId)
                                                ->first();

            if(isset($status->user_id) && isset($subjectId)) {
                return redirect()->back()->with('flash_messaged', 'This subject is already in your wishlist!');
            } else {
                Wishlist::create([
                    'user_id' => Auth::id(),
                    'subject_id' => $subjectId
                ]);
           }
        } else {
            redirect('/login');
        }
    }
}
