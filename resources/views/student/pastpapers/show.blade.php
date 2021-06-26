@extends('layouts.app')

@section('content')

<section class="section-bread bg-gray-2">
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
                <li class="breadcrumb-item" aria-current="page">
                    <a href="{{ route('student.pastpapers.index') }}" style="text-decoration:none;">Past papers</a>
                </li>
                <li class="breadcrumb-item" aria-current="page">{{ $pastpaper->short_title }}</li>
            </ol>
        </nav>
    </div>
</section>

<section>
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
                                    <a id="round-button-2" class="btn btn-secondary btn-sm" href="{{ route('student.pastpapers.index') }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
                                        </svg>
                                        Back
                                    </a>
                                </div>
                            </div>
                            <div class="mb-4">
                                <hr />
                            </div>
                            <div class="row">
                                <div class="col-lg-3 col-md-3 col-sm-12">
                                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                        @forelse($pastpaper->subpastpapers as $key => $subpastpaper)
                                            @if($subpastpaper->parent_id == null)
                                                <a type="button" style="text-decoration: none; margin-bottom: 3px;"
                                                        class="{{ $key == $pastpaper->subpastpapers->keys()->first() ? 'active' : '' }}"
                                                        id="v-pills-{{$subpastpaper->slug}}-tab"
                                                        data-toggle="pill"
                                                        href="#v-pills-{{$subpastpaper->slug}}"
                                                        role="tab"
                                                        aria-controls="v-pills-{{$subpastpaper->slug}}"
                                                        aria-selected="true">
                                                    Qtn. {{ $subpastpaper->title }}
                                                </a>
                                            @endif
                                            @if($subpastpaper->parent_id != null)
                                                <a type="button" style="text-decoration: none;"
                                                        class="{{ $key == $pastpaper->subpastpapers->keys()->first() ? 'active' : '' }}"
                                                        id="v-pills-{{$subpastpaper->slug}}-tab"
                                                        data-toggle="pill"
                                                        href="#v-pills-{{$subpastpaper->slug}}"
                                                        role="tab"
                                                        aria-controls="v-pills-{{$subpastpaper->slug}}"
                                                        aria-selected="true">
                                                    Ans. {{ $subpastpaper->title }}
                                                </a>
                                                <div class="mb-1">
                                                    <hr />
                                                </div>
                                            @endif
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
                                                    <div>
                                                        <embed src="{{ $subpastpaper->getFirstMediaUrl('pastpapers') }}#toolbar=0" type="application/pdf" width="100%" height="600" frameborder="0" allowfullscreen>
                                                    </div>
                                                </div>
                                            @else
                                                <div class="tab-pane fade show {{ $key == $pastpaper->subpastpapers->keys()->first() ? 'active' : '' }}" id="v-pills-{{$subpastpaper->slug}}" role="tabpanel" aria-labelledby="v-pills-{{$subpastpaper->slug}}-tab">
                                                    <p>{{ $subpastpaper->title }}</p>
                                                    <div>
                                                        <embed src="{{ $subpastpaper->getFirstMediaUrl('answers') }}#toolbar=0" type="application/pdf" width="100%" height="600" frameborder="0" allowfullscreen>
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
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <div class="card p-3">
                        <div class="card-body">
                            <div>
                                <h5>
                                    <a id="round-button-2" type="button" class="btn btn-secondary btn-sm" href="{{ route('student.pastpapers.index') }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
                                        </svg>
                                        Back
                                    </a>
                                </h5>
                            </div>
                            <div class="mb-4">
                                <hr />
                            </div>
                            <h5 class="bold">{{ $pastpaper->title }}</h5>
                            <p>{{ $pastpaper->year->name }}, {{ $pastpaper->category->name }}, {{ $pastpaper->term->name }}. </p>
                            @if($pastpaper->creator)
                                <p>By {{ $pastpaper->creator->name }}</p>
                            @endif
                            @if($pastpaper->price)
                                <span class="bold">UGX {{ $pastpaper->formatPrice }}/-</span>
                            @else
                                <p class="bold paid_color">Free</p>
                            @endif
                            <div class="mb-3 mt-4">
                                <h5 class="bold">Past paper objectives </h5>
                                @if($pastpaper->objective)
                                    @foreach($pastpaper->objective as $pastpaper_objective)
                                    <p>
                                        <svg width="1.5em" height="1.5em" viewBox="0 0 16 20" class="bi bi-check" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M10.97 4.97a.75.75 0 0 1 1.071 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.236.236 0 0 1 .02-.022z"/>
                                        </svg>
                                        {{ $pastpaper_objective }}
                                    </p>
                                    @endforeach
                                @else
                                    <p>No data</p>
                                @endif
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

<section class="bg-gray-2">
    @include('partials.categories')
</section>

@endsection

@push('scripts')
    <script src="{{ asset('js/pastpapers.js')}}" type="text/javascript"></script>
@endpush
