<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\TeacherImage;
use App\Http\Controllers\Controller;

class TeacherImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teacherImages = TeacherImage::get();

        return view('admin.teacher_images.index', compact('teacherImages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.teacher_images.create');
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
            'title' =>  'required', 'string',
            'description' => 'required','string',
            'button_text' => 'string',
            'teacher_image' => 'required|image|mimes:jpg,jpeg,png|max:5520',
        ]);

        $student = new TeacherImage($request->except(['teacher_image']));

        $student->save();

        if($request->hasFile('teacher_image') && $request->file('teacher_image')->isValid()) {
            $student->addMediaFromRequest('teacher_image')->toMediaCollection('default');
        }

        return redirect()->route('admin.teacherImages.index')->with('success', 'Teacher created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TeacherImage  $teacherImage
     * @return \Illuminate\Http\Response
     */
    public function show(TeacherImage $teacherImage)
    {
        return view('admin.teacher_images.show', compact('teacherImage'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TeacherImage  $teacherImage
     * @return \Illuminate\Http\Response
     */
    public function edit(TeacherImage $teacherImage)
    {
        return view('admin.teacher_images.edit', compact('teacherImage'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TeacherImage  $teacherImage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TeacherImage $teacherImage)
    {
        $request->validate([
            'title' =>  'required', 'string',
            'description' => 'required','string',
            'button_text' => 'string',
            'teacher_image' => 'nullable|image|mimes:jpg,jpeg,png|max:5520',
        ]);

        $teacherImage->fill($request->except(['teacher_image']))->save();

        if($request->hasFile('teacher_image') && $request->file('teacher_image')->isValid()) {
            $teacherImage->addMediaFromRequest('teacher_image')->toMediaCollection('default');
        }

        return redirect()->route('admin.teacherImages.show', $teacherImage)->with('success', 'Teacher updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TeacherImage  $teacherImage
     * @return \Illuminate\Http\Response
     */
    public function destroy(TeacherImage $teacherImage)
    {
        try {
            $teacherImage->delete();

            return redirect()->route('admin.teacherImages.index')->with('success', 'Teacher deleted successfully');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
}
