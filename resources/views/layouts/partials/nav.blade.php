<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark-3 increased-font py-3">
    <div class="container-fluid">
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
                        Browse
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="{{ route('home') }}">Videos</a>
                        <a class="dropdown-item" href="{{ route('student.books.index') }}">Books</a>
                        <a class="dropdown-item" href="{{ route('student.notes.index') }}">Notes</a>
                        <a class="dropdown-item" href="{{ route('pastpapers') }}">Past papers</a>
                    </div>
                </li>
            </ul>

            <form action="{{ route('search') }}" method="GET" class="form-inline top-search">
                <div class="input-group space-bottom">
                    <input type="text" name="query" class="form-control" placeholder="Search for subject...">
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

            <ul class="navbar-nav ml-auto nav nav-pills">
                @guest
                    <li class="nav-item {{ Helper::set_active(['subjects.onBoard']) }} pt-1">
                        <a class="nav-link" href="{{ route('subjects.onBoard') }}">Teach</a>
                    </li>
                @endguest

                @auth()
                    @if(auth()->user()->role == 1)
                        <li class="nav-item {{ Helper::set_active(['subjects.starter']) }} mt-1">
                            <a class="nav-link" href="{{ route('subjects.starter') }}">Teach</a>
                        </li>
                        <li class="nav-item {{ Helper::set_active(['manage.subjects']) }} d-md-none d-lg-block mt-1">
                            <a class="nav-link" href="{{ route('my-subjects') }}">My subjects</a>
                        </li>
                    @elseif(auth()->user()->role == 2 || auth()->user()->role == 3)
                        <li class="nav-item {{ Helper::set_active(['manage.subjects']) }} mt-1">
                            <a class="nav-link" href="{{ route('manage.subjects') }}">Teacher</a>
                        </li>

                        <li class="nav-item {{ Helper::set_active(['manage.subjects']) }} d-md-none d-lg-block mt-1">
                            <a class="nav-link" href="{{ route('manage.subjects') }}">My subjects</a>
                        </li>
                    @endif
                @endauth

                <li id="cartId2" class="nav-item {{ Helper::set_active(['cart']) }} mt-1">
                    <livewire:nav-cart />
                </li>

                @guest
                <li class="nav-item {{ Helper::set_active(['login']) }} mt-1 mr-2 space-bottom">
                    <a class="btn btn-danger btn-sm nav-link" id="round-button" href="{{ route('login') }}">Login</a>
                </li>
                @if (Route::has('register'))
                    <li class="nav-item {{ Helper::set_active(['register']) }} mt-1 mr-2 register-button">
                        <a class="btn btn-outline-secondary btn-sm nav-link" id="round-button" href="{{ route('register') }}">Register</a>
                    </li>
                @endif
                @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        <div class="circle text-center">
                            <span class="circle__content">{{ Helper::generate_initials(Auth::user()->name) }}</span>
                        </div>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item d-flex" href="{{ route('account-setting') }}">
                            <div class="mr-2 pt-2">
                                <div class="circle">
                                    <span class="circle__content">{{ Helper::generate_initials(Auth::user()->name) }}</span>
                                </div>
                            </div>
                            <div class="mr-1">
                                <p>{{ Auth::user()->name }} <br>
                                {{ Auth::user()->email }}</p>
                            </div>
                         </a>

                        <div class="dropdown-divider"></div>

                        <a class="dropdown-item" href="{{ route('my-subjects') }}">My courses</a>
                        <a class="dropdown-item" href="{{ url('cart') }}">My cart</a>
                        <a class="dropdown-item" href="{{ route('account-setting') }}">Account settings</a>

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
