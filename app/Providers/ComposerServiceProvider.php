<?php

namespace App\Providers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Subject;
use App\Models\Category;
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
            $categories = Category::with('subjects')->orderBy('created_at', 'desc')->get()->groupBy('name')->take(10);

            $view->withCategories($categories);
        });

        View::composer(['welcome', 'home'], function ($view) {
            $mostViewedSubjects = Subject::get()->take(8);

            $view->withMostViewedSubjects($mostViewedSubjects);
        });

        View::composer(['welcome', 'home'], function ($view) {
            $teachers = User::with('subjects')->get()->where('role', '2')->take(8);
            
            $view->withTeachers($teachers);
        });

        View::composer(['welcome', 'home', 'pages.category.*'], function ($view) {
            $topCategories = Category::with('subjects')->get()->take(18);

            $view->withTopCategories($topCategories);
        });

        View::composer(['*'], function ($view) {
            $menus = Menu::whereNull('parent_id')->with('allChildren')->get();

            $view->withMenus($menus);
        });
    }
}
