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
                <li class="breadcrumb-item active" aria-current="page">Past paper</li>
            </ol>
        </nav>
    </div>
</section>
<div class="container">
    @include('flash.messages')
</div>
<section>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10 col-md-12 col-sm-12 off-set-1">
                <div class="card p-4">
                    <div class="d-flex justify-content-between mb-2">
                        <div>
                            <h5 class="bold">Past paper</h5>
                        </div>
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

                    <form action="{{ route('pastpapers.update', $pastpaper) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('patch')
                        <div class="form-group mb-4">
                            <label for="category_id">Subject</label>
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
                                <select class="custom-select" name="standard_id">
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
                            <label for="year_id">Term</label>
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
                            <label for="title">Past paper title</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" value="{{ old('title', $pastpaper->title) }}">
                            @error('title')
                                <div class="alert alert-danger p-2 mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <div class="form-group dynamic_pastpaper_objective">
                                <label for="pastpapers_objective">What will students learn in the past paper?</label>
                                @if($pastpaper->objective)
                                    <p class="mt-2">Current past paper objectives</p>
                                @endif
                                @foreach($pastpaper->objective as $key => $pastpaper_objective)
                                    <div class="d-flex justify-content-between">
                                        <div style="flex-grow:1">
                                            <input type="text"
                                                        value="{{ $pastpaper_objective }}"
                                                        class="form-control form-control mb-2 @error('objective.*') is-invalid @enderror"
                                                        placeholder="Example: Origin of languages"
                                                        name="objective[]">
                                        </div>
                                        <div>
                                            <p class="delete_pastpaper_objective to-delete" data-objective-id="{{ $key }}" data-delete-url="{{ route('teacher.pastpapers.objective.destroy', ['pastpaper' => $pastpaper, 'objective' => $key]) }}">x</p>
                                        </div>
                                    </div>
                                    @error('objective.*')
                                        <div class="alert alert-danger p-2 mt-2">{{ $message }}</div>
                                    @enderror
                                @endforeach

                                <div class="input-group pastpaper_objective_section">
                                    <div class="pastpapers_objective_input">
                                        <input type="text"
                                            id="pastpapers_objective"
                                            value="{{ old('objective.*') }}"
                                            class="form-control form-control mb-2 @error('objective.0') is-invalid @enderror"
                                            placeholder="Example: Origin of languages"
                                            name="objective[]">
                                    </div>
                                    <div class="hidden" id="hidden_pastpaper_objective">
                                        <p class="delete_pastpaper_objective">x</p>
                                    </div>
                                </div>
                                @error('objective.*')
                                    <div class="alert alert-danger p-2 mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <p class="btn_pastpapers_objective hidden" type="button">
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
                            <label for="price">Past paper price <span class="light_gray_color">(*Optional)</span></label>
                            <div class="input-group mb-2">
                                <input type="text"
                                            class="form-control @error('price') is-invalid @enderror"
                                            id="price"
                                            placeholder="Example price: 10000"
                                            aria-label="Enter subject price"
                                            aria-describedby="price"
                                            name="price"
                                            value="{{ old('price', $pastpaper->price) }}">
                            </div>
                            <p><small class="red_color">*Price should be only digits</small></p>
                            @error('price')
                            <div class="alert alert-danger p-2 mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <button id="round-button-2" type="submit" class="btn btn-primary float-right btn-sm">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@prepend('scripts')
    <script src="{{ asset('vendor/js/popper.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/pastpapers.js')}}" type="text/javascript"></script>
@endpush
