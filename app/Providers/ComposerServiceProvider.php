<?php

namespace App\Providers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Year;
use App\Models\Level;
use App\Models\Term;
use App\Models\Slider;
use App\Models\Menu;
use App\Models\Profile;
use App\Models\Standard;
use App\Models\Question;
use App\Models\Comment;
use App\Models\Category;
use App\Models\ItemContent;
use App\Helpers\SessionWrapper;
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
            $categories = Category::with(['itemContents'=>function ($query) {
                $query->where([
                    'is_approved' => 1,
                    'standard_id' => SessionWrapper::getData('standardId')
                ])->take(8);
            }])->whereIn('id', Standard::categoryIds())->take(8)->get();

            $view->withCategories($categories);
        });

        View::composer(['welcome', 'home', 'teacher.*', 'student.*', 'user.*'], function ($view) {
            $standard = Standard::find(SessionWrapper::getData('standardId'));

            $view->withTopCategories($standard->categories->take(18));
        });

        View::composer(['welcome', 'home'], function ($view) {
            $mostViewedSubjects = ItemContent::where([
                                'is_approved' => 1,
                                'item_id' => 1,
                                'standard_id' => SessionWrapper::getData('standardId')
                            ])->get()->take(8);
            $view->withMostViewedSubjects($mostViewedSubjects);
        });

        View::composer(['welcome', 'home', 'student.*'], function ($view) {
            $teachers = User::with('profile')->where('role', '2')->get()->take(12);
            $view->withTeachers($teachers);
        });

        View::composer(['welcome', 'home', 'auth.*', 'student.*'], function ($view) {
            $standards = Standard::get();
            $view->withStandards($standards);
        });

        View::composer(['welcome', 'home', 'auth.*', 'student.*'], function ($view) {
            $id = SessionWrapper::getData('standardId');
            $standards = Standard::get();

            foreach($standards as $standard) {
                if($id < 0 && $standard->status == 'active') {
                    SessionWrapper::setStandardId($standard->id);
                    $id = $standard->id;
                }
            }

            $view->withId($id);
        });

        View::composer(['welcome', 'home', 'student.*'], function ($view) {
            $levels = Level::get();
            $view->withLevels($levels);
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
