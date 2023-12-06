<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\MySuperMiddlewareController;
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

$PO = new PostController();

Route::get('/quiz2', function () use ($PO) {
    $posts = $PO->getPosts();
    return view('Home.home', compact("posts"));
});

Route::get('/quiz3', [QuizController::class, 'index']);

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/quiz4/{quiz?}', [QuizController::class, 'createOrUpdate'])->name('quiz');

// Quiz 6
// Route::get('/', [QuizController::class, 'index']);

Route::get('/secret', [MySuperMiddlewareController::class, 'secret'])->middleware("mysupermiddleware");;
Route::get('/error', [MySuperMiddlewareController::class, 'error']);
Route::get('/', [MySuperMiddlewareController::class, 'home']);