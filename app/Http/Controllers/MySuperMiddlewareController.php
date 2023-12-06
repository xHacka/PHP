<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MySuperMiddlewareController extends Controller {
    function home(Request $request) {
        return view('Quiz7.home');
    }

    function secret(Request $reqeust) {
        return view('Quiz7.secret');
    }

    function error(Request $reqeust) {
        return view('Quiz7.error');
    }
}
