@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">Edit Question</h1>

        <form method="POST" action="{{ route('questions.updateJob', ['quiz' => $quiz->id, 'questionId' => basename(request()->path()) ]) }}">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">Question Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('question', $question->question) }}" required>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Question Image</label>
                <input type="text" class="form-control" id="image" name="image" value="{{ old('image', $question->image) }}" required>
            </div>
            <div class="mb-3">
                <label for="answer1" class="form-label">Question Answer1</label>
                <input type="text" class="form-control" id="answer1" name="answer1" value="{{ old('answer1', $question->answer1) }}" required>
            </div>
            <div class="mb-3">
                <label for="answer2" class="form-label">Question Answer2</label>
                <input type="text" class="form-control" id="answer2" name="answer2" value="{{ old('answer2', $question->answer2) }}" required>
            </div>
            <div class="mb-3">
                <label for="answer3" class="form-label">Question Answer3</label>
                <input type="text" class="form-control" id="answer3" name="answer3" value="{{ old('answer3', $question->answer3) }}" required>
            </div>
            <div class="mb-3">
                <label for="answer4" class="form-label">Question Answer4</label>
                <input type="text" class="form-control" id="answer4" name="answer4" value="{{ old('answer4', $question->answer4) }}" required>
            </div>
            <div class="mb-3">
                <label for="answer" class="form-label">Question Answer</label>
                <input type="text" class="form-control" id="answer" name="answer" value="{{ old('answer', $question->answer) }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Update Quiz</button>
            <a href="{{ route('quizzes.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
@endsection
