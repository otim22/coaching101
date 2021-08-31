<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LibraryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SupportController;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Teacher\TeacherController;
use App\Http\Controllers\Teacher\SubjectController;
use App\Http\Controllers\Teacher\ResourceController;
use App\Http\Controllers\Teacher\ToolController;
use App\Http\Controllers\Teacher\TopicController;
use App\Http\Controllers\Teacher\MessageController;
use App\Http\Controllers\Teacher\AudienceController;
use App\Http\Controllers\Teacher\PerformanceController;
use App\Http\Controllers\Teacher\TeacherBookController;
use App\Http\Controllers\Teacher\TeacherNoteController;
use App\Http\Controllers\Teacher\TeacherSubNoteController;
use App\Http\Controllers\Teacher\TeacherSubPastpaperController;
use App\Http\Controllers\Teacher\TeacherSubPastpaperAnswerController;
use App\Http\Controllers\Teacher\TeacherFilterController;
use App\Http\Controllers\Teacher\TeacherPastpaperController;
use App\Http\Controllers\Teacher\UserSurveyAnswerController;
use App\Http\Controllers\Teacher\TeacherQuizController;
use App\Http\Controllers\Teacher\TeacherQuizQuestionController;
use App\Http\Controllers\Teacher\TeacherQuizOptionController;
use App\Http\Controllers\Student\HomeController;
use App\Http\Controllers\Student\SubjectDisplayController;
use App\Http\Controllers\Student\TopCategoryController;
use App\Http\Controllers\Student\CartController;
use App\Http\Controllers\Student\ProfileController;
use App\Http\Controllers\Student\SearchController;
use App\Http\Controllers\Student\QuestionController;
use App\Http\Controllers\Student\CommentController;
use App\Http\Controllers\Student\WelcomeController;
use App\Http\Controllers\Student\QuizController;
use App\Http\Controllers\Student\BooksController as Books;
use App\Http\Controllers\Student\NotesController as Notes;
use App\Http\Controllers\Student\PastpaperController as Pastpapers;
use App\Http\Controllers\Admin\StandardController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\YearController;
use App\Http\Controllers\Admin\TermController;
use App\Http\Controllers\Admin\LevelController;
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
use App\Http\Controllers\Admin\CurrencyController;
use App\Http\Controllers\Admin\ItemController;
use App\Http\Controllers\Admin\SurveyController;
use App\Http\Controllers\Admin\SurveyQuestionController;
use App\Http\Controllers\Admin\SurveyAnswerController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

