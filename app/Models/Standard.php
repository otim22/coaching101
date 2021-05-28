<?php

namespace App\Models;

use Spatie\Sluggable\HasSlug;
use App\Helpers\SessionWrapper;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Standard extends Model
{
    use HasFactory;

    use HasFactory, HasSlug;

    protected $fillable = ['name', 'status'];

    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
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

    public function categories()
    {
        return $this->belongsToMany('App\Models\Category', 'standard_categories')
                            ->wherePivot('standard_id', SessionWrapper::getData('standardId'));
    }

    public static function categoryIds()
    {
        $categoryIds = [];
        $standard = Standard::find(SessionWrapper::getData('standardId'));

        if($standard !== null) {
            foreach ($standard->categories as $category) {
                array_push($categoryIds, $category->id);
            }
        }

        return $categoryIds;
    }
}
