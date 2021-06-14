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

class BooksController extends Controller
{
    public function index()
    {
        $books =  ItemContent::getItemContents(GlobalConstants::ALL_SUBJECTS, GlobalConstants::ALL_YEARS, GlobalConstants::ALL_TERMS, GlobalConstants::BOOK);
        $standardId = SessionWrapper::getStandardId();
        $standards = Standard::find($standardId);
        $years =  Year::where('standard_id', $standardId)->get();
        $terms =  Term::get();
        $levels = $standards->levels;
        $categories = $standards->categories;

        return view('student.books.index', compact(['categories', 'years', 'terms', 'books', 'levels']));
    }

    public function show(ItemContent $book)
    {
        return view('student.books.show', compact('book'));
    }

    public function getMoreBooks(Request $request)
    {
        if ($request->ajax()) {
            $category = $request->book_category;
            $year = $request->book_year;
            $term = $request->book_term;
            $item = GlobalConstants::BOOK;

            $books = ItemContent::getItemContents($category, $year, $term, $item);

            return view('student.books.partials.filtered_books', compact('books'));
        }
    }
}
