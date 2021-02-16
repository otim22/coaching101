<?php

namespace App\Http\Controllers;

use App\Models\Year;
use App\Models\Term;
use App\Models\Subject;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Constants\GlobalConstants;

class NotesController extends Controller
{
    public function index()
    {
        $subjects =  Subject::getSubjects(GlobalConstants::ALL_SUBJECTS, GlobalConstants::ALL_YEARS, GlobalConstants::ALL_TERMS);
        $years =  Year::get();
        $terms =  Term::get();
        $categories = Category::get();

        return view('pages.notes.index', compact(['subjects', 'categories', 'years', 'terms']));
    }
}
