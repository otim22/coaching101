<?php

namespace App\Traits;

use Illuminate\Support\Facades\Auth;

trait PresentsItem
{
    public function getIsSubscribedToAttribute()
    {
        return $this->subscription()->where('user_id', Auth::id())->exists();
    }

    public function getSubscriptionCountAttribute()
    {
        return $this->subscription()->count();
    }

    public function getFormatPriceAttribute()
    {
        return number_format($this->price);
    }

    public function getFormatPriceDecimalAttribute()
    {
        return rtrim(rtrim(number_format($this->price, 2), 2), '.');
    }

    public function getTitleAttribute($value)
    {
        return ucfirst($value);
    }

    public function getSubtitleAttribute($value)
    {
        return ucfirst($value);
    }
}
