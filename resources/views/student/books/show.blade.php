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

<section class="small-screen_padding">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-sm-12 col-md-12 col-lg-10">
                <div class="float-right mb-3">
                    <h5>
                        @if($book->isSubscribedTo)
                            <a id="round-button-2" type="button" class="btn btn-secondary btn-sm" href="{{ route('my-account') }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
                                </svg>
                                Back
                            </a>
                        @else
                            <a id="round-button-2" type="button" class="btn btn-secondary btn-sm" href="{{ route('student.books.index') }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
                                </svg>
                                Back
                            </a>
                        @endif
                    </h5>
                </div>
            </div>
        </div>
        @if($book->isSubscribedTo)
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-10 offset-1">
                    <h5 class="bold">{{ $book->title }}</h5>
                    @if($book->creator)
                        <div class="mb-3">
                            <p>By {{ $book->creator->name }}</p>
                        </div>
                        <div>@include('student.partials.pdf_viewer')</div>
                    @endif
                </div>
            </div>
        @else
            <div class="row d-flex justify-content-center">
                <div class="col-sm-12 col-md-12 col-lg-10">
                    <div class="card p-3">
                        <div class="card-body">
                            <h5 class="bold mb-4">{{ $book->title }}</h5>
                            <div class="mb-4">
                                <img src="{{ $book->getFirstMediaUrl('cover_images') }}" alt="{{ $book->very_short_title }}" class="rounded-corners" width="100%" height="auto">
                            </div>

                            <div>
                                @if($book->creator)
                                    <span>By {{ $book->creator->name }}</span> <br/>
                                @endif
                                @if($book->price)
                                    <span class="bold">{{ $book->currency->name }} {{ $book->formatPrice }}/-</span>
                                @else
                                    <span class="bold paid_color">Free</span>
                                    @if($book->creator)
                                        <div>@include('student.partials.pdf_viewer')</div>
                                    @endif
                                @endif
                            </div>

                            <div class="mb-5 mt-3">
                                <h5 class="bold">Book objectives </h5>
                                @if($book->book_objective)
                                    @foreach($book->book_objective as $book_objective)
                                    <ul>
                                        <li>
                                            <svg width="1.5em" height="1.5em" viewBox="0 0 16 20" class="bi bi-check" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" d="M10.97 4.97a.75.75 0 0 1 1.071 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.236.236 0 0 1 .02-.022z"/>
                                            </svg>
                                            {{ $book_objective }}
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
                                <livewire:buy-book :book="$book" />
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
    <script src="{{ asset('js/custom_pdf_view_student_book.js')}}" type="text/javascript"></script>
@endpush
