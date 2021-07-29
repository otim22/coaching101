<?php
namespace App\Http\Controllers\Teacher;

use JavaScript;
use Illuminate\Http\Request;
use App\Models\ItemContent;
use App\Models\SubPastpaper;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TeacherSubPastpaperAnswerController extends Controller
{
    public function create(ItemContent $pastpaper)
    {
        $subPastpapers = SubPastpaper::whereNull('parent_id')->get();

        return view('teacher.pastpapers.sub_pastpaper_answers.create', compact(['pastpaper', 'subPastpapers']));
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
            'answer' => 'required|mimes:pdf'
        ]);
        $subPastpaperAnswer = new SubPastpaper($request->except('answer'));
        $subPastpaperAnswer->item_content_id = $pastpaper->id;
        $subPastpaperAnswer->title = $request->input('title');
        $subPastpaperAnswer->parent_id = empty($request->input('parent_id')) ? null : $request->input('parent_id');
        $subPastpaperAnswer->user_id = Auth::id();
        $subPastpaperAnswer->save();

        if($request->hasFile('answer') && $request->file('answer')->isValid()) {
            $subPastpaperAnswer->addMediaFromRequest('answer')->toMediaCollection('answers');
        }

        return redirect()->route('subPastpaperAnswers.show', [$pastpaper, $subPastpaperAnswer])->with('success', 'Past paper answer saved successfully.');
    }

    public function show(ItemContent $pastpaper, SubPastpaper $subPastpaperAnswer)
    {
        $this->passSubPastpaperAnswerPdfUrlToJs($subPastpaperAnswer);
        return view('teacher.pastpapers.sub_pastpaper_answers.show', compact(['subPastpaperAnswer', 'pastpaper']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(ItemContent $pastpaper, SubPastpaper $subPastpaperAnswer)
    {
        $this->passSubPastpaperAnswerPdfUrlToJs($subPastpaperAnswer);
        $subPastpapers = SubPastpaper::whereNull('parent_id')->get();
        $subPastpaper = SubPastpaper::find($subPastpaperAnswer->parent_id);

        return view('teacher.pastpapers.sub_pastpaper_answers.edit', compact(['subPastpaperAnswer', 'pastpaper', 'subPastpapers', 'subPastpaper']));
    }

    protected function passSubPastpaperAnswerPdfUrlToJs($subPastpaperAnswer)
    {
        $subPastpaperAnswerPdfUrl = $subPastpaperAnswer->getFirstMediaUrl('answers');
    	JavaScript::put([
            'subPastpaperAnswer' => $subPastpaperAnswerPdfUrl
    	]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ItemContent $pastpaper, SubPastpaper $subPastpaperAnswer)
    {
        $request->validate([
            'title' => 'required',
            'answer' => 'nullable|mimes:pdf'
        ]);

        $subPastpaperAnswer->title = $request->input('title');

        if($request->hasFile('answer') && $request->file('answer')->isValid()) {
            foreach ($subPastpaperAnswer->media as $media) {
                $media->delete();
            }
            $subPastpaperAnswer->addMediaFromRequest('answer')->toMediaCollection('answers');
        }

        $subPastpaperAnswer->save();

        return redirect()->route('subPastpaperAnswers.show', [$pastpaper, $subPastpaperAnswer])->with('success', 'Past paper answer updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ItemContent $pastpaper, SubPastpaper $subPastpaperAnswer)
    {
        try {
            $subPastpaperAnswer->delete();
            return redirect()->route('pastpapers.show', [$pastpaper, $subPastpaperAnswer])->with('success', 'Past paper answer deleted successfully');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
}
