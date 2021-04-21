<?php

namespace App\Http\Livewire;

use App\Models\Item;
use Livewire\Component;
use App\Models\Wishlist;
use App\Models\Subscription;
use App\Models\ItemContent;
use Illuminate\Support\Facades\Auth;

class MySubjectsContent extends Component
{
    public function render()
    {
        return view('livewire.my-subjects-content', $this->renderData());
    }

    protected function renderData() {
        $data = [
            'wishlistItems' => $this->wishListData(),
            'items' => $this->getItems()
        ];

        return array_merge($this->getSubscribedItems(), $data);
    }

    protected function wishListData() {
        return Wishlist::where('user_id', Auth::id())->get()->paginate(12);
    }

    protected function getItems() {
        return Item::get();
    }

    protected function getItemContent($id) {
        return ItemContent::whereIn('id',
            Subscription::select('subscriptionable_id')->where(['user_id' => Auth::id()])
        )->where(['item_id' => $id])->paginate(12);
    }


    protected function getSubscribedItems() {
        $items = $this->getItems();
        $data = [];
        foreach($items as $item) {
            $key = strtolower($item->name . 's');
            $data[$key] = $this->getItemContent($item->id);
        }
        return $data;
    }
}
