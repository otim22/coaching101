<?php

namespace App\Http\Controllers\Teacher;

use App\Models\Item;
use App\Models\Quiz;
use App\Models\Year;
use App\Models\Term;
use App\Models\Level;
use App\Models\Standard;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\ItemContent;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\QuizRequest;

class TeacherQuizController extends Controller
{
    public function index()
    {
        $quizzes = Quiz::where('user_id', Auth::id())->paginate(20);
        return view('teacher.quizzes.index', compact('quizzes'));
    }

    public function create()
    {
        $levels = ItemContent::getLevelsToStandard();
        $years = ItemContent::getYearsToLevel();
        $terms =  Term::get();
        $items =  Item::get();
        $standards = Standard::get();
        $categories = Category::get();

        return view('teacher.quizzes.create', compact(['categories', 'items', 'years', 'terms', 'standards', 'levels']));
    }

    public function store(QuizRequest $request)
    {
        $quiz = new Quiz();
        $quiz->title = $request->input('title');
        $quiz->level_id = $request->input('level_id');
        $quiz->item_id = $request->input('item_id');
        $quiz->item_content_id = $request->input('item_content_id');
        $quiz->standard_id = $request->input('standard_id');
        $quiz->category_id = $request->input('category_id');
        $quiz->year_id = $request->input('year_id');
        $quiz->term_id = $request->input('term_id');
        $quiz->user_id = $request->input('user_id');
        $quiz->user_id = Auth::id();
        $quiz->save();

        return redirect()->route('quizQuestions.create', $quiz)->with('success', 'Quiz saved successfully.');
    }

    public function show(Quiz $quiz)
    {
        return view('teacher.quizzes.show', compact('quiz'));
    }

    public function edit(Quiz $quiz)
    {
        $levels = ItemContent::getLevelsToStandard();
        $years = ItemContent::getYearsToLevel();
        $terms =  Term::get();
        $items =  Item::get();
        $item =  Item::find($quiz->item_id);
        $item_content =  ItemContent::find($quiz->item_content_id);
        $standards = Standard::get();
        $standard = Standard::find($quiz->standard_id);
        $level = Level::find($quiz->level_id);
        $categories = Category::get();
        $category = Category::find($quiz->category_id);
        $year = Year::find($quiz->year_id);
        $term = Term::find($quiz->term_id);

        return view('teacher.quizzes.edit', compact([
            'quiz', 'years', 'terms', 'items', 'item', 'item_content', 'categories', 'category', 'year', 'term', 'standards', 'standard', 'levels', 'level'
        ]));
    }

    public function update(QuizRequest $request, Quiz $quiz)
    {
        $quiz->update($request->all());
        return redirect()->route('teacher.quizzes')->with('success', 'quiz updated successfully.');
    }

    public function destroy(Quiz $quiz)
    {
        try {
            $quiz->delete();
            return redirect()->route('teacher.quizzes')->with('success', 'quiz deleted successfully');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
}
