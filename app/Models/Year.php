<?php

namespace App\Models;

use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Year extends Model
{
    use HasFactory, HasSlug;

    protected $fillable = ['name'];

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

    /**
    * Get the subjects for the category.
    */
   public function terms()
   {
       return $this->belongsToMany('App\Models\Term');
   }

    public function standard()
    {
        return $this->belongsTo('App\Models\Standard', 'standard_id');
    }
}
