<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CoursesController extends Controller
{
    public function index()
    {
        $courses = Course::all()->take(2);

        return view('app.courses.index', compact('courses'));
    }

    public function show(Course $course)
    {
        return view('app.courses.show', compact('course'));
    }

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
