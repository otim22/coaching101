@extends('admin.layouts.master')

@section('content')

<section>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-10 col-md-10 col-sm-12 mt-5 pt-5">
                <div class="card admin-shadow">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <div>
                                <a type="button" href="{{ route('admin.surveyAnswers.index') }}" class="btn btn-secondary pt-1" name="button">Back</a>
                            </div>
                            <div>
                                <li class="nav-item dropdown d-flex align-items-center">
                                    <button class="nav-link dropdown-toggle btn btn-primary" data-toggle="dropdown" aria-expanded="false">
                                        Action
                                    </button>
                                    <div class="dropdown-menu">
                                        <ul class="list-unstyled">
                                            <li>
                                                <a class="dropdown-item" href="{{ route('admin.surveyAnswers.edit', $surveyAnswer) }}"> Edit</a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item"
                                                   href="#"
                                                   onclick="event.preventDefault(); document.getElementById('delete-survey-answer-item').submit();">
                                                    {{ __('Delete') }}
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <h5>{{ $surveyAnswer->question->question }}</h5>
                        <p>{{ $surveyAnswer->answer }}</p>
                    </div>

                    <form action="{{ route('admin.surveyAnswers.destroy', $surveyAnswer) }}" class="hidden" id="delete-survey-answer-item" method="POST">
                        @csrf
                        @method('delete')
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
