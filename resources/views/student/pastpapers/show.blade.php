@extends('layouts.app')

@section('content')

<section class="section-bread bg-gray-2"  style="background: linear-gradient(to right, rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.05)), url({{ asset('/images/bridge.jpg') }}); width: 100%; height: auto; background-size: cover;">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ url('/') }}">
                        <svg width="1.3em" height="1.3em" viewBox="0 0 16 16" class="bi bi-house-fill pb-1" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M8 3.293l6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6zm5-.793V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"/>
                            <path fill-rule="evenodd" d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z"/>
                        </svg>
                    </a>
                </li>
                <li class="breadcrumb-item bold" aria-current="page">
                    <a href="{{ route('student.pastpapers.index') }}" style="text-decoration:none;">Past papers</a>
                </li>
                <li class="breadcrumb-item bold" aria-current="page">{{ $pastpaper->short_title }}</li>
            </ol>
        </nav>
    </div>
</section>

<section class="small-screen_padding">
    <div class="container">
        @if($pastpaper->isSubscribedTo)
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <div class="card p-3">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <h5 class="bold">{{ $pastpaper->title }}</h5>
                                </div>
                                <div>
                                    @if($pastpaper->isSubscribedTo)
                                        <a id="round-button-2" class="btn btn-secondary btn-sm" href="{{ route('my-account') }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
                                            </svg>
                                            Back
                                        </a>
                                    @else
                                        <a id="round-button-2" class="btn btn-secondary btn-sm" href="{{ route('student.pastpapers.index') }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
                                            </svg>
                                            Back
                                        </a>
                                    @endif
                                </div>
                            </div>
                            <div class="mb-4">
                                <hr />
                            </div>
                            <div class="row">
                                <div class="col-lg-3 col-md-3 col-sm-12">
                                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                        @forelse($pastpaper->subpastpapers as $key => $subpastpaper)
                                            <a type="button" style="text-decoration: none; margin-bottom: 3px;"
                                                    class="{{ $key == $pastpaper->subpastpapers->keys()->first() ? 'active' : '' }}"
                                                    id="v-pills-{{$subpastpaper->slug}}-tab"
                                                    data-toggle="pill"
                                                    data-slug="{{ $subpastpaper->slug }}"
                                                    href="#v-pills-{{$subpastpaper->slug}}"
                                                    role="tab"
                                                    aria-controls="v-pills-{{$subpastpaper->slug}}"
                                                    aria-selected="true">
                                            @if($subpastpaper->parent_id === null)
                                                <span class="bold" data-pastpaper="{{ $subpastpaper->getFirstMediaUrl('pastpapers') }}">Qtn: {{ $subpastpaper->title }}</span>
                                            @endif
                                            @if($subpastpaper->parent_id !== null)
                                                <svg width="1.3em" height="1.3em" viewBox="0 0 16 16" class="bi bi-check mb-1" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" d="M10.97 4.97a.75.75 0 0 1 1.071 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.236.236 0 0 1 .02-.022z"/>
                                                </svg>
                                                <span data-answer="{{ $subpastpaper->getFirstMediaUrl('answers') }}">{{ $subpastpaper->title }}</span>
                                                 <div class="mb-1">
                                                     <hr />
                                                 </div>
                                            @endif
                                            </a>
                                        @empty
                                            <p>No past papers</p>
                                        @endforelse
                                    </div>
                                </div>
                                <div class="col-lg-9 col-md-9 col-sm-12">
                                    <div class="tab-content" id="v-pills-tabContent">
                                        @forelse($pastpaper->subpastpapers as $key => $subpastpaper)
                                            @if($subpastpaper->parent_id == null)
                                                <div class="tab-pane fade show {{ $key == $pastpaper->subpastpapers->keys()->first() ? 'active' : '' }}" id="v-pills-{{$subpastpaper->slug}}" role="tabpanel" aria-labelledby="v-pills-{{$subpastpaper->slug}}-tab">
                                                    <p>{{ $subpastpaper->title }}</p>
                                                    <div id="ocl_pdf_viewer">
                                                        <div id="canvas_container-{{$subpastpaper->slug}}" class="canvas-border d-print-none">
                                                            <canvas id="{{ $subpastpaper->slug }}"></canvas>
                                                        </div>

                                                        <div class="d-flex justify-content-between mt-4 mb-3">
                                                            <div id="navigation_controls-{{ $subpastpaper->slug }}">
                                                                <button id="go_previous-{{ $subpastpaper->slug }}" class="btn btn-sm btn-outline-primary circular-btn">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                                                                        <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
                                                                    </svg>
                                                                </button>
                                                                Page:<span id="current_page-{{ $subpastpaper->slug }}"></span>/<span id="num_pages-{{ $subpastpaper->slug }}"></span>
                                                                <button id="go_next-{{ $subpastpaper->slug }}" class="btn btn-sm btn-outline-primary circular-btn">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                                                                        <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
                                                                    </svg>
                                                                </button>
                                                            </div>

                                                            <div id="zoom_controls-{{ $subpastpaper->slug }}">
                                                                <button id="zoom_in-{{ $subpastpaper->slug }}" class="btn btn-sm btn-outline-primary circular-btn mr-1">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-zoom-in" viewBox="0 0 16 16">
                                                                        <path fill-rule="evenodd" d="M6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11zM13 6.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z"/>
                                                                        <path d="M10.344 11.742c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1 6.538 6.538 0 0 1-1.398 1.4z"/>
                                                                        <path fill-rule="evenodd" d="M6.5 3a.5.5 0 0 1 .5.5V6h2.5a.5.5 0 0 1 0 1H7v2.5a.5.5 0 0 1-1 0V7H3.5a.5.5 0 0 1 0-1H6V3.5a.5.5 0 0 1 .5-.5z"/>
                                                                    </svg>
                                                                </button>
                                                                <button id="zoom_out-{{ $subpastpaper->slug }}" class="btn btn-sm btn-outline-primary circular-btn">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-zoom-out" viewBox="0 0 16 16">
                                                                        <path fill-rule="evenodd" d="M6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11zM13 6.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z"/>
                                                                        <path d="M10.344 11.742c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1 6.538 6.538 0 0 1-1.398 1.4z"/>
                                                                        <path fill-rule="evenodd" d="M3 6.5a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5z"/>
                                                                    </svg>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @else
                                                <div class="tab-pane fade show {{ $key == $pastpaper->subpastpapers->keys()->first() ? 'active' : '' }}" id="v-pills-{{$subpastpaper->slug}}" role="tabpanel" aria-labelledby="v-pills-{{$subpastpaper->slug}}-tab">
                                                    <p>{{ $subpastpaper->title }}</p>
                                                    <div id="ocl_pdf_viewer">
                                                        <div id="canvas_container-{{$subpastpaper->slug}}" class="canvas-border d-print-none">
                                                            <canvas id="{{ $subpastpaper->slug }}"></canvas>
                                                        </div>

                                                        <div class="d-flex justify-content-between mt-4 mb-3">
                                                            <div id="navigation_controls-{{ $subpastpaper->slug }}">
                                                                <button id="go_previous-{{ $subpastpaper->slug }}" class="btn btn-sm btn-outline-primary circular-btn">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                                                                        <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
                                                                    </svg>
                                                                </button>
                                                                Page:<span id="current_page-{{ $subpastpaper->slug }}"></span>/<span id="num_pages-{{ $subpastpaper->slug }}"></span>
                                                                <button id="go_next-{{ $subpastpaper->slug }}" class="btn btn-sm btn-outline-primary circular-btn">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                                                                        <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
                                                                    </svg>
                                                                </button>
                                                            </div>

                                                            <div id="zoom_controls-{{ $subpastpaper->slug }}">
                                                                <button id="zoom_in-{{ $subpastpaper->slug }}" class="btn btn-sm btn-outline-primary circular-btn mr-1">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-zoom-in" viewBox="0 0 16 16">
                                                                        <path fill-rule="evenodd" d="M6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11zM13 6.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z"/>
                                                                        <path d="M10.344 11.742c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1 6.538 6.538 0 0 1-1.398 1.4z"/>
                                                                        <path fill-rule="evenodd" d="M6.5 3a.5.5 0 0 1 .5.5V6h2.5a.5.5 0 0 1 0 1H7v2.5a.5.5 0 0 1-1 0V7H3.5a.5.5 0 0 1 0-1H6V3.5a.5.5 0 0 1 .5-.5z"/>
                                                                    </svg>
                                                                </button>
                                                                <button id="zoom_out-{{ $subpastpaper->slug }}" class="btn btn-sm btn-outline-primary circular-btn">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-zoom-out" viewBox="0 0 16 16">
                                                                        <path fill-rule="evenodd" d="M6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11zM13 6.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z"/>
                                                                        <path d="M10.344 11.742c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1 6.538 6.538 0 0 1-1.398 1.4z"/>
                                                                        <path fill-rule="evenodd" d="M3 6.5a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5z"/>
                                                                    </svg>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        @empty
                                            <p>No past papers</p>
                                        @endforelse
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="row d-flex justify-content-center">
                <div class="col-sm-12 col-md-12 col-lg-10">
                    <div class="d-flex justify-content-end mb-3">
                        <h5>
                            <a id="round-button-2" type="button" class="btn btn-secondary btn-sm" href="{{ route('student.pastpapers.index') }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
                                </svg>
                                Back
                            </a>
                        </h5>
                    </div>
                    <div class="card p-3">
                        <div class="card-body">
                            <h5 class="bold">{{ $pastpaper->title }}</h5>
                            <p>{{ $pastpaper->year->name }}, {{ $pastpaper->category->name }}, {{ $pastpaper->term->name }}. </p>
                            @if($pastpaper->creator)
                                <p>By {{ $pastpaper->creator->name }}</p>
                            @endif
                            @if($pastpaper->price)
                                <span class="bold">{{ $pastpaper->currency->name }} {{ $pastpaper->formatPrice }}/-</span>
                            @else
                                <p class="bold paid_color">Free</p>
                            @endif
                            <div class="mb-5 mt-4">
                                <h5 class="bold">Past paper objectives </h5>
                                @if($pastpaper->objective)
                                    @foreach($pastpaper->objective as $pastpaper_objective)
                                    <ul>
                                        <li>
                                            <svg width="1.5em" height="1.5em" viewBox="0 0 16 20" class="bi bi-check" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" d="M10.97 4.97a.75.75 0 0 1 1.071 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.236.236 0 0 1 .02-.022z"/>
                                            </svg>
                                            {{ $pastpaper_objective }}
                                        </li>
                                    </ul>
                                    @endforeach
                                @else
                                    <p>No data</p>
                                @endif
                            </div>
                            <div class="mb-4">
                                <hr />
                            </div>
                            <div class="mt-4">
                                <livewire:buy-pastpaper :pastpaper="$pastpaper" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
</section>

<section class="bg-gray-2 small-screen_padding">
    @include('partials.categories')
</section>

@endsection

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.0.943/pdf.min.js"></script>
    <script src="{{ asset('js/custom_pdf_view_student_pastpaper.js')}}" type="text/javascript"></script>
    <script src="{{ asset('js/pastpapers.js')}}" type="text/javascript"></script>
@endpush
