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
    <div id="app">

        <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark-2 increased-font py-3">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/home') }}"><span class="logo-font">Coaching101</span></a>
                <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto nav nav-pills">
                        <li class="nav-item {{ InitialGenerator::set_active(['manage.subjects']) }} mt-1 mr-2">
                            <a class="btn btn-outline-secondary btn-sm nav-link bold" href="{{ URL::previous() }}">Exit</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <section>
            <div class="container">
                <div class="row justify-content-center mt-4">
                    <div class="col-lg-8 col-md-10 col-sm-12">
                        <h4 class="bold">So, you wanna share your knowledge?</h4>
                        <p class="pb-3">Our classes are majorly video based that give students edge skills to excellence in life. Whether you are exeperienced or not, we will work together to give great value to students.</p>
                        <form action="{{ route('subjects.captureRole') }}" method="POST">
                            @csrf
                            <div class="mb-5">
                                <h5 class="pb-3">What kind of teaching have you done before?</h5>
                                <div class="custom-control custom-checkbox mr-sm-2 mb-3">
                                    <input type="checkbox" class="custom-control-input" id="professional">
                                    <label class="custom-control-label" for="professional">In Person Professionally</label>
                                </div>
                                <div class="custom-control custom-checkbox mr-sm-2 mb-3">
                                    <input type="checkbox" class="custom-control-input" id="informal">
                                    <label class="custom-control-label" for="informal">In Person Informally</label>
                                </div>
                                <div class="custom-control custom-checkbox mr-sm-2 mb-3">
                                    <input type="checkbox" class="custom-control-input" id="online">
                                    <label class="custom-control-label" for="online">Online</label>
                                </div>
                                <div class="custom-control custom-checkbox mr-sm-2 mb-3">
                                    <input type="checkbox" class="custom-control-input" id="other">
                                    <label class="custom-control-label" for="other">Other</label>
                                </div>
                            </div>

                            <div class="mb-5">
                                <h5 class="pb-3">How exeperienced are you at videos?</h5>
                                <div class="custom-control custom-checkbox mr-sm-2 mb-3">
                                    <input type="checkbox" class="custom-control-input" id="beginner">
                                    <label class="custom-control-label" for="beginner">I am a beginner</label>
                                </div>
                                <div class="custom-control custom-checkbox mr-sm-2 mb-3">
                                    <input type="checkbox" class="custom-control-input" id="intermidiate">
                                    <label class="custom-control-label" for="intermidiate">I have intermidiate knowledge</label>
                                </div>
                                <div class="custom-control custom-checkbox mr-sm-2 mb-3">
                                    <input type="checkbox" class="custom-control-input" id="exeperienced">
                                    <label class="custom-control-label" for="exeperienced">I am exeperienced</label>
                                </div>
                                <div class="custom-control custom-checkbox mr-sm-2 mb-3">
                                    <input type="checkbox" class="custom-control-input" id="ready">
                                    <label class="custom-control-label" for="ready">I have videos ready to start</label>
                                </div>
                            </div>

                            <div>
                                <h5 class="pb-3">Do you have an audience?</h5>
                                <div class="custom-control custom-checkbox mr-sm-2 mb-3">
                                    <input type="checkbox" class="custom-control-input" id="dont">
                                    <label class="custom-control-label" for="dont">I am a beginner, i don't have</label>
                                </div>
                                <div class="custom-control custom-checkbox mr-sm-2 mb-3">
                                    <input type="checkbox" class="custom-control-input" id="some">
                                    <label class="custom-control-label" for="some">I have some audience</label>
                                </div>
                                <div class="custom-control custom-checkbox mr-sm-2 mb-3">
                                    <input type="checkbox" class="custom-control-input" id="enough">
                                    <label class="custom-control-label" for="enough">I have enough audience</label>
                                </div>
                                <div class="custom-control custom-checkbox mr-sm-2 mb-3">
                                    <input type="checkbox" class="custom-control-input" id="not_sure">
                                    <label class="custom-control-label" for="not_sure">I am not sure</label>
                                </div>
                                <div>
                                    <input type="hidden" id="role" name="role" value="2">
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary float-right">Continue</button>
                        </form>

                    </div>
                </div>
            </div>
        </section>

        @include('layouts.partials.footer')

    </div>
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
