<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\QuizController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get   ('posts'      , [PostController::class, 'index'    ]);
Route::get   ('posts/{id}' , [PostController::class, 'view'     ]);
Route::post  ('posts'      , [PostController::class, 'store'    ]);
Route::put   ('posts/{id}' , [PostController::class, 'update'   ]);
Route::delete('posts/purge', [PostController::class, 'deleteAll']);
Route::delete('posts/{id}' , [PostController::class, 'delete'   ]);