@extends('admin.layouts.master')

@section('content')

<div class="mdk-header-layout__content top-navbar mdk-header-layout__content--scrollable h-100">
    <!-- main content -->
    <div class="container-fluid">
        <div class="card card-earnings">

            <div class="card-group">
                <div class="card card-body mb-0">
                    <div class="media align-items-center">
                        <div class="media-body">
                            <p class="card-text text-muted mb-1">Earned today</p>
                            <h1 class="mb-0 font-weight-normal">&dollar;6,120</h1>
                        </div>
                        <div class="badge badge-success">+52%</div>
                    </div>
                </div>
                <div class="card card-body mb-0">
                    <div class="media align-items-center">
                        <div class="media-body">
                            <p class="card-text text-muted mb-1">Earned this week</p>
                            <h1 class="mb-0 font-weight-normal">&dollar;14,276</h1>
                        </div>
                        <div class="badge badge-primary">+16%</div>
                    </div>
                </div>
                <div class="card card-body mb-0">
                    <div class="media align-items-center">
                        <div class="media-body">
                            <p class="card-text text-muted mb-1">Earned this month</p>
                            <h1 class="mb-0 font-weight-normal">&dollar;39,882</h1>
                        </div>
                        <div class="badge badge-warning">+5%</div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection
