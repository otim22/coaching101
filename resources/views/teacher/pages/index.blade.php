<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <title>@yield('title') {{ config('app.name') }}</title>

      </head>
    <body>
        <div id="app">

            <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark-3 increased-font py-3">
                <div class="container-fluid" id="navbarSupportedContentOther">
                    <a class="navbar-brand mr-auto" href="{{ url('/') }}"><span class="logo-font">all cloud prep</span></a>
                    <span class="sm-search d-md-none" id="smSearch"> <a class="ml-auto hide-at-md mr-1" href="#" style="text-decoration: none;"> <i class="fas fa-search pointer"></i></a></span>
                    <div id="smCart" class="nav-item {{ InitialGenerator::set_active(['cart']) }} d-md-none">
                        <livewire:nav-cart />
                    </div>
                    @auth
                    <div  id="smInitials" class="nav-item dropdown d-md-none">
                        <a id="navbarDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            <div class="circle text-center">
                                <span class="circle__content">{{ InitialGenerator::generate_initials(Auth::user()->name) }}</span>
                            </div>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" id="customisedInitialDrop" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item d-flex" href="{{ route('users.profile') }}">
                                <div class="mr-2 pt-2">
                                    <div class="circle">
                                        <span class="circle__content">{{ InitialGenerator::generate_initials(Auth::user()->name) }}</span>
                                    </div>
                                </div>
                                <div class="mr-1">
                                    <p>{{ Auth::user()->name }} <br>
                                    {{ Auth::user()->email }}</p>
                                </div>
                             </a>

                            <div class="dropdown-divider"></div>

                            <a class="dropdown-item" href="{{ route('my-account') }}">My Account</a>
                            <a class="dropdown-item" href="{{ url('cart') }}">My Cart</a>
                            <a class="dropdown-item" href="{{ route('users.profile') }}">Profile Details</a>

                            <div class="dropdown-divider"></div>

                            <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" class="bold" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </div>
                    @endauth
                    <div class="search-bar" style="display: none !important;" id="search-bar">
                        <form action="{{ route('items') }}" method="GET" class="form-inline top-search">
                            <div class="input-group space-bottom">
                                <input type="text" name="query" class="form-control" placeholder="Search for content...">
                                <div class="input-group-append">
                                    <button class="btn btn-secondary" type="submit" id="top-search-button">
                                        <svg class="bi bi-search top-search-svg" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M10.442 10.442a1 1 0 011.415 0l3.85 3.85a1 1 0 01-1.414 1.415l-3.85-3.85a1 1 0 010-1.415z" clip-rule="evenodd"/>
                                            <path fill-rule="evenodd" d="M6.5 12a5.5 5.5 0 100-11 5.5 5.5 0 000 11zM13 6.5a6.5 6.5 0 11-13 0 6.5 6.5 0 0113 0z" clip-rule="evenodd"/>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <button class="navbar-toggler collapsed ml-3" id="navbarButtonToggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="my-1 mx-2 close">X</span>
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse topmenu navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto">
                            <ul class="navbar-nav">
                                <li class="nav-item dropdown">
                                    <a class="nav-link make-upper-case" href="#" id="navbarDropdownMenuLinkStart" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Start
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLinkStart">
                                        @guest
                                            <a class="dropdown-item" href="{{ route('login') }}">Learning</a>
                                            <a class="dropdown-item" href="{{ route('subjects.onBoard') }}">Teaching</a>
                                        @endguest
                                        <a class="dropdown-item d-none d-lg-block d-xl-none d-md-block d-lg-none" href="{{ route('donate.index') }}">Donate</a>
                                        @auth()
                                            <a class="dropdown-item" href="{{ route('home') }}">Learning</a>
                                            @if(Auth::user()->hasRole('student'))
                                                <a class="dropdown-item" href="{{ route('subjects.starter') }}">Apply To Teach</a>
                                            @elseif(Auth::user()->hasRole('teacher') || Auth::user()->hasRole('admin'))
                                                <a class="dropdown-item" href="{{ route('manage.subjects') }}">Teaching</a>
                                            @endif
                                        @endauth
                                    </div>
                                </li>
                            </ul>
                            <li class="nav-item hide-at-md d-lg-none d-xl-block {{ InitialGenerator::set_active(['donate.index']) }}">
                                <a class="nav-link make-upper-case" href="{{ route('donate.index') }}">donate</a>
                            </li>
                        </ul>

                        <ul class="navbar-nav ml-auto nav nav-pills">
                            <li class="nav-item">
                                <span class="badge badge-pill badge-light" style="margin-top: 13px;margin-right: 5px;">{{ $activeStandard->name }}</span>
            				</li>
                            <li id="cartId2" class="nav-item {{ InitialGenerator::set_active(['cart']) }} d-none d-md-block">
                                <livewire:nav-cart />
                            </li>

                            @guest
                                <li class="nav-item {{ InitialGenerator::set_active(['login']) }} mr-3 space-bottom">
                                    <a class="btn btn-danger btn-sm nav-link make-upper-case" id="round-button" href="{{ route('login') }}" style="color: white;font-weight: bold;">Login</a>
                                </li>
                                @if (Route::has('register'))
                                    <li class="nav-item {{ InitialGenerator::set_active(['register']) }} mr-2 hide-at-md">
                                        <a class="btn btn-outline-secondary btn-sm nav-link make-upper-case" id="round-button" href="{{ route('register') }}">Register</a>
                                    </li>
                                @endif
                                @else
                                    <li class="nav-item dropdown d-none d-md-block">
                                        <a id="navbarDropdown" class="nav-link d-block" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                            <div class="circle text-center">
                                                <span class="circle__content">{{ InitialGenerator::generate_initials(Auth::user()->name) }}</span>
                                            </div>
                                        </a>

                                        <div  id="customisedInitialDrop" class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item d-flex" href="{{ route('users.profile') }}">
                                                <div class="mr-2 pt-2">
                                                    <div class="circle">
                                                        <span class="circle__content">{{ InitialGenerator::generate_initials(Auth::user()->name) }}</span>
                                                    </div>
                                                </div>
                                                <div class="mr-1">
                                                    <p>{{ Auth::user()->name }} <br>
                                                    {{ Auth::user()->email }}</p>
                                                </div>
                                             </a>

                                            <div class="dropdown-divider"></div>

                                            <a class="dropdown-item" href="{{ route('my-account') }}">My Account</a>
                                            <a class="dropdown-item" href="{{ url('cart') }}">My Cart</a>
                                            <a class="dropdown-item" href="{{ route('users.profile') }}">Profile Details</a>

                                            <div class="dropdown-divider"></div>

                                            <a class="dropdown-item" href="{{ route('logout') }}"
                                                    onclick="event.preventDefault();
                                                             document.getElementById('logout-form').submit();">
                                                {{ __('Logout') }}
                                            </a>
                                            <form id="logout-form" class="bold" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                @csrf
                                            </form>
                                        </div>
                                    </li>
                                @endguest
                        </ul>
                    </div>
                </div>
            </nav>

            <section class="bg-teacher-image text-white mt-4">
                <div class="container mt-5">
                    <h1 class="display-3 learn-today_title">Inspire students</h1>
                    <h4 class="pt-3 pm-3 bold student-font">We beleive you are a gifted person who wants to serve </h4>
                    <h4 class="pt-3 pm-3 bold student-font">The world with your horned skills over the years.</h4>
                    <h4 class="pt-3 pm-3 bold student-font">Well, this platform provides you that opportunity to sale yourself. </h4>
                    <p>
                        @guest
                            <a id="round-button-2" class="btn btn-primary btn-lg mt-5" href="{{ route('subjects.starter') }}" role="button">Become a teacher today &raquo;</a>
                        @endguest
                        @auth
                            @if(Auth::user()->hasRole('student'))
                                <a id="round-button-2" class="btn btn-primary btn-lg mt-5" href="{{ route('subjects.starter') }}" role="button">Become a teacher today &raquo;</a>
                            @elseif(Auth::user()->hasRole('teacher'))
                                <a id="round-button-2" class="btn btn-primary btn-lg mt-5" href="{{ route('manage.subjects') }}" role="button">Manage your courses &raquo;</a>
                            @endif
                        @endauth
                    </p>
                </div>
            </section>

            <section class="bg-gray-2">
                <div class="container">
                    <div class="row">
                        <div class="col-12 text-center mb-5">
                            <h3 class="bold"> Tap into your potential</h3>
                        </div>
                        <div class="col-sm-12 col-md-4 col-lg-4 text-center">
                            <svg width="3em" height="3em" viewBox="0 0 16 16" class="bi bi-cash-stack mb-3" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path d="M14 3H1a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1h-1z"/>
                                <path fill-rule="evenodd" d="M15 5H1v8h14V5zM1 4a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1V5a1 1 0 0 0-1-1H1z"/>
                                <path d="M13 5a2 2 0 0 0 2 2V5h-2zM3 5a2 2 0 0 1-2 2V5h2zm10 8a2 2 0 0 1 2-2v2h-2zM3 13a2 2 0 0 0-2-2v2h2zm7-4a2 2 0 1 1-4 0 2 2 0 0 1 4 0z"/>
                            </svg>
                            <h4>Earn money</h4>
                            <p>Make money while seated at home by creating your own original courses on this platform and let the rest to us.</p>
                        </div>
                        <div class="col-sm-12 col-md-4 col-lg-4 text-center">
                            <svg width="3em" height="3em" viewBox="0 0 16 16" class="bi bi-people-fill mb-3" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm-5.784 6A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216zM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z"/>
                            </svg>
                            <h4>Inspire Students</h4>
                            <p>Millions of students globally looking for quality resources to learn, inspire them with your gifts today.</p>
                        </div>
                        <div class="col-sm-12 col-md-4 col-lg-4 text-center">
                            <svg width="3em" height="3em" viewBox="0 0 16 16" class="bi bi-globe2 mb-3" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm7.5-6.923c-.67.204-1.335.82-1.887 1.855-.143.268-.276.56-.395.872.705.157 1.472.257 2.282.287V1.077zM4.249 3.539a8.372 8.372 0 0 1-1.198-.49 7.01 7.01 0 0 1 2.276-1.52 6.7 6.7 0 0 0-.597.932 8.854 8.854 0 0 0-.48 1.079zM3.509 7.5H1.017A6.964 6.964 0 0 1 2.38 3.825c.47.258.995.482 1.565.667A13.4 13.4 0 0 0 3.508 7.5zm1.4-2.741c.808.187 1.681.301 2.591.332V7.5H4.51c.035-.987.176-1.914.399-2.741zM8.5 5.09V7.5h2.99a12.342 12.342 0 0 0-.399-2.741c-.808.187-1.681.301-2.591.332zM4.51 8.5H7.5v2.409c-.91.03-1.783.145-2.591.332a12.343 12.343 0 0 1-.4-2.741zm3.99 0v2.409c.91.03 1.783.145 2.591.332.223-.827.364-1.754.4-2.741H8.5zm-3.282 3.696A12.63 12.63 0 0 1 7.5 11.91v3.014c-.67-.204-1.335-.82-1.887-1.855a7.776 7.776 0 0 1-.395-.872zm.11 2.276a6.696 6.696 0 0 1-.598-.933 8.853 8.853 0 0 1-.481-1.079 8.38 8.38 0 0 0-1.198.49 7.01 7.01 0 0 0 2.276 1.522zm-1.383-2.964a9.083 9.083 0 0 0-1.565.667A6.963 6.963 0 0 1 1.018 8.5h2.49a13.36 13.36 0 0 0 .437 3.008zm6.728 2.964a7.009 7.009 0 0 0 2.275-1.521 8.376 8.376 0 0 0-1.197-.49 8.853 8.853 0 0 1-.481 1.078 6.688 6.688 0 0 1-.597.933zM8.5 11.909c.81.03 1.577.13 2.282.287-.12.312-.252.604-.395.872-.552 1.035-1.218 1.65-1.887 1.855V11.91zm3.555-.401c.57.185 1.095.409 1.565.667A6.963 6.963 0 0 0 14.982 8.5h-2.49a13.36 13.36 0 0 1-.437 3.008zM14.982 7.5h-2.49a13.361 13.361 0 0 0-.437-3.008 9.123 9.123 0 0 0 1.565-.667A6.963 6.963 0 0 1 14.982 7.5zM11.27 2.461c.177.334.339.694.482 1.078a8.368 8.368 0 0 0 1.196-.49 7.01 7.01 0 0 0-2.275-1.52c.218.283.418.597.597.932zm-.488 1.343c-.705.157-1.473.257-2.282.287V1.077c.67.204 1.335.82 1.887 1.855.143.268.276.56.395.872z"/>
                            </svg>
                            <h4>Join our community</h4>
                            <p>We have a great support community willing to help you at anytime you need one, feel free to reach out don't get stuck.</p>
                        </div>
                    </div>
                </div>
            </section>

            <section class="three bg-gray">
                <div class="container">
                    <div class="row">
                        <div class="col-12 text-center mb-5">
                            <h3 class="bold">Exceptional opportunities</h3>
                        </div>
                        <div class="col-sm-12 col-md-3 col-lg-3 text-center">
                            <h4>60K+ </h4>
                            <h5  class="bold">Students</h5 >
                        </div>
                        <div class="col-sm-12 col-md-3 col-lg-3 text-center">
                            <h4>800+ </h4>
                            <h5  class="bold">Topics</h5 >
                        </div>
                        <div class="col-sm-12 col-md-3 col-lg-3 text-center">
                            <h4>100+ </h4>
                            <h5  class="bold">Schools</h5 >
                        </div>
                        <div class="col-sm-12 col-md-3 col-lg-3 text-center">
                            <h4>500K+ </h4>
                            <h5 class="bold">Audiences</h5>
                        </div>
                    </div>
                </div>
            </section>

            <section class="bg-white">
                <div class="container">
                    <div class="row">
                        <div class="col-12 text-center mb-5">
                            <h3 class="bold">Your process flow</h3>
                        </div>
                        <div class="col-sm-12 col-md-4 col-lg-4 text-center">
                            <span>
                                <svg width="3em" height="3em" viewBox="0 0 16 16" class="bi bi-calendar2-week mb-3" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM2 2a1 1 0 0 0-1 1v11a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1H2z"/>
                                    <path d="M2.5 4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H3a.5.5 0 0 1-.5-.5V4zM11 7.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm-3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm-5 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1z"/>
                                </svg>
                            </span>
                            <h4> 1) Plan your course</h4>
                            <p>Have a defined set of steps to record your course into small modular units.</p>
                        </div>
                        <div class="col-sm-12 col-md-4 col-lg-4 text-center">
                            <span>
                                <svg width="3em" height="3em" viewBox="0 0 16 16" class="bi bi-camera-video mb-3" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M0 5a2 2 0 0 1 2-2h7.5a2 2 0 0 1 1.983 1.738l3.11-1.382A1 1 0 0 1 16 4.269v7.462a1 1 0 0 1-1.406.913l-3.111-1.382A2 2 0 0 1 9.5 13H2a2 2 0 0 1-2-2V5zm11.5 5.175l3.5 1.556V4.269l-3.5 1.556v4.35zM2 4a1 1 0 0 0-1 1v6a1 1 0 0 0 1 1h7.5a1 1 0 0 0 1-1V5a1 1 0 0 0-1-1H2z"/>
                                </svg>
                            </span>
                            <h4> 2) Record it</h4>
                            <p>With a plan in place, start the recording process of your content to a full course.</p>
                        </div>
                        <div class="col-sm-12 col-md-4 col-lg-4 text-center">
                            <span>
                                <svg width="3em" height="3em" viewBox="0 0 16 16" class="bi bi-people mb-3" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8zm-7.978-1h7.956a.274.274 0 0 0 .014-.002l.008-.002c-.002-.264-.167-1.03-.76-1.72C13.688 10.629 12.718 10 11 10c-1.717 0-2.687.63-3.24 1.276-.593.69-.759 1.457-.76 1.72a1.05 1.05 0 0 0 .022.004zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0zM6.936 9.28a5.88 5.88 0 0 0-1.23-.247A7.35 7.35 0 0 0 5 9c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816zM4.92 10c-1.668.02-2.615.64-3.16 1.276C1.163 11.97 1 12.739 1 13h3c0-1.045.323-2.086.92-3zM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0zm3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4z"/>
                                </svg>
                            </span>
                            <h4> 3) Build a community</h4>
                            <p>After recoding, publish your course and build a community around your product.</p>
                        </div>
                    </div>
                </div>
            </section>

            <section class="bg-gray">
                <div class="container">
                    <div class="row text-center">
                        <div class="col-12 text-center">
                            <h3 class="bold">Become a techer today.</h3>
                            <h5 class="mb-4 mt-4">Top teachers from the best, teaching millions of students. <br /> We provide the platform and tools so you can skill the students.</h5>
                            @guest
                                <a id="round-button-2" class="btn btn-primary mt-5" href="{{ route('subjects.starter') }}" role="button">Become a teacher today &raquo;</a>
                            @endguest
                            @auth
                                @if(Auth::user()->hasRole('student'))
                                    <a id="round-button-2" class="btn btn-primary mt-5" href="{{ route('subjects.starter') }}" role="button">Become a teacher today &raquo;</a>
                                @elseif(Auth::user()->hasRole('teacher'))
                                    <a id="round-button-2" class="btn btn-primary mt-5" href="{{ route('manage.subjects') }}" role="button">Manage your courses  &raquo;</a>
                                @endif
                            @endauth
                        </div>
                    </div>
                </div>
            </section>

            @include('layouts.partials.footer')
        </div>
        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
