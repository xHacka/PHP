@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Edit Quiz</h1>

    <form method="POST" action="{{ route('quizzes.destroy') }}">
        @csrf
        @method('DELETE')

        <div class="">
            <label for="quiz" class="form-label">Quiz</label>
            <select class="form-select" id="quiz" name="quiz" required>
                @foreach($quizzes as $id => $quiz)
                    <option value="{{ $id }}">{{ $quiz }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-danger">Delete</button>
        <a href="#" id="update" class="btn btn-primary">Update</a>
        <a href="{{ route('quizzes.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const quiz = document.getElementById('quiz');
        const update = document.getElementById('update');
        const updateBaseURL = '/quizzes/update';
        update.setAttribute('href', `${updateBaseURL}/${quiz.value}`);
        quiz.addEventListener('change', function() {
            update.setAttribute('href', `${updateBaseURL}/${this.value}`);
        });
    });
</script>
@endsection