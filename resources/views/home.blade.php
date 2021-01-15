@extends('layouts.main')

@section('content')

<section class="home-banner" id="home" data-scroll-index="1">
    <div class="container">
        <div class="banner-content text-center">
            <h1 class="mb-3">Affordable Themes and Templates</h1>
            <p class="mb-30 text-white font-weight-normal font-size-18">Create applications quicker with our free and
                premium templates built <br /> using Bootstrap, Angular, Vue.js, React and SASS</p>
            <div class="row justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <form id="search-form" novalidate="" action="javascript:void(0);">
                        <div class="search-box">
                            <div class="position-relative">
                                <input type="text" placeholder="Search Theme &amp; Template" class="form-control">
                                <button class="bx bx-search icon" type="submit"></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-10 col-lg-10 col-xl-8">
                    <ul class="keyword-list list-unstyled mt-1">
                        <li>Popular Keywords:</li>
                        <li><a href="javascript:void(0)" data-search="angular">Angular</a></li>
                        <li><a href="javascript:void(0)" data-search="landing">Landing</a></li>
                        <li><a href="javascript:void(0)" data-search="landing">Landing Page</a></li>
                        <li><a href="javascript:void(0)" data-search="business">Business</a></li>
                        <li><a href="javascript:void(0)" data-search="admin">Admin</a></li>
                        <li><a href="javascript:void(0)" data-search="portfolio">Portfolio</a></li>
                        <li><a href="javascript:void(0)" data-search="resume">Resume</a></li>
                        <li><a href="javascript:void(0)" data-search="corporate">Corporate</a></li>
                        <li><a href="javascript:void(0)" data-search="template">Template</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Hero Banner End-->
<!--Demo's Start-->
<section class="demos section" id="themes">
    <div class="container">
        <div class="section-categories mb-50">
            <div class="heading">
                <div class="heading-text">
                    <h2 class="h3">Best Selling Templates</h2>
                </div>
                <!-- <a href="all-themes.html" class="btn btn-outline-primary rounded-50 btn-sm">
                        View More
                </a> -->
            </div>
            <div class="row gutter-size-25" id="popular-list">
                <div class="loader-wrap static-loader p-5 bg-transparent">
                    <i class="bx bx-loader-alt h1 content-loader spinner3"></i>
                </div>
                @foreach ($bestSelling as $template)
                <div class="col-md-6">
                    <div class="demo-item" id="1">
                        <a href="{{ $template['detailLink'] }}" class="screenshot">
                            <img src="{{ url('images/slider-screenshot/'.$template['screenshot']) }}"  alt="{{$template['name']}}" class="img-fluid w-100" width="714" height="456">
                        </a>
                        <div class="action-btn">
                            <a href="{{ $template['demolink'] }}" title="Live Preview" class="btn btn-primary btn-sm">Live Preview</a>
                        </div>
                        <div class="theme-desc">
                            <div class="title">
                                <h3 class="h5">
                                    <a href="theme/{{$template['detailLink']}}" title="{{$template['name']}}">{{$template['name']}}</a></h3>
                                <p>{{ $template['oneLinerDesc'] }}</p>
                            </div>
                            <div class="price">
                                <h4 class="font-weight-bold">$5<span class="original-price">${{$template['price']}}</span></h4>
                                <a class="category" href="{{$template['catLink']}}">{{ $template['mainCat'] }}</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
        <div class="section-categories mb-50">
            <div class="heading">
                <div class="heading-text">
                    <h2 class="h3">Angular Templates</h2>
                </div>
                <!-- <a href="all-themes.html" class="btn btn-outline-primary rounded-50 btn-sm">
                        View More
                </a> -->
            </div>
            <div class="row" id="angular-list">
                <div class="loader-wrap static-loader p-5 bg-transparent">
                    <i class="bx bx-loader-alt h1 content-loader spinner3"></i>
                </div>
                @foreach ($angular as $template)
                <div class="col-md-6">
                    <div class="demo-item" id="1">
                        <a href="{{ $template['detailLink'] }}" class="screenshot">
                            <img src="{{ url('images/slider-screenshot/'.$template['screenshot']) }}"  alt="{{$template['name']}}" class="img-fluid w-100" width="714" height="456">
                        </a>
                        <div class="action-btn">
                            <a href="{{ $template['demolink'] }}" title="Live Preview" class="btn btn-primary btn-sm">Live Preview</a>
                        </div>
                        <div class="theme-desc">
                            <div class="title">
                                <h3 class="h5">
                                    <a href="theme/{{$template['detailLink']}}" title="{{$template['name']}}">{{$template['name']}}</a></h3>
                                <p>{{ $template['oneLinerDesc'] }}</p>
                            </div>
                            <div class="price">
                                <h4 class="font-weight-bold">$5<span class="original-price">${{$template['price']}}</span></h4>
                                <a class="category" href="{{$template['catLink']}}">{{ $template['mainCat'] }}</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <div class="section-categories mb-30">
            <div class="heading">
                <div class="heading-text">
                    <h2 class="h3">Latest Templates</h2>
                </div>
                <!-- <a href="all-themes.html" class="btn btn-outline-primary rounded-50 btn-sm">
                        View More
                </a> -->
            </div>
            <div class="row" id="recent-list">
                <div class="loader-wrap static-loader p-5 bg-transparent">
                    <i class="bx bx-loader-alt h1 content-loader spinner3"></i>
                </div>
                @foreach ($latest as $template)
                <div class="col-md-6">
                    <div class="demo-item" id="1">
                        <a href="{{ $template['detailLink'] }}" class="screenshot">
                            <img src="{{ url('images/slider-screenshot/'.$template['screenshot']) }}"  alt="{{$template['name']}}" class="img-fluid w-100" width="714" height="456">
                        </a>
                        <div class="action-btn">
                            <a href="{{ $template['demolink'] }}" title="Live Preview" class="btn btn-primary btn-sm">Live Preview</a>
                        </div>
                        <div class="theme-desc">
                            <div class="title">
                                <h3 class="h5">
                                    <a href="theme/{{$template['detailLink']}}" title="{{$template['name']}}">{{$template['name']}}</a></h3>
                                <p>{{ $template['oneLinerDesc'] }}</p>
                            </div>
                            <div class="price">
                                <h4 class="font-weight-bold">$5<span class="original-price">${{$template['price']}}</span></h4>
                                <a class="category" href="{{$template['catLink']}}">{{ $template['mainCat'] }}</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <div class="text-center mb-50" id="explore-all-btn">
            <a href="all-themes.html" class="btn btn-primary-gred rounded-50">Explore All Products <i class="bx bx-right-arrow-alt align-middle"></i></a>
        </div>
    </div>
</section>
</div>

<!-- Footer Start-->
<!-- Modal -->
@include('layouts.partials.modals')

@endsection