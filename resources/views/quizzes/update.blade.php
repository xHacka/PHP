@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">Edit Quiz</h1>

        <form method="POST" action="{{ route('quizzes.update', $quiz->id) }}">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">Quiz Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $quiz->name) }}" required>
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Quiz Image</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('image', $quiz->image) }}" required>
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Quiz Description</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('description', $quiz->description) }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Update Quiz</button>
            <a href="{{ route('quizzes.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
@endsection
