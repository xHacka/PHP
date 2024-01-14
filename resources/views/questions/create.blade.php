@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Add Questions</h1>
    <form method="POST" action="{{ route('questions.store') }}">
        @csrf

        <div class="">
            <label for="quiz" class="form-label">Quiz</label>
            <select class="form-select" id="quiz" name="quiz" required>
                @foreach($quizzes as $id => $quiz)
                    <option value="{{ $id }}">{{ $quiz }}</option>
                @endforeach
            </select>
        </div>

        <div class="">
            <label for="image" class="form-label">Image URL</label>
            <input type="text" class="form-control" name="image" id="image" placeholder="https://" required>
        </div>
        
        <div class="">
            <label for="question" class="form-label">Question</label>
            <input type="text" class="form-control" name="question" id="question" placeholder="...?" required>
        </div>

        <div id="answers-container">
            @for ($i = 1; $i < 5; $i++) <div class="mb-3 answer-group">
                <label for="answer{{$i}}" class="form-label">Answer {{$i}}</label>
                <input type="text" class="form-control" id="answer{{$i}}" name="answer{{$i}}" required>
                @endfor
        </div>

        <div class="">
            <label for="answer" class="form-label">Answer Number</label>
            <input type="text" class="form-control" name="answer" id="answer" placeholder="1" required>
        </div>

        <button type="submit" class="btn btn-secondary mb-3">Add Answers</button>
    </form>
</div>
@endsection