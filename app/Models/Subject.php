<?php

namespace App\Models;

use App\Traits\PresentsMedia;
use App\Traits\PresentsSubject;
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
    use HasFactory, HasSlug, InteractsWithMedia, PresentsMedia, PresentsSubject;

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

    public function audience()
    {
        return $this->hasOne('App\Models\Audience');
    }

    public function addAudience($audience)
    {
        return $this->audience()->save($audience);
    }

    public function updateAudience($audience)
    {
        return $this->audience()->update($audience->toArray());
    }

    public function message()
    {
        return $this->hasOne('App\Models\Message');
    }

    public function addMessage($message)
    {
        return $this->message()->save($message);
    }


    public function updateMessage($message)
    {
        return $this->message()->update($message->toArray());
    }

    public function topics()
    {
        return $this->hasMany('App\Models\Topic');
    }

    /** Return the subject's creator */
    public function creator()
    {
        return $this->belongsTo('App\Models\User', 'created_by');
    }
}
