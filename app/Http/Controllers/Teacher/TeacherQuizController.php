<?php

namespace App\Http\Controllers\Teacher;

use App\Models\Item;
use App\Models\Quiz;
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
        $items =  Item::get();
        $categories = Category::get();

        return view('teacher.quizzes.create', compact(['categories', 'items']));
    }

    public function store(QuizRequest $request)
    {
        $quiz = new Quiz();
        $quiz->title = $request->input('title');
        $quiz->item_id = $request->input('item_id');
        $quiz->item_content_id = $request->input('item_content_id');
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
        $items =  Item::get();
        $item =  Item::find($quiz->item_id);
        $item_content =  ItemContent::find($quiz->item_content_id);
        $categories = Category::get();
        $category = Category::find($quiz->category_id);

        return view('teacher.quizzes.edit', compact([
            'quiz', 'items', 'item', 'item_content', 'categories', 'category'
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
