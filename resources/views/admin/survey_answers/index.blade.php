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
                        @forelse($surveyAnswers as $key => $surveyAnswerByQtns)
                            <div class="d-flex justify-content-between survey-answer-by-qtn">
                                <div>
                                    <h5>Question {{ $key }}:</h5>
                                </div>
                            </div>

                            <div class="mb-3 survey-answer survey-answer-{{$key}}">
                                @foreach($surveyAnswerByQtns as $surveyAnswer)
                                <ul>
                                    <a href="{{ route('admin.surveyAnswers.update', $surveyAnswer) }}" style="text-decoration: none;"><li>{{ $surveyAnswer->answer }}</li></a>
                                </ul>
                                @endforeach
                            </div>

                        @empty
                            <div class="mt-3 mb-3">
                                <p>No answers</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@push('scripts')
    <script src="{{ asset('vendor/js/jquery.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('vendor/js/popper.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/survey_answer.js')}}" type="text/javascript"></script>
@endpush
