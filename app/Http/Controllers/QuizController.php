<?php

namespace App\Http\Controllers;

use App\Models\Quiz;

class QuizController extends Controller {
    public function index() {
        $quizzes = Quiz::where('photo', '!=', null)
            ->where('is_active', true)
            ->orderBy('created_at', 'desc')
            ->take(8)
            ->get();

        if ($quizzes->count() < 8) {
            $remainingQuizzes = Quiz::where('description', '!=', '')
                ->take(8 - $quizzes->count())
                ->get();

            $quizzes = $quizzes->merge($remainingQuizzes);
        }

        return view('Quiz6.index', [
            'quizzes' => $quizzes,
        ]);
    }

    // public function createOrUpdate(Quiz $quiz, Request $request) {
    //     $quiz->fill($request->all())->save();
    //     return redirect()->route('Quiz4.home');
    // }
}
