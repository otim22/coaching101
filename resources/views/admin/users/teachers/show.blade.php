@extends('admin.layouts.master')

@section('content')

<section>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-10 col-md-10 col-sm-12 mt-5 pt-5">
                <div class="card admin-shadow">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h5 class="pt-1"> {{ $teacher->name }}</h5>
                        </div>
                        <div>
                            <a href="{{ route('admin.teachers.index') }}" class="btn btn-secondary mr-2">
                                {{ __('Back') }}
                            </a>
                        </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <h5 class="mb-3"> {{ $subjectTaught }}</h5>
                        <ul class="nav nav-tabs" id="performanceTab" role="tablist">
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
                                    @forelse($subjects as $subject)
                                        <div class="mb-4">
                                            <h6 class="bold">{{ $subject->title }}</h6>
                                            <p>Total Revenue: <span>UGX {{ $subject->totalRevenue  }}/-</span></p>
                                        </div>
                                    @empty
                                        <p>No data to display</p>
                                    @endforelse
                                </div>
                            </div>
                            <div class="tab-pane fade" id="students" role="tabpanel" aria-labelledby="students-tab">
                                <div class="mt-4">
                                    @forelse($subjects as $subject)
                                        <div class="mb-4">
                                            <h6 class="bold">{{ $subject->title }}</h6>
                                            <p>Enrollment : <span>{{ $subject->subscriptionCount }} students</span></p>
                                        </div>
                                    @empty
                                    <p>No data to display</p>
                                    @endforelse
                                </div>
                            </div>
                            <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
                                <div class="mt-4">
                                    @forelse($subjects as $subject)
                                        <div class="mb-4">
                                            <h6 class="bold">{{ $subject->title }}</h6>
                                            @if($subject->averageRating())
                                                <p>Reviews: <span>{{ number_format($subject->averageRating(), 1, ".", "") }} stars</span></p>
                                            @else
                                                <p>Reviews: <span>No reviews yet!</span></p>
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
        </div>
    </div>
</section>

@endsection

@push('scripts')
    <script src="{{ asset('admin/vendor/jquery.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/tab-selection.js')}}" type="text/javascript"></script>
@endpush
