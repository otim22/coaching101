<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/category', 'CategoryController@create')->name('category');
Route::get('/teach', 'TeacherController@create')->name('teach');
Route::post('/lectures', 'TeacherController@store');
Route::get('/subjects', 'SubjectsController@index')->name('subjects');
Route::get('/subjects/{subject}', 'SubjectsController@show')->name('subjects.show');
Route::get('/business', 'BusinessController@index')->name('business');
Route::get('/my-subjects', 'MySubjectsController@index')->name('my-subjects');
Route::get('/edit-profile', 'UserController@create')->name('edit-profile');
Route::get('/edit-account', 'AccountController@create')->name('edit-account');
Route::get('/edit-credit-card', 'PaymentController@create')->name('edit-credit-card');
Route::get('/support', 'SupportController@create')->name('support');

Route::post('/introduction_submission', 'SubjectIntroductionController@store');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles','RoleController');
    Route::resource('users','UserController');
    // Route::resource('subjects','SubjectsController');
});
