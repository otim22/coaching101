<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\LibraryController;
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
use App\Http\Controllers\SubjectDisplayController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\AudienceController;
use App\Http\Controllers\PerformanceController;
use App\Http\Controllers\TopCategoryController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\StudentImageController;
use App\Http\Controllers\Admin\TeacherImageController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\SearchController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/library', [LibraryController::class, 'create']);
Route::get('/edit-profile', [UserController::class, 'create'])->name('edit-profile');
Route::get('/accounts', [AccountController::class, 'create'])->name('accounts');
Route::get('/subjects/{subject}', [SubjectDisplayController::class, 'index'])->name('subjects.index');
Route::get('/subjects/{subject?}/topics/{topic?}', [SubjectDisplayController::class, 'show'])->name('student.show');
Route::get('/search', [SearchController::class, 'index'])->name('search');
Route::post('/rating', [RatingController::class, 'store'])->name('rating.store');
Route::get('/categories/{category}', [TopCategoryController::class, 'index'])->name('categories.index');
Route::get('/teachers/{teacher}', [TeacherController::class, 'index'])->name('teachers.index');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/home/my-subjects', [MySubjectsController::class, 'index'])->name('my-subjects');

Route::middleware('auth')->group(function() {

    Route::get('/cart/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
    Route::get('/cart/{response?}', [CartController::class, 'index'])->name('cart.index');

    Route::post( '/pay', [PaymentController::class, 'initialize'])->name('pay');
    Route::post('/rave/callback', [PaymentController::class, 'callback'])->name('callback');

    Route::prefix('teacher')
            ->group(function() {
                Route::get('/starter', [SubjectController::class, 'starter'])->name('subjects.starter');
                Route::get('/onBoard', [SubjectController::class, 'onBoard'])->name('subjects.onBoard');
                Route::post('/captureRole', [SubjectController::class, 'captureRole'])->name('subjects.captureRole');
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
        Route::get('/dashboard', [AdminController::class, 'index']);
        Route::resource('sliders', 'SliderController');
        Route::resource('studentImages', 'StudentImageController');
        Route::resource('teacherImages', 'TeacherImageController');
        Route::resource('faqs', 'FaqController');

        Route::get('categories', [CategoryController::class, 'index'])->name('categories.index');
        Route::post('categories', [CategoryController::class, 'store'])->name('categories.store');
        Route::get('categories/create', [CategoryController::class, 'create'])->name('categories.create');
        Route::get('categories/{category}', [CategoryController::class, 'show'])->name('categories.show');
        Route::get('categories/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
        Route::patch('categories/{category}/update', [CategoryController::class, 'update'])->name('categories.update');
        Route::delete('categories/{category}/destroy', [CategoryController::class, 'destroy'])->name('categories.destroy');

        Route::get('menus', [MenuController::class, 'index'])->name('menus.index');
        Route::post('menus', [MenuController::class, 'store'])->name('menus.store');
        Route::get('menus/create', [MenuController::class, 'create'])->name('menus.create');
        Route::get('menus/{menu}', [MenuController::class, 'show'])->name('menus.show');
        Route::get('menus/{menu}/edit', [MenuController::class, 'edit'])->name('menus.edit');
        Route::patch('menus/{menu}/update', [MenuController::class, 'update'])->name('menus.update');
        Route::delete('menus/{menu}/destroy', [MenuController::class, 'destroy'])->name('menus.destroy');
    });
});
