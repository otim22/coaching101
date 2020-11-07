@extends('layouts.app')

@section('content')

<section class="bg-image text-white one">
    <div class="container">
        <div class="row mt-5">
            <div class="col-12">
                <h1 class="display-3  mt-5">Learn today</h1>
            </div>
            <div class="col-12">
                <h4 class="pt-3 pm-3">
                    At your own convenience, <br />
                    From seasoned teachers around.
                </h4>
            </div>
            <div class="col-12">
                <p><a id="round-button-2" class="btn btn-primary btn-lg mt-5" href="{{ route('home') }}" role="button">Start Learning &raquo;</a></p>
            </div>
        </div>
    </div>
</section>

<section class="bg-gray-2  background-style two">
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

<section class="three">
    <div class="container">
    <div class="row">
        <div class="col-sm-12 col-md-12 col-12 mb-5">
            <h3> Learn at your own pace anytime</h3>
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
                                <div class="col-sm-6 col-md-6 col-lg-3">
                                    <a href="{{ route('subjects.getSubjects', $cat->slug) }}" style="text-decoration: none">
                                        <div class="card shadow-sm">
                                            <img src="{{ $cat->image_thumb}}" alt="image thumb" height="160">
                                             <div class="card-body">
                                                 <p>{{ $cat->very_short_title }}</p>
                                                 <p>{{$cat->creator->name }}</p>
                                                 <svg class="bi bi-star-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                     <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.283.95l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                                 </svg>
                                                 <svg class="bi bi-star-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                     <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.283.95l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                                 </svg>
                                                 <svg class="bi bi-star-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                     <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.283.95l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                                 </svg>
                                                 <svg class="bi bi-star-half" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                  <path fill-rule="evenodd" d="M5.354 5.119L7.538.792A.516.516 0 018 .5c.183 0 .366.097.465.292l2.184 4.327 4.898.696A.537.537 0 0116 6.32a.55.55 0 01-.17.445l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256a.519.519 0 01-.146.05c-.341.06-.668-.254-.6-.642l.83-4.73L.173 6.765a.55.55 0 01-.171-.403.59.59 0 01.084-.302.513.513 0 01.37-.245l4.898-.696zM8 12.027c.08 0 .16.018.232.056l3.686 1.894-.694-3.957a.564.564 0 01.163-.505l2.906-2.77-4.052-.576a.525.525 0 01-.393-.288L8.002 2.223 8 2.226v9.8z" clip-rule="evenodd"/>
                                              </svg> <span class="mt-4">(1000)</span>
                                             </div>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

<section class="bg-gray-2 four">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 mb-2">
                <h2>Mosted viewed </h2>
            </div>
            @foreach($mostViewedSubjects as $mostViewedSubject)
            <div class="col-sm-6 col-md-6 col-lg-3">
                <a href="{{ route('subjects.show', $mostViewedSubject->slug) }}" style="text-decoration: none">
                    <div class="card mb-4 shadow-sm">
                        <img src="{{ $cat->image_thumb}}" alt="image thumb" width="100%" height="150">
                        <div class="card-body">
                            <p>{{ $mostViewedSubject->subject_title }}</p>
                            <svg class="bi bi-star-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.283.95l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                            </svg>
                            <svg class="bi bi-star-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.283.95l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                            </svg>
                            <svg class="bi bi-star-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.283.95l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                            </svg>
                            <svg class="bi bi-star-half" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                             <path fill-rule="evenodd" d="M5.354 5.119L7.538.792A.516.516 0 018 .5c.183 0 .366.097.465.292l2.184 4.327 4.898.696A.537.537 0 0116 6.32a.55.55 0 01-.17.445l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256a.519.519 0 01-.146.05c-.341.06-.668-.254-.6-.642l.83-4.73L.173 6.765a.55.55 0 01-.171-.403.59.59 0 01.084-.302.513.513 0 01.37-.245l4.898-.696zM8 12.027c.08 0 .16.018.232.056l3.686 1.894-.694-3.957a.564.564 0 01.163-.505l2.906-2.77-4.052-.576a.525.525 0 01-.393-.288L8.002 2.223 8 2.226v9.8z" clip-rule="evenodd"/>
                         </svg>(1000)
                         <p class="card-text mt-2">{{$cat->creator->name }}</p>
                        </div>
                      </div>
                </a>
            </div>
            @endforeach
        </div> <!-- /container -->
    </div>
</section>

<section class="five">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 text-center">
                <h3>Start learning from the best teachers</h3>
                <p>Ace your examinations</p>
                <a id="round-button-2" href="{{ url('login') }}" class="btn btn-primary" name="button">Get started</a>
            </div>
        </div>
    </div>
</section>

<section class="bg-gray-2 six">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <h2>Top categories</h2>
            </div>
        </div>
        <div class="row">
            @foreach($topCategories as $topCategory)
            <div class="col-sm-6 col-md-4 col-lg-2 mt-3">
                <a href="#" style="text-decoration: none">
                    <div class="card make-it-slow">
                        <div class="text-center pt-3">
                            <p class="increased-font">{{ $topCategory }}</p>
                        </div>
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
            <div class="col-sm-12 col-md-5 col-lg-5 text-center">
                <h3>Get subjects from top teachers</h3>
                <p>Find top teachers from around the best teaching millions of fellow students on Coaching101. Get inspired to learn, grow and share with the world.</p>
                <a id="round-button-2" href="{{ url('login') }}" class="btn btn-primary" name="button">Start learning</a>
            </div>
            <div class="col-md-2 col-lg-2">
                <div class="header-divider"></div>
            </div>
            <div class="col-sm-12 col-md-5 col-lg-5 text-center coach">
                <h3>Become a teacher</h3>
                <p>Top teachers from best teaching millions of students on Coaching101. We provide the platform and tools so you can skill the students.</p>
                <a id="round-button-2" href="{{ url('login') }}" class="btn btn-primary" name="button">Start teaching</a>
            </div>
        </div>
    </div>
</section>
@endsection
