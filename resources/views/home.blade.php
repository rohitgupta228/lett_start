@extends('layouts.main')

@section('content')

    <section class="home-banner" id="home" data-scroll-index="1">
        <div class="container">
            <div class="banner-content text-center">
                <h1 class="mb-3">Bootstrap Themes and Templates</h1>
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
                    <a data-track-elem event-category="View All"  event-action="click" event-label="Best Selling Templates" href="{{ route('product.category', ['category' => 'premium-admin-bootstrap-templates']) }}" title="View All Templates & Themes" class="btn btn-primary-gred btn-sm"> View All </a>
                </div>
                <div class="row gutter-size-25" id="popular-list">
                    @foreach ($bestSelling as $template)
                        <div class="col-md-6 col-xl-4">
                            <div class="demo-item" id="{{ $template['id'] }}">
                                <a title="Read more about this theme" href="theme/{{ $template['detailLink'] }}"
                                    class="screenshot" data-track-elem event-category="View Product"  event-action="click" event-label="{{ $template['name'] }}">
                                    <img src="{{ url('assets/images/slider-screenshot/' . $template['screenshot']) }}"
                                        srcset="{{ url('assets/images/slider-screenshot/' . explode('.', $template['screenshot'])[0] . '-sm.' . explode('.', $template['screenshot'])[1]) }} 767w, {{ url('assets/images/slider-screenshot/' . $template['screenshot']) }} 3000w"
                                        sizes="100vw"
                                        title="{{ $template['name'] }} Template"
                                        alt="Buy {{ $template['name'] }} Template at ${{ $template['price'] }}"
                                        class="img-fluid w-100" width="714" height="456">
                                </a>
                                <div class="action-btn">
                                    <a href="theme/{{ $template['detailLink'] . '#demos' }}" data-track-elem event-category="Live Preview"  event-action="click" event-label="{{ $template['name'] }}" title="Click & See Live Preview" class="btn btn-primary btn-sm">Live Preview</a>
                                </div>
                                <div class="theme-desc">
                                    <div class="title">
                                        <h3 class="h5">
                                            <a href="theme/{{ $template['detailLink'] }}" data-track-elem event-category="View Product"  event-action="click" event-label="{{ $template['name'] }}"
                                                title="Read more about this {{ $template['name'] }} template">{{ $template['name'] }}</a>
                                        </h3>
                                        <p>{{ $template['oneLinerDesc'] }}</p>
                                    </div>
                                    <div class="demo-footer">
                                        <span class="h4 mb-0 price">${{ $template['price'] }}</span>
                                        <div class="rating-info">
                                            <input type="hidden" class="rating" name="rating" data-filled="bx bxs-star text-warning" data-empty="bx bx-star text-warning" value="{{ $template['rating'] }}" data-readonly data-fractions=2 />
                                            <span class="sale-count">{{ $template['num_downloads'] }} sales</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
            <div class="section-categories">
                <div class="heading">
                    <div class="heading-text">
                        <h2 class="h3">Bootstrap HTML Templates & Themes</h2>
                    </div>
                    <a data-track-elem event-category="View All"  event-action="click" event-label="Bootstrap HTML Templates & Themes" href="{{ route('product.category', ['category' => 'bootstrap-templates']) }}" title="View All Bootstrap HTML Templates & Themes" class="btn btn-primary-gred btn-sm"> View All </a>
                </div>
                <div class="row gutter-size-25" id="recent-list">
                    @foreach ($bootstrap as $template)
                        <div class="col-md-6 col-xl-4">
                            <div class="demo-item" id="{{ $template['id'] }}">
                                <a title="Read more about this templates" href="theme/{{ $template['detailLink'] }}"
                                    class="screenshot" data-track-elem event-category="View Product"  event-action="click" event-label="{{ $template['name'] }}">
                                    <img src="{{ url('assets/images/slider-screenshot/' . $template['screenshot']) }}"
                                    srcset="{{ url('assets/images/slider-screenshot/' . explode('.', $template['screenshot'])[0] . '-sm.' . explode('.', $template['screenshot'])[1]) }} 767w, {{ url('assets/images/slider-screenshot/' . $template['screenshot']) }} 3000w"
                                    sizes="100vw"
                                        title="{{ $template['name'] }} Template"
                                        alt="Buy {{ $template['name'] }} Template at ${{ $template['price'] }}"
                                        class="img-fluid w-100" width="714" height="456">
                                </a>
                                <div class="action-btn">
                                    <a href="theme/{{ $template['detailLink'] . '#demos' }}" data-track-elem event-category="Live Preview"  event-action="click" event-label="{{ $template['name'] }}"
                                        title="Click & See Live Preview" class="btn btn-primary btn-sm">Live Preview</a>
                                </div>
                                <div class="theme-desc">
                                    <div class="title">
                                        <h3 class="h5">
                                            <a href="theme/{{ $template['detailLink'] }}" data-track-elem event-category="View Product"  event-action="click" event-label="{{ $template['name'] }}"
                                                title="Read more about this {{ $template['name'] }} template">{{ $template['name'] }}</a>
                                        </h3>
                                        <p>{{ $template['oneLinerDesc'] }}</p>
                                    </div>
                                    
                                    <div class="demo-footer">
                                        <span class="h4 mb-0 price">${{ $template['price'] }}</span>
                                        <div class="rating-info">
                                            <input type="hidden" class="rating" name="rating" data-filled="bx bxs-star text-warning" data-empty="bx bx-star text-warning" value="{{ $template['rating'] }}" data-readonly data-fractions=2 />
                                            <span class="sale-count">{{ $template['num_downloads'] }} sales</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="highlight-section">
                    <div class="media">
                        <div class="dotted-wrap">
                            <div class="image">
                                <img src="assets/images/boot-collage.png" width="350"
                                    title="bootstrap all themes and templates" alt="bootstrap themes collage" />
                            </div>
                        </div>
                        <div class="media-body">
                            <p class="mb-30">Bootstrap is a CSS based framework used to build responsive UI's. All Our layouts are built with the Bootstrap framework including Angular, Landing Pages, Portfolio, Business & Corporates, etc. followed by best coding practices. All themes and templates at a very cheap price and unique for every project. Get your best template for your business.</p>
                            <a href="{{ route('product.category', ['category' => 'bootstrap-templates']) }}" data-track-elem event-category="View All"  event-action="click" event-label="View All Bootstrap Templates"
                                title="View All Bootstrap Themes and Templates" class="btn btn-primary-gred">View All Bootstrap
                                Templates</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="section-categories mb-50">
                <div class="heading">
                    <div class="heading-text">
                        <h2 class="h3">Angular Templates</h2>
                    </div>
                    <a href="{{ route('product.category', ['category' => 'angular-templates']) }}" data-track-elem event-category="View All"  event-action="click" event-label="Angular Templates"
                        title="View All Angular Themes and Templates" class="btn btn-primary-gred btn-sm">
												View All
                    </a>
                </div>
                <div class="row gutter-size-25" id="angular-list">
                    @foreach ($angular as $template)
                        <div class="col-md-6 col-xl-4">
                            <div class="demo-item" id="{{ $template['id'] }}">
                                <a title="Read more about this theme" href="theme/{{ $template['detailLink'] }}" data-track-elem event-category="View Product"  event-action="click" event-label="{{ $template['name'] }}"
                                    class="screenshot">
                                    <img src="{{ url('assets/images/slider-screenshot/' . $template['screenshot']) }}"
                                    srcset="{{ url('assets/images/slider-screenshot/' . explode('.', $template['screenshot'])[0] . '-sm.' . explode('.', $template['screenshot'])[1]) }} 767w, {{ url('assets/images/slider-screenshot/' . $template['screenshot']) }} 3000w"
                                    sizes="100vw"
                                        title="{{ $template['name'] }} Template"
                                        alt="Buy {{ $template['name'] }} Template at ${{ $template['price'] }}"
                                        class="img-fluid w-100" width="714" height="456">
                                </a>
                                <div class="action-btn">
                                    <a href="theme/{{ $template['detailLink'] . '#demos' }}" data-track-elem event-category="Live Preview"  event-action="click" event-label="{{ $template['name'] }}"
                                        title="Click & See Live Preview" class="btn btn-primary btn-sm">Live Preview</a>
                                </div>
                                <div class="theme-desc">
                                    <div class="title">
                                        <h3 class="h5">
                                            <a href="theme/{{ $template['detailLink'] }}" data-track-elem event-category="View Product"  event-action="click" event-label="{{ $template['name'] }}"
                                                title="Read more about this {{ $template['name'] }} template">{{ $template['name'] }}</a>
                                        </h3>
                                        <p>{{ $template['oneLinerDesc'] }}</p>
                                    </div>
                                    
                                    <div class="demo-footer">
                                        <span class="h4 mb-0 price">${{ $template['price'] }}</span>
                                        <div class="rating-info">
                                            <input type="hidden" class="rating" name="rating" data-filled="bx bxs-star text-warning" data-empty="bx bx-star text-warning" value="{{ $template['rating'] }}" data-readonly data-fractions=2 />
                                            <span class="sale-count">{{ $template['num_downloads'] }} sales</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="section-categories">
                <div class="heading">
                    <div class="heading-text">
                        <h2 class="h3">Free Templates</h2>
                    </div>
                    <a href="{{ route('product.category', ['category' => 'freebies']) }}" data-track-elem event-category="View All"  event-action="click" event-label="Free Themes and Templates"
                        title="View All Free Themes and Templates" class="btn btn-primary-gred btn-sm">
                        View All
                    </a>
                </div>
                <div class="row gutter-size-25" id="free-list">
                    @foreach ($freebies as $template)
                        <div class="col-md-6 col-xl-4">
                            <div class="demo-item" id="{{ $template['id'] }}">
                                <a title="Read more about this theme" href="theme/{{ $template['detailLink'] }}" data-track-elem event-category="View Product"  event-action="click" event-label="{{ $template['name'] }}"
                                    class="screenshot">
                                    <img src="{{ url('assets/images/slider-screenshot/' . $template['screenshot']) }}"
                                    srcset="{{ url('assets/images/slider-screenshot/' . explode('.', $template['screenshot'])[0] . '-sm.' . explode('.', $template['screenshot'])[1]) }} 767w, {{ url('assets/images/slider-screenshot/' . $template['screenshot']) }} 3000w"
                                    sizes="100vw"
                                        title="{{ $template['name'] }} Template"
                                        alt="Buy {{ $template['name'] }} Template at ${{ $template['price'] }}"
                                        class="img-fluid w-100" width="714" height="456">
                                </a>
                                <div class="action-btn">
                                    <a href="theme/{{ $template['detailLink'] . '#demos' }}" data-track-elem event-category="Live Preview"  event-action="click" event-label="{{ $template['name'] }}"
                                        title="Click & See Live Preview" class="btn btn-primary btn-sm">Live Preview</a>
                                </div>
                                <div class="theme-desc">
                                    <div class="title">
                                        <h3 class="h5">
                                            <a href="theme/{{ $template['detailLink'] }}" data-track-elem event-category="View Product"  event-action="click" event-label="{{ $template['name'] }}"
                                                title="Read more about this {{ $template['name'] }} template">{{ $template['name'] }}</a>
                                        </h3>
                                        <p>{{ $template['oneLinerDesc'] }}</p>
                                    </div>
                                    <div class="demo-footer">
                                        <span class="h4 mb-0 price">Free</span>
                                        <div class="rating-info">
                                            <input type="hidden" class="rating" name="rating" data-filled="bx bxs-star text-warning" data-empty="bx bx-star text-warning" value="{{ $template['rating'] }}" data-readonly data-fractions=2 />
                                            <span class="sale-count">{{ $template['num_downloads'] }} sales</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <section class="section bg-light">
        <div class="container">
            <div class="heading justify-content-center">
                <div class="heading-text text-center">
                    <h2 class="h3">Lettstart Design - Digital Marketplace</h2>
                </div>
            </div>
            <div class="text-center mb-50 pb-15">
                <p>LettstartDesign is a growing marketplace where you can discover top-notch digital products that follow the latest web standards. The collection of products includes a wide decision of site layouts reasonable for a wide range of specialty explicit ventures, small or large organizations, new companies, and some other sort of business that you end up running. There are superior quality and free website templates that you can download for your inventive web project. The marketplace incorporates Bootstrap-based site layouts, HTML5 and CSS3 instant arrangements, site formats stacked with a web designer, and that's only the tip of the iceberg.</p>
            </div>
            <div class="features">
                <div class="row">
                    <div class="col-sm-6 col-lg-3 mb-30">
                        <div class="feature bg-white">
                            <div class="icon">
                                <i class="bx bx-support"></i>
                            </div>
														<h5 class="h6">24/7 Theme Support</h5>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3 mb-30">
                        <div class="feature bg-white">
                            <div class="icon">
                                <i class="bx bx-file"></i>
                            </div>
														<h5 class="h6">Clear Documentation</h5>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3 mb-30">
                        <div class="feature bg-white">
                            <div class="icon">
                                <i class="bx bx-code"></i>
                            </div>
														<h5 class="h6">Clean and Customize Code</h5>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3 mb-30">
                        <div class="feature bg-white">
                            <div class="icon">
																<i class='bx bxs-badge-check'></i>
                            </div>
														<h5 class="h6">Quality Themes</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section">
        <div class="container">
            <div class="row flex-md-row-reverse">
                <div class="col-md-6 offset-md-1 mb-30">
                    <h3 class="mb-30">Showcase Your Work</h3>
                    <p>If you need a ready-made solution to showcase your work, <a href="{{ route('product.category', ['category' => 'portfolio-resume-templates']) }}">Portfolio and Resume Templates</a> are the best. We include a template that is customer concentric and fulfills the need for every type of project. Each portfolio and resume layout is made with the most recent web advancement strategies follow best coding rehearses. The instant portfolio and resume designs represent proficient blends of plans and usefulness. They highlight all the fundamental components expected to exhibit your work.</p>
                    <a href="{{ route('product.category', ['category' => '']) }}" data-track-elem event-category="Browse All"  event-action="click" event-label="browse all click on home page"
                        class="mt-15 btn btn-primary-gred rounded-50 browse-all">Browse All Products
                    </a>
                </div>
                <div class="col-md-5">
                    <img src="assets/images/home-work.svg" alt="Showcase your work image" title="To showcase your work our portfolio and resume templates is a perfect fit." />
                </div>
            </div>
        </div>
    </section>
    </div>

    <!-- Footer Start-->
    <!-- Modal -->
    @include('layouts.partials.modals')
