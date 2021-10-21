<?php

namespace App\Http\Controllers\Student;

use App\Models\Quiz;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class QuizResultController extends Controller
{
    public function index()
    {
        return view('student.quizzes.results');
    }
}
