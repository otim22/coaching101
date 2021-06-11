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
                        @foreach($surveys as $survey)
                            <h4 class="bold">{{ $survey->title }}</h4>
                            <p class="pb-3">{{ $survey->description }}</p>
                        @endforeach
                        <form action="{{ route('userSurveyAnswer.store') }}" method="POST">
                            @csrf

                            @foreach($questions as $question)
                                <div class="mb-5">
                                    <h5 class="pb-3">{{ $question->question }}</h5>
                                    @foreach($question->answers as $answer)
                                        <div class="mb-2">
                                            <input type="checkbox" class="mr-2" name="survey_answer_id[]" value="{{ $answer->id }}">
                                            <label for="{{$answer->id }}">{{ $answer->answer }}</label>
                                        </div>
                                    @endforeach
                                </div>
                            @endforeach

                            <h5 class="pb-3">What standard do you teach?</h5>
                            @foreach($standards as $standard)
                                <div class="mb-2">
                                    <input type="checkbox" class="mr-2" name="standard_id[]" value="{{ $standard->id }}">
                                    <label for="{{ $standard->id }}">{{ $standard->name }}</label>
                                </div>
                            @endforeach

                            <button type="submit" class="btn btn-primary float-right pr-4 pl-4" style="border-radius: 30px; padding-left: 20px; padding-right: 20px; white-space: nowrap;">
                                Save
                            </button>
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
