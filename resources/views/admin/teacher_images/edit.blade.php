@extends('admin.layouts.master')

@section('title', 'Teacher Image')

@section('content')

<section>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-11 col-md-10 col-sm-12 mt-5 pt-5 mb-5">
                <div class="card admin-shadow">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h4 class="pt-1">{{ $teacherImage->title }}</h4>
                            </div>
                            <div>
                                <a href="{{ route('admin.teacherImages.index') }}" class="btn btn-secondary">
                                    <i class="fa fa-arrow-left"></i>
                                    {{ __('Back') }}
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.teacherImages.update', $teacherImage) }}" method="POST"
                                enctype="multipart/form-data">
                            @csrf
                            @method('patch')
                            <div class="form-group">
                                <label for="title">
                                    <h5>Title</h5>
                                </label>
                                <input type="text"
                                id="title"
                                name="title"
                                class="form-control @error('title') is-invalid @enderror"
                                value="{{ old('title', $teacherImage->title) }}">
                                @error('title')
                                <div class="alert alert-danger p-2 mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group mt-4">
                                <label for="description"><h5>Description</h5></label>
                                <textarea name="description" class="form-control @error('description') is-invalid @enderror"  placeholder="Description">{{ old('description', $teacherImage->description) }}</textarea>
                                @error('description')
                                <div class="alert alert-danger p-2 mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group mt-4">
                                <label for="button_text">
                                    <h5>Button Text</h5>
                                </label>
                                <input type="text"
                                id="button_text"
                                class="form-control @error('button_text') is-invalid @enderror"
                                value="{{ old('button_text', $teacherImage->button_text) }}"
                                name="button_text" >
                                @error('button_text')
                                <div class="alert alert-danger p-2 mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group mt-4">
                                <div class="mb-3">
                                    <label for="slider_image">
                                        <h5>Teacher Image</h5>
                                    </label>
                                    <input type="file" class="form-control-file @error('teacher_image') is-invalid @enderror" name="teacher_image" id="teacher_image">
                                </div>
                                @error('teacher_image')
                                <div class="alert alert-danger p-2 mt-2">{{ $message }}</div>
                                @enderror
                                <div class="mb-2"><p>Current Image: <span class="text-muted">This image will be replaced when you choose a different image.</span></p></div>
                                <img src="{{ asset($teacherImage->getFirstMediaUrl()) }}" class="w-50">
                            </div>
                            <button type="submit" class="btn btn-primary mt-3">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
