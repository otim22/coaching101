<?php

namespace App\Http\Controllers\Student;

use App\Models\Question;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\ItemContent;
use Spatie\Searchable\Search;
use App\Http\Controllers\Controller;
use Spatie\Searchable\ModelSearchAspect;
use Illuminate\Pagination\LengthAwarePaginator;

class SearchController extends Controller
{
    public function videoSubjects(Request $request)
    {
        if (! $request->filled('query')) {
            return back()->with('error', 'Please enter something');
        }

        $approved = 1;

        $results = (new Search())
                                ->registerModel(ItemContent::class, function(ModelSearchAspect $modelSearchAspect) use ($approved) {
                                            $modelSearchAspect->addSearchableAttribute('title')
                                                            ->where('is_approved', $approved)
                                                            ->with('item');
                                })->search($request->input('query'))->paginate(16)->withQueryString();

        // $results = [];
        // foreach($searchResults as $searchResult) {
        //     $results[$searchResult->searchable->item->name . 's'][] = $searchResult;
        // }

        // $paginator  = $this->getPaginator($request, $results);

        return view('student.subject_display.search_results', compact('results'));
    }

    // private function getPaginator(Request $request, $results)
    // {
    //     foreach ($results as  $result) {
    //         $total = count($result);
    //         $page = $request->page ?? 1;
    //         $perPage = 8;
    //         $offset = ($page - 1) * $perPage;
    //         $result = array_slice($result, $offset, $perPage);
    //
    //         return new LengthAwarePaginator($result, $total, $perPage, $page, [
    //             'path' => $request->url(),
    //             'query' => $request->query()
    //         ]);
    //     }
    // }
}
