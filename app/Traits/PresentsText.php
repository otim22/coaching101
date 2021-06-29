<?php

namespace App\Traits;

use Illuminate\Support\Str;

trait PresentsText
{
    public function getExtraVeryShortTitleAttribute()
    {
        return Str::limit($this->title, 15);
    }

    public function getVeryShortTitleAttribute()
    {
        return Str::limit($this->title, 20);
    }

    public function getShortTitleAttribute()
    {
        return Str::limit($this->title, 45);
    }

    public function getMediumSnippetAttribute()
    {
        return Str::limit($this->title, 50);
    }

    public function getDescriptionSnippetAttribute()
    {
        return Str::limit($this->description, 70);
    }

    public function getSnippetAttribute()
    {
        return Str::limit($this->title, 100);
    }
}
