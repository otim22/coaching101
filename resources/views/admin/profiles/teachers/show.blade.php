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
                                <h5 class="pt-1">Teacher profile</h5>
                        </div>
                        <div>
                            <a href="{{ route('admin.teacher.profiles') }}" class="btn btn-secondary mr-2">
                                {{ __('Back') }}
                            </a>
                        </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div>
                            <p><span class="label-text">Names:</span> {{ \App\Models\User::where('id', $teacher->user_id)->firstOrFail()->name }}</p>
                        </div>
                        <div>
                            <p><span class="label-text">Email:</span> {{ \App\Models\User::where('id', $teacher->user_id)->firstOrFail()->email }}</p>
                        </div>
                        <div class="mt-3">
                            <p><span class="label-text">Telephone:</span> {{ $teacher->phone }}</p>
                        </div>
                        <div class="mt-3">
                            <p><span class="label-text">School: </span> {{ $teacher->school }}</p>
                        </div>
                        <div class="mt-3">
                            <p><span class="label-text">Bio: </span>{{ $teacher->bio }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@push('scripts')
    <script src="{{ asset('vendor/js/jquery.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/my-subjects.js')}}" type="text/javascript"></script>
@endpush
