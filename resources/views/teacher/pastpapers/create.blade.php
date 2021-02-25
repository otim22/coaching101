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
                <li class="breadcrumb-item active" aria-current="page">Past paper</li>
            </ol>
        </nav>
    </div>
</section>

<section>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-12 col-sm-12 off-set-2">
                <div class="card p-4">
                    <div class="d-flex justify-content-between mb-2">
                        <div>
                            <a id="round-button-2" href="{{ route('teacher.pastpapers') }}" class="btn btn-secondary btn-sm">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left mr-2" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
                                </svg>
                                Back
                            </a>
                        </div>
                    </div>

                    <hr />

                    <form action="{{ route('pastpapers.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-4">
                            <label for="year_id">Subject</label>
                            <div class="input-group mb-3">
                                <select class="custom-select" name="category_id">
                                    <option selected>Choose subject...</option>
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
                            <label for="year_id">Year</label>
                            <div class="input-group mb-3">
                                <select class="custom-select" name="year_id">
                                    <option selected>Choose year...</option>
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
                                    <option selected>Choose term...</option>
                                    @foreach($terms as $term)
                                        <option value="{{ $term->id }}">{{ $term->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('term_id')
                            <div class="alert alert-danger p-2 mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-4">
                            <label for="title">Past paper title</label>
                            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="title" placeholder="Example: Introduction to modern physics">
                            @error('title')
                                <div class="alert alert-danger p-2 mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-4">
                            <label for="pastpaper">Upload Past paper</label>
                            <input type="file" name="pastpaper" class="form-control-file @error('pastpaper') is-invalid @enderror" id="pastpaper" required>
                            <p><small class="light_gray_color">*Past paper should be a pdf file</small></p>
                            @error('pastpaper')
                                <div class="alert alert-danger p-2 mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-4">
                            <label for="price">Past paper price <span class="light_gray_color">(*Optional)</span></label>
                            <div class="input-group">
                                <input type="text"
                                            class="form-control @error('price') is-invalid @enderror"
                                            id="price"
                                            placeholder="Example price: 10000"
                                            aria-label="Enter subject price"
                                            aria-describedby="price"
                                            name="price"
                                            value="{{ old('price') }}">
                            </div>
                            <p class="mt-2"><small class="light_gray_color">*Price should be only digits</small></p>
                            @error('price')
                            <div class="alert alert-danger p-2 mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <button id="round-button-2" type="submit" class="btn btn-primary float-right btn-sm">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
