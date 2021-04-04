<?php

namespace App\Http\Controllers;

use App\Models\Year;
use App\Models\Term;
use App\Models\Topic;
use App\Models\Ratings;
use App\Models\Subject;
use App\Models\ItemContent;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\SubjectRequest;

class SubjectController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('onBoard');
    }

    public function index(Subject $subjects)
    {
        $subjects = Subject::orderBy('id', 'desc')->where('user_id', Auth::id())->paginate(10);

        return view('teacher.manage_subject.index', compact('subjects'));
    }

    public function create()
    {
        $categories = Category::get();
        $years = Year::get();
        $terms = Term::get();

        return view('teacher.manage_subject.create', compact(['categories', 'years', 'terms']));
    }

    public function show(Subject $subject)
    {
        return view('teacher.manage_subject.show', compact('subject'));
    }

    public function store(SubjectRequest $request)
    {
        $itemContent = new ItemContent($request->except(['cover_image']));
        dd($itemContent);

        // $itemContent->title = $request->input('item');
        $itemContent->title = $request->input('title');
        $itemContent->subtitle = $request->input('subtitle');
        $itemContent->description = $request->input('description');
        $itemContent->category_id = $request->input('category_id');
        $itemContent->year_id = $request->input('year_id');
        $itemContent->term_id = $request->input('term_id');
        $itemContent->user_id = Auth::id();

        $category = Category::findOrFail($request->input('category_id'));
        $category->years()->attach($request->input('year_id'));

        $year = Year::findOrFail($request->input('year_id'));
        $year->terms()->attach($request->input('term_id'));

        $itemContent->save();

        if($request->hasFile('cover_image') && $request->file('cover_image')->isValid()) {
            $itemContent->addMediaFromRequest('cover_image')
                            ->preservingOriginal()
                            ->toMediaCollection('default');
        }

        return redirect()->route('audiences', $itemContent);
    }

    public function edit(Subject $subject)
    {
        $categories = Category::get();
        $category = Category::find($subject->category_id);
        $years = Year::get();
        $year = Year::find($subject->year_id);
        $terms = Term::get();
        $term = Term::find($subject->term_id);

        return view('teacher.manage_subject.edit', compact([
            'subject', 'categories', 'category', 'years', 'year', 'terms', 'term'
        ]));
    }


    public function update(Request $request, Subject $subject)
    {
        $request->validate([
            'title' => 'required|string',
            'subtitle' => 'nullable|string',
            'description' => 'required|string',
            'category_id' => 'required|integer',
            'year_id' => 'required|integer',
            'term_id' => 'required|integer',
            'price' => 'required|string',
            'cover_image' => 'nullable|image|mimes:jpg, jpeg, png|max:5520'
        ]);

        $subject->fill($request->except(['cover_image']))->save();

        if($request->hasFile('cover_image') && $request->file('cover_image')->isValid()) {
            $subject->addMediaFromRequest('cover_image')->toMediaCollection('default');
        }

        return redirect()->route('subjects.show', $subject)->with('success', 'Subject updated successfully');
    }

    public function onBoard()
    {
        return view('teacher.pages.index');
    }

    public function starter()
    {
        return view('teacher.pages.start.index');
    }

    public function captureRole(Request $request)
    {
        $user = Auth::user();
        $user->role = $request->role;
        $user->save();

        return redirect()->route('manage.subjects');
    }

    public function destroy(Subject $subject)
    {
        try {
            $subject->delete();

            return redirect()->route('manage.subjects')->with('success', 'Subject deleted successfully');
        } catch (\Exception $e) {
            return redirect()->route('manage.subjects')->with('error', 'Failed to deleted subject');
        }
    }
}
