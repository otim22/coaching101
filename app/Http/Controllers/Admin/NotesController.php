<?php

namespace App\Http\Controllers\Admin;

use App\Models\Year;
use App\Models\Term;
use App\Models\Category;
use App\Models\Note;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\NoteRequest;

class NotesController extends Controller
{
    public function index()
    {
        $notes = Note::paginate(20);

        return view('admin.notes.index', compact('notes'));
    }

    public function create()
    {
        $years =  Year::get();
        $terms =  Term::get();
        $categories = Category::get();

        return view('admin.notes.create', compact(['categories', 'years', 'terms']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NoteRequest $request, Note $note)
    {
        $note = new Note($request->except(['note']));

        $note->save();

        if($request->hasFile('note') && $request->file('note')->isValid()) {
            $note->addMediaFromRequest('note')->toMediaCollection('note');
        }

        return redirect()->route('admin.notes.index')->with('success', 'Notes added successfully.');
    }

    public function show(Note $note)
    {
        return view('admin.notes.show', compact('note'));
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
        $pdfs = $note->getMedia();

        return view('admin.notes.edit', compact(['note', 'years', 'terms', 'categories', 'category', 'year', 'term', 'pdfs']));
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
            'notes_objective.*'  => 'nullable|string|distinct|min:2',
            'category_id' => 'required|integer',
            'year_id' => 'required|integer',
            'term_id' => 'required|integer',
            'note' => 'nullable|mimes:pdf|max:5000',
            'user_id' => 'integer|nullable',
        ]);

        $note->fill($request->except(['note']))->save();

        if($request->hasFile('note') && $request->file('note')->isValid()) {
            $note->addMediaFromRequest('note')->toMediaCollection('note');
        }

        return redirect()->route('admin.notes.index')->with('success', 'Note added successfully.');
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

            return redirect()->route('admin.notes.index')->with('success', 'Notes deleted successfully');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function approve(Note $note)
    {
        $approveNote = Note::find($note->id);

        if($approveNote->is_approved == 0) {
            $approveNote->is_approved = 1;
            $approveNote->save();
        } else {
            return redirect()->route('admin.notes.index')->with('info', 'Note already approved');
        }

        return redirect()->route('admin.notes.index')->with('success', 'Note approved successfully');
    }
}
