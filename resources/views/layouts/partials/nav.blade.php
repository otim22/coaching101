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
                <li class="nav-item dropdown">
                    <a class="nav-link make-upper-case" href="#" id="navbarDropdownMenuLinkUneb" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Browse
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLinkUneb">
                        <a class="dropdown-item" href="{{ route('home') }}">Video Subjects</a>
                        <a class="dropdown-item" href="{{ route('student.books.index') }}">Pdf Books</a>
                        <a class="dropdown-item" href="{{ route('student.notes.index') }}">Notes</a>
                        <a class="dropdown-item" href="{{ route('student.pastpapers.index') }}">Past Papers</a>
                    </div>
                </li>
                <li class="nav-item dropdown hide-at-sslg">
                    <a class="nav-link make-upper-case" href="#" id="navbarDropdownStandard" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Standard
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownStandard">
                        @foreach($standards as $key => $standard)
                            <a class="dropdown-item uniqueStandard" href="#" data-standard-id="{{ $key }}" data-standard-url="{{ route('student.standards.activate', ['standard' => $standard]) }}">
                                @if($standard->id == $id)
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-toggle-on mb-1" viewBox="0 0 16 16">
                                        <path d="M5 3a5 5 0 0 0 0 10h6a5 5 0 0 0 0-10H5zm6 9a4 4 0 1 1 0-8 4 4 0 0 1 0 8z"/>
                                    </svg>
                                @else
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-toggle-off mb-1" viewBox="0 0 16 16">
                                        <path d="M11 4a4 4 0 0 1 0 8H8a4.992 4.992 0 0 0 2-4 4.992 4.992 0 0 0-2-4h3zm-6 8a4 4 0 1 1 0-8 4 4 0 0 1 0 8zM0 8a5 5 0 0 0 5 5h6a5 5 0 0 0 0-10H5a5 5 0 0 0-5 5z"/>
                                    </svg>
                                @endif
                                &nbsp;
                                {{ $standard->name }}
                            </a>
                        @endforeach
                    </div>
                </li>
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link make-upper-case" href="#" id="navbarDropdownMenuLinkStart" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            start
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLinkStart">
                            @guest
                                <a class="dropdown-item" href="{{ route('login') }}">Learning</a>
                                <a class="dropdown-item" href="{{ route('subjects.starter') }}">Teaching</a>
                            @endguest
                            <a class="dropdown-item d-none d-lg-block d-xl-none d-md-block d-lg-none" href="{{ route('donate.index') }}">Donate</a>
                            @auth()
                                @if(auth()->user()->hasRole('student'))
                                    <a class="dropdown-item" href="{{ route('home') }}">Learning</a>
                                    <a class="dropdown-item" href="{{ route('subjects.starter') }}">Teaching</a>
                                @elseif(auth()->user()->hasRole('teacher') || auth()->user()->hasRole('admin'))
                                    <a class="dropdown-item" href="{{ route('my-account') }}">Learning</a>
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

@push('scripts')
    <script src="{{ asset('vendor/js/popper.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/nav.js') }}"></script>
@endpush
