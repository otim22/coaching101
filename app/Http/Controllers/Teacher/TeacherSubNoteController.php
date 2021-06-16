<?php

namespace App\Http\Controllers\Teacher;

use App\Models\SubNote;
use Illuminate\Http\Request;
use App\Models\ItemContent;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TeacherSubNoteController extends Controller
{
    public function create(ItemContent $note)
    {
        return view('teacher.notes.sub_notes.create', compact('note'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, ItemContent $note)
    {
        $request->validate([
            'title' => 'required',
            'note' => 'required|mimes:pdf'
        ]);
        $subNote = new SubNote($request->except('note'));
        $subNote->item_content_id = $note->id;
        $subNote->title = $request->input('title');
        $subNote->user_id = Auth::id();
        $subNote->save();

        if($request->hasFile('note') && $request->file('note')->isValid()) {
            $subNote->addMediaFromRequest('note')->toMediaCollection('notes');
        }

        return redirect()->route('subNotes.show', [$note, $subNote])->with('success', 'Notes added successfully.');
    }

    public function show(ItemContent $note, SubNote $subNote)
    {
        return view('teacher.notes.sub_notes.show', compact(['subNote', 'note']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(ItemContent $note, SubNote $subNote)
    {
        return view('teacher.notes.sub_notes.edit', compact(['subNote', 'note']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ItemContent $note, SubNote $subNote)
    {
        $request->validate([
            'title' => 'required',
            'note' => 'nullable|mimes:pdf'
        ]);

        $subNote->title = $request->input('title');

        if($request->hasFile('note') && $request->file('note')->isValid()) {
            foreach ($subNote->media as $media) {
                $media->delete();
            }
            $subNote->addMediaFromRequest('note')->toMediaCollection('notes');
        }

        $subNote->save();

        return redirect()->route('subNotes.show', [$note, $subNote])->with('success', 'Notes updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ItemContent $note, SubNote $subNote)
    {
        try {
            $subNote->delete();
            return redirect()->route('subNotes.show', [$note, $subNote])->with('success', 'Notes deleted successfully');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
}
