<?php

namespace App\Http\Controllers\Teacher;

use App\Models\Year;
use App\Models\Term;
use App\Models\Item;
use App\Models\Level;
use App\Models\Standard;
use App\Models\Category;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use App\Models\ItemContent;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\NoteRequest;

class TeacherNoteController extends Controller
{
    public function index()
    {
        $notes = ItemContent::where(['user_id' => Auth::id(), 'item_id' => 3])->paginate(20);

        return view('teacher.notes.index', compact('notes'));
    }

    public function create()
    {
        $years =  Year::get();
        $terms =  Term::get();
        $levels = Level::get();
        $standards = Standard::get();
        $categories = Category::get();
        $item = Item::where('name', 'Note')->firstOrFail();

        return view('teacher.notes.create', compact(['categories', 'years', 'terms', 'item', 'levels', 'standards']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NoteRequest $request)
    {
        $note = new ItemContent($request->except('note'));

        $note->title = $request->input('title');
        $note->objective = $request->input('objective');
        $note->price = $request->input('price');
        $note->standard_id = $request->input('standard_id');
        $note->level_id = $request->input('level_id');
        $note->category_id = $request->input('category_id');
        $note->item_id = $request->input('item_id');
        $note->year_id = $request->input('year_id');
        $note->term_id = $request->input('term_id');
        $note->user_id = $request->input('user_id');
        $note->user_id = Auth::id();

        $note->save();

        if($request->hasFile('note') && $request->file('note')->isValid()) {
            $note->addMediaFromRequest('note')->toMediaCollection('notes');
        }

        return redirect()->route('teacher.notes')->with('success', 'Note added successfully.');
    }

    public function show(ItemContent $note)
    {
        return view('teacher.notes.show', compact('note'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(ItemContent $note)
    {
        $years =  Year::get();
        $terms =  Term::get();
        $standards = Standard::get();
        $standard = Standard::find($note->standard_id);
        $levels = Level::get();
        $level = Level::find($note->level_id);
        $categories = Category::get();
        $category = Category::where('id', $note->category_id)->firstOrFail();
        $year = Year::where('id', $note->year_id)->firstOrFail();
        $term = Term::where('id', $note->term_id)->firstOrFail();

        return view('teacher.notes.edit', compact([
            'note', 'years', 'terms', 'categories', 'category', 'year', 'term', 'standards', 'standard', 'levels', 'level'
        ]));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ItemContent $note)
    {
        $data = $this->validateData($request);
        $note->fill(Arr::except($data, ['objective', 'note']));
        $note->objective = array_filter($request->objective);
        $note->save();

        if($request->hasFile('note') && $request->file('note')->isValid()) {
            foreach ($note->media as $media) {
                $media->delete();
            }
            $note->addMediaFromRequest('note')->toMediaCollection('notes');
        }

        return redirect()->route('teacher.notes')->with('success', 'Note added successfully.');
    }

    protected function validateData($request)
    {
        return $request->validate([
            'title' => 'required|string',
            'price' => 'nullable',
            'objective.*'  => 'nullable|string|distinct|min:2',
            'standard_id' => 'required|integer',
            'level_id' => 'required|integer',
            'category_id' => 'required|integer',
            'year_id' => 'required|integer',
            'term_id' => 'required|integer',
            'note' => 'nullable|mimes:pdf|max:5000',
            'user_id' => 'integer|nullable',
        ]);
    }

    public function deleteObjective(ItemContent $note, $objectiveId)
    {
        $objectives = $note->objective;
        $updatedObjectives = Arr::except($objectives, $objectiveId);
        $note->objective = $updatedObjectives;
        $note->save();

        return redirect()->route('teacher.notes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ItemContent $note)
    {
        try {
            $note->delete();

            return redirect()->route('teacher.notes')->with('success', 'Note deleted successfully');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
}
