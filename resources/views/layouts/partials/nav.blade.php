<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark-3 increased-font py-3">
    <div class="container" id="navbarSupportedContentOther">
        <a class="navbar-brand mr-auto" href="{{ url('/') }}"><span class="logo-font">all cloud prep</span></a>
        <span class="sm-search d-md-none" id="smSearch"> <a class="ml-auto hide-at-md mr-1" href="#" style="text-decoration: none;"> <i class="fas fa-search pointer"></i></a></span>
        <div id="smCart" class="nav-item {{ InitialGenerator::set_active(['cart']) }} d-md-none mr-1">
            <livewire:nav-cart />
        </div>
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
        <button class="navbar-toggler" id="navbarButtonToggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse topmenu navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link make-upper-case" href="#" id="navbarDropdownMenuLinkUneb" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        uneb
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLinkUneb">
                        <a class="dropdown-item" href="{{ route('home') }}">Video Subjects</a>
                        <a class="dropdown-item" href="{{ route('student.books.index') }}">Pdf Books</a>
                        <a class="dropdown-item" href="{{ route('student.notes.index') }}">Notes</a>
                        <a class="dropdown-item" href="{{ route('student.pastpapers.index') }}">Past Papers</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link make-upper-case" href="#" id="navbarDropdownCambridge" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        cambridge
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownCambridge">
                        <li class="dropdown-submenu">
                            <a class="dropdown-item dropdown-toggle" data-toggle="dropdown" href="#">Check Point</a>
                            <ul class="dropdown-menu">
                                <a class="dropdown-item" href="{{ route('home') }}">Video Subjects</a>
                                <a class="dropdown-item" href="{{ route('student.books.index') }}">Pdf Books</a>
                                <a class="dropdown-item" href="{{ route('student.notes.index') }}">Notes</a>
                                <a class="dropdown-item" href="{{ route('student.pastpapers.index') }}">Past Papers</a>
                            </ul>
                        </li>
                        <li class="dropdown-submenu">
                            <a class="dropdown-item dropdown-toggle" data-toggle="dropdown" href="#">IGCSE</a>
                            <ul class="dropdown-menu">
                                <a class="dropdown-item" href="{{ route('home') }}">Video Subjects</a>
                                <a class="dropdown-item" href="{{ route('student.books.index') }}">Pdf Books</a>
                                <a class="dropdown-item" href="{{ route('student.notes.index') }}">Notes</a>
                                <a class="dropdown-item" href="{{ route('student.pastpapers.index') }}">Past Papers</a>
                            </ul>
                        </li>
                        <li class="dropdown-submenu">
                            <a class="dropdown-item dropdown-toggle" data-toggle="dropdown" href="#">AS / A2</a>
                            <ul class="dropdown-menu">
                                <a class="dropdown-item" href="{{ route('home') }}">Video Subjects</a>
                                <a class="dropdown-item" href="{{ route('student.books.index') }}">Pdf Books</a>
                                <a class="dropdown-item" href="{{ route('student.notes.index') }}">Notes</a>
                                <a class="dropdown-item" href="{{ route('student.pastpapers.index') }}">Past Papers</a>
                            </ul>
                        </li>
                    </ul>
                </li>
                <ul class="navbar-nav">
                    <li class="nav-item dropdown hide-at-md">
                        <a class="nav-link make-upper-case" href="#" id="navbarDropdownMenuLinkStart" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            start
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLinkStart">
                            @guest
                                <a class="dropdown-item" href="{{ route('login') }}">Learner</a>
                                <a class="dropdown-item" href="{{ route('subjects.starter') }}">Teacher</a>
                            @endguest
                            @auth()
                                @if(auth()->user()->role == 1)
                                    <a class="dropdown-item" href="{{ route('home') }}">Learner</a>
                                    <a class="dropdown-item" href="{{ route('subjects.starter') }}">Teacher</a>
                                @elseif(auth()->user()->role == 2 || auth()->user()->role == 3)
                                    <a class="dropdown-item" href="{{ route('my-subjects') }}">Learner</a>
                                    <a class="dropdown-item" href="{{ route('manage.subjects') }}">Teacher</a>
                                @endif
                            @endauth
                        </div>
                    </li>
                </ul>
                <li class="nav-item hide-at-md {{ InitialGenerator::set_active(['donate.index']) }}">
                    <a class="nav-link make-upper-case" href="{{ route('donate.index') }}">donate</a>
                </li>
            </ul>

            <ul class="navbar-nav ml-auto nav nav-pills">
                <li class="nav-item search mr-1 d-none d-md-block">
					<a class="nav-link" href="#"> <i class="fas fa-search pointer"></i></a>
				</li>
                <li id="cartId2" class="nav-item {{ InitialGenerator::set_active(['cart']) }} d-none d-md-block mr-2">
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
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <div class="circle text-center">
                                    <span class="circle__content">{{ InitialGenerator::generate_initials(Auth::user()->name) }}</span>
                                </div>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
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

                                <a class="dropdown-item" href="{{ route('my-subjects') }}">My subjects</a>
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
                        </li>
                    @endguest
            </ul>
        </div>
    </div>
</nav>

@push('scripts')
    <script src="{{ asset('vendor/js/jquery.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('vendor/js/popper.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/search.js') }}"></script>
@endpush
