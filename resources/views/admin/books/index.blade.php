@extends('admin.layouts.master')

@section('content')

<section>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-10 col-md-10 col-sm-12 mt-5 pt-5">
                <div class="card admin-shadow">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <div><h4>Books</h4></div>
                            <div>
                                <a type="button" href="{{ route('admin.books.create') }}" class="btn btn-primary pt-1" name="button">Upload Books</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        @forelse($books as $book)
                            <h5 class="mb-2">
                                <a href="{{ route('admin.books.show', $book) }}" style="text-decoration: none;">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-check" viewBox="0 0 18 18">
                                        <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z"/>
                                    </svg>
                                    {{ Str::ucfirst($book->title) }}
                                </a>
                            </h5>
                        @empty
                            <p class="mb-2">No available books</p>
                        @endforelse
                    </div>
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 d-flex justify-content-center">
                {{ $books->links() }}
            </div>
        </div>
    </div>
</section>

@endsection
