<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Support\Str;
use App\Traits\PresentsText;
use App\Traits\PresentsMedia;
use Spatie\Sluggable\HasSlug;
use App\Traits\PresentsItem;
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
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class ItemContent extends Model implements HasMedia, Searchable
{
    use HasFactory, HasSlug, InteractsWithMedia, PresentsMedia, PresentsText, Rateable, PresentsItem;

    protected $fillable = ['title', 'subtitle', 'description', 'objective', 'price', 'item_id', 'category_id', 'year_id', 'term_id', 'user_id', 'is_approved'];
    protected $with = ['media'];
    protected $appends = ['isSubscribedTo'];
    protected $dates = ['created_at', 'updated_at'];
    protected $casts = ['objective' => 'array' ];
    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()->generateSlugsFrom('title')
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

    /**  Get the category that owns the ItemContent. */
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

    /** Return the ItemContent's creator */
    public function creator()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    public function wishlists()
    {
        return $this->hasMany('App\Models\ItemContent');
    }

    public function questions()
    {
        return $this->hasMany('App\Models\Question');
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

    /** Get the ItemContent's subscription. */
    public function subscription()
    {
        return $this->morphOne(Subscription::class, 'subscriptionable');
    }

    public function rating()
    {
        return $this->belongsTo(ItemContent::class);
    }

    public static function getItemContentsForTeacherPerforamce($days, int $limit = 10)
    {
        return static::whereBetween('created_at', [Carbon::now()->subDays($days)->format('Y-m-d H:i:s'), Carbon::now()->format('Y-m-d H:i:s')])
                                ->latest()
                                ->limit($limit);
    }

    public function getTotalRevenueAttribute()
    {
        return rtrim(rtrim(number_format(($this->price * $this->subscriptionCount), 2), 2), '.');
    }

    /** Searching for subjects results*/
    public function getSearchResult(): SearchResult
    {
        return new SearchResult(
            $this,
            $this->title,
            $this->subtitle,
            $this->description
        );
    }

    public static function getItemContents($category, $year, $term, $item = null)
    {
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
        if ($item && $item !== GlobalConstants::SUBJECT) {
            $items['item_id'] = $item;
        } else if($item && $item !== GlobalConstants::BOOK) {
            $items['item_id'] = $item;
        } else if($item && $item !== GlobalConstants::NOTE) {
            $items['item_id'] = $item;
        } else if($item && $item !== GlobalConstants::PASTPAPER) {
            $items['item_id'] = $item;
        }

        return static::where($items)->paginate(12);
    }
}
