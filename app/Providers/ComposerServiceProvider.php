<?php

namespace App\Providers;

use Carbon\Carbon;
use App\Models\Course;
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
            $categories = Course::get()->groupBy('default_subject')->take(7)->toArray();

            $view->withCategories($categories);
        });

        View::composer(['welcome', 'home'], function ($view) {
            $mostViewedCourses = Course::get()->take(4);

            $view->withMostViewedCourses($mostViewedCourses);
        });

        View::composer(['welcome', 'home'], function ($view) {
            $topCategories = Course::get()->pluck('default_subject')->unique()->take(12);
            // dd($topCategories);
            $view->withTopCategories($topCategories);
        });

    }
}
