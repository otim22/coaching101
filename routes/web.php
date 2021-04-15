<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\LibraryController;
use App\Http\Controllers\UserController;
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
use App\Http\Controllers\Admin\YearController;
use App\Http\Controllers\Admin\TermController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\StudentImageController;
use App\Http\Controllers\Admin\TeacherImageController;
use App\Http\Controllers\Admin\StudentController as Student;
use App\Http\Controllers\Admin\TeacherController as Teacher;
use App\Http\Controllers\Admin\StudentProfileController;
use App\Http\Controllers\Admin\TeacherProfileController;
use App\Http\Controllers\Admin\BooksController;
use App\Http\Controllers\Admin\SubjectsController;
use App\Http\Controllers\Admin\TopicsController;
use App\Http\Controllers\Admin\NotesController;
use App\Http\Controllers\Admin\PastpaperController;
use App\Http\Controllers\Admin\ItemController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\MenuCategoryController;
use App\Http\Controllers\BooksController as Books;
use App\Http\Controllers\TeacherBookController;
use App\Http\Controllers\TeacherNoteController;
use App\Http\Controllers\TeacherPastpaperController;
use App\Http\Controllers\NotesController as Notes;
use App\Http\Controllers\PastpaperController as PastPapers;

Route::get('/', [WelcomeController::class, 'index']);
Route::get('/books', [Books::class, 'index'])->name('student.books.index');
Route::get('/books/{book}', [Books::class, 'show'])->name('student.books.show')->middleware('auth');
Route::get('/get-more-books', [Books::class, 'getMoreBooks'])->name('get-more-books');
Route::get('/notes', [Notes::class, 'index'])->name('student.notes.index');
Route::get('/notes/{note}', [Notes::class, 'show'])->name('student.notes.show')->middleware('auth');
Route::get('/get-more-notes', [Notes::class, 'getMoreNotes'])->name('get-more-notes');
Route::get('/pastpapers', [PastPapers::class, 'index'])->name('student.pastpapers.index');
Route::get('/pastpapers/{pastpaper}', [PastPapers::class, 'show'])->name('student.pastpapers.show')->middleware('auth');
Route::get('/get-more-pastpapers', [PastPapers::class, 'getMorePastpapers'])->name('get-more-pastpapers');
Route::get('/users/profile', [ProfileController::class, 'index'])->name('users.profile');
Route::post('/users/profile', [ProfileController::class, 'store'])->name('users.profile.store');
Route::patch('/users/profile/update', [ProfileController::class, 'update'])->name('users.profile.update');
Route::patch('/account-update', [UserController::class, 'accountUpdate'])->name('account-update');
Route::get('/contacts', [ContactController::class, 'index'])->name('contacts');
Route::post('/contacts', [ContactController::class, 'store'])->name('contacts.store');
Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/subjects/{subject}', [SubjectDisplayController::class, 'index'])->name('subjects.index');
Route::get('/subjects/{subject?}/topics/{topic?}', [SubjectDisplayController::class, 'show'])->name('student.show')->middleware('auth');
Route::get('/videos', [SearchController::class, 'videoSubjects'])->name('videos');
Route::get('/questions', [SearchController::class, 'subjectQuestions'])->name('questions');
Route::get('/categories/{category}', [TopCategoryController::class, 'index'])->name('categories.index');
Route::get('/teachers/{teacher}', [TeacherController::class, 'index'])->name('teachers.index');
Route::get('/subjects/{term}', [MenuCategoryController::class, 'index'])->name('terms.index');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/get-more-subjects', [HomeController::class, 'getMoreSubjects'])->name('get-more-subjects');
Route::get('/home/my-subjects', [HomeController::class, 'mySubjects'])->name('my-subjects');

Route::get('/questions', [QuestionController::class, 'index'])->name('questions');
Route::post('/question', [QuestionController::class, 'store'])->name('question.store');

Route::get('/comments', [CommentController::class, 'index'])->name('comments');
Route::post('/comment', [CommentController::class, 'store'])->name('comment.store');
Route::post('/reply', [CommentController::class, 'reply'])->name('reply.store');

Auth::routes(['verify' => true]);

Route::get('/teacher/onBoard', [SubjectController::class, 'onBoard'])->name('subjects.onBoard');

