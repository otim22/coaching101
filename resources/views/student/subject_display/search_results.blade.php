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
                <li class="breadcrumb-item">
                    <a href="{{ route('home') }}" style="text-decoration: none;">Home</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Search results</li>
            </ol>
        </nav>
    </div>
</section>

<section>
    <div class="container">
        <div class="row">
            @if($results)
                <div class="col-lg-12 col-md-12 col-sm-12 mb-4">
                    <h5>{{ $results->count() }} results for "{{ request('query') }}"</h5>
                </div>
            @else
                <div class="col-lg-12 col-md-12 col-sm-12 mb-4">
                    <h5>Sorry, no results found for "{{ request('query') }}"</h5>
                </div>
            @endif
        </div>

        <div class="row">
            @foreach($results as $search)
                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <a href="{{ route('subjects.index', $search->searchable->slug) }}" style="text-decoration: none" class="title-font">
                                <span class="bold">{{ $search->searchable->very_short_title }}</span><br />
                                <span class="author-font">{{ $search->searchable->creator->name }}</span><br />
                                @if($search->searchable->price)
                                    @if($search->searchable->isSubscribedTo)
                                        <span class="author-font">{{ $subject->currency->name }} {{  $search->searchable->formatPrice }}/- (Paid)</span><br />
                                    @else
                                        <span class="bold">{{ $subject->currency->name }} {{  $search->searchable->formatPrice }}/-</span><br />
                                    @endif
                                @else
                                    <span class="bold paid_color">Free</span>
                                @endif
                            </a>
                            <div class="mt-3 d-flex justify-content-between">
                                @if($search->searchable->isSubscribedTo)
                                    <a id="round-button-2" class="btn btn-sm btn-outline-primary" href="{{ route('subjects.index', $search->searchable) }}" style="text-decoration: none;">Start learning</a>
                                @else
                                    <livewire:add-to-cart :subject="$search->searchable" :key="$search->searchable->id" />
                                    <livewire:add-to-wish-list :subject="$search->searchable" :key="$search->searchable->id" />
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="col-lg-12 col-md-12 col-sm-12 d-flex justify-content-center mt-5">
                {{ $results->links() }}
            </div>
        </div>
    </div>
</section>

<section class="bg-gray-2">
    @include('partials.categories')
</section>

@endsection
