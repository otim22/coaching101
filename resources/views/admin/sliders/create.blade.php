@extends('admin.layouts.master')

@section('title', 'Sliders')

@section('content')

<section>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-10 col-md-10 col-sm-12 mt-5 pt-5">
                <form action="{{ route('admin.sliders.store') }}" method="POST"
                            enctype="multipart/form-data">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="title">Title</label>
                        <input type="text"
                                    class="form-control @error('title') is-invalid @enderror"
                                    id="title"
                                    aria-label="itle"
                                    aria-describedby="title"
                                    value="{{ old('title') }}"
                                    name="title" required>
                        @error('title')
                            <div class="alert alert-danger p-2 mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="description">Description</label>
                        <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="summernote"></textarea>
                        @error('description')
                            <div class="alert alert-danger p-2 mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="slider_image">Slider Image</label>
                        <input type="file" class="form-control-file @error('slider_image') is-invalid @enderror" name="slider_image" id="slider_image">
                        @error('slider_image')
                            <div class="alert alert-danger p-2 mt-2">{{ $message }}</div>
                        @enderror
                      </div>
                    <div class="form-group mb-3">
                        <label for="button_text">Button Text</label>
                        <input type="text"
                                    class="form-control @error('button_text') is-invalid @enderror"
                                    id="button_text"
                                    aria-label="button text"
                                    aria-describedby="button_text"
                                    value="{{ old('button_text') }}"
                                    name="button_text" required>
                        @error('button_text')
                            <div class="alert alert-danger p-2 mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="button_link">Button Link</label>
                        <select name="button_link" class="form-control @error('button_link') is-invalid @enderror" id="button_link">
                            <option value="/home">Home</option>
                            <option value="/subjects">Subjects</option>
                            <option value="/services">Services</option>
                        </select>
                        @error('button_link')
                            <div class="alert alert-danger p-2 mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Submit</button>
                </form>
            </div>
        </div>
    </div>
</section>

@endsection

@push('scripts')
<!-- <script src="{{ asset('vendor/js/jquery.min.js') }}" type="text/javascript"></script> -->
<script type="text/javascript" src="{{ asset('admin/js/slider_editor.js') }}"></script>
@endpush
