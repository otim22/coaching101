<?php

namespace App\Models;

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
}
