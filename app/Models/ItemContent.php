<?php

namespace App\Models;

use Carbon\Carbon;
use App\Models\Year;
use App\Models\Level;
use App\Traits\FilterTrait;
use App\Models\Standard;
use App\Models\Currency;
use Illuminate\Support\Str;
use App\Traits\PresentsText;
use App\Traits\PresentsItem;
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
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class ItemContent extends Model implements HasMedia, Searchable
{
    use HasFactory, HasSlug, InteractsWithMedia, PresentsMedia, PresentsText, Rateable, PresentsItem, FilterTrait;

    protected $fillable = ['title', 'subtitle', 'description', 'objective', 'price', 'item_id', 'standard_id', 'level_id', 'category_id', 'year_id', 'term_id', 'user_id', 'is_approved', 'currency_id'];
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

    public function getRouteKeyName()
    {
        return 'slug';
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

    /**  Get the standard that owns the ItemContent. */
    public function standard()
    {
        return $this->belongsTo('App\Models\Standard', 'standard_id');
    }

    /**  Get the currency that owns the ItemContent. */
    public function currency()
    {
        return $this->belongsTo('App\Models\Currency', 'currency_id');
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

    public function subNotes()
    {
        return $this->hasMany('App\Models\SubNote');
    }

    public function subPastpapers()
    {
        return $this->hasMany('App\Models\SubPastpaper');
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
        return $this->morphOne('App\Models\Subscription', 'subscriptionable');
    }

    public function rating()
    {
        return $this->belongsTo('App\Models\ItemContent');
    }

    public function item()
    {
        return $this->belongsTo('App\Models\Item');
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

    /** Searching for items results*/
    public function getSearchResult(): SearchResult
    {
        return new SearchResult(
            $this,
            $this->title
        );
    }

    protected function getLevelsToStandard($value = 'Select standard')
    {
        if($value == 'Select standard') {
            return Level::get();
        } else {
            return  Level::where('standard_id', $value)->get();
        }
    }

    protected function getYearsToLevel($value = 'Select level')
    {
        if($value == 'Select level') {
            return Year::get();
        } else {
            return  Year::where('level_id', $value)->get();
        }
    }

    protected function getCoursesOfACategory($value = 'Select category')
    {
        if($value == 'Select category') {
            return ItemContent::get();
        } else {
            return  ItemContent::where(['item_id' => $value, 'user_id' => Auth::id()])->get();
        }
    }

    protected function getRightCurrency($value = 'Select standard')
    {
        if($value == 'Select standard') {
            return  Currency::where('name', 'UGX')->first();
        } else {
            $standard = Standard::find($value);
            if($standard->name == 'Cambridge') {
                return  Currency::where('name', 'USD')->first();
            } else {
                return  Currency::where('name', 'UGX')->first();
            }
        }
    }
}
