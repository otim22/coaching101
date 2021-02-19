<?php

namespace App\Http\Controllers;

use App\Models\Year;
use App\Models\Term;
use App\Models\Subject;
use App\Models\Category;
use App\Models\PastPaper;
use Illuminate\Http\Request;
use App\Constants\GlobalConstants;

class PastPapersController extends Controller
{
    public function index()
    {
        $pastpapers =  PastPaper::getPastpapers(GlobalConstants::ALL_SUBJECTS, GlobalConstants::ALL_YEARS, GlobalConstants::ALL_TERMS);
        $years =  Year::get();
        $terms =  Term::get();
        $categories = Category::get();

        return view('pages.pastpapers.index', compact(['pastpapers', 'categories', 'years', 'terms']));
    }

    public function show(PastPaper $pastpaper)
    {
        return view('pages.pastpapers.show', compact('pastpaper'));
    }

    public function getMorePastpapers(Request $request)
    {
        $category = $request->pastpaper_category;
        $year = $request->pastpaper_year;
        $term = $request->pastpaper_term;

        if ($request->ajax()) {
            $pastpapers = PastPaper::getPastpapers($category, $year, $term);

            return view('pages.pastpapers.partials.filtered_pastpapers', compact('pastpapers'));
        }
    }
}
