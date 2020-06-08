<?php

namespace App\Http\Controllers;

use App\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('app.teacher.course.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request);
        // var_dump(request('course_title'));
        // var_dump(request('course_subtitle'));
        // var_dump(request('course_description'));
        // var_dump(request('default_subject'));
        // var_dump(request('default_class'));
        // var_dump(request('default_level'));

        // var_dump(request('content_title'));
        // var_dump(request('content_description'));

        var_dump(request('students_learn'));
        // var_dump(request('class_requirement'));
        // var_dump(request('target_students'));
        
        // var_dump(request('welcome_message'));
        // var_dump(request('congratulations_message'));
    }
}