Route::get('/', [WelcomeController::class, 'index']);
Route::post('/standards/{standard}', [WelcomeController::class, 'activateStandard'])->name('student.standards.activate');
Route::get('/books', [Books::class, 'index'])->name('student.books.index');
Route::get('/donations', [DonationController::class, 'index'])->name('donate.index');
Route::get('/donations/{donor}', [DonationController::class, 'show'])->name('donate.show');
Route::post('/donations', [DonationController::class, 'store'])->name('donations.store');
Route::post('/cancel-donation', [DonationController::class, 'cancelDonation'])->name('donations.cancel');
Route::get('/checkout/{donor}', [CheckoutController::class, 'index'])->name('checkout.index');
Route::get('/books/{book}', [Books::class, 'show'])->name('student.books.show')->middleware('auth');
Route::get('/get-more-books', [Books::class, 'getMoreBooks'])->name('get-more-books');
Route::get('/get-matching-years-to-level/{id}', [Books::class, 'getMatchingYearsToLevel'])->name('get-matching-years-to-level');
Route::get('/notes', [Notes::class, 'index'])->name('student.notes.index');
Route::get('/notes/{note}', [Notes::class, 'show'])->name('student.notes.show')->middleware('auth');
Route::get('/get-more-notes', [Notes::class, 'getMoreNotes'])->name('get-more-notes');
Route::get('/get-matching-years-to-level/{id}', [Notes::class, 'getMatchingYearsToLevel'])->name('get-matching-years-to-level');
Route::get('/pastpapers', [Pastpapers::class, 'index'])->name('student.pastpapers.index');
Route::get('/pastpapers/{pastpaper}', [Pastpapers::class, 'show'])->name('student.pastpapers.show')->middleware('auth');
Route::get('/get-matching-years-to-level/{id}', [Pastpapers::class, 'getMatchingYearsToLevel'])->name('get-matching-years-to-level');
Route::get('/get-more-pastpapers', [Pastpapers::class, 'getMorePastpapers'])->name('get-more-pastpapers');
Route::get('/quizzes', [QuizController::class, 'index'])->name('student.quizzes');
Route::get('/quizzes/{quiz}', [QuizController::class, 'show'])->name('student.quizzes.show');
Route::get('/users/profile', [ProfileController::class, 'index'])->name('users.profile');
Route::post('/users/profile', [ProfileController::class, 'store'])->name('users.profile.store');
Route::patch('/users/profile/update', [ProfileController::class, 'update'])->name('users.profile.update');
Route::patch('/account-update', [UserController::class, 'accountUpdate'])->name('account-update');
Route::get('/contacts', [ContactController::class, 'index'])->name('contacts');
Route::post('/contacts', [ContactController::class, 'store'])->name('contacts.store');
Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/subjects/{subject}', [SubjectDisplayController::class, 'index'])->name('subjects.index');
Route::get('/subjects/{subject?}/topics/{topic?}', [SubjectDisplayController::class, 'show'])->name('student.show')->middleware('auth');
Route::get('/items', [SearchController::class, 'videoSubjects'])->name('items');
Route::get('/questions', [SearchController::class, 'subjectQuestions'])->name('questions');
Route::get('/categories/{category}', [TopCategoryController::class, 'index'])->name('categories.index');
Route::get('/teachers/{teacher}', [TeacherController::class, 'index'])->name('teachers.index');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/get-more-subjects', [HomeController::class, 'getMoreSubjects'])->name('get-more-subjects');
Route::get('/get-matching-years-to-level/{id}', [HomeController::class, 'getMatchingYearsToLevel'])->name('get-matching-years-to-level');
Route::get('/home/my-account', [HomeController::class, 'mySubjects'])->name('my-account');

Route::get('/questions', [QuestionController::class, 'index'])->name('questions');
Route::post('/question', [QuestionController::class, 'store'])->name('question.store');

Route::get('/comments', [CommentController::class, 'index'])->name('comments');
Route::post('/comment', [CommentController::class, 'store'])->name('comment.store');
Route::post('/reply', [CommentController::class, 'reply'])->name('reply.store');

Auth::routes(['verify' => true]);

Route::get('/teacher/onBoard', [SubjectController::class, 'onBoard'])->name('subjects.onBoard');

