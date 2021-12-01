@extends('layouts.app')

@section('content')

<section class="section-bread bg-gray-2"  style="background-image: url({{ asset('/images/bridge.jpg') }}); width: 100%; height: auto; background-size: cover;">
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
                    <a href="{{ route('student.exams') }}" style="text-decoration:none;">exams</a>
                </li>
                <li class="breadcrumb-item" aria-current="page">Results</li>
            </ol>
        </nav>
    </div>
</section>

<section class="small-screen_padding">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="card p-2">
                    <div class="card-body">
                        <h3 class="bold">Feedback</h3>
                        <div class="row mt-4">
                            <div class="col-lg-4 col-sm-12 mb-5">
                                <div class="border-results animate-it-slow">
                                    <div>
                                        <h4> Correct answers</h4>
                                    </div>
                                    <div>
                                        <h3 class="bold">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="#4db44d" class="bi bi-check-circle mb-2" viewBox="0 0 16 16">
                                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                                <path d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z"/>
                                            </svg>
                                            {{ $correctAnswers }}
                                        </h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-12 mb-5">
                                <div class="border-results animate-it-slow">
                                    <div>
                                        <h4> Incorrect answers</h4>
                                    </div>
                                    <div>
                                        <h3 class="bold">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="#d70c0c" class="bi bi-x-circle mb-2" viewBox="0 0 16 16">
                                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                                <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                                            </svg>
                                            {{ $inCorrectAnswers }}
                                        </h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-12 mb-5">
                                <div class="border-results animate-it-slow">
                                    <div>
                                        <h4> Unanswered ones</h4>
                                    </div>
                                    <div>
                                        <h3 class="bold">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="#e3c153" class="bi bi-skip-forward-circle mb-2" viewBox="0 0 16 16">
                                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                                <path d="M4.271 5.055a.5.5 0 0 1 .52.038L7.5 7.028V5.5a.5.5 0 0 1 .79-.407L11 7.028V5.5a.5.5 0 0 1 1 0v5a.5.5 0 0 1-1 0V8.972l-2.71 1.935a.5.5 0 0 1-.79-.407V8.972l-2.71 1.935A.5.5 0 0 1 4 10.5v-5a.5.5 0 0 1 .271-.445z"/>
                                            </svg>
                                            {{ $unAnswerOnes }}
                                        </h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-12">
                                <a id="round-button-2" href="#" type="button" class="btn btn-primary" name="button" style="font-weight: bold;">View Solutions</a>
                            </div>
                        </div>

                        <div class="row mt-5">
                            <div class="col-12">
                                <h3 class="bold">Revision</h3>
                                <p>Recommendation</p>
                            </div>
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
