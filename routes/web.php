<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\LibraryController;
use App\Http\Controllers\BusinessController;
use App\Http\Controllers\MySubjectsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\SupportController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\ResourceController;
use App\Http\Controllers\ToolController;
use App\Http\Controllers\TopicController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\AudienceController;
use App\Http\Controllers\PerformanceController;

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
Route::get('/accounts', [AccountController::class, 'create'])->name('accounts');
Route::get('/subjects/{subject}', [SubjectController::class, 'getSubjects'])->name('subjects.getSubjects');
Route::get('/subjects/{subject}/topics/{topic}', [SubjectController::class, 'showSubject'])->name('subject.showSubject');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function() {

    Route::prefix('teacher')
            ->group(function() {
                Route::get('/start', [SubjectController::class, 'start'])->name('subjects.start');
                Route::get('/teacherIndex', [SubjectController::class, 'teacherIndex'])->name('subjects.teacherIndex');
                Route::post('/start', [SubjectController::class, 'storeStart'])->name('subjects.storeStart');
                Route::get('/manage/subjects', [SubjectController::class, 'index'])->name('manage.subjects')->middleware('teacher');
                Route::get('/subjects', [SubjectController::class, 'create'])->name('subjects.create');
                Route::post('/subjects', [SubjectController::class, 'store'])->name('subjects');
                Route::get('/subjects/{subject}', [SubjectController::class, 'show'])->name('subjects.show');
                Route::get('/subjects/{subject}/edit', [SubjectController::class, 'edit'])->name('subjects.edit');
                Route::patch('/subjects/{subject}/update', [SubjectController::class, 'update'])->name('subjects.update');
                Route::delete('/subjects/{subject}/destroy', [SubjectController::class, 'destroy'])->name('subjects.destroy');

                Route::get('/subjects/{subject}/audiences', [AudienceController::class, 'index']);
                Route::get('/subjects/{subject}/audiences', [AudienceController::class, 'create']);
                Route::post('/subjects/{subject}/audiences', [AudienceController::class, 'store'])->name('audiences');
                Route::get('/subjects/{subject}/audiences/edit', [AudienceController::class, 'edit'])->name('audiences.edit');
                Route::patch('/subjects/{subject}/audiences/update', [AudienceController::class, 'update'])->name('audiences.update');

                Route::get('/subjects/{subject}/messages', [MessageController::class, 'index']);
                Route::get('/subjects/{subject}/messages', [MessageController::class, 'create']);
                Route::post('/subjects/{subject}/messages', [MessageController::class, 'store'])->name('messages');
                Route::get('/subjects/{subject}/messages/edit', [MessageController::class, 'edit'])->name('messages.edit');
                Route::patch('/subjects/{subject}/messages/update', [MessageController::class, 'update'])->name('messages.update');

                Route::get('/subjects/{subject}/topics', [TopicController::class, 'index'])->name('topics.index');
                Route::get('/subjects/{subject}/topics', [TopicController::class, 'create'])->name('topics.create');
                Route::get('/subjects/{subject}/topics/{topic}', [TopicController::class, 'show'])->name('topics.show');
                Route::post('/subjects/{subject}/topics', [TopicController::class, 'store'])->name('topics');
                Route::get('/subjects/{subject}/topics/{topic}/edit', [TopicController::class, 'edit'])->name('topics.edit');
                Route::patch('/subjects/{subject}/topics/{topic}/update', [TopicController::class, 'update'])->name('topics.update');

                Route::get('/manage/performances', [PerformanceController::class, 'index'])->name('manage.performances');
                Route::get('/manage/resources', [ResourceController::class, 'index'])->name('manage.resources');
                Route::get('/manage/tools', [ToolController::class, 'index'])->name('manage.tools');
    });

    Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware('admin')->group(function() {
        Route::get('/dashboard', [\App\Http\Controllers\Admin\AdminController::class, 'index']);
        Route::resource('sliders', '\App\Http\Controllers\Admin\SliderController');
    });
});
