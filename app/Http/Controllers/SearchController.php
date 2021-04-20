<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\ItemContent;
use Spatie\Searchable\Search;
use Spatie\Searchable\ModelSearchAspect;

class SearchController extends Controller
{
    public function videoSubjects(Request $request)
    {
        if (! $request->filled('query')) {
            return back()->with('error', 'Please enter something');
        }

        $approved = 1;

        $searchResults = (new Search())
                                ->registerModel(ItemContent::class, function(ModelSearchAspect $modelSearchAspect) use ($approved) {
                                            $modelSearchAspect->addSearchableAttribute('title')
                                                            ->addSearchableAttribute('subtitle')
                                                            ->where('is_approved', $approved);
                                })->search($request->input('query'))->paginate(12)->withQueryString();

        return view('student.subject_display.search_results', compact('searchResults'));
    }

    // public function subjectQuestions(Request $request)
    // {
    //     if (! $request->filled('query')) {
    //         return back()->with('error', 'Please enter something');
    //     }
    //
    //     $searchResults = (new Search())
    //                             ->registerModel(Question::class, 'body')->search($request->input('query'))->paginate(12)->withQueryString();
    //
    //     return view('student.subject_display.show', compact('searchResults'));
    // }
}
