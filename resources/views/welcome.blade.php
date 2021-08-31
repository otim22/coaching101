@extends('layouts.app')

@section('content')
<!-- Start jumbotron-->
<section class="small-screen_padding text-white mt-4" style="background: linear-gradient(to right, rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.1)), url({{ $sliders->getFirstMediaUrl() }}); width: 100%; height: 100vh; background-attachment: fixed; background-position: center; background-repeat: no-repeat; background-size: cover; opacity: 1; filter: alpha(opacity=100);">
    <div class="container">
        <div class="row mt-5 pt-4 mb-5">
            <div class="col-lg-6 col-md-8 col-sm-12">
                <div class="learn-today mb-5">
                    <h1 class="display-3 learn-today_title">{{ $sliders->title }}</h1>
                    <h4 class="pt-3 bold student-font">{!! $sliders->description !!}</h4>
                    @guest
                        <p><a id="round-button-2" class="btn btn-danger btn-lg mt-5" href="{{ route('login') }}" role="button">{{ $sliders->button_text }} &raquo;</a></p>
                    @endguest

                    @auth
                        @if(Auth::user()->hasRole('student'))
                            <p><a id="round-button-2" class="btn btn-danger btn-lg get-started_student mt-5" href="#learn-now" role="button">{{ $sliders->button_text }} &raquo;</a></p>
                        @endif
                        @if(Auth::user()->hasRole('teacher'))
                            <p><a id="round-button-2" class="btn btn-danger btn-lg mt-5" href="{{ route('manage.subjects') }}" role="button">{{ $sliders->button_text }} &raquo;</a></p>
                        @endif
                        @if(Auth::user()->hasRole('admin'))
                            <p><a id="round-button-2" class="btn btn-danger btn-lg mt-5" href="{{ route('manage.subjects') }}" role="button">{{ $sliders->button_text }} &raquo;</a></p>
                        @endif
                    @endauth
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End jumbotron-->

<!-- Start selling points-->
<section class="bg-gray-2 background-style">
    <div class="container">
        <div class="row mb-5">
            <div class="col-sm-12 col-md-6 col-lg-4 d-flex">
                <img src="{{ asset('images/class2.png') }}" alt="" class="pr-4" width="30%" height="auto">
                <div class="bottom-spacing mt-2">
                    <h5 class="bold">Online Classes</h5>
                    <p>Discover varied topics</p>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-4 d-flex">
                <img src="{{ asset('images/expert2.png') }}" alt="" class="pr-4" width="30%" height="auto">
                <div class="bottom-spacing mt-2">
                    <h5 class="bold">Expert Teachers</h5>
                    <p>Connect with right teachers</p>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-4 d-flex">
                <img src="{{ asset('images/timetable.png') }}" alt="" class="pr-4" width="30%" height="auto">
                <div class="mt-2">
                    <h5 class="bold">Access Time </h5>
                    <p>Learn on your schedule</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End selling points-->

