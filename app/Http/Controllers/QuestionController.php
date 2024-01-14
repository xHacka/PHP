<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Quiz;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function Laravel\Prompts\error;

class QuestionController extends Controller {
    public function create() {
        $quizzes = Quiz::pluck('name', 'id');
        return view('questions.create', compact('quizzes'));
    }

    public function store(Request $request) {
        $request->validate([
            'image' => 'required',
            'question' => 'required',
            'answer1' => 'required',
            'answer2' => 'required',
            'answer3' => 'required',
            'answer4' => 'required',
            'answer' => 'required|integer|in:1,2,3,4',
            'quiz' => 'required|integer'
        ]);
        Question::create([
            'image'    => $request->input('image'),
            'question' => $request->input('question'),
            'answer1'  => $request->input('answer1'),
            'answer2'  => $request->input('answer2'),
            'answer3'  => $request->input('answer3'),
            'answer4'  => $request->input('answer4'),
            'answer'   => $request->input('answer'),
            'quiz_id'  => $request->input('quiz')
        ]);

        return redirect()->route('questions.create');
    }

    public function getQuestions(Quiz $quiz) {
        return response()->json($quiz->questions->pluck('question'));
    }

    private function getQuestion(int $quiz, int $nth) {
        return Question::where('quiz_id', $quiz)
                        ->skip(--$nth) 
                        ->take(1)
                        ->get();
    }

    public function checkAnswer(Request $request) {
        // Auth 0 :///
        $request->validate([
            'quiz_id' => 'required|integer',
            'question_id' => 'required|integer',
        ]);
        if (!Auth::check()) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        $quiz_id = $request->input('quiz_id');
        $question_id = $request->input('question_id');
        $correctAnswer = $this->getQuestion($quiz_id, $question_id)->value('answer');
        return response()->json(['correct' => $correctAnswer], 200);
    }

    public function edit() {
        $quizzes = Quiz::pluck('name', 'id');
        return view('questions.edit', compact('quizzes'));
    }

    public function destroy(Quiz $quiz, int $question) {
        $question--;
        $questions = $quiz->questions;
        if (!isset($questions[$question])) {
            return redirect()->route('quizzes.show', $quiz)->with('error', 'Question not found.');
        }
        $questions[$question]->delete();
        return redirect()->route('quizzes.show', $quiz)->with('success', 'Question deleted successfully.');
    }

    public function update(Quiz $quiz, int $questionId) {
        $question = $this->getQuestion($quiz->id, $questionId)->first();
        return view('questions.update', compact('quiz', 'question'));
    }

    public function updateJob(Request $request, Quiz $quiz, int $questionId) {
        $this->getQuestion($quiz->id, $questionId)->first()->update($request->all());
        return redirect()->route('quizzes.index')->with('success', 'Quiz updated successfully');
    }
}
