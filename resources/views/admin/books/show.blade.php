@extends('admin.layouts.master')

@section('content')

<section>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-10 col-md-10 col-sm-12 mt-5 pt-5">
                <div class="card admin-shadow">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <div>
                                <a type="button" href="{{ route('admin.books.index') }}" class="btn btn-secondary" name="button">Back</a>
                            </div>
                            <div>
                                <li class="nav-item dropdown d-flex align-items-center">
                                    <a href="{{ route('admin.books.edit', $book) }}" class="nav-link dropdown-toggle btn btn-primary" data-toggle="dropdown" aria-expanded="false">
                                        Action
                                    </a>
                                    <div class="dropdown-menu">
                                        <ul class="list-unstyled">
                                            <li>
                                                <form action="{{route('admin.books.approve', $book)}}" method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button type="submit" class="dropdown-item"> Approve </button>
                                                </form>
                                            </li>
                                            <li>
                                                <a href="{{ route('admin.books.edit', $book) }}" class="dropdown-item">
                                                    Edit
                                                </a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item"
                                                   href="#"
                                                   onclick="event.preventDefault(); document.getElementById('delete-book-item').submit();">
                                                    {{ __('Delete') }}
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <h4 class="mb-3">{{ $book->title }}</h4>
                        @if($book->creator)
                            <img src="{{ asset($book->getFirstMediaUrl('teacher_cover_image')) }}" class="w-50 mb-3">
                        @else
                            <img src="{{ asset($book->getFirstMediaUrl('cover_image')) }}" class="w-50 mb-3">
                        @endif

                        <p>{{ $book->category->name }} {{ $book->year->name }}, {{ $book->term->name }}. </p>
                        <p>UGX {{ number_format($book->price) }}/-</p>

                        @if(Auth::user()->role == 4)
                            @if($book->creator)
                                <a class="btn btn-secondary btn-sm" href="{{ $book->getFirstMediaUrl('teacher_book') }}" target="_blank">
                                    Download book
                                </a>
                            @else
                                <a class="btn btn-secondary btn-sm" href="{{ $book->getFirstMediaUrl('book') }}" target="_blank">
                                    Download book
                                </a>
                            @endif
                        @endif
                    </div>

                    <form action="{{ route('admin.books.destroy', $book) }}" class="hidden" id="delete-book-item" method="POST">
                        @csrf
                        @method('delete')
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