<!-- Start to learn-->
<section class="small-screen_padding" id="learn-now">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-12 mb-4">
                <h4 class="bold dark-blue_color-2"> At your own convience start learning</h4>
            </div>
            <div class="col-sm-12 col-md-12 col-12">
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        @foreach($categories as $key => $category)
                            <a class="nav-item nav-link {{ $key == $categories->keys()->first() ? 'active' : '' }}"
                                id="nav-{{ Str::slug($category->name) }}-tab"
                                data-toggle="tab"
                                href="#{{ Str::slug($category->name) }}"
                                role="tab"
                                aria-controls="nav-{{ Str::slug($category->name) }}">
                                <h6 class="bold">{{ $category->name }} </h6>
                            </a>
                        @endforeach
                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                    @foreach($categories as $key => $category)
                        <div class="tab-pane fade show {{ $key == $categories->keys()->first() ? 'active' : '' }}"
                                id="{{ Str::slug($category->name) }}"
                                role="tabpanel">
                            <div class="row mt-4">
                                @foreach($category->itemContents as $subject)
                                    <div class="col-sm-6 col-md-6 col-lg-3 mb-4">
                                        <div class="card">
                                            <a href="{{ route('subjects.index', $subject->slug) }}" style="text-decoration: none">
                                                <img src="{{ $subject->cover_image }}" alt="{{ $subject->very_short_title }}" width="100%" height="150">
                                            </a>
                                            <div class="card-body">
                                                <a href="{{ route('subjects.index', $subject->slug) }}" style="text-decoration: none" class="title-font">
                                                    <span class="bold">{{ $subject->very_short_title }}</span><br />
                                                    <span class="author-font">{{$subject->creator->name }}</span><br />
                                                    @if($subject->averageRating)
                                                        <div class="star-display">
                                                            @for($i = $subject->averageRating; $i >= 1; $i--)
                                                                <label for="rate-{{$i}}" class="fa fa-star"></label>
                                                            @endfor
                                                            @if($subject->isSubscribedTo)
                                                                <span class="author-font ml-2">({{ $subject->subscriptionCount }}) students</span><br />
                                                            @endif
                                                        </div>
                                                    @else
                                                        <div class="rating">
                                                            @for($i = 0; $i < 5; $i++)
                                                                <svg class="bi bi-star-fill" width="0.7em" height="0.7em" viewBox="0 0 16 16" fill="grey" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.283.95l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                                                </svg>
                                                            @endfor
                                                            @if($subject->isSubscribedTo)
                                                                <span class="author-font ml-2">({{ $subject->subscriptionCount }}) students</span><br />
                                                            @endif
                                                        </div>
                                                    @endif

                                                    @if($subject->price)
                                                        @if($subject->isSubscribedTo)
                                                            <span class="author-font">{{ $subject->currency->name }} {{  $subject->formatPrice }}/- (Paid)</span></span>
                                                        @else
                                                            <span class="bold">{{ $subject->currency->name }} {{  $subject->formatPrice }}/-</span>
                                                        @endif
                                                    @else
                                                        <span class="bold paid_color">Free</span>
                                                    @endif
                                                </a>
                                                <div class="mt-2 d-flex justify-content-between">
                                                    @if($subject->isSubscribedTo)
                                                        <a id="round-button-2" class="btn btn-sm btn-outline-primary" href="{{ route('subjects.index', $subject) }}" style="text-decoration: none;">Start learning</a>
                                                    @else
                                                        <livewire:add-to-cart :subject="$subject" />
                                                        <livewire:add-to-wish-list :subject="$subject" />
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Start learn-->

<!-- Start most viewed subjects-->
<section class="small-screen_padding bg-white">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 mb-4">
                <h4 class="bold dark-blue_color-2">Mosted viewed </h4>
            </div>
            @foreach($mostViewedSubjects as $subject)
                <div class="col-sm-6 col-md-6 col-lg-3">
                    <div class="card mb-4">
                        <a href="{{ route('subjects.index', $subject->slug) }}" style="text-decoration: none">
                            <img src="{{ $subject->getFirstMediaUrl('cover_images') }}" alt="{{ $subject->very_short_title }}" width="100%" height="150">
                        </a>
                        <div class="card-body">
                            <a href="{{ route('subjects.index', $subject->slug) }}" style="text-decoration: none" class="title-font">
                                <span class="bold">{{ $subject->very_short_title }}</span><br />
                                <span class="author-font">{{$subject->creator->name }}</span><br />
                                @if($subject->averageRating)
                                    <div class="star-display">
                                        @for($i = $subject->averageRating; $i >= 1; $i--)
                                            <label for="rate-{{$i}}" class="fa fa-star"></label>
                                        @endfor
                                        @if($subject->isSubscribedTo)
                                            <span class="author-font ml-2">({{ $subject->subscriptionCount }}) students</span><br />
                                        @endif
                                    </div>
                                @else
                                    <div class="rating">
                                        @for($i = 0; $i < 5; $i++)
                                            <svg class="bi bi-star-fill" width="0.7em" height="0.7em" viewBox="0 0 16 16" fill="grey" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.283.95l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                            </svg>
                                        @endfor
                                        @if($subject->isSubscribedTo)
                                            <span class="author-font ml-2">({{ $subject->subscriptionCount }}) students</span><br />
                                        @endif
                                    </div>
                                @endif

                                @if($subject->price)
                                    @if($subject->isSubscribedTo)
                                        <span class="author-font">{{ $subject->currency->name }} {{  $subject->formatPrice }}/- (Paid)</span></span>
                                    @else
                                        <span class="bold">{{ $subject->currency->name }} {{  $subject->formatPrice }}/-</span>
                                    @endif
                                @else
                                    <span class="bold">Free</span>
                                @endif
                            </a>
                            <div class="mt-2 d-flex justify-content-between">
                                @if($subject->isSubscribedTo)
                                    <a  id="round-button-2" class="btn btn-sm btn-outline-primary" href="{{ route('subjects.index', $subject) }}" style="text-decoration: none;">Start learning</a>
                                @else
                                    <livewire:add-to-cart :subject="$subject" :key="$subject->id" />
                                    <livewire:add-to-wish-list :subject="$subject" :key="$subject->id" />
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
<!-- End most viewed subjects-->

