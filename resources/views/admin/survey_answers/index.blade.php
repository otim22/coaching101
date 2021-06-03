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
                                    <h5>Question {{ $key }}</h5>
                                </div>
                                <div>
                                    <div class="d-flex justify-content-between">
                                        <h5 class="btn btn-sm btn-secondary edit-button edit-button-{{$key}} pl-2 pr-2 mr-2"
                                                data-id="{{ $key }}">Edit</h5>
                                        <h5 type="button"
                                                class="btn btn-sm btn-danger delete-button delete-button-{{$key}} pl-2 pr-2"
                                                data-toggle="modal" data-target="#deleteAnswerModal"
                                                data-id="{{ $key }}">Delete</h5>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3 survey-answer survey-answer-{{$key}}">
                                @foreach($surveyAnswerByQtns as $surveyAnswerByQtn)
                                <form action="{{ route('admin.surveyAnswers.update', $surveyAnswerByQtn) }}" method="post">
                                    @csrf
                                    @method('patch')
                                    <div class="mb-2">
                                        @foreach($surveyAnswerByQtn->answer as $surveyAnswer)
                                                <div class="d-flex justify-content-between">
                                                    <div style="flex-grow: 1">
                                                        <input type="text"
                                                                    value="{{ $surveyAnswer }}"
                                                                    readonly
                                                                    class="form-control survey-answer-input-{{$key}} form-control mb-2 @error('answer.*') is-invalid @enderror"
                                                                    name="answer[]">
                                                    </div>
                                                </div>
                                        @endforeach
                                        <div class="update-button update-button-{{$key}} mb-4 hidden">
                                            <button type="submit" class="btn btn-sm btn-primary">Update</button>
                                        </div>
                                    </div>
                                </form>
                                <form action="{{ route('admin.surveyAnswers.destroy', $surveyAnswerByQtn) }}"
                                            class="hidden"
                                            id="delete-answer"
                                            method="post">
                                        @csrf
                                        @method('delete')
                                </form>
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

<div class="modal fade" id="deleteAnswerModal" tabindex="-1" role="dialog" aria-labelledby="deleteAnswerModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="mt-3 mb-3">
                    <h5>Are you sure wanna delete this survey answer?</h5>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                <button type="submit"
                                class="btn btn-sm btn-danger"
                                onclick="event.preventDefault(); document.getElementById('delete-answer').submit();">
                        Confirm Deletion
                </button>
            </div>
        </div>
    </div>
</div>
