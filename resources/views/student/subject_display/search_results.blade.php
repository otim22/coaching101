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
                <li class="breadcrumb-item active" aria-current="page">Search results</li>
            </ol>
        </nav>
    </div>
</section>

<section>
    <div class="container">
        <div class="row">
            @if($searchResults->count() === 0)
                <div class="col-lg-12 col-md-12 col-sm-12 mb-4">
                    <h5>Sorry, no results found for "{{ request('query') }}"</h5>
                </div>
            @else
            <div class="col-lg-12 col-md-12 col-sm-12 mb-4">
                <h5>{{ $searchResults->count() }} results for "{{ request('query') }}"</h5>
            </div>
            @endif
        </div>

        @if($searchResults->count())
            <div class="row">
                @foreach($searchResults as $search)
                    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 mb-3">
                        <div class="card">
                            <a href="{{ route('subjects.index', $search->searchable->slug) }}" style="text-decoration: none">
                                <img src="{{ $search->searchable->cover_image}}" alt="{{ $search->searchable->very_short_title }}" width="100%" height="150">
                            </a>
                            <div class="card-body">
                                <a href="{{ route('subjects.index', $search->searchable->slug) }}" style="text-decoration: none" class="title-font">
                                    <span class="bold">{{ $search->searchable->very_short_title }}</span><br />
                                    <span class="author-font">{{$search->searchable->creator->name }}</span>
                                    @if($search->searchable->averageRating)
                                        <div class="star-display">
                                            @for($i = 0; $i <= $search->searchable->averageRating; $i++)
                                                <label for="rate-{{$i}}" class="fa fa-star"></label>
                                            @endfor
                                            <span class="author-font">({{ $search->searchable->getSubscriptionCount() }}) students</span>
                                        </div>
                                    @else
                                        <div class="rating">
                                            <svg class="bi bi-star-fill" width="0.7em" height="0.7em" viewBox="0 0 16 16" fill="grey" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.283.95l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                            </svg>
                                            <svg class="bi bi-star-fill" width="0.7em" height="0.7em" viewBox="0 0 16 16" fill="grey" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.283.95l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                            </svg>
                                            <svg class="bi bi-star-fill" width="0.7em" height="0.7em" viewBox="0 0 16 16" fill="grey" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.283.95l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                            </svg>
                                            <svg class="bi bi-star-fill" width="0.7em" height="0.7em" viewBox="0 0 16 16" fill="grey" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.283.95l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                            </svg>
                                            <svg class="bi bi-star-fill" width="0.7em" height="0.7em" viewBox="0 0 16 16" fill="grey" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.283.95l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                            </svg>
                                            <span class="author-font ml-2">({{ $search->searchable->getSubscriptionCount() }}) students</span><br />
                                        </div>
                                    @endif

                                    @if($search->searchable->price)
                                        <span class="bold">UGX {{ number_format($search->searchable->price) }}/-</span>
                                    @else
                                        <span class="bold paid_color">Free</span>
                                    @endif
                                </a>
                                <div class="mt-2 d-flex justify-content-between">
                                    <livewire:add-to-cart :subject="$search->searchable" :key="$search->searchable->id" />
                                    <livewire:add-to-wish-list :subject="$search->searchable" :key="$search->searchable->id" />
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="col-lg-12 col-md-12 col-sm-12 d-flex justify-content-center mt-5">
                    {{ $searchResults->links() }}
                </div>
            </div>
        @endif
    </div>
</section>

<section class="bg-white">
    @include('partials.categories')
</section>

@endsection
