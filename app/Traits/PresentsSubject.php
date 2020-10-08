<?php

namespace App\Traits;

use Illuminate\Support\Str;

trait PresentsSubject
{
    public function getShortTitleAttribute()
    {
        return Str::limit($this->title, 45);
    }

    public function getSnippetAttribute()
    {
        return Str::limit($this->title, 100);
    }
}
