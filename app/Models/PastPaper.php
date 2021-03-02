<?php

namespace App\Models;

use App\Traits\PresentsText;
use Spatie\Sluggable\HasSlug;
use Spatie\Image\Manipulations;
use Spatie\Sluggable\SlugOptions;
use Spatie\MediaLibrary\HasMedia;
use App\Constants\GlobalConstants;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Pastpaper extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia, HasSlug, PresentsText;

    protected $fillable = ['title', 'price', 'category_id', 'year_id', 'term_id', 'user_id'];
    protected $with = ['media'];
    protected $appends = ['isSubscribedTo'];

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
        $this->addMediaCollection('pastpaper');

        $this->addMediaCollection('teacher_pastpaper');
    }

    /**
     * Get the category that owns the pastpaper.
     */
    public function category()
    {
        return $this->belongsTo('App\Models\Category', 'category_id');
    }

    /**
     * Get the year that owns the pastpaper.
     */
    public function year()
    {
        return $this->belongsTo('App\Models\Year', 'year_id');
    }

    /**
     * Get the term that owns the pastpaper.
     */
    public function term()
    {
        return $this->belongsTo('App\Models\Term', 'term_id');
    }

    /** Return the subject's creator */
    public function creator()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    /**
     * Get the pastpaper's subscription.
     */
    public function subscription()
    {
        return $this->morphOne(Subscription::class, 'subscriptionable');
    }

    public function subscribe($userId = null)
    {
        $this->subscription()->create([
            'user_id' => $userId ?: Auth::id()
        ]);

        return $this;
    }

    public function unsubscribe($userId = null)
    {
        $this->subscription()->where('user_id', $userId ?: Auth::id())->delete();
    }

    public function getIsSubscribedToAttribute()
    {
        return $this->subscription()->where('user_id', Auth::id())->exists();
    }

    public function getSubscriptionCountAttribute()
    {
        return $this->subscription()->count();
    }

    public static function getPastpapers($category, $year, $term)
    {
        $pastpapers = static::get();

        $items = [];

        if ($category && $category !== GlobalConstants::ALL_SUBJECTS) {
            $items['category_id'] = $category;
        }

        if ($year && $year !== GlobalConstants::ALL_YEARS) {
            $items['year_id'] = $year;
        }

        if ($term && $term !== GlobalConstants::ALL_TERMS) {
            $items['term_id'] = $term;
        }

        $pastpapers = static::where($items)->paginate(12);

        return $pastpapers;
    }
}
