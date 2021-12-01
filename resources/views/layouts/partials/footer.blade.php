<footer class="bg-dark-2 text-white pt-4 small-screen_padding">
    <div class="container">
        <div class="row mt-5">
            <div class="col-sm-6 col-md-6 col-lg-3">
                <img src="{{ asset('logo/trand_footer.svg') }}" alt="Trand Icon">
            </div>
            <div class="col-sm-6 col-md-6 col-lg-3">
                <h5 class="bold">Resources</h5>
                <ul class="list-unstyled">
                    <li>
                        <a href="{{ route('contacts') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-check mb-1" viewBox="0 0 16 16">
                                <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z"/>
                            </svg>
                            Contact
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('about') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-check mb-1" viewBox="0 0 16 16">
                                <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z"/>
                            </svg>
                            About
                        </a>
                    </li>
                    @guest
                        <li>
                            <a href="{{ route('subjects.starter') }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-check mb-1" viewBox="0 0 16 16">
                                    <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z"/>
                                </svg>
                                Teacher
                            </a>
                        </li>
                    @endguest
                    @auth
                        @if(Auth::user()->hasRole('student'))
                            <li>
                                <a href="{{ route('subjects.starter') }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-check mb-1" viewBox="0 0 16 16">
                                        <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z"/>
                                    </svg>
                                    Teacher
                                </a>
                            </li>
                        @elseif(Auth::user()->hasRole('teacher'))
                            <li>
                                <a href="{{ route('manage.subjects') }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-check mb-1" viewBox="0 0 16 16">
                                        <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z"/>
                                    </svg>
                                    Teacher
                                </a>
                            </li>
                        @else
                            <li>
                                <a href="{{ route('manage.subjects') }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-check mb-1" viewBox="0 0 16 16">
                                        <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z"/>
                                    </svg>
                                    Teacher
                                </a>
                            </li>
                        @endif
                    @endauth
                    <li>
                        <a href="{{ url('/#learn-now') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-check mb-1" viewBox="0 0 16 16">
                                <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z"/>
                            </svg>
                            Learner
                        </a>
                    </li>
                </ul>
            </div>

            <div class="col-sm-6 col-md-6 col-lg-3">
                <h5 class="bold wraps-text">Useful Links</h5>
                <ul class="list-unstyled">
                    <li>
                        <a href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-check mb-1" viewBox="0 0 16 16">
                                <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z"/>
                            </svg>
                            Terms
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-check mb-1" viewBox="0 0 16 16">
                                <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z"/>
                            </svg>
                            Privacy
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('contacts') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-check mb-1" viewBox="0 0 16 16">
                                <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z"/>
                            </svg>
                            Support
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('donate.index') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-check mb-1" viewBox="0 0 16 16">
                                <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z"/>
                            </svg>
                            Donate
                        </a>
                    </li>
                </ul>
            </div>

            <div class="col-sm-6 col-md-6 col-lg-3">
                <h5 class="bold">Social</h5>
                <div class="mt-3">
                    <a target="_blank" href="https://twitter.com/otim16"><i class="fa fa-sm fa-twitter mr-2"></i></a>
                    <a target="_blank" href="https://www.facebook.com/fredrickot"><i class="fa fa-sm fa-facebook"></i></a>
                    <a target="_blank" href="https://linkedin.com/in/otim-fredrick-29730a86"><i class="fa fa-sm fa-linkedin mr-2"></i></a>
                    <a target="_blank" href="https://medium.com/@otimfredrick"><i class="fa fa-sm fa-medium mr-2"></i></a>
                </div>
            </div>
        </div>
        <div class="footer-line mt-5">
            <hr />
        </div>
        <div class="row">
            <div class="col-12 text-center">
                <p class="copyright">
                    <span class="light_gray_color">Copyright &copy;  <?php echo date("Y"); ?> TrandLessons |</span> <a class="footer-text" href="#">Terms & conditions</a> <span class="light_gray_color"> | </span><a class="footer-text" href="#">All Rights Reserved.</a>
                </p>
            </div>
        </div>
    </div>
</footer>
