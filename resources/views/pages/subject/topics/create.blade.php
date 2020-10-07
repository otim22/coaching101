@extends('layouts.app')

@section('content')
<section class="section-two mt-5">
    <div class="container">
        <div class="row mt-5">
            <div class="col-lg-8 offset-2">
                <div class="fast-transition mb-3">
                    <div class="row m-2 pt-2">
                        <div class="col-sm-12 col-md-12 col-lg-12 d-flex justify-content-between">
                            <h3>Subject outline</h3>
                            <h5><a href="{{ route('subjects.show', $subject) }}">Back</a></h5>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <hr />
                        </div>

                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <p>
                                Start putting together your subject by creating sections, lectures and practice (quizzes, coding exercises and assignments).
                                If you’re intending to offer your subject for free, the total length of video content must be less than 2 hours.
                            </p>
                        </div>
                    </div>

                    <div class="row m-2">
                        <form class="subject_outline_form" action="{{ route('topics', $subject) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="clone col-sm-12 col-md-12 col-lg-12">
                                <div class="card card-body mb-5">
                                    <div class="form-group">
                                        <label for="content_title">Topic title</label>
                                        <input type="text"
                                                    class="form-control @error('content_title') is-invalid @enderror"
                                                    id="content_title"
                                                    placeholder="Your topic title"
                                                    aria-label="Your content title"
                                                    aria-describedby="content_title"
                                                    name="content_title"
                                                    value="{{ old('content_title') }}">
                                        @error('content_title')
                                        <div class="alert alert-danger p-2 mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="content_file_path">Content files</label>
                                        <div class="custom-file">
                                              <input type="file"
                                                            class="custom-file-input  @error('content_file_path') is-invalid @enderror"
                                                            id="content_file_path"
                                                            name="content_file_path"
                                                            value="{{ old('content_file_path') }}">
                                              <label class="custom-file-label" for="content_file_path">Choose file</label>
                                        </div>
                                        @error('content_file_path')
                                            <div class="alert alert-danger p-2 mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="content_description">Content description</label>
                                        <textarea type="text" id="content_description" rows="3" class="form-control @error('content_description') is-invalid @enderror" placeholder="Include a description. What students will be able to do after completing the class." name="content_description" value="{{ old('content_description') }}"></textarea>
                                        @error('content_description')
                                            <div class="alert alert-danger p-2 mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class=" form-group">
                                        <label for="resource_attachment_path">Resource attachments</label>
                                        <div class="controls">
                                            <div class="entry input-group mb-2">
                                                <div class="resource_attachment_input">
                                                    <input type="file"
                                                                class="form-control-file @error('resource_attachment_path.0') is-invalid @enderror"
                                                                id="resource_attachment_path"
                                                                name="resource_attachment_path[]"
                                                                value="{{ old('resource_attachment_path[]') }}"
                                                                multiple>
                                                </div>
                                                <div>
                                                    <p class="btn btn-upload btn-success  btn-sm btn-add pr-3" type="button">
                                                        <svg width="1.8em" height="1.8em" viewBox="0 0 16 20" class="bi bi-plus" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                            <path fill-rule="evenodd" d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                                                        </svg>
                                                        Add
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        @error('resource_attachment_path.0')
                                        <div class="alert alert-danger p-2 mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <small id="emailHelp" class="form-text text-muted">
                                        <strong>Note:</strong>  A resource is for any type of document that can be used to help students in the class. This file is going to be more like an extra class. Make sure everything the file size is less than 500 MB.
                                    </small>

                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12 col-lg-12 mt-5 mb-4">
                                <button type="submit" class="btn btn-primary btn-sm pl-5 pr-5 float-right">Save</button>
                            </div>
                        </form>
                    </div>
                </div>

                @push('scripts')
                    <script src="{{ asset('js/topic.js')}}" type="text/javascript"></script>
                @endpush

                @prepend('scripts')
                    <script src="{{ asset('vendor/js/jquery.min.js') }}" type="text/javascript"></script>
                    <script src="{{ asset('vendor/js/popper.min.js') }}" type="text/javascript"></script>
                @endprepend

            </div>
        </div>
    </div>
</section>
@endsection
