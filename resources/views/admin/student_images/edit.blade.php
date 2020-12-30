@extends('admin.layouts.master')

@section('title', 'Student Image')

@section('content')

<section>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-11 col-md-10 col-sm-12 mt-5 pt-5 mb-5">
                <div class="float-right mb-3">
                    <a href="{{ route('admin.studentImages.index') }}" class="btn btn-sm btn-secondary">
                        <i class="fa fa-arrow-left"></i>
                        {{ __('Back') }}
                    </a>
                </div>
                <form action="{{ route('admin.studentImages.update', $studentImage) }}" method="POST"
                            enctype="multipart/form-data">
                    @csrf
                    @method('patch')
                    <div class="form-group">
                        <label for="title">
                            <h4>Title</h4>
                        </label>
                        <input type="text"
                                    id="title"
                                    name="title"
                                    class="form-control @error('title') is-invalid @enderror"
                                    value="{{ old('title', $studentImage->title) }}">
                        @error('title')
                            <div class="alert alert-danger p-2 mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mt-4">
                        <label for="description"><h4>Description</h4></label>
                        <textarea name="description" class="form-control @error('description') is-invalid @enderror"  placeholder="Description">{{ old('description', $studentImage->description) }}</textarea>
                        @error('description')
                            <div class="alert alert-danger p-2 mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mt-4">
                        <label for="button_text">
                            <h4>Button Text</h4>
                        </label>
                        <input type="text"
                                    id="button_text"
                                    class="form-control @error('button_text') is-invalid @enderror"
                                    value="{{ old('button_text', $studentImage->button_text) }}"
                                    name="button_text" >
                        @error('button_text')
                            <div class="alert alert-danger p-2 mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mt-4">
                        <div class="mb-3">
                            <label for="slider_image">
                                <h4>Student Image</h4>
                            </label>
                            <input type="file" class="form-control-file @error('student_image') is-invalid @enderror" name="student_image" id="student_image">
                        </div>
                        @error('student_image')
                            <div class="alert alert-danger p-2 mt-2">{{ $message }}</div>
                        @enderror
                        <div class="mb-2"><p>Current Image: <span class="text-muted">This image will be replaced when you choose a different image.</span></p></div>
                        <img src="{{ asset($studentImage->getFirstMediaUrl()) }}" class="w-50">
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Update</button>
                </form>
            </div>
        </div>
    </div>
</section>

@endsection
