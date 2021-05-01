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
                                <h5 class="pt-1"> {{ $student->name }}</h5>
                        </div>
                        <div>
                            <a href="{{ route('admin.students.index') }}" class="btn btn-secondary mr-2">
                                {{ __('Back') }}
                            </a>
                        </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <h5 class="pb-2">Student profile</h5>
                        <div>
                            <p><span class="label-text">Email:</span> {{ $student->email }}</p>
                        </div>
                        <div class="mt-3">
                            <p><span class="label-text">Telephone:</span> {{ $student->profile->phone }}</p>
                        </div>
                        <div class="mt-3">
                            <p><span class="label-text">Age:</span> {{ $student->profile->age }}</p>
                        </div>
                        <div class="mt-3">
                            <p><span class="label-text"> Class:</span> {{ \App\Models\Year::where('id', $student->profile->year_id)->firstOrFail()->name }}</p>
                        </div>
                        <div class="mt-3">
                            <p><span class="label-text">School: </span> {{ $student->profile->school }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@push('scripts')
    <!-- <script src="{{ asset('vendor/js/jquery.min.js') }}" type="text/javascript"></script> -->
    <script src="{{ asset('js/tab-selection.js')}}" type="text/javascript"></script>
@endpush
