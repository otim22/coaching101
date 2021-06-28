<?php

namespace App\Http\Controllers\Admin;

use App\Models\Year;
use App\Models\Term;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\ItemContent;
use App\Http\Controllers\Controller;
use App\Http\Requests\BookRequest;

class BooksController extends Controller
{
    public function index()
    {
        $books = ItemContent::where('item_id', 2)->paginate(20);

        return view('admin.books.index', compact('books'));
    }

    public function show(ItemContent $book)
    {
        return view('admin.books.show', compact('book'));
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

            return redirect()->route('admin.books.index')->with('success', 'Book deleted successfully');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function approve(ItemContent $book)
    {
        $approveBook = ItemContent::find($book->id);

        if($approveBook->is_approved == 0) {
            $approveBook->is_approved = 1;
            $approveBook->save();
        } else {
            return redirect()->route('admin.books.index')->with('info', 'Book already approved');
        }

        return redirect()->route('admin.books.index')->with('success', 'Book approved successfully');
    }
}
