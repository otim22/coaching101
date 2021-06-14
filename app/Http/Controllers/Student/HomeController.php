<?php

namespace App\Http\Controllers\Student;

use App\Models\Year;
use App\Models\Term;
use App\Models\Standard;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\ItemContent;
use App\Helpers\SessionWrapper;
use App\Http\Controllers\Controller;
use App\Constants\GlobalConstants;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware(['auth', 'verified']);
    }

    public function index()
    {
        $subjects =  ItemContent::getItemContents(GlobalConstants::ALL_SUBJECTS, GlobalConstants::ALL_YEARS, GlobalConstants::ALL_TERMS, GlobalConstants::SUBJECT);
        $standardId = SessionWrapper::getStandardId();
        $standards = Standard::find($standardId);
        $years =  Year::where('standard_id', $standardId)->get();
        $terms =  Term::get();
        $levels = $standards->levels;
        $categories = $standards->categories;

        return view('home', compact(['subjects', 'categories', 'years', 'terms', 'levels']));
    }

    public function getMoreSubjects(Request $request)
    {
        $category= $request->category;
        $year= $request->year;
        $term= $request->term;
        $item = GlobalConstants::SUBJECT;

        if ($request->ajax()) {
            $subjects = ItemContent::getItemContents($category, $year, $term, $item);

            return view('student.subject_display.filtered_subjects', compact('subjects'));
        }
    }

    public function mySubjects()
    {
        return view('student.account.index');
    }
}
