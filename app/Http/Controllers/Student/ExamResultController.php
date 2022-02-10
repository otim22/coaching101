<?php

namespace App\Http\Controllers\Student;

use App\Models\Exam;
use Illuminate\Http\Request;
use App\Models\ExamAnswer;
use App\Models\ExamQuestion;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ExamResultController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function index($id)
    {
        $answers = ExamAnswer::where(['user_id' => Auth::id(), 'exam_id' => $id])->get();
        $questions = ExamQuestion::where('exam_id', $id)->get();
        $unAnswerOnes = count($questions) - count($answers);
        $correctAnswers = 0;
        $inCorrectAnswers = 0;

        foreach ($answers as $answer) {
            if ((bool)$answer->is_correct) {
                $correctAnswers++;
            } else {
                $inCorrectAnswers++;
            }
        }

        return view('student.exams.results.index', compact(['answers', 'correctAnswers', 'inCorrectAnswers', 'unAnswerOnes']));
    }
}
