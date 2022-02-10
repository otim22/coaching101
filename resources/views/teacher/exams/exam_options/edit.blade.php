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
                    <a href="{{ route('manage.subjects') }}" style="text-decoration: none;">Dashboard</a>
                </li>
                <li class="breadcrumb-item" aria-current="page">
                    <a href="{{ route('teacher.exams') }}" style="text-decoration: none;">Exams</a>
                </li>
                <li class="breadcrumb-item" aria-current="page">
                    <a href="{{ route('exams.show', $exam) }}" style="text-decoration: none;">Questions</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    <a href="{{ route('examQuestions.show', [$exam, $examQuestion]) }}" style="text-decoration: none;">
                        {{ $examQuestion->short_exam_question }}
                    </a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    {{ $examOption->short_option }}
                </li>
            </ol>
        </nav>
    </div>
</section>
<div class="container">
    @include('flash.messages')
</div>
<section class="small-screen_padding">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10 col-md-12 col-sm-12 off-set-1">
                <div class="card p-3">
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-2">
                            <div>
                                <h5 class="bold">{{ $examOption->option }}</h5>
                            </div>
                            <div>
                                <a id="round-button-2" href="{{ route('examOptions.show', [$exam, $examQuestion, $examOption])}}" class="btn btn-secondary">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left mr-2" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
                                    </svg>
                                    Back
                                </a>
                            </div>
                        </div>
                        <div>
                            <hr />
                        </div>
                        <form action="{{ route('examOptions.update', [$exam, $examQuestion, $examOption]) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('patch')

                            <div class="form-group mb-4">
                                <label for="exam_question_id">Which question does this option belong to?</label>
                                <div class="input-group mb-3">
                                    <select class="custom-select" name="exam_question_id">
                                        <option value="{{ $examQuestion->id }}">{{ $examQuestion->exam_question }}</option>
                                        @foreach($examQuestions as $examQuestion)
                                            <option value="{{ $examQuestion->id }}">{{ $examQuestion->exam_question }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('exam_question_id')
                                <div class="alert alert-danger p-2 mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="option">Enter the option to question</label>
                                <input type="text" name="option"
                                            class="form-control @error('option') is-invalid @enderror"
                                            value="{{ old('option', $examOption->option) }}">
                                @error('option')
                                    <div class="alert alert-danger p-2 mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="is_correct">Is this the correct answer?</label>
                                <div class="input-group mb-3">
                                    <select class="custom-select" name="is_correct">
                                        <option value="{{ $currentExamOption }}">{{ $examOptionToUpdate }}</option>
                                        <option value="yes">Yes, It's correct </option>
                                        <option value="no">No, It's wrong </option>
                                    </select>
                                </div>
                                @error('is_correct')
                                    <div class="alert alert-danger p-2 mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <button id="round-button-2" type="submit" class="btn btn-primary float-right mt-3">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
