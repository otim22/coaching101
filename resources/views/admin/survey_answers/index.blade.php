@extends('admin.layouts.master')

@section('content')

<section>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-10 col-md-10 col-sm-12 mt-5 pt-5">
                <div class="card admin-shadow">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <div><h4>Survey answers</h4></div>
                            <div>
                              <a type="button" href="{{ route('admin.surveyAnswers.create') }}" class="btn btn-primary pt-1" name="button">Create Answer</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        @foreach($surveyAnswers as $key => $surveyAnswerByQtns)
                            <h4>Question {{ $key }}</h4>
                            @foreach($surveyAnswerByQtns as $surveyAnswer)
                                <div class="d-flex justify-content-between">
                                    <div style="flex-grow:1">
                                        <input type="text"
                                                    value="{{ $surveyAnswer->answer }}"
                                                    class="form-control form-control mb-2 @error('answer.*') is-invalid @enderror"
                                                    name="answer[]">
                                    </div>
                                </div>
                            @endforeach
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@push('scripts')
    <script src="{{ asset('vendor/js/popper.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/survey_answer.js')}}" type="text/javascript"></script>
@endpush
