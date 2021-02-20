@extends('layouts.app')

@section('content')

<section class="section-bread bg-gray-4">
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
                    <a href="{{ route('manage.subjects') }}" style="text-decoration: none;">Subjects</a>
                </li>
                <li class="breadcrumb-item" aria-current="page">
                    <a href="{{ url('teacher/books') }}" style="text-decoration: none;">Books</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    {{$book->title}}
                </li>
            </ol>
        </nav>
    </div>
</section>

<section>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-12 col-sm-12 off-set-2">
                <div class="card p-4">
                    <div class="d-flex justify-content-between">
                        <div>
                            <a id="round-button-2" href="{{ route('books.index') }}" class="btn btn-secondary btn-sm">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left mr-2" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
                                </svg>
                                Back
                            </a>
                        </div>
                        <div class="dropdown">
                            <button id="round-button-2" class="btn btn-primary dropdown-toggle btn-sm" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Action
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="{{ route('books.edit', $book) }}"> Edit</a>
                                <a class="dropdown-item" href="#"
                                        onclick="event.preventDefault(); document.getElementById('delete-teacher-book').submit();">
                                    {{ __('Delete') }}
                                </a>
                            </div>
                        </div>
                    </div>

                    <hr />

                    <h5 class="mt-2">{{ $book->title }}</h5>
                    <img src="{{ asset($book->getFirstMediaUrl('teacher_cover_image')) }}" class="w-100 mb-3">
                    <p>{{ $book->category->name }} {{ $book->year->name }}, {{ $book->term->name }}. </p>
                    <p>UGX {{ number_format($book->price) }}/-</p>
                    <embed src="{{ $book->getFirstMediaUrl('teacher_book') }}" type="application/pdf" width="100%" height="400">
                    <a id="round-button-2" class="btn btn-secondary btn-sm mt-3" href="{{ $book->getFirstMediaUrl('teacher_book') }}" target="_blank">
                        Download book
                    </a>

                    <form action="{{ route('books.destroy', $book) }}" class="hidden" id="delete-teacher-book" method="POST">
                        @csrf
                        @method('delete')
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
