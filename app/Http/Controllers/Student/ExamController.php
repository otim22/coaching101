<?php

namespace App\Http\Controllers\Student;

use App\Models\Year;
use App\Models\Exam;
use App\Models\Term;
use App\Models\Standard;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\ExamOption;
use App\Models\ExamAnswer;
use App\Helpers\SessionWrapper;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Constants\GlobalConstants;

class ExamController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function index()
    {
        $exams =  Exam::getItemContents(GlobalConstants::ALL_SUBJECTS, GlobalConstants::ALL_LEVELS, GlobalConstants::ALL_YEARS, GlobalConstants::ALL_TERMS);
        $standardId = SessionWrapper::getStandardId();
        $standards = Standard::find($standardId);
        $years =  $this->getMatchingYearsToLevel();
        $standardYears = $standards->years;
        $terms =  Term::get();
        $levels = $standards->levels;
        $categories = $standards->categories;

        return view('student.exams.index', compact(['categories', 'years', 'standardYears', 'terms', 'exams', 'levels']));
    }

    protected function getMatchingYearsToLevel($value = 'All levels')
    {
        $standardId = SessionWrapper::getStandardId();
        $standards = Standard::find($standardId);

        if($value == 'All levels') {
            return Year::where('standard_id', $standardId)->get();
        } else {
            return  Year::where(['standard_id' => $standardId, 'level_id' => $value])->get();
        }
    }

    public function show(Exam $exam)
    {
        return view('student.exams.show', compact('exam'));
    }

    public function store(Request $request)
    {
        $questions = $request->all();
        $exam = Exam::find($questions[0]['exam_id']);

        foreach ($questions as $question) {
            $examAnswer = new ExamAnswer();
            $isCorrect = $this->checkCorrectAnswer($question['exam_option_id']);
            $examAnswer->exam_id = $question['exam_id'];
            $examAnswer->exam_question_id = $question['exam_question_id'];
            $examAnswer->exam_option_id = $question['exam_option_id'];
            $examAnswer->is_correct = $isCorrect;
            $examAnswer->user_id = Auth::id();
            $examAnswer->save();
        }

        return redirect()->route('exam.results', $exam);
    }

    public function practiceExam(Exam $exam)
    {
        $paginator = $exam->examQuestions->simplePaginate(1);
        return view('student.exams.practice_exams', compact(['exam', 'paginator']));
    }

    protected function checkCorrectAnswer($optionId)
    {
        $option = ExamOption::find($optionId);
        $opt = "-1";
        if ($option->is_correct == "1") {
            return $opt = "1";
        } elseif ($option->is_correct == "0") {
            return $opt = "0";
        } else {
            return $opt;
        }
    }
}
