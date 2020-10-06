<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Audience;
use App\Models\Subject;
use App\Http\Requests\AudienceRequest;

class AudienceController extends Controller
{
    public function index()
    {
        return view('pages.subject.audience.index');
    }

    public function create(Subject $subject)
    {
        return view('pages.subject.audience.create', compact('subject'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AudienceRequest $request, Subject $subject)
    {
        $student_learn = $request->get('student_learn');
        $class_requirement = $request->get('class_requirement');
        $target_student = $request->get('target_student');

        $audience = new Audience;

        $audience->student_learn = $student_learn;
        $audience->class_requirement = $class_requirement;
        $audience->target_student = $target_student;

        $subject->addAudience($audience);

        return redirect()->route('messages', $subject);
    }
}
