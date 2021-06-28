<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use App\Models\Wishlist;
use Livewire\Component;
use App\Facades\Cart as CartFacade;

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

    protected function removeFromCart($subjectId): void
    {
        $cartFacade = new CartFacade;
        $cartFacade->remove($subjectId);
    }

    public function addToWishlist(int $subjectId)
    {
        if(Auth::check()) {
            $status = Wishlist::where('user_id', Auth::id())
                                                ->where('item_content_id', $subjectId)
                                                ->first();

            if(isset($status->user_id) && isset($subjectId)) {
                return redirect()->back()->with('flash_messaged', 'This subject is already in your wishlist!');
            } else {
                Wishlist::create([
                    'user_id' => Auth::id(),
                    'item_content_id' => $subjectId
                ]);
                $this->removeFromCart($subjectId);
                $this->emit('itemAdded');
           }
        } else {
            redirect('/login');
        }
    }
}
