<div class="mdk-drawer js-mdk-drawer" id="default-drawer">
    <div class="mdk-drawer__content">
        <div class="mdk-drawer__inner" data-simplebar data-simplebar-force-enabled="true">

            <nav class="drawer  drawer--dark">
                <div class="drawer-spacer">
                    <div class="media align-items-center">
                        <a href="index.html" class="drawer-brand-circle mr-2">A</a>
                        <div class="media-body">
                            <a href="{{ url('/admin/dashboard') }}" class="h5 m-0 text-link">Coaching101</a>
                        </div>
                    </div>
                </div>
                <!-- HEADING -->
                <div class="py-2 drawer-heading">
                    Dashboards
                </div>
                <!-- DASHBOARDS MENU -->
                <ul class="drawer-menu" id="dasboardMenu" data-children=".drawer-submenu">
                    <li class="drawer-menu-item active ">
                        <a href="{{ url('/admin/dashboard') }}">
                            <i class="material-icons">poll</i>
                            <span class="drawer-menu-text"> Home</span>
                        </a>
                    </li>
                    <li class="drawer-menu-item ">
                        <a href="{{ url('admin/menus') }}">
                            <i class="material-icons">view_day</i>
                            <span class="drawer-menu-text">Menu</span>
                        </a>
                    </li>
                    <li class="drawer-menu-item">
                        <a href="{{ url('/admin/sliders') }}">
                            <i class="material-icons">slideshow</i>
                            <span class="drawer-menu-text"> Slider</span>
                        </a>
                    </li>
                    <li class="drawer-menu-item">
                        <a href="{{ url('/admin/teacherImages') }}">
                            <i class="material-icons">assignment_ind</i>
                            <span class="drawer-menu-text"> Teacher Image</span>
                        </a>
                    </li>
                    <li class="drawer-menu-item">
                        <a href="{{ url('/admin/studentImages') }}">
                            <i class="material-icons">child_care</i>
                            <span class="drawer-menu-text"> Student Image</span>
                        </a>
                    </li>
                    <li class="drawer-menu-item">
                        <a href="{{ url('/admin/faqs') }}">
                            <i class="material-icons">live_help</i>
                            <span class="drawer-menu-text"> Faq</span>
                        </a>
                    </li>
                </ul>

                <!-- HEADING -->
                <div class="py-2 drawer-heading">
                    Content
                </div>

                <!-- MANAGEMENT MENU -->
                <ul class="drawer-menu" id="componentsMenu" data-children=".drawer-submenu">
                    <li class="drawer-menu-item  ">
                        <a href="{{ url('/admin/books') }}">
                            <i class="material-icons">import_contacts</i>
                            <span class="drawer-menu-text"> Books</span>
                        </a>
                    </li>
                    <li class="drawer-menu-item  ">
                        <a href="{{ url('/admin/notes') }}">
                            <i class="material-icons">book</i>
                            <span class="drawer-menu-text"> Notes</span>
                        </a>
                    </li>
                    <li class="drawer-menu-item  ">
                        <a href="{{ url('/admin/pastpapers') }}">
                            <i class="material-icons">content_copy</i>
                            <span class="drawer-menu-text"> Past Papers</span>
                        </a>
                    </li>
                </ul>

                <!-- HEADING -->
                <div class="py-2 drawer-heading">
                    Categories
                </div>

                <!-- MANAGEMENT MENU -->
                <ul class="drawer-menu" id="componentsMenu" data-children=".drawer-submenu">
                    <li class="drawer-menu-item">
                        <a href="{{ url('/admin/categories') }}">
                            <i class="material-icons">filter</i>
                            <span class="drawer-menu-text">Subjects</span>
                        </a>
                    </li>
                    <li class="drawer-menu-item">
                        <a href="{{ url('/admin/years') }}">
                            <i class="material-icons">dashboard</i>
                            <span class="drawer-menu-text">Years</span>
                        </a>
                    </li>
                    <li class="drawer-menu-item">
                        <a href="{{ url('/admin/terms') }}">
                            <i class="material-icons">apps</i>
                            <span class="drawer-menu-text">Terms</span>
                        </a>
                    </li>
                </ul>

                <!-- HEADING -->
                <div class="py-2 drawer-heading">
                    Manage
                </div>

                <!-- MANAGEMENT MENU -->
                <ul class="drawer-menu" id="componentsMenu" data-children=".drawer-submenu">
                    <li class="drawer-menu-item  ">
                        <a href="{{ url('/admin/users') }}">
                            <i class="material-icons">people_outline</i>
                            <span class="drawer-menu-text"> Users</span>
                        </a>
                    </li>
                </ul>

                </ul>

            </nav>
        </div>
    </div>
</div>
