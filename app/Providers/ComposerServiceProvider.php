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
use App\Models\Survey;
use App\Models\Standard;
use App\Models\Question;
use App\Models\Comment;
use App\Models\Category;
use App\Models\ItemContent;
use App\Models\SurveyQuestion;
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
            $categories = Category::with(['itemContents' => function ($query) {
                $query->where([
                    'is_approved' => 1,
                    'standard_id' => SessionWrapper::getData('standardId')
                ])->take(8);
            }])->whereIn('id', Standard::categoryIds())->take(8)->get();

            $clonedCategories = clone $categories;

            foreach($clonedCategories as $key => $category) {
                if(count($category->itemContents) == 0) {
                    unset($clonedCategories[$key]);
                }
            }

            $view->withCategories($clonedCategories);
        });

        View::composer(['welcome', 'home', 'teacher.*', 'student.*', 'user.*'], function ($view) {
            $id = SessionWrapper::getStandardId();
            $standard = Standard::find($id);
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
            $standard = Standard::find(SessionWrapper::getData('standardId'));
            $users =  $standard->users;
            $userIds = [];

            foreach ($users as $user) {
                $userIds[] = $user->id;
            }

            $userProfiles = User::with(['profile', 'roles' => function ($query) {
                $query->where([
                    'name' => 'teacher'
                ]);
            }])->whereIn('id', $userIds)->get()->take(12);

            $view->withTeachers($userProfiles);
        });

        View::composer(['*'], function ($view) {
            $standards = Standard::get();
            $view->withStandards($standards);
        });

        View::composer(['*'], function ($view) {
            $activeStandard = Standard::where('id', SessionWrapper::getStandardId())->first();
            $view->withActiveStandard($activeStandard);
        });

        View::composer(['*'], function ($view) {
            $id = SessionWrapper::getStandardId();
            $view->withId($id);
        });

        View::composer(['welcome', 'home', 'student.*'], function ($view) {
            $terms = Term::get();
            $view->withTerms($terms);
        });

        View::composer(['teacher.*'], function ($view) {
            $surveys = Survey::get();
            $view->withSurveys($surveys);
        });

        View::composer(['teacher.*'], function ($view) {
            $questions = SurveyQuestion::with('answers')->get();
            $view->withQuestions($questions);
        });
    }
}
