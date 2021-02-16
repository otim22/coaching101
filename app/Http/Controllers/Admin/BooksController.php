<?php

namespace App\Http\Controllers\Admin;

use App\Models\Book;
use App\Models\Year;
use App\Models\Term;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\BookRequest;

class BooksController extends Controller
{
    public function index()
    {
        $books = Book::paginate(12);

        return view('admin.books.index', compact('books'));
    }

    public function create()
    {
        $years =  Year::get();
        $terms =  Term::get();
        $categories = Category::get();

        return view('admin.books.create', compact(['categories', 'years', 'terms']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BookRequest $request, Book $book)
    {
        $book = new Book($request->except(['book']));

        $book->save();

        if($request->hasFile('book') && $request->file('book')->isValid()) {
            $book->addMediaFromRequest('book')->toMediaCollection('default');
        }

        return redirect()->route('admin.books.index')->with('success', 'Book added successfully.');
    }

    public function show(Book $book)
    {
        return view('admin.books.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        $years =  Year::get();
        $terms =  Term::get();
        $categories = Category::get();
        $category = Category::where('id', $book->category_id)->firstOrFail();
        $year = Year::where('id', $book->year_id)->firstOrFail();
        $term = Term::where('id', $book->term_id)->firstOrFail();
        $pdfs = $book->getMedia();

        return view('admin.books.edit', compact(['book', 'years', 'terms', 'categories', 'category', 'year', 'term', 'pdfs']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(BookRequest $request, Book $book)
    {
        $book->fill($request->except(['book']))->save();

        if($request->hasFile('book') && $request->file('book')->isValid()) {
            $book->addMediaFromRequest('book')
                            ->preservingOriginal()
                            ->toMediaCollection('default');
        }

        return redirect()->route('admin.books.index')->with('success', 'Book added successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        try {
            $book->delete();

            return redirect()->route('admin.books.index')->with('success', 'Book deleted successfully');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
}
