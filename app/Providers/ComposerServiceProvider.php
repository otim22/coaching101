<?php

namespace App\Providers;

use Carbon\Carbon;
use App\Models\Subject;
use App\Models\Menu;
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
            $categories = Subject::orderBy('created_at', 'desc')->get()->groupBy('category')->take(10);

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

        View::composer(['*'], function ($view) {
            $menus = Menu::whereNull('parent_id')->with('allChildren')->get();

            $view->withMenus($menus);
        });
    }
}
