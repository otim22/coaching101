<footer class="bg-dark-2 text-white pt-4 small-screen_padding">
    <div class="container">
        <div class="row mt-5">
            <div class="col-sm-6 col-md-6 col-lg-3">
                <img src="{{ asset('logo/trand_footer.svg') }}" alt="Trand Icon">
                <p>Test</p>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-3">
                <h5>Resources</h5>
                <ul class="list-unstyled">
                    <li><a href="{{ route('contacts') }}">Contact</a></li>
                    <li><a href="{{ route('about') }}">About</a></li>
                    @guest
                        <li><a href="{{ route('subjects.starter') }}">Teacher</a></li>
                    @endguest
                    @auth
                        @if(Auth::user()->hasRole('student'))
                            <li><a href="{{ route('subjects.starter') }}">Teacher</a></li>
                        @elseif(Auth::user()->hasRole('teacher'))
                            <li><a href="{{ route('manage.subjects') }}">Teacher</a></li>
                        @else
                            <li><a href="{{ route('manage.subjects') }}">Teacher</a></li>
                        @endif
                    @endauth
                    <li><a href="{{ url('/#learn-now') }}">Learner</a></li>
                    <!-- <li><a href="#">Affiliate</a></li> -->
                </ul>
            </div>

            <div class="col-sm-6 col-md-6 col-lg-3">
                <h5 class="wraps-text">Useful Links</h5>
                <ul class="list-unstyled">
                    <li><a href="#">Terms</a></li>
                    <li><a href="#">Privacy</a></li>
                    <li><a href="{{ route('contacts') }}">Support</a></li>
                    <li><a href="{{ route('donate.index') }}">Donate</a></li>
                </ul>
            </div>

            <div class="col-sm-6 col-md-6 col-lg-3">
                <h5>Social</h5>
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
                    <span class="light_gray_color">Copyright &copy;  <?php echo date("Y"); ?> Trand.</span> <a class="footer-text" href="#">Terms and conditions</a> <span class="light_gray_color"> | </span><a class="footer-text" href="#">All Rights Reserved.</a>
                </p>
            </div>
        </div>
    </div>
</footer>
