<?php

namespace App\Http\Controllers\Student;

use App\Models\Faq;
use App\Models\Slider;
use App\Models\ItemContent;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\StudentImage;
use App\Models\TeacherImage;
use App\Http\Controllers\Controller;

class WelcomeController extends Controller
{
    public function index()
    {
        $faqs = Faq::get();
        $sliders = Slider::latest()->first();
        $filterCategories = Category::get();
        $studentImage = StudentImage::latest()->first();
        $teacherImage = TeacherImage::latest()->first();

        return view('welcome',
            compact(['sliders', 'studentImage', 'teacherImage', 'faqs', 'filterCategories'])
        );
    }
}
