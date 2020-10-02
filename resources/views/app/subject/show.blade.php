@extends('layouts.app')

@section('content')

<section class="section-two mt-5">
    <div class="container">
        <div class="row mt-5">
            <div class="col-lg-8 offset-2">
                <h3>{{ $subject->title }}</h3>
                <p>Subtitle {{ $subject->subtitle }} </p>
                <p>Description {{ $subject->description }} </p>
                <p>Image </p>
                <img src="{{ asset($subject->getFirstMediaUrl()) }}" class="w-50">

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
                <a href="{{ route('topics', $subject) }}">Create Topic</a><br />
                <a href="{{ route('all-subjects') }}">All Subjects</a>
            </div>
        </div>
    </div>
</section>

@endsection
