<?php

namespace App\Models;

use App\Traits\PresentsMedia;
use Spatie\Sluggable\HasSlug;
use Spatie\Image\Manipulations;
use Spatie\Sluggable\SlugOptions;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Book extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia, HasSlug, PresentsMedia;

    protected $fillable = ['title', 'price', 'category_id', 'year_id', 'term_id', 'user_id'];
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
                                                ->slugsShouldBeNoLongerThan(40)
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
        $this->addMediaCollection('default')
                ->registerMediaConversions(function (Media $media) {
                        $this->addMediaConversion('default')
                                ->fit(Manipulations::FIT_CONTAIN, 800, 600)
                                ->nonQueued();

                        $this->addMediaConversion('thumb')
                                ->setManipulations(['w' => 368, 'h' => 232, 'sharp'=> 20])
                                ->nonQueued();
                });
    }

    /**
     * Get the category that owns the book.
     */
    public function category()
    {
        return $this->belongsTo('App\Models\Category', 'category_id');
    }

    /**
     * Get the year that owns the book.
     */
    public function year()
    {
        return $this->belongsTo('App\Models\Year', 'year_id');
    }

    /**
     * Get the term that owns the book.
     */
    public function term()
    {
        return $this->belongsTo('App\Models\Term', 'term_id');
    }
}
