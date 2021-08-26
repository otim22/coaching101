<?php

namespace App\Http\Controllers\Teacher;

use App\Models\Quiz;
use Illuminate\Http\Request;
use App\Models\QuizQuestion;
use App\Http\Controllers\Controller;
use App\Http\Requests\QuizQuestionRequest;

class TeacherQuizQuestionController extends Controller
{
    public function index()
    {
        $quizQuestions = QuizQuestion::where('user_id', Auth::id())->paginate(20);
        return view('teacher.quizzes.index', compact('quizQuestions'));
    }

    public function create(Quiz $quiz)
    {
        return view('teacher.quizzes.quiz_questions.create', compact('quiz'));
    }

    public function store(QuizQuestionRequest $request, Quiz $quiz)
    {
        $quizQuestion = new QuizQuestion();
        $quizQuestion->quiz_question = $request->input('quiz_question');
        $quizQuestion->answer_explanation = $request->input('answer_explanation');
        $quizQuestion->quiz_id = $quiz->id;
        $quizQuestion->save();

        return redirect()->route('quizQuestions.show', [$quiz, $quizQuestion])->with('success', 'Quiz saved successfully.');
    }

    public function show(Quiz $quiz, QuizQuestion $quizQuestion)
    {
        return view('teacher.quizzes.quiz_questions.show', compact(['quizQuestion', 'quiz']));
    }

    public function edit(Quiz $quiz, QuizQuestion $quizQuestion)
    {
        return view('teacher.quizzes.quiz_questions.edit', compact(['quizQuestion', 'quiz']));
    }

    public function update(QuizQuestionRequest $request, Quiz $quiz, QuizQuestion $quizQuestion)
    {
        $quizQuestion->update($request->all());
        return redirect()->route('quizQuestions.show', [$quiz, $quizQuestion])->with('success', 'Question updated successfully.');
    }

    public function destroy(Quiz $quiz, QuizQuestion $quizQuestion)
    {
        try {
            $quizQuestion->delete();
            return redirect()->route('quizzes.show', $quiz)->with('success', 'Question deleted successfully');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
}
