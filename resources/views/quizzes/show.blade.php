@extends('layouts.app')

@section('content')
<div class="container mt-5" style="max-width: 40rem;"> 
    <div class="mx-auto border border-2 border-gray-200 rounded-lg shadow bg-light">
        <div class="w-100 h-auto border-solid">
            <img class="rounded-top-lg img-fluid" src="{{ $quiz->image }}" alt="{{ $quiz->name }}" />
        </div>
        <div class="p-4">
            <h5 class="mb-2 text-2xl font-weight-bold tracking-tight text-dark">{{ $quiz->name }}</h5>
            <p class="mb-3 font-normal text-secondary">{{ $quiz->description }}</p>
            <a href="{{ route('quizzes.start', $quiz) }}" class="btn btn-primary rounded-lg">
                Start
                <svg class="rtl-rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                </svg>
            </a>
        </div>
    </div>
</div>
@endsection