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
            <div class="p-2 bg-primary">
                <div id="morris-area-chart" style="width: 100%; height: 250px;"></div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-4">

                <div class="card card-body card-profile align-items-center justify-content-center">
                    <img src="{{asset('admin/images/avatars/person-3.jpg') }}" class="img-fluid rounded-circle mr-2 mb-1" width="100" alt="">
                    <p class="h3 mb-0">John Strehl</p>
                    <p>Top Seller (last month)</p>
                    <div class="text-center mb-2">
                        <span class="badge badge-warning mr-2 mb-1">JavaScript</span>
                        <span class="badge badge-primary mr-2 mb-1">Bootstrap</span>
                        <span class="badge badge-danger mr-2 mb-1">PhotoShop</span>
                        <span class="badge badge-info mr-2 mb-1">HTML</span>
                        <span class="badge badge-gray mr-2 mb-1">Rails</span>
                    </div>
                    <a href="profile.html" class="btn btn-white align-middle">
                        <i class="material-icons md-18 align-middle">account_box</i>
                        <span class="align-middle">View Details</span>
                    </a>

                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header d-flex align-items-center">
                        <div class="card-title">
                            Top Earnings
                        </div>
                        <i class="material-icons ml-auto text-muted">local_atm</i>
                    </div>
                    <ul class="list-group list-group-flush">

                        <li class="list-group-item d-flex flex-row">
                            <img src="{{ asset('admin/images/avatars/person-2.jpg') }}" alt="" class="rounded-circle mr-2" width="30" height="30">
                            <div class="media-body">
                                <span class="">Has earned</span>
                                <strong>$4,120.55</strong>
                                <div><small class="text-muted">14 minutes ago</small></div>
                            </div>
                        </li>

                        <li class="list-group-item d-flex flex-row">
                            <img src="{{ asset('admin/images/avatars/person-3.jpg') }}" alt="" class="rounded-circle mr-2" width="30" height="30">
                            <div class="media-body">
                                <span class="">Uploaded a new</span>
                                <strong>video</strong>
                                <div><small class="text-muted">32 minutes ago</small></div>
                            </div>
                        </li>

                        <li class="list-group-item d-flex flex-row">
                            <img src="{{ asset('admin/images/avatars/person-4.jpg') }}" alt="" class="rounded-circle mr-2" width="30" height="30">
                            <div class="media-body">
                                <span class="">Has earned</span>
                                <strong>$2,721.23</strong>
                                <div><small class="text-muted">3 hours ago</small></div>
                            </div>
                        </li>

                        <li class="list-group-item d-flex flex-row">
                            <img src="{{ asset('admin/images/avatars/person-5.jpg') }}" alt="" class="rounded-circle mr-2" width="30" height="30">
                            <div class="media-body">
                                <span class="">Uploaded a new</span>
                                <strong>video</strong>
                                <div><small class="text-muted">4 hours ago</small></div>
                            </div>
                        </li>

                    </ul>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header d-flex align-items-center">
                        <div class="card-title">
                            Rankings
                        </div>
                        <i class="material-icons ml-auto text-muted">local_activity</i>
                    </div>
                    <ul class="list-group list-group-flush">

                        <li class="list-group-item">
                            <div class="media align-items-center">
                                <span class="lead mr-1">1.</span>
                                <img src="{{ asset('admin/images/avatars/person-5.jpg') }}" class="img-fluid rounded-circle mr-2" width="30" alt="">
                                <div class="media-body lh-12">
                                    <a href="#">John Mix</a><br/>
                                    <small class="text-muted">54 done</small>
                                </div>
                                <div class="lead">
                                    <strong class="align-middle">98%</strong> <i class="material-icons md-18 align-middle text-success">arrow_upward</i>
                                </div>
                            </div>
                        </li>

                        <li class="list-group-item">
                            <div class="media align-items-center">
                                <span class="lead mr-1">2.</span>
                                <img src="{{ asset('admin/images/avatars/person-3.jpg') }}" class="img-fluid rounded-circle mr-2" width="30" alt="">
                                <div class="media-body lh-12">
                                    <a href="#">Steven Short</a><br/>
                                    <small class="text-muted">11 done</small>
                                </div>
                                <div class="lead">
                                    <strong class="align-middle">33%</strong> <i class="material-icons md-18 align-middle text-danger">arrow_downward</i>
                                </div>
                            </div>
                        </li>

                        <li class="list-group-item">
                            <div class="media align-items-center">
                                <span class="lead mr-1">3.</span>
                                <img src="{{ asset('admin/images/avatars/person-6.jpg') }}" class="img-fluid rounded-circle mr-2" width="30" alt="">
                                <div class="media-body lh-12">
                                    <a href="#">Mark Ups</a><br/>
                                    <small class="text-muted">1 done</small>
                                </div>
                                <div class="lead">
                                    <strong class="align-middle">8%</strong> <i class="material-icons md-18 align-middle text-danger">arrow_downward</i>
                                </div>
                            </div>
                        </li>

                        <li class="list-group-item">
                            <div class="media align-items-center">
                                <span class="lead mr-1">4.</span>
                                <img src="{{ asset('admin/images/avatars/person-2.jpg') }}" class="img-fluid rounded-circle mr-2" width="30" alt="">
                                <div class="media-body lh-12">
                                    <a href="#">Tara Knows</a><br/>
                                    <small class="text-muted">35 done</small>
                                </div>
                                <div class="lead">
                                    <strong class="align-middle">86%</strong> <i class="material-icons md-18 align-middle text-success">arrow_upward</i>
                                </div>
                            </div>
                        </li>

                        <li class="list-group-item">
                            <div class="media align-items-center">
                                <span class="lead mr-1">5.</span>
                                <img src="{{ asset('admin/images/avatars/person-1.jpg') }}" class="img-fluid rounded-circle mr-2" width="30" alt="">
                                <div class="media-body lh-12">
                                    <a href="#">Lucas Kane</a><br/>
                                    <small class="text-muted">25 done</small>
                                </div>
                                <div class="lead">
                                    <strong class="align-middle">86%</strong> <i class="material-icons md-18 align-middle text-success">arrow_upward</i>
                                </div>
                            </div>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
