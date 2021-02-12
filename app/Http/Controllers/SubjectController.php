<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Year;
use App\Models\Term;
use App\Models\Topic;
use App\Models\Ratings;
use App\Models\Subject;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\SubjectRequest;

class SubjectController extends Controller
{
    public function __construct()
    {
       $this->middleware('teacher')->except('teaching');
    }

    public function index(Subject $subject)
    {
        $subjects = Subject::orderBy('id', 'desc')->where('user_id', Auth::id())->paginate(10);

        return view('pages.manage_subject.index', compact('subjects'));
    }

    public function create()
    {
        $categories = Category::get();
        $years = Year::get();
        $terms = Term::get();

        return view('pages.manage_subject.create', compact(['categories', 'years', 'terms']));
    }

    public function show(Subject $subject)
    {
        return view('pages.manage_subject.show', compact('subject'));
    }

    public function store(SubjectRequest $request, Subject $subject)
    {
        $subject = new Subject($request->except(['cover_image']));

        $subject->title     = $request->input('title');
        $subject->subtitle      = $request->input('subtitle');
        $subject->description = $request->input('description');
        $subject->category_id = $request->input('category_id');
        $subject->year_id = $request->input('year_id');
        $subject->term_id = $request->input('term_id');
        $subject->user_id = Auth::user()->id;

        $category = Category::findOrFail($request->input('category_id'));
        $category->years()->attach($request->input('year_id'));

        $year = Year::findOrFail($request->input('year_id'));
        $year->terms()->attach($request->input('term_id'));

        $subject->save();

        if($request->hasFile('cover_image') && $request->file('cover_image')->isValid()) {
            $subject->addMediaFromRequest('cover_image')
                            ->preservingOriginal()
                            ->toMediaCollection('default');
        }

        return redirect()->route('audiences', $subject);
    }

    public function edit(Subject $subject)
    {
        $categories = Category::get();
        $category = Category::find($subject->category_id);
        $years = Year::get();
        $year = Year::find($subject->year_id);
        $terms = Term::get();
        $term = Term::find($subject->term_id);

        return view('pages.manage_subject.edit', compact([
            'subject', 'categories', 'category', 'years', 'year', 'terms', 'term'
        ]));
    }


    public function update(Request $request, Subject $subject)
    {
        // dd($request);
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
