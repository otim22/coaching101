<?php

namespace App\Traits;

use Illuminate\Support\Facades\Auth;

trait PresentsSubject
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
