<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-lg-4 pr-xl-4">
                <a href="{{ route('home.products.list') }}" class="f-logo mb-30">
                    <img src="{{ url('assets/images/logo.png') }}"  alt="Lettstart Design Logo" title="Lettstart Design" class="img-fluid" />
                </a>
                <p>Purchase premium and free landing layouts, application layouts, dashboard layouts dependent on rakish, bootstrap, scss and start your first site today.</p>
            </div>
            <div class="col-md-6 col-lg-3 px-xl-4">
                <div class="h5 text-white mb-30">Useful Links</div>
                <ul class="list-unstyled f-links">
                    <li><a title="Admin & Dashboard" href="{{ route('product.category', ['category' => 'angular-templates']) }}">Angular Templates</a></li>
                    <li><a title="Admin & Dashboard" href="{{ route('product.category', ['category' => 'admin-dashboard-template']) }}">Admin & Dashboard</a></li>
                    <li> <a title="Bootstrap Templates" href="{{ route('product.category', ['category' => 'bootstrap-templates']) }}">Bootstrap Templates</a>
                    <li><a title="Landing Pages" href="{{ route('product.category', ['category' => 'landing-pages-templates']) }}">Landing Pages</a></li>
                    <li><a title="Business & Corporate" href="{{ route('product.category', ['category' => 'business-corporate-templates']) }}">Business & Corporates</a></li>
                    <li><a title="Portfolio & Dashboard" href="{{ route('product.category', ['category' => 'portfolio-resume-templates']) }}">Portfolio & Resume</a></li>
                </ul>
            </div>
            <div class="col-md-6 col-lg-2 px-xl-4">
                <div class="h5 text-white mb-30">More Links</div>
                <ul class="list-unstyled f-links">
                    <li><a href="{{ route('about-us') }}">About Us</a></li>
                    <li><a href="{{ route('contact-us') }}">Contact Us</a></li>
                    <li><a href="{{ route('license') }}">License</a></li>
                    <li><a href="{{ route('faq') }}">FAQ</a></li>
                    <li><a href="{{ route('privacy-policy') }}">Privacy Policy</a></li>
                    <li><a href="{{ route('terms-and-conditions') }}">Terms & Conditions</a></li>
                    {{-- <li><a href="{{ route('affiliate') }}">Become an Affiliate</a></li> --}}
                </ul>
            </div>
            <div class="col-md-6 col-lg-3 pl-xl-4">
                <div class="h5 text-white mb-30">Follow Us</div>
                <div class="social-icons social-white">
                    <a href="https://www.facebook.com/LettstartDesign/" title="facebook" target="_blank"><i
                            class='bx bxl-facebook icon-sm'></i></a>
                    <a href="https://dribbble.com/lettstartdesign" title="dribble" target="_blank"><i
                            class='bx bxl-dribbble icon-sm'></i></a>
                </div>
                <div class="h5 text-white mt-30 mb-1">Email Us</div>
                <ul class="list-unstyled f-links">
                    <li><a title="support@letttstartdesign.com"
                           href="mailto:support@letttstartdesign.com">support@lettstartdesign.com</a></li>
                    <li><a title="info@letttstartdesign.com"
                           href="mailto:info@letttstartdesign.com">info@lettstartdesign.com</a></li>
                </ul>
            </div>
        </div>
        <div class="copyright">
            <div class="row">
                <div class="col-md-9">
                    &copy; Copyright 2020-21. <span class="text-white">LettStartDesign</span>
                </div>
                <div class="col-md-3">
                    <div class="back-top">
                        <a href="javascript:void(0)">
                            <i class="bx bx-chevron-up h5 mb-0 text-white"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<script>
    var registerRoute = "<?= route('register') ?>";
    var loginRoute = "<?= route('login') ?>";
    var userAuthenticated = "<?= Auth::check() ?>";
    var swUrl = "<?= url('assets/js/sw.min.js') ?>";
    var baseURL = "<?= env('BASE_URL').'api/' ?>";
    
</script>
<!-- Third Javascript's -->
<script src="{{ url('assets/js/plugins.min.js') }}"></script>
<script src="{{ url('assets/vendors/rating/bootstrap-rating.min.js') }}"></script>
<!-- Footer End-->
<script src="{{ url('assets/js/api.min.js') }}"></script>
<script src="{{ url('assets/js/app.min.js') }}"></script>
<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-167253243-1', 'auto');
    ga('send', 'pageview');
    $("[data-track-elem]").on("click", function(){
      var eventCategory = $(this).attr("event-category");
      var eventAction = $(this).attr("event-action");
      var eventLabel = $(this).attr("event-label");
      ga('send', 'event', {
          eventCategory: eventCategory,
          eventAction: eventAction,
          eventLabel: eventLabel
      });
    })
</script>
<!--Start of Tawk.to Script-->
<script type="text/javascript">
    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    (function(){
        setTimeout(function(){
            var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
            s1.async=true;
            s1.src='https://embed.tawk.to/6058a68ff7ce18270932a9fd/1f1d4l8uu';
            s1.charset='UTF-8';
            s1.setAttribute('crossorigin','*');
            s0.parentNode.insertBefore(s1,s0);
        }, 1000)
    })();
</script>
<!--End of Tawk.to Script-->
@yield('footer_script')
<!-- Javascript's -->
</body>

</html>