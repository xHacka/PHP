<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .quiz-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 20px;
            padding: 4rem 20rem;
        }

        .card {
            width: 100%;
            border: 1px solid #ccc;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .card-img-top {
            width: 100%;
            height: auto;
            max-width: 100%;
        }

        .card-body {
            padding: 20px;
        }

        .card-title {
            font-size: 1.2rem;
            margin-bottom: 10px;
        }

        .card-text {
            color: #555;
        }

        .text-success {
            color: #28a745;
        }

        .text-danger {
            color: #dc3545;
        }
    </style>
</head>

<body>
    <div class="quiz-container">
        @foreach ($quizzes as $quiz)
        <div class="card">
            @if ($quiz->photo)
                <img src="{{ $quiz->photo }}" alt="{{ $quiz->title }}" class="card-img-top">
            @endif

            <div class="card-body">
                <h5 class="card-title">{{ $quiz->title }}</h5>

                @if ($quiz->description)
                    <p class="card-text">{{ $quiz->description }}</p>
                @endif

                @if ($quiz->is_active)
                    <p class="text-success">Active</p>
                @else
                    <p class="text-danger">Not Active</p>
                @endif
            </div>
        </div>
        @endforeach
    </div>
</body>

</html>