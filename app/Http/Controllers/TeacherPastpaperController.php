<?php

namespace App\Http\Controllers;

use App\Models\Year;
use App\Models\Term;
use App\Models\Category;
use App\Models\PastPaper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\PastpaperRequest;

class TeacherPastpaperController extends Controller
{
    public function index()
    {
        $pastpapers = PastPaper::where('user_id', Auth::id())->paginate(20);

        return view('teacher.pastpapers.index', compact('pastpapers'));
    }

    public function create()
    {
        $years =  Year::get();
        $terms =  Term::get();
        $categories = Category::get();

        return view('teacher.pastpapers.create', compact(['categories', 'years', 'terms']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PastpaperRequest $request, PastPaper $pastpaper)
    {
        $pastpaper = new PastPaper($request->except('pastpaper'));

        $pastpaper->title = $request->input('title');
        $pastpaper->price = $request->input('price');
        $pastpaper->category_id = $request->input('category_id');
        $pastpaper->year_id = $request->input('year_id');
        $pastpaper->term_id = $request->input('term_id');
        $pastpaper->user_id = $request->input('user_id');
        $pastpaper->user_id = Auth::id();

        $pastpaper->save();

        if($request->hasFile('pastpaper') && $request->file('pastpaper')->isValid()) {
            $pastpaper->addMediaFromRequest('pastpaper')->toMediaCollection('teacher_pas');
        }

        return redirect()->route('teacher.pastpapers')->with('success', 'PastPaper added successfully.');
    }

    public function show(PastPaper $pastpaper)
    {
        return view('teacher.pastpapers.show', compact('pastpaper'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(PastPaper $pastpaper)
    {
        $years =  Year::get();
        $terms =  Term::get();
        $categories = Category::get();
        $category = Category::where('id', $pastpaper->category_id)->firstOrFail();
        $year = Year::where('id', $pastpaper->year_id)->firstOrFail();
        $term = Term::where('id', $pastpaper->term_id)->firstOrFail();

        return view('teacher.pastpapers.edit', compact(['pastpaper', 'years', 'terms', 'categories', 'category', 'year', 'term']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PastPaper $pastpaper)
    {
        $request->validate([
            'title' => 'required|string',
            'price' => 'nullable',
            'category_id' => 'required|integer',
            'year_id' => 'required|integer',
            'term_id' => 'required|integer',
            'pastpaper' => 'nullable|mimes:pdf|max:5000',
            'user_id' => 'integer|nullable',
        ]);

        $pastpaper->fill($request->except(['pastpaper']))->save();

        if($request->hasFile('pastpaper') && $request->file('pastpaper')->isValid()) {
            $pastpaper->addMediaFromRequest('pastpaper')->toMediaCollection('teacher_pastpaper');
        }

        return redirect()->route('teacher.pastpapers')->with('success', 'PastPaper added successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(PastPaper $pastpaper)
    {
        try {
            $pastpaper->delete();

            return redirect()->route('teacher.pastpapers')->with('success', 'PastPaper deleted successfully');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
}
