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
            <div class="col-sm-12 col-md-12 col-lg-10">
                <div class="d-flex justify-content-between mb-3">
                    <a id="round-button-2" type="button" class="btn btn-secondary btn-sm" href="{{ route('student.quizzes') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
                        </svg>
                        Back
                    </a>
                    <a id="round-button-2" type="button" class="btn btn-primary btn-sm" href="{{ route('student.quizzes') }}">
                        Start
                    </a>
                </div>
            </div>
        </div>
        <div class="row d-flex justify-content-center">
            <div class="col-sm-12 col-md-12 col-lg-10">
                <div class="card p-3">
                    <div class="card-body">
                        <h5 class="bold mb-2">{{ $quiz->title }}</h5>
                        @forelse($quiz->quizQuestions as $quizQuestion)
                            <span>{{ $quizQuestion->quiz_question }}</span><br/>
                        @empty
                            <span>No questions</span>
                        @endforelse
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
