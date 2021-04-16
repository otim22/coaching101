<?php

namespace App\Http\Controllers;

use App\Models\Year;
use App\Models\Term;
use App\Models\Subject;
use App\Models\Category;
use App\Models\ItemContent;
use Illuminate\Http\Request;
use App\Constants\GlobalConstants;

class PastpaperController extends Controller
{
    public function index()
    {
        $pastpapers =  ItemContent::getPastpapers(GlobalConstants::ALL_SUBJECTS, GlobalConstants::ALL_YEARS, GlobalConstants::ALL_TERMS);
        $years =  Year::get();
        $terms =  Term::get();
        $categories = Category::get();

        return view('student.pastpapers.index', compact(['pastpapers', 'categories', 'years', 'terms']));
    }

    public function show(ItemContent $pastpaper)
    {
        return view('student.pastpapers.show', compact('pastpaper'));
    }

    public function getMorePastpapers(Request $request)
    {
        if ($request->ajax()) {
            $category = $request->pastpaper_category;
            $year = $request->pastpaper_year;
            $term = $request->pastpaper_term;

            $pastpapers = ItemContent::getPastpapers($category, $year, $term);

            return view('student.pastpapers.partials.filtered_pastpapers', compact('pastpapers'));
        }
    }
}
