<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-heading increased-font py-2">
    <div class="container">
        @if (Route::has('login'))
        <a class="navbar-brand" href="{{ url('/') }}"><span class="logo-font">Coaching101</span></a>
        <div id="cartId1">
            <a class="nav-link" href="#">
                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-cart3" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm7 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
                </svg>
            </a>
        </div>

        <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto d-none d-lg-block">
                <li class="nav-item dropdown">
                    <a class="nav-link" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <svg class="bi bi-grid-3x3-gap-fill mr-1" width="1.3em" height="1.3em" viewBox="1 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path d="M1 2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 01-1 1H2a1 1 0 01-1-1V2zm5 0a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 01-1 1H7a1 1 0 01-1-1V2zm5 0a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 01-1 1h-2a1 1 0 01-1-1V2zM1 7a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 01-1 1H2a1 1 0 01-1-1V7zm5 0a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 01-1 1H7a1 1 0 01-1-1V7zm5 0a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 01-1 1h-2a1 1 0 01-1-1V7zM1 12a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 01-1 1H2a1 1 0 01-1-1v-2zm5 0a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 01-1 1H7a1 1 0 01-1-1v-2zm5 0a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 01-1 1h-2a1 1 0 01-1-1v-2z"/>
                        </svg>
                        Library
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <ul class="dropdown-submenu">
                            <a class="dropdown-item" href="#">Sciences</a>
                            <li class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <ul class="dropdown-submenu">
                                    <a class="dropdown-item" href="#">Senior one</a>
                                    <li class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                        <a class="dropdown-item" href="#">Term one</a>
                                        <a class="dropdown-item" href="#">Term two</a>
                                        <a class="dropdown-item" href="#">Term three</a>
                                    </li>
                                </ul>
                                <ul class="dropdown-submenu">
                                    <a class="dropdown-item" href="#">Senior two</a>
                                    <li class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                        <a class="dropdown-item" href="#">Term one</a>
                                        <a class="dropdown-item" href="#">Term two</a>
                                        <a class="dropdown-item" href="#">Term three</a>
                                    </li>
                                </ul>
                                <ul class="dropdown-submenu">
                                    <a class="dropdown-item" href="#">Senior three</a>
                                    <li class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                        <a class="dropdown-item" href="#">Term one</a>
                                        <a class="dropdown-item" href="#">Term two</a>
                                        <a class="dropdown-item" href="#">Term three</a>
                                    </li>
                                </ul>
                                <ul class="dropdown-submenu">
                                    <a class="dropdown-item" href="#">Senior four</a>
                                    <li class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                        <a class="dropdown-item" href="#">Term one</a>
                                        <a class="dropdown-item" href="#">Term two</a>
                                        <a class="dropdown-item" href="#">Term three</a>
                                    </li>
                                </ul>
                                <ul class="dropdown-submenu">
                                    <a class="dropdown-item" href="#">Senior five</a>
                                    <li class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                        <a class="dropdown-item" href="#">Term one</a>
                                        <a class="dropdown-item" href="#">Term two</a>
                                        <a class="dropdown-item" href="#">Term three</a>
                                    </li>
                                </ul>
                                <ul class="dropdown-submenu">
                                    <a class="dropdown-item" href="#">Senior six</a>
                                    <li class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                        <a class="dropdown-item" href="#">Term one</a>
                                        <a class="dropdown-item" href="#">Term two</a>
                                        <a class="dropdown-item" href="#">Term three</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                        <ul class="dropdown-submenu">
                            <a class="dropdown-item" href="#">Mathematics</a>
                            <li class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <ul class="dropdown-submenu">
                                    <a class="dropdown-item" href="#">Senior one</a>
                                    <li class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                        <a class="dropdown-item" href="#">Term one</a>
                                        <a class="dropdown-item" href="#">Term two</a>
                                        <a class="dropdown-item" href="#">Term three</a>
                                    </li>
                                </ul>
                                <ul class="dropdown-submenu">
                                    <a class="dropdown-item" href="#">Senior two</a>
                                    <li class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                        <a class="dropdown-item" href="#">Term one</a>
                                        <a class="dropdown-item" href="#">Term two</a>
                                        <a class="dropdown-item" href="#">Term three</a>
                                    </li>
                                </ul>
                                <ul class="dropdown-submenu">
                                    <a class="dropdown-item" href="#">Senior three</a>
                                    <li class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                        <a class="dropdown-item" href="#">Term one</a>
                                        <a class="dropdown-item" href="#">Term two</a>
                                        <a class="dropdown-item" href="#">Term three</a>
                                    </li>
                                </ul>
                                <ul class="dropdown-submenu">
                                    <a class="dropdown-item" href="#">Senior four</a>
                                    <li class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                        <a class="dropdown-item" href="#">Term one</a>
                                        <a class="dropdown-item" href="#">Term two</a>
                                        <a class="dropdown-item" href="#">Term three</a>
                                    </li>
                                </ul>
                                <ul class="dropdown-submenu">
                                    <a class="dropdown-item" href="#">Senior five</a>
                                    <li class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                        <a class="dropdown-item" href="#">Term one</a>
                                        <a class="dropdown-item" href="#">Term two</a>
                                        <a class="dropdown-item" href="#">Term three</a>
                                    </li>
                                </ul>
                                <ul class="dropdown-submenu">
                                    <a class="dropdown-item" href="#">Senior six</a>
                                    <li class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                        <a class="dropdown-item" href="#">Term one</a>
                                        <a class="dropdown-item" href="#">Term two</a>
                                        <a class="dropdown-item" href="#">Term three</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                        <ul class="dropdown-submenu">
                            <a class="dropdown-item" href="#">Languages</a>
                            <li class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <ul class="dropdown-submenu">
                                    <a class="dropdown-item" href="#">Senior one</a>
                                    <li class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                        <a class="dropdown-item" href="#">Term one</a>
                                        <a class="dropdown-item" href="#">Term two</a>
                                        <a class="dropdown-item" href="#">Term three</a>
                                    </li>
                                </ul>
                                <ul class="dropdown-submenu">
                                    <a class="dropdown-item" href="#">Senior two</a>
                                    <li class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                        <a class="dropdown-item" href="#">Term one</a>
                                        <a class="dropdown-item" href="#">Term two</a>
                                        <a class="dropdown-item" href="#">Term three</a>
                                    </li>
                                </ul>
                                <ul class="dropdown-submenu">
                                    <a class="dropdown-item" href="#">Senior three</a>
                                    <li class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                        <a class="dropdown-item" href="#">Term one</a>
                                        <a class="dropdown-item" href="#">Term two</a>
                                        <a class="dropdown-item" href="#">Term three</a>
                                    </li>
                                </ul>
                                <ul class="dropdown-submenu">
                                    <a class="dropdown-item" href="#">Senior four</a>
                                    <li class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                        <a class="dropdown-item" href="#">Term one</a>
                                        <a class="dropdown-item" href="#">Term two</a>
                                        <a class="dropdown-item" href="#">Term three</a>
                                    </li>
                                </ul>
                                <ul class="dropdown-submenu">
                                    <a class="dropdown-item" href="#">Senior five</a>
                                    <li class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                        <a class="dropdown-item" href="#">Term one</a>
                                        <a class="dropdown-item" href="#">Term two</a>
                                        <a class="dropdown-item" href="#">Term three</a>
                                    </li>
                                </ul>
                                <ul class="dropdown-submenu">
                                    <a class="dropdown-item" href="#">Senior six</a>
                                    <li class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                        <a class="dropdown-item" href="#">Term one</a>
                                        <a class="dropdown-item" href="#">Term two</a>
                                        <a class="dropdown-item" href="#">Term three</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                        <ul class="dropdown-submenu">
                            <a class="dropdown-item" href="#">Social Sciences</a>
                            <li class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <ul class="dropdown-submenu">
                                    <a class="dropdown-item" href="#">Senior one</a>
                                    <li class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                        <a class="dropdown-item" href="#">Term one</a>
                                        <a class="dropdown-item" href="#">Term two</a>
                                        <a class="dropdown-item" href="#">Term three</a>
                                    </li>
                                </ul>
                                <ul class="dropdown-submenu">
                                    <a class="dropdown-item" href="#">Senior two</a>
                                    <li class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                        <a class="dropdown-item" href="#">Term one</a>
                                        <a class="dropdown-item" href="#">Term two</a>
                                        <a class="dropdown-item" href="#">Term three</a>
                                    </li>
                                </ul>
                                <ul class="dropdown-submenu">
                                    <a class="dropdown-item" href="#">Senior three</a>
                                    <li class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                        <a class="dropdown-item" href="#">Term one</a>
                                        <a class="dropdown-item" href="#">Term two</a>
                                        <a class="dropdown-item" href="#">Term three</a>
                                    </li>
                                </ul>
                                <ul class="dropdown-submenu">
                                    <a class="dropdown-item" href="#">Senior four</a>
                                    <li class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                        <a class="dropdown-item" href="#">Term one</a>
                                        <a class="dropdown-item" href="#">Term two</a>
                                        <a class="dropdown-item" href="#">Term three</a>
                                    </li>
                                </ul>
                                <ul class="dropdown-submenu">
                                    <a class="dropdown-item" href="#">Senior five</a>
                                    <li class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                        <a class="dropdown-item" href="#">Term one</a>
                                        <a class="dropdown-item" href="#">Term two</a>
                                        <a class="dropdown-item" href="#">Term three</a>
                                    </li>
                                </ul>
                                <ul class="dropdown-submenu">
                                    <a class="dropdown-item" href="#">Senior six</a>
                                    <li class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                        <a class="dropdown-item" href="#">Term one</a>
                                        <a class="dropdown-item" href="#">Term two</a>
                                        <a class="dropdown-item" href="#">Term three</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                        <ul class="dropdown-submenu">
                            <a class="dropdown-item" href="#">Vocational Subjects</a>
                            <li class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <ul class="dropdown-submenu">
                                    <a class="dropdown-item" href="#">Senior one</a>
                                    <li class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                        <a class="dropdown-item" href="#">Term one</a>
                                        <a class="dropdown-item" href="#">Term two</a>
                                        <a class="dropdown-item" href="#">Term three</a>
                                    </li>
                                </ul>
                                <ul class="dropdown-submenu">
                                    <a class="dropdown-item" href="#">Senior two</a>
                                    <li class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                        <a class="dropdown-item" href="#">Term one</a>
                                        <a class="dropdown-item" href="#">Term two</a>
                                        <a class="dropdown-item" href="#">Term three</a>
                                    </li>
                                </ul>
                                <ul class="dropdown-submenu">
                                    <a class="dropdown-item" href="#">Senior three</a>
                                    <li class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                        <a class="dropdown-item" href="#">Term one</a>
                                        <a class="dropdown-item" href="#">Term two</a>
                                        <a class="dropdown-item" href="#">Term three</a>
                                    </li>
                                </ul>
                                <ul class="dropdown-submenu">
                                    <a class="dropdown-item" href="#">Senior four</a>
                                    <li class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                        <a class="dropdown-item" href="#">Term one</a>
                                        <a class="dropdown-item" href="#">Term two</a>
                                        <a class="dropdown-item" href="#">Term three</a>
                                    </li>
                                </ul>
                                <ul class="dropdown-submenu">
                                    <a class="dropdown-item" href="#">Senior five</a>
                                    <li class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                        <a class="dropdown-item" href="#">Term one</a>
                                        <a class="dropdown-item" href="#">Term two</a>
                                        <a class="dropdown-item" href="#">Term three</a>
                                    </li>
                                </ul>
                                <ul class="dropdown-submenu">
                                    <a class="dropdown-item" href="#">Senior six</a>
                                    <li class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                        <a class="dropdown-item" href="#">Term one</a>
                                        <a class="dropdown-item" href="#">Term two</a>
                                        <a class="dropdown-item" href="#">Term three</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>

            <!-- <form action="" class="form-inline top-search">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for subject...">
                    <div class="input-group-append">
                        <button class="btn btn-secondary" type="button">
                            <svg class="bi bi-search" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M10.442 10.442a1 1 0 011.415 0l3.85 3.85a1 1 0 01-1.414 1.415l-3.85-3.85a1 1 0 010-1.415z" clip-rule="evenodd"/>
                                <path fill-rule="evenodd" d="M6.5 12a5.5 5.5 0 100-11 5.5 5.5 0 000 11zM13 6.5a6.5 6.5 0 11-13 0 6.5 6.5 0 0113 0z" clip-rule="evenodd"/>
                            </svg>
                        </button>
                    </div>
                </div>
            </form> -->

            <ul class="navbar-nav ml-auto nav nav-pills">
                <ul class="navbar-nav mt-1">
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            For Business
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <ul>
                                <a class="dropdown-item" href="{{ url('/subjects') }}">Teach here</a>
                                <a class="dropdown-item" href="#">Enroll school</a>
                            </ul>
                    </li>
                </ul>

                @auth
                <li class="nav-item {{ Helper::set_active(['subjects']) }} mt-1">
                    <a class="nav-link" href="{{ route('teacher.subjects') }}">My subjects</a>
                </li>
                @endauth

                <li id="cartId2" class="nav-item {{ Helper::set_active(['cart']) }} mt-1">
                    <a class="nav-link" href="#">
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-cart3" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm7 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
                        </svg>
                    </a>
                </li>

                @guest
                <li class="nav-item {{ Helper::set_active(['login']) }} mt-1 mr-2">
                    <a class="btn btn-outline-primary btn-sm nav-link pl-3 pr-3" href="{{ route('login') }}">Login</a>
                </li>
                @if (Route::has('register'))
                    <li class="nav-item {{ Helper::set_active(['register']) }} mt-1">
                        <a class="btn btn-outline-secondary btn-sm nav-link pl-2 pr-2" href="{{ route('register') }}">Register</a>
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
        @endif
    </div>
</nav>
