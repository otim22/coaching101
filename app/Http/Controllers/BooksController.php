<?php

namespace App\Http\Controllers;

use App\Models\Year;
use App\Models\Term;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\ItemContent;
use App\Constants\GlobalConstants;

class BooksController extends Controller
{
    public function index()
    {
        $books =  ItemContent::getItemContents(GlobalConstants::ALL_SUBJECTS, GlobalConstants::ALL_YEARS, GlobalConstants::ALL_TERMS, GlobalConstants::BOOK);
        $years =  Year::get();
        $terms =  Term::get();
        $categories = Category::get();

        return view('student.books.index', compact(['categories', 'years', 'terms', 'books']));
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
