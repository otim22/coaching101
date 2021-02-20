<?php

namespace App\Http\Controllers;

use App\Models\Year;
use App\Models\Term;
use App\Models\Note;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\NoteRequest;

class TeacherNoteController extends Controller
{
    public function index()
    {
        $notes = Note::where('user_id', Auth::id())->paginate(20);

        return view('teacher.notes.index', compact('notes'));
    }

    public function create()
    {
        $years =  Year::get();
        $terms =  Term::get();
        $categories = Category::get();

        return view('teacher.notes.create', compact(['categories', 'years', 'terms']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NoteRequest $request, Note $note)
    {
        $note = new Note($request->except('note'));

        $note->title = $request->input('title');
        $note->price = $request->input('price');
        $note->category_id = $request->input('category_id');
        $note->year_id = $request->input('year_id');
        $note->term_id = $request->input('term_id');
        $note->user_id = $request->input('user_id');
        $note->user_id = Auth::id();

        $note->save();

        if($request->hasFile('note') && $request->file('note')->isValid()) {
            $note->addMediaFromRequest('note')->toMediaCollection('teacher_note');
        }

        return redirect()->route('teacher.notes')->with('success', 'Note added successfully.');
    }

    public function show(Note $note)
    {
        return view('teacher.notes.show', compact('note'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Note $note)
    {
        $years =  Year::get();
        $terms =  Term::get();
        $categories = Category::get();
        $category = Category::where('id', $note->category_id)->firstOrFail();
        $year = Year::where('id', $note->year_id)->firstOrFail();
        $term = Term::where('id', $note->term_id)->firstOrFail();

        return view('teacher.notes.edit', compact(['note', 'years', 'terms', 'categories', 'category', 'year', 'term']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Note $note)
    {
        $request->validate([
            'title' => 'required|string',
            'price' => 'nullable',
            'category_id' => 'required|integer',
            'year_id' => 'required|integer',
            'term_id' => 'required|integer',
            'note' => 'nullable|mimes:pdf|max:5000',
            'user_id' => 'integer|nullable',
        ]);

        $note->fill($request->except(['note']))->save();

        if($request->hasFile('note') && $request->file('note')->isValid()) {
            $note->addMediaFromRequest('note')->toMediaCollection('teacher_note');
        }

        return redirect()->route('teacher.notes')->with('success', 'Note added successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Note $note)
    {
        try {
            $note->delete();

            return redirect()->route('teacher.notes')->with('success', 'Note deleted successfully');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
}
