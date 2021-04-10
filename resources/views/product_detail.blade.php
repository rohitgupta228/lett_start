@extends('layouts.main')

@section('title', $title)

@section('meta_title', $title)

@section('meta_description', $description)

@section('content')
    <!--Main title-->
    <div class="theme-title mt-100">
        <div class="container">
            <div class="breadcrumb">
                <ul class="list-unstyled">
                    <li><a href="{{ route('home.products.list') }}" title="Home">Home</a></li>
                    <li><a href="{{ route('product.category', ['category' => 'premium-admin-bootstrap-templates']) }}"
                            title="All themes">All Themes</a>
                    </li>
                    <li><a class="active" href="{{ route('product.category', ['category' => $product['catLink']]) }}"
                            title="{{ $product['mainCat'] }}">{{ $product['mainCat'] }}</a></li>
                </ul>
            </div>
            <h1 id="main-title" class="h2 font-weight-bold">{{ $product['name'] }}</h1>
        </div>
    </div>
    <!--Demo's Start-->
    <!--Don't remove inner content wrapper-->
    <div class="section pt-0">
        <div class="container">
            <div class="inner-content">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="slider-area" id="slider-area">
                            <img src="{{ url('assets/images/slider-screenshot/' . $product['screenshot']) }}"
                                srcset="{{ url('assets/images/slider-screenshot/' . explode('.', $product['screenshot'])[0] . '-sm.' . explode('.', $product['screenshot'])[1]) }} 767w, {{ url('assets/images/slider-screenshot/' . $product['screenshot']) }} 3000w"
                                sizes="100vw" class="img-fluid border-radius-1x w-100"
                                title="{{ $product['name'] }} Template"
                                alt="Feature Image of {{ $product['name'] }} Template" width="714" height="456" />
                            <div class="live-example">
                                <div class="mb-2 mb-sm-0">
                                    <a href="javascript:void(0)" id="preview-btn" class="btn btn-dark mr-2" data-track-elem event-category="Live Preview"  event-action="click" event-label="{{ $product['name'] }}">Live Preview</a>
                                    <a href="{{ url($product['docLink']) }}" target="_blank" id="doc-btn" data-track-elem event-category="Docs View"  event-action="click" event-label="{{ $product['name'] }}"
                                        class="btn btn-outline-secondary">Docs</a>
                                </div>
                                <div class="tech-details">
                                    @foreach (json_decode($product['techUsed']) as $techUsed)
                                        <div class="tooltip-wrap">
                                            <div class="tooltip bs-tooltip-top" role="tooltip">
                                                <div class="arrow"></div>
                                                <div class="tooltip-inner">{{ $techUsed->tooltip }}</div>
                                            </div>
                                            <span><i
                                                    class="bx {{ $techUsed->icon }} text-{{ $techUsed->iconClass }} h2 mb-0"></i></span>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 pl-xl-5">
                        <aside class="theme-actions">
                            <div class="reviews mb-30">
                                <div class="total-downloads">
                                    <div class="media text-center">
                                        <div class="media-body">
                                            <div class="h3 d-block mb-0">
                                                <i class="bx bxs-cart-download align-middle"></i>
                                                <span class="align-middle">{{ $downloads }}</span> 
                                            </div>
                                            <span class="d-block font-size-14 text-muted">Downloads</span>
                                        </div>
                                    </div>
                                    <div class="media text-center">
                                        <div class="media-body">
                                            <input type="hidden" class="rating" name="rating" data-filled="bx bxs-star text-warning" data-empty="bx bx-star text-warning" value={{ $product->rating }} data-readonly data-fractions=2 />
                                            <div class="font-size-14"><a href="javascript:void(0);" class="text-dark" id="see-review">({{ count($reviews) }} reviews)</a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @if ($product['price'] == 0)
                            <div class="checklist-tabs">
                                <div class="checklist">
                                    <ul class="list-unstyled mb-30">
                                        <li class="py-1 font-size-14"><i
                                                class="bx bxs-check-circle text-success h5 mb-0 mr-2 font-weight-normal"></i>Free Download</li>
                                        <li class="py-1 font-size-14"><i
                                                class="bx bxs-check-circle text-success h5 mb-0 mr-2 font-weight-normal"></i>No Documentation</li>
                                        <li class="py-1 font-size-14"><i
                                                class="bx bxs-check-circle text-success h5 mb-0 mr-2 font-weight-normal"></i>No Support</li>
                                        <li class="py-1 font-size-14"><i
                                                class="bx bxs-check-circle text-success h5 mb-0 mr-2"></i> Limited Pages
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            @endif
                            @if ($product['price'] != 0)
                                <div class="package-type position-relative">
                                        <ul class="list-unstyled mb-2" id="licence-types">
                                                <li class="selected" data-tab="single">
                                                        <div class="licence-type">
                                                                <span class="radio"></span>
                                                                <div>
                                                                        <h6 class="mb-0">Single Use</h6>
                                                                        <span class="subtext"> For One Project </span>
                                                                </div>
                                                        </div>
                                                        <div class="licence-value ml-auto text-right">
                                                                <h6 class="price mb-0 font-weight-bold" id="single-use">
                                                                        ${{ $product['price'] }}
                                                                </h6>
                                                                <span class="subtext">One time pay</span>
                                                        </div>
                                                </li>
                                                <li data-tab="multiple">
                                                        <div class="licence-type">
                                                                <span class="radio"></span>
                                                                <div>
                                                                        <h6 class="mb-0">Multiple Use</h6>
                                                                        <span class="subtext"> For Unlimited Project </span>
                                                                </div>
                                                        </div>
                                                        <div class="licence-value ml-auto text-right">
                                                                <h6 class="price mb-0 font-weight-bold" id="multi-use">
                                                                        ${{ $product['price'] * 5 }}</h6>
                                                                <span class="subtext">One time pay</span>
                                                        </div>
                                                </li>
                                        </ul>
                                </div>
                            @endif
                            @if ($product['price'] != 0)
                            <div class="licence-link mb-15">
                                <a href="{{ route('license') }}">Licence Details</a>
                            </div>
                            @endif
                            <div class="payment-options" id="payment-options">
                                @if ($product['price'] == 0)
                                    @if($product['internalLink'])
                                        <a href="{{ $product['internalLink'] }}" class="btn btn-success mr-2" data-track-elem event-category="Premium Product Click"  event-action="click" event-label="{{ $product['name'] }}">
                                            Go Pro
                                        </a>
                                    @endif
                                    <button class="btn btn-primary-gred" id="free-purchase">
                                        <span>Download</span>
                                        <span class="align-middle btn-loader"><i
                                                class="bx bx-loader-alt bx-spin icon-md"></i></span>
                                    </button>
                                @else
                                    <div class="pay-options">
                                        <h6 class="mr-3">Pay with</h6>
                                        <div class="options mb-15" id="options">
                                            <button class="pay-btn btn-paypal selected" data-selection='razorpay'>
                                                <img src="{{ url('assets/images/razorpay-icon.png') }}" title="Razorpay"
                                                    alt="Razorpay Logo" width="15" />
                                                Razorpay
                                            </button>
                                            <button class="pay-btn btn-paypal" data-selection='paypal'>
                                                <i class="bx bxl-paypal text-paypal"></i> Paypal
                                            </button>
                                        </div>
                                    </div>
                                    <div class="tab-content pt-2" id="option-data">
                                        <div data-id="razorpay" data-type="razorpay" class="tab-pane active fade show">
                                            <button class="btn btn-primary-gred btn-block disable-events" id="razorpay-btn" data-track-elem event-category="Buy Now"  event-action="click" event-label="Razorpay">
                                                <span>Buy Now</span>
                                                <span class="align-middle btn-loader"><i
                                                        class="bx bx-loader-alt bx-spin icon-md"></i></span>
                                            </button>
                                        </div>
                                        <div data-id="paypal" data-type="paypal" class="tab-pane fade">
                                            <button class="btn btn-primary-gred btn-block" id="paypal-btn" data-track-elem event-category="Buy Now"  event-action="click" event-label="Paypal">
                                                <span>Buy Now</span>
                                                <span class="align-middle btn-loader"><i
                                                        class="bx bx-loader-alt bx-spin icon-md"></i></span>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="alert alert-info mt-2 mb-0 font-size-13">
                                        <b>Note:</b> Indian customers please choose Razorpay payment option and Outside
                                        india
                                        customers please choose paypal as payment option.
                                    </div>
                                @endif
                            </div>
                        </aside>
                    </div>
                </div>
                <div class="package-tabs mt-50">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#details" role="tab"
                                aria-controls="details" aria-selected="true"><i
                                    class="bx bx-detail mr-1 icon-sm align-middle"></i> <span
                                    class="align-middle">Details</span></a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="demo-tab" data-toggle="tab" href="#demos" role="tab"
                                aria-controls="demos" aria-selected="true"><i
                                    class="bx bx-screenshot mr-1 icon-sm align-middle"></i> <span
                                    class="align-middle">Demos</span></a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="review-tab" data-toggle="tab" href="#reviews" role="tab"
                                aria-controls="reviews" aria-selected="true"><i
                                    class="bx bx-comment mr-1 icon-sm align-middle"></i> <span
                                    class="align-middle">Reviews</span></a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="Change-tab" data-toggle="tab" href="#change-log" role="tab"
                                aria-controls="change-log" aria-selected="false"><i
                                    class="bx bx-message-square-edit mr-1 icon-sm align-middle"></i> <span
                                    class="align-middle">Change Log</span></a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="details" role="tabpanel" aria-labelledby="details">
                            <div class="row pb-5 border-bottom">
                                <div class="col-md-3">
                                    <h2 class="mb-30 h3">Overview</h2>
                                </div>
                                <div class="col-md-9" id="overview-html">
                                    {!! $product['overviewHTML'] !!}
                                </div>
                            </div>
                            <div class="row mt-5 ">
                                <div class="col-md-3">
                                    <h2 class="mb-30 h3">Highlights</h2>
                                </div>
                                <div class="col-md-9">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="checklist">
                                                <ul class="list-unstyled">
                                                    @foreach (json_decode($product['highlight1']) as $highlight1)
                                                        <li>
                                                            <i
                                                                class="bx bxs-check-circle text-success h5 mb-0 mr-2 font-weight-normal"></i>
                                                            <span>{{ $highlight1 }}</span>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="checklist">
                                                <ul class="list-unstyled">
                                                    @foreach (json_decode($product['highlight2']) as $highlight2)
                                                        <li>
                                                            <i
                                                                class="bx bxs-check-circle text-success h5 mb-0 mr-2 font-weight-normal"></i>
                                                            <span>{{ $highlight2 }}</span>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="theme-facts my-5">
                                @foreach (json_decode($product['themeFacts']) as $key => $value)
                                    <div class="facts text-center">
                                        @foreach ($value as $facts)
                                            <div class="card box-shadow-none">
                                                <div class="card-body">
                                                    <h3 class="card-title h2">{{ $facts->title }}</h3>
                                                    <p class="card-text mb-0">{{ $facts->text }}</p>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="tab-pane fade" id="demos" role="tabpanel" aria-labelledby="demos">
                            @foreach (json_decode($product['screenshots']) as $screenshots)
                                <div class="theme-demos mb-3">
                                    <div class="head-text">
                                        <h2 class="h3">{{ $screenshots->title }}</h2>
                                    </div>
                                    <div class="demo-screenshot">
                                        <div class="row gutter-size-25">
                                            @foreach ($screenshots->screens as $screens)
                                                <div class="col-md-6 col-lg-4">
                                                    <div class="demo-theme-item">
                                                        <a href="{{ $product['liveDemoBaseStr'] . $screens->link }}"
                                                            target="_blank">
                                                            <img src="{{ url('assets/images/screenshots/' . $product['screenshotDir'] . '/' . $screens->img) }}"
                                                                class="img-fluid border-radius-1x"
                                                                title="{{ $screens->imgTitle }}"
                                                                alt="Image Preview of {{ $screens->imgTitle }} Product">
                                                        </a>
                                                        <div class="desc">
                                                            <h5>{{ $screens->imgTitle }}</h5>
                                                            <a href="{{ $product['liveDemoBaseStr'] . $screens->link }}"
                                                                title="Live Preview" target="_blank">Live Preview</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            <div class="theme-facts my-5">
                                @foreach (json_decode($product['themeFacts']) as $key => $value)
                                    <div class="facts text-center">
                                        @foreach ($value as $facts)
                                            <div class="card box-shadow-none">
                                                <div class="card-body">
                                                    <h3 class="card-title h2">{{ $facts->title }}</h3>
                                                    <p class="card-text mb-0">{{ $facts->text }}</p>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews">
                            <div class="review-list">
                                <div class="row">
                                   @foreach($reviews as $review)
                                        <div class="col-md-6 col-lg-4 mb-30">
                                            <div class="review border-radius-1x">
                                                <div class="media align-items-center">
                                                    <img src="{{ url('assets/images/anonymous-thumb.png') }}" alt="user anonymous image" class="rounded-circle mr-15" />
                                                    <div class="media-body">
                                                        <input type="hidden" class="rating" name="rating" data-filled="bx bxs-star text-warning" data-empty="bx bx-star text-warning" value="{{ $review->rating }}" data-readonly data-fractions=2 />
                                                        <h6 class="mb-0">{{ $review->username }}</h6>
                                                    </div>
                                                </div>
                                                <div class="comments">
                                                    <p class="mb-0">{{ $review->comments }}</p>
                                                </div>
                                            </div>
                                        </div>
                                   @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="change-log" role="tabpanel" aria-labelledby="change-log">
                            <div class="initial-logs border-radius-2x">
                                @foreach (json_decode($product['initialLog']) as $logs)
                                    @if ($logs->text == 'Created:')
                                        <div class="logs">
                                            <span class="bx {{ $logs->icon }} text-primary mr-1"></span>
                                            {{ $logs->text }} {{ date('M,d Y', strtotime($product['created_at'])) }}
                                        </div>
                                    @elseif ($logs->text == 'Updated:')
                                        <div class="logs">
                                            <span class="bx {{ $logs->icon }} text-primary mr-1"></span>
                                            {{ $logs->text }} {{ date('M,d Y', strtotime($product['updated_at'])) }}
                                        </div>
                                    @else
                                        <div class="logs">
                                            <span class="bx {{ $logs->icon }} text-primary mr-1"></span>
                                            {{ $logs->text }}
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="mt-100">
                        <div class="heading">
                            <div class="heading-text">
                                <h4 class="mb-0">Related Products</h4>
                            </div>
                            <a href="{{ route('product.category', ['category' => 'premium-admin-bootstrap-templates']) }}"
                                title="View All Templates & Themes" class="btn btn-primary-gred btn-sm" data-track-elem event-category="View All"  event-action="click" event-label="View All Templates"> View All </a>
                        </div>
                        <div class="row" id="related-products">
                            @foreach ($relatedProducts as $template)
                                <div class="col-md-4">
                                    <div class="demo-item" id="{{ $template['id'] }}">
                                        <a href="{{ route('product.theme', ['detailLink' => $template['detailLink']]) }}" data-track-elem event-category="View Product"  event-action="click" event-label="{{ $template['name'] }}"
                                            class="screenshot">
                                            <img src="{{ url('assets/images/slider-screenshot/' . $template['screenshot']) }}"
                                                srcset="{{ url('assets/images/slider-screenshot/' . explode('.', $template['screenshot'])[0] . '-sm.' . explode('.', $template['screenshot'])[1]) }} 767w, {{ url('assets/images/slider-screenshot/' . $template['screenshot']) }} 3000w"
                                                sizes="100vw" title="{{ $template['name'] }} Template"
                                                alt="Buy {{ $template['name'] }} Template at ${{ $template['price'] }}"
                                                class="img-fluid w-100" width="714" height="456">
                                        </a>
                                        <div class="action-btn">
                                            <a data-track-elem event-category="Live Preview"  event-action="click" event-label="{{ $template['name'] }}" href="{{ route('product.theme', ['detailLink' => $template['detailLink']]) . '#demos' }}"
                                                title="Live Preview" class="btn btn-primary btn-sm">Live Preview</a>
                                        </div>
                                        <div class="theme-desc">
                                            <div class="title">
                                                <h3 class="h5">
                                                    <a data-track-elem event-category="View Product"  event-action="click" event-label="{{ $template['name'] }}" href="{{ route('product.theme', ['detailLink' => $template['detailLink']]) }}"
                                                        title="{{ $template['name'] }}">{{ $template['name'] }}</a>
                                                </h3>
                                                <p>{{ $template['oneLinerDesc'] }}</p>
                                            </div>
                                            <div class="price">
                                                <span class="h4 mb-0">${{ $template['price'] }}</span>
                                                <a class="category"
                                                    href="{{ $template['catLink'] }}">{{ $template['mainCat'] }}</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Demo's End-->
    </div>
    @include('layouts.partials.modals')
    <div class="modal fade thankyou-modal" id="successModal" tabindex="-1" aria-labelledby="successModal"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i class="bx bx-x h3 mb-0 font-weight-normal"></i>
                    </button>
                </div>
                <div class="modal-body p-30 text-center">
                    <div class="mb-15">
                        <i class="bx bx-check-circle text-success font-weight-normal mb-0"></i>
                    </div>
                    @if ($product['price'] != 0)
                    <h5 class="mb-15">Thank you for purchasing our product.</h5>
                    <p> We've sent an email with all the necessary details along with product download link. If you have any
                        trouble to download your files. Please <a href="{{ route('contact') }}">contact us</a> or <a
                            href="mailto:support@lettstartdesign.com" class="text-primary">email us</a>.</p>
                    @endif
                    <p>Please send us an <a href="mailto:info@lettstartdesign.com" class="text-primary">email</a> and share
                        your experience with our product that will give us more motivation.</p>
                    <div class="mt-30">
                        <a href="{{ route('user.order.history') }}" class="btn btn-primary-gred"
                            title="go to downloads">Go to Downloads</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade thankyou-modal" id="failureModal" tabindex="-1" aria-labelledby="failureModal"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i class="bx bx-x h3 mb-0 font-weight-normal"></i>
                    </button>
                </div>
                <div class="modal-body p-30 text-center">
                    <div class="mb-15 cancel-icon">
                        <i>&#33;</i>
                    </div>
                    <h5 class="mb-15">Payment Failed</h5>
                    <p class="mb-15">Something went wrong. Please try after some time or send us mail <a
                            href="mailto:support@lettstartdesign.com" class="text-primary">support@lettstartdesign.com</a>
                        or <a href="{{ route('contact') }}" class="text-primary">contact us</a></p>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer_script')
    <script>
        var package_details = {
            packageName: '<?= $product->packageName ?>',
            productId: '<?= $product->productId ?>',
            price: '<?= $product->price ?>'
        };
        var logged_user_details = {
            id: '<?= Auth::check() ? Auth::user()->id : '' ?>',
            email: '<?= Auth::check() ? Auth::user()->email : '' ?>',
        }
				
    </script>
    <script src="{{ url('assets/js/inner-theme.min.js') }}"></script>
    <script>
        var product = <?= json_encode($product) ?> ,
            relatedProducts = <?= json_encode($relatedProducts) ?>,
            route = '<?= Request::getRequestUri() ?>',
            title = '<?= $title ?>',
            description = '<?= $description ?>', downloads = '<?= $downloads ?>', reviews = <?= json_encode($reviews) ?>;
        var breadcrumb = {
            "@type": "BreadcrumbList",
            "itemListElement": [{
                "@type": "ListItem",
                "position": 1,
                "name": "Home",
                "item": "https://lettstartdesign.com"
            }, {
                "@type": "ListItem",
                "position": 2,
                "name": 'All Themes',
                "item": "https://lettstartdesign.com/category/premium-admin-bootstrap-templates"
            }, {
                "@type": "ListItem",
                "position": 3,
                "name": product['mainCat'],
                "item": "https://lettstartdesign.com/category/"+product['catLink']
            }]
        };
        var hightlight1 = JSON.parse(product.highlight1),
            hightlight2 = JSON.parse(product.highlight2),
            themefacts = JSON.parse(product.themeFacts),
            count = 0;
        var ldSchema = {
            "@context": "https://schema.org",
            "@graph": [{
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
                    "inLanguage": "en-US"
                },
                breadcrumb
            ]
        };
        var reviewSchema = [];
        reviews.forEach(function(review) {
            var obj = {
                "@type": "Review",
                "author": review.username,
                "reviewBody": review.comments,
                "reviewRating": {
                    "@type": "Rating",
                    "bestRating": "5",
                    "ratingValue": review.rating,
                    "worstRating": "1"
                }
            };
            reviewSchema.push(obj)
        });
        var demos = {
            "@type": "ItemList",
            "itemListElement": [{
                "@type": "ListItem",
                "position": ++pCount,
                "item": {
                "@type": "Product",
                "name": product.name,
                "image": "https://lettstartdesign.com/assets/images/screenshots/" + product
                .screenshotDir + "/" + screen.img,
                "description": ($("#overview-html").text()).trim() + " " + hightlight1.join(", ") + " " +
                hightlight2.join(", "),
                "url": "https://lettstartdesign.com/theme/" + product['detailLink']+"#demos",
                "offers": {
                    "@type": "Offer",
                    "availability": "https://lettstartdesign.com/InStock",
                    "priceCurrency": "USD",
                    "price": product.price,
                    "priceValidUntil": "01-12-2050",
                    "url": "https://lettstartdesign.com/theme/" + product['detailLink']
                },
                "aggregateRating": {
                    "@type": "AggregateRating",
                    "ratingValue": product.rating ? product.rating : 5,
                    "reviewCount": reviews.length ? reviews.length : 1
                },
                "brand": "Lett Start Design",
                "review": reviewSchema
                }
            }]
        };
        
        ldSchema["@graph"].push(demos);
        var itemList = addProduct(relatedProducts);
        ldSchema["@graph"].push(itemList);
        var el = document.createElement('script');
        el.type = 'application/ld+json';
        el.text = JSON.stringify(ldSchema);
        document.querySelector('head').appendChild(el);
    </script>
@endsection
