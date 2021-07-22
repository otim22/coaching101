<?php

namespace App\Http\Controllers\Teacher;

use App\Models\Item;
use App\Models\Year;
use App\Models\Term;
use App\Models\Level;
use App\Models\Currency;
use Illuminate\Support\Arr;
use App\Models\Standard;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\ItemContent;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\PastpaperRequest;

class TeacherPastpaperController extends Controller
{
    public function index()
    {
        $pastpapers = ItemContent::where(['user_id' => Auth::id(), 'item_id' => 4])->paginate(20);

        return view('teacher.pastpapers.index', compact('pastpapers'));
    }

    public function create()
    {
        $levels = ItemContent::getLevelsToStandard();
        $years = ItemContent::getYearsToLevel();
        $terms =  Term::get();
        $standards = Standard::get();
        $categories = Category::get();
        $item = Item::where('name', 'Pastpaper')->firstOrFail();

        return view('teacher.pastpapers.create', compact(['categories', 'item', 'years', 'terms', 'standards', 'levels']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PastpaperRequest $request)
    {
        $pastpaper = new ItemContent();
        $pastpaper->title = $request->input('title');
        $pastpaper->objective = $request->input('objective');
        $pastpaper->price = $request->input('price');
        $pastpaper->level_id = $request->input('level_id');
        $pastpaper->standard_id = $request->input('standard_id');
        $pastpaper->category_id = $request->input('category_id');
        $pastpaper->year_id = $request->input('year_id');
        $pastpaper->term_id = $request->input('term_id');
        $pastpaper->user_id = $request->input('user_id');
        $pastpaper->user_id = Auth::id();
        $std = Standard::find($request->input('standard_id'));

        $stdCurrency = $std->name == 'Cambridge' ? 'USD' : 'UGX';
        $currency =  Currency::where('name', $stdCurrency)->first();

        $pastpaper->currency_id = $currency->id;
        $pastpaper->save();

        return redirect()->route('subPastpapers.create', $pastpaper)->with('success', 'Past paper saved successfully.');
    }

    public function show(ItemContent $pastpaper)
    {
        return view('teacher.pastpapers.show', compact('pastpaper'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(ItemContent $pastpaper)
    {
        $levels = ItemContent::getLevelsToStandard();
        $years = ItemContent::getYearsToLevel();
        $terms =  Term::get();
        $standards = Standard::get();
        $standard = Standard::find($pastpaper->standard_id);
        $level = Level::find($pastpaper->level_id);
        $categories = Category::get();
        $category = Category::find($pastpaper->category_id);
        $year = Year::find($pastpaper->year_id);
        $term = Term::find($pastpaper->term_id);

        return view('teacher.pastpapers.edit', compact([
            'pastpaper', 'years', 'terms', 'categories', 'category', 'year', 'term', 'standards', 'standard', 'levels', 'level'
        ]));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ItemContent $pastpaper)
    {
        $data = $this->validateData($request);
        $pastpaper->fill(Arr::except($data, ['objective']));
        $pastpaper->objective = array_filter($request->objective);
        $std = Standard::find($request->input('standard_id'));

        $stdCurrency = $std->name == 'Cambridge' ? 'USD' : 'UGX';
        $currency =  Currency::where('name', $stdCurrency)->first();

        $pastpaper->currency_id = $currency->id;
        $pastpaper->save();

        return redirect()->route('teacher.pastpapers')->with('success', 'Past paper saved successfully.');
    }

    protected function validateData($request)
    {
        return $request->validate([
            'title' => 'required|string',
            'objective.*'  => 'nullable|string|distinct|min:2',
            'price' => 'nullable',
            'standard_id' => 'required|integer',
            'level_id' => 'required|integer',
            'category_id' => 'required|integer',
            'year_id' => 'required|integer',
            'term_id' => 'required|integer',
            'user_id' => 'integer|nullable',
        ]);
    }

    public function deleteObjective(ItemContent $pastpaper, $objectiveId)
    {
        $objectives = $pastpaper->objective;
        $updatedObjectives = Arr::except($objectives, $objectiveId);
        $pastpaper->objective = $updatedObjectives;
        $pastpaper->save();

        return redirect()->route('teacher.pastpapers');
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
            return redirect()->route('teacher.pastpapers')->with('success', 'Past paper deleted successfully');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
}
