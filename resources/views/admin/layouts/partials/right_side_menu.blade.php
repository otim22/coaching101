<div class="mdk-drawer js-mdk-drawer" id="user-drawer" data-position="right" data-align="end">
    <div class="mdk-drawer__content">
        <div class="mdk-drawer__inner" data-simplebar data-simplebar-force-enabled="true">
            <nav class="drawer drawer--light">
                <div class="drawer-spacer drawer-spacer-border">
                    <div class="media align-items-center">
                        <div class="pr-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                                <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                            </svg>
                        </div>
                        <div class="media-body">
                            <a href="{{ route('admin.admins.index') }}" class="h5 m-0" style="text-decoration: none;">{{ Auth::user()->name }}</a>
                            <div>{{ Auth::user()->email }}</div>
                        </div>
                    </div>
                </div>
                <!-- MENU -->
                <ul class="drawer-menu" id="userMenu" data-children=".drawer-submenu">
                    <li class="drawer-menu-item">
                        <a href="{{ url('/') }}" target="_blank">
                            <i class="material-icons">view_headline</i>
                            <span class="drawer-menu-text"> Home</span>
                        </a>
                    </li>
                    <li class="drawer-menu-item">
                        <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                      document.getElementById('logout-form').submit();">
                            <i class="material-icons">exit_to_app</i>
                            <span class="drawer-menu-text"> Logout</span>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</div>
