<?php

namespace App\Models;

use Illuminate\Support\Str;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ExamOption extends Model
{
    use HasFactory, HasSlug;

    protected $fillable = ['option', 'is_correct', 'exam_question_id'];
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

    public function examQuestion()
    {
        return $this->belongsTo('App\Models\ExamQuestion', 'exam_question_id');
    }

    public function getShortOptionAttribute()
    {
        return Str::limit($this->option, 20);
    }
}
