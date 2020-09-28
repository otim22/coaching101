<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectsController extends Controller
{
    public function index()
    {
        $subjects = Subject::all()->take(2);

        return view('app.subjects.index', compact('subjects'));
    }

    public function show(Subject $subject)
    {
        return view('app.subjects.show', compact('subject'));
    }

    public function store()
    {
        $data = request()->validate([
            'subject_title' => 'required',
            'subject_subtitle' => 'required',
            'subject_description' => 'required',
            'subject' => 'required',
            'class' => 'required',
            'level' => 'required',
            'content_title' => 'required',
            'content_file' => 'required',
            'content_description' => 'required',
            'resource_attachment' => 'required',
            'students_learn' => 'required',
            'class_requirement' => 'required',
            'target_student' => 'required',
            'welcome_message' => 'required',
            'congratulations_message' => 'required'
        ]);

        Subject::create($data);
    }
}
