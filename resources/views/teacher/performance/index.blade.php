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
                <li class="breadcrumb-item">
                    <a href="{{ route('manage.subjects') }}" style="text-decoration:none;">Subjects</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Performance</li>
            </ol>
        </nav>
    </div>
</section>

<section class="section-two">
    <div class="container">
        <div class="row mt-5 mb-5">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <h5 class="bold mb-3">Overview</h5>
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                  <li class="nav-item" role="presentation">
                    <a class="nav-link active" id="pills-revenue-tab" data-toggle="pill" href="#revenue" role="tab" aria-controls="pills-revenue" aria-selected="true">Revenue</a>
                  </li>
                  <li class="nav-item" role="presentation">
                    <a class="nav-link" id="pills-students-tab" data-toggle="pill" href="#students" role="tab" aria-controls="pills-students" aria-selected="false">Students</a>
                  </li>
                  <li class="nav-item" role="presentation">
                    <a class="nav-link" id="pills-reviews-tab" data-toggle="pill" href="#reviews" role="tab" aria-controls="pills-reviews" aria-selected="false">Reviews</a>
                  </li>
                </ul>
                <div class="tab-content" id="pills-tabContent">
                  <div class="tab-pane fade show active" id="revenue" role="tabpanel" aria-labelledby="pills-revenue-tab">Revenue</div>
                  <div class="tab-pane fade" id="students" role="tabpanel" aria-labelledby="pills-students-tab">Students</div>
                  <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="pills-reviews-tab">Reviews</div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@push('scripts')
    <script src="{{ asset('vendor/js/jquery.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/performance.js')}}" type="text/javascript"></script>
@endpush
