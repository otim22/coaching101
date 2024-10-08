<div class="mdk-drawer js-mdk-drawer" id="default-drawer">
    <div class="mdk-drawer__content">
        <div class="mdk-drawer__inner" data-simplebar data-simplebar-force-enabled="true">

            <nav class="drawer  drawer--dark">
                <div class="drawer-spacer">
                    <div class="media align-items-center">
                        <a href="index.html" class="drawer-brand-circle mr-2">TL</a>
                        <div class="media-body">
                            <a href="{{ url('/admin/dashboard') }}" class="h5 m-0 text-link">trandLessons</a>
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
                            <span class="drawer-menu-text">Dashboard</span>
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
                                    <span class="drawer-menu-text"> Landing picture</span>
                                </a>
                            </li>
                            <li class="drawer-menu-item">
                                <a href="{{ url('/admin/teacherImages') }}">
                                    <span class="drawer-menu-text"> Teacher picture</span>
                                </a>
                            </li>
                            <li class="drawer-menu-item">
                                <a href="{{ url('/admin/studentImages') }}">
                                    <span class="drawer-menu-text"> Student picture</span>
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
                                    <span class="drawer-menu-text"> Video subjects</span>
                                </a>
                            </li>
                            <li class="drawer-menu-item  ">
                                <a href="{{ url('/admin/books') }}">
                                    <span class="drawer-menu-text"> Pdf books</span>
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
                            <li class="drawer-menu-item  ">
                                <a href="{{ url('/admin/items') }}">
                                    <span class="drawer-menu-text"> Items</span>
                                </a>
                            </li>
                            <li class="drawer-menu-item  ">
                                <a href="{{ url('/admin/currencies') }}">
                                    <span class="drawer-menu-text"> Currencies</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>

                <!-- MANAGEMENT MENU -->
                <ul class="drawer-menu" id="componentsSurvey" data-children=".drawer-submenu">
                    <li class="drawer-menu-item drawer-submenu">
                        <a data-toggle="collapse" data-parent="#componentsSurvey" href="#" data-target="#uiComponentsSurvey" aria-controls="uiComponentsSurvey" aria-expanded="false" class="collapsed">
                            <i class="material-icons">live_help</i>
                            <span class="drawer-menu-text"> Survey</span>
                          </a>
                        <ul class="collapse " id="uiComponentsSurvey">
                            <li class="drawer-menu-item  ">
                                <a href="{{ url('/admin/surveys') }}">
                                    <span class="drawer-menu-text"> Survey</span>
                                </a>
                            </li>
                            <li class="drawer-menu-item  ">
                                <a href="{{ url('/admin/surveyQuestions') }}">
                                    <span class="drawer-menu-text"> Question</span>
                                </a>
                            </li>
                            <li class="drawer-menu-item  ">
                                <a href="{{ url('/admin/surveyAnswers') }}">
                                    <span class="drawer-menu-text"> Answer</span>
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
                                    <span class="drawer-menu-text">Subject</span>
                                </a>
                            </li>
                            <li class="drawer-menu-item">
                                <a href="{{ url('/admin/standards') }}">
                                    <span class="drawer-menu-text">Standard</span>
                                </a>
                            </li>
                            <li class="drawer-menu-item">
                                <a href="{{ url('/admin/levels') }}">
                                    <span class="drawer-menu-text">Level</span>
                                </a>
                            </li>
                            <li class="drawer-menu-item">
                                <a href="{{ url('/admin/years') }}">
                                    <span class="drawer-menu-text">Year</span>
                                </a>
                            </li>
                            <li class="drawer-menu-item">
                                <a href="{{ url('/admin/terms') }}">
                                    <span class="drawer-menu-text">Term</span>
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
                                <a href="{{ url('/admin/admins') }}">
                                    <span class="drawer-menu-text">Admin</span>
                                </a>
                            </li>
                            <li class="drawer-menu-item">
                                <a href="{{ url('/admin/teachers') }}">
                                    <span class="drawer-menu-text">Teacher</span>
                                </a>
                            </li>
                            <li class="drawer-menu-item">
                                <a href="{{ url('/admin/students') }}">
                                    <span class="drawer-menu-text">Student</span>
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
                                    <span class="drawer-menu-text">Teacher</span>
                                </a>
                            </li>
                            <li class="drawer-menu-item">
                                <a href="{{ url('/admin/student-profiles') }}">
                                    <span class="drawer-menu-text">Student</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</div>
