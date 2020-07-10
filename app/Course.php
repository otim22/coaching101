<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
            'course_title', 'course_subtitle', 'course_description', 'subject', 'class', 'level',
            'content_title', 'main_content_files', 'content_description','extra_resource_files', 'students_learn',
            'class_requirement', 'target_student', 'welcome_message', 'congratulations_message'
        ];
}
