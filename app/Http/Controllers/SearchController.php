<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Models\Category;
use Illuminate\Http\Request;
use Spatie\Searchable\Search;
use Spatie\Searchable\ModelSearchAspect;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        if (! $request->filled('query')) {
            return back()->with('error', 'Please enter something');
        }

        $approved = 1;

        $searchResults = (new Search())
                                ->registerModel(Subject::class, function(ModelSearchAspect $modelSearchAspect) use ($approved) {
                                            $modelSearchAspect->addSearchableAttribute('title')
                                                            ->addExactSearchableAttribute('subtitle')
                                                            ->where('is_approved', $approved);
                                })->search($request->input('query'))->paginate(12)->withQueryString();

        return view('student.subject_display.search_results', compact('searchResults'));
    }
}
