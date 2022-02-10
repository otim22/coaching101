<?php

namespace App\Http\Controllers\Teacher;

use App\Models\Exam;
use Illuminate\Http\Request;
use App\Models\ExamOption;
use App\Models\ExamQuestion;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ExamOptionRequest;

class TeacherExamOptionController extends Controller
{
    public function index()
    {
        $examOptions = ExamOption::where('user_id', Auth::id())->paginate(20);
        return view('teacher.exams.index', compact('examOptions'));
    }

    public function create(Exam $exam, ExamQuestion $examQuestion)
    {
        $examQuestions = ExamQuestion::get();
        return view('teacher.exams.exam_options.create', compact(['exam', 'examQuestions', 'examQuestion']));
    }

    public function store(ExamOptionRequest $request, Exam $exam, ExamQuestion $examQuestion)
    {
        $examOption = new ExamOption();
        $examOption->option = $request->input('option');
        $examOption->exam_question_id = $request->input('exam_question_id');
        $examOption->is_correct = $request->input('is_correct') === "yes" ? 1 : 0;
        $examOption->save();

        return redirect()->route('examOptions.show', [$exam, $examQuestion, $examOption])->with('success', 'Option saved successfully.');
    }

    public function show(Exam $exam, ExamQuestion $examQuestion, ExamOption $examOption)
    {
        return view('teacher.exams.exam_options.show', compact(['exam', 'examQuestion', 'examOption']));
    }

    public function edit(Exam $exam, ExamQuestion $examQuestion, ExamOption $examOption)
    {
        $examQuestions = ExamQuestion::get();
        $currentExamOption = $examOption->is_correct === 1 ? "yes" : "no";
        $examOptionToUpdate = $currentExamOption === "yes" ? "Yes, It's correct" : "No, It's wrong";
        return view('teacher.exams.exam_options.edit', compact([
            'exam', 'examQuestions', 'examQuestion', 'examOption', 'currentExamOption', 'examOptionToUpdate'
        ]));
    }

    public function update(ExamOptionRequest $request, Exam $exam, ExamQuestion $examQuestion, ExamOption $examOption)
    {
        $examOption->option = $request->input('option');
        $examOption->exam_question_id = $request->input('exam_question_id');
        $examOption->is_correct = $request->input('is_correct') === "yes" ? 1 : 0;
        $examOption->save();
        return redirect()->route('examOptions.show', [$exam, $examQuestion, $examOption])->with('success', 'Option updated successfully.');
    }

    public function destroy(Exam $exam, ExamQuestion $examQuestion, ExamOption $examOption)
    {
        try {
            $examOption->delete();
            return redirect()->route('examQuestions.show', $examQuestion)->with('success', 'Option deleted successfully');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
}
