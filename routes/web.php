<?php

use App\Http\Controllers\QuestionController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/// Auth
Auth::routes();

Route::middleware(['auth'])->group(function () {
    /// Models
    Route::get('/quizzes',              [QuizController::class, 'index'])->name('quizzes.index');
    Route::get('/quizzes/create',       [QuizController::class, 'create'])->name('quizzes.create');
    Route::get('/quizzes/delete',       [QuizController::class, 'delete'])->name('quizzes.delete');
    Route::get('/quizzes/edit',         [QuizController::class, 'edit'])->name('quizzes.edit');
    Route::get('/quizzes/update/{quiz}', [QuizController::class, 'update'])->name('quizzes.update');
    Route::put('/quizzes/update/{quiz}', [QuizController::class, 'updateJob'])->name('quizzes.updateJob');
    Route::get('/quizzes/{quiz}',       [QuizController::class, 'show'])->name('quizzes.show');
    Route::get('/quizzes/{quiz}/start', [QuizController::class, 'start'])->name('quizzes.start');
    Route::post('/quizzes/store',       [QuizController::class, 'store'])->name('quizzes.store');
    Route::delete('/quizzes/destroy',   [QuizController::class, 'destroy'])->name('quizzes.destroy');

    Route::get('/questions/create', [QuestionController::class, 'create'])->name('questions.create');
    Route::get('/questions/get/{quiz}', [QuestionController::class, 'getQuestions'])->name('questions.getQuestions');
    Route::get('/questions/edit',         [QuestionController::class, 'edit'])->name('questions.edit');
    Route::post('/questions/store', [QuestionController::class, 'store'])->name('questions.store');
    Route::post('/questions/check-answer', [QuestionController::class, 'checkAnswer'])->name('questions.check-answer');
    Route::get('/questions/update/{quiz}/{questionId}', [QuestionController::class, 'update'])->name('questions.update');
    Route::put('/questions/update/{quiz}/{questionId}', [QuestionController::class, 'updateJob'])->name('questions.updateJob');
    Route::delete('/questions/destroy/{quiz}/{question}', [QuestionController::class, 'destroy'])->name('questions.destroy');

    /// Routes
    Route::get('/', [QuizController::class, 'index'])->name('home');
    Route::get('/home', [QuizController::class, 'index'])->name('home');
});
