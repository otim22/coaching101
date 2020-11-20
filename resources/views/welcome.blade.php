@extends('layouts.app')

@section('content')

<section class="bg-image text-white">
    <div class="container">
        <div class="row mt-5">
            <div class="col-lg-6 col-md-8 col-sm-12">
                <div class="learn-today">
                    <h1 class="display-3 learn-today_title">Learn today</h1>
                    <h4 class="pt-3 pm-3 bold student-font">At your own convenient time, </h4>
                    <h4 class="pt-2 pm-3 bold student-font">Learn from our verified seasoned teachers </h4>
                    <h4 class="pt-2 pm-3 bold student-font">With proven experience in their fields.</h4>
                    @guest
                        <p><a id="round-button-2" class="btn btn-primary btn-lg mt-5" href="{{ route('login') }}" role="button">Get Started &raquo;</a></p>
                    @endguest

                    @if(auth()->user()->role == 1)
                        <p><a id="round-button-2" class="btn btn-primary btn-lg get-started_student mt-5" href="#learn-now" role="button">Get Started &raquo;</a></p>
                    @endif

                    @if(auth()->user()->role == 2)
                        <p><a id="round-button-2" class="btn btn-primary btn-lg mt-5" href="{{ route('manage.subjects') }}" role="button">Get Started &raquo;</a></p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>

<section class="bg-gray-2 background-style">
    <div class="container">
        <div class="row mb-5">
            <div class="col-sm-12 col-md-4 col-lg-4 d-flex">
                <div class="mr-4">
                    <svg class="bi bi-cloud-fill" width="3em" height="3em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M3.5 13a3.5 3.5 0 11.59-6.95 5.002 5.002 0 119.804 1.98A2.5 2.5 0 0113.5 13h-10z" clip-rule="evenodd"/>
                    </svg>
                </div>
                <div>
                    <h5>1,000 online subjects</h5>
                    <p>Discover varied topics</p>
                </div>
            </div>
            <div class="col-sm-12 col-md-4 col-lg-4 d-flex">
                <div class="mr-4">
                    <svg class="bi bi-bookmark-check" width="3em" height="3em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M4.5 2a.5.5 0 00-.5.5v11.066l4-2.667 4 2.667V8.5a.5.5 0 011 0v6.934l-5-3.333-5 3.333V2.5A1.5 1.5 0 014.5 1h4a.5.5 0 010 1h-4z" clip-rule="evenodd"/>
                        <path fill-rule="evenodd" d="M15.854 2.146a.5.5 0 010 .708l-3 3a.5.5 0 01-.708 0l-1.5-1.5a.5.5 0 01.708-.708L12.5 4.793l2.646-2.647a.5.5 0 01.708 0z" clip-rule="evenodd"/>
                    </svg>
                </div>
                <div>
                    <h5>Expert teachers</h5>
                    <p>Connect with right teachers</p>
                </div>
            </div>
            <div class="col-sm-12 col-md-4 col-lg-4 d-flex">
                <div class="mr-4">
                    <svg class="bi bi-clock-history" width="3em" height="3em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M8.515 1.019A7 7 0 008 1V0a8 8 0 01.589.022l-.074.997zm2.004.45a7.003 7.003 0 00-.985-.299l.219-.976c.383.086.76.2 1.126.342l-.36.933zm1.37.71a7.01 7.01 0 00-.439-.27l.493-.87a8.025 8.025 0 01.979.654l-.615.789a6.996 6.996 0 00-.418-.302zm1.834 1.79a6.99 6.99 0 00-.653-.796l.724-.69c.27.285.52.59.747.91l-.818.576zm.744 1.352a7.08 7.08 0 00-.214-.468l.893-.45a7.976 7.976 0 01.45 1.088l-.95.313a7.023 7.023 0 00-.179-.483zm.53 2.507a6.991 6.991 0 00-.1-1.025l.985-.17c.067.386.106.778.116 1.17l-1 .025zm-.131 1.538c.033-.17.06-.339.081-.51l.993.123a7.957 7.957 0 01-.23 1.155l-.964-.267c.046-.165.086-.332.12-.501zm-.952 2.379c.184-.29.346-.594.486-.908l.914.405c-.16.36-.345.706-.555 1.038l-.845-.535zm-.964 1.205c.122-.122.239-.248.35-.378l.758.653a8.073 8.073 0 01-.401.432l-.707-.707z" clip-rule="evenodd"/>
                        <path fill-rule="evenodd" d="M8 1a7 7 0 104.95 11.95l.707.707A8.001 8.001 0 118 0v1z" clip-rule="evenodd"/>
                        <path fill-rule="evenodd" d="M7.5 3a.5.5 0 01.5.5v5.21l3.248 1.856a.5.5 0 01-.496.868l-3.5-2A.5.5 0 017 9V3.5a.5.5 0 01.5-.5z" clip-rule="evenodd"/>
                    </svg>
                </div>
                <div>
                    <h5>Lifetime access</h5>
                    <p>Learn on your schedule</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="bg-gray" id="learn-now">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-12 mb-5">
                <h3 class="bold"> Learn at your own pace anytime</h3>
            </div>

            <div class="col-sm-12 col-md-12 col-12">
            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    @foreach($categories as $key => $category)
                        <a class="nav-item nav-link {{ $key === $categories->keys()->first() ? 'active' : '' }}"
                            id="nav-{{$key}}-tab"
                            data-toggle="tab"
                            href="#nav-{{$key}}"
                            role="tab"
                            aria-controls="nav-{{$key}}"
                            aria-selected="true">
                            <h5>{{ $key }}</h5>
                        </a>
                    @endforeach
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                @foreach($categories as $key => $category)
                <div class="tab-pane fade show {{ $key === $categories->keys()->first() ? 'active' : '' }}" id="nav-{{$key}}" role="tabpanel" aria-labelledby="nav-{{$key}}-tab">
                        <div class="row mt-4">
                            @foreach($category as $cat)
                                @foreach($cat->subjects as $subject)
                                <div class="col-sm-6 col-md-6 col-lg-3 mb-3">
                                    <div class="card">
                                        <a href="{{ route('subjects.index', $subject->slug) }}" style="text-decoration: none">
                                            <img src="{{ $subject->image_thumb}}" alt="{{ $subject->very_short_title }}" width="100%" height="130">
                                        </a>
                                        <div class="card-body card-body_custom">
                                            <a href="{{ route('subjects.index', $subject->slug) }}" style="text-decoration: none" class="title-font">
                                                <span class="bold">{{ $subject->very_short_title }}</span><br />
                                                <span class="author-font">{{$subject->creator->name }}</span>
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
                                                @livewire('add-to-cart', [$subject], key($subject->id))
                                                @livewire('add-to-wish-list', [$subject], key($subject->id))
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            @endforeach
                        </div>
                </div>
                @endforeach
            </div>
        </div>
        </div>
    </div>
