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
                <li class="breadcrumb-item active" aria-current="page">{{ $subject->short_title }}</li>
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
            <div class="col-lg-10  col-md-12 col-sm-12 off-set-1">
                <form action="{{ route('subjects.update', $subject) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')

                    <div class="card p-3">
                        <div class="card-body">
                            <div class="col-sm-12 col-md-12 col-lg-12 mb-2 mt-3 d-flex justify-content-between">
                                <div>
                                    <h5 class="bold">Subject introduction</h5>
                                </div>
                                <div>
                                    <a id="round-button-2" href="{{ route('subjects.show', $subject) }}" class="btn btn-secondary btn-block pl-5 pr-5">
                                        <svg width="1.3em" height="1.3em" viewBox="0 0 20 20" class="bi bi-box-arrow-in-left" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M10 3.5a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-2a.5.5 0 0 1 1 0v2A1.5 1.5 0 0 1 9.5 14h-8A1.5 1.5 0 0 1 0 12.5v-9A1.5 1.5 0 0 1 1.5 2h8A1.5 1.5 0 0 1 11 3.5v2a.5.5 0 0 1-1 0v-2z"/>
                                            <path fill-rule="evenodd" d="M4.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H14.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z"/>
                                        </svg>
                                        Back
                                    </a>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12 col-lg-12 mt-4 mb-4">
                                <hr />
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="form-group">
                                    <label for="title">Subject title</label>
                                    <div class="input-group">
                                        <input type="text"
                                                    class="form-control @error('title') is-invalid @enderror"
                                                    id="title"
                                                    aria-describedby="title"
                                                    name="title"
                                                    value="{{ old('title', $subject->title) }}"
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
                                                    id="subtitle"
                                                    aria-describedby="subtitle"
                                                    name="subtitle"
                                                    value="{{ old('subtitle', $subject->subtitle) }}">
                                        @error('subtitle')
                                            <div class="alert alert-danger p-2 mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group mb-4">
                                    <label for="description">Description</label>
                                    <textarea class="form-control @error('description') is-invalid @enderror" id="description" placeholder="Description of the subject" name="description" rows="3" required>{{ old('description', $subject->description) }}</textarea>
                                    @error('description')
                                        <div class="alert alert-danger p-2 mt-2">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group mb-4">
                                    <label for="category_id">Category</label>
                                    <div class="input-group mb-3">
                                        <select class="custom-select" name="category_id">
                                            <option selected value="{{ $category->id }}">{{ $category->name }}</option>
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
                                            <option selected value="{{ $standard->id }}">{{ $standard->name }}</option>
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
                                            <option selected value="{{ $level->id }}">{{ $level->name }}</option>
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
                                            <option selected value="{{ $year->id }}">{{ $year->name }}</option>
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
                                            <option selected value="{{ $term->id }}">{{ $term->name }}</option>
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
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="currency">{{ $subject->currency->name }}</span>
                                        </div>
                                        <input type="number"
                                                    class="form-control @error('price') is-invalid @enderror"
                                                    id="price"
                                                    aria-describedby="price"
                                                    name="price"
                                                    value="{{ old('price', $subject->price) }}">
                                        <div class="input-group-append">
                                            <span class="input-group-text">.00</span>
                                        </div>
                                    </div>
                                    <p><small style="color: gray; font-weight: bold;">*Price should be only digits</small></p>
                                    @error('price')
                                    <div class="alert alert-danger p-2 mt-2">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <p>Current image</p>
                                    <img src="{{ asset($subject->cover_image) }}" class="mb-2 rounded-corners w-100">
                                    <p><small style="color: red; font-weight: bold;">*Choosing another image replaces this current one</small></p>

                                    <label for="cover_image" class="bold">Subject image</label>
                                    <input type="file" name="cover_image" class="form-control-file @error('cover_image') is-invalid @enderror" id="cover_image" accept="image/*">
                                    @error('cover_image')
                                        <div class="alert alert-danger p-2 mt-2">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-12 col-md-12 col-lg-12 d-flex justify-content-between mt-5">
                        <div>
                            <a  id="round-button-2" href="{{ route('subjects.show', $subject) }}" class="btn btn-secondary btn-block pl-5 pr-5">
                                <svg width="1.3em" height="1.3em" viewBox="0 0 20 20" class="bi bi-box-arrow-in-left" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M10 3.5a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-2a.5.5 0 0 1 1 0v2A1.5 1.5 0 0 1 9.5 14h-8A1.5 1.5 0 0 1 0 12.5v-9A1.5 1.5 0 0 1 1.5 2h8A1.5 1.5 0 0 1 11 3.5v2a.5.5 0 0 1-1 0v-2z"/>
                                    <path fill-rule="evenodd" d="M4.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H14.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z"/>
                                </svg>
                                Back
                            </a>
                        </div>
                        <div>
                            <button id="round-button-2" type="submit" class="btn btn-primary btn-block pl-5 pr-5 ml-3 mr-3">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection

@push('scripts')
    <script src="{{ asset('js/filter_levels_and_years.js')}}" type="text/javascript"></script>
    <script src="{{ asset('js/get_right_currency.js')}}" type="text/javascript"></script>
@endpush
