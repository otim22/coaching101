@extends('admin.layouts.master')

@section('title', 'Teacher Image')

@section('content')

<section>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-9 col-md-10 col-sm-12 mt-5 pt-5">
                <form action="{{ route('admin.teacherImages.store') }}" method="POST"
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
                        <textarea name="description" class="form-control @error('description') is-invalid @enderror" placeholder="Description"></textarea>
                        @error('description')
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
                    <div class="form-group mb-3">
                        <label for="teacher_image">Teacher Image</label>
                        <input type="file" class="form-control-file @error('teacher_image') is-invalid @enderror" name="teacher_image" id="teacher_image">
                        @error('teacher_image')
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
