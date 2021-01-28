<?php

namespace App\Http\Controllers;

use App\Models\Year;
use App\Models\Term;
use App\Models\Subject;
use App\Models\Category;
use Illuminate\Http\Request;
use Livewire\WithPagination;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $subjects =  Subject::getSubjects('', '', '');
        $years =  Year::get();
        $terms =  Term::get();
        $categories = Category::get();

        return view('home', compact(['subjects', 'categories', 'years', 'terms']));
    }

    public function getMoreSubjects(request $request)
    {
        $category= $request->category;
        $year= $request->year;
        $term= $request->term;

        if ($request->ajax()) {
            $subjects = Subject::getSubjects($category, $year, $term);

            return view('pages.subject_display.filtered_subjects', compact('subjects'));
        }
    }
}
