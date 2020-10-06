@extends('layouts.app')

@section('content')

<section class="section-two mt-5">
    <div class="container">
        <div class="row mt-5">
            <div class="col-lg-3 col-md-2 col-sm-2">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('teacher/subjects') }}">
                            <svg width="1.3em" height="1.3em" viewBox="0 0 20 20" class="bi bi-arrow-left-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z"/>
                            </svg>
                            Back to subjects
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('topics', $subject) }}">
                            <svg width="1.3em" height="1.3em" viewBox="0 0 20 20" class="bi bi-plus-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M14 1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                                <path fill-rule="evenodd" d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                            </svg>
                            Create topics
                        </a>
                    </li>
                </ul>
            </div>
            <div class="col-lg-9">
                <h3 class="mb-3">{{ $subject->title }}</h3>
                <img src="{{ asset($subject->getFirstMediaUrl()) }}" class="w-100">
                <div class="mt-3">
                    <p>Subtitle {{ $subject->subtitle }} </p>
                </div>
                <p>Description {{ $subject->description }} </p>

                <ul>
                    @foreach($subject->audience['student_learn'] as $student_learn)
                    <li>Learn {{ $student_learn }}</li>
                    @endforeach
                </ul>

                <ul>
                    @foreach($subject->audience['class_requirement'] as $class_requirement)
                    <li>Reqirements {{ $class_requirement }}</li>
                    @endforeach
                </ul>

                <ul>
                    @foreach($subject->audience['target_student'] as $target_student)
                    <li>Target {{ $target_student }}</li>
                    @endforeach
                </ul>

                <p>Welcome {{ $subject->message['welcome_message'] }} </p>
                <p>Kudos {{ $subject->message['congragulation_message'] }} </p>

                <h4>Topics</h4>
                @foreach($subject->topics as $topic)
                    <p>{{ $topic->content_title }}</p>
                    <p>{{ $topic->content_description }}</p>
                    <video id="my-video" class="video-js" controls preload="auto" width="600" height="400" data-setup="{}">
                        <source src="{{ asset($topic->getFirstMediaUrl('content_file')) }}" type='video/mp4'>
                    </video>
                    <p><a href="{{ asset($topic->getFirstMediaUrl('resource_attachment')) }}">{{ $topic->getMedia('resource_attachment')[0]->name }}</a></p>
                @endforeach
            </div>
        </div>
    </div>
</section>

@endsection
