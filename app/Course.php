<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
            'course_title', 'course_subtitle', 'course_description', 'subject', 'class', 'level',
            'content_title', 'content_file', 'content_description','resource_attachment', 'students_learn',
            'class_requirement', 'target_student', 'welcome_message', 'congratulations_message'
        ];
}
