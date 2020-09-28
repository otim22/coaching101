<?php

namespace App\Http\Controllers;

use App\Models\TargetStudent;
use Illuminate\Http\Request;

class TargetStudentController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validateRequest($request);

        $student_learn = $request->get('student_learn');
        $class_requirement = $request->get('class_requirement');
        $target_student = $request->get('target_student');

        $targetStudent = new TargetStudent;

        $targetStudent->student_learn = $student_learn;
        $targetStudent->class_requirement = $class_requirement;
        $targetStudent->target_student = $target_student;

        $targetStudent->save();

        return back();
    }

    protected function validateRequest($request)
    {
        return $request->validate([
            'student_learn.*' => 'required_unless:type_of_content,is_information',
            'class_requirement.*' => 'required_unless:type_of_content,is_information',
            'target_student.*' => 'required_unless:type_of_content,is_information'
        ]);
    }
}
