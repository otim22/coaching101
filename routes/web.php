<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/category', 'CategoryController@create')->name('category');
Route::get('/teach', 'TeacherController@create')->name('teach');
Route::post('/courses', 'TeacherController@store');
Route::get('/learn', 'StudentController@index')->name('learn');
Route::get('/edit-profile', 'UserController@create')->name('edit-profile');
Route::get('/edit-account', 'AccountController@create')->name('edit-account');
Route::get('/edit-credit-card', 'PaymentController@create')->name('edit-credit-card');
Route::get('/support', 'SupportController@create')->name('support');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles','RoleController');
    Route::resource('users','UserController');
    Route::resource('subjects','SubjectController');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
