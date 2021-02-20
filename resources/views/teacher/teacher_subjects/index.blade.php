@extends('layouts.app')

@section('content')

<section class="bg-gray-2 section-one" id="teacher-classses">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ url('/') }}">
                        <svg width="1.3em" height="1.3em" viewBox="0 0 16 16" class="bi bi-house-fill pb-1" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M8 3.293l6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6zm5-.793V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"/>
                            <path fill-rule="evenodd" d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z"/>
                        </svg>
                    </a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">{{ Str::ucfirst($teacher->name) }}</li>
            </ol>
        </nav>

        <div class="row pt-4 mb-4">
            <div class="col-sm-12 col-md-7 col-lg-7 mb-2">
                <h3 class="bold mt-5">{{ Str::ucfirst($teacher->name) }}</h3>
                <span class="sub-text">Teaches Mathematics</span><br />
                <span class="author-font">{{ Str::ucfirst($teacher->email) }}</span><br />
                <a id="round-button-2" type="button" href="#section-teacher_course" class="btn btn-primary teacher-classses_button mt-4">Explore classes</a>
            </div>
            <div class="col-sm-12 col-md-5 col-lg-5">
                <img src="{{ asset('images/st_2.jpg') }}" class="circlar-teacher" alt="{{ $teacher->name }}">
            </div>
        </div>
    </div>
</section>

<section id="section-teacher_course">
    <div class="container">
        <div class="row teacher-classses_panel">
            @forelse($subjects as $subject)
            <div class="col-sm-6 col-md-6 col-lg-3">
                <div class="card mb-4">
                    <a href="{{ route('subjects.index', $subject->slug) }}" style="text-decoration: none">
                        <img src="{{ $subject->getFirstMediaUrl() }}" alt="{{ $subject->very_short_title }}" width="100%" height="150">
                    </a>
                    <div class="card-body card-body_custom">
                        <a href="{{ route('subjects.index', $subject->slug) }}" style="text-decoration: none" class="title-font">
                            <span class="bold">{{ $subject->very_short_title }}</span><br />
                            <span class="author-font">By {{$subject->creator->name }}</span><br />
                            @if($subject->averageRating)
                                <div class="star-display">
                                    @for($i = 0; $i <= $subject->averageRating; $i++)
                                        <label for="rate-{{$i}}" class="fa fa-star"></label>
                                    @endfor
                                    <span class="author-font ml-2">({{ $subject->getSubscriptionCount() }}) students</span><br />
                                </div>
                            @else
                                <div class="rating">
                                    <svg class="bi bi-star-fill" width="0.7em" height="0.7em" viewBox="0 0 16 16" fill="grey" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.283.95l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                    </svg>
                                    <svg class="bi bi-star-fill" width="0.7em" height="0.7em" viewBox="0 0 16 16" fill="grey" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.283.95l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                    </svg>
                                    <svg class="bi bi-star-fill" width="0.7em" height="0.7em" viewBox="0 0 16 16" fill="grey" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.283.95l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                    </svg>
                                    <svg class="bi bi-star-fill" width="0.7em" height="0.7em" viewBox="0 0 16 16" fill="grey" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.283.95l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                    </svg>
                                    <svg class="bi bi-star-fill" width="0.7em" height="0.7em" viewBox="0 0 16 16" fill="grey" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.283.95l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                    </svg>
                                    <span class="author-font ml-2">({{ $subject->getSubscriptionCount() }}) students</span><br />
                                </div>
                            @endif

                            @if($subject->price)
                                <span class="bold">UGX {{ number_format($subject->price) }}/-</span>
                            @else
                                <span class="bold paid_color">Free</span>
                            @endif
                        </a>
                        <div class="mt-2 d-flex justify-content-between">
                            <livewire:add-to-cart :subject="$subject" :key="$subject->id" />
                            <livewire:add-to-wish-list :subject="$subject" :key="$subject->id" />
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-sm-12 col-md-12 col-lg-12 mb-2">
                <p>Sorry, no available subjects in this category!</p>
            </div>
            @endforelse
        </div>
    </div>
</section>

<section class="bg-white">
    @include('partials.categories')
</section>

@push('scripts')
    <script src="{{ asset('vendor/js/jquery.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/teacher_courses.js')}}" type="text/javascript"></script>
@endpush

@endsection
