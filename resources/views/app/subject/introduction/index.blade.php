@extends('layouts.app')

@section('content')

<section class="section-two mt-5">
    <div class="container">
        <div class="row mt-5">
            <div class="col-lg-8 offset-2">
                @foreach($subjects as $subject)
                <h2>Title</h2>
                <a href="{{ route('subjects.show') }}">  {{ $subject->title }}</a>
                @endforeach
            </div>
        </div>
    </div>
</section>

@endsection
