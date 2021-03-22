<?php

namespace App\Http\Controllers;

use App\Models\Year;
use App\Models\Term;
use App\Models\Subject;
use App\Models\Category;
use Illuminate\Http\Request;
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
        $subjects =  Subject::getSubjects(GlobalConstants::ALL_SUBJECTS, GlobalConstants::ALL_YEARS, GlobalConstants::ALL_TERMS);
        $years =  Year::get();
        $terms =  Term::get();
        $categories = Category::get();

        return view('home', compact(['subjects', 'categories', 'years', 'terms']));
    }

    public function getMoreSubjects(Request $request)
    {
        $category= $request->category;
        $year= $request->year;
        $term= $request->term;

        if ($request->ajax()) {
            $subjects = Subject::getSubjects($category, $year, $term);

            return view('student.subject_display.filtered_subjects', compact('subjects'));
        }
    }

    public function mySubjects()
    {
        return view('student.my_subjects.index');
    }
}
