@extends('layouts.app')

@section('content')

<section>
    <div class="container">
        <div class="row mt-5">
            <div class="col-lg-3 fast-transition col-md-12 col-sm-12">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('teacher.subjects') }}">
                            <svg width="1.3em" height="1.3em" viewBox="0 0 20 20" class="bi bi-layout-text-sidebar-reverse" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M2 1h12a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zm12-1a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12z"/>
                                <path fill-rule="evenodd" d="M5 15V1H4v14h1zm8-11.5a.5.5 0 0 0-.5-.5h-5a.5.5 0 0 0 0 1h5a.5.5 0 0 0 .5-.5zm0 3a.5.5 0 0 0-.5-.5h-5a.5.5 0 0 0 0 1h5a.5.5 0 0 0 .5-.5zm0 3a.5.5 0 0 0-.5-.5h-5a.5.5 0 0 0 0 1h5a.5.5 0 0 0 .5-.5zm0 3a.5.5 0 0 0-.5-.5h-5a.5.5 0 0 0 0 1h5a.5.5 0 0 0 .5-.5z"/>
                            </svg>
                            Subjects
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('teacher.performances') }}">
                            <svg width="1.3em" height="1.3em" viewBox="0 0 20 20" class="bi bi-bar-chart-line" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M11 2a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v12h.5a.5.5 0 0 1 0 1H.5a.5.5 0 0 1 0-1H1v-3a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3h1V7a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v7h1V2zm1 12h2V2h-2v12zm-3 0V7H7v7h2zm-5 0v-3H2v3h2z"/>
                            </svg>
                            Performance
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('teacher.tools') }}">
                            <svg width="1.3em" height="1.3em" viewBox="0 0 20 20" class="bi bi-sliders" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M11.5 2a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zM9.05 3a2.5 2.5 0 0 1 4.9 0H16v1h-2.05a2.5 2.5 0 0 1-4.9 0H0V3h9.05zM4.5 7a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zM2.05 8a2.5 2.5 0 0 1 4.9 0H16v1H6.95a2.5 2.5 0 0 1-4.9 0H0V8h2.05zm9.45 4a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zm-2.45 1a2.5 2.5 0 0 1 4.9 0H16v1h-2.05a2.5 2.5 0 0 1-4.9 0H0v-1h9.05z"/>
                            </svg>
                            Tools
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('teacher.resources') }}">
                            <svg width="1.3em" height="1.3em" viewBox="0 0 20 20" class="bi bi-info-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                <path d="M8.93 6.588l-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588z"/>
                                <circle cx="8" cy="4.5" r="1"/>
                            </svg>
                            Resources
                        </a>
                    </li>
                </ul>
            </div>
            <div class="col-lg-9 pl-5">
                @if(request()->path() === "teacher/subjects")
                    @include('pages.subject.partials.subjects')
                @elseif(request()->path() === "teacher/performances")
                    @include('pages.subject.partials.performances')
                @elseif(request()->path() === "teacher/tools")
                    @include('pages.subject.partials.tools')
                @elseif(request()->path() === "teacher/resources")
                    @include('pages.subject.partials.resources')
                @endif
            </div>
        </div>
    </div>
</section>

@endsection
