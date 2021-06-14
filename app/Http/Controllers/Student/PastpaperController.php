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

class PastpaperController extends Controller
{
    public function index()
    {
        $pastpapers =  ItemContent::getItemContents(GlobalConstants::ALL_SUBJECTS, GlobalConstants::ALL_YEARS, GlobalConstants::ALL_TERMS, GlobalConstants::PASTPAPER);
        $standardId = SessionWrapper::getStandardId();
        $standards = Standard::find($standardId);
        $years =  Year::where('standard_id', $standardId)->get();
        $terms =  Term::get();
        $levels = $standards->levels;
        $categories = $standards->categories;

        return view('student.pastpapers.index', compact(['pastpapers', 'categories', 'years', 'terms', 'levels']));
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
