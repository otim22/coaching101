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
                                <a type="button" href="{{ route('admin.notes.index') }}" class="btn btn-secondary" name="button">Back</a>
                            </div>
                            <div>
                                <li class="nav-item dropdown d-flex align-items-center">
                                    <a href="{{ route('admin.notes.edit', $note) }}" class="nav-link dropdown-toggle btn btn-primary" data-toggle="dropdown" aria-expanded="false">
                                        Action
                                    </a>
                                    <div class="dropdown-menu">
                                        <ul class="list-unstyled">
                                            <li>
                                                <a href="{{ route('admin.notes.edit', $note) }}" class="dropdown-item">
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
                        <h4>{{ $note->title }}</h4>
                        <p>{{ $note->category->name }} {{ $note->year->name }}, {{ $note->term->name }}. </p>
                        <p>UGX {{ number_format($note->price) }}/- </p>
                        <div class="text-center">
                            <img src="{{ asset($note->default_image) }}" class="w-50 mb-2">
                            <!-- <img src="{{ asset($note->getFirstMediaUrl()) }}" class="w-30 mb-2"> -->
                        </div>
                        <button class="btn btn-secondary btn-sm float-right" href="{{ $note->getFirstMediaUrl() }}" target="_blank">
                            Download notes here
                        </button>
                    </div>
                    <form action="{{ route('admin.notes.destroy', $note) }}" class="hidden" id="delete-book-item" method="POST">
                        @csrf
                        @method('delete')
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
