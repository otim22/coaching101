<?php

namespace App\Http\Controllers;

use Arr;
use App\Models\Year;
use App\Models\Term;
use App\Models\Item;
use App\Models\ItemContent;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\BookRequest;

class TeacherBookController extends Controller
{
    public function index()
    {
        $books = ItemContent::where(['user_id' => Auth::id(), 'item_id' => 2])->paginate(20);

        return view('teacher.books.index', compact('books'));
    }

    public function create()
    {
        $years =  Year::get();
        $terms =  Term::get();
        $categories = Category::get();
        $item = Item::where('name', 'Book')->firstOrFail();

        return view('teacher.books.create', compact(['categories', 'years', 'terms', 'item']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BookRequest $request)
    {
        $book = new ItemContent($request->except(['book', 'cover_image']));

        $book->title = $request->input('title');
        $book->objective = $request->input('objective');
        $book->price = $request->input('price');
        $book->category_id = $request->input('category_id');
        $book->item_id = $request->input('item_id');
        $book->year_id = $request->input('year_id');
        $book->term_id = $request->input('term_id');
        $book->user_id = Auth::id();

        $book->save();

        if($request->hasFile('cover_image') && $request->file('cover_image')->isValid()) {
            $book->addMediaFromRequest('cover_image')->toMediaCollection('teacher_cover_image');
        }

        if($request->hasFile('book') && $request->file('book')->isValid()) {
            $book->addMediaFromRequest('book')->toMediaCollection('teacher_book');
        }

        return redirect()->route('teacher.books')->with('success', 'Book added successfully.');
    }

    public function show(ItemContent $book)
    {
        return view('teacher.books.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(ItemContent $book)
    {
        $years =  Year::get();
        $terms =  Term::get();
        $categories = Category::get();
        $category = Category::where('id', $book->category_id)->firstOrFail();
        $year = Year::where('id', $book->year_id)->firstOrFail();
        $term = Term::where('id', $book->term_id)->firstOrFail();

        return view('teacher.books.edit', compact(['book', 'years', 'terms', 'categories', 'category', 'year', 'term']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ItemContent $book)
    {
        $data = $request->validate([
            'title' => 'required|string',
            'price' => 'nullable',
            'objective.*'  => 'nullable|string|distinct|min:2',
            'category_id' => 'required|integer',
            'year_id' => 'required|integer',
            'term_id' => 'required|integer',
            'book' => 'nullable|mimes:pdf|max:1000',
            'cover_image' => 'nullable|image|mimes:jpg, jpeg, png|max:5520',
            'user_id' => 'integer|nullable'
        ]);

        $book->fill(Arr::except($data, ['objective', 'note', 'book', 'cover_image']));

        $book->objective = array_filter($request->objective);

        $book->save();

        if($request->hasFile('cover_image') && $request->file('cover_image')->isValid()) {
            $book->addMediaFromRequest('cover_image')->toMediaCollection('teacher_cover_image');
        }

        if($request->hasFile('book') && $request->file('book')->isValid()) {
            $book->addMediaFromRequest('book')->toMediaCollection('teacher_book');
        }

        return redirect()->route('teacher.books')->with('success', 'Book added successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ItemContent $book)
    {
        try {
            $book->delete();

            return redirect()->route('teacher.books')->with('success', 'Book deleted successfully');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
}