<!-- Start student Image-->
<section class="bg-white small-screen_profile" >
    <div class="bg-green pt-5 pb-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12 student-text">
                <h4 class="bold student-head-font">{{ $studentImage->title }}</h4>
                <p class="mb-4 sub-text student-font">{{ $studentImage->description }}</p>
                @guest
                    <a id="round-button-2" href="{{ url('login') }}" class="btn btn-primary" name="button">{{ $studentImage->button_text }} &raquo;</a>
                @endguest

                @auth
                    <a id="round-button-2" href="#learn-now" class="btn btn-primary" name="button">{{ $studentImage->button_text }} &raquo;</a>
                @endauth
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <img src="{{ asset($studentImage->getFirstMediaUrl()) }}" alt="image thumb" class="student-image">
            </div>
        </div>
    </div>
    </div>
</section>
<!-- End student Image-->

<!-- Start Categories-->
<section class="smaller-screen_padding bg-white">
    @include('partials.categories')
</section>
<!-- End Categories-->

<!-- Start teacher Image-->
<section class="bg-white small-screen_profile">
    <div class="bg-blue-2 pt-5 pb-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12">
            <img src="{{ asset($teacherImage->getFirstMediaUrl()) }}" alt="teacher thumb" class="teacher-image">
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 text-white">
                <div class="mb-2">
                    <h4 class="bold">{{ $teacherImage->title }}</h4>
                    <p class="mb-4 sub-text">{{ $teacherImage->description }}</p>
                    @guest
                        <a id="round-button-2" href="{{ url('login') }}" class="btn btn-light" name="button">{{ $teacherImage->button_text }} &raquo;</a>
                    @endguest

                    @auth
                        @if(Auth::user()->hasRole('student'))
                            <a id="round-button-2" href="{{ route('subjects.starter') }}" class="btn btn-light" name="button">{{ $teacherImage->button_text }} &raquo;</a>
                        @endif

                        @if(Auth::user()->hasRole('teacher'))
                            <a id="round-button-2" href="{{ route('manage.subjects') }}" class="btn btn-light" name="button">{{ $teacherImage->button_text }} &raquo;</a>
                        @endif

                        @if(Auth::user()->hasRole('admin'))
                            <a id="round-button-2" href="{{ route('manage.subjects') }}" class="btn btn-light" name="button">{{ $teacherImage->button_text }} &raquo;</a>
                        @endif
                    @endauth
                </div>
            </div>
        </div>
    </div>
    </div>
</section>
<!-- End teacher Image-->

<!-- Start Top teacher-->
<section class="small-screen_padding bg-white">
    @include('partials.teachers')
</section>
<!-- End teacher-->

<!-- Start FAQ-->
<section class="small-screen_padding bg-gray-2">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-9 col-md-9 col-sm-12">
                <h4 class="bold dark-blue_color-2">Frequently Asked Questions</h4>
            </div>
            <div class="col-lg-9 col-md-9 col-sm-12 mt-4">
                <div class="accordion" id="accordionExample">
                    @foreach($faqs as $faq)
                        <div class="card mb-3">
                            <div class="card-header" id="heading{{$faq->id}}" style="padding: 6px;">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapse{{$faq->id}}" aria-expanded="true" aria-controls="collapse{{$faq->id}}" style="text-decoration: none;">
                                        <div class="d-flex justify-content-between">
                                            <div class="bold">
                                                {{ $faq->title }}
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

                            <div id="collapse{{$faq->id}}" class="collapse {{ $faq->id === 1 ? 'show' : '' }}" aria-labelledby="heading{{$faq->id}}" data-parent="#accordionExample">
                                <div class="card-body">
                                    {{ $faq->description }}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End FAQ-->
@endsection

@push('scripts')
    <script src="{{ asset('js/tab_selection.js')}}" type="text/javascript"></script>
    <script src="{{ asset('js/home.js')}}" type="text/javascript"></script>
@endpush
