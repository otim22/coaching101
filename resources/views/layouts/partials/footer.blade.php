<footer class="bg-dark-2 text-white pt-4">
    <div class="container">
        <div class="row mt-5">
            <div class="col-sm-6 col-md-6 col-lg-3">
                <h5 class="uppercase">Coaching101</h5>
                <ul class="list-unstyled">
                    <li><a href="{{ route('about') }}">About</a></li>
                    <li><a href="{{ route('contacts') }}">Contact</a></li>
                    <!-- <li><a href="#">Blog</a></li> -->
                </ul>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-3">
                <h5>Resources</h5>
                <ul class="list-unstyled">
                    @guest
                        <li><a href="{{ route('subjects.starter') }}">Teach</a></li>
                    @endguest
                    @auth
                        @if(Auth::user()->role == 1)
                            <li><a href="{{ route('subjects.starter') }}">Teach</a></li>
                        @elseif(Auth::user()->role == 2)
                            <li><a href="{{ route('manage.subjects') }}">Teach</a></li>
                        @else
                            <li><a href="{{ route('manage.subjects') }}">Teach</a></li>
                        @endif
                    @endauth
                    <li><a href="{{ url('/#learn-now') }}">Learn</a></li>
                    <li><a href="#">Affiliate</a></li>
                </ul>
            </div>

            <div class="col-sm-6 col-md-6 col-lg-3">
                <h5 class="wraps-text">Useful Links</h5>
                <ul class="list-unstyled">
                    <li><a href="#">Privacy</a></li>
                    <li><a href="#">Terms</a></li>
                    <li><a href="{{ route('contacts') }}">Support</a></li>
                </ul>
            </div>

            <div class="col-sm-6 col-md-6 col-lg-3">
                <h5>Social</h5>
                <div class="mt-3">
                    <a target="_blank" href="https://twitter.com/otim16"><i class="fa fa-sm fa-twitter"></i></a>
                    <a target="_blank" href="https://medium.com/@otimfredrick"><i class="fa fa-sm fa-medium"></i></a>
                    <a target="_blank" href="https://linkedin.com/in/otim-fredrick-29730a86"><i class="fa fa-sm fa-linkedin"></i></a>
                    <a target="_blank" href="https://www.facebook.com/fredrickot"><i class="fa fa-sm fa-facebook"></i></a>
                </div>
            </div>
        </div>
        <div class="footer-line mt-5">
            <hr />
        </div>
        <div class="row">
            <div class="col-12 text-center">
                <p class="copyright">
                    Copyright &copy;  <?php echo date("Y"); ?> Coaching101. <a class="footer-text" href="#">Terms and conditions</a> | <a class="footer-text" href="#">All Rights Reserved.</a>
                </p>
            </div>
        </div>
    </div>
</footer>
