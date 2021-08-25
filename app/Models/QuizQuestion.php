<?php

namespace App\Models;

use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class QuizQuestion extends Model
{
    use HasFactory, HasSlug;

    protected $fillable = ['quiz_question', 'answer_explanation'];
    protected $dates = ['created_at', 'updated_at'];

    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()->generateSlugsFrom('quiz_question')
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
