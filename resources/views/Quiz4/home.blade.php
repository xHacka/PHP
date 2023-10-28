@extends('Quiz4.layout')

@section('title', 'Quiz 4')

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
        <td>{{ $quiz->is_active }}</td>
        <td>{{ $quiz->created_at }}</td>
        <td>{{ $quiz->deleted_at }}</td>
        <td>
            <a class='btn' href="{{ view('Quiz4.edit', ['id' => $quiz->id]) }}">
            <img class='btn-icon' src="/assets/edit.png" alt="edit" />Edit</a>
        </td>
    </tr>
    @endforeach
</table>
@endsection
