<?php

namespace App\Http\Controllers\Teacher;

use App\Models\Quiz;
use Illuminate\Http\Request;
use App\Models\QuizQuestion;
use App\Http\Controllers\Controller;

class TeacherQuizQuestionController extends Controller
{
    public function index()
    {
        $quizQuestions = QuizQuestion::where(['user_id' => Auth::id(), 'item_id' => 4])->paginate(20);

        return view('teacher.quizzes.index', compact('quizQuestions'));
    }

    public function create(Quiz $quiz)
    {
        return view('teacher.quizzes.quiz_questions.create', compact('quiz'));
    }
}
