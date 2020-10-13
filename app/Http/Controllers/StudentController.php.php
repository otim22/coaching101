<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use App\Models\Subject;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function show(Subject $subject)
    {
        return view('pages.student.show', compact('subject'));
    }

    public function play_video(Subject $subject, Topic $topic)
    {
        return view('pages.student.play_video', compact(['subject', 'topic']));
    }
}
