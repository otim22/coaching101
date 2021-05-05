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
                <li class="breadcrumb-item">
                    <a href="{{ route('manage.subjects') }}" style="text-decoration:none;">Dashboard</a>
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
                <div class="d-flex justify-content-between">
                    <div>
                        <h5 class="bold mb-4">Performance overview</h5>
                    </div>
                    <div>
                        <a id="round-button-2" href="{{ route('manage.subjects') }}" class="btn btn-secondary btn-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left mr-2" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
                            </svg>
                            Back
                        </a>
                    </div>
                </div>
                <ul class="nav nav-tabs" id="nav-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" id="revenue-tab" data-toggle="tab" href="#revenue" role="tab" aria-controls="revenue" aria-selected="true">Revenue</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="students-tab" data-toggle="tab" href="#students" role="tab" aria-controls="students" aria-selected="false">Students</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="reviews-tab" data-toggle="tab" href="#reviews" role="tab" aria-controls="reviews" aria-selected="false">Reviews</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="revenue" role="tabpanel" aria-labelledby="revenue-tab">
                        <div class="mt-4">
                            <!-- <div class="row" style="display: flex; justify-content: flex-end">
                                <div class="col-lg-4 col-md-4 col-sm-12 mb-3  mt-2">
                                    <div class="resource-filter_input">
                                        <select class="custom-select" id="performance_filter">
                                            <option>All time</option>
                                            <option value="30">Last 30 days</option>
                                            <option value="90">Last 3 months</option>
                                            <option value="365">Last 12 months</option>
                                        </select>
                                    </div>
                                </div>
                            </div> -->
                            @forelse($subjects as $subject)
                                <div class="mb-4">
                                    <h6 class="bold">{{ $subject->title }}</h6>
                                    <p>Total Revenue: <span  class="revenue-font">UGX {{ $subject->totalRevenue  }}/-</span></p>
                                </div>
                            @empty
                                <p>No data to display</p>
                            @endforelse
                        </div>
                    </div>
                    <div class="tab-pane fade" id="students" role="tabpanel" aria-labelledby="students-tab">
                        <div class="mt-4">
                            <!-- <div class="row" style="display: flex; justify-content: flex-end">
                                <div class="col-lg-4 col-md-4 col-sm-12 mb-3  mt-2">
                                    <div class="resource-filter_input">
                                        <select class="custom-select" id="performance_filter">
                                            <option>All time</option>
                                            <option value="30">Last 30 days</option>
                                            <option value="90">Last 3 months</option>
                                            <option value="365">Last 12 months</option>
                                        </select>
                                    </div>
                                </div>
                            </div> -->
                            @forelse($subjects as $subject)
                                <div class="mb-4">
                                    <h6 class="bold">{{ $subject->title }}</h6>
                                    <p>Enrollment : <span  class="revenue-font">{{ $subject->subscriptionCount }} students</span></p>
                                </div>
                            @empty
                            <p>No data to display</p>
                            @endforelse
                        </div>
                    </div>
                    <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
                        <div class="mt-4">
                            <!-- <div class="row" style="display: flex; justify-content: flex-end">
                                <div class="col-lg-4 col-md-4 col-sm-12 mb-3  mt-2">
                                    <div class="resource-filter_input">
                                        <select class="custom-select" id="performance_filter">
                                            <option>All time</option>
                                            <option value="30">Last 30 days</option>
                                            <option value="90">Last 3 months</option>
                                            <option value="365">Last 12 months</option>
                                        </select>
                                    </div>
                                </div>
                            </div> -->
                            @forelse($subjects as $subject)
                                <div class="mb-4">
                                    <h6 class="bold">{{ $subject->title }}</h6>
                                    @if($subject->averageRating())
                                        <p>Reviews: <span  class="revenue-font">{{ number_format($subject->averageRating(), 1, ".", "") }} stars</span></p>
                                    @else
                                        <p>Reviews: <span  class="revenue-font">No reviews yet!</span></p>
                                    @endif
                                </div>
                            @empty
                            <p>No data to display</p>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@push('scripts')
    <script src="{{ asset('js/tab-selection.js')}}" type="text/javascript"></script>
@endpush
