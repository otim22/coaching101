@extends('layouts.app')

@section('content')

<section class="section-bread bg-gray-2"  style="background: linear-gradient(to right, rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.05)), url({{ asset('/images/bridge.jpg') }}); width: 100%; height: auto; background-size: cover;">
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
                <li class="breadcrumb-item bold" aria-current="page">
                    <a href="{{ route('home') }}" style="text-decoration: none;">Home</a>
                </li>
                <li class="breadcrumb-item bold active" aria-current="page">About us</li>
            </ol>
        </nav>
    </div>
</section>

<section class="bg-white small-screen_padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12 mt-3">
                <img src="{{ asset('images/founder.jpeg') }}" alt="Founder image" width="80%" class="rounded-circle p-2">
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <h3 class="bold mt-4 mb-4">Our Founder</h3>
                <hr>
                <p class="mt-4">
                    It all started with a request from my senior six nephew to help him with some learning materials as students were at home but required to study. I looked around newspapers, searched the internet
                    and a number of sites popped up. However, the results weren’t well differentiated, modularized, tailored learning materials.
                    And just like that an idea sparked in my head
                </p>
                <p class="mt-4">
                    Now, If you are wondering who this is? I am called Otim Fredrick, With a Bachelors of Science in Software Engineering, over
                    the years  I have worked on a number of projects ranging from Fin-Tech,
                    Agric-Tech, Pharmaceutical and E-Commerce.
                    <a href="{{ route('contacts') }}" style="text-decoration: none;">Contact me here.</a>
                    And below are my social handles.
                </p>
                <div class="mt-4">
                    <a target="_blank" href="https://twitter.com/otim16"><i class="fa fa-sm fa-twitter mr-2"></i></a>
                    <a target="_blank" href="https://medium.com/@otimfredrick"><i class="fa fa-sm fa-medium mr-2"></i></a>
                    <a target="_blank" href="https://linkedin.com/in/otim-fredrick-29730a86"><i class="fa fa-sm fa-linkedin mr-2"></i></a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="small-screen_padding">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-lg-9 col-md-9 col-sm-12 off-set-3">
                <h3 class="bold mb-4">Problem</h3>
                <p class="mt-4">
                    Approximately 13 million school going children in Uganda face less curated, low quality, and not well tailored content to our community’s education curriculum from accredited teachers with online content.
                </p>
                <h3 class="bold mt-5">Solution</h3>
                <p class="mt-4">
                    Trandlessons provides well structured online learning resources focused on Science, Technology, Engineering, and Mathematics (STEM) curriculum to boost the learning capacity of children who can access either smartphones, tablets, or computers.
                    We also provide a quality professional platform to enable teachers and administrators to integrate technology into the curriculum while meeting standards.
                </p>
            </div>
        </div>
    </div>
</section>

<section class="bg-white small-screen_padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 d-flex justify-content-center mb-4">
                <h3 class="bold mb-4">Our office</h3>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 text-center mb-4">
                <img src="{{ asset('images/kampala.jpg') }}" alt="office image" class="rounded-corners" width="85%">
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12" style="margin-top: auto; margin-bottom: auto; width: 8em;">
                <div class="mb-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="#658ebf" class="bi bi-geo-alt ml-5" viewBox="0 0 16 16">
                        <path d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A31.493 31.493 0 0 1 8 14.58a31.481 31.481 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94zM8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10z"/>
                        <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                    </svg>
                </div>
                <h5 class="gray_color wraps-text">Mutungo, Old Butabika Road</h5>
                <h5 class="gray_color wraps-text">2<sup>nd</sup> Floor</h5>
                <h5 class="mb-5 gray_color"><span class="wraps-text">Kampala, Uganda.</span></h5>
            </div>
        </div>
    </div>
</section>

@endsection

@push('scripts')
    <script src="{{ asset('vendor/js/jquery.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/about.js')}}" type="text/javascript"></script>
@endpush
