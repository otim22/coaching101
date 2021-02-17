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
                <li class="breadcrumb-item active" aria-current="page">Books</li>
            </ol>
        </nav>
    </div>
</section>

<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-2 col-md-3 col-sm-12 mb-4">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <h5 class="bold">Filter by:</h5>
                        <div class="pt-3 mb-3">
                            <h6 class="bold">Subject</h6>
                            <div class="resource-filter_input">
                                <select class="custom-select" id="category">
                                    <option>{{ \App\Constants\GlobalConstants::ALL_SUBJECTS }}</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="mb-3">
                            <h6 class="pt-3 bold">Year</h6>
                            <div class="resource-filter_input">
                                <select class="custom-select" id="year">
                                    <option>{{ \App\Constants\GlobalConstants::ALL_YEARS }}</option>
                                    @foreach($years as $year)
                                        <option value="{{ $year->id }}">{{ $year->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="mb-3">
                            <h6 class="pt-3 bold">Term</h6>
                            <div class="resource-filter_input">
                                <select class="custom-select" id="term">
                                    <option>{{ \App\Constants\GlobalConstants::ALL_TERMS }}</option>
                                        @foreach($terms as $term)
                                    <option value="{{ $term->id }}">{{ $term->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-10 col-md-9 col-sm-12"  id="subject_data">
                <div class="row">
                    @forelse($books as $book)
                    <div class="col-lg-4 col-md-6 col-sm-12 mb-3">
                        <div class="mb-3">
                            <p>{{ $book->title }}</p>
                            <div class="card">
                                <a href="#" style="text-decoration: none">
                                    <img src="{{ $book->getFirstMediaUrl('cover_image') }}" alt="" width="100%" height="150">
                                </a>
                                <div class="card-body card-body_custom">
                                    <a href="#" style="text-decoration: none" class="title-font">
                                        <span class="bold">{{ $book->short_title }}</span><br />
                                        @if($book->creator !== null)
                                            <span class="author-font">By {{ $book->creator->name }}</span><br />
                                        @else
                                            <span class="author-font">By Coaching101</span><br />
                                        @endif

                                        @if($book->price !== null)
                                            <span class="bold">UGX {{ number_format($book->price) }}/-</span>
                                        @else
                                            <span class="bold">Free</span>
                                        @endif
                                    </a>
                                    <div class="mt-2">
                                        <livewire:buy-book :book="$book" :key="$book->id" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="col-lg-12 col-md-12 col-sm-12 d-flex justify-content-center mt-4">
                        <p>No books available</p>
                    </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</section>

<section class="bg-white">
    @include('partials.categories')
</section>

<section class="seven">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-9 col-sm-12">
                <div class="d-flex">
                    <div class="mr-4">
                        <svg class="bi bi-collection-play" width="4em" height="4em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M14.5 13.5h-13A.5.5 0 011 13V6a.5.5 0 01.5-.5h13a.5.5 0 01.5.5v7a.5.5 0 01-.5.5zm-13 1A1.5 1.5 0 010 13V6a1.5 1.5 0 011.5-1.5h13A1.5 1.5 0 0116 6v7a1.5 1.5 0 01-1.5 1.5h-13zM2 3a.5.5 0 00.5.5h11a.5.5 0 000-1h-11A.5.5 0 002 3zm2-2a.5.5 0 00.5.5h7a.5.5 0 000-1h-7A.5.5 0 004 1z" clip-rule="evenodd"/>
                            <path fill-rule="evenodd" d="M6.258 6.563a.5.5 0 01.507.013l4 2.5a.5.5 0 010 .848l-4 2.5A.5.5 0 016 12V7a.5.5 0 01.258-.437z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                    <div>
                        <h4 class="bold">Teach students online</h4>
                        <p>Top teachers from best schools teaching millions of students on Coaching101.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-12">
                @guest
                    <a id="round-button-2" href="{{ url('login') }}" class="btn btn-primary" name="button">Start teaching</a>
                @endguest

                @if(auth()->user()->role == 1)
                    <a id="round-button-2" href="{{ route('subjects.starter') }}" class="btn btn-primary" name="button">Start teaching</a>
                @endif

                @if(auth()->user()->role == 2)
                    <a id="round-button-2" href="{{ route('manage.subjects') }}" class="btn btn-primary" name="button">My Subjects</a>
                @endif
            </div>
        </div>
    </div>
</section>
@endsection
