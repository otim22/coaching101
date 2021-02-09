<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <link href="{{ asset('vendor/js/videojs/css/video-js.css') }}" rel="stylesheet">

        <link href="{{ asset('css/card-js.css') }}" rel="stylesheet">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <title>@yield('title') {{ config('app.name') }}</title>
        @livewireStyles
      </head>
<body>
    <div id="app">

        @include('layouts.partials.nav')

        @yield('content')

        @include('layouts.partials.footer')

    </div>
    @livewireScripts
    <!-- If you'd like to support IE8 (for Video.js versions prior to v7) -->
    <script src="{{ asset('vendor/js/videojs/videojs-ie8.min.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    @stack('scripts')
</body>
</html>
