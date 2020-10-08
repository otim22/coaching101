@extends('layouts.app')

@section('content')
<section class="section-two mt-5">
    <div class="container">
        <div class="row mt-5">
            <div class="col-lg-8 offset-2">
                <div class="fast-transition mb-3">
                    <div class="row m-2 pt-2">
                        <div class="col-sm-12 col-md-12 col-lg-12 d-flex justify-content-between">
                            <h3>Topic</h3>
                            <h5>
                                <a href="{{ route('subjects.show', $subject) }}" style="text-decoration: none">
                                <svg width="1.3em" height="1.3em" viewBox="0 0 20 20" class="bi bi-box-arrow-in-left" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M10 3.5a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-2a.5.5 0 0 1 1 0v2A1.5 1.5 0 0 1 9.5 14h-8A1.5 1.5 0 0 1 0 12.5v-9A1.5 1.5 0 0 1 1.5 2h8A1.5 1.5 0 0 1 11 3.5v2a.5.5 0 0 1-1 0v-2z"/>
                                    <path fill-rule="evenodd" d="M4.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H14.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z"/>
                                </svg>
                                Back
                            </a>
                            </h5>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <hr />
                        </div>

                        <div class="col-sm-12 col-md-12 col-lg-12 mt-3">
                            <p>
                                Start putting together your subject by creating topics, lectures and practice (quizzes, coding exercises and assignments).
                            </p>
                        </div>
                    </div>

                    <div class="row m-2">
                        <form class="topic_form" action="{{ route('topics.update', [$subject, $topic]) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')

                            <div class="clone col-sm-12 col-md-12 col-lg-12">
                                <div class="card card-body mb-5">
                                    <div class="form-group mt-2 pl-3 pr-3 mb-4 mt-4">
                                        <label class="bold" for="title">Topic title</label>
                                        <input type="text"
                                                    class="form-control @error('title') is-invalid @enderror"
                                                    id="title"
                                                    placeholder="Your topic title"
                                                    aria-label="Your content title"
                                                    aria-describedby="title"
                                                    name="title"
                                                    value="{{ old('title', $topic->title) }}">
                                        @error('title')
                                        <div class="alert alert-danger p-2 mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group mt-2 pl-3 pr-3 mb-4">
                                        <div class="mb-4">
                                            <p class="bold">Current content file</p>
                                            <video id="my-video" class="video-js rounded-corners w-100" controls preload="auto" data-setup="{}">
                                                <source src="{{ asset($topic->getFirstMediaUrl('content_file')) }}" type='video/mp4'>
                                            </video>
                                        </div>
                                        <label class="bold" for="content_file_path">Content file</label>
                                        <small class="form-text text-muted">
                                            <p class="red_color"><strong>Note:</strong>  Choosing a file below will replace the current content file above and the file size should be less than 500 MB.</p>
                                        </small>
                                        <div class="custom-file">
                                              <input type="file"
                                                            class="custom-file-input  @error('content_file_path') is-invalid @enderror"
                                                            id="content_file_path"
                                                            name="content_file_path">
                                              <label class="custom-file-label" for="content_file_path">Choose file</label>
                                        </div>
                                        @error('content_file_path')
                                            <div class="alert alert-danger p-2 mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group mt-2 pl-3 pr-3">
                                        <label class="bold" for="description">Content description</label>
                                        <textarea type="text" id="description"
                                                            rows="3"
                                                            class="form-control @error('description') is-invalid @enderror"
                                                            name="description">{{ $topic->title }}
                                        </textarea>
                                        @error('description')
                                            <div class="alert alert-danger p-2 mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group mt-2 pl-3 pr-3">
                                        <div class="mb-4">
                                            <p class="bold">Current resource attachment files</p>
                                            @forelse($topic->getMedia('resource_attachment') as $topicMedia)
                                            <p>
                                                <svg width="1.5em" height="1.5em" viewBox="0 0 16 20" class="bi bi-check" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" d="M10.97 4.97a.75.75 0 0 1 1.071 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.236.236 0 0 1 .02-.022z"/>
                                                </svg>
                                                {{ $topicMedia->name }}
                                            </p>
                                            @empty
                                            <p>No available attachments.</p>
                                            @endforelse
                                        </div>
                                        <label class="bold" for="resource_attachment_path">Resource attachments</label>
                                        <small class="form-text text-muted mb-3">
                                            <p class="red_color"><strong>Note:</strong> Choosing a file below will replace the current resource attachments above and the file(s) size should be less than 100 MB.</p>
                                        </small>
                                        <div class="controls">
                                            <div class="entry input-group">
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
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12 col-lg-12">
                                <button type="submit" class="btn btn-primary pl-5 pr-5 mb-4 float-right">Update</button>
                            </div>
                        </form>
                    </div>
                </div>

                @include('pages.subject.topics.partials.js_files')

            </div>
        </div>
    </div>
</section>
@endsection
