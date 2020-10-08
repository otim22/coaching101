@extends('layouts.app')

@section('content')

<section>
    <div class="container">
        <div class="row mt-5">
            <div class="col-lg-8 offset-2">
                <div class="mb-3">
                    <h4 class="bold">{{ $topic->title }}</h4>
                </div>
                <video id="my-video" class="video-js rounded-corners w-100" controls preload="auto" data-setup="{}">
                    <source src="{{ asset($topic->getFirstMediaUrl('content_file')) }}" type='video/mp4'>
                </video>

                <div class="mt-4">
                    <h5 class="bold">Topic Description</h5>
                    <p>{{ $topic->description }}</p>
                </div>

                <div class="mt-4">
                    <h5 class="bold">Extra File Attachments</h5>
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

                <div class="mt-5 d-flex justify-content-between">
                    <a class="btn btn-secondary" type="button" href="{{ route('subjects.show', $subject) }}">
                        <svg width="1.3em" height="1.3em" viewBox="0 0 20 20" class="bi bi-arrow-left-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                            <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z"/>
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
