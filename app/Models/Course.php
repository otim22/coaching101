<?php

namespace App\Models;

use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasSlug;

    protected $fillable = [
        'course_title', 'course_subtitle', 'course_description', 'subject', 'class', 'level',
        'welcome_message', 'congratulations_message', 'slug'
    ];

    protected $casts = [
        'options' => 'array',
    ];

    /** Get the options for generating the slug. */
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()->generateSlugsFrom('course_title')
                                                                ->saveSlugsTo('slug')
                                                                ->allowDuplicateSlugs()
                                                                ->slugsShouldBeNoLongerThan(50)
                                                                ->usingSeparator('_');
    }

    /** Get the route key for the model. */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     * Get the sections for the course.
    */
    public function sections()
    {
        return $this->hasMany('App\Models\Section');
    }

    protected function option($key, $default = null)
    {
        return data_get($this->options, $key, $default);
    }

    public function getStudentLearnAttribute()
    {
        return $this->option('student_learn', []);
    }

    public function getClassRequirementAttribute()
    {
        return $this->option('class_requirement', []);
    }

    public function getTargetStudentAttribute()
    {
        return $this->option('target_student', []);
    }
}
