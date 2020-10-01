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

class Subject extends Model implements HasMedia
{
    use HasFactory, HasSlug, InteractsWithMedia, PresentsMedia;

    protected $fillable = ['title', 'subtitle', 'description', 'category'];
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
        $this->addMediaCollection('default')->singleFile();
        $this->addMediaCollection('images');
    }

    /**
     * @param Media|null $media
     * @throws \Spatie\Image\Exceptions\InvalidManipulation
     */
    public function registerMediaConversions(Media $media = null) : void
    {
        $this->addMediaConversion('cover_image')
                ->fit(Manipulations::FIT_CONTAIN, 800, 600)
                ->nonQueued();

        $this->addMediaConversion('thumb')
                ->setManipulations(['w' => 368, 'h' => 232, 'sharp'=> 20])
                ->nonQueued();
    }

    /** Return the SubjectIntroduction's thumbnail */
    public function thumbnail()
    {
        return $this->belongsTo(Media::class);
    }

    /** return true if the SubjectIntroduction has a thumbnail */
    public function hasThumbnail(): bool
    {
        return filled($this->thumbnail_id);
    }

    public function audience()
    {
        return $this->hasOne('App\Models\Audience');
    }

    public function addAudience($audience)
    {
        return $this->audience()->save($audience);
    }

    public function message()
    {
        return $this->hasOne('App\Models\Message');
    }

    public function addMessage($message)
    {
        return $this->message()->save($message);
    }

    public function topics()
    {
        return $this->hasMany('App\Models\Topic');
    }
}
