@extends('admin.layouts.master')

@section('content')

<section>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-10 col-md-10 col-sm-12 mt-5 pt-5">
                <div class="card admin-shadow">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <div><h4>Teacher</h4></div>
                        </div>
                    </div>
                    <div class="card-body">
                        <p> {{ $teacher }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