</section>

<section class="bg-white">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 mb-2">
                <h3 class="bold">Mosted viewed </h3>
            </div>
            @foreach($mostViewedSubjects as $subject)
            <div class="col-sm-6 col-md-6 col-lg-3">
                <div class="card mb-4">
                    <a href="{{ route('subjects.index', $subject->slug) }}" style="text-decoration: none">
                        <img src="{{ $subject->image_thumb}}" alt="{{ $subject->very_short_title }}" width="100%" height="130">
                    </a>
                    <div class="card-body card-body_custom">
                        <a href="{{ route('subjects.index', $subject->slug) }}" style="text-decoration: none" class="title-font">
                            <span class="bold">{{ $subject->very_short_title }}</span><br />
                            <span class="author-font">{{$subject->creator->name }}</span>
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
                            @livewire('add-to-cart', [$subject], key($subject->id))
                            @livewire('add-to-wish-list', [$subject], key($subject->id))
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<section class="bg-white" >
    <div class="bg-green pt-5 pb-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12 student-text">
                <h3 class="bold student-head-font">Start learning today</h3>
                <p class="mb-4 sub-text student-font">Tap from the experience of our hand picked best teachers around and ace that examination you have all been waiting to do.</p>
                @guest
                    <a id="round-button-2" href="{{ url('login') }}" class="btn btn-primary" name="button">Get started &raquo;</a>
                @endguest

                @if(auth()->user()->role == 1)
                    <a id="round-button-2" href="#learn-now" class="btn btn-primary" name="button">Get started &raquo;</a>
                @endif
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <img src="{{ asset('images/student.jpg') }}" alt="image thumb" class="student-image">
            </div>
        </div>
    </div>
    </div>
</section>

<section class="bg-white">
    @include('partials.categories')
</section>

<section class="bg-white">
    <div class="bg-blue-2 pt-5 pb-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12">
                <img src="{{ asset('images/teacher.jpg') }}" alt="image thumb" class="teacher-image">
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="mb-2">
                    <h3 class="bold">Become a teacher</h3>
                    <p class="mb-4 sub-text">Top teachers from the best, teaching millions of students. We provide the platform and tools so you can skill the students.</p>
                    @guest
                        <a id="round-button-2" href="{{ url('login') }}" class="btn btn-primary" name="button">Get started &raquo;</a>
                    @endguest

                    @if(auth()->user()->role == 1)
                        <a id="round-button-2" href="{{ route('subjects.starter') }}" class="btn btn-primary" name="button">Get started &raquo;</a>
                    @endif

                    @if(auth()->user()->role == 2)
                        <a id="round-button-2" href="{{ route('manage.subjects') }}" class="btn btn-primary" name="button">Get started &raquo;</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
    </div>
</section>

<section class="bg-white">
    <div class="container ">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <h3 class="bold mb-3">Our popular teachers</h3>
            </div>
            @foreach($teachers as $teacher)
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <a href="{{ route('teachers.index', $teacher->slug) }}" style="text-decoration:none;">
                        <div class="card mb-3" style="max-width: 400px;">
                            <div class="row no-gutters">
                                <div class="col-4">
                                    <img src="{{ asset('images/st_2.jpg') }}" class="card-img" width="100%" height="100%" alt="{{ $teacher->name }}">
                                </div>
                                <div class="col-8">
                                    <div class="card-body" style="padding: 0.7rem 0rem 0rem 1rem;">
                                        <span class="bold">{{ $teacher->name }}</span>
                                        <p>Mathematics</p>
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