Route::middleware('auth')->group(function() {
    Route::get('/cart/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
    Route::get('/cart/{response?}', [CartController::class, 'index'])->name('cart.index');
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');

    Route::post( '/pay', [PaymentController::class, 'initialize'])->name('pay');
    Route::post('/rave/callback', [PaymentController::class, 'callback'])->name('callback');

    Route::prefix('teacher')->group(function() {
        Route::get('/starter', [SubjectController::class, 'starter'])->name('subjects.starter');
        Route::post('/captureRole', [SubjectController::class, 'captureRole'])->name('subjects.captureRole');
        Route::get('/manage/subjects', [SubjectController::class, 'index'])->name('manage.subjects')->middleware('teacher');
        Route::get('/subjects', [SubjectController::class, 'create'])->name('subjects.create');
        Route::post('/subjects', [SubjectController::class, 'store'])->name('subjects');
        Route::get('/subjects/{subject}', [SubjectController::class, 'show'])->name('subjects.show');
        Route::get('/subjects/{subject}/edit', [SubjectController::class, 'edit'])->name('subjects.edit');
        Route::patch('/subjects/{subject}/update', [SubjectController::class, 'update'])->name('subjects.update');
        Route::delete('/subjects/{subject}/destroy', [SubjectController::class, 'destroy'])->name('subjects.destroy');

        Route::resource('/books', 'TeacherBookController')->except(['index']);
        Route::get('/books', [TeacherBookController::class, 'index'])->name('teacher.books');
        Route::resource('/notes', 'TeacherNoteController')->except(['index']);
        Route::get('/notes', [TeacherNoteController::class, 'index'])->name('teacher.notes');
        Route::post('/notes/{note}/objectives/{objective}', [TeacherNoteController::class, 'deleteObjective'])->name('teacher.notes.objective.destroy');
        Route::resource('/pastpapers', 'TeacherPastpaperController')->except(['index']);
        Route::get('/pastpapers', [TeacherPastpaperController::class, 'index'])->name('teacher.pastpapers');

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
        Route::get('/get-more-subjects-for-teacher-performance', [PerformanceController::class, 'getMoreSubjectsTeacherPerforamce'])->name('get-more-subjects-for-teacher-performance');
        Route::get('/manage/resources', [ResourceController::class, 'index'])->name('manage.resources');
        Route::get('/manage/tools', [ToolController::class, 'index'])->name('manage.tools');
    });

    Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware('admin')->group(function() {
        Route::get('/dashboard', [AdminController::class, 'index']);
        Route::get('/admins', [AdminController::class, 'adminUser'])->name('admins.index');
        Route::patch('/admins/{student}/approve', [AdminController::class, 'approve'])->name('admins.approve');
        Route::delete('/admins/{user}', [AdminController::class, 'destroy'])->name('admins.destroy');

        Route::get('/students', [Student::class, 'index'])->name('students.index');
        Route::get('/students/{student}', [Student::class, 'show'])->name('students.show');
        Route::delete('/students/{student}/destroy', [Student::class, 'destroy'])->name('students.destroy');
        Route::get('/teachers', [Teacher::class, 'index'])->name('teachers.index');;
        Route::get('/teachers/{teacher}', [Teacher::class, 'show'])->name('teachers.show');;
        Route::delete('/teachers/{teacher}/destroy', [Teacher::class, 'destroy'])->name('teachers.destroy');
        Route::get('/student-profiles', [StudentProfileController::class, 'index']);
        Route::get('/teacher-profiles', [TeacherProfileController::class, 'index']);

        Route::get('/subjects', [SubjectsController::class, 'index'])->name('subjects.index');
        Route::get('/subjects/{subject}', [SubjectsController::class, 'show'])->name('subjects.show');
        Route::patch('/subjects/{subject}/approve', [SubjectsController::class, 'approve'])->name('subjects.approve');
        Route::get('/subjects/{subject}/topics/{topic}', [TopicsController::class, 'show'])->name('topics.show');
        Route::delete('/subjects/{subject}/destroy', [SubjectsController::class, 'destroy'])->name('subjects.destroy');
        Route::patch('/books/{book}/approve', [BooksController::class, 'approve'])->name('books.approve');
        Route::patch('/notes/{note}/approve', [NotesController::class, 'approve'])->name('notes.approve');
        Route::patch('/pastpapers/{pastpaper}/approve', [PastpaperController::class, 'approve'])->name('pastpapers.approve');

        Route::resource('sliders', 'SliderController');
        Route::resource('studentImages', 'StudentImageController');
        Route::resource('teacherImages', 'TeacherImageController');
        Route::resource('faqs', 'FaqController');
        Route::resource('categories', 'CategoryController');
        Route::resource('years', 'YearController');
        Route::resource('terms', 'TermController');
        Route::resource('books', 'BooksController');
        Route::resource('notes', 'NotesController');
        Route::resource('pastpapers', 'PastpaperController');
        Route::resource('items', 'ItemController');
    });
});
