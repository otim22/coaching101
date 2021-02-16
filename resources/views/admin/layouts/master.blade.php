<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>A</title>

    <link type="text/css" href="{{ asset('admin/css/vendor-morris.css') }}" rel="stylesheet">
    <link type="text/css" href="{{ asset('admin/css/vendor-bootstrap-datepicker.css') }}" rel="stylesheet">

    <!-- Prevent the demo from appearing in search engines -->
    <meta name="robots" content="noindex">

    <!-- App CSS -->
    <link type="text/css" href="{{ asset('admin/css/app.css') }}" rel="stylesheet">
    <link type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote.min.css" rel="stylesheet">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote.min.js" defer></script>
    <link type="text/css" href="{{ asset('admin/css/custom.css') }}" rel="stylesheet">
    <link type="text/css" href="{{ asset('admin/css/app.rtl.css') }}" rel="stylesheet">

    <!-- Simplebar -->
    <link type="text/css" href="{{ asset('admin/vendor/simplebar.css') }}" rel="stylesheet">

    @stack('scripts')
</head>

<body>
    <div class="mdk-drawer-layout js-mdk-drawer-layout" data-fullbleed data-push data-responsive-width="992px" data-has-scrolling-region>

        <div class="mdk-drawer-layout__content">
            @include('admin.layouts.partials.header')

            @yield('content')
        </div>

    </div>

    @include('admin.layouts.partials.side_menu')

    @include('admin.layouts.partials.right_side_menu')

    <script src="{{ asset('admin/vendor/jquery.min.js') }}"></script>
    <script src="{{ asset('admin/vendor/popper.js') }}"></script>
    <script src="{{ asset('admin/vendor/bootstrap.min.js') }}"></script>
    <!-- Used for adding a custom scrollbar to the drawer -->
    <script src="{{ asset('admin/vendor/simplebar.js') }}"></script>
    <script src="{{asset('admin/vendor/Chart.min.js') }}"></script>
    <script src="{{ asset('admin/vendor/moment.min.js') }}"></script>
    <script src="{{ asset('admin/js/color_variables.js') }}"></script>
    <script src="{{asset('admin/js/app.js') }}"></script>
    <script src="{{ asset('admin/vendor/dom-factory.js') }}"></script>
    <script src="{{ asset('admin/vendor/material-design-kit.js') }}"></script>

    <script>
        (function() {
            'use strict';
            // Self Initialize DOM Factory Components
            domFactory.handler.autoInit()


            // Connect button(s) to drawer(s)
            var sidebarToggle = document.querySelectorAll('[data-toggle="sidebar"]')

            sidebarToggle.forEach(function(toggle) {
                toggle.addEventListener('click', function(e) {
                    var selector = e.currentTarget.getAttribute('data-target') || '#default-drawer'
                    var drawer = document.querySelector(selector)
                    if (drawer) {
                        if (selector == '#default-drawer') {
                            $('.container-fluid').toggleClass('container--max');
                        }
                        drawer.mdkDrawer.toggle();
                    }
                })
            })
        })()
    </script>

    <script src="{{ asset('admin/vendor/morris.min.js') }}"></script>
    <script src="{{ asset('admin/vendor/raphael.min.js') }}"></script>
    <script src="{{ asset('admin/vendor/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('admin/js/datepicker.js') }}"></script>

</body>
</html>
