@extends('layouts.app')

@section('content')

<section class="section-bread bg-gray-2">
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
                <li class="breadcrumb-item" aria-current="page">
                    <a href="{{ route('home') }}" style="text-decoration: none;">Home</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">About us</li>
            </ol>
        </nav>
    </div>
</section>

<section class="bg-white small-screen_padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12">
                <img src="{{ asset('images/founder.jpg') }}" alt="Founder image" width="80%" class="rounded-circle p-2">
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <h3 class="mt-4 mb-4">Our Founder</h3>
                <hr>
                <p class="mt-4">
                    At quarter year of 2020 when Covid-19 became a global pandermic and the world went undersiege with schools closed, businesses stopped, disrupting economies and social fabrics of some communities interrupted.
                    It was around that time a light buld idea dropped into my mind to create an online learning platform for students who where struggling to find quality learning resources while at their on convience anywhere.
                </p>
                <p class="mt-4">
                    Well, If you are wondering who this is. I am called Otim Fredrick, With a Bachelors Of Science In Software Engineering, over
                    the years  I have worked on a number of projects ranging from Fin-Tech,
                    Agric-Tech, Pharmaceutical and E-Commerce.
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
                <h3 class="mb-4">Overview</h3>
                <p class="mt-4">
                    As technologies infiltrate most aspects of our everyday life, it is imperative that we are kept up to date, learning the most effective ways to use technology to enhance our lives.
                    Looking at learning, schools spend on technology and the number of computers in schools continue to grow, but less is spent on the professional development and training needed for teachers to implement this technology in the classroom.
                </p>
                <p class="mt-4">
                    We focus on the use of online studies to boost the learning capacity of students who can have access to either; smartphones, tablets, or computers providing a quality professional platform to enable administrators and teachers to integrate technology into the curriculum while meeting standards. This improves student achievement through the use of technology, to raise student technology literacy, and to ensure that teachers can integrate technology into the curriculum effectively.
                </p>
                <p class="mt-4">
                    Many of the professional development programs that are currently offered to teachers fail to provide the kind of ongoing support teachers need to make effective use of educational technology, and as a result, few teachers are in a position to integrate new technologies into their classroom practices. Teachers may attend a one day workshop and return to school the following day not knowing how or have the time to integrate what they learnt into their curricula, they may even lack the support from colleagues that is necessary for their attempts to be successful in their endeavors to learn and implement new technologies, teachers need hands on learning rooted in their own curricula that will enable them to translate training into practice.
                </p>
                <p class="mt-4">We train teachers to be Online Course Learning and Delivery Professionals who design and deliver a rigorous program of standards based technology enhanced online courses for students across all subject areas and grade levels. Participants are trained to use online tools to evaluate the effectiveness of the online professional development courses, and to use online assessment techniques to measure the impact of the online courses on teacher practice and student achievement. All curriculum materials created are in alignment with the Educational Standards. </p>
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

<section class="bg-white small-screen_padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 d-flex justify-content-center mb-4">
                <h3 class="mb-4">Our office</h3>
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
                <h5 class="gray_color wraps-text">Old Butabika Road,</h5>
                <h5 class="gray_color wraps-text">2<sup>nd</sup> Floor</h5>
                <h5 class="mb-5 gray_color">Mutungo, <span class="wraps-text">Kampala Uganda.</span></h5>
            </div>
        </div>
    </div>
</section>

@endsection

@push('scripts')
    <script src="{{ asset('vendor/js/jquery.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/about.js')}}" type="text/javascript"></script>
@endpush
