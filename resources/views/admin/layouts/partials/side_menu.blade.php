<div class="mdk-drawer js-mdk-drawer" id="default-drawer">
    <div class="mdk-drawer__content">
        <div class="mdk-drawer__inner" data-simplebar data-simplebar-force-enabled="true">

            <nav class="drawer  drawer--dark">
                <div class="drawer-spacer">
                    <div class="media align-items-center">
                        <a href="index.html" class="drawer-brand-circle mr-2">A</a>
                        <div class="media-body">
                            <a href="index.html" class="h5 m-0 text-link">Coaching101</a>
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
                    <li class="drawer-menu-item">
                        <a href="{{ url('/admin/sliders') }}">
                            <i class="material-icons">slideshow</i>
                            <span class="drawer-menu-text"> Slider</span>
                        </a>
                    </li>
                    <li class="drawer-menu-item ">
                        <a href="{{ url('admin/menus') }}">
                            <i class="material-icons">view_day</i>
                            <span class="drawer-menu-text">Menu</span>
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
                        <a href="ui-tables.html">
                            <i class="material-icons">people_outline</i>
                            <span class="drawer-menu-text"> Users</span>
                        </a>
                    </li>

                    <!-- <li class="drawer-menu-item drawer-submenu">
                        <a data-toggle="collapse" data-parent="#componentsMenu" href="#" data-target="#formsMenu" aria-controls="formsMenu" aria-expanded="false" class="collapsed">
                            <i class="material-icons">text_format</i>
                            <span class="drawer-menu-text"> Forms</span>
                        </a>
                        <ul class="collapse " id="formsMenu">
                            <li class="drawer-menu-item "><a href="form-controls.html">Form Controls</a></li>
                            <li class="drawer-menu-item "><a href="checkboxes-radios.html">Checkboxes &amp; Radios</a></li>
                            <li class="drawer-menu-item "><a href="switches-toggles.html">Switches &amp; Toggles</a></li>
                            <li class="drawer-menu-item "><a href="form-layout.html">Layout Variations</a></li>
                            <li class="drawer-menu-item "><a href="validation.html">Validation</a></li>
                            <li class="drawer-menu-item "><a href="custom-forms.html">Custom Forms</a></li>
                            <li class="drawer-menu-item "><a href="text-editor.html">Text Editor</a></li>
                            <li class="drawer-menu-item "><a href="datepicker.html">Datepicker</a></li>
                        </ul>
                    </li> -->
                </ul>

                </ul>

            </nav>
        </div>
    </div>
</div>
