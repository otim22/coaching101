<div id="top-bar">
    <nav class="top-most navbar navbar-expand-md bg-dark-3">
        <div class="container-fluid mt-2">
            <div class="std-menu mr-auto">
                @foreach($standards as $key => $standard)
                <a class="text-white uniqueStandard" href="#" data-standard-id="{{ $key }}" data-standard-url="{{ route('student.standards.activate', ['standard' => $standard]) }}"
                    style="text-decoration: none;">
                    @if($standard->id == $id)
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="mb-1 mr-1 ml-1 bi bi-clipboard-check" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M10.854 7.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
                        <path d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1v-1z"/>
                        <path d="M9.5 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h3zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3z"/>
                    </svg>
                    @else
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="mb-1 mr-1 ml-1 bi bi-clipboard" viewBox="0 0 16 16">
                        <path d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1v-1z"/>
                        <path d="M9.5 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h3zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3z"/>
                    </svg>
                    @endif
                    <small>{{ $standard->name }}</small>
                </a>
                @endforeach
            </div>
            <div class=" ml-auto">
                <div class="d-flex justify-content-between">
                    @guest
                        <div class="nav-item {{ InitialGenerator::set_active(['login']) }} ml-1 mr-2">
                            <a class="btn btn-primary btn-sm" id="round-button" href="{{ route('login') }}" style="color: white;font-weight: bold;">
                                Login
                            </a>
                        </div>
                        @if (Route::has('register'))
                        <div class=nav-item "{{ InitialGenerator::set_active(['register']) }}">
                            <a class="btn btn-outline-secondary btn-sm" id="round-button" href="{{ route('register') }}" style="color: white;font-weight: bold;">
                                Register
                            </a>
                        </div>
                        @endif
                    @endguest
                    @auth
                        <a class="btn btn-outline-secondary btn-sm" href="{{ route('logout') }}"  id="round-button" style="font-weight: bold;"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            {{ __('Log out') }}
                        </a>
                        <form id="logout-form" class="bold" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    @endauth
                </div>
            </div>
        </div>
    </nav>
    <nav id="navbar_top" class="navbar navbar-expand-md navbar-dark bg-dark-3 increased-font">
        <div class="container-fluid" id="navbarSupportedContentOther">
            <a class="navbar-brand mr-auto" href="{{ url('/') }}">
                <img src="{{ asset('logo/trand.svg') }}" alt="Trand Icon">
            </a>
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

                        <a class="dropdown-item" href="{{ route('my-account') }}">My account</a>
                        <a class="dropdown-item" href="{{ url('cart') }}">My cart</a>
                        <a class="dropdown-item" href="{{ route('users.profile') }}">Profile details</a>

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
                        <input type="text" name="query" class="form-control search" placeholder="Search for content...">
                        <div class="input-group-append">
                            <button class="btn btn-light" id="cancel-search-button">
                                <svg xmlns="http://www.w3.org/2000/svg" width="0.8em" height="0.8em" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                                    <path d="M1.293 1.293a1 1 0 0 1 1.414 0L8 6.586l5.293-5.293a1 1 0 1 1 1.414 1.414L9.414 8l5.293 5.293a1 1 0 0 1-1.414 1.414L8 9.414l-5.293 5.293a1 1 0 0 1-1.414-1.414L6.586 8 1.293 2.707a1 1 0 0 1 0-1.414z"/>
                                </svg>
                            </button>
                            <button class="btn btn-secondary" type="submit"  id="search-button">
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
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="#" id="navbarDropdownMenuLinkUneb" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Browse
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLinkUneb">
                            <a class="dropdown-item" href="{{ route('home') }}">Video lessons</a>
                            <a class="dropdown-item" href="{{ route('student.books.index') }}">Pdf books</a>
                            <a class="dropdown-item" href="{{ route('student.notes.index') }}">Notes</a>
                            <a class="dropdown-item" href="{{ route('student.pastpapers.index') }}">Past papers</a>
                            <!-- <a class="dropdown-item" href="{{ route('student.exams') }}"><span class="badge badge-pill badge-danger">exams</span></a> -->
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('student.exams') }}">Practice exams</a>
                    </li>
                    <!-- <li class="nav-item dropdown">
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
                                <a class="dropdown-item" href="{{ route('my-account') }}">My courses</a>
                                @if(Auth::user()->hasRole('student'))
                                    <a class="dropdown-item" href="{{ route('subjects.onBoard') }}">Teaching</a>
                                @elseif(Auth::user()->hasRole('teacher') || Auth::user()->hasRole('admin'))
                                    <a class="dropdown-item" href="{{ route('manage.subjects') }}">Teaching</a>
                                @endif
                            @endauth
                        </div>
                    </li> -->
                    <li class="nav-item {{ InitialGenerator::set_active(['donate.index']) }}">
                        <a class="nav-link" href="{{ route('donate.index') }}">Donate</a>
                    </li>
                </ul>

                <ul class="navbar-nav ml-auto nav nav-pills">
                    <li class="nav-item">
                        <span class="badge badge-pill badge-light" style="margin-top: 13px; padding-top: 4px; padding-bottom: 4px; margin-right: 5px;">{{ $activeStandard->name }}</span>
                    </li>
                    <li class="nav-item search d-none d-md-block">
                        <a class="nav-link mt-1" href="#search" data-toggle="search-form"  id="search-icon"> <i class="fas fa-search pointer"></i></a>
                    </li>
                    <li id="cartId2" class="nav-item {{ InitialGenerator::set_active(['cart']) }} d-none d-md-block">
                        <livewire:nav-cart />
                    </li>

                    @auth
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
                                        {{ Auth::user()->email }}
                                    </p>
                                </div>
                            </a>

                            <div class="dropdown-divider"></div>

                            <a class="dropdown-item" href="{{ route('my-account') }}">My account</a>
                            <a class="dropdown-item" href="{{ url('cart') }}">My cart</a>
                            <a class="dropdown-item" href="{{ route('users.profile') }}">Profile details</a>
                        </div>
                    </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>
</div>

@push('scripts')
    <script src="{{ asset('vendor/js/popper.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/nav.js') }}"></script>
    <script src="{{ asset('js/handle_navbar.js') }}"></script>
@endpush
