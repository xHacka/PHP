@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="text-3xl font-weight-bold mb-4">Quizzes</h1>
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
        @foreach($quizzes as $quiz)
        <div class="col">
            <div class="bg-white p-4 rounded-lg shadow">
                <div class="w-100 h-auto border-solid">
                    <img class="rounded-top-lg img-fluid" src="{{ $quiz->image }}" alt="{{ $quiz->name }}" />
                </div>
                <div class="p-4">
                    <h5 class="mb-2 text-2xl font-weight-bold tracking-tight text-dark">{{ $quiz->name }}</h5>
                    <p class="mb-3 font-normal text-secondary text-truncate w-full">{{ $quiz->description }}</p>
                    <p class="text-sm mt-2">Questions: {{ count($quiz->questions) }}</p>
                    <a href="{{ route('quizzes.show', $quiz) }}" class="mt-4 btn btn-primary rounded-pill">View Quiz</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection