@extends('Quiz4.layout')

@section('title', 'Quiz 4 - Edit')

@section('content')
<h1>Quizzes</h1>

<form action="/quiz4/{{$quiz->id}}">
    @csrf

    @if ($post->id ?? null)
    <div class="form-group">
        <input type="hidden" name="id" readonly value="{{$quiz->id}}" />
    </div>
    @endif

    <div class="form-group">
        <label for="title">Title:</label><input type="text" name="title" value="{{$quiz->title}}" />
    </div>
    <div class="form-group">
        <label for="description">Description:</label><input type="text" name="description" value="{{$quiz->description}}" />
    </div>
    <div class="form-group">
        <label for="is_active">Is Active:</label><input type="checkbox" name="is_active" value="{{$quiz->is_active === 1 ? 'checked' : ''}}" />
    </div>
</form>
@endsection
