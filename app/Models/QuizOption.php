<?php

namespace App\Models;

use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class QuizOption extends Model
{
    use HasFactory, HasSlug;

    protected $fillable = ['option', 'is_correct', 'quiz_question_id'];
    protected $dates = ['created_at', 'updated_at'];

    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()->generateSlugsFrom('option')
                                                ->saveSlugsTo('slug')
                                                ->allowDuplicateSlugs()
                                                ->slugsShouldBeNoLongerThan(50)
                                                ->usingSeparator('_');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
