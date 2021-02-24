<?php

namespace App\Models;

use App\Traits\PresentsMedia;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Profile extends Model implements HasMedia
{
    use HasFactory, PresentsMedia, InteractsWithMedia;

    protected $fillable = ['category_id', 'year_id', 'age', 'school', 'bio'];
    protected $with = ['media'];
    protected $appends = ['hasProfileUpdated'];

    /**
     * @param Media|null $media
     * @throws \Spatie\Image\Exceptions\InvalidManipulation
     */
    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaCollection('profile')
                ->registerMediaConversions(function (Media $media) {
                        $this->addMediaConversion('profile')
                                ->fit(Manipulations::FIT_CONTAIN, 800, 600)
                                ->nonQueued();
                });
    }

    public function getHasProfileUpdatedAttribute()
    {
        return $this->user()->where('id', Auth::id())->exists();
    }

    public function user()
    {
        return $this->belongsTo('\App\Models\User');
    }
}
