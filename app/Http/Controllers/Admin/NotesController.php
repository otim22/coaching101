<?php

namespace App\Http\Controllers\Admin;

use App\Models\Year;
use App\Models\Term;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\ItemContent;
use App\Http\Controllers\Controller;
use App\Http\Requests\NoteRequest;

class NotesController extends Controller
{
    public function index()
    {
        $notes = ItemContent::where('item_id', 3)->paginate(20);

        return view('admin.notes.index', compact('notes'));
    }

    public function show(ItemContent $note)
    {
        return view('admin.notes.show', compact('note'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ItemContent $note)
    {
        try {
            $note->delete();

            return redirect()->route('admin.notes.index')->with('success', 'Notes deleted successfully');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function approve(ItemContent $note)
    {
        $approveNote = ItemContent::find($note->id);

        if($approveNote->is_approved == 0) {
            $approveNote->is_approved = 1;
            $approveNote->save();
        } else {
            return redirect()->route('admin.notes.index')->with('info', 'Note already approved');
        }

        return redirect()->route('admin.notes.index')->with('success', 'Note approved successfully');
    }
}
