<?php

namespace App\Models;

use Spatie\Sluggable\HasSlug;
use App\Traits\SelfReferenceTrait;
use Spatie\Sluggable\SlugOptions;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SubPastpaper extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia, HasSlug, SelfReferenceTrait;

    protected $fillable = ['title', 'parent_id', 'item_content_id', 'user_id'];

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

    public function pasptpaper()
    {
        return $this->belongsTo('App\Models\ItemContent');
    }
}
