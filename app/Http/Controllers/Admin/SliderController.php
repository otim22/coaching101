<?php

namespace App\Http\Controllers\Admin;

use App\Models\Slider;
use Illuminate\Http\Request;
use App\Rules\MaxTitleValidator;
use App\Http\Controllers\Controller;
use App\Http\Requests\SliderRequest;
use App\Rules\MaxButtonTextValidator;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Slider::get();

        return view('admin.sliders.index', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.sliders.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SliderRequest $request)
    {
        $slider = new Slider($request->except(['slider_image']));

        $slider->save();

        if($request->hasFile('slider_image') && $request->file('slider_image')->isValid()) {
            $slider->addMediaFromRequest('slider_image')->toMediaCollection('default');
        }

        return redirect()->route('admin.sliders.index')->with('success', 'Slider created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function show(Slider $slider)
    {
        return view('admin.sliders.show', compact('slider'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function edit(Slider $slider)
    {
        return view('admin.sliders.edit', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Slider $slider)
    {
        $request->validate([
            'title' =>  ['required', 'string', new MaxTitleValidator],
            'description' => 'required','string',
            'slider_image' => 'nullable|image|mimes:jpg,jpeg,png|max:5520',
            'button_text' => ['string', new MaxButtonTextValidator],
            'button_link' => 'string|max:20'
        ]);

        $slider->fill($request->except(['slider_image']))->save();

        if($request->hasFile('slider_image') && $request->file('slider_image')->isValid()) {
            $slider->addMediaFromRequest('slider_image')->toMediaCollection('default');
        }

        return redirect()->route('admin.sliders.show', $slider)->with('success', 'Slider updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slider $slider)
    {
        try {
            $slider->delete();

            return redirect()->route('admin.sliders.index')->with('success', 'Slider deleted successfully');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
}
