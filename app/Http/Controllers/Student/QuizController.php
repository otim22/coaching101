<?php

namespace App\Http\Controllers\Student;

use App\Models\Year;
use App\Models\Quiz;
use App\Models\Term;
use App\Models\Standard;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\QuizAnswer;
use App\Helpers\SessionWrapper;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Constants\GlobalConstants;

class QuizController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function index()
    {
        $quizzes =  Quiz::getItemContents(GlobalConstants::ALL_SUBJECTS, GlobalConstants::ALL_LEVELS, GlobalConstants::ALL_YEARS, GlobalConstants::ALL_TERMS);
        $standardId = SessionWrapper::getStandardId();
        $standards = Standard::find($standardId);
        $years =  $this->getMatchingYearsToLevel();
        $standardYears = $standards->years;
        $terms =  Term::get();
        $levels = $standards->levels;
        $categories = $standards->categories;

        return view('student.quizzes.index', compact(['categories', 'years', 'standardYears', 'terms', 'quizzes', 'levels']));
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

    public function show(Quiz $quiz)
    {
        $paginatedQuiz = $quiz->quizQuestions->paginate(1);
        return view('student.quizzes.show', compact(['quiz', 'paginatedQuiz']));
    }

    // public function quizResults(Quiz $quiz)
    // {
    //     $paginatedQuiz = $quiz->quizQuestions->paginate(1);
    //     return view('student.quizzes.results', compact(['quiz', 'paginatedQuiz']));
    // }

    public function store(Request $request)
    {
        dd('quizzes.results');
    }

    public function userQuizOption(Request $request)
    {
        dd('Test');
        $quizAnswer =  new QuizAnswer();
        $quizAnswer->quiz_id = $request->quizId;
        $quizAnswer->quiz_question_id = $request->questionId;
        $quizAnswer->quiz_option_id = $request->optionId;
        $quizAnswer->user_id = Auth::id();
        // dd($request->lastOption);
        $quizAnswer->save();
        // if($request->lastOption) {
        //     $quizAnswer->save();
        //     return view('student.quizzes.results');
        // }
    }
}
