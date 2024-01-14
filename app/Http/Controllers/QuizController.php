<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Quiz;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuizController extends Controller {
    public function index() {
        $quizzes = Auth::user()->quizzes()->orderBy('created_at', 'desc')->get();
        return view('quizzes.index', compact('quizzes'));
    }

    private function getQuizNames() {
        return Quiz::pluck('name', 'id');
    }

    public function start(Quiz $quiz) {
        return view('quizzes.start', compact('quiz'));
    }

    public function show(Quiz $quiz) {
        return view('quizzes.show', compact('quiz'));
    }

    public function create() {
        return view('quizzes.create');
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required',
            'image' => 'required',
            'description' => 'required'
        ]);

        $quiz = Quiz::create([
            'name' => $request->input('name'),
            'image' => $request->input('image'),
            'description' => $request->input('description'),
            'user_id' => auth()->id()
        ]);

        return redirect()->route('quizzes.show', $quiz);
    }

    public function delete() {
        $quizzes = $this->getQuizNames();
        return view('quizzes.delete', compact('quizzes'));
    }

    public function destroy(Request $request) {
        $request->validate([
            'quiz' => 'required|integer'
        ]);
        $quiz = Quiz::find($request->quiz);
        $quiz->questions()->delete();
        $quiz->delete();
        return redirect()->route('quizzes.index')->with('success', 'Quiz deleted successfully');
    }


    public function edit() {
        $quizzes = $this->getQuizNames();
        return view('quizzes.edit', compact('quizzes'));
    }

    public function update(Quiz $quiz) {
        return view('quizzes.update', compact('quiz'));
    }

    public function updateJob(Request $request, Quiz $quiz) {
        $quiz->update($request->all());
        return redirect()->route('quizzes.index')->with('success', 'Quiz updated successfully');
    }
}
