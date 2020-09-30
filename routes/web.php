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
Route::get('/edit-credit-card', [PaymentController::class, 'create'])->name('edit-credit-card');
Route::get('/support', [SupportController::class, 'create'])->name('support');

Route::get('/subjects', [SubjectController::class, 'index']);
Route::post('/subjects', [SubjectController::class, 'store']);
Route::get('/audiences', [AudienceController::class, 'index']);
Route::post('/audiences', [AudienceController::class, 'store']);
Route::get('/messages', [MessageController::class, 'index']);
Route::post('/messages', [MessageController::class, 'store']);
Route::post('/topics', [TopicController::class, 'store']);

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles', 'RoleController');
    Route::resource('users', 'UserController');
});
