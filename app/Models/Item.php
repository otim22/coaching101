<?php

namespace App\Models;

use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
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
}
