@extends('admin.layouts.master')

@section('content')

<section>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-10 col-md-10 col-sm-12 mt-5 pt-5">
                <div class="card admin-shadow">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <div><h2>Survey answer</h2></div>
                            <div>
                                <a type="button" href="{{ route('admin.surveyAnswers.index') }}" class="btn btn-secondary pt-1" name="button">Back</a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('admin.surveyAnswers.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group dynamic_survey_answer">
                                <label for="survey_answer">Survey Answer</label>
                                <div class="input-group survey_answer_section">
                                    <div class="survey_answer_input">
                                        <input type="text"
                                                    id="survey_answer"
                                                    value="{{old('answer.0')}}"
                                                    class="form-control form-control-sm mb-2 @error('answer.0') is-invalid @enderror"
                                                    name="answer[]" required>
                                    </div>
                                    <div class="hidden" id="hidden_survey_answer">
                                        <p class="delete_survey_answer">x</p>
                                    </div>
                                </div>
                                @error('answer.0')
                                    <div class="alert alert-danger p-2 mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <p class="btn_survey_answer d-flex" type="button">
                                <span class="mr-1">
                                    <svg class="bi bi-plus-circle" width="1.3em" height="1.3em" viewBox="0 0 16 20" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M8 3.5a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-.5.5H4a.5.5 0 0 1 0-1h3.5V4a.5.5 0 0 1 .5-.5z"/>
                                        <path fill-rule="evenodd" d="M7.5 8a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1H8.5V12a.5.5 0 0 1-1 0V8z"/>
                                        <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                    </svg>
                                </span>
                                <span>Add answer</span>
                            </p>

                            <div class="form-group mb-4">
                                <label for="survey_question_id">Choose it's question</label>
                                <div class="input-group mb-3">
                                    <select class="custom-select" name="survey_question_id">
                                        <option selected>Choose question...</option>
                                        @foreach($questions as $question)
                                            <option value="{{ $question->id }}">{{ $question->question }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('survey_question_id')
                                    <div class="alert alert-danger p-2 mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary float-right">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
