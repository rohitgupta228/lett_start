@extends('layouts.main')

@section('title', 'Support')

@section('content')
<div class="banner-title mt-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <h1 id="main-title" class="h3 mb-3">Support</h1>
                <p class="subtitle">If you found any issue or want to give any suggestion about theme or template. We are
                    happy to hear you by fill below form and we will get back to you as soon as possible.</p>
            </div>
        </div>
    </div>
</div>
<!--Demo's Start-->
<section class="section pt-5 mb-50" id="demos">
    <div class="container">
        <div class="mb-5">
            <h6 class="font-weight-normal alert alert-info">Our product's comes with an extensive help file to help you
                understand how it works. If you encounter any problems or have questions once you purchased the theme feel
                free to contact us either email or via support form. We are ready to help you out. Reply times can be up to
                24 / 72 hours Monday to Sunday. Please be patient when posting an issue as we work (IST+05:30) time zone.
            </h6>
        </div>
        <div class="pb-2">
            @include('flash')
        </div>
        <div class="contact-form">
            <div class="row">
                <div class="col-md-7 col-xl-8 pr-md-5">
                    <div id="message" class="alert alert-success d-none"></div>
                    <div class="font-weight-medium mb-2 font-size-13">All (*) field's are mandatory.</div>
                    <form id="support-form" novalidate="novalidate" method="POST" action="{{ route('submit.support') }}">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input name="validation-fname" id="fname" type="text" class="form-control"
                                           placeholder="First Name *" value="{{ old('validation-fname') }}">
                                    @include('error', ['type' => 'validation-fname'])
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input name="validation-lname" id="lname" type="text" class="form-control"
                                           placeholder="Last Name *" value="{{ old('validation-lname') }}">
                                    @include('error', ['type' => 'validation-lname'])
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input name="validation-email" id="email" type="email" class="form-control"
                                           placeholder="Enter yout Email here *" value="{{ old('validation-email') }}">
                                    @include('error', ['type' => 'validation-email'])
                                    <div class="validation-error d-none"></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input name="validation-themename" id="themename" type="text" class="form-control"
                                           placeholder="Theme Name or Work Needed *" value="{{ old('validation-themename') }}">
                                    @include('error', ['type' => 'validation-themename'])
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input name="validation-website" id="website" type="url" class="form-control"
                                           placeholder="Website URL *" value="{{ old('validation-website') }}">
                                    @include('error', ['type' => 'validation-website'])
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <textarea name="validation-order-details" id="order-details *" rows="3" class="form-control"
                                              placeholder="Order/Payment Details">{{ old('validation-order-details') }}</textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <select class="form-control" name="validation-enquiry">
                                        <option value="general-enquiry">General Enquiry</option>
                                        <option value="installation-problems">Installation Problems</option>
                                        <option value="support-request">Support Request</option>
                                        <option value="sales-enquiry">Sales Enquiry</option>
                                        <option value="customization">Customization</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <textarea name="validation-message" id="message" rows="3" class="form-control"
                                              placeholder="Message *" value="{{ old('validation-message') }}"></textarea>
                                    @include('error', ['type' => 'validation-message'])
                                </div>
                            </div>
                        </div>
                        <div class="clearfix">
                            <button id="support-submit" class="btn btn-primary-gred" type="button">
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
                    </div>
                </div>
            </div>
        </div><!-- contact wrapper end -->
        <!-- end row -->
    </div>
</section>
<!--Demo's End-->
</div>

<script>
    document.addEventListener('DOMContentLoaded', function (event) {
        document.getElementById("support-link").classList.add("active");
        if ($.App) {
            supportForm();
        }
    })
    function supportForm() {
        var instance = $.App;
        if ($('#support-form').length) {
            $('#support-form').validate({
                focusInvalid: false,
                rules: {
                    'validation-fname': {
                        required: true,
                    },
                    'validation-lname': {
                        required: true,
                    },
                    'validation-email': {
                        required: true,
                        email: true
                    },
                    'validation-themename': {
                        required: true,
                    },
                    'validation-website': {
                        required: true,
                        url: true
                    },
                    'validation-order-details': {
                        required: true,
                    },
                    'validation-enquiry': {
                        required: true,
                    },
                    'validation-message': {
                        required: true
                    },
                    'validation-required': {
                        required: true
                    }
                },

                errorPlacement: function errorPlacement(error, element) {
                    if (error[0].innerText === 'Please enter a valid email address.') {
                        $(element).siblings(".validation-error").text(error[0].innerText).removeClass("d-none");
                    } else if (error[0].outerText === "Please enter a valid URL.") {
                        $(element).siblings(".validation-error").text(error[0].outerText).removeClass("d-none");
                    } else {
                        $(element).siblings(".validation-error").addClass("d-none");
                    }
                    return true
                },
                highlight: function (element) {
                    var $el = $(element);
                    var $parent = $el.parents('.form-group');
                    $parent.addClass("invalid-field")
                },
                unhighlight: function (element) {
                    var $el = $(element);
                    var $parent = $el.parents('.form-group');
                    $parent.removeClass("invalid-field");
                    $(element).siblings(".validation-error").addClass("d-none");
                },
//                submitHandler: function (form) {
//                    $(form).find("[type = 'submit']").addClass("disable-events");
//                    var url = "assets/php/support.php";
//                    $.ajax({
//                        type: "POST",
//                        url: url,
//                        data: $(form).serialize(),
//                        success: function (data) {
//                            $("#message").html(data);
//                            $("#message").fadeIn();
//                            $("#message").removeClass('d-none');
//                            $(form).find(".app-label").removeClass("up");
//                            $(form)[0].reset();
//                            setTimeout(function () {
//                                $("#message").fadeOut();
//                                $("#message").addClass('d-none');
//                            }, 4000)
//                        },
//                        complete: function () {
//                            $(form).find("[type = 'submit']").removeClass("disable-events");
//                        }
//                    });
//                }
            });
        }
        $('#support-submit').click(function () {
            var details = $('#support-form').valid();
            if (details) {
                $('#support-form').submit();
            } else {
                return false;
            }
        });
    }
</script>

@endsection