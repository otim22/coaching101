<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\LibraryController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\BusinessController;
use App\Http\Controllers\MySubjectsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\SupportController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\AudienceController;
use App\Http\Controllers\TopicController;
use App\Http\Controllers\HomeController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/library', [LibraryController::class, 'create']);
Route::get('/teach', [TeacherController::class, 'create'])->name('teach');
Route::post('/lectures', [TeacherController::class, 'store']);
Route::get('/subjects/{subject}', [SubjectController::class, 'show'])->name('subjects.show');
Route::get('/business', [BusinessController::class, 'index'])->name('business');
Route::get('/my-subjects', [MySubjectsController::class, 'index'])->name('my-subjects');
Route::get('/edit-profile', [UserController::class, 'create'])->name('edit-profile');
Route::get('/edit-account', [AccountController::class, 'create'])->name('edit-account');

Route::get('/all-subjects', [SubjectController::class, 'index'])->name('all-subjects');
Route::get('/subjects', [SubjectController::class, 'create'])->name('subjects.create');
Route::post('/subjects', [SubjectController::class, 'store'])->name('subjects');
Route::get('/subjects/{subject}', [SubjectController::class, 'show'])->name('subjects.show');

Route::get('/subjects/{subject}/audiences', [AudienceController::class, 'index']);
Route::get('/subjects/{subject}/audiences', [AudienceController::class, 'create']);
Route::post('/subjects/{subject}/audiences', [AudienceController::class, 'store'])->name('audiences');

Route::get('/subjects/{subject}/messages', [MessageController::class, 'index']);
Route::get('/subjects/{subject}/messages', [MessageController::class, 'create']);
Route::post('/subjects/{subject}/messages', [MessageController::class, 'store'])->name('messages');

Route::get('/subjects/{subject}/topics', [TopicController::class, 'index'])->name('topics.index');
Route::get('/subjects/{subject}/topics', [TopicController::class, 'create'])->name('topics.create');
Route::post('/subjects/{subject}/topics', [TopicController::class, 'store'])->name('topics');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles', 'RoleController');
    Route::resource('users', 'UserController');
});
