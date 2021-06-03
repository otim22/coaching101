<?php

namespace App\Http\Controllers\Student;

use App\Models\Year;
use App\Models\Term;
use App\Models\Subject;
use App\Models\Standard;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\ItemContent;
use App\Helpers\SessionWrapper;
use App\Http\Controllers\Controller;
use App\Constants\GlobalConstants;

class NotesController extends Controller
{
    public function index()
    {
        $notes =  ItemContent::getItemContents(GlobalConstants::ALL_SUBJECTS, GlobalConstants::ALL_YEARS, GlobalConstants::ALL_TERMS, GlobalConstants::NOTE);
        $standardId = SessionWrapper::getStandardId();
        $standards = Standard::find($standardId);
        $years =  Year::where('standard_id', $standardId)->get();
        $terms =  Term::get();
        $levels = $standards->levels;
        $categories = $standards->categories;

        return view('student.notes.index', compact(['notes', 'categories', 'years', 'terms', 'levels']));
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
