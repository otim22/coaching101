<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
        'course_title', 'course_subtitle', 'course_description', 'subject', 'class', 'level',
        'welcome_message', 'congratulations_message'
    ];

    protected $casts = [
        'options' => 'array',
    ];

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
