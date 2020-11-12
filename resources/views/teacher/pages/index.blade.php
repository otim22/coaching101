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

            <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark-2 increased-font py-3">
                <div class="container-fluid ml-4 mr-4">
                    <a class="navbar-brand" href="{{ url('/') }}"><span class="logo-font">Coaching101</span></a>
                    <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item dropdown">
                                <a class="nav-link" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <svg class="bi bi-grid-3x3-gap-fill mr-1" width="1.3em" height="1.3em" viewBox="1 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M1 2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 01-1 1H2a1 1 0 01-1-1V2zm5 0a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 01-1 1H7a1 1 0 01-1-1V2zm5 0a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 01-1 1h-2a1 1 0 01-1-1V2zM1 7a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 01-1 1H2a1 1 0 01-1-1V7zm5 0a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 01-1 1H7a1 1 0 01-1-1V7zm5 0a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 01-1 1h-2a1 1 0 01-1-1V7zM1 12a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 01-1 1H2a1 1 0 01-1-1v-2zm5 0a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 01-1 1H7a1 1 0 01-1-1v-2zm5 0a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 01-1 1h-2a1 1 0 01-1-1v-2z"/>
                                    </svg>
                                    Library
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                    @foreach ($menus as $menu)
                                        <ul class="dropdown-submenu">
                                            <a class="dropdown-item" href="#">{{ $menu->title }}</a>
                                            <li class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                                @foreach ($menu->allChildren as $childMenu)
                                                    <ul class="dropdown-submenu">
                                                        <a class="dropdown-item" href="#">{{ $childMenu->title }}</a>
                                                        <li class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                                            @foreach ($childMenu['allChildren'] as $child)
                                                                <a class="dropdown-item" href="#">{{ $child->title }}</a>
                                                            @endforeach
                                                        </li>
                                                    </ul>
                                                @endforeach
                                            </li>
                                        </ul>
                                    @endforeach
                                </div>
                            </li>
                        </ul>

                        <form action="" class="form-inline top-search">
                            <div class="input-group space-bottom">
                                <input type="text" class="form-control" placeholder="Search for subject...">
                                <div class="input-group-append">
                                    <button class="btn btn-secondary" type="button" id="top-search-button">
                                        <svg class="bi bi-search top-search-svg" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M10.442 10.442a1 1 0 011.415 0l3.85 3.85a1 1 0 01-1.414 1.415l-3.85-3.85a1 1 0 010-1.415z" clip-rule="evenodd"/>
                                            <path fill-rule="evenodd" d="M6.5 12a5.5 5.5 0 100-11 5.5 5.5 0 000 11zM13 6.5a6.5 6.5 0 11-13 0 6.5 6.5 0 0113 0z" clip-rule="evenodd"/>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </form>

                        <ul class="navbar-nav ml-auto nav nav-pills">
                            @guest
                                <li class="nav-item {{ Helper::set_active(['subjects.starter']) }}  d-none d-lg-block mt-1">
                                    <a class="nav-link" href="{{ route('subjects.starter') }}">Teach Here</a>
                                </li>
                            @endguest

                            @auth()
                                @if(auth()->user()->role == 1)
                                    <li class="nav-item {{ Helper::set_active(['subjects.starter']) }}  d-none d-lg-block mt-1">
                                        <a class="nav-link" href="{{ route('subjects.starter') }}">Teach Here</a>
                                    </li>
                                    <li class="nav-item mt-1">
                                        <a class="nav-link" href="{#">My subjects</a>
                                    </li>
                                @elseif(auth()->user()->role == 2)
                                    <li class="nav-item {{ Helper::set_active(['manage.subjects']) }} mt-1">
                                        <a class="nav-link" href="{{ route('manage.subjects') }}">Teacher</a>
                                    </li>

                                    <li class="nav-item {{ Helper::set_active(['manage.subjects']) }} mt-1">
                                        <a class="nav-link" href="{{ route('manage.subjects') }}">My subjects</a>
                                    </li>
                                @endif
                            @endauth

                            <li id="cartId2" class="nav-item {{ Helper::set_active(['cart']) }} mt-1">
                                <a class="nav-link" href="#">
                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-cart4" fill="green" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l.5 2H5V5H3.14zM6 5v2h2V5H6zm3 0v2h2V5H9zm3 0v2h1.36l.5-2H12zm1.11 3H12v2h.61l.5-2zM11 8H9v2h2V8zM8 8H6v2h2V8zM5 8H3.89l.5 2H5V8zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z"/>
                                    </svg>
                                </a>
                            </li>

                            @guest
                            <li class="nav-item {{ Helper::set_active(['login']) }} mt-1 mr-2 space-bottom">
                                <a class="btn btn-primary btn-sm nav-link bold" href="{{ route('login') }}">Login</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item {{ Helper::set_active(['register']) }} mt-1 mr-2">
                                    <a class="btn btn-outline-secondary btn-sm nav-link bold" href="{{ route('register') }}">Register</a>
                                </li>
                            @endif
                            @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <div class="rounded-initials text-center">
                                        <span class="initial-text"><h5>{{ Helper::generate_initials(Auth::user()->name) }}</h5></span>
                                    </div>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item d-flex" href="{{ route('edit-profile') }}">
                                        <div class="mr-2">
                                            <div class="rounded-initials text-center">
                                                <span class="initial-text"><h5>{{ Helper::generate_initials(Auth::user()->name) }}</h5></span>
                                            </div>
                                        </div>
                                        <div class="mr-1">
                                            <p>{{ Auth::user()->name }} <br>
                                            {{ Auth::user()->email }}</p>
                                        </div>
                                     </a>

                                    <div class="dropdown-divider"></div>

                                    <a class="dropdown-item" href="{{ route('accounts') }}">My courses</a>
                                    <a class="dropdown-item" href="{{ route('accounts') }}">My cart</a>

                                    <div class="dropdown-divider"></div>

                                    <a class="dropdown-item" href="{{ route('accounts') }}">Account settings</a>
                                    <a class="dropdown-item" href="{{ route('accounts') }}">Payment methods</a>
                                    <a class="dropdown-item" href="{{ route('accounts') }}">Edit profile</a>

                                    <div class="dropdown-divider"></div>

                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </nav>

            <section class="bg-teacher-image text-white">
                <div class="mt-5">
                    <div class="container">
                        <h1 class="display-3 learn-today_title">Inspire students</h1>
                        <h4 class="pt-3 pm-3 bold student-font">This is a template for a simple marketing or informational website.</h4>
                        <h4 class="pt-3 pm-3 bold student-font">It includes a large callout called a jumbotron and three supporting pieces of content.</h4>
                        <p>
                            @if(Auth::user()->role == 1)
                                <a id="round-button-2" class="btn btn-primary btn-lg mt-5" href="{{ route('subjects.starter') }}" role="button">Become a teacher &raquo;</a>
                            @elseif(Auth::user()->role == 2)
                                <a id="round-button-2" class="btn btn-primary btn-lg mt-5" href="{{ route('manage.subjects') }}" role="button">Become a teacher &raquo;</a>
                            @endif
                        </p>
                    </div>
                </div>
            </section>

            <section class="bg-gray-2">
                <div class="container">
                    <div class="row">
                        <div class="col-12 text-center mb-4">
                            <h3 class="bold"> Tap into your potential</h3>
                        </div>
                        <div class="col-sm-12 col-md-4 col-lg-4 text-center">
                            <svg width="3em" height="3em" viewBox="0 0 16 16" class="bi bi-cash-stack mb-3" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path d="M14 3H1a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1h-1z"/>
                                <path fill-rule="evenodd" d="M15 5H1v8h14V5zM1 4a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1V5a1 1 0 0 0-1-1H1z"/>
                                <path d="M13 5a2 2 0 0 0 2 2V5h-2zM3 5a2 2 0 0 1-2 2V5h2zm10 8a2 2 0 0 1 2-2v2h-2zM3 13a2 2 0 0 0-2-2v2h2zm7-4a2 2 0 1 1-4 0 2 2 0 0 1 4 0z"/>
                            </svg>
                            <h4>Earn money</h4>
                            <p>This is a template for a simple marketing or informational website. It includes a large callout called a jumbotron and three supporting pieces of content.</p>
                        </div>
                        <div class="col-sm-12 col-md-4 col-lg-4 text-center">
                            <svg width="3em" height="3em" viewBox="0 0 16 16" class="bi bi-people-fill mb-3" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm-5.784 6A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216zM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z"/>
                            </svg>
                            <h4>Inspire Students</h4>
                            <p>This is a template for a simple marketing or informational website. It includes a large callout called a jumbotron and three supporting pieces of content.</p>
                        </div>
                        <div class="col-sm-12 col-md-4 col-lg-4 text-center">
                            <svg width="3em" height="3em" viewBox="0 0 16 16" class="bi bi-globe2 mb-3" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm7.5-6.923c-.67.204-1.335.82-1.887 1.855-.143.268-.276.56-.395.872.705.157 1.472.257 2.282.287V1.077zM4.249 3.539a8.372 8.372 0 0 1-1.198-.49 7.01 7.01 0 0 1 2.276-1.52 6.7 6.7 0 0 0-.597.932 8.854 8.854 0 0 0-.48 1.079zM3.509 7.5H1.017A6.964 6.964 0 0 1 2.38 3.825c.47.258.995.482 1.565.667A13.4 13.4 0 0 0 3.508 7.5zm1.4-2.741c.808.187 1.681.301 2.591.332V7.5H4.51c.035-.987.176-1.914.399-2.741zM8.5 5.09V7.5h2.99a12.342 12.342 0 0 0-.399-2.741c-.808.187-1.681.301-2.591.332zM4.51 8.5H7.5v2.409c-.91.03-1.783.145-2.591.332a12.343 12.343 0 0 1-.4-2.741zm3.99 0v2.409c.91.03 1.783.145 2.591.332.223-.827.364-1.754.4-2.741H8.5zm-3.282 3.696A12.63 12.63 0 0 1 7.5 11.91v3.014c-.67-.204-1.335-.82-1.887-1.855a7.776 7.776 0 0 1-.395-.872zm.11 2.276a6.696 6.696 0 0 1-.598-.933 8.853 8.853 0 0 1-.481-1.079 8.38 8.38 0 0 0-1.198.49 7.01 7.01 0 0 0 2.276 1.522zm-1.383-2.964a9.083 9.083 0 0 0-1.565.667A6.963 6.963 0 0 1 1.018 8.5h2.49a13.36 13.36 0 0 0 .437 3.008zm6.728 2.964a7.009 7.009 0 0 0 2.275-1.521 8.376 8.376 0 0 0-1.197-.49 8.853 8.853 0 0 1-.481 1.078 6.688 6.688 0 0 1-.597.933zM8.5 11.909c.81.03 1.577.13 2.282.287-.12.312-.252.604-.395.872-.552 1.035-1.218 1.65-1.887 1.855V11.91zm3.555-.401c.57.185 1.095.409 1.565.667A6.963 6.963 0 0 0 14.982 8.5h-2.49a13.36 13.36 0 0 1-.437 3.008zM14.982 7.5h-2.49a13.361 13.361 0 0 0-.437-3.008 9.123 9.123 0 0 0 1.565-.667A6.963 6.963 0 0 1 14.982 7.5zM11.27 2.461c.177.334.339.694.482 1.078a8.368 8.368 0 0 0 1.196-.49 7.01 7.01 0 0 0-2.275-1.52c.218.283.418.597.597.932zm-.488 1.343c-.705.157-1.473.257-2.282.287V1.077c.67.204 1.335.82 1.887 1.855.143.268.276.56.395.872z"/>
                            </svg>
                            <h4>Join our community</h4>
                            <p>This is a template for a simple marketing or informational website. It includes a large callout called a jumbotron and three supporting pieces of content.</p>
                        </div>
                    </div>
                </div>
            </section>

            <section class="three bg-gray">
                <div class="container">
                    <div class="row">
                        <div class="col-12 text-center mb-4">
                            <h3 class="bold">Exceptional opportunities</h3>
                        </div>
                        <div class="col-sm-12 col-md-3 col-lg-3 text-center">
                            <h4>10,000+ </h4>
                            <h5  class="bold">students</h5 >
                        </div>
                        <div class="col-sm-12 col-md-3 col-lg-3 text-center">
                            <h4>1000+ </h4>
                            <h5  class="bold">Topics</h5 >
                        </div>
                        <div class="col-sm-12 col-md-3 col-lg-3 text-center">
                            <h4>100+ </h4>
                            <h5  class="bold">Schools</h5 >
                        </div>
                        <div class="col-sm-12 col-md-3 col-lg-3 text-center">
                            <h4>500K+ </h4>
                            <h5 class="bold">Audience</h5>
                        </div>
                    </div>
                </div>
            </section>

            <section class="bg-white">
                <div class="container">
                    <div class="row">
                        <div class="col-12 text-center mb-4">
                            <h3 class="bold">Your process flow</h3>
                        </div>
                        <div class="col-sm-12 col-md-4 col-lg-4 text-center">
                            <span>
                                <svg width="3em" height="3em" viewBox="0 0 16 16" class="bi bi-calendar2-week mb-3" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM2 2a1 1 0 0 0-1 1v11a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1H2z"/>
                                    <path d="M2.5 4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H3a.5.5 0 0 1-.5-.5V4zM11 7.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm-3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm-5 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1z"/>
                                </svg>
                            </span>
                            <h4> 1) Plan your subject</h4>
                            <p>This is a template for a simple marketing or informational website. It includes a large callout called a jumbotron and three supporting pieces of content.</p>
                        </div>
                        <div class="col-sm-12 col-md-4 col-lg-4 text-center">
                            <span>
                                <svg width="3em" height="3em" viewBox="0 0 16 16" class="bi bi-camera-video mb-3" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M0 5a2 2 0 0 1 2-2h7.5a2 2 0 0 1 1.983 1.738l3.11-1.382A1 1 0 0 1 16 4.269v7.462a1 1 0 0 1-1.406.913l-3.111-1.382A2 2 0 0 1 9.5 13H2a2 2 0 0 1-2-2V5zm11.5 5.175l3.5 1.556V4.269l-3.5 1.556v4.35zM2 4a1 1 0 0 0-1 1v6a1 1 0 0 0 1 1h7.5a1 1 0 0 0 1-1V5a1 1 0 0 0-1-1H2z"/>
                                </svg>
                            </span>
                            <h4> 2) Record it</h4>
                            <p>This is a template for a simple marketing or informational website. It includes a large callout called a jumbotron and three supporting pieces of content.</p>
                        </div>
                        <div class="col-sm-12 col-md-4 col-lg-4 text-center">
                            <span>
                                <svg width="3em" height="3em" viewBox="0 0 16 16" class="bi bi-people mb-3" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8zm-7.978-1h7.956a.274.274 0 0 0 .014-.002l.008-.002c-.002-.264-.167-1.03-.76-1.72C13.688 10.629 12.718 10 11 10c-1.717 0-2.687.63-3.24 1.276-.593.69-.759 1.457-.76 1.72a1.05 1.05 0 0 0 .022.004zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0zM6.936 9.28a5.88 5.88 0 0 0-1.23-.247A7.35 7.35 0 0 0 5 9c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816zM4.92 10c-1.668.02-2.615.64-3.16 1.276C1.163 11.97 1 12.739 1 13h3c0-1.045.323-2.086.92-3zM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0zm3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4z"/>
                                </svg>
                            </span>
                            <h4> 3) Build a community</h4>
                            <p>This is a template for a simple marketing or informational website. It includes a large callout called a jumbotron and three supporting pieces of content.</p>
                        </div>
                    </div>
                </div>
            </section>

            <section class="bg-gray">
                <div class="container">
                    <div class="row text-center">
                        <div class="col-12 text-center">
                            <h3 class="bold">Become a techer today.</h3>
                            <h5 class="mb-4 mt-3">This is a template for a simple marketing or informational website.</h5>
                            <a id="round-button-2" type="button" href="{{ route('manage.subjects') }}"class="btn btn-primary" name="button">Get started</a>
                        </div>
                    </div>
                </div>
            </section>

            @include('teacher.layouts.partials.footer')
        </div>
        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
