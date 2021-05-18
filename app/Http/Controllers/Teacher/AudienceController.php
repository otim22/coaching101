<?php

namespace App\Http\Controllers\Teacher;

use Illuminate\Support\Arr;
use App\Models\Audience;
use Illuminate\Http\Request;
use App\Models\ItemContent;
use App\Http\Controllers\Controller;
use App\Http\Requests\AudienceRequest;

class AudienceController extends Controller
{
    public function index()
    {
        return view('teacher.videos.audience.index');
    }

    public function create(ItemContent $subject)
    {
        return view('teacher.videos.audience.create', compact('subject'));
    }

    public function edit(ItemContent $subject)
    {
        return view('teacher.videos.audience.edit', compact('subject'));
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

        $audience->student_learn =  array_filter($student_learn);
        $audience->class_requirement = array_filter($class_requirement);
        $audience->target_student = array_filter($target_student);

        $subject->updateAudience($audience);

        return redirect()->route('subjects.show', $subject)->with('success', 'Audience updated successfully');
    }

    public function deleteStudentLearn(ItemContent $subject, $studentLearnId)
    {
        $objectives = $subject->audience->student_learn;
        $updatedObjectives = Arr::except($objectives, $studentLearnId);
        $audience = new Audience;
        $audience->student_learn = array_filter($updatedObjectives);
        $subject->updateAudience($audience);

        return redirect()->route('subjects.show', $subject);
    }

    public function deleteClassRequirement(ItemContent $subject, $classRequirementId)
    {
        $objectives = $subject->audience->class_requirement;
        $updatedObjectives = Arr::except($objectives, $classRequirementId);
        $audience = new Audience;
        $audience->class_requirement = array_filter($updatedObjectives);
        $subject->updateAudience($audience);

        return redirect()->route('subjects.show', $subject);
    }

    public function deleteTargetStudent(ItemContent $subject, $targetStudentId)
    {
        $objectives = $subject->audience->target_student;
        $updatedObjectives = Arr::except($objectives, $targetStudentId);
        $audience = new Audience;
        $audience->target_student = array_filter($updatedObjectives);
        $subject->updateAudience($audience);

        return redirect()->route('subjects.show', $subject);
    }
}
