@extends('layouts.app')

@section('content')
<section class="bg-gray-2 section-one" id="teacher-classses">
    <div class="container">
        <div class="row pt-4 mb-4">
            <div class="col-sm-12 col-md-7 col-lg-7 mb-2">
                <h3 class="bold mt-5">{{ Str::ucfirst($teacher->name) }}</h3>
                <p class="sub-text">{{ Str::ucfirst($teacher->email) }}</p>
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
                        <img src="{{ $subject->default_image}}" alt="{{ $subject->very_short_title }}" width="100%" height="150">
                    </a>
                    <div class="card-body card-body_custom">
                        <a href="{{ route('subjects.index', $subject->slug) }}" style="text-decoration: none" class="title-font">
                            <span class="bold">{{ $subject->very_short_title }}</span><br />
                            <span class="author-font">{{$subject->creator->name }}</span>
                            @if($subject->averageRating)
                                <div class="star-display">
                                    @for($i = 0; $i <= $subject->averageRating; $i++)
                                        <label for="rate-{{$i}}" class="fa fa-star"></label>
                                    @endfor
                                    <span class="title-font">{{ count($subject->subscriptions) }}</span>
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
                                <span class="title-font ml-3">({{ count($subject->subscriptions) }})</span><br />
                            </div>
                            @endif
                            <span class="bold">UGX 50,000</span>
                        </a>
                        <div class="mt-2 d-flex justify-content-between">
                            <a href="#" id="round-button-2" type="button" name="button" class="btn btn-outline-danger btn-sm">Add To Cart</a>
                            <div class="love-circle">
                                <a href="#">
                                    <svg width="1.4em" height="1.4em" viewBox="0 0 16 16" class="bi bi-heart" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M8 2.748l-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z"/>
                                    </svg>
                                </a>
                            </div>
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
