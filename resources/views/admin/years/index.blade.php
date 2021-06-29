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
                                <h4>Years</h4>
                            </div>
                            <div>
                                <a type="button" href="{{ route('admin.years.create') }}" class="btn btn-primary pt-1" name="button">Create Year</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        @foreach($years as $year)
                            <h5 class="mb-2">
                                <a href="{{ route('admin.years.show', $year) }}" style="text-decoration: none;">
                                    <i class="material-icons material-icons_custom">navigate_next</i>{{ Str::ucfirst($year->name) }}
                                </a>
                            </h5>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
