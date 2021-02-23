<?php

namespace App\Models;

use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable, HasRoles, HasSlug;

    /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $fillable = ['name', 'email', 'password'];

    /**
     * The attributes that should be hidden for arrays.
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

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
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     * The attributes that should be cast to native types.
     * @var array
     */
    protected $casts = ['email_verified_at' => 'datetime'];

    public function registerMediaCollections(): void
    {
        $this->addMediaConversion('thumb') ->width(60) ->height(60);
    }

    public function profile()
    {
        return $this->hasOne('App\Models\Profile');
    }

    public function subjects()
    {
        return $this->hasMany('App\Models\Subject');
    }

    public function wishlists()
    {
        return $this->hasMany('App\Models\Subject');
    }
}