Route::middleware('auth')->group(function() {
    Route::get('/cart/{response?}', [CartController::class, 'index'])->name('cart.response');
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');

    Route::post('/userSurveyAnswers', [UserSurveyAnswerController::class, 'store'])->name('userSurveyAnswer.store');

    Route::prefix('teacher')->group(function() {
        Route::get('/starter', [SubjectController::class, 'starter'])->name('subjects.starter');
        Route::get('/onBoard', [SubjectController::class, 'onBoard'])->name('subjects.onBoard');
        Route::get('/manage/subjects', [SubjectController::class, 'index'])->name('manage.subjects')->middleware('teacher');
        Route::get('/subjects', [SubjectController::class, 'create'])->name('subjects.create');
        Route::post('/subjects', [SubjectController::class, 'store'])->name('subjects');
        Route::get('/subjects/{subject}', [SubjectController::class, 'show'])->name('subjects.show');
        Route::get('/subjects/{subject}/edit', [SubjectController::class, 'edit'])->name('subjects.edit');
        Route::patch('/subjects/{subject}/update', [SubjectController::class, 'update'])->name('subjects.update');
        Route::delete('/subjects/{subject}/destroy', [SubjectController::class, 'destroy'])->name('subjects.destroy');

        /** Books */
        Route::resource('/books', 'Teacher\TeacherBookController')->except(['index']);
        Route::get('/books', [TeacherBookController::class, 'index'])->name('teacher.books');
        Route::post('/books/{book}/objectives/{objective}', [TeacherBookController::class, 'deleteObjective'])->name('teacher.books.objective.destroy');

        Route::get('/get-years-to-level/{id}', [TeacherFilterController::class, 'getYearsToLevel'])->name('get-years-to-level');
        Route::get('/get-levels-to-standard/{id}', [TeacherFilterController::class, 'getLevelsToStandard'])->name('get-levels-to-standard');
        Route::get('/get-item_content-of-item/{id}', [TeacherFilterController::class, 'getCoursesOfACategory'])->name('get-item_content-of-item');
        Route::get('/get-right-currency/{id}', [TeacherFilterController::class, 'getRightCurrency'])->name('get-right-currency');

        /** Notes */
        Route::resource('/notes', 'Teacher\TeacherNoteController')->except(['index']);
        Route::get('/notes', [TeacherNoteController::class, 'index'])->name('teacher.notes');
        Route::post('/notes/{note}/objectives/{objective}', [TeacherNoteController::class, 'deleteObjective'])->name('teacher.notes.objective.destroy');

        /** Sub Notes */
        Route::get('/notes/{note}/subNotes', [TeacherSubNoteController::class, 'create'])->name('subNotes.create');
        Route::post('/notes/{note}/subNotes', [TeacherSubNoteController::class, 'store'])->name('subNotes.store');
        Route::get('/notes/{note}/subNotes/{subNote}', [TeacherSubNoteController::class, 'show'])->name('subNotes.show');
        Route::get('/notes/{note}/subNotes/{subNote}/edit', [TeacherSubNoteController::class, 'edit'])->name('subNotes.edit');
        Route::patch('/notes/{note}/subNotes/{subNote}/update', [TeacherSubNoteController::class, 'update'])->name('subNotes.update');
        Route::delete('/notes/{note}/subNotes/{subNote}/destroy', [TeacherSubNoteController::class, 'destroy'])->name('subNotes.delete');

        /** Past papers */
        Route::resource('/pastpapers', 'Teacher\TeacherPastpaperController')->except(['index']);
        Route::get('/pastpapers', [TeacherPastpaperController::class, 'index'])->name('teacher.pastpapers');
        Route::post('/pastpapers/{pastpaper}/objectives/{objective}', [TeacherPastpaperController::class, 'deleteObjective'])->name('teacher.pastpapers.objective.destroy');

        /** Sub past papers */
        Route::get('/pastpapers/{pastpaper}/subPastpapers', [TeacherSubPastpaperController::class, 'create'])->name('subPastpapers.create');
        Route::post('/pastpapers/{pastpaper}/subPastpapers', [TeacherSubPastpaperController::class, 'store'])->name('subPastpapers.store');
        Route::get('/pastpapers/{pastpaper}/subPastpapers/{subPastpaper}', [TeacherSubPastpaperController::class, 'show'])->name('subPastpapers.show');
        Route::get('/pastpapers/{pastpaper}/subPastpapers/{subPastpaper}/edit', [TeacherSubPastpaperController::class, 'edit'])->name('subPastpapers.edit');
        Route::patch('/pastpapers/{pastpaper}/subPastpapers/{subPastpaper}/update', [TeacherSubPastpaperController::class, 'update'])->name('subPastpapers.update');
        Route::delete('/pastpapers/{pastpaper}/subPastpapers/{subPastpaper}/destroy', [TeacherSubPastpaperController::class, 'destroy'])->name('subPastpapers.delete');

        /** Sub answers to past papers */
        Route::get('/pastpapers/{pastpaper}/subPastpaperAnswers', [TeacherSubPastpaperAnswerController::class, 'create'])->name('subPastpaperAnswers.create');
        Route::post('/pastpapers/{pastpaper}/subPastpaperAnswers', [TeacherSubPastpaperAnswerController::class, 'store'])->name('subPastpaperAnswers.store');
        Route::get('/pastpapers/{pastpaper}/subPastpaperAnswers/{subPastpaperAnswer}', [TeacherSubPastpaperAnswerController::class, 'show'])->name('subPastpaperAnswers.show');
        Route::get('/pastpapers/{pastpaper}/subPastpaperAnswers/{subPastpaperAnswer}/edit', [TeacherSubPastpaperAnswerController::class, 'edit'])->name('subPastpaperAnswers.edit');
        Route::patch('/pastpapers/{pastpaper}/subPastpaperAnswers/{subPastpaperAnswer}/update', [TeacherSubPastpaperAnswerController::class, 'update'])->name('subPastpaperAnswers.update');
        Route::delete('/pastpapers/{pastpaper}/subPastpaperAnswers/{subPastpaperAnswer}/destroy', [TeacherSubPastpaperAnswerController::class, 'destroy'])->name('subPastpaperAnswers.delete');

        /** Quizzes*/
        Route::resource('/quizzes', 'Teacher\TeacherQuizController')->except(['index']);
        Route::get('/quizzes', [TeacherQuizController::class, 'index'])->name('teacher.quizzes');

        /** Teacher quiz questions */
        Route::get('/quizzes/{quiz}/quizQuestions', [TeacherQuizQuestionController::class, 'create'])->name('quizQuestions.create');
        Route::post('/quizzes/{quiz}/quizQuestions', [TeacherQuizQuestionController::class, 'store'])->name('quizQuestions.store');
        Route::get('/quizzes/{quiz}/quizQuestions/{quizQuestion}', [TeacherQuizQuestionController::class, 'show'])->name('quizQuestions.show');
        Route::get('/quizzes/{quiz}/quizQuestions/{quizQuestion}/edit', [TeacherQuizQuestionController::class, 'edit'])->name('quizQuestions.edit');
        Route::patch('/quizzes/{quiz}/quizQuestions/{quizQuestion}/update', [TeacherQuizQuestionController::class, 'update'])->name('quizQuestions.update');
        Route::delete('/quizzes/{quiz}/quizQuestions/{quizQuestion}/destroy', [TeacherQuizQuestionController::class, 'destroy'])->name('quizQuestions.delete');

        /** Teacher quiz options */
        Route::get('/quizzes/{quiz}/quizQuestions/{quizQuestion}/quizOptions', [TeacherQuizOptionController::class, 'create'])->name('quizOptions.create');
        Route::post('/quizzes/{quiz}/quizQuestions/{quizQuestion}/quizOptions', [TeacherQuizOptionController::class, 'store'])->name('quizOptions.store');
        Route::get('/quizzes/{quiz}/quizQuestions/{quizQuestion}/quizOptions/{quizOption}', [TeacherQuizOptionController::class, 'show'])->name('quizOptions.show');
        Route::get('/quizzes/{quiz}/quizQuestions/{quizQuestion}/quizOptions/{quizOption}/edit', [TeacherQuizOptionController::class, 'edit'])->name('quizOptions.edit');
        Route::patch('/quizzes/{quiz}/quizQuestions/{quizQuestion}/quizOptions/{quizOption}/update', [TeacherQuizOptionController::class, 'update'])->name('quizOptions.update');
        Route::delete('/quizzes/{quiz}/quizQuestions/{quizQuestion}/quizOptions/{quizOption}/destroy', [TeacherQuizOptionController::class, 'destroy'])->name('quizOptions.delete');

        /** Audiences to subjects */
        Route::get('/subjects/{subject}/audiences', [AudienceController::class, 'index']);
        Route::get('/subjects/{subject}/audiences', [AudienceController::class, 'create']);
        Route::post('/subjects/{subject}/audiences', [AudienceController::class, 'store'])->name('audiences');
        Route::get('/subjects/{subject}/audiences/edit', [AudienceController::class, 'edit'])->name('audiences.edit');
        Route::patch('/subjects/{subject}/audiences/update', [AudienceController::class, 'update'])->name('audiences.update');
        Route::post('/subjects/{subject}/audiences/{audience}/deleteStudentLearn', [AudienceController::class, 'deleteStudentLearn'])->name('teacher.subject.student_learn.destroy');
        Route::post('/subjects/{subject}/audiences/{audience}/deleteClassRequirement', [AudienceController::class, 'deleteClassRequirement'])->name('teacher.subject.class_requirement.destroy');
        Route::post('/subjects/{subject}/audiences/{audience}/deleteTargetStudent', [AudienceController::class, 'deleteTargetStudent'])->name('teacher.subject.target_student.destroy');

        /** Messages to subjects */
        Route::get('/subjects/{subject}/messages', [MessageController::class, 'index']);
        Route::get('/subjects/{subject}/messages', [MessageController::class, 'create']);
        Route::post('/subjects/{subject}/messages', [MessageController::class, 'store'])->name('messages');
        Route::get('/subjects/{subject}/messages/edit', [MessageController::class, 'edit'])->name('messages.edit');
        Route::patch('/subjects/{subject}/messages/update', [MessageController::class, 'update'])->name('messages.update');

        /** Topics to subjects */
        Route::get('/subjects/{subject}/topics', [TopicController::class, 'index'])->name('topics.index');
        Route::get('/subjects/{subject}/topics', [TopicController::class, 'create'])->name('topics.create');
        Route::get('/subjects/{subject}/topics/{topic}', [TopicController::class, 'show'])->name('topics.show');
        Route::post('/subjects/{subject}/topics', [TopicController::class, 'store'])->name('topics');
        Route::get('/subjects/{subject}/topics/{topic}/edit', [TopicController::class, 'edit'])->name('topics.edit');
        Route::delete('/subjects/{subject}/topics/{topic}/destroy', [TopicController::class, 'destroy'])->name('topics.destroy');
        Route::patch('/subjects/{subject}/topics/{topic}/update', [TopicController::class, 'update'])->name('topics.update');

        Route::get('/manage/performances', [PerformanceController::class, 'index'])->name('manage.performances');
        Route::get('manage/performances/itemContents', [PerformanceController::class, 'getItemContentsTeacherPerforamce'])->name('manage.performances.itemContents');
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
        Route::get('/student-profiles', [StudentProfileController::class, 'index'])->name('student.profiles');
        Route::get('/student-profiles/{student}', [StudentProfileController::class, 'show'])->name('student.profile.show');
        Route::get('/teacher-profiles', [TeacherProfileController::class, 'index'])->name('teacher.profiles');
        Route::get('/teacher-profiles/{teacher}', [TeacherProfileController::class, 'show'])->name('teacher.profile.show');

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
        Route::resource('standards', 'StandardController');
        Route::resource('categories', 'CategoryController');
        Route::resource('levels', 'LevelController');
        Route::resource('years', 'YearController');
        Route::resource('terms', 'TermController');
        Route::resource('books', 'BooksController');
        Route::resource('notes', 'NotesController');
        Route::resource('pastpapers', 'PastpaperController');
        Route::resource('items', 'ItemController');
        Route::resource('surveys', 'SurveyController');
        Route::resource('surveyQuestions', 'SurveyQuestionController');
        Route::resource('surveyAnswers', 'SurveyAnswerController');
        Route::post('/surveyAnswers/{surveyAnswer}/deleteSurveyAnswer', [
            SurveyAnswerController::class, 'deleteSurveyAnswer'
        ])->name('surveyAnswer.destroy');
        Route::resource('currencies', 'CurrencyController');
    });
});
