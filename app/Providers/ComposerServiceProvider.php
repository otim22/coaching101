<?php

namespace App\Providers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Year;
use App\Models\Term;
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

        View::composer(['welcome', 'home', 'teacher.*', 'student.*'], function ($view) {
            $topCategories = Category::with('subjects')->get()->take(18);

            $view->withTopCategories($topCategories);
        });

        View::composer(['welcome', 'home'], function ($view) {
            $mostViewedSubjects = Subject::get()->take(8);

            $view->withMostViewedSubjects($mostViewedSubjects);
        });

        View::composer(['welcome', 'home', 'student.*'], function ($view) {
            $teachers = User::with('subjects')->get()->where('role', '2')->take(12);

            $view->withTeachers($teachers);
        });

        View::composer(['welcome', 'home', 'student.*'], function ($view) {
            $years = Year::get();

            $view->withYears($years);
        });

        View::composer(['welcome', 'home', 'student.*'], function ($view) {
            $terms = Term::get();

            $view->withTerms($terms);
        });

        View::composer(['*'], function ($view) {
            $menus = Menu::whereNull('parent_id')->with('allChildren')->get();

            $view->withMenus($menus);
        });
    }
}
