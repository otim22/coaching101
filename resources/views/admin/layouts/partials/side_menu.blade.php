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
                    <li class="drawer-menu-item">
                        <a href="{{ url('/admin/dashboard') }}">
                            <i class="material-icons">apps</i>
                            <span class="drawer-menu-text"> Admin dashboard</span>
                        </a>
                    </li>
                    <li class="drawer-menu-item drawer-submenu">
                        <a data-toggle="collapse" data-parent="#componentsMenu" href="#" data-target="#uiComponentsMenu" aria-controls="uiComponentsMenu" aria-expanded="false" class="collapsed">
                            <i class="material-icons">home</i>
                            <span class="drawer-menu-text"> Home UI</span>
                          </a>
                        <ul class="collapse " id="uiComponentsMenu">
                            <li class="drawer-menu-item">
                                <a href="{{ url('/admin/sliders') }}">
                                    <span class="drawer-menu-text"> Slider</span>
                                </a>
                            </li>
                            <li class="drawer-menu-item">
                                <a href="{{ url('/admin/teacherImages') }}">
                                    <span class="drawer-menu-text"> Teacher Image</span>
                                </a>
                            </li>
                            <li class="drawer-menu-item">
                                <a href="{{ url('/admin/studentImages') }}">
                                    <span class="drawer-menu-text"> Student Image</span>
                                </a>
                            </li>
                            <li class="drawer-menu-item">
                                <a href="{{ url('/admin/faqs') }}">
                                    <span class="drawer-menu-text"> Faq</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>

                <!-- HEADING -->
                <div class="py-2 drawer-heading">
                    Resources
                </div>

                <!-- MANAGEMENT MENU -->
                <ul class="drawer-menu" id="componentsSubject" data-children=".drawer-submenu">
                    <li class="drawer-menu-item drawer-submenu">
                        <a data-toggle="collapse" data-parent="#componentsSubject" href="#" data-target="#uiComponentsSubject" aria-controls="uiComponentsSubject" aria-expanded="false" class="collapsed">
                            <i class="material-icons">library_books</i>
                            <span class="drawer-menu-text"> Content</span>
                          </a>
                        <ul class="collapse " id="uiComponentsSubject">
                            <li class="drawer-menu-item  ">
                                <a href="{{ url('/admin/subjects') }}">
                                    <span class="drawer-menu-text"> Videos</span>
                                </a>
                            </li>
                            <li class="drawer-menu-item  ">
                                <a href="{{ url('/admin/books') }}">
                                    <span class="drawer-menu-text"> Books</span>
                                </a>
                            </li>
                            <li class="drawer-menu-item  ">
                                <a href="{{ url('/admin/notes') }}">
                                    <span class="drawer-menu-text"> Notes</span>
                                </a>
                            </li>
                            <li class="drawer-menu-item  ">
                                <a href="{{ url('/admin/pastpapers') }}">
                                    <span class="drawer-menu-text"> Past papers</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>

                <!-- HEADING -->
                <div class="py-2 drawer-heading">
                    Filter
                </div>

                <!-- MANAGEMENT MENU -->
                <ul class="drawer-menu" id="componentsCategory" data-children=".drawer-submenu">
                    <li class="drawer-menu-item drawer-submenu">
                        <a data-toggle="collapse" data-parent="#componentsCategory" href="#" data-target="#uiComponentsCategory" aria-controls="uiComponentsCategory" aria-expanded="false" class="collapsed">
                            <i class="material-icons">dashboard</i>
                            <span class="drawer-menu-text"> Categories</span>
                          </a>
                        <ul class="collapse " id="uiComponentsCategory">
                            <li class="drawer-menu-item">
                                <a href="{{ url('/admin/categories') }}">
                                    <span class="drawer-menu-text">Subjects</span>
                                </a>
                            </li>
                            <li class="drawer-menu-item">
                                <a href="{{ url('/admin/years') }}">
                                    <span class="drawer-menu-text">Years</span>
                                </a>
                            </li>
                            <li class="drawer-menu-item">
                                <a href="{{ url('/admin/terms') }}">
                                    <span class="drawer-menu-text">Terms</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>

                <!-- HEADING -->
                <div class="py-2 drawer-heading">
                    Manage
                </div>

                <!-- MANAGEMENT MENU -->
                <ul class="drawer-menu" id="componentsUsers" data-children=".drawer-submenu">
                    <li class="drawer-menu-item drawer-submenu">
                        <a data-toggle="collapse" data-parent="#componentsUsers" href="#" data-target="#uiComponentsUsers" aria-controls="uiComponentsUsers" aria-expanded="false" class="collapsed">
                            <i class="material-icons">people_outline</i>
                            <span class="drawer-menu-text"> Users</span>
                          </a>
                        <ul class="collapse " id="uiComponentsUsers">
                            <li class="drawer-menu-item">
                                <a href="{{ url('/admin/teachers') }}">
                                    <span class="drawer-menu-text">Teachers</span>
                                </a>
                            </li>
                            <li class="drawer-menu-item">
                                <a href="{{ url('/admin/students') }}">
                                    <span class="drawer-menu-text">Students</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="drawer-menu-item drawer-submenu">
                        <a data-toggle="collapse" data-parent="#componentsProfiles" href="#" data-target="#uiComponentsProfiles" aria-controls="uiComponentsProfiles" aria-expanded="false" class="collapsed">
                            <i class="material-icons">person_outline</i>
                            <span class="drawer-menu-text"> Profiles</span>
                          </a>
                        <ul class="collapse " id="uiComponentsProfiles">
                            <li class="drawer-menu-item">
                                <a href="{{ url('/admin/teacher-profiles') }}">
                                    <span class="drawer-menu-text">Teachers</span>
                                </a>
                            </li>
                            <li class="drawer-menu-item">
                                <a href="{{ url('/admin/student-profiles') }}">
                                    <span class="drawer-menu-text">Students</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</div>
