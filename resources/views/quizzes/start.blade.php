@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div id="quiz-container" class="d-flex align-items-center justify-content-center">
        <div class="p-4 rounded-lg">
            <h1 class="font-weight-bold mb-4">Quiz: {{ $quiz->name }}</h1>
            @php($questions_length = count($quiz->questions))
            @foreach($quiz->questions as $i => $question)
            <div class="card p-4 rounded-lg mb-4 question" data-question="{{ $i }}">
                <div style="width: 30rem;" class="h-auto border-solid">
                    <img class="rounded img-fluid" src="{{ $question->image }}" alt="{{ $question->question }}" />
                </div>
                <h2 class="h2 font-weight-bold my-2">
                    <span class="pr-5">({{ $i + 1 }} / {{ $questions_length }})</span>
                    {{ $question->question }}
                </h2>
                <div class="answers d-flex flex-column">
                    <div class="form-check">
                        <input class="form-check-input h5" data-answer="1" type="radio" name="answer" value="{{ $question->answer1 }}">
                        <label class="form-check-label h5">{{ $question->answer1 }}</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input h5" data-answer="2" type="radio" name="answer" value="{{ $question->answer2 }}">
                        <label class="form-check-label h5">{{ $question->answer2 }}</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input h5" data-answer="3" type="radio" name="answer" value="{{ $question->answer3 }}">
                        <label class="form-check-label h5">{{ $question->answer3 }}</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input h5" data-answer="4" type="radio" name="answer" value="{{ $question->answer4 }}">
                        <label class="form-check-label h5">{{ $question->answer4 }}</label>
                    </div>
                </div>
                <div class="w-full">
                    <button class="answer-btn d-block px-5 py-10 mx-auto btn btn-primary" disabled>Answer</button>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <div class="w-full text-center">
        <a href="{{ route('quizzes.index') }}" class="btn btn-primary">Complete</a>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        document.querySelectorAll('.question').forEach(question => {
            question.querySelectorAll('input').forEach(answer => {
                answer.addEventListener('click', () => {
                    question.querySelector('.answer-btn').disabled = false;
                    question.querySelector('.answer-btn').onclick = checkAnswer;
                })
            })
        });

        function checkAnswer(event) {
            const container = $(event.target).closest('.card').get(0);
            const answers = container.querySelectorAll('.form-check');
            const questionNumber = parseInt(container.dataset.question); 
            const btn = container.querySelector('button')
            $.ajax({
                method: 'POST',
                url: '/questions/check-answer',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    quiz_id: parseInt(document.location.pathname.split('/')[2]),
                    question_id: questionNumber,
                },
                success: function(response) {
                    answers.forEach(answer => {
                        answer.classList.remove('bg-success', 'bg-danger')
                        let input = answer.querySelector('input')
                        let inputValue = parseInt(input.dataset.answer)
                        if (input.checked) { 
                            if (inputValue === response.correct) {
                                answer.classList.add('bg-success')
                            } else {
                                answer.classList.add('bg-danger')
                            }
                        }
                        if (inputValue === response.correct) {
                            answer.classList.add('bg-success');
                        }
                        input.disabled = true;
                    })
                    btn.disabled = true;
                },
                error: function(error) {
                    console.error('Error in AJAX request:', error);
                }
            });
        }
    })
</script>
@endsection