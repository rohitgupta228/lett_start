@extends('layouts.main')

@section('title', 'How to Become an Affiliate')

@section('meta_title', $metaData[0])

@section('meta_description', $metaData[1])

@section('content')
<!--Demo's Start-->
<div class="banner-title mt-100">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-10 text-center">
                <h1 id="main-title" class="h3 mb-3">Earn a 30% referral commission on each sale with our affiliate
                    program</h1>
                <p class="subtitle">Register your subsidiary record with us and make a one of a kind reference ID. On
                    the off chance that somebody buys a thing on our site through your connection, you'll get a 30%
                    commission off the offer of that thing. Currently we are offering this feature through our gumroad
                    store. To become an affiliate please fill the below details. Through gumroad We will send the email to your register
                    mail with instruction. Visit 
                    <a href="https://help.gumroad.com/article/129-gumroad-affiliates" target="_blank" class="font-weight-bold text-uppercase">here
                    </a> 
                    to get better clarity
                </p>
            </div>
        </div>
    </div>
</div>
<div class="section pt-5 mb-50" id="demos">
    <div class="container">
        <div class="pb-2">
            @include('flash')
        </div>
        <div class="affiliate-form">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-7 col-xl-6">
                    <div class="card border-0 box-shadow">
                        <div class="card-body">
                            <div id="message" class="alert alert-success d-none"></div>
                            <div class="font-weight-medium mb-2 font-size-13">All (*) field's are mandatory.</div>
                            <form id="affiliate-form" novalidate="novalidate" method="POST" action="{{ route('submit.affiliate') }}">
                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input name="validation-fname" id="fname" type="text" class="form-control" placeholder="First Name *" value="{{ old('validation-fname') }}">
                                            @include('error', ['type' => 'validation-fname'])
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input name="validation-lname" id="lname" type="text" class="form-control" placeholder="Last Name *" value="{{ old('validation-lname') }}">
                                            @include('error', ['type' => 'validation-lname'])
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input name="validation-email" id="email" type="email" class="form-control"
                                           placeholder="Enter your Email Address *" value="{{ old('validation-email') }}">
                                    @include('error', ['type' => 'validation-email'])
                                </div>
                                <div class="form-group">
                                    <input name="validation-url" id="url" type="url" class="form-control"
                                           placeholder="Enter your Website URL *" value="{{ old('validation-url') }}">
                                    @include('error', ['type' => 'validation-url'])
                                </div>
                                <div class="form-group">
                                    <textarea name="validation-promote" id="promote" cols="4" class="form-control" placeholder="How will you promote us *">{{ old('validation-promote') }}</textarea>
                                    @include('error', ['type' => 'validation-promote'])
                                </div>
                                <div class="clearfix">
                                    <button id="contact-submit" class="btn btn-primary-gred" type="submit">
                                        <span>Submit</span>
                                        <span class="align-middle btn-loader"><i class="bx bx-loader-alt bx-spin icon-md"></i></span>
                                    </button>
                                </div><!-- button end -->
                            </form><!-- form end -->
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- contact wrapper end -->
        <!-- end row -->
    </div>
</div>
<!--Demo's End-->
</div>


<!-- Footer Start-->
<!-- Modal -->
@include('layouts.partials.modals')

@endsection

@section('footer_script')
<script>
    if ($.App) {
        contactForm();
    }
    function contactForm() {
      var instance = $.App;
      if ($('#affiliate-form').length) {
        $('#affiliate-form').validate({
          focusInvalid: false,
          rules: {
            'validation-email': {
              required: true,
              email: true
            },
            'validation-fname': {
              required: true,
            },
            'validation-lname': {
              required: true,
            },
            'validation-url': {
              required: true
            },
            'validation-promote': {
              required: true
            }
          },

          errorPlacement: function errorPlacement(error, element) {
            if (error[0].innerText === 'Please enter a valid email address.') {
              $(element).siblings(".validation-error").text(error[0].innerText).removeClass("d-none");
            }
            else {
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
          }
        });
      }
    }
    $('#contact-submit').click(function () {
        var details = $('#affiliate-form').valid();
        if (details) {
            $('#affiliate-form').submit();
        } else {
            return false;
        }
    });
</script>
@endsection