<?php

namespace App\Http\Controllers\Student;

use App\Models\Year;
use App\Models\Term;
use App\Models\Subject;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\ItemContent;
use App\Http\Controllers\Controller;
use App\Constants\GlobalConstants;

class NotesController extends Controller
{
    public function index()
    {
        $notes =  ItemContent::getItemContents(GlobalConstants::ALL_SUBJECTS, GlobalConstants::ALL_YEARS, GlobalConstants::ALL_TERMS, GlobalConstants::NOTE);
        $years =  Year::get();
        $terms =  Term::get();
        $categories = Category::get();

        return view('student.notes.index', compact(['notes', 'categories', 'years', 'terms']));
    }

    public function show(ItemContent $note)
    {
        return view('student.notes.show', compact('note'));
    }

    public function getMoreNotes(Request $request)
    {
        if ($request->ajax()) {
            $category = $request->notes_category;
            $year = $request->notes_year;
            $term = $request->notes_term;
            $item = GlobalConstants::NOTE;

            $notes = ItemContent::getItemContents($category, $year, $term, $item);

            return view('student.notes.partials.filtered_notes', compact('notes'));
        }
    }
}
