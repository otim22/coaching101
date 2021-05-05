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
                <li class="breadcrumb-item active mr-auto" aria-current="page">Home</li>
            </ol>
        </nav>
    </div>
</section>

<div class="container">
    @include('flash.messages')
</div>

<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-2 col-md-3 col-sm-12 mb-4">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <h5 class="bold">Filter by:</h5>
                        <div class="pt-3 mb-3">
                            <h6 class="bold">Subject</h6>
                            <div class="resource-filter_input">
                                <select class="custom-select" id="category">
                                    <option>{{ \App\Constants\GlobalConstants::ALL_SUBJECTS }}</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="mb-3">
                            <h6 class="pt-3 bold">Class</h6>
                            <div class="resource-filter_input">
                                <select class="custom-select" id="year">
                                    <option>{{ \App\Constants\GlobalConstants::ALL_YEARS }}</option>
                                    @foreach($years as $year)
                                        <option value="{{ $year->id }}">{{ $year->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="mb-3">
                            <h6 class="pt-3 bold">Term</h6>
                            <div class="resource-filter_input">
                                <select class="custom-select" id="term">
                                    <option>{{ \App\Constants\GlobalConstants::ALL_TERMS }}</option>
                                        @foreach($terms as $term)
                                    <option value="{{ $term->id }}">{{ $term->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-10 col-md-9 col-sm-12"  id="subject_data">
                @include('student.subject_display.filtered_subjects')
            </div>
        </div>
    </div>
</section>

<section class="bg-white">
    @include('partials.categories')
</section>

<section class="bg-gray-2">
    @include('partials.teachers')
</section>

@endsection

@push('scripts')
    <script src="{{ asset('js/tab-selection.js')}}" type="text/javascript"></script>
    <script src="{{ asset('js/home.js')}}" type="text/javascript"></script>
@endpush
