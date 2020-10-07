@extends('layouts.app')

@section('content')

<section>
    <div class="container">
        <div class="row mt-5">
            <div class="col-lg-3 col-md-12 col-sm-12 fast-transition">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('teacher.subjects') }}">
                            <svg width="1.3em" height="1.3em" viewBox="0 0 20 20" class="bi bi-arrow-left-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z"/>
                            </svg>
                            Back To Subjects
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('topics', $subject) }}">
                            <svg width="1.3em" height="1.3em" viewBox="0 0 20 20" class="bi bi-pencil-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                            </svg>
                            Edit Subject Outline
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('topics', $subject) }}">
                            <svg width="1.3em" height="1.3em" viewBox="0 0 20 20" class="bi bi-people" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8zm-7.978-1h7.956a.274.274 0 0 0 .014-.002l.008-.002c-.002-.264-.167-1.03-.76-1.72C13.688 10.629 12.718 10 11 10c-1.717 0-2.687.63-3.24 1.276-.593.69-.759 1.457-.76 1.72a1.05 1.05 0 0 0 .022.004zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0zM6.936 9.28a5.88 5.88 0 0 0-1.23-.247A7.35 7.35 0 0 0 5 9c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816zM4.92 10c-1.668.02-2.615.64-3.16 1.276C1.163 11.97 1 12.739 1 13h3c0-1.045.323-2.086.92-3zM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0zm3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4z"/>
                            </svg>
                            Edit Audience
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('topics', $subject) }}">
                            <svg width="1.3em" height="1.3em" viewBox="0 0 20 20" class="bi bi-chat-square-text" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M14 1H2a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h2.5a2 2 0 0 1 1.6.8L8 14.333 9.9 11.8a2 2 0 0 1 1.6-.8H14a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zM2 0a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h2.5a1 1 0 0 1 .8.4l1.9 2.533a1 1 0 0 0 1.6 0l1.9-2.533a1 1 0 0 1 .8-.4H14a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                                <path fill-rule="evenodd" d="M3 3.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zM3 6a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9A.5.5 0 0 1 3 6zm0 2.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z"/>
                            </svg>
                            Edit Messages
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('topics', $subject) }}">
                            <svg width="1.3em" height="1.3em" viewBox="0 0 20 20" class="bi bi-plus-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M14 1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                                <path fill-rule="evenodd" d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                            </svg>
                            Create New Topic
                        </a>
                    </li>
                    <hr>
                    @forelse($subject->topics as $key => $topic)
                    <li> <a href="#" style="text-decoration: none;">{{ $key+1 }} - {{ $topic->short_title }}</a></li>
                    @empty
                    <li>No available Topics yet!</li>
                    @endforelse
                </ul>
            </div>
            <div class="col-lg-9 col-md-12 col-sm-12 pl-5">
                <h4 class="bold mb-4">{{ $subject->title }}</h4>
                <img src="{{ asset($subject->getFirstMediaUrl()) }}" class="w-100">
                <div class="mt-2 mb-4">
                    <i> {{ $subject->subtitle }} </i>
                </div>
                <h5 class="bold">Subject description</h5>
                <p> {{ $subject->description }} </p>

                <ul class="mb-4">
                    <h5 class="bold">What students will learn</h5>
                    @foreach($subject->audience['student_learn'] as $student_learn)
                    <li>
                        <svg width="1.5em" height="1.5em" viewBox="0 0 16 20" class="bi bi-check" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M10.97 4.97a.75.75 0 0 1 1.071 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.236.236 0 0 1 .02-.022z"/>
                        </svg>
                        {{ $student_learn }}
                    </li>
                    @endforeach
                </ul>

                <ul class="mb-4">
                    <h5 class="bold">The subject requirements for students</h5>
                    @foreach($subject->audience['class_requirement'] as $class_requirement)
                    <li>
                        <svg width="1.5em" height="1.5em" viewBox="0 0 16 20" class="bi bi-check" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M10.97 4.97a.75.75 0 0 1 1.071 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.236.236 0 0 1 .02-.022z"/>
                        </svg>
                        {{ $class_requirement }}
                    </li>
                    @endforeach
                </ul>

                <ul class="mb-4">
                    <h5 class="bold">Your target students</h5>
                    @foreach($subject->audience['target_student'] as $target_student)
                    <li>
                        <svg width="1.5em" height="1.5em" viewBox="0 0 16 20" class="bi bi-check" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M10.97 4.97a.75.75 0 0 1 1.071 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.236.236 0 0 1 .02-.022z"/>
                        </svg>
                        {{ $target_student }}
                    </li>
                    @endforeach
                </ul>

                <h5 class="bold">Welcome message</h5>
                <p class="mb-4"> {{ $subject->message['welcome_message'] }} </p>

                <h5 class="bold">Congragulation message</h5>
                <p class="mb-4"> {{ $subject->message['congragulation_message'] }} </p>

                <h5 class="bold mb-4">Subject Topics</h5>
                @forelse($subject->topics as $key => $topic)
                <a href="#" style="text-decoration: none">
                    <div class="card" style="max-height: 120px;">
                        <div class="row no-gutters">
                            <div class="col-lg-3 col-md-12 col-sm-12">
                                <video id="my-video" class="video-js" controls preload="auto"  height="119px" data-setup="{}">
                                    <source src="{{ asset($topic->getFirstMediaUrl('content_file')) }}" type='video/mp4'>
                                </video>
                            </div>
                            <div class="col-lg-9 col-md-12 col-sm-12">
                                <div class="card-body ml-3">
                                    <p class="card-title">{{ $key+1 }} - {{ $topic->content_title }}</p>
                                    <p class="card-text">View details</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>

                @empty
                <p>No available topics yet.</p>
                @endforelse
            </div>
        </div>
    </div>
</section>

@endsection
