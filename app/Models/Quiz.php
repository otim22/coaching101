<?php

namespace App\Models;

use App\Traits\FilterTrait;
use Illuminate\Support\Str;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Quiz extends Model
{
    use HasFactory, HasSlug, FilterTrait;

    protected $fillable = ['standard_id', 'level_id', 'item_id', 'category_id', 'year_id', 'term_id', 'user_id', 'is_approved', 'title', 'item_content_id'];
    protected $dates = ['created_at', 'updated_at'];

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

    /**
     * Get the year that owns the ItemContent.
     */
    public function year()
    {
        return $this->belongsTo('App\Models\Year', 'year_id');
    }

    /**
     * Get the term that owns the ItemContent.
     */
    public function term()
    {
        return $this->belongsTo('App\Models\Term', 'term_id');
    }

    /**
     * Get the item that owns the ItemContent.
     */
    public function item()
    {
        return $this->belongsTo('App\Models\Item', 'item_id');
    }

    public function quizQuestions()
    {
        return $this->hasMany('App\Models\QuizQuestion');
    }

    /** Return the ItemContent's creator */
    public function creator()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    public function getShortTitleAttribute()
    {
        return Str::limit($this->title, 20);
    }
}
