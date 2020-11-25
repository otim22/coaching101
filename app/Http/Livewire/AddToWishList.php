<?php

namespace App\Http\Livewire;

use Auth;
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
        $status = Wishlist::where('user_id', Auth::user()->id)
                                                ->where('subject_id', $subjectId)
                                                ->first();
        if(isset($status->user_id) && isset($request->product_id)) {
            return redirect()->back()->with('flash_messaged', 'This item is already in your wishlist!');
       } else {
            Wishlist::create([
                'user_id' => Auth::user()->id,
                'subject_id' => $subjectId
            ]);
       }
    }
}
