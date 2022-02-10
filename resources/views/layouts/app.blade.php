<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <link rel="shortcut icon" href="{{ asset('favicon.svg') }}">
        <link href="{{ asset('vendor/js/videojs/css/video-js.css') }}" rel="stylesheet">
        <link href="{{ asset('css/card-js.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <title>@yield('title') {{ config('app.name') }}</title>
        @livewireStyles
    </head>
<body>
    <div id="app">
        @include('layouts.partials.header')
        @yield('content')
        @include('layouts.partials.footer')

        <div class="overlay"></div>
        <a id="scroll-up-button" style="text-decoration: none;"></a>
    </div>

    @livewireScripts
        <script src="{{ asset('vendor/js/videojs/videojs-ie8.min.js') }}"></script>
        <script src="{{ asset('js/app.js') }}"></script>
        <script src="{{ asset('js/scroll_top.js') }}"></script>
        <script src="{{ asset('js/loading_modal.js') }}"></script>
    @stack('scripts')
</body>
</html>
