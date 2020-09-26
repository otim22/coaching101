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
        $request->validate([
            'student_learn.*' => 'required_unless:type_of_content,is_information',
            'class_requirement.*' => 'required_unless:type_of_content,is_information',
            'target_student.*' => 'required_unless:type_of_content,is_information'
        ]);
        dd($request);
    }
}