<section class="faq">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-9 col-md-9 col-sm-12">
                <h3 class="bold">Frequently Asked Questions</h3>
            </div>
            <div class="col-lg-9 col-md-9 col-sm-12 mt-4 mb-5">
                <div class="accordion" id="accordionExample">
                  <div class="card mb-3">
                    <div class="card-header" id="headingOne">
                      <h2 class="mb-0">
                        <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne" style="text-decoration: none">
                            <div class="d-flex justify-content-between">
                                <div>
                                    Where do I take this course?
                                </div>
                                <div>
                                    <span class="icon">
                                        <svg width="1.2em" height="1.2em" viewBox="0 0 16 16" class="bi bi-chevron-down" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
                                        </svg>
                                    </span>
                                </div>
                            </div>
                        </button>
                      </h2>
                    </div>

                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                      <div class="card-body">
                        The course is completely online so you can partake whenever and wherever you would like (as long as you have internet access).
                      </div>
                    </div>
                  </div>

                  <div class="card mb-3">
                    <div class="card-header" id="headingTwo">
                      <h2 class="mb-0">
                        <button  class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo" style="text-decoration: none">
                            <div class="d-flex justify-content-between">
                                <div>
                                    Where is Coaching101 located?
                                </div>
                                <div>
                                    <span class="icon">
                                        <svg width="1.2em" height="1.2em" viewBox="0 0 16 16" class="bi bi-chevron-down" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
                                        </svg>
                                    </span>
                                </div>
                            </div>
                        </button>
                      </h2>
                    </div>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                      <div class="card-body">
                        Coaching101 has an office located in Kampala, Uganda.
                      </div>
                    </div>
                  </div>

                  <div class="card mb-3">
                    <div class="card-header" id="headingThree">
                      <h2 class="mb-0">
                        <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree" style="text-decoration: none">
                            <div class="d-flex justify-content-between">
                                <div>
                                    When does it begin?
                                </div>
                                <div>
                                    <span class="icon">
                                        <svg width="1.2em" height="1.2em" viewBox="0 0 16 16" class="bi bi-chevron-down" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
                                        </svg>
                                    </span>
                                </div>
                            </div>
                        </button>
                      </h2>
                    </div>
                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                      <div class="card-body">
                        Whenever you like! You will be given lifetime access to the material and can take at a pace that is right for you!
                      </div>
                    </div>
                  </div>

                  <div class="card mb-3">
                    <div class="card-header" id="headingFour">
                      <h2 class="mb-0">
                        <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour" style="text-decoration: none">
                            <div class="d-flex justify-content-between">
                                <div>
                                    How long does it take?
                                </div>
                                <div>
                                    <span class="icon">
                                        <svg width="1.2em" height="1.2em" viewBox="0 0 16 16" class="bi bi-chevron-down" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
                                        </svg>
                                    </span>
                                </div>
                            </div>

                        </button>
                      </h2>
                    </div>
                    <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
                      <div class="card-body">
                        The course is designed so you can take at a speed that is best for you. Most students will do it over 3-4 weeks and others will complete in a few days.
                      </div>
                    </div>
                  </div>

                  <div class="card mb-3">
                    <div class="card-header" id="headingFive">
                      <h2 class="mb-0">
                        <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive" style="text-decoration: none">
                            <div class="d-flex justify-content-between">
                                <div>
                                    Do you have a refund policy?
                                </div>
                                <div>
                                    <span class="icon">
                                        <svg width="1.2em" height="1.2em" viewBox="0 0 16 16" class="bi bi-chevron-down" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
                                        </svg>
                                    </span>
                                </div>
                            </div>
                        </button>
                      </h2>
                    </div>
                    <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionExample">
                      <div class="card-body">
                        Yes, if you are having issues accessing your course we will give you a full refund up to 48 hours after purchase.
                      </div>
                    </div>
                  </div>

                  <div class="card">
                    <div class="card-header" id="headingSix">
                      <h2 class="mb-0">
                        <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix" style="text-decoration: none">
                            <div class="d-flex justify-content-between">
                                <div>
                                    How do I sign up and pay?
                                </div>
                                <div>
                                    <span class="icon">
                                        <svg width="1.2em" height="1.2em" viewBox="0 0 16 16" class="bi bi-chevron-down" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
                                        </svg>
                                    </span>
                                </div>
                            </div>
                        </button>
                      </h2>
                    </div>
                    <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordionExample">
                      <div class="card-body">
                        Please follow the links under the courses to complete your payment.
                      </div>
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
</section>

@push('scripts')
    <script src="{{ asset('vendor/js/jquery.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/home.js')}}" type="text/javascript"></script>
@endpush

@endsection
