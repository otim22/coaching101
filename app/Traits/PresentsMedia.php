<?php

namespace App\Traits;

trait PresentsMedia
{
    public function getCoverImageAttribute()
    {
        if($this->getFirstMediaImage('videos')) {
            return $this->getFirstMediaImage('videos');
        }
        if($this->getFirstMediaImage('cover_images')) {
            return $this->getFirstMediaImage('cover_images');
        }
        if($this->getFirstMediaImage('books')) {
            return $this->getFirstMediaImage('books');
        }
        if($this->getFirstMediaImage('notes')) {
            return $this->getFirstMediaImage('notes');
        }
        if($this->getFirstMediaImage('pastpapers')) {
            return $this->getFirstMediaImage('pastpapers');
        }
    }

    public function getImageThumbAttribute()
    {
        if($this->getFirstMediaImage('subjects')) {
            return $this->getFirstMediaImage('thumb');
        }
        if($this->getFirstMediaImage('books')) {
            return $this->getFirstMediaImage('thumb');
        }
        if($this->getFirstMediaImage('cover_images')) {
            return $this->getFirstMediaImage('thumb');
        }
    }

    public function getDefaultImageAttribute()
    {
        return '/images/no-image.jpeg';
    }

    protected function getFirstMediaImage(string $mediaCollection = 'default')
    {
        $imgPath = $this->getFirstMediaUrl($mediaCollection);

        return ! empty($imgPath) ? $imgPath : $this->default_image;
    }
}
