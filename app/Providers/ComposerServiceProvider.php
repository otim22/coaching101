<?php

namespace App\Providers;

use Carbon\Carbon;
use App\Models\Faq;
use App\Models\User;
use App\Models\Slider;
use App\Models\Menu;
use App\Models\Subject;
use App\Models\Category;
use App\Models\StudentImage;
use App\Models\TeacherImage;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer(['welcome'], function ($view) {
            $categories = Category::with('subjects')->get()->map(function($query) {
                $query->setRelation('subjects', $query->subjects->take(8));
                return $query;
            })->groupBy('name')->take(8);

            $view->withCategories($categories);
        });

        View::composer(['welcome', 'home'], function ($view) {
            $mostViewedSubjects = Subject::get()->take(8);

            $view->withMostViewedSubjects($mostViewedSubjects);
        });

        View::composer(['welcome', 'home'], function ($view) {
            $teachers = User::with('subjects')->get()->where('role', '2')->take(9);

            $view->withTeachers($teachers);
        });

        View::composer(['welcome', 'home', 'pages.*'], function ($view) {
            $topCategories = Category::with('subjects')->get()->take(18);

            $view->withTopCategories($topCategories);
        });

        View::composer(['welcome'], function ($view) {
            $sliders = Slider::latest()->first();

            $view->withSliders($sliders);
        });

        View::composer(['welcome'], function ($view) {
            $studentImage = StudentImage::latest()->first();

            $view->withStudentImage($studentImage);
        });

        View::composer(['welcome'], function ($view) {
            $teacherImage = TeacherImage::latest()->first();

            $view->withTeacherImage($teacherImage);
        });

        View::composer(['welcome'], function ($view) {
            $faqs = Faq::get();

            $view->withFaqs($faqs);
        });

        View::composer(['*'], function ($view) {
            $menus = Menu::whereNull('parent_id')->with('allChildren')->get();

            $view->withMenus($menus);
        });
    }
}
