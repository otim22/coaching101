<?php

namespace App\Http\Controllers\Teacher;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserSurveyAnswerController extends Controller
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
            ''
        ]);

        $userSurveyAnswer = new UserSurveyAnswer();

        $userSurveyAnswer = $request->get('student_learn');
        $userSurveyAnswer = $request->get('class_requirement');
        $userSurveyAnswer = $request->get('target_student');

        return redirect()->route('manage.subjects');
    }
}
