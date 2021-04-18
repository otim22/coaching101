<?php

namespace App\Http\Controllers;

use App\Models\ItemContent;
use Illuminate\Support\Arr;
use App\Models\Audience;
use Illuminate\Http\Request;
use App\Http\Requests\AudienceRequest;

class AudienceController extends Controller
{
    public function index()
    {
        return view('teacher.manage_subject.audience.index');
    }

    public function create(ItemContent $subject)
    {
        return view('teacher.manage_subject.audience.create', compact('subject'));
    }

    public function edit(ItemContent $subject)
    {
        return view('teacher.manage_subject.audience.edit', compact('subject'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AudienceRequest $request, ItemContent $subject)
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(AudienceRequest $request, Audience $audience, ItemContent $subject)
    {
        $student_learn = $request->input('student_learn');
        $class_requirement = $request->input('class_requirement');
        $target_student = $request->input('target_student');

        if(array_filter($student_learn)) $audience->student_learn = $student_learn;
        if(array_filter($class_requirement)) $audience->class_requirement = $class_requirement;
        if(array_filter($target_student)) $audience->target_student = $target_student;

        $subject->updateAudience($audience);
        // dd($subject);

        return redirect()->route('subjects.show', $subject)->with('success', 'Audience updated successfully');
    }
}
