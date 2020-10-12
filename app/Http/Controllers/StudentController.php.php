<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function show(Subject $subject)
    {
        return view('pages.student.show', compact('subject'));
    }
}
