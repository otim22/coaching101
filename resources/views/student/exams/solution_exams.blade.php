@extends('layouts.app')

@section('content')

<section class="section-bread bg-gray-2" style="background: linear-gradient(to right, rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.05)), url({{ asset('/images/bridge.jpg') }}); width: 100%; height: auto; background-size: cover;">
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
                <li class="breadcrumb-item bold">
                    <a href="{{ route('home') }}" style="text-decoration: none;">Home</a>
                </li>
                <li class="breadcrumb-item bold" aria-current="page">
                    <a href="{{ route('student.exams') }}" style="text-decoration:none;">Practice exams</a>
                </li>
                <li class="breadcrumb-item bold" aria-current="page">
                    <a href="{{ route('student.exams') }}" style="text-decoration:none;">{{ $exam->medium_snippet }}</a>
                </li>
                <li class="breadcrumb-item bold" aria-current="page">Practice</li>
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
                        <div>
                            <h5 class="bold">{{ $exam->title }}</h5>
                        </div>
                        <hr>
                        <form action="{{ route('user.exam.store') }}" method="POST">
                            @csrf

                            @foreach($paginator as $examQuestion)
                                <?php
                                    $interval = isset($interval) ? abs(intval($interval)) : count($exam->examQuestions);
                                    $from = $paginator->currentPage() - $interval;
                                    if ($from < 1) {
                                        $from = 1;
                                    }
                                    $to = $paginator->currentPage() + $interval;
                                    if ($to > count($exam->examQuestions)) {
                                        $to = count($exam->examQuestions);
                                    }
                                ?>

                                @for($i = $from; $i <= $to; $i++)
                                    <?php
                                        $isCurrentPage = $paginator->currentPage() == $i;
                                    ?>
                                    <a type="button" id="round-button-3" class="btn btn-outline-secondary mt-2 {{ $isCurrentPage ? 'active' : '' }}"
                                            href="{{ !$isCurrentPage ? $paginator->url($i) : '#' }}">
                                        {{ $i }}
                                    </a>
                                @endfor

                                <div class="form-group mb-4 mt-4">
                                    <label class="mb-3 bold examQuestion" for="option">{{ $examQuestion->exam_question }}</label>
                                    @foreach($examQuestion->options as $examOptions)
                                        <div class="mb-2 form-check custom-check options">
                                            <input type="checkbox"  name="exam_option_id" value="{{ $examOptions->id }}"
                                                        class="form-check-input exam-check mt-2" id="{{ $examOptions->id }}" {{ $examOptions->is_correct ? "checked" : "" }}>
                                            <label class="form-check-label" for="{{ $examOptions->id }}">{{ $examOptions->option }}</label>
                                        </div>
                                    @endforeach
                                </div>

                                <div class="pt-2"><hr /></div>

                                <div class="d-flex justify-content-between">
                                    @if($paginator->currentPage())
                                        <div id="visible-prev">
                                            <a id="round-button-2" href="{{ $paginator->url($paginator->currentPage() - 1) }}" type="button" aria-label="Previous"
                                                class="btn btn-sm btn-secondary previous-button mt-2 @if ($paginator->currentPage() <= 1) disabled ?? '' @endif">
                                                <span aria-hidden="true">«</span>
                                                Previous
                                            </a>
                                        </div>
                                    @endif

                                    @if($paginator->currentPage() <= count($exam->examQuestions))
                                        <div id="visible-next">
                                            <a id="round-button-2" type="button" href="{{ $paginator->url($paginator->currentPage() + 1) }}" aria-label="Next"
                                                class="btn btn-sm btn-primary next-button mt-2 next-question @if ($paginator->currentPage() == count($exam->examQuestions)) ? disabled : '' @endif">
                                                Next
                                                <span aria-hidden="true">»</span>
                                            </a>
                                        </div>
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
