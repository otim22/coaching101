<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Audience;
use App\Http\Requests\AudienceRequest;

class AudienceController extends Controller
{
    public function index()
    {
        return view('app.subject.audience.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AudienceRequest $request)
    {
        $student_learn = $request->get('student_learn');
        $class_requirement = $request->get('class_requirement');
        $target_student = $request->get('target_student');


        $audience = new Audience;

        $audience->student_learn = $student_learn;
        $audience->class_requirement = $class_requirement;
        $audience->target_student = $target_student;

        $audience->save();

        return redirect('/messages');
    }
}
