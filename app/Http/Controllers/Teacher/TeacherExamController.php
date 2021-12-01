<?php

namespace App\Http\Controllers\Teacher;

use App\Models\Item;
use App\Models\Exam;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\ItemContent;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ExamRequest;

class TeacherExamController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function index()
    {
        $exams = Exam::where('user_id', Auth::id())->paginate(20);
        return view('teacher.exams.index', compact('exams'));
    }

    public function create()
    {
        $items =  Item::get();
        $categories = Category::get();

        return view('teacher.exams.create', compact(['categories', 'items']));
    }

    public function store(ExamRequest $request)
    {
        $exam = new Exam();
        $exam->title = $request->input('title');
        $exam->item_id = $request->input('item_id');
        $exam->item_content_id = $request->input('item_content_id');
        $exam->user_id = Auth::id();
        $exam->save();

        return redirect()->route('examQuestions.create', $exam)->with('success', 'Exam saved successfully.');
    }

    public function show(Exam $exam)
    {
        return view('teacher.exams.show', compact('exam'));
    }

    public function edit(Exam $exam)
    {
        $items =  Item::get();
        $item =  Item::find($exam->item_id);
        $item_content =  ItemContent::find($exam->item_content_id);
        $categories = Category::get();
        $category = Category::find($exam->category_id);

        return view('teacher.exams.edit', compact([
            'exam', 'items', 'item', 'item_content', 'categories', 'category'
        ]));
    }

    public function update(ExamRequest $request, Exam $exam)
    {
        $exam->update($request->all());
        return redirect()->route('teacher.exams')->with('success', 'exam updated successfully.');
    }

    public function destroy(Exam $exam)
    {
        try {
            $exam->delete();
            return redirect()->route('teacher.exams')->with('success', 'exam deleted successfully');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
}
