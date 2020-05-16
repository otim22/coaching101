<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <title>@yield('title') {{ config('app.name') }}</title>
      </head>
<body>

        @include('layouts.partials.nav')

        @yield('content')

        @include('layouts.partials.footer')

    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
