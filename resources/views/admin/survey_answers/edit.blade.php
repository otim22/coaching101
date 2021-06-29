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
                        <form class="mt-3" action="{{ route('admin.surveyAnswers.update', $surveyAnswer) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('patch')

                            <div>
                                <input type="text"
                                            value="{{ old('answer', $surveyAnswer->answer) }}"
                                            class="form-control form-control mb-2 @error('answer') is-invalid @enderror"
                                            name="answer">
                            </div>
                            @error('answer')
                            <div class="alert alert-danger p-2 mt-2">{{ $message }}</div>
                            @enderror

                            <button type="submit" class="btn btn-primary float-right mt-3">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
