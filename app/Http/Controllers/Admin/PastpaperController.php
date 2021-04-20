<?php

namespace App\Http\Controllers\Admin;

use App\Models\Year;
use App\Models\Term;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\ItemContent;
use App\Http\Controllers\Controller;
use App\Http\Requests\PastpaperRequest;

class PastpaperController extends Controller
{
    public function index()
    {
        $pastpapers = ItemContent::where('item_id', 4)->paginate(20);
        
        return view('admin.pastpapers.index', compact('pastpapers'));
    }

    public function create()
    {
        $years =  Year::get();
        $terms =  Term::get();
        $categories = Category::get();

        return view('admin.pastpapers.create', compact(['categories', 'years', 'terms']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PastpaperRequest $request)
    {
        $pastpaper = new ItemContent($request->except(['pastpaper']));

        $pastpaper->save();

        if($request->hasFile('pastpaper') && $request->file('pastpaper')->isValid()) {
            $pastpaper->addMediaFromRequest('pastpaper')->toMediaCollection('pastpaper');
        }

        return redirect()->route('admin.pastpapers.index')->with('success', 'Pastpaper added successfully.');
    }

    public function show(ItemContent $pastpaper)
    {
        return view('admin.pastpapers.show', compact('pastpaper'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(ItemContent $pastpaper)
    {
        $years =  Year::get();
        $terms =  Term::get();
        $categories = Category::get();
        $category = Category::where('id', $pastpaper->category_id)->firstOrFail();
        $year = Year::where('id', $pastpaper->year_id)->firstOrFail();
        $term = Term::where('id', $pastpaper->term_id)->firstOrFail();
        $pdfs = $pastpaper->getMedia();

        return view('admin.pastpapers.edit', compact(['pastpaper', 'years', 'terms', 'categories', 'category', 'year', 'term', 'pdfs']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(PastpaperRequest $request, ItemContent $pastpaper)
    {
        $pastpaper->fill($request->except(['pastpaper']))->save();

        if($request->hasFile('pastpaper') && $request->file('pastpaper')->isValid()) {
            $pastpaper->addMediaFromRequest('pastpaper')->toMediaCollection('pastpaper');
        }

        return redirect()->route('admin.pastpapers.index')->with('success', 'Pastpaper added successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ItemContent $pastpaper)
    {
        try {
            $pastpaper->delete();

            return redirect()->route('admin.pastpapers.index')->with('success', 'Pastpaper deleted successfully');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function approve(ItemContent $pastpaper)
    {
        $approvePastpaper = ItemContent::find($pastpaper->id);

        if($approvePastpaper->is_approved == 0) {
            $approvePastpaper->is_approved = 1;
            $approvePastpaper->save();
        } else {
            return redirect()->route('admin.pastpapers.index')->with('info', 'Pastpaper already approved');
        }

        return redirect()->route('admin.pastpapers.index')->with('success', 'Pastpaper approved successfully');
    }
}
