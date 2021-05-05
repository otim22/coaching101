<?php

namespace App\Http\Controllers;

use App\Models\Year;
use App\Models\Term;
use App\Models\Category;
use App\Models\ItemContent;
use Illuminate\Http\Request;
use App\Constants\GlobalConstants;

class PastpaperController extends Controller
{
    public function index()
    {
        $pastpapers =  ItemContent::getItemContents(GlobalConstants::ALL_SUBJECTS, GlobalConstants::ALL_YEARS, GlobalConstants::ALL_TERMS, GlobalConstants::PASTPAPER);
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
            $item = GlobalConstants::PASTPAPER;

            $pastpapers = ItemContent::getItemContents($category, $year, $term, $item);

            return view('student.pastpapers.partials.filtered_pastpapers', compact('pastpapers'));
        }
    }
}
