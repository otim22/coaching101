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
                    <a href="{{ route('home') }}" style="text-decoration: none;">Home</a>
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
                <div class="d-flex justify-content-end mb-4">
                    <div class="mr-3">
                        <h2><span  id="timer" data-timer="120"></span></h2>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-alarm" viewBox="0 0 16 16">
                            <path d="M8.5 5.5a.5.5 0 0 0-1 0v3.362l-1.429 2.38a.5.5 0 1 0 .858.515l1.5-2.5A.5.5 0 0 0 8.5 9V5.5z"/>
                            <path d="M6.5 0a.5.5 0 0 0 0 1H7v1.07a7.001 7.001 0 0 0-3.273 12.474l-.602.602a.5.5 0 0 0 .707.708l.746-.746A6.97 6.97 0 0 0 8 16a6.97 6.97 0 0 0 3.422-.892l.746.746a.5.5 0 0 0 .707-.708l-.601-.602A7.001 7.001 0 0 0 9 2.07V1h.5a.5.5 0 0 0 0-1h-3zm1.038 3.018a6.093 6.093 0 0 1 .924 0 6 6 0 1 1-.924 0zM0 3.5c0 .753.333 1.429.86 1.887A8.035 8.035 0 0 1 4.387 1.86 2.5 2.5 0 0 0 0 3.5zM13.5 1c-.753 0-1.429.333-1.887.86a8.035 8.035 0 0 1 3.527 3.527A2.5 2.5 0 0 0 13.5 1z"/>
                        </svg>
                    </div>
                </div>
                <div class="card p-2">
                    <div class="card-body">
                        <div>
                            <h5 class="bold">{{ $quiz->title }}</h5>
                        </div>
                        <hr>
                        <form action="{{ route('user.quiz.store') }}" method="POST">
                            @csrf

                            @foreach($paginatedQuiz as $quizQuestion)
                                @php $iterationKey = 1; @endphp
                                @foreach($quiz->quizQuestions as $quizQtn)
                                    <button type="button" id="round-button-3"
                                                class="btn mt-2 un-answered @if($quizQtn < $quizQuestion) btn-primary
                                                            @elseif($quizQtn == $quizQuestion) btn-outline-primary
                                                            @elseif($quizQtn < $quizQuestion && empty($answers)) btn-secondary
                                                            @else btn-light @endif">
                                        {{ $iterationKey }}
                                    </button>
                                    @php $iterationKey++; @endphp
                                @endforeach

                                <div class="pt-4 flash-message hidden" id="flashMessage">
                                    <div class="alert alert-warning alert-block">
                                        <button type="button" class="close" data-dismiss="alert">×</button>
                                        Please, attempt the questions.
                                    </div>
                                </div>

                                <div class="form-group mb-4 mt-4">
                                    <label class="mb-3 bold quizQuestion" for="option">{{ $quizQuestion->quiz_question }}</label>
                                    @foreach($quizQuestion->options as $quizOptions)
                                        <div class="mb-2 form-check custom-check options">
                                            <input type="checkbox"  name="quiz_option_id" value="{{ $quizOptions->id }}"
                                                        class="form-check-input mt-2" id="{{ $quizOptions->id }}">
                                            <label class="form-check-label" for="{{ $quizOptions->id }}">{{ $quizOptions->option }}</label>
                                        </div>
                                    @endforeach
                                </div>

                                <input type="hidden"  name="quiz_id" value="{{ $quiz->id }}" class="quiz" data-quiz-id="{{ $quiz->id }}">
                                <input type="hidden"  name="quiz_question_id" value="{{ $quizQuestion->id }}" class="question" data-question-id="{{ $quizQuestion->id }}">
                                <input type="hidden"  name="user_id" value="{{ \Auth::id() }}" data-user-id="{{ \Auth::id() }}">

                                <div class="pt-2"><hr /></div>

                                <div class="d-flex justify-content-between">
                                    <a id="round-button-2" href="{{ $paginatedQuiz->previousPageUrl() }}" type="button"
                                        class="btn btn-sm btn-secondary previous-button mt-2 @if ($paginatedQuiz->onFirstPage()) disabled ?? '' @endif">
                                        Previous
                                    </a>
                                    @if($paginatedQuiz->currentPage() === $paginatedQuiz->total())
                                        <a id="round-button-2" type="submit" class="btn btn-sm btn-primary mt-2 submit-questions"
                                                data-url="{{ route('user.quiz.store') }}">
                                            Save
                                        </a>
                                    @else
                                        <a id="round-button-2" type="button" href="{{ $paginatedQuiz->nextPageUrl() }}"
                                                class="btn btn-sm btn-primary next-button mt-2 @if ($paginatedQuiz->currentPage() == $paginatedQuiz->total()) disabled ?? '' @endif next-question">
                                            Next
                                        </a>
                                    @endif
                                </div>
                            @endforeach
                        </form>
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
