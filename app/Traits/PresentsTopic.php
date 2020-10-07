<?php

namespace App\Traits;

use Illuminate\Support\Str;

trait PresentsTopic
{
    public function getShortTitleAttribute()
    {
        return Str::limit($this->content_title, 20);
    }

    public function getSnippetAttribute()
    {
        return Str::limit($this->content_title, 50);
    }
}
