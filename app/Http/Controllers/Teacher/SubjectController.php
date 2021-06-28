<?php

namespace App\Http\Controllers\Teacher;

use App\Models\Item;
use App\Models\Year;
use App\Models\Term;
use App\Models\Level;
use App\Models\Topic;
use App\Models\Ratings;
use App\Models\Subject;
use App\Models\Currency;
use App\Models\Standard;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\ItemContent;
use Spatie\Image\Manipulations;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\SubjectRequest;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class SubjectController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('onBoard');
    }

    public function index(ItemContent $subjects)
    {
        $subjects = ItemContent::orderBy('id', 'desc')->where(['user_id' => Auth::id(), 'item_id' => 1])->paginate(10);

        return view('teacher.videos.index', compact('subjects'));
    }

    public function create()
    {
        $levels = ItemContent::getLevelsToStandard();
        $years = ItemContent::getYearsToLevel();
        $terms = Term::get();
        $standards = Standard::get();
        $categories = Category::get();
        $item = Item::where('name', 'Subject')->firstOrFail();

        return view('teacher.videos.create', compact(['categories', 'years', 'terms', 'item', 'standards', 'levels']));
    }

    public function show(ItemContent $subject)
    {
        return view('teacher.videos.show', compact('subject'));
    }

    public function store(SubjectRequest $request)
    {
        $subject = new ItemContent($request->except(['cover_image']));
        $subject->title = $request->input('title');
        $subject->subtitle = $request->input('subtitle');
        $subject->description = $request->input('description');
        $subject->standard_id = $request->input('standard_id');
        $subject->level_id = $request->input('level_id');
        $subject->category_id = $request->input('category_id');
        $subject->year_id = $request->input('year_id');
        $subject->term_id = $request->input('term_id');
        $subject->user_id = Auth::id();
        $std = Standard::find($request->input('standard_id'));

        if($std->name == 'Cambridge') {
            $currency = Currency::where('name', 'USD')->first();
        } else {
            $currency = Currency::where('name', 'UGX')->first();
        }

        $subject->currency_id = $currency->id;
        $category = Category::findOrFail($request->input('category_id'));
        $category->years()->attach($request->input('year_id'));
        $year = Year::findOrFail($request->input('year_id'));
        $year->terms()->attach($request->input('term_id'));

        if($request->hasFile('cover_image') && $request->file('cover_image')->isValid()) {
            $subject->addMediaFromRequest('cover_image')->toMediaCollection('videos');
        }

        $subject->save();
        return redirect()->route('audiences', $subject)->with('success', 'Subject saved successfully.');
    }

    public function edit(ItemContent $subject)
    {
        $levels = ItemContent::getLevelsToStandard();
        $years = ItemContent::getYearsToLevel();
        $categories = Category::get();
        $category = Category::find($subject->category_id);
        $standards = Standard::get();
        $standard = Standard::find($subject->standard_id);
        $level = Level::find($subject->level_id);
        $year = Year::find($subject->year_id);
        $terms = Term::get();
        $term = Term::find($subject->term_id);

        return view('teacher.videos.edit', compact([
            'subject', 'categories', 'category', 'years', 'year', 'terms', 'term', 'level', 'levels', 'standards', 'standard'
        ]));
    }

    public function update(Request $request, ItemContent $subject)
    {
        $this->validateData($request);
        $std = Standard::find($request->input('standard_id'));

        if($std->name == 'Cambridge') {
            $currency = Currency::where('name', 'USD')->first();
        } else {
            $currency = Currency::where('name', 'UGX')->first();
        }

        $subject->currency_id = $currency->id;

        if($request->hasFile('cover_image') && $request->file('cover_image')->isValid()) {
            foreach ($subject->media as $media) {
                $media->delete();
            }
            $subject->addMediaFromRequest('cover_image')->toMediaCollection('videos');
        }

        $subject->save();
        return redirect()->route('subjects.show', $subject)->with('success', 'Subject updated successfully');
    }

    protected function validateData($request)
    {
        return $request->validate([
            'title' => 'required|string',
            'subtitle' => 'nullable|string',
            'description' => 'required|string',
            'standard_id' => 'required|integer',
            'level_id' => 'required|integer',
            'category_id' => 'required|integer',
            'year_id' => 'required|integer',
            'term_id' => 'required|integer',
            'price' => 'required|string',
            'cover_image' => 'nullable|image|mimes:jpg, jpeg, png|max:5520'
        ]);
    }

    public function onBoard()
    {
        return view('teacher.pages.index');
    }

    public function starter()
    {
        return view('teacher.pages.start.index');
    }

    public function destroy(ItemContent $subject)
    {
        try {
            $subject->delete();
            return redirect()->route('manage.subjects')->with('success', 'Subject deleted successfully');
        } catch (\Exception $e) {
            return redirect()->route('manage.subjects')->with('error', 'Failed to delete subject');
        }
    }
}
