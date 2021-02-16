<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use App\Models\Slider;
use App\Models\Subject;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\StudentImage;
use App\Models\TeacherImage;

class WelcomeController extends Controller
{
    public function index()
    {
        $subjects =  Subject::get();
        $sliders = Slider::latest()->first();
        $studentImage = StudentImage::latest()->first();
        $teacherImage = TeacherImage::latest()->first();
        $faqs = Faq::get();
        $filterCategories = Category::get();

        return view('welcome',
            compact(['subjects', 'sliders', 'studentImage', 'teacherImage', 'faqs', 'filterCategories'])
        );
    }

    public function getMoreSubjects(request $request)
    {
        $category= $request->category_id;
        $year= $request->year_id;
        $term= $request->term_id;
        $sliders = Slider::latest()->first();
        $studentImage = StudentImage::latest()->first();
        $teacherImage = TeacherImage::latest()->first();
        $faqs = Faq::get();
        $filterCategories = Category::get();

        if ($request->ajax()) {
            $subjects = Subject::getSubjects($category);

            return view('home', compact('subjects', 'sliders', 'studentImage', 'teacherImage', 'faqs', 'filterCategories'))->render();
        }
    }
}
