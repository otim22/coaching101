<?php
namespace App\Http\Controllers\Teacher;

use Illuminate\Http\Request;
use App\Models\ItemContent;
use App\Models\SubPastpaper;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TeacherSubPastpaperController extends Controller
{
    public function create(ItemContent $pastpaper)
    {
        return view('teacher.pastpapers.sub_pastpapers.create', compact('pastpaper'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, ItemContent $pastpaper)
    {
        $request->validate([
            'title' => 'required',
            'pastpaper' => 'required|mimes:pdf',
            'answer' => 'required|mimes:pdf'
        ]);
        $subPastpaper = new SubPastpaper($request->except('pastpaper'));
        $subPastpaper->item_content_id = $pastpaper->id;
        $subPastpaper->title = $request->input('title');
        $subPastpaper->user_id = Auth::id();
        $subPastpaper->save();

        if($request->hasFile('pastpaper') && $request->file('pastpaper')->isValid()) {
            $subPastpaper->addMediaFromRequest('pastpaper')->toMediaCollection('pastpapers');
        }

        if($request->hasFile('answer') && $request->file('answer')->isValid()) {
            $subPastpaper->addMediaFromRequest('answer')->toMediaCollection('answers');
        }

        return redirect()->route('subPastpapers.show', [$pastpaper, $subPastpaper])->with('success', 'Past paper added successfully.');
    }

    public function show(ItemContent $pastpaper, SubPastpaper $subPastpaper)
    {
        return view('teacher.pastpapers.sub_pastpapers.show', compact(['subPastpaper', 'pastpaper']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(ItemContent $pastpaper, SubPastpaper $subPastpaper)
    {
        return view('teacher.pastpapers.sub_pastpapers.edit', compact(['subPastpaper', 'pastpaper']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ItemContent $pastpaper, SubPastpaper $subPastpaper)
    {
        $request->validate([
            'title' => 'required',
            'pastpaper' => 'nullable|mimes:pdf',
            'answer' => 'nullable|mimes:pdf'
        ]);

        $subPastpaper->title = $request->input('title');

        if($request->hasFile('pastpaper') && $request->file('pastpaper')->isValid()) {
            foreach ($subPastpaper->media as $media) {
                $media->delete();
            }
            $subPastpaper->addMediaFromRequest('pastpaper')->toMediaCollection('pastpapers');
        }

        if($request->hasFile('answer') && $request->file('answer')->isValid()) {
            foreach ($subPastpaper->media as $media) {
                $media->delete();
            }
            $subPastpaper->addMediaFromRequest('answer')->toMediaCollection('answers');
        }

        $subPastpaper->save();

        return redirect()->route('subPastpapers.show', [$pastpaper, $subPastpaper])->with('success', 'Past paper updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ItemContent $pastpaper, SubPastpaper $subPastpaper)
    {
        try {
            $subPastpaper->delete();
            return redirect()->route('pastpapers.show', [$pastpaper, $subPastpaper])->with('success', 'Past paper deleted successfully');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
}
