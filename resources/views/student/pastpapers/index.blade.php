@extends('layouts.app')

@section('content')

<section class="section-bread bg-gray-2"  style="background: linear-gradient(to right, rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.05)), url({{ asset('/images/bridge.jpg') }}); width: 100%; height: auto; background-size: cover;">
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
                <li class="breadcrumb-item bold">
                    <a href="{{ route('home') }}" style="text-decoration: none;">Home</a>
                </li>
                <li class="breadcrumb-item bold active" aria-current="page">Past papers</li>
            </ol>
        </nav>
    </div>
</section>

<section class="small-screen_padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-2 col-md-3 col-sm-12 mb-4">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <h4 class="bold">Filter by:</h4>
                        <div class="pt-3 mb-3">
                            <h6 class="bold">Subject</h6>
                            <div class="resource-filter_input">
                                <select class="custom-select" id="pastpaper_category">
                                    <option selected>{{ \App\Constants\GlobalConstants::ALL_SUBJECTS }}</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="pt-3 mb-3">
                            <h6 class="bold">Level</h6>
                            <div class="resource-filter_input">
                                <select class="custom-select level" id="level">
                                    <option selected>{{ \App\Constants\GlobalConstants::ALL_LEVELS }}</option>
                                    @foreach($levels as $level)
                                        <option value="{{ $level->id }}">{{ $level->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="mb-3">
                            <h6 class="pt-3 bold">Class</h6>
                            <div class="resource-filter_input">
                                <select class="custom-select" id="pastpaper_year">
                                    <option selected>{{ \App\Constants\GlobalConstants::ALL_YEARS }}</option>
                                    @foreach($standardYears as $standardYear)
                                        <option value="{{ $standardYear->id }}">{{ $standardYear->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="mb-3">
                            <h6 class="pt-3 bold">Term</h6>
                            <div class="resource-filter_input">
                                <select class="custom-select" id="pastpaper_term">
                                    <option selected>{{ \App\Constants\GlobalConstants::ALL_TERMS }}</option>
                                        @foreach($terms as $term)
                                    <option value="{{ $term->id }}">{{ $term->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-10 col-md-9 col-sm-12" id="pastpaper_data">
                @include('student.pastpapers.partials.filtered_pastpapers')
            </div>
        </div>
    </div>
</section>

<section class="bg-gray-2 small-screen_padding">
    @include('partials.categories')
</section>

@endsection

@push('scripts')
    <script src="{{ asset('js/pastpapers.js')}}" type="text/javascript"></script>
    <script src="{{ asset('js/student_pastpapers.js')}}" type="text/javascript"></script>
@endpush
