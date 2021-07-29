<?php

namespace App\Http\Controllers\Student;

use JavaScript;
use App\Models\Year;
use App\Models\Term;
use App\Models\Standard;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\ItemContent;
use App\Helpers\SessionWrapper;
use App\Http\Controllers\Controller;
use App\Constants\GlobalConstants;

class BooksController extends Controller
{
    public function index()
    {
        $books =  ItemContent::getItemContents(GlobalConstants::ALL_SUBJECTS, GlobalConstants::ALL_LEVELS, GlobalConstants::ALL_YEARS, GlobalConstants::ALL_TERMS, GlobalConstants::BOOK);
        $standardId = SessionWrapper::getStandardId();
        $standards = Standard::find($standardId);
        $years =  $this->getMatchingYearsToLevel();
        $standardYears = $standards->years;
        $terms =  Term::get();
        $levels = $standards->levels;
        $categories = $standards->categories;

        return view('student.books.index', compact(['categories', 'years', 'standardYears', 'terms', 'books', 'levels']));
    }

    protected function getMatchingYearsToLevel($value = 'All levels')
    {
        $standardId = SessionWrapper::getStandardId();
        $standards = Standard::find($standardId);

        if($value == 'All levels') {
            return Year::where('standard_id', $standardId)->get();
        } else {
            return  Year::where(['standard_id' => $standardId, 'level_id' => $value])->get();
        }
    }

    public function show(ItemContent $book)
    {
        $bookPdfUrl = $book->getFirstMediaUrl('books');
    	JavaScript::put([
            'studentBook' => $bookPdfUrl
    	]);

        return view('student.books.show', compact('book'));
    }

    public function getMoreBooks(Request $request)
    {
        if ($request->ajax()) {
            $category = $request->book_category;
            $level= $request->level;
            $year = $request->book_year;
            $term = $request->book_term;
            $item = GlobalConstants::BOOK;

            $books = ItemContent::getItemContents($category, $level, $year, $term, $item);

            return view('student.books.partials.filtered_books', compact('books'));
        }
    }
}
