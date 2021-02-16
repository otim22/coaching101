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
                        <h4>{{ $book->title }}</h4>
                        <p>{{ $book->category->name }}, {{ $book->year->name }} of {{ $book->term->name }}. </p>
                        <p>UGX {{ number_format($book->price) }}/- </p>
                        <div class="text-center">
                            <img src="{{ asset($book->default_image) }}" class="w-50 mb-2">
                            <!-- <img src="{{ asset($book->getFirstMediaUrl()) }}" class="w-30 mb-2"> -->
                        </div>
                        <button class="btn btn-secondary btn-sm float-right" href="{{ $book->getFirstMediaUrl() }}" target="_blank">
                            Download book here
                        </button>
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
