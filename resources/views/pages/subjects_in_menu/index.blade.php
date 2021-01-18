@extends('layouts.app')

@section('content')
<section class="bg-gray-2 section-one" id="teacher-classses">
    <div class="container">
        <div class="row pt-4 mb-4">
            <div class="col-sm-12 col-md-7 col-lg-7 mb-2">
                <h3 class="bold mt-5">Test</h3>
                <p class="sub-text">Sub</p>
                <a id="round-button-2" type="button" href="#section-teacher_course" class="btn btn-primary teacher-classses_button mt-4">Explore classes</a>
            </div>
            <div class="col-sm-12 col-md-5 col-lg-5">
                <img src="{{ asset('images/st_2.jpg') }}" class="circlar-teacher" alt="#">
            </div>
        </div>
    </div>
</section>

<section class="bg-white">
    @include('partials.categories')
</section>

@endsection
