<?php

namespace App\Models;

use App\Traits\PresentsText;
use Spatie\Sluggable\HasSlug;
use Spatie\Image\Manipulations;
use Spatie\Sluggable\SlugOptions;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Topic extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia, PresentsText, HasSlug;

    protected $fillable = [ 'title', 'description'];
    protected $with = ['media'];

    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug')
            ->allowDuplicateSlugs()
            ->slugsShouldBeNoLongerThan(50)
            ->usingSeparator('_');
    }

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

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
