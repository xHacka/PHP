<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use Illuminate\Http\Request;

class QuizController extends Controller {
    public function index() {
        return view('Quiz3.home', [
            'quizzes' => Quiz::all(),
        ]);
    }
}