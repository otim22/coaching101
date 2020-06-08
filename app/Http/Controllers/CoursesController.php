<?php

namespace App\Http\Controllers;

use App\Course;
use Illuminate\Http\Request;

class CoursesController extends Controller
{
    public function store()
    {
        $data = request()->validate([
            'course_title' => 'required',
            'course_subtitle' => 'required',
            'course_description' => 'required',
            'subject' => 'required',
            'class' => 'required',
            'level' => 'required',
            'content_title' => 'required',
            'content_file' => 'required',
            'content_description' => 'required',
            'resource_attachment' => 'required',
            'students_learn' => 'required',
            'class_requirement' => 'required',
            'target_student' => 'required',
            'welcome_message' => 'required',
            'congratulations_message' => 'required'
        ]);

        Course::create($data);
    }
}
