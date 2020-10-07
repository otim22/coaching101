<?php

namespace App\Traits;

trait PresentsMedia
{
    public function getCoverImageAttribute()
    {
        return $this->getFirstMediaImage('default');
    }

    public function getCoverImageThumbAttribute()
    {
        return $this->getFirstMediaImage('thumb');
    }

    public function getDefaultImageAttribute()
    {
        return '/images/no-image.jpeg';
    }

    protected function getFirstMediaImage(string $conversion, string $mediaCollection = 'default')
    {
        $imgPath = $this->getFirstMediaUrl($mediaCollection, $conversion);

        return ! empty($imgPath) ? $imgPath : $this->default_image;
    }
}
