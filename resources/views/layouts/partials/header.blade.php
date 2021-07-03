<!DOCTYPE html>
<html lang="en">

    <head>
        <!--=== meta ===-->
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="robots" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1">
        <meta name="author" content="LettStartDesign">
        <meta name="p:domain_verify" content="cc3c31bb59b2d64a7607601a6ddc9bcd"/>
        <meta property="og:locale" content="en_US">
        <meta property="og:type" content="website">
        <meta property="og:url" content="https://lettstartdesign.com/">
        <meta property="og:site_name" content="LettstartDesign">
        <meta property="article:publisher" content="https://www.facebook.com/LettstartDesign/">
        <meta name="apple-mobile-web-app-status-bar" content="#2982de">
        <meta name="theme-color" content="#2982de">
        <meta name="google-site-verification" content="2A15GDv2_v4MvaNqBXvSLUqtyJdfGObA2zCet6fuIVE" />
        <meta name="title" content="@yield('meta_title','Premium &amp; Free Bootstrap Themes &amp; Templates from Lettstart Design')">
        <meta name="description" content="@yield('meta_description','Discover premium and free bootstrap themes &amp; templates including admin templates, angular templates, portfolio &amp; resume templates &amp; landing pages')">
        @if (trim($__env->yieldContent('keywords')))
        <meta name="keywords" content="@yield('keywords')">
        @endif

        <meta property="og:title" content="@yield('meta_title','Premium &amp; Free Bootstrap Themes &amp; Templates from Lettstart Design')">
        <meta property="og:description" content="@yield('meta_description','Discover premium and free bootstrap themes &amp; templates including admin templates, angular templates, portfolio &amp; resume templates &amp; landing pages')">
        <title>@yield('title', 'Premium and Free Bootstrap Themes &amp; Templates') </title>
        <!--=== Fav Icon ===-->
        <link rel="shortlink" href="https://lettstartdesign.com/">
        <link rel="shortcut icon" href="{{ url('assets/images/favicon.ico') }}" type="image/x-icon" />
        <link rel="apple-touch-icon" href="{{ url('assets/images/favicon.ico') }}" />
        <link rel="manifest" href="{{ url('assets/json/manifest.json') }}">
        
        <!--=== Preloads ===-->
        <link rel="preload" href="{{ url('assets/vendors/boxicons/css/boxicons.min.css') }}" as="style">
        <link rel="preload" href="{{ url('assets/vendors/boxicons/fonts/boxicons.woff2') }}" as="font" type="font/woff2" crossorigin>
        <link rel="preload" href="{{ url('assets/fonts/roboto/Roboto-Medium.woff2') }}" as="font" type="font/woff2" crossorigin>
        <link rel="preload" href="{{ url('assets/fonts/roboto/Roboto-Regular.woff2') }}" as="font" type="font/woff2" crossorigin>
        <link rel="preload" href="{{ url('assets/fonts/roboto/Roboto-Bold.woff2') }}" as="font" type="font/woff2" crossorigin>
        <link rel="preload" href="{{ url('assets/css/plugins.min.css') }}" as="style">
        <link rel="preload" href="{{ url('assets/css/style.min.css') }}" as="style">
        <link rel="preload" href="{{ url('assets/js/plugins.min.js') }}" as="script">
        <link rel="preload" href="{{ url('assets/js/api.min.js') }}" as="script">
        <link rel="preload" href="{{ url('assets/js/app.min.js') }}" as="script">
        {{-- <link rel="preload" href="https://www.googletagmanager.com/gtag/js?id=UA-167253243-1" as="script">
        <link rel="preload" href="https://www.google-analytics.com/analytics.js" as="script"> --}}
        {{-- <link rel="preconnect" href="https://www.googletagmanager.com"> --}}
        {{-- <script defer src="https://www.googletagmanager.com/gtag/js?id=UA-167253243-1"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag() {
                dataLayer.push(arguments);
            }
            gtag('js', new Date());

            gtag('config', 'UA-167253243-1');
        </script> --}}
        <link rel="preload" href="https://www.google-analytics.com/analytics.js" as="script">
        <!--=== Preconnects ===-->
        <link rel="preconnect" href="https://lettstartdesign.com">
        <link rel="preconnect" href="https://www.google-analytics.com">
        <link rel="preconnect" href="https://stats.g.doubleclick.net">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <!--=== Icon Fonts ===-->
        <link href="{{ url('assets/vendors/boxicons/css/boxicons.min.css') }}" rel="stylesheet" />

        @if (trim($__env->yieldContent('canonicalLink')))
        <link rel="canonical" href="@yield('canonicalLink')" />
        @endif
        <!--=== Plugins CSS===-->
        <link rel="stylesheet" href="{{ url('assets/css/plugins.min.css') }}" />

        <!--=== App css ===-->
        <link rel="stylesheet" href="{{ url('assets/css/style.min.css') }}" />
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!-- Tweaks for older IEs-->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js" defer></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js" defer></script>
        <![endif] -->
        <!-- Global site tag (gtag.js) - Google Analytics -->
    </head>

    <body>
        <!-- Google Tag Manager (noscript) -->
        <noscript>
        <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MRQ8XPM" height="0" width="0"
                style="display:none;visibility:hidden"></iframe>
        </noscript>
        <div class="fakeLoader">
            <div class="fl fl-spinner spinner4"></div>
        </div>
        <div class="page-wrapper">
            <!--Header Start-->
            <header class="header">
                <nav class="navbar navbar-expand-lg">
                    <div class="container">
                        <div class="navbar-header">
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse"
                                    aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                                <i class="bx bx-menu"></i>
                            </button>
                            <a class="navbar-brand" href="{{ route('home.products.list') }}">
                                <img src="{{ url('assets/images/logo.png') }}" alt="Lettstart Design Logo" title="Lettstart Design" height="40" class="logo-white">
                                <img src="{{ url('assets/images/logo-dark.png') }}" alt="Lettstart Design Logo" title="Lettstart Design" height="40" class="logo-dark">
                            </a>
                        </div>
                        <!--logo end-->
                        <!--hamburg end-->

                        @if(!empty(Auth::user()))
                        <div class="login-user-dd" id="logged-user">
                            <div class="dropdown">
                                <a title="user" class="dropdown-toggle" data-toggle="dropdown" href="javascript:void(0)">
                                    <img src="{{ Auth::user()->userDetails && Auth::user()->userDetails->image ? Auth::user()->userDetails->image : url('assets/images/client-thumb.png') }}" alt="Logged in user profile image" title="User Picture" width="30" class="rounded-circle"/>
                                    <i class="bx bx-dots-vertical-rounded mb-0 text-primary h4"></i>
                                </a>
                                <div class="dropdown-menu dropdown-themes border-0 py-0 shadow animate slideIn dropdown-menu-right">
                                    <a href="{{ route('user.edit.profile') }}" class="dropdown-item" title="edit profile">
                                        <i class="bx bx-edit mr-2 text-warning align-middle"></i>
                                        Edit Profile
                                    </a>
                                    <a href="{{ route('user.order.history') }}" class="dropdown-item" title="downloads">
                                        <i class="bx bxs-download mr-2 text-primary align-middle"></i>
                                        Downloads
                                    </a>
                                    <a href="javascript:void(0)" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="dropdown-item" title="logout" id="logout-btn">
                                        <i class="bx bx-log-out mr-2 text-danger align-middle"></i>
                                        Logout
                                    </a>
                                </div>
                            </div>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: one;">
                                {{ csrf_field() }}
                            </form>
                        </div>
                        @endif

                        <div class="collapse navbar-collapse" id="navbarCollapse">
                            <ul class="navbar-nav ml-auto" id="mySidenav">
                                <li><a title="home" href="{{ route('home.products.list') }}" class="nav-link">Home</a></li>
                                <li class="dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" title="Themes" id="themesDropdown" role="button"
                                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                        Themes
                                    </a>
                                    <div class="dropdown-menu dropdown-themes border-0 py-0 shadow animate slideIn dropdown-menu-right" aria-labelledby="themesDropdown">
                                        <a class="dropdown-item font-weight-bold" href="{{ route('product.category', ['category' => 'premium-admin-bootstrap-templates']) }}"><i class='bx bx-grid-small text-secondary'></i> Browse All Themes</a>
                                        <a class="dropdown-item" title="Admin & Dashboard" href="{{ route('product.category', ['category' => 'admin-dashboard-template']) }}"><i
                                                class='bx bxs-bar-chart-square text-primary'></i> Admin Dashboard Templates</a>
                                        <a class="dropdown-item" title="Bootstrap Templates" href="{{ route('product.category', ['category' => 'bootstrap-templates']) }}"><i
                                                class='bx bxl-bootstrap text-bootstrap'></i>Bootstrap Templates</a>
                                        <a class="dropdown-item" title="Landing Pages" href="{{ route('product.category', ['category' => 'landing-pages-templates']) }}"><i class='bx bx-file text-success'></i>Landing
                                            Pages Templates</a>
                                        <a class="dropdown-item" title="Business & Corporate" href="{{ route('product.category', ['category' => 'business-corporate-templates']) }}"><i
                                                class='bx bxs-business text-warning'></i>Business &amp; Corporate Templates</a>
                                        <a class="dropdown-item" title="Portfolio & Dashboard" href="{{ route('product.category', ['category' => 'portfolio-resume-templates']) }}"><i
                                                class='bx bx-briefcase text-info'></i> Portfolio &amp; Resume Templates</a>
                                        <a class="dropdown-item" title="Angular Templates" href="{{ route('product.category', ['category' => 'angular-templates']) }}"><i class='bx bxl-angular text-angular'></i>
                                            Angular Templates</a>
                                    </div>
                                </li>
                                <li><a title="Free themes" href="{{ route('product.category', ['category' => 'freebies']) }}" class="nav-link">Freebies</a></li>

                                @if(!empty(Auth::user()))
                                <li><a title="Support" href="{{ route('support') }}" id="support-link" class="nav-link">Support</a></li>
                                @endif

                                <li><a title="Blogs" href="https://lettstartdesign.com/blog" class="nav-link">Blogs</a></li>
                            </ul>

                            @if(empty(Auth::user()))
                            <ul class="navbar-nav login-nav">
                                <li class="position-relative">
                                    <a title="Login/Signup" href="javascript:void(0)" id="auth-btn" class="nav-link">
                                        <i class='bx bx-user h5 mb-0 mr-1 align-middle'></i>Login / Signup
                                    </a>
                                </li>
                            </ul>
                            @endif

                        </div>
                        <!--navbar collapse end-->
                    </div>
                    <!--container end-->
                </nav>
                <!--navbar end-->
            </header>