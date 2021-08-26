<?php

namespace App\Http\Controllers\Teacher;

use App\Models\Quiz;
use Illuminate\Http\Request;
use App\Models\QuizOption;
use App\Models\QuizQuestion;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\QuizOptionRequest;

class TeacherQuizOptionController extends Controller
{
    public function index()
    {
        $quizOptions = QuizOption::where('user_id', Auth::id())->paginate(20);
        return view('teacher.quizzes.index', compact('quizOptions'));
    }

    public function create(Quiz $quiz, QuizQuestion $quizQuestion)
    {
        $quizQuestions = QuizQuestion::get();
        return view('teacher.quizzes.quiz_options.create', compact(['quiz', 'quizQuestions', 'quizQuestion']));
    }

    public function store(QuizOptionRequest $request, Quiz $quiz, QuizQuestion $quizQuestion)
    {
        $quizOption = new QuizOption();
        $quizOption->option = $request->input('option');
        $quizOption->quiz_question_id = $request->input('quiz_question_id');
        $quizOption->is_correct = $request->input('is_correct') === "yes" ? 1 : 0;
        $quizOption->save();

        return redirect()->route('quizOptions.show', [$quiz, $quizQuestion, $quizOption])->with('success', 'Option saved successfully.');
    }

    public function show(Quiz $quiz, QuizQuestion $quizQuestion, QuizOption $quizOption)
    {
        return view('teacher.quizzes.quiz_options.show', compact(['quiz', 'quizQuestion', 'quizOption']));
    }

    public function edit(Quiz $quiz, QuizQuestion $quizQuestion, QuizOption $quizOption)
    {
        $quizQuestions = QuizQuestion::get();
        $currentQuizOption = $quizOption->is_correct === 1 ? "yes" : "no";
        $quizOptionToUpdate = $currentQuizOption === "yes" ? "Yes, It's correct" : "No, It's wrong";
        return view('teacher.quizzes.quiz_options.edit', compact([
            'quiz', 'quizQuestions', 'quizQuestion', 'quizOption', 'currentQuizOption', 'quizOptionToUpdate'
        ]));
    }

    public function update(QuizOptionRequest $request, Quiz $quiz, QuizQuestion $quizQuestion, QuizOption $quizOption)
    {
        $quizOption->option = $request->input('option');
        $quizOption->quiz_question_id = $request->input('quiz_question_id');
        $quizOption->is_correct = $request->input('is_correct') === "yes" ? 1 : 0;
        $quizOption->save();
        return redirect()->route('quizOptions.show', [$quiz, $quizQuestion, $quizOption])->with('success', 'Option updated successfully.');
    }

    public function destroy(Quiz $quiz, QuizQuestion $quizQuestion, QuizOption $quizOption)
    {
        try {
            $quizOption->delete();
            return redirect()->route('quizQuestions.show', $quizQuestion)->with('success', 'Option deleted successfully');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
}
