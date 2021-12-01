<?php

namespace App\Http\Controllers\Teacher;

use App\Models\Exam;
use Illuminate\Http\Request;
use App\Models\ExamOption;
use App\Models\ExamQuestion;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ExamQuestionRequest;

class TeacherExamQuestionController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function index()
    {
        $examQuestions = ExamQuestion::where('user_id', Auth::id())->paginate(20);
        return view('teacher.exams.index', compact('examQuestions'));
    }

    public function create(Exam $exam)
    {
        return view('teacher.exams.exam_questions.create', compact('exam'));
    }

    public function store(ExamQuestionRequest $request, Exam $exam)
    {
        $examQuestion = new ExamQuestion();
        $examQuestion->exam_question = $request->input('exam_question');
        $examQuestion->answer_explanation = $request->input('answer_explanation');
        $examQuestion->exam_id = $exam->id;
        $examQuestion->save();

        return redirect()->route('examQuestions.show', [$exam, $examQuestion])->with('success', 'Question saved successfully.');
    }

    public function show(Exam $exam, ExamQuestion $examQuestion)
    {
        $numOfTrueValues = ExamOption::where(['exam_question_id' => $examQuestion->id, 'is_correct' => 1])->count();
        return view('teacher.exams.exam_questions.show', compact(['examQuestion', 'exam', 'numOfTrueValues']));
    }

    public function edit(Exam $exam, ExamQuestion $examQuestion)
    {
        return view('teacher.exams.exam_questions.edit', compact(['examQuestion', 'exam']));
    }

    public function update(ExamQuestionRequest $request, Exam $exam, ExamQuestion $examQuestion)
    {
        $examQuestion->update($request->all());
        return redirect()->route('examQuestions.show', [$exam, $examQuestion])->with('success', 'Question updated successfully.');
    }

    public function destroy(Exam $exam, ExamQuestion $examQuestion)
    {
        try {
            $examQuestion->delete();
            return redirect()->route('exams.show', $exam)->with('success', 'Question deleted successfully');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
}
