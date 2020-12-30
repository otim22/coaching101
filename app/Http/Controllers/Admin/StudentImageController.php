<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\StudentImage;
use App\Http\Controllers\Controller;

class StudentImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $studentImages = StudentImage::get();

        return view('admin.student_images.index', compact('studentImages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.student_images.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' =>  ['required', 'string'],
            'description' => 'required','string',
            'button_text' => ['string'],
            'student_image' => 'required|image|mimes:jpg,jpeg,png|max:5520',
        ]);

        $student = new StudentImage($request->except(['student_image']));

        $student->save();

        if($request->hasFile('student_image') && $request->file('student_image')->isValid()) {
            $student->addMediaFromRequest('student_image')->toMediaCollection('default');
        }

        return redirect()->route('admin.studentImages.index')->with('success', 'Student created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\StudentImage  $studentImage
     * @return \Illuminate\Http\Response
     */
    public function show(StudentImage $studentImage)
    {
        return view('admin.student_images.show', compact('studentImage'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\StudentImage  $studentImage
     * @return \Illuminate\Http\Response
     */
    public function edit(StudentImage $studentImage)
    {
        return view('admin.student_images.edit', compact('studentImage'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\StudentImage  $studentImage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StudentImage $studentImage)
    {
        $request->validate([
            'title' =>  'required', 'string',
            'description' => 'required','string',
            'button_text' => 'string',
            'student_image' => 'nullable|image|mimes:jpg,jpeg,png|max:5520',
        ]);

        $studentImage->fill($request->except(['student_image']))->save();

        if($request->hasFile('student_image') && $request->file('student_image')->isValid()) {
            $studentImage->addMediaFromRequest('student_image')->toMediaCollection('default');
        }

        return redirect()->route('admin.studentImages.show', $studentImage)->with('success', 'Student updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\StudentImage  $studentImage
     * @return \Illuminate\Http\Response
     */
    public function destroy(StudentImage $studentImage)
    {
        try {
            $studentImage->delete();

            return redirect()->route('admin.studentImages.index')->with('success', 'Student deleted successfully');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
}
