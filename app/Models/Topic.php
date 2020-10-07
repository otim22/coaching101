<?php

namespace App\Models;

use App\Traits\PresentsTopic;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Topic extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia, PresentsTopic;

    protected $fillable = [
        'content_title', 'content_description'
    ];

    public function registerMediaCollections() : void
    {
        $this->addMediaCollection('content_file')
                ->registerMediaConversions(function (Media $media) {
                    $this->addMediaConversion('content_file')
                            ->fit(Manipulations::FIT_CONTAIN, 800, 600)
                            ->nonQueued();

                        $this->addMediaConversion('thumb')
                                ->setManipulations(['w' => 368, 'h' => 232, 'sharp'=> 20]);
                });

        $this->addMediaCollection('resource_attachment')
                ->registerMediaConversions(function (Media $media) {
                    $this->addMediaConversion('resource_attachment')
                            ->fit(Manipulations::FIT_CONTAIN, 800, 600)
                            ->nonQueued();

                        $this->addMediaConversion('thumb')
                                ->setManipulations(['w' => 368, 'h' => 232, 'sharp'=> 20]);
                });
    }

    public function subject()
    {
        return $this->belongsTo('App\Models\Subject');
    }
}
