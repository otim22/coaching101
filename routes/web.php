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
Route::get('/teach', 'TeachController@create')->name('teach');
Route::get('/edit-profile', 'UserController@edit')->name('edit-profile');
Route::get('/account', 'AccountController@create')->name('account');
Route::get('/edit-credit-card', 'CreditCardController@edit')->name('edit-credit-card');
Route::get('/support', 'SupportController@create')->name('support');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
