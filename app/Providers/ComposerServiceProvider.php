<?php

namespace App\Providers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Year;
use App\Models\Term;
use App\Models\Slider;
use App\Models\Menu;
use App\Models\Profile;
use App\Models\Subject;
use App\Models\Question;
use App\Models\Comment;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
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
                $query->setRelation('subjects', $query->subjects->where('is_approved', 1)->take(8));
                return $query;
            })->groupBy('name')->take(8);

            $view->withCategories($categories);
        });

        View::composer(['welcome', 'home', 'teacher.*', 'student.*', 'user.*'], function ($view) {
            $topCategories = Category::get()->take(18);

            $view->withTopCategories($topCategories);
        });

        View::composer(['welcome', 'home'], function ($view) {
            $mostViewedSubjects = Subject::where('is_approved', 1)->get()->take(8);

            $view->withMostViewedSubjects($mostViewedSubjects);
        });

        View::composer(['welcome', 'home', 'student.*'], function ($view) {
            $teachers = User::with('profile')->where('role', '2')->get()->take(12);

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
    }
}
