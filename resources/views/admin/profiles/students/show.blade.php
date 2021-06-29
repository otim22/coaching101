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
                                <h5 class="pt-1">Student profile</h5>
                        </div>
                        <div>
                            <a href="{{ route('admin.student.profiles') }}" class="btn btn-secondary mr-2">
                                {{ __('Back') }}
                            </a>
                        </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div>
                            <p><span class="label-text">Names:</span> {{ \App\Models\User::where('id', $student->user_id)->firstOrFail()->name }}</p>
                        <div>
                        <div>
                            <p><span class="label-text">Email:</span> {{ \App\Models\User::where('id', $student->user_id)->firstOrFail()->email }}</p>
                        <div>
                        <div class="mt-3">
                            <p><span class="label-text">Telephone:</span> {{ $student->phone }}</p>
                        </div>
                        <div class="mt-3">
                            <p><span class="label-text">Age:</span> {{ $student->age }}</p>
                        </div>
                        <div class="mt-3">
                            <p><span class="label-text"> Class:</span> {{ \App\Models\Year::where('id', $student->year_id)->firstOrFail()->name }}</p>
                        </div>
                        <div class="mt-3">
                            <p><span class="label-text">School: </span> {{ $student->school }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
