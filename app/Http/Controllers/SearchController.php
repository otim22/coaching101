<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Models\Category;
use Illuminate\Http\Request;
use Spatie\Searchable\Search;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        if (! $request->filled('query')) {
            return back()->with('error', 'Please enter something');
        }

        $searchResults = (new Search())
                                            ->registerModel(Subject::class, 'title')
                                            ->perform($request->input('query'))->paginate(12)->withQueryString();

        return view('student.subject_display.search_results', compact(['searchResults']));
    }
}
