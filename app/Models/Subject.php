<?php

namespace App\Models;

use Carbon\Carbon;
use App\Traits\PresentsText;
use App\Traits\PresentsMedia;
use Spatie\Sluggable\HasSlug;
use Spatie\Image\Manipulations;
use willvincent\Rateable\Rateable;
use Spatie\Sluggable\SlugOptions;
use Spatie\Searchable\Searchable;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Support\Facades\DB;
use Spatie\Searchable\SearchResult;
use Illuminate\Support\Facades\Auth;
use App\Constants\GlobalConstants;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Subject extends Model implements HasMedia, Searchable
{
    use HasFactory, HasSlug, InteractsWithMedia, PresentsMedia, PresentsText, Rateable;

    protected $fillable = ['title', 'subtitle', 'description', 'price', 'category_id', 'is_approved'];
    protected $with = ['media'];
    protected $appends = ['isSubscribedTo'];
    protected $dates = ['created_at', 'updated_at'];

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

    public function getTitleAttribute($value)
    {
        return ucfirst($value);
    }

    public function getSubtitleAttribute($value)
    {
        return ucfirst($value);
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

    /**  Get the category that owns the subject. */
    public function category()
    {
        return $this->belongsTo('App\Models\Category', 'category_id');
    }

    /** Return the subject's creator */
    public function creator()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    public function wishlists()
    {
        return $this->hasMany('App\Models\Subject');
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

    /** Get the subject's subscription. */
    public function subscription()
    {
        return $this->morphOne(Subscription::class, 'subscriptionable');
    }

    public function getIsSubscribedToAttribute()
    {
        return $this->subscription()->where('user_id', Auth::id())->exists();
    }

    public function getSubscriptionCountAttribute()
    {
        return $this->subscription()->count();
    }

    public function rating()
    {
        return $this->belongsTo(Subject::class);
    }

    /** Scope a query to only include subjects created last week. */
    public function scopeLastWeek(Builder $query): Builder
    {
        return $query->whereBetween('created_at', [Carbon::now()->subDays(7), Carbon::now()])->latest();
    }

    /** Scope a query to only include subjects created  last month. */
    public function scopeLastMonth(Builder $query, int $limit = 5): Builder
    {
        return $query->whereBetween('created_at', [Carbon::now()->subDays(30), Carbon::now()])
                                    ->latest()
                                    ->limit($limit);
    }

    /** Scope a query to only include subjects created last year. */
    public function scopeLastYear(Builder $query, int $limit = 5): Builder
    {
        return $query->whereBetween('created_at', [now()->toDateString(), now()->subYear()->toDateString()])
                                    ->latest()
                                    ->limit($limit);
    }

    /** Searching for subjects results*/
    public function getSearchResult(): SearchResult
    {
        $url = route('student.show', $this->slug);

        return new SearchResult(
            $this,
            $this->title,
            $this->subtitle,
            $this->description,
            $url
        );
    }

    public static function getSubjects($category, $year, $term)
    {
        $subjects = static::get();

        $items = ['is_approved' => 1];

        if ($category && $category !== GlobalConstants::ALL_SUBJECTS) {
            $items['category_id'] = $category;
        }

        if ($year && $year !== GlobalConstants::ALL_YEARS) {
            $items['year_id'] = $year;
        }

        if ($term && $term !== GlobalConstants::ALL_TERMS) {
            $items['term_id'] = $term;
        }

        $subjects = static::where($items)->paginate(12);

        return $subjects;
    }
}
