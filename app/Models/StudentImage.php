<?php

namespace App\Models;

use App\Traits\PresentsText;
use App\Traits\PresentsMedia;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class StudentImage extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia, PresentsMedia, PresentsText;

    protected $fillable = ['title', 'description', 'button_text'];
    protected $with = ['media'];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('default')->singleFile();
    }

    /**
     * @param Media|null $media
     * @throws \Spatie\Image\Exceptions\InvalidManipulation
     */
    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('default')
                ->fit(Manipulations::FIT_CONTAIN, 800, 600)
                ->nonQueued();

        $this->addMediaConversion('thumb')
                ->setManipulations(['w' => 368, 'h' => 232, 'sharp'=> 20])
                ->nonQueued();
    }
}
