@extends('layouts.app')

@section('content')

<section class="section-bread bg-gray-2">
    <div class="container">
        <nav aria-label="breadcrumb bg-gray">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ url('/') }}">
                        <svg width="1.3em" height="1.3em" viewBox="0 0 16 16" class="bi bi-house-fill pb-1" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M8 3.293l6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6zm5-.793V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"/>
                            <path fill-rule="evenodd" d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z"/>
                        </svg>
                    </a>
                </li>
                <li class="breadcrumb-item"><a style="text-decoration: none" href="{{ route('manage.subjects') }}">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">New Subject</li>
            </ol>
        </nav>
    </div>
</section>
<div class="container">
    @include('flash.messages')
</div>
<section class="section-two">
    <div class="container">
        <div class="row justify-content-center mt-5 mb-5">
            <div class="col-lg-10 col-md-12 col-sm-12 off-set-1">
                <form action="{{ route('subjects') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card p-3">
                        <div class="card-body">
                            <div class="col-sm-12 col-md-12 col-lg-12">
                                <h5 class="bold">Subject introduction</h5>
                            </div>
                            <div class="col-sm-12 col-md-12 col-lg-12 mt-4 mb-4">
                                <hr />
                            </div>
                            <div class="col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group mb-4 mt-3">
                                    <label for="title">Subject title</label>
                                    <div class="input-group">
                                        <input type="text"
                                                    class="form-control @error('title') is-invalid @enderror"
                                                    placeholder="Your subject title"
                                                    aria-label="Your subject title"
                                                    aria-describedby="title"
                                                    name="title"
                                                    value="{{ old('title') }}"
                                                    required>
                                    </div>
                                    @error('title')
                                        <div class="alert alert-danger p-2 mt-2">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group mb-4">
                                    <label for="subtitle">Sub title</label>
                                    <div class="input-group">
                                        <input type="text"
                                                    class="form-control @error('subtitle') is-invalid @enderror"
                                                    placeholder="Write your sub title"
                                                    aria-label="Write your sub title"
                                                    aria-describedby="subtitle"
                                                    name="subtitle"
                                                    value="{{ old('subtitle') }}">
                                    </div>
                                    @error('subtitle')
                                    <div class="alert alert-danger p-2 mt-2">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="hidden" class="form-control" name="item_id" value="{{ $item->id }}">
                                    </div>
                                </div>

                                <div class="form-group mb-4">
                                    <label for="description">Description</label>
                                    <textarea class="form-control @error('description') is-invalid @enderror" id="description" placeholder="Description of the subject" name="description" rows="3" required autocomplete="description" autofocus>{{ old('description') }}</textarea>
                                    @error('description')
                                        <div class="alert alert-danger p-2 mt-2">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group mb-4">
                                    <label for="category_id">Category</label>
                                    <div class="input-group mb-3">
                                        <select class="custom-select" name="category_id">
                                            <option selected>Choose category</option>
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
                                        <select class="custom-select" name="standard_id">
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
                                        <select class="custom-select" name="level_id">
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
                                        <select class="custom-select" name="year_id">
                                            <option selected>Choose year</option>
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
                                    <label for="term_id">Term</label>
                                    <div class="input-group mb-3">
                                        <select class="custom-select" name="term_id">
                                            <option selected>Choose term</option>
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
                                    <label for="price">Subject price</label>
                                    <div class="input-group">
                                        <input type="number"
                                                    class="form-control @error('price') is-invalid @enderror"
                                                    placeholder="Example price: 20000"
                                                    aria-label="Enter subject price"
                                                    aria-describedby="price"
                                                    name="price"
                                                    value="{{ old('price') }}">
                                    </div>
                                    <p><small class="light_gray_color">*Price should be only digits</small></p>
                                    @error('price')
                                    <div class="alert alert-danger p-2 mt-2">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group mb-4">
                                    <label for="currency">Currency</label>
                                    <div class="input-group">
                                        <select class="custom-select" name="currency">
                                            <option selected>Select currency</option>
                                            <option value="USD">USD</option>
                                            <option value="UGX">UGX</option>
                                        </select>
                                    </div>
                                    <p><small class="light_gray_color">*The currency should match price above</small></p>
                                    @error('currency')
                                    <div class="alert alert-danger p-2 mt-2">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="cover_image">Subject cover image</label>
                                    <input type="file" name="cover_image" class="form-control-file @error('cover_image') is-invalid @enderror" id="cover_image" required accept="image/*">
                                    @error('cover_image')
                                        <div class="alert alert-danger p-2 mt-2">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-12 col-md-12 col-lg-12 d-flex justify-content-between mt-5">
                        <div><h5>Step 1 of 3</h5></div>
                        <div>
                            <button id="round-button-2" type="submit" class="btn btn-primary btn-block btn-md pl-5 pr-5 ml-3 mr-3">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

@endsection
