@extends('layouts.app')

@section('content')

<section class="section-bread bg-gray-4">
    <div class="container">
        <nav aria-label="breadcrumb bg-gray">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a style="text-decoration: none" href="{{ url('/') }}">Home</a></li>
                <li class="breadcrumb-item"><a style="text-decoration: none" href="{{ route('teacher.subjects') }}">Subjects</a></li>
                <li class="breadcrumb-item"><a style="text-decoration: none" href="{{ route('subjects.show', $subject) }}">{{ $subject->short_title }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $topic->short_title }}</li>
            </ol>
        </nav>
    </div>
</section>


<section class="section-two">
    <div class="container">
        <div class="row mt-5 mb-5">
            <div class="col-lg-8 offset-2">
                <div class="mb-3">
                    <h4 class="bold">{{ $topic->title }}</h4>
                </div>
                <video id="my-video" class="video-js rounded-corners w-100" controls preload="auto" data-setup="{}">
                    <source src="{{ asset($topic->getFirstMediaUrl('content_file')) }}" type='video/mp4'>
                </video>

                <div class="mt-4">
                    <h5 class="bold">Topic description</h5>
                    <p>{{ $topic->description }}</p>
                </div>

                <div class="mt-4">
                    <h5 class="bold">Extra file attachments</h5>
                    <ul>
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

                <div class="mt-5 d-flex justify-content-between">
                    <a class="btn btn-secondary" type="button" href="{{ route('subjects.show', $subject) }}">
                        <svg width="1.3em" height="1.3em" viewBox="0 0 20 20" class="bi bi-box-arrow-in-left" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M10 3.5a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-2a.5.5 0 0 1 1 0v2A1.5 1.5 0 0 1 9.5 14h-8A1.5 1.5 0 0 1 0 12.5v-9A1.5 1.5 0 0 1 1.5 2h8A1.5 1.5 0 0 1 11 3.5v2a.5.5 0 0 1-1 0v-2z"/>
                            <path fill-rule="evenodd" d="M4.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H14.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z"/>
                        </svg>
                        Back To Subject
                    </a>

                    <a class="btn btn-primary" type="button" href="{{ route('topics.edit', [$subject, $topic]) }}">
                        Edit Topic
                    </a>
                </div>

            </div>
        </div>
    </div>
</section>

@endsection
