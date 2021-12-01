<?php

namespace App\Http\Controllers\Student;

use App\Models\Exam;
use Illuminate\Http\Request;
use App\Models\ExamAnswer;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ExamResultController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function index(Exam $exam)
    {
        // dd($exam);
        $answers = ExamAnswer::where('user_id', Auth::id())->get();
        $correctAnswers = 0;
        $inCorrectAnswers = 0;
        $unAnswerOnes = 0;

        foreach ($answers as $answer) {
            if ($answer->is_correct == "1") {
                $correctAnswers++;
            } elseif ($answer->is_correct == "0") {
                $inCorrectAnswers++;
            } else {
                $unAnswerOnes++;
            }
        }

        return view('student.exams.results.index', compact(['answers', 'correctAnswers', 'inCorrectAnswers', 'unAnswerOnes']));
    }
}
