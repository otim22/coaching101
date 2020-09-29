<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TargetStudent;
use App\Http\Requests\TargetStudentRequest;

class TargetStudentController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TargetStudentRequest $request)
    {
        $student_learn = $request->get('student_learn');
        $class_requirement = $request->get('class_requirement');
        $target_student = $request->get('target_student');

        $targetStudent = new TargetStudent;

        $targetStudent->student_learn = $student_learn;
        $targetStudent->class_requirement = $class_requirement;
        $targetStudent->target_student = $target_student;

        $targetStudent->save();

        return redirect()->back();
    }
}
