<?php

namespace App\Traits;

use Illuminate\Support\Str;

trait PresentsTopic
{
    public function getShortTitleAttribute()
    {
        return Str::limit($this->title, 15);
    }

    public function getMediumShortTitleAttribute()
    {
        return Str::limit($this->title, 25);
    }

    public function getSnippetAttribute()
    {
        return Str::limit($this->title, 50);
    }
}
