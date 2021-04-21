<?php

namespace App\Models;

use App\Models\ItemContent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * Get the parent subscriptionable model (subject or book).
     */
    public function subscriptionable()
    {
        return $this->morphTo();
    }

    /** Gets request item either subject, book, notes, pastpaper */
    public function filterItemContent($itemContent)
    {
        return ItemContent::where('id', $itemContent->subscriptionable_id)->get();
    }
}
