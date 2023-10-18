<?php

use App\Http\Controllers\PostController;
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

Route::get('/', function () use ($PO) {
    $posts = $PO->getPosts();
    return view('Home.home', compact("posts"));
});

Route::get('/welcome', function () {
    return view('welcome');
});
