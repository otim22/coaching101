<?php

namespace App\Http\Controllers\Student;

use App\Models\Faq;
use App\Models\Slider;
use Illuminate\Support\Arr;
use App\Models\Standard;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\ItemContent;
use App\Models\TeacherImage;
use App\Models\StudentImage;
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

    public function activateStandard(Standard $standard)
    {
        $standards = Standard::get();
        $activeStatus = 'active';
        $falseStatus = 'false';
        // WIP
        foreach($standards as $standardFromDB) {
            if($standardFromDB->status == "active") {
                $activeStand->status = $falseStatus;
                $activeStand->save();
            } else {
                $standard->status = $activeStatus;
                $standard->save();
            }
        }

        return redirect('/');
    }
}
