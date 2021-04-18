@extends('layouts.app')

@section('content')

<section class="section-bread bg-gray-2">
    <div class="container">
        <nav aria-label="breadcrumb bg-gray">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ url('/') }}">
                        <svg width="1.3em" height="1.3em" viewBox="0 0 16 16" class="bi bi-house-fill pb-1" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M8 3.293l6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6zm5-.793V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"/>
                            <path fill-rule="evenodd" d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z"/>
                        </svg>
                    </a>
                </li>
                <li class="breadcrumb-item"><a style="text-decoration: none" href="{{ route('manage.subjects') }}">Subjects</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $subject->short_title }}</li>
            </ol>
        </nav>
    </div>
</section>

<section class="section-two">
    <div class="container">
        <div class="row mt-5 mb-5">
            <div class="col-lg-3 col-md-12 col-sm-12">
                <div class="fast-transition pt-4 pb-4">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('manage.subjects') }}">
                                <svg width="1.3em" height="1.3em" viewBox="0 0 20 20" class="bi bi-box-arrow-in-left" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M10 3.5a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-2a.5.5 0 0 1 1 0v2A1.5 1.5 0 0 1 9.5 14h-8A1.5 1.5 0 0 1 0 12.5v-9A1.5 1.5 0 0 1 1.5 2h8A1.5 1.5 0 0 1 11 3.5v2a.5.5 0 0 1-1 0v-2z"/>
                                    <path fill-rule="evenodd" d="M4.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H14.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z"/>
                                </svg>
                                Back To Subjects
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('subjects.edit', $subject) }}">
                                <svg width="1.3em" height="1.3em" viewBox="0 0 20 20" class="bi bi-pencil-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                </svg>
                                Edit Subject Outline
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('audiences.edit', $subject) }}">
                                <svg width="1.3em" height="1.3em" viewBox="0 0 20 20" class="bi bi-people" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8zm-7.978-1h7.956a.274.274 0 0 0 .014-.002l.008-.002c-.002-.264-.167-1.03-.76-1.72C13.688 10.629 12.718 10 11 10c-1.717 0-2.687.63-3.24 1.276-.593.69-.759 1.457-.76 1.72a1.05 1.05 0 0 0 .022.004zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0zM6.936 9.28a5.88 5.88 0 0 0-1.23-.247A7.35 7.35 0 0 0 5 9c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816zM4.92 10c-1.668.02-2.615.64-3.16 1.276C1.163 11.97 1 12.739 1 13h3c0-1.045.323-2.086.92-3zM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0zm3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4z"/>
                                </svg>
                                Edit Audience
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('messages.edit', $subject) }}">
                                <svg width="1.3em" height="1.3em" viewBox="0 0 20 20" class="bi bi-chat-square-text" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M14 1H2a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h2.5a2 2 0 0 1 1.6.8L8 14.333 9.9 11.8a2 2 0 0 1 1.6-.8H14a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zM2 0a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h2.5a1 1 0 0 1 .8.4l1.9 2.533a1 1 0 0 0 1.6 0l1.9-2.533a1 1 0 0 1 .8-.4H14a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                                    <path fill-rule="evenodd" d="M3 3.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zM3 6a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9A.5.5 0 0 1 3 6zm0 2.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z"/>
                                </svg>
                                Edit Message
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('topics', $subject) }}">
                                <svg width="1.3em" height="1.3em" viewBox="0 0 20 20" class="bi bi-journal-richtext" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2z"/>
                                    <path d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1z"/>
                                    <path fill-rule="evenodd" d="M5 11.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5zm0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm1.639-4.208l1.33.886 1.854-1.855a.25.25 0 0 1 .289-.047L11 4.75V7a.5.5 0 0 1-.5.5h-5A.5.5 0 0 1 5 7v-.5s1.54-1.274 1.639-1.208zM6.75 4.5a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5z"/>
                                </svg>
                                Create New Topic
                            </a>
                        </li>
                        <li class="nav-item mt-2">
                            <a class="nav-link">
                                <svg width="1.3em" height="1.3em" viewBox="0 0 20 20" class="bi bi-list-stars" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M5 11.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5z"/>
                                    <path d="M2.242 2.194a.27.27 0 0 1 .516 0l.162.53c.035.115.14.194.258.194h.551c.259 0 .37.333.164.493l-.468.363a.277.277 0 0 0-.094.3l.173.569c.078.256-.213.462-.423.3l-.417-.324a.267.267 0 0 0-.328 0l-.417.323c-.21.163-.5-.043-.423-.299l.173-.57a.277.277 0 0 0-.094-.299l-.468-.363c-.206-.16-.095-.493.164-.493h.55a.271.271 0 0 0 .259-.194l.162-.53zm0 4a.27.27 0 0 1 .516 0l.162.53c.035.115.14.194.258.194h.551c.259 0 .37.333.164.493l-.468.363a.277.277 0 0 0-.094.3l.173.569c.078.255-.213.462-.423.3l-.417-.324a.267.267 0 0 0-.328 0l-.417.323c-.21.163-.5-.043-.423-.299l.173-.57a.277.277 0 0 0-.094-.299l-.468-.363c-.206-.16-.095-.493.164-.493h.55a.271.271 0 0 0 .259-.194l.162-.53zm0 4a.27.27 0 0 1 .516 0l.162.53c.035.115.14.194.258.194h.551c.259 0 .37.333.164.493l-.468.363a.277.277 0 0 0-.094.3l.173.569c.078.255-.213.462-.423.3l-.417-.324a.267.267 0 0 0-.328 0l-.417.323c-.21.163-.5-.043-.423-.299l.173-.57a.277.277 0 0 0-.094-.299l-.468-.363c-.206-.16-.095-.493.164-.493h.55a.271.271 0 0 0 .259-.194l.162-.53z"/>
                                </svg>
                                All Topics Below
                            </a>
                        </li>
                        <hr>
                        @forelse($subject->topics as $key => $topic)
                        <li class="nav-item">
                            <a  class="nav-link" href="{{ route('topics.show', [$subject, $topic]) }}" style="text-decoration: none;">{{ $key+1 }} - {{ $topic->extra_very_short_title }}</a></li>
                        @empty
                        <li>No available Topics yet!</li>
                        @endforelse
                    </ul>
                </div>
            </div>
            <div class="col-lg-9 col-md-12 col-sm-12 adds-padding upper-padding">
                <h5 class="bold mb-3">{{ $subject->title }}</h5>
                <img src="{{ asset($subject->cover_image) }}" class="rounded-corners w-100" alt="{{ $subject->title }}">

                <div class="mt-3 mb-4">
                    <p> {{ $subject->subtitle }} </p>
                </div>

                <div class="mb-4">
                    <h5 class="bold">Subject description</h5>
                    <p> {{ $subject->description }} </p>
                </div>

                @if($subject->audience)
                    <ul class="mb-4">
                        <h5 class="bold">What students will learn</h5>
                        @forelse($subject->audience['student_learn'] as $student_learn)
                            <li class="mb-2">
                                <svg width="1.5em" height="1.5em" viewBox="0 0 16 20" class="bi bi-check" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M10.97 4.97a.75.75 0 0 1 1.071 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.236.236 0 0 1 .02-.022z"/>
                                </svg>
                                {{ $student_learn }}
                            </li>
                        @empty
                            <p>Nothing indicated that students would learn.</p>
                        @endforelse
                    </ul>

                    <ul class="mb-4">
                        <h5 class="bold">The subject requirements for students</h5>
                        @forelse($subject->audience['class_requirement'] as $class_requirement)
                            <li class="mb-2">
                                <svg width="1.5em" height="1.5em" viewBox="0 0 16 20" class="bi bi-check" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M10.97 4.97a.75.75 0 0 1 1.071 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.236.236 0 0 1 .02-.022z"/>
                                </svg>
                                {{ $class_requirement }}
                            </li>
                        @empty
                            <p>No subject requirements indicated.</p>
                        @endforelse
                    </ul>

                    <ul class="mb-4">
                        <h5 class="bold">Your target students</h5>
                        @forelse($subject->audience['target_student'] as $target_student)
                            <li class="mb-2">
                                <svg width="1.5em" height="1.5em" viewBox="0 0 16 20" class="bi bi-check" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M10.97 4.97a.75.75 0 0 1 1.071 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.236.236 0 0 1 .02-.022z"/>
                                </svg>
                                {{ $target_student }}
                            </li>
                        @empty
                            <p>No target students indicated.</p>
                        @endforelse
                    </ul>
                @endif

                @if($subject->message)
                    <h5 class="bold">Welcome message</h5>
                    <p class="mb-4"> {{ $subject->message['welcome_message'] }} </p>

                    <h5 class="bold">Congragulation message</h5>
                    <p class="mb-5"> {{ $subject->message['congragulation_message'] }} </p>
                @endif

                @foreach($subject->questions as $question)
                    <hr />
                    <h5 class="bold mb-3 mt-2">Subject Asked Questions</h5>
                    <p type="button" data-toggle="modal" data-target="#askingAQuestion{{ $question->id }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-check" viewBox="0 0 18 18">
                            <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z"/>
                        </svg>
                        {{ $question->body }}
                    </p>

                    <div class="modal fade" id="askingAQuestion{{ $question->id }}" tabindex="-1" aria-labelledby="askingAQuestionLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <p class="bold">{{ $question->body }}</p>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    @include('teacher.manage_subject.partials.replies')

                                    @include('teacher.manage_subject.partials.comment')
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
</section>

@endsection

@push('scripts')
    <script src="{{ asset('vendor/js/jquery.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('vendor/js/popper.min.js') }}" type="text/javascript"></script>
    <!-- <script src="{{ asset('js/subject.js')}}" type="text/javascript"></script> -->
@endpush
