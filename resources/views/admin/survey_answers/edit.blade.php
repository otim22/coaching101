@extends('admin.layouts.master')

@section('content')

<section>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-10 col-md-10 col-sm-12 mt-5 pt-5">
                <div class="card admin-shadow">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <div><h2>Answer</h2></div>
                            <div>
                                <a type="button" href="{{ route('admin.surveyAnswers.index') }}" class="btn btn-secondary pt-1" name="button">Back</a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('admin.surveyAnswers.update', $surveyAnswer) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('patch')

                            <div>
                                <h5>Question {{ $key }}</h5>
                            </div>

                            <div class="d-flex justify-content-between">
                                <div style="flex-grow: 1">
                                    <input type="text"
                                            value="{{ $surveyAnswer }}"
                                            readonly
                                            class="form-control form-control mb-2 @error('answer.*') is-invalid @enderror"
                                            name="answer[]">
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary float-right">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
