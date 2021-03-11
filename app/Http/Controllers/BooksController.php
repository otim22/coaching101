<?php

namespace App\Http\Controllers;

use App\Models\Year;
use App\Models\Book;
use App\Models\Term;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Constants\GlobalConstants;

class BooksController extends Controller
{
    public function index()
    {
        $books =  Book::getBooks(GlobalConstants::ALL_SUBJECTS, GlobalConstants::ALL_YEARS, GlobalConstants::ALL_TERMS);
        $years =  Year::get();
        $terms =  Term::get();
        $categories = Category::get();

        return view('student.books.index', compact(['categories', 'years', 'terms', 'books']));
    }

    public function show(Book $book)
    {
        return view('student.books.show', compact('book'));
    }

    public function getMoreBooks(Request $request)
    {
        if ($request->ajax()) {
            $category = $request->book_category;
            $year = $request->book_year;
            $term = $request->book_term;

            $books = Book::getBooks($category, $year, $term);

            return view('student.books.partials.filtered_books', compact('books'));
        }
    }
}
