<?php

namespace App\Models;

use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasSlug;

    protected $fillable = [
        'subject_title', 'subject_subtitle', 'subject_description', 'subject', 'class', 'level',
        'welcome_message', 'congratulations_message', 'slug'
    ];

    protected $casts = [
        'options' => 'array',
    ];

    /** Get the options for generating the slug. */
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()->generateSlugsFrom('subject_title')
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
     * Get the sections for the subject.
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
