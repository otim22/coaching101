<?php

namespace App\Providers;

use Carbon\Carbon;
use App\Models\Subject;
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
            $categories = Subject::get()->groupBy('category')->take(10)->toArray();

            $view->withCategories($categories);
        });

        View::composer(['welcome', 'home'], function ($view) {
            $mostViewedSubjects = Subject::get()->take(4);

            $view->withMostViewedSubjects($mostViewedSubjects);
        });

        View::composer(['welcome', 'home'], function ($view) {
            $topCategories = Subject::get()->pluck('category')->unique()->take(12);

            $view->withTopCategories($topCategories);
        });
    }
}
