@extends('Quiz3.layout')

@section('title', 'Quiz3')

@section('content')
<h1>Quizzes</h1>

<table>
    <tr>
        <td>ID</td>
        <td>Title</td>
        <td>Description</td>
        <td>Created At</td>
    </tr>
    @foreach ($quizzes as $quiz)
    <tr>
        <td>{{ $quiz->id }}</td>
        <td>{{ $quiz->title }}</td>
        <td>{{ $quiz->description }}</td>
        <td>{{ $quiz->created_at }}</td>
    </tr>
    @endforeach
</table>
@endsection
