@extends('layouts.main')

@section('content')
<!--Main title-->
<div class="theme-title mt-100">
    <div class="container">
        <div class="breadcrumb">
            <ul class="list-unstyled">
                <li><a href="../index.html" title="Home">Home</a></li>
                <li><a href="../all-themes.html" title="All themes">All Themes</a></li>
                <li><a class="active" href="../landing-pages.html" title="Landing Pages">Landing Pages</a></li>
            </ul>
        </div>
        <h1 id="main-title" class="h2 font-weight-bold">Dark - Single Page Templates</h1>
    </div>
</div>
<!--Demo's Start-->
<!--Don't remove inner content wrapper-->
<section class="section pt-0" id="inner-content-wrapper">
    <div class="container">
        <div class="inner-content">
            <div class="row">
                <div class="col-lg-8">
                    <div class="slider-area" id="slider-area">
                        <img src="../assets/images/loading.jpg" srcset="" class="img-fluid border-radius-1x w-100"
                            alt="" width="714" height="456" />
                        <div class="live-example">
                            <div class="mb-2 mb-sm-0">
                                <a href="javascript:void(0)" id="preview-btn" class="btn btn-dark mr-2">Live Preview</a>
                                <a href="#" target="_blank" id="doc-btn" class="btn btn-outline-secondary">Docs</a>
                            </div>
                            <div class="tech-details">
                                <div class="loader-wrap show">
                                    <i class="bx bx-loader-alt bx-spin icon-md"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 pl-xl-5">
                    <aside class="theme-actions">
                        <div class="package-type mb-15 position-relative">
                            <a title="details" href="#" class="licence-detail-btn default-color border-tlr-radius-1x"
                                data-toggle="modal" data-target="#licence-detail">
                                <i class='bx bx-info-circle text-primary mr-1'></i>
                                <span>Licence</span>
                            </a>
                            <ul class="list-unstyled" id="licence-types">
                                <li class="selected" data-tab="single">
                                    <div class="licence-type">
                                        <span class="radio"></span>
                                        <div>
                                            <h6 class="mb-0">Single Use</h6>
                                            <span class="subtext"> For One Project </span>
                                        </div>
                                    </div>
                                    <div class="licence-value ml-auto text-right">
                                        <h6 class="price mb-0 font-weight-bold" id="single-use"></h6>
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
                                        <h6 class="price mb-0 font-weight-bold" id="multi-use"></h6>
                                        <span class="subtext">One time pay</span>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="checklist-tabs">
                            <div class="checklist" data-id="single">
                                <ul class="list-unstyled mb-0">
                                    <li class="py-0"><i
                                            class="bx bxs-check-circle text-success h5 mb-0 mr-2 font-weight-normal"></i>Use
                                        for Single Project</li>
                                    <li class="py-0"><i
                                            class="bx bxs-check-circle text-success h5 mb-0 mr-2 font-weight-normal"></i>1
                                        Year Premium Support </li>
                                    <li class="py-0"><i
                                            class="bx bxs-check-circle text-success h5 mb-0 mr-2 font-weight-normal"></i>Free
                                        Lifetime Updates</li>
                                    <li class="py-0"><i class="bx bxs-x-circle text-danger h5 mb-0 mr-2"></i> Item may
                                        not be Redistributed or Resale
                                    </li>
                                </ul>
                            </div>
                            <div class="checklist" data-id="multiple">
                                <ul class="list-unstyled mb-0">
                                    <li class="py-0"><i
                                            class="bx bxs-check-circle text-success h5 mb-0 mr-2 font-weight-normal"></i>Use
                                        for Multiple Website</li>
                                    <li class="py-0"><i
                                            class="bx bxs-check-circle text-success h5 mb-0 mr-2 font-weight-normal"></i>1
                                        Year Premium Support </li>
                                    <li class="py-0"><i
                                            class="bx bxs-check-circle text-success h5 mb-0 mr-2 font-weight-normal"></i>Free
                                        Lifetime Updates</li>
                                    <li class="py-0"><i class="bx bxs-x-circle text-danger h5 mb-0 mr-2"></i>
                                        Redistributed or Resale of Template
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="licence-link mb-15">
                            <a href="../license.html">Licence Details</a>
                        </div>
                        <div class="payment-options" id="payment-options">
                            <button class="btn btn-primary-gred btn-block mt-30 d-none" id="free-purchase">
                                <span>Free Download</span>
                                <span class="align-middle btn-loader"><i
                                        class="bx bx-loader-alt bx-spin icon-md"></i></span>
                            </button>
                            <div class="pay-options d-none">
                                <h6 class="mr-3">Pay with</h6>
                                <div class="options mb-15" id="options">
                                    <button class="pay-btn btn-paypal selected" button-selection='razorpay'>
                                        <img src="../assets/images/razorpay-icon.png" alt="razorpay" width="15" />
                                        Razorpay
                                    </button>
                                    <button class="pay-btn btn-paypal" button-selection='paypal'>
                                        <i class="bx bxl-paypal text-paypal"></i> Paypal
                                    </button>
                                </div>
                            </div>
                            <div class="tab-content pt-2 d-none" id="option-data">
                                <div data-id="razorpay" payment-type="razorpay" class="tab-pane active fade show">
                                    <button class="btn btn-primary-gred btn-block" id="razorpay-btn" disabled>
                                        <span>Purchase</span>
                                        <span class="align-middle btn-loader"><i
                                                class="bx bx-loader-alt bx-spin icon-md"></i></span>
                                    </button>
                                </div>
                                <div data-id="paypal" payment-type="paypal" class="tab-pane fade">
                                    <button class="btn btn-primary-gred btn-block" id="paypal-btn">
                                        <span>Purchase</span>
                                        <span class="align-middle btn-loader"><i
                                                class="bx bx-loader-alt bx-spin icon-md"></i></span>
                                    </button>
                                </div>
                            </div>
                            <div class="alert alert-info mt-2 mb-0 font-size-13 d-none">
                                <b>Note:</b> Indian customers please choose Razorpay payment option and Outside india
                                customers please choose paypal as payment option.
                            </div>
                        </div>
                    </aside>
                </div>
            </div>
            <div class="package-tabs mt-50">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#details" role="tab"
                            aria-controls="Details" aria-selected="true"><i
                                class="bx bx-detail mr-1 icon-sm align-middle"></i> <span
                                class="align-middle">Details</span></a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="demo-tab" data-toggle="tab" href="#demos" role="tab"
                            aria-controls="Demo" aria-selected="true"><i
                                class="bx bx-screenshot mr-1 icon-sm align-middle"></i> <span
                                class="align-middle">Demos</span></a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="Change-tab" data-toggle="tab" href="#change-log" role="tab"
                            aria-controls="Change" aria-selected="false"><i
                                class="bx bx-message-square-edit mr-1 icon-sm align-middle"></i> <span
                                class="align-middle">Change Log</span></a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="details" role="tabpanel" aria-labelledby="Details-tab">
                        <div class="row pb-5 border-bottom">
                            <div class="col-md-3">
                                <h2 class="mb-30 h3">Overview</h2>
                            </div>
                            <div class="col-md-9" id="overview-html">
                                <div class="loader-wrap show">
                                    <i class="bx bx-loader-alt bx-spin icon-md"></i>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-5 ">
                            <div class="col-md-3">
                                <h2 class="mb-30 h3">Highlights</h2>
                            </div>
                            <div class="col-md-9">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="checklist" id="highlight1">
                                            <div class="loader-wrap show">
                                                <i class="bx bx-loader-alt bx-spin icon-md"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="checklist" id="highlight2">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="theme-facts my-5">
                        </div>
                    </div>
                    <div class="tab-pane fade" id="demos" role="tabpanel" aria-labelledby="demo-tab">
                        <div class="theme-facts my-5">
                        </div>
                    </div>
                    <div class="tab-pane fade" id="change-log" role="tabpanel" aria-labelledby="Change-tab">
                        <div class="initial-logs border-radius-2x">
                            <div class="loader-wrap show">
                                <i class="bx bx-loader-alt bx-spin icon-md"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-100">
                    <div class="heading">
                        <div class="heading-text">
                            <h4 class="mb-0">Related Products</h4>
                        </div>
                        <a href="../all-themes.html" class="btn btn-outline-primary rounded-50 btn-sm">
                            View More
                        </a>
                    </div>
                    <div class="row" id="related-products">
                        <div class="col-12">
                            <div class=" text-center text-dark bg-light p-3 border-radius-1x">
                                No related product found.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Demo's End-->

</div>
@include('layouts.partials.modals')

@endsection