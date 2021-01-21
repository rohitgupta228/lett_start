<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-lg-4 pr-xl-4">
                <a href="index.html" class="f-logo mb-30">
                    <img src="{{ url('assets/images/logo.png') }}" class="img-fluid" alt="lettstart design" />
                </a>
                <p>Purchase premium and free landing layouts, application layouts, dashboard layouts dependent on rakish, bootstrap, scss and start your first site today.</p>
            </div>
            <div class="col-md-6 col-lg-3 px-xl-4">
                <h5 class="text-white mb-30">Useful Links</h5>
                <ul class="list-unstyled f-links">
                    <li><a href="{{ route('product.category', ['category' => 'admin']) }}">Admin & Dashboard</a></li>
                    <li><a href="{{ route('product.category', ['category' => 'landing']) }}">Landing Pages</a></li>
                    <li><a href="{{ route('product.category', ['category' => 'business']) }}">Business & Corporates</a></li>
                    <li><a href="{{ route('product.category', ['category' => 'portfolio']) }}">Portfolio & Resume</a></li>
                    <li><a href="{{ route('product.category', ['category' => 'angular']) }}">Angular</a></li>
                </ul>
            </div>
            <div class="col-md-6 col-lg-2 px-xl-4">
                <h5 class="text-white mb-30">More Links</h5>
                <ul class="list-unstyled f-links">
                    <li><a href="{{ route('contact') }}">Contact Us</a></li>
                    <li><a href="{{ route('license') }}">License</a></li>
                    <li><a href="{{ route('faq') }}">FAQ</a></li>
                    <li><a href="{{ route('privacy') }}">Privacy Policy</a></li>
                    <li><a href="{{ route('terms') }}">Terms & Conditions</a></li>
                </ul>
            </div>
            <div class="col-md-6 col-lg-3 pl-xl-4">
                <h5 class="text-white mb-30">Follow Us</h5>
                <div class="social-icons social-white">
                    <a href="https://www.facebook.com/LettstartDesign/" title="facebook" target="_blank"><i
                            class='bx bxl-facebook icon-sm'></i></a>
                    <a href="https://dribbble.com/lettstartdesign" title="dribble" target="_blank"><i
                            class='bx bxl-dribbble icon-sm'></i></a>
                </div>
                <h5 class="text-white mt-30 mb-1">Email Us</h5>
                <ul class="list-unstyled f-links">
                    <li><a title="support@letttstartdesign.com"
                           href="mailto:support@letttstartdesign.com">support@lettstartdesign.com</a></li>
                    <li><a title="info@letttstartdesign.com"
                           href="mailto:info@letttstartdesign.com">info@lettstartdesign.com</a></li>
                </ul>
            </div>
        </div>
        <div class="copyright">
            &copy; Copyright 2020. <span class="text-white">LettStartDesign</span>
        </div>
    </div>
</footer>
<div class="back-top">
    <a href="javascript:void(0)">
        <i class="bx bx-chevron-up h5 mb-0 text-white"></i>
    </a>
</div>
<script>
    var registerRoute = "<?= route('register') ?>";
    var loginRoute = "<?= route('login') ?>";
</script>
<!-- Third Javascript's -->
<script src="{{ url('assets/js/plugins.min.js') }}" type="application/javascript"></script>
<!-- Footer End-->
<script src="{{ url('assets/js/api.min.js') }}"></script>
<script src="{{ url('assets/js/app.min.js') }}"></script>
<!-- Javascript's -->
</body>

</html>