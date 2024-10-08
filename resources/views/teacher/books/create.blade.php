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
                    <a href="{{ route('manage.subjects') }}" style="text-decoration: none;">Dashboard</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Create Pdf book</li>
            </ol>
        </nav>
    </div>
</section>
<div class="container">
    @include('flash.messages')
</div>
<section class="small-screen_padding">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10 col-md-12 col-sm-12 off-set-1">
                <div class="card p-3">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h5 class="bold">New Pdf book</h5>
                            </div>
                            <div>
                                <a id="round-button-2" href="{{ route('teacher.books') }}" class="btn btn-secondary">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left mr-2 mb-1" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
                                    </svg>
                                    Back books
                                </a>
                            </div>
                        </div>
                        <div>
                            <hr />
                        </div>
                        <form action="{{ route('books.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group mb-4">
                                <label for="category_id">Subject</label>
                                <div class="input-group mb-3">
                                    <select class="custom-select" name="category_id">
                                        <option selected>Select subject</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('category_id')
                                    <div class="alert alert-danger p-2 mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mb-4">
                                <label for="standard_id">Standard</label>
                                <div class="input-group mb-3">
                                    <select class="custom-select standard" name="standard_id">
                                        <option selected>Select standard</option>
                                        @foreach($standards as $standard)
                                            <option value="{{ $standard->id }}">{{ $standard->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('standard_id')
                                <div class="alert alert-danger p-2 mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mb-4">
                                <label for="level_id">Level</label>
                                <div class="input-group mb-3">
                                    <select class="custom-select level" name="level_id" id="level_id">
                                        <option selected>Select level</option>
                                        @foreach($levels as $level)
                                            <option value="{{ $level->id }}">{{ $level->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('level_id')
                                <div class="alert alert-danger p-2 mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mb-4">
                                <label for="year_id">Year</label>
                                <div class="input-group mb-3">
                                    <select class="custom-select" name="year_id" id="year_id">
                                        <option selected>Select year</option>
                                        @foreach($years as $year)
                                            <option value="{{ $year->id }}">{{ $year->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('year_id')
                                    <div class="alert alert-danger p-2 mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mb-4">
                                <label for="year_id">Term</label>
                                <div class="input-group mb-3">
                                    <select class="custom-select" name="term_id">
                                        <option selected>Select term</option>
                                        @foreach($terms as $term)
                                            <option value="{{ $term->id }}">{{ $term->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('term_id')
                                <div class="alert alert-danger p-2 mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="title">Book title</label>
                                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="title" placeholder="Example: Introduction to modern physics" value="{{ old('title') }}">
                                @error('title')
                                    <div class="alert alert-danger p-2 mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <div class="input-group">
                                    <input type="hidden" class="form-control" name="item_id" value="{{ $item->id }}">
                                </div>
                            </div>

                            <div class="mb-4">
                                <div class="form-group dynamic_book_objective">
                                    <label for="books_objective">What will students learn in the book?</label>
                                    <div class="input-group book_objective_section">
                                        <div class="books_objective_input">
                                            <input type="text"
                                                id="books_objective"
                                                value="{{old('objective.0')}}"
                                                class="form-control form-control mb-2 @error('objective.0') is-invalid @enderror"
                                                placeholder="Example: Origin of languages"
                                                name="objective[]" required>
                                        </div>
                                        <div class="hidden" id="hidden_book_objective">
                                            <p class="delete_book_objective">x</p>
                                        </div>
                                    </div>
                                    @error('objective.0')
                                        <div class="alert alert-danger p-2 mt-2">{{ $message }}</div>
                                    @enderror
                                </div>

                                <p class="btn_books_objective hidden" type="button">
                                    <span class="mr-1">
                                        <svg class="bi bi-plus-circle" width="1.3em" height="1.3em" viewBox="0 0 16 20" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M8 3.5a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-.5.5H4a.5.5 0 0 1 0-1h3.5V4a.5.5 0 0 1 .5-.5z"/>
                                            <path fill-rule="evenodd" d="M7.5 8a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1H8.5V12a.5.5 0 0 1-1 0V8z"/>
                                            <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                        </svg>
                                    </span>
                                    Add answer
                                </p>
                            </div>

                            <div class="form-group mb-4">
                                <label for="cover_image">Cover image</label>
                                <input type="file" name="cover_image" class="form-control-file @error('cover_image') is-invalid @enderror" id="cover_image" required accept="image/*">
                                @error('cover_image')
                                    <div class="alert alert-danger p-2 mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mb-4">
                                <label for="book">Upload Book</label>
                                <input type="file" name="book"
                                            class="form-control-file @error('book') is-invalid @enderror"
                                            id="book"
                                            multiple accept="image/*,.pdf"
                                            required>
                                <p><small class="light_gray_color">*Book should be a pdf file</small></p>
                                @error('book')
                                    <div class="alert alert-danger p-2 mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mb-4">
                                <label for="price">Book price <span class="light_gray_color">(*Optional)</span></label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="currency">$</span>
                                    </div>
                                    <input type="number"
                                                class="form-control @error('price') is-invalid @enderror"
                                                placeholder="Example price: 10000"
                                                aria-label="Enter subject price"
                                                aria-describedby="price"
                                                name="price"
                                                value="{{ old('price') }}">
                                    <div class="input-group-append">
                                        <span class="input-group-text">.00</span>
                                    </div>
                                </div>
                                <p class="mt-2"><small class="light_gray_color">*Price should be only digits</small></p>
                                @error('price')
                                    <div class="alert alert-danger p-2 mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <button id="round-button-2" type="submit" class="btn btn-primary float-right">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@push('scripts')
    <script src="{{ asset('js/books.js')}}" type="text/javascript"></script>
    <script src="{{ asset('js/filter_item_content.js')}}" type="text/javascript"></script>
    <script src="{{ asset('js/get_right_currency.js')}}" type="text/javascript"></script>
@endpush
