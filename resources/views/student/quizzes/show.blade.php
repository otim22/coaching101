@extends('layouts.app')

@section('content')

<section class="section-bread bg-gray-2">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ url('/') }}">
                        <svg width="1.3em" height="1.3em" viewBox="0 0 16 16" class="bi bi-house-fill pb-1" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M8 3.293l6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6zm5-.793V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"/>
                            <path fill-rule="evenodd" d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z"/>
                        </svg>
                    </a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('home') }}" style="text-decoration: none;">Leader board</a>
                </li>
                <li class="breadcrumb-item" aria-current="page">
                    <a href="{{ route('student.quizzes') }}" style="text-decoration:none;">Quizzes</a>
                </li>
                <li class="breadcrumb-item" aria-current="page">{{ $quiz->title }}</li>
            </ol>
        </nav>
    </div>
</section>

<section class="small-screen_padding">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="d-flex justify-content-end mb-3">
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor" class="bi bi-alarm" viewBox="0 0 16 16">
                            <path d="M8.5 5.5a.5.5 0 0 0-1 0v3.362l-1.429 2.38a.5.5 0 1 0 .858.515l1.5-2.5A.5.5 0 0 0 8.5 9V5.5z"/>
                            <path d="M6.5 0a.5.5 0 0 0 0 1H7v1.07a7.001 7.001 0 0 0-3.273 12.474l-.602.602a.5.5 0 0 0 .707.708l.746-.746A6.97 6.97 0 0 0 8 16a6.97 6.97 0 0 0 3.422-.892l.746.746a.5.5 0 0 0 .707-.708l-.601-.602A7.001 7.001 0 0 0 9 2.07V1h.5a.5.5 0 0 0 0-1h-3zm1.038 3.018a6.093 6.093 0 0 1 .924 0 6 6 0 1 1-.924 0zM0 3.5c0 .753.333 1.429.86 1.887A8.035 8.035 0 0 1 4.387 1.86 2.5 2.5 0 0 0 0 3.5zM13.5 1c-.753 0-1.429.333-1.887.86a8.035 8.035 0 0 1 3.527 3.527A2.5 2.5 0 0 0 13.5 1z"/>
                        </svg>
                    </div>
                </div>
                <div>
                    <div class="card p-1">
                        <div class="card-body">
                            <div>
                                <h5 class="bold">{{ $quiz->title }}</h5>
                            </div>
                            <hr>
                            <form action="index.html" method="post">
                                @foreach($paginatedQuiz as $quizQuestion)
                                    @php $iterationKey = 1; @endphp
                                    @foreach($quiz->quizQuestions as $quizQtn)
                                        <button type="button" id="round-button-3"
                                                    class="btn @if($quizQtn < $quizQuestion) btn-primary @elseif($quizQtn == $quizQuestion) btn-outline-primary @else btn-light @endif">
                                            {{ $iterationKey }}
                                        </button>
                                        @php $iterationKey++; @endphp
                                    @endforeach
                                    <div><br /></div>
                                    <div class="form-group mb-4">
                                        <label class="mb-3 bold" for="option">{{ $quizQuestion->quiz_question }}</label>
                                        @foreach($quizQuestion->options as $quizOptions)
                                            <div class="mb-2 form-check custom-check options">
                                                <input type="checkbox" name="option" value="{{ $quizOptions->id }}" class="form-check-input mt-2" id="{{ $quizOptions->id }}">
                                                <label class="form-check-label" for="{{ $quizOptions->id }}">{{ $quizOptions->option }}</label>
                                            </div>
                                        @endforeach
                                    </div>
                                @endforeach
                                @if($paginatedQuiz->currentPage() !== $paginatedQuiz->total())
                                    <a id="round-button-2" href="{{ $paginatedQuiz->nextPageUrl() }}" data-question-id="{{ $quizQuestion->id }}"
                                        data-quiz-id="{{ $quiz->id }}" data-correct-ans="@if($quizOptions->is_correct === 1) {{ $quizOptions->id }} @endif"
                                        type="button" class="btn btn-primary next-question mt-3">Next Question</a>
                                @else
                                    <a id="round-button-2" type="submit" class="btn btn-primary mt-3">Submit</a>
                                @endif
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="bg-gray-2 small-screen_padding">
    @include('partials.categories')
</section>

@endsection

@push('scripts')
    <script src="{{ asset('js/handle_student_quiz.js')}}" type="text/javascript"></script>
@endpush
