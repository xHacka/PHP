<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use Illuminate\Http\Request;

class QuizController extends Controller {
    public function index() {
        return view('Quiz4.home', [
            'quizzes' => Quiz::all(),
        ]);
    }

    public function createOrUpdate(Quiz $quiz, Request $request) {
        $quiz->fill($request->all())->save();
        return redirect()->route('Quiz4.home');
    }
}
