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
        $books = Book::paginate(20);

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
        $book = new Book($request->except(['book', 'cover_image']));

        $book->save();

        if($request->hasFile('cover_image') && $request->file('cover_image')->isValid()) {
            $book->addMediaFromRequest('cover_image')->toMediaCollection('cover_image');
        }

        if($request->hasFile('book') && $request->file('book')->isValid()) {
            $book->addMediaFromRequest('book')->toMediaCollection('book');
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

        return view('admin.books.edit', compact(['book', 'years', 'terms', 'categories', 'category', 'year', 'term']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        $request->validate([
            'title' => 'required|string',
            'price' => 'nullable',
            'category_id' => 'required|integer',
            'year_id' => 'required|integer',
            'term_id' => 'required|integer',
            'book' => 'nullable|pdf|max:1000',
            'cover_image' => 'nullable|image|mimes:jpg, jpeg, png|max:5520',
            'user_id' => 'integer|nullable'
        ]);

        $book->fill($request->except(['book', 'cover_image']))->save();

        if($request->hasFile('cover_image') && $request->file('cover_image')->isValid()) {
            $book->addMediaFromRequest('cover_image')->toMediaCollection('cover_image');
        }

        if($request->hasFile('book') && $request->file('book')->isValid()) {
            $book->addMediaFromRequest('book')->toMediaCollection('book');
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
