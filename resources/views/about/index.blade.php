@extends('layouts.app')

@section('content')

<section class="section-bread" style="background-image:url(images/back_img.jpg);">
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
                <li class="breadcrumb-item active" aria-current="page">About us</li>
            </ol>
        </nav>
    </div>
</section>

<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12  d-flex justify-content-center">
                <img src="{{ asset('images/founder.jpg') }}" alt="Founder image" width="80%" class="rounded-circle">
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <h2 class="mt-5 mb-4">Our founder</h2>
                <hr>
                <p class="mt-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                <div class="mt-4">
                    <a target="_blank" href="https://twitter.com/otim16"><i class="fa fa-sm fa-twitter mr-2"></i></a>
                    <a target="_blank" href="https://medium.com/@otimfredrick"><i class="fa fa-sm fa-medium mr-2"></i></a>
                    <a target="_blank" href="https://linkedin.com/in/otim-fredrick-29730a86"><i class="fa fa-sm fa-linkedin mr-2"></i></a>
                    <a target="_blank" href="https://www.facebook.com/fredrickot"><i class="fa fa-sm fa-facebook"></i></a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="bg-white">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-lg-9 col-md-9 col-sm-12 off-set-3">
                <h2 class="mb-4">Overview</h2>
                <p class="mt-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, </p>
            </div>
        </div>
    </div>
</section>

<!-- <section>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12  d-flex justify-content-center mb-4">
                <h2>The team</h2>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 text-center">
                <div id="team-1">
                    <img src="{{ asset('images/founder.jpg') }}" alt="Founder image" width="60%" class="rounded-circle">
                    <h6 class="mt-4 bold">Founder </h6>
                    <p class="student-text">Otim Fredrick<br />
                    Bsc in Software Engineering  <br />
                    Worked with a number of start ups </p>
                        <div class="mt-4" id="hidden-social-1">
                            <a target="_blank" href="https://twitter.com/otim16"><i class="fa fa-sm fa-twitter"></i></a>
                            <a target="_blank" href="https://medium.com/@otimfredrick"><i class="fa fa-sm fa-medium"></i></a>
                            <a target="_blank" href="https://linkedin.com/in/otim-fredrick-29730a86"><i class="fa fa-sm fa-linkedin"></i></a>
                            <a target="_blank" href="https://www.facebook.com/fredrickot"><i class="fa fa-sm fa-facebook"></i></a>
                        </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 text-center">
                <div id="team-2">
                    <img src="{{ asset('images/founder.jpg') }}" alt="Founder image" width="60%" class="rounded-circle">
                    <h6 class="mt-4 bold">Senior Developer</h6>
                    <p class="author-text">Abok Isaac <br />
                    Bsc in Software Engineering <br />
                    Former SafeBoda Developer </p>
                        <div class="mt-4" id="hidden-social-2">
                            <a target="_blank" href="https://twitter.com/otim16"><i class="fa fa-sm fa-twitter"></i></a>
                            <a target="_blank" href="https://medium.com/@otimfredrick"><i class="fa fa-sm fa-medium"></i></a>
                            <a target="_blank" href="https://linkedin.com/in/otim-fredrick-29730a86"><i class="fa fa-sm fa-linkedin"></i></a>
                            <a target="_blank" href="https://www.facebook.com/fredrickot"><i class="fa fa-sm fa-facebook"></i></a>
                        </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 text-center">
                <div id="team-3">
                    <img src="{{ asset('images/founder.jpg') }}" alt="Founder image" width="60%" class="rounded-circle">
                    <h6 class="mt-4 bold">Senior Developer </h6>
                    <p class="author-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, </p>
                        <div class="mt-4" id="hidden-social-3">
                            <a target="_blank" href="https://twitter.com/otim16"><i class="fa fa-sm fa-twitter"></i></a>
                            <a target="_blank" href="https://medium.com/@otimfredrick"><i class="fa fa-sm fa-medium"></i></a>
                            <a target="_blank" href="https://linkedin.com/in/otim-fredrick-29730a86"><i class="fa fa-sm fa-linkedin"></i></a>
                            <a target="_blank" href="https://www.facebook.com/fredrickot"><i class="fa fa-sm fa-facebook"></i></a>
                        </div>
                </div>
            </div>
        </div>
    </div>
</section> -->

<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 d-flex justify-content-center mb-4">
                <h2 class="mb-4">Our office</h2>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 text-center mb-4">
                <img src="{{ asset('images/kampala.jpg') }}" alt="office image" width="85%">
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12" style="margin-top: auto; margin-bottom: auto; width: 8em;">
                <div class="mb-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="#658ebf" class="bi bi-geo-alt ml-5" viewBox="0 0 16 16">
                        <path d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A31.493 31.493 0 0 1 8 14.58a31.481 31.481 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94zM8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10z"/>
                        <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                    </svg>
                </div>
                <h5 class="gray_color">Old Butabika Road,</h5>
                <h5 class="gray_color">2nd Floor</h5>
                <h5 class="mb-5 gray_color">Mutungo, Kampala Uganda.</h5>
            </div>
        </div>
    </div>
</section>

@endsection

@push('scripts')
    <script src="{{ asset('vendor/js/jquery.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/about.js')}}" type="text/javascript"></script>
@endpush
