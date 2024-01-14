@extends('layouts.app')

@section('content')
    <div class="container mx-auto mt-8">
        <h2 class="text-2xl font-bold mb-4">Questions</h2>

        <table class="min-w-full bg-white border border-gray-300">
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b">Question</th>
                    <th class="py-2 px-4 border-b">Answers</th>
                    <th class="py-2 px-4 border-b">Correct Answer</th>
                    <th class="py-2 px-4 border-b">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($questions as $question)
                    <tr>
                        <td class="py-2 px-4 border-b">{{ $question->question }}</td>
                        <td class="py-2 px-4 border-b">
                            {{ $question->answer1 }}, {{ $question->answer2 }}, {{ $question->answer3 }}, {{ $question->answer4 }}
                        </td>
                        <td class="py-2 px-4 border-b">{{ $question->correct_answer }}</td>
                        <td class="py-2 px-4 border-b">
                            <a href="{{ route('questions.edit', $question->id) }}" class="text-blue-500 hover:underline">Edit</a>
                            <form action="{{ route('questions.destroy', $question->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:underline ml-2">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-4">
            <a href="{{ route('questions.create') }}" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-700">Add Question</a>
        </div>
    </div>
@endsection
