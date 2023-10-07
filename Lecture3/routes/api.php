<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/* TOTALLY NORMAL BEHAVIOUR */
static $items = [];    
function postItem($item)     { global $items; array_push($items, $item); }
function putItem($id, $item) { global $items; $items[$id] = $item;       }
function deleteItem($id)     { global $items; unset($items[$id]);        }
/* TOTALLY NORMAL BEHAVIOUR */

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/asjson', function () {
    $resp = [
        "name" => "Giorgi Gelashvili",
        "age" => "21 🌱",
        "hobby" => "Cybersecurity 🤖"
    ];
    return response()->json($resp);
});

Route::post('/addItem', function(Request $request) {
    global $items;
    $request->validate([
        'name' => 'required',
        'price' => 'required',
    ]);
    array_push($items, $request->name, $request->price);
});

Route::put('/updateItem', function(Request $request) {
    global $items;
    $request->validate([
        'id' => 'required',
        'name' => 'required',
        'price' => 'required',
    ]);
    $items[$request->id] = [$request->name, $request->price];
});

Route::delete('/deleteItem', function(Request $request) {
    global $items;
    $request->validate([
        'id' => 'required',
    ]);
    unset($items[$request->id]);
});

Route::get('/viewItems', function() {
    global $items;
    return response()->json($items);
});