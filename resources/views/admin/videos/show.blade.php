@extends('admin.layouts.master')

@section('content')

<section>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-10 col-md-10 col-sm-12 mt-5 pt-5">
                <div class="card admin-shadow p-2">
                    <div class="card-header">
                        <div class="d-flex justify-content-between mb-1">
                            <div>
                                <a type="button" href="{{ route('admin.subjects.index') }}" class="btn btn-secondary" name="button">Back</a>
                            </div>
                            <div>
                                <li class="nav-item dropdown d-flex align-items-center">
                                    <a href="#" class="nav-link dropdown-toggle btn btn-primary" data-toggle="dropdown" aria-expanded="false">
                                        Action
                                    </a>
                                    <div class="dropdown-menu">
                                        <ul class="list-unstyled">
                                            <li>
                                                <form action="{{route('admin.subjects.approve', $subject)}}" method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button type="submit" class="dropdown-item"> Approve </button>
                                                </form>
                                            </li>
                                            @if(Auth::user()->hasRole('super-admin'))
                                                <li>
                                                    <a class="dropdown-item"
                                                       href="#"
                                                       onclick="event.preventDefault(); document.getElementById('delete-subject-item').submit();">
                                                        {{ __('Delete') }}
                                                    </a>
                                                </li>
                                            @endif
                                        </ul>
                                    </div>
                                </li>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <h5 class="bold mb-3">{{ $subject->title }}</h5>
                        <img src="{{ asset($subject->cover_image) }}" class="rounded-corners w-50" alt="{{ $subject->title }}">

                        <div class="mt-3 mb-3">
                            <p> {{ $subject->subtitle }} </p>
                        </div>

                        <div class="mb-3">
                            <h5 class="bold">Subject description</h5>
                            <p> {{ $subject->description }} </p>
                        </div>

                        @if($subject->audience)
                            <div class="mb-3">
                                <h5 class="bold">What students will learn</h5>
                                @forelse($subject->audience['student_learn'] as $student_learn)
                                    <ul><li><span class="drawer-menu-text"> {{ $student_learn }}</span></li></ul>
                                @empty
                                    <p>Nothing indicated that students would learn.</p>
                                @endforelse
                            </div>

                            <div class="mb-3">
                                <h5 class="bold">The subject requirements for students</h5>
                                @forelse($subject->audience['class_requirement'] as $class_requirement)
                                    <ul><li>{{ $class_requirement }}</li></ul>
                                @empty
                                    <p>No subject requirements indicated.</p>
                                @endforelse
                            </div>

                            <div class="mb-3">
                                <h5 class="bold">Your target students</h5>
                                @forelse($subject->audience['target_student'] as $target_student)
                                    <ul><li> {{ $target_student }}</li></ul>
                                @empty
                                    <p>No target students indicated.</p>
                                @endforelse
                            </div>
                        @endif

                        @if($subject->message)
                            <h5 class="bold">Welcome message</h5>
                            <p class="mb-3"> {{ $subject->message['welcome_message'] }} </p>

                            <h5 class="bold">Congragulation message</h5>
                            <p class="mb-3"> {{ $subject->message['congragulation_message'] }} </p>
                        @endif

                        <h5 class="bold mb-3">Subject topics</h5>

                        @if($subject->topics)
                            @forelse($subject->topics as $key => $topic)
                            <div class="card mb-3">
                                <a href="{{ route('admin.topics.show', [$subject, $topic]) }}" style="text-decoration: none">
                                    <div class="row"  style="max-height: 118px;">
                                        <div class="col-lg-3 col-md-6 col-sm-12">
                                            <video controls preload="auto"  height="119" width="212" data-setup="{}" controlslist="nodownload">
                                                <source src="{{ asset($topic->getFirstMediaUrl('content_file')) }}" type='video/mp4'>
                                            </video>
                                        </div>
                                        <div class="col-lg-9 col-md-6 col-sm-12">
                                            <div class="pt-3">
                                                <p>{{ $key+1 }} - {{ $topic->short_title }}</p>
                                                <p>View details</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            @empty
                                <p>No available topics yet.</p>
                            @endforelse
                        @endif
                    </div>

                    <form action="{{ route('admin.subjects.destroy', $subject) }}" class="hidden" id="delete-subject-item" method="POST">
                        @csrf
                        @method('delete')
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
