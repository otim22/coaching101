@extends('admin.layouts.master')

@section('title', 'Sliders')

@section('content')

<section>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-11 col-md-10 col-sm-12 mt-5 pt-5 mb-5">
                <div class="float-right mb-3">
                    <a href="{{ route('admin.sliders.index') }}" class="btn btn-sm btn-secondary">
                        <i class="fa fa-arrow-left"></i>
                        {{ __('Back') }}
                    </a>
                </div>
                <form action="{{ route('admin.sliders.update', $slider) }}" method="POST"
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
                                    value="{{ old('title', $slider->title) }}">
                        @error('title')
                            <div class="alert alert-danger p-2 mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mt-4">
                        <label for="description"><h4>Description</h4></label>
                        <textarea id="summernote" name="description" class="form-control @error('description') is-invalid @enderror">{{ old('description', $slider->description) }}</textarea>
                        @error('description')
                            <div class="alert alert-danger p-2 mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mt-4">
                        <div class="mb-3">
                            <label for="slider_image">
                                <h4>Slider Image</h4>
                            </label>
                            <input type="file" class="form-control-file @error('slider_image') is-invalid @enderror" name="slider_image" id="slider_image">
                        </div>
                        @error('slider_image')
                            <div class="alert alert-danger p-2 mt-2">{{ $message }}</div>
                        @enderror
                        <div class="mb-2"><p>Current Image: <span class="text-muted">This image will be replaced when you choose a different image.</span></p></div>
                        <img src="{{ asset($slider->getFirstMediaUrl()) }}" class="w-50">
                    </div>
                    <div class="form-group mt-4">
                        <label for="button_text">
                            <h4>Button Text</h4>
                        </label>
                        <input type="text"
                                    id="button_text"
                                    class="form-control @error('button_text') is-invalid @enderror"
                                    value="{{ old('button_text', $slider->button_text) }}"
                                    name="button_text" >
                        @error('button_text')
                            <div class="alert alert-danger p-2 mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mt-4">
                        <label for="button_link">
                            <h4>Button Link</h4>
                        </label>
                        <select name="button_link" value="{{ old('button_link', $slider->button_link) }}" class="form-control @error('button_link') is-invalid @enderror" id="button_link">
                            <option value="/home">Home</option>
                            <option value="/products">Products</option>
                            <option value="/services">Services</option>
                        </select>
                        @error('button_link')
                            <div class="alert alert-danger p-2 mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Update</button>
                </form>
            </div>
        </div>
    </div>
</section>

@endsection

@push('scripts')
    <script type="text/javascript" src="{{ asset('admin/js/slider_editor.js') }}"></script>
@endpush
