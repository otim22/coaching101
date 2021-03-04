<div class="mdk-drawer js-mdk-drawer" id="user-drawer" data-position="right" data-align="end">
    <div class="mdk-drawer__content">
        <div class="mdk-drawer__inner" data-simplebar data-simplebar-force-enabled="true">
            <nav class="drawer drawer--light">
                <div class="drawer-spacer drawer-spacer-border">
                    <div class="media align-items-center">
                        <img src="https://pbs.twimg.com/profile_images/928893978266697728/3enwe0fO_400x400.jpg" class="img-fluid rounded-circle mr-2" width="35" alt="">
                        <div class="media-body">
                            <a href="#" class="h5 m-0" style="text-decoration: none;">{{ Auth::user()->name }}</a>
                            <div>{{ Auth::user()->email }}</div>
                        </div>
                    </div>
                </div>
                <!-- MENU -->
                <ul class="drawer-menu" id="userMenu" data-children=".drawer-submenu">
                    <li class="drawer-menu-item">
                        <a href="{{ url('/') }}">
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