@endsection
@section('footer_script')
<script>
	var params = new URLSearchParams(window.location.search);
	var success = params.get('forgot');
	if (success === 'true') {
			$("#resetModal").modal('show')
	};
	var bestSelling = <?= json_encode($bestSelling) ?>, bootstrap = <?= json_encode($bootstrap) ?>, angular = <?= json_encode($angular) ?>, freebies = <?= json_encode($freebies) ?>;
	var ldSchema = {
		"@context": "https://schema.org",
		"@graph": [
			{
				"@type": "Organization",
				"@id": "https://lettstartdesign.com/#organization",
				"name": "Lettstart Design",
				"url": "https://lettstartdesign.com",
				"logo": "https://lettstartdesign.com/assets/images/logo-dark.png"
			},
			{
				"@type": "WebSite",
				"@id": "https://lettstartdesign.com/#website",
				"url": "https://lettstartdesign.com",
				"name": "Lettstart Design",
				"publisher": {
					"@id": "https://lettstartdesign.com/#organization"
				},
				"inLanguage": "en-US",
				"logo": "https://lettstartdesign.com/assets/images/logo-dark.png"
			},
			{
				"@type": "WebPage",
				"@id": "https://lettstartdesign.com/#webpage",
				"url": "https://lettstartdesign.com/",
				"name": "Best Responsive HTML5 Bootstrap and Angular Website Templates",
				"datePublished": "2021-02-11",
				"dateModified": "2021-02-11",
				"isPartOf": {
					"@id": "https://lettstartdesign.com/#website"
				},
				"inLanguage": "en-US"
			}
		]
	};
	addArticle("Best Selling Templates", null, ldSchema);
    var addProductSchema = {
        "@context": "http://schema.org",
        "@type": "ItemList",
        "itemListElement":[]
    };
	var itemList = addProduct(bestSelling, ldSchema);
    addProductSchema["itemListElement"].push(itemList);
	addArticle("Bootstrap HTML Templates & Themes", null, ldSchema);

	itemList = addProduct(bootstrap);
    addProductSchema["itemListElement"].push(itemList);

	addArticle("Angular Templates", null, ldSchema);

	itemList = addProduct(angular);
    addProductSchema["itemListElement"].push(itemList);

	addArticle("Free Templates", null, ldSchema);

	itemList = addProduct(freebies);
    addProductSchema["itemListElement"].push(itemList);
    ldSchema["@graph"].push(addProductSchema);

	var article = {
		name: "Lettstart Design - Digital Marketplace",
		desc: "LettstartDesign is a growing marketplace where you can discover top-notch digital products that follow the latest web standards. The collection of products includes a wide decision of site layouts reasonable for a wide range of specialty explicit ventures, small or large organizations, new companies, and some other sort of business that you end up running. There are superior quality and free website templates that you can download for your inventive web project. The marketplace incorporates Bootstrap-based site layouts, HTML5 and CSS3 instant arrangements, site formats stacked with a web designer, and that's only the tip of the iceberg."
	};
	addArticle(article.name, article.desc, ldSchema);
	addArticle("24/7 Theme Support", null, ldSchema, true);
	addArticle("Clear Documentation", null, ldSchema, true);
	addArticle("Clean and Customize Code", null, ldSchema, true);
	addArticle("Quality Themes", null, ldSchema, true);
	article = {
		name: "Showcase Your Work",
		desc: "If you need a ready-made solution to showcase your work, Portfolio and Resume Templates are the best. We include a template that is customer concentric and fulfills the need for every type of project. Each portfolio and resume layout is made with the most recent web advancement strategies follow best coding rehearses. The instant portfolio and resume designs represent proficient blends of plans and usefulness. They highlight all the fundamental components expected to exhibit your work."
	};
	addArticle(article.name, article.desc, ldSchema);
	var obj = {
        "@type": "CreateAction",
		"title": "Browse All Products",
        "url": "https://lettstartdesign.com/category/premium-admin-bootstrap-templates"
	};
	ldSchema["@graph"].push(obj);
	var el = document.createElement('script');
	el.type = 'application/ld+json';
	el.text = JSON.stringify(ldSchema);
	document.querySelector('head').appendChild(el);
</script>
@endsection