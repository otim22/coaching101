@extends('layouts.app')

@section('content')

<section class="section-bread bg-gray-2">
    <div class="container">
        <nav aria-label="breadcrumb bg-gray">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ url('/') }}" class="disabled">
                        <svg width="1.3em" height="1.3em" viewBox="0 0 16 16" class="bi bi-house-fill pb-1" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M8 3.293l6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6zm5-.793V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"/>
                            <path fill-rule="evenodd" d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z"/>
                        </svg>
                    </a>
                </li>
                <li class="breadcrumb-item"><a style="text-decoration: none" href="{{ route('manage.subjects') }}">Subjects</a></li>
                <li class="breadcrumb-item"><a style="text-decoration: none" href="{{ route('subjects.show', $subject) }}">{{ $subject->short_title }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $topic->short_title }}</li>
            </ol>
        </nav>
    </div>
</section>

<section class="section-two">
    <div class="container">
        <div class="row justify-content-center mt-5 mb-5">
            <div class="col-lg-8 col-md-10 col-sm-12">
                <div class="fast-transition mb-3">
                    <div class="row m-2 pt-2">
                        <div class="col-sm-12 col-md-12 col-lg-12 d-flex justify-content-between">
                            <h5 class="bold">{{ $topic->short_title }}</h5>
                            <h5>
                                <a  id="round-button-2" href="{{ route('subjects.show', $subject) }}" style="text-decoration: none" class="btn btn-secondary">
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
                                            @forelse($topic->getMedia('content_file') as $contentFile)
                                            <div class="content-card mb-4" style="max-height: 120px;">
                                                <div>
                                                    <video controls preload="auto" class="rounded-corners photo" height="120" width="212" data-setup="{}" controlslist="nodownload">
                                                        <source src="{{ asset($contentFile->getUrl()) }}" type='video/mp4'>
                                                    </video>
                                                </div>
                                                <div class="description">
                                                        <p>{{$contentFile->name }}</p>
                                                </div>
                                            </div>
                                            @empty
                                            <p>No available videos yet.</p>
                                            @endforelse
                                        </div>
                                        <label class="bold" for="content_file_path">To change content file</label>
                                        <small class="form-text text-muted">
                                            <p class="red_color"><strong>Note:</strong>  Choosing a file(s) below will replace the current content file above and each file size should be less than 500 MB.</p>
                                        </small>
                                        <div class="mb-3">
                                            <input type="file"
                                                        class="form-control-file @error('content_file_path') is-invalid @enderror"
                                                        id="content_file_path"
                                                        name="content_file_path"
                                                        value="{{ old('content_file_path') }}">
                                        </div>
                                        @error('content_file_path')
                                            <div class="alert alert-danger p-2 mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group pl-3 pr-3">
                                        <label class="bold" for="description">Content description</label>
                                        <textarea type="text" id="description"
                                                            rows="5"
                                                            class="form-control @error('description') is-invalid @enderror"
                                                            name="description">{{ $topic->title }}
                                        </textarea>
                                        @error('description')
                                            <div class="alert alert-danger p-2 mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group mt-2 pl-3 pr-3">
                                        <div class="mb-4">
                                            <ul class="mb-4">
                                                <p class="bold">Current resource attachment files</p>
                                                @forelse($topic->getMedia('resource_attachment') as $topicMedia)
                                                <li>
                                                    <svg width="1.5em" height="1.5em" viewBox="0 0 16 20" class="bi bi-check" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" d="M10.97 4.97a.75.75 0 0 1 1.071 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.236.236 0 0 1 .02-.022z"/>
                                                    </svg>
                                                    {{ $topicMedia->name }}
                                                </li>
                                                @empty
                                                <p>No available attachments.</p>
                                                @endforelse
                                            </ul>
                                        </div>
                                        <label class="bold" for="resource_attachment_path">To change resource attachments</label>
                                        <small class="form-text text-muted mb-3">
                                            <p class="red_color"><strong>Note:</strong> Choosing a file(s) below will replace the current resource attachments above and each file size should be less than 100 MB.</p>
                                        </small>
                                        <div class="resource-controls">
                                            <div class="resource-entry input-group">
                                                <div class="resource_attachment_input">
                                                    <input type="file"
                                                                class="form-control-file @error('resource_attachment_path.0') is-invalid @enderror"
                                                                id="resource_attachment_path"
                                                                name="resource_attachment_path[]"
                                                                value="{{ old('resource_attachment_path[]') }}"
                                                                multiple>
                                                </div>
                                                <div>
                                                    <p type="button" class="btn btn-upload btn-resource_attachment pr-3">
                                                        <i class="fa fa-plus-circle"></i>Add more
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
                                <button id="round-button-2" type="submit" class="btn btn-primary pl-5 pr-5 mb-4 float-right">Update</button>
                            </div>
                        </form>
                    </div>
                </div>

                @include('teacher.manage_subject.topics.partials.js_files')

            </div>
        </div>
    </div>
</section>
@endsection
