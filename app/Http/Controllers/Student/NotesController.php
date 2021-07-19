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
        $notes =  ItemContent::getItemContents(GlobalConstants::ALL_SUBJECTS, GlobalConstants::ALL_LEVELS, GlobalConstants::ALL_YEARS, GlobalConstants::ALL_TERMS, GlobalConstants::NOTE);
        $standardId = SessionWrapper::getStandardId();
        $standards = Standard::find($standardId);
        $years =  $this->getMatchingYearsToLevel();
        $standardYears = $standards->years;
        $terms =  Term::get();
        $levels = $standards->levels;
        $categories = $standards->categories;

        return view('student.notes.index', compact(['notes', 'categories', 'years', 'standardYears', 'terms', 'levels']));
    }

    protected function getMatchingYearsToLevel($value = null)
    {
        $standardId = SessionWrapper::getStandardId();
        $standards = Standard::find($standardId);

        if($value == 'All levels') {
            return Year::where('standard_id', $standardId)->get();
        } else {
            return  Year::where(['standard_id' => $standardId, 'level_id' => $value])->get();
        }
    }

    public function show(ItemContent $note)
    {
        return view('student.notes.show', compact('note'));
    }

    public function getMoreNotes(Request $request)
    {
        if ($request->ajax()) {
            $category = $request->notes_category;
            $level= $request->level;
            $year = $request->notes_year;
            $term = $request->notes_term;
            $item = GlobalConstants::NOTE;

            $notes = ItemContent::getItemContents($category, $level, $year, $term, $item);

            return view('student.notes.partials.filtered_notes', compact('notes'));
        }
    }
}
