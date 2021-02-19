<?php

namespace App\Http\Controllers;

use App\Models\Year;
use App\Models\Note;
use App\Models\Term;
use App\Models\Subject;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Constants\GlobalConstants;

class NotesController extends Controller
{
    public function index()
    {
        $notes =  Note::getNotes(GlobalConstants::ALL_SUBJECTS, GlobalConstants::ALL_YEARS, GlobalConstants::ALL_TERMS);
        $years =  Year::get();
        $terms =  Term::get();
        $categories = Category::get();

        return view('student.notes.index', compact(['notes', 'categories', 'years', 'terms']));
    }

    public function show(Note $note)
    {
        return view('student.notes.show', compact('note'));
    }

    public function getMoreNotes(Request $request)
    {
        $category = $request->notes_category;
        $year = $request->notes_year;
        $term = $request->notes_term;

        if ($request->ajax()) {
            $notes = Note::getNotes($category, $year, $term);

            return view('student.notes.partials.filtered_notes', compact('notes'));
        }
    }
}
