@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Edit Questions</h1>

    <form id="deleteForm" method="POST" action="#">
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

        <div class="">
            <label for="questions" class="form-label">Questions</label>
            <select class="form-select" id="questions" name="questions" required>
                {{-- Questions --}}
            </select>
        </div>

        <button type="submit" class="btn btn-danger">Delete</button>
        <a href="#" id="update" class="btn btn-primary">Update</a>
        <a href="{{ route('quizzes.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
<script>
    const updateBaseURL = '/questions/update';
    const deleteBaseURL = '/questions/destroy';

    function setQuestions(quiz) {
        fetch(`/questions/get/${quiz}`)
            .then(response => response.json())
            .then(data => {
                questions.innerHTML = '';
                data.forEach((question, i) => {
                    const option = document.createElement('option');
                    option.value = i + 1;
                    option.textContent = question;
                    questions.appendChild(option);
                });
            })
            .catch(error => console.error('Error fetching questions:', error));
    }

    document.addEventListener('DOMContentLoaded', () => {
        const quiz = document.getElementById('quiz');
        const update = document.getElementById('update');
        setQuestions(quiz.value)
        const questions = document.getElementById('questions');
        update.setAttribute('href', `${updateBaseURL}/${quiz.value}/1`);
        deleteForm.action = `${deleteBaseURL}/${quiz.value}/1`;
        quiz.addEventListener('change', function() {
            setQuestions(this.value)
        });
        questions.addEventListener('change', function() {
            update.setAttribute('href', `${updateBaseURL}/${quiz.value}/${this.value}`);
            deleteForm.action = `${deleteBaseURL}/${quiz.value}/${this.value}`;
        });
    });
</script>
@endsection