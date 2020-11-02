<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark-2 increased-font py-3">
    <div class="container-fluid ml-4 mr-4">
        <a class="navbar-brand" href="{{ route('manage.subjects') }}"><span class="logo-font">Coaching101</span></a>
        <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto nav nav-pills">
                @auth()
                    @if(auth()->user()->role == 1 || auth()->user()->role == 2)
                        <li class="nav-item {{ Helper::set_active(['home']) }} mt-1">
                            <a class="nav-link" href="{{ url('/home')}}">Student</a>
                        </li>

                        <li id="cartId2" class="nav-item {{ Helper::set_active(['cart']) }} mt-1">
                            <a class="nav-link" href="#">
                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-bell" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2z"/>
                                    <path fill-rule="evenodd" d="M8 1.918l-.797.161A4.002 4.002 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4.002 4.002 0 0 0-3.203-3.92L8 1.917zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5.002 5.002 0 0 1 13 6c0 .88.32 4.2 1.22 6z"/>
                                </svg>
                            </a>
                        </li>
                    @endif
                @endauth

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

                        <a class="dropdown-item" href="{{ route('accounts') }}">Profile</a>
                        <a class="dropdown-item" href="{{ route('accounts') }}">Account settings</a>
                        <a class="dropdown-item" href="{{ route('accounts') }}">Payment methods</a>

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
