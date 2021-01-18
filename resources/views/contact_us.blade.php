@extends('layouts.main')

@section('content')
<div class="banner-title mt-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <h1 id="main-title" class="h3 mb-3">Contact Us</h1>
                <p class="subtitle">If you have <u>doubt?</u> Send it to us and we will get back to you as soon as possible.
                </p>
            </div>
        </div>
    </div>
</div>
<!--Demo's Start-->
<section class="section pt-5 mb-50" id="demos">
    <div class="container">
        <div class="contact-form">
            <div class="row">
                <div class="col-md-7 col-xl-8 pr-md-5">
                    <div id="message" class="alert alert-success d-none"></div>
                    <div class="font-weight-medium mb-2 font-size-13">All (*) field's are mandatory.</div>
                    <form id="contactus-form" novalidate="novalidate">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input name="validation-fname" id="fname" type="text" class="form-control"
                                           placeholder="First Name *">
                                    <!-- <div class="validation-error d-none">Please fill the required field.</div> -->
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input name="validation-lname" id="lname" type="text" class="form-control"
                                           placeholder="Last Name *">
                                    <!-- <div class="validation-error d-none">Please fill the required field.</div> -->
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input name="validation-email" id="email" type="email" class="form-control"
                                           placeholder="Enter your Email Address *">
                                    <div class="validation-error d-none"></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input name="validation-subject" type="text" class="form-control" id="subject"
                                           placeholder="Subject">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <textarea name="validation-comments" id="comments" rows="3" class="form-control"
                                              placeholder="Your Message *"></textarea>
                                    <!-- <div class="validation-error d-none">Please fill the required field.</div> -->
                                </div>
                            </div>
                        </div>
                        <div class="clearfix">
                            <button class="btn btn-primary-gred" type="submit">
                                <span>Submit</span>
                                <span class="align-middle btn-loader"><i class="bx bx-loader-alt bx-spin icon-md"></i></span>
                            </button>
                        </div><!-- button end -->
                    </form><!-- form end -->
                </div>
                <div class="col-md-5 col-lg-4">
                    <div class="contact-info">
                        <div class="address-info">
                            <i class="bx bx-mail-send fa-lg icon"></i>
                            <div class="text">
                                <strong>Email: </strong>
                                <p>
                                    <a href="mailto:support@lettstartdesign.com">support@lettstartdesign.com</a>
                                </p>
                                <p>
                                    <a href="mailto:info@lettstartdesign.com">info@lettstartdesign.com</a>
                                </p>
                            </div>
                        </div>
                        <div class="address-info">
                            <i class="bx bx-home-circle fa-2x icon"></i>
                            <div class="text">
                                <strong>Address: </strong>
                                <p>V-302, <br />Gandhi Colony NIT Faridabad, <br /> Haryana India</p>
                            </div>
                        </div>
                        <div class="address-info">
                            <i class="bx bx-home-circle fa-2x icon"></i>
                            <div class="text">
                                <strong>Other Store: </strong>
                                <p>
                                    <a href="https://gumroad.com/lettstartdesign" target="_blank">Gumroad Store</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- contact wrapper end -->
        <!-- end row -->
    </div>
</section>
<!--Demo's End-->
</div>


<!-- Footer Start-->
<!-- Modal -->
@include('layouts.partials.modals')

@endsection