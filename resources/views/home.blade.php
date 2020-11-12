@extends('layouts.app')

@section('content')

<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 mb-4 mt-5">
                <div>
                    <h4 class="bold">Your welcome to learn, {{ Auth::user()->name }}</h4>
                </div>
            </div>

            @foreach($mostViewedSubjects as $mostViewedSubject)
            <div class="col-sm-6 col-md-6 col-lg-3">
                <a href="{{ route('subjects.show', $mostViewedSubject->slug) }}" style="text-decoration: none">
                    <div class="card mb-4">
                        <a href="{{ route('subjects.index', $mostViewedSubject->slug) }}" style="text-decoration: none">
                            <img src="{{ $mostViewedSubject->image_thumb}}" alt="{{ $mostViewedSubject->very_short_title }}" width="100%" height="130">
                        </a>
                        <div class="card-body card-body_custom">
                            <a href="{{ route('subjects.index', $mostViewedSubject->slug) }}" style="text-decoration: none" class="title-font">
                                <span class="bold">{{ $mostViewedSubject->very_short_title }}</span><br />
                                <span class="author-font">{{$mostViewedSubject->creator->name }}</span>
                                <div class="rating">
                                    <svg class="bi bi-star-fill" width="0.7em" height="0.7em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.283.95l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                    </svg>
                                    <svg class="bi bi-star-fill" width="0.7em" height="0.7em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.283.95l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                    </svg>
                                    <svg class="bi bi-star-fill" width="0.7em" height="0.7em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.283.95l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                    </svg>
                                    <svg class="bi bi-star-half" width="0.7em" height="0.7em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M5.354 5.119L7.538.792A.516.516 0 018 .5c.183 0 .366.097.465.292l2.184 4.327 4.898.696A.537.537 0 0116 6.32a.55.55 0 01-.17.445l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256a.519.519 0 01-.146.05c-.341.06-.668-.254-.6-.642l.83-4.73L.173 6.765a.55.55 0 01-.171-.403.59.59 0 01.084-.302.513.513 0 01.37-.245l4.898-.696zM8 12.027c.08 0 .16.018.232.056l3.686 1.894-.694-3.957a.564.564 0 01.163-.505l2.906-2.77-4.052-.576a.525.525 0 01-.393-.288L8.002 2.223 8 2.226v9.8z" clip-rule="evenodd"/>
                                    </svg>
                                    <span class="title-font">(1000)</span>
                                </div>
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
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>

<section class="bg-white">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <h3 class="bold">Category recommendations </h3>
            </div>
        </div>
        <div class="row">
            @foreach($topCategories as $topCategory)
            <div class="col-sm-6 col-md-4 col-lg-2 mt-3">
                <a href="#" style="text-decoration: none">
                    <div class="top-card make-it-slow text-center">
                        <p class="bold">{{ $topCategory }}</p>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>

<section class="seven">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-9 col-sm-12">
                <div class="d-flex">
                    <div class="mr-4">
                        <svg class="bi bi-collection-play" width="4em" height="4em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M14.5 13.5h-13A.5.5 0 011 13V6a.5.5 0 01.5-.5h13a.5.5 0 01.5.5v7a.5.5 0 01-.5.5zm-13 1A1.5 1.5 0 010 13V6a1.5 1.5 0 011.5-1.5h13A1.5 1.5 0 0116 6v7a1.5 1.5 0 01-1.5 1.5h-13zM2 3a.5.5 0 00.5.5h11a.5.5 0 000-1h-11A.5.5 0 002 3zm2-2a.5.5 0 00.5.5h7a.5.5 0 000-1h-7A.5.5 0 004 1z" clip-rule="evenodd"/>
                            <path fill-rule="evenodd" d="M6.258 6.563a.5.5 0 01.507.013l4 2.5a.5.5 0 010 .848l-4 2.5A.5.5 0 016 12V7a.5.5 0 01.258-.437z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                    <div>
                        <h3 class="bold">Teach students online</h3>
                        <p>Top teachers from best schools teaching millions of students on Coaching101.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-12">
                <a id="round-button-2" href="{{ url('login') }}" class="btn btn-primary" name="button">Start teaching</a>
            </div>
        </div>
    </div>
</section>
@endsection
