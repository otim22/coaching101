<?php

namespace App\Models;

use App\Utilities\FilterBuilder;
use Spatie\Sluggable\HasSlug;
use App\Helpers\SessionWrapper;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory, HasSlug;

    protected $fillable = ['name'];

    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()->generateSlugsFrom('name')
                                    ->saveSlugsTo('slug')
                                    ->allowDuplicateSlugs()
                                    ->slugsShouldBeNoLongerThan(20)
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

    public function getNameAttribute($value)
    {
        return ucfirst($value);
    }

    public function scopeFilterBy($query, $filters)
    {
        $namespace = 'App\Utilities\PostFilters\Category';
        $filter = new FilterBuilder($query, $filters, $namespace);

        return $filter->apply();
    }

    /**
    * Get the subjects for the category.
    */
   public function itemContents()
   {
        return $this->hasMany('App\Models\ItemContent');
   }

    /**
   * Get the subjects belongs to year.
   */
    public function years()
    {
        return $this->belongsToMany('App\Models\Year');
    }

    public function standards()
    {
        return $this->belongsToMany('App\Models\Standard', 'standard_categories');
    }
}
