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
                <li class="breadcrumb-item active" aria-current="page">Subjects</li>
            </ol>
        </nav>
    </div>
</section>

<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 mb-3">
                <h4 class="bold">{{ $category->name }}</h4>
            </div>
            @forelse($subjects as $subject)
                <div class="col-sm-6 col-md-6 col-lg-3">
                    <div class="card mb-4">
                        <a href="{{ route('subjects.index', $subject->slug) }}" style="text-decoration: none">
                            <img src="{{ $subject->cover_image}}" alt="{{ $subject->very_short_title }}" width="100%" height="150">
                        </a>
                        <div class="card-body">
                            <a href="{{ route('subjects.index', $subject->slug) }}" style="text-decoration: none" class="title-font">
                                <span class="bold">{{ $subject->very_short_title }}</span><br />
                                <span class="author-font">By {{$subject->creator->name }}</span>
                                @if($subject->averageRating)
                                <div class="star-display">
                                    @for($i = $subject->averageRating; $i >= 1; $i--)
                                        <label for="rate-{{$i}}" class="fa fa-star"></label>
                                    @endfor
                                    @if($subject->isSubscribedTo)
                                        <span class="author-font ml-2">({{ $subject->subscriptionCount }}) students</span><br />
                                    @endif
                                </div>
                                @else
                                    <div class="rating">
                                        @for($i = 0; $i < 5; $i++)
                                            <svg class="bi bi-star-fill" width="0.7em" height="0.7em" viewBox="0 0 16 16" fill="grey" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.283.95l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                            </svg>
                                        @endfor
                                        @if($subject->isSubscribedTo)
                                            <span class="author-font ml-2">({{ $subject->subscriptionCount }}) students</span><br />
                                        @endif
                                    </div>
                                @endif

                                @if($subject->price)
                                    <span class="bold">UGX {{  rtrim(rtrim(number_format($subject->price, 2), 2), '.') }}/-</span>
                                @else
                                    <span class="bold paid_color">Free</span>
                                @endif
                            </a>
                            <div class="mt-2 d-flex justify-content-between">
                                <livewire:add-to-cart :subject="$subject" :key="$subject->id" />
                                <livewire:add-to-wish-list :subject="$subject" :key="$subject->id" />
                            </div>
                        </div>
                    </div>
                </div>
            @empty
            <div class="col-sm-12 col-md-12 col-lg-12 mb-2">
                <p>Sorry, no available subjects in this category!</p>
            </div>
            @endforelse
            <div class="col-sm-12 col-md-12 col-lg-12 d-flex justify-content-center mt-5">
                <p>{{$subjects->links() }}</p>
            </div>
        </div>
    </div>
</section>

<section class="bg-white">
    @include('partials.categories')
</section>

@endsection
