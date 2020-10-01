@extends('layouts.app')

@section('content')

<section class="section-two mt-5">
    <div class="container">
        <div class="row mt-5">
            <div class="col-lg-8 offset-2">
                <h2>Subjects</h2>
                @foreach($subjects as $subject)
                <a href="{{ route('subjects.show', $subject) }}">  {{ $subject->title }}</a><br />
                @endforeach
            </div>
        </div>
    </div>
</section>

@endsection
