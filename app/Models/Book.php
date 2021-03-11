<?php

namespace App\Models;

use App\Traits\PresentsText;
use App\Traits\PresentsMedia;
use Spatie\Sluggable\HasSlug;
use App\Traits\PresentsSubject;
use Spatie\Image\Manipulations;
use Spatie\Sluggable\SlugOptions;
use Spatie\MediaLibrary\HasMedia;
use App\Constants\GlobalConstants;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Book extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia, HasSlug, PresentsMedia, PresentsText, PresentsSubject;

    protected $fillable = ['title', 'book_objective', 'price', 'category_id', 'year_id', 'term_id', 'user_id'];
    protected $with = ['media'];
    protected $appends = ['isSubscribedTo'];

    protected $casts = ['book_objective' => 'array' ];

    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()->generateSlugsFrom('title')
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
        $this->addMediaCollection('cover_image')
                ->registerMediaConversions(function (Media $media) {
                        $this->addMediaConversion('cover_image')
                                ->fit(Manipulations::FIT_CONTAIN, 800, 600)
                                ->nonQueued();

                        $this->addMediaConversion('thumb')
                                ->setManipulations(['w' => 368, 'h' => 232, 'sharp'=> 20])
                                ->nonQueued();
                });

        $this->addMediaCollection('book');

        $this->addMediaCollection('teacher_cover_image')
                ->registerMediaConversions(function (Media $media) {
                        $this->addMediaConversion('teacher_cover_image')
                                ->fit(Manipulations::FIT_CONTAIN, 800, 600)
                                ->nonQueued();

                        $this->addMediaConversion('teacher_thumb')
                                ->setManipulations(['w' => 368, 'h' => 232, 'sharp'=> 20])
                                ->nonQueued();
                });

        $this->addMediaCollection('teacher_book');
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

    /** Return the subject's creator */
    public function creator()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    /**
     * Get the book's subscription.
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

    public static function getBooks($category, $year, $term)
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

        return static::where($items)->paginate(12);
    }
}
