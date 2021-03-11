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
                    <a href="{{ route('student.books.index') }}" style="text-decoration:none;">Books</a>
                </li>
                <li class="breadcrumb-item" aria-current="page">{{ $book->short_title }}</li>
            </ol>
        </nav>
    </div>
</section>

<section>
    <div class="container">
        @if($book->isSubscribedTo)
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-10 offset-1">
                    <h5 class="mb-4">{{ $book->title }}</h5>
                    @if($book->creator)
                        <embed src="{{ $book->getFirstMediaUrl('teacher_book') }}" type="application/pdf" width="100%" height="800" frameborder="0" allowfullscreen>
                    @else
                        <embed src="{{ $book->getFirstMediaUrl('book') }}" type="application/pdf" width="100%" height="800" frameborder="0" allowfullscreen>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-10 offset-1 mt-5 d-flex justify-content-between">
                    @if($book->creator)
                        <a id="round-button-2" class="btn btn-secondary btn-sm" href="{{ route('student.books.index') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
                            </svg>
                            Back
                        </a>

                        <a href="{{ $book->getFirstMediaUrl('teacher_book') }}" id="round-button-2"
                                        name="button"
                                        class="btn btn-primary btn-sm" target="_blank">
                                        Download book
                        </a>
                    @else
                        <a id="round-button-2" type="button" class="btn btn-secondary btn-sm" href="{{ route('student.books.index') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
                            </svg>
                            Back
                        </a>

                        <a href="{{ $book->getFirstMediaUrl('book') }}" id="round-button-2"
                                        name="button"
                                        class="btn btn-secondary btn-sm mt-5" target="_blank">
                                        Download book
                        </a>
                    @endif
                </div>
            </div>
        @else
            <div class="row d-flex justify-content-center">
                <div class="col-sm-12 col-md-12 col-lg-8">
                    <h5 class="mb-4">{{ $book->title }}</h5>
                    @if($book->creator)
                        <img src="{{ $book->getFirstMediaUrl('teacher_cover_image') }}" alt="{{ $book->very_short_title }}" class="rounded-corners" width="100%" height="auto">
                    @else
                        <img src="{{ $book->getFirstMediaUrl('cover_image') }}" alt="{{ $book->very_short_title }}" width="100%" height="auto">
                    @endif
                    <div class="mt-3">
                        <p class="author-font">By {{ $book->creator->name }}</p>
                    </div>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-8 mt-3 d-flex justify-content-between">
                    <a id="round-button-2" type="button" class="btn btn-secondary btn-sm" href="{{ route('student.books.index') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
                        </svg>
                        Back
                    </a>
                    <livewire:buy-book :book="$book" />
                </div>
            </div>
        @endif
    </div>
</section>

<section class="bg-gray-2">
    @include('partials.categories')
</section>

@endsection
