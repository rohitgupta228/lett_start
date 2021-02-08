@extends('layouts.main')

@section('content')
<div class="banner-title mt-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <h1 id="main-title" class="h3 mb-3">Frequently Asked Questions</h1>
            </div>
        </div>
    </div>
</div>
<!--Demo's Start-->
<section class="section pt-5">
    <div class="container">
        <div class="accordion" id="accordionExample">
            <div class="card active">
                <div class="card-header" id="headingOne">
                    <a href="javascript:void(0)" class="accordion-toggle text-left" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        How I can download my theme?
                    </a>
                </div>

                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                    <div class="card-body">
                        <p>You can download your files any time in downloads.</p>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header" id="headingTwo">
                    <a href="javascript:void(0)" class="accordion-toggle text-left" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                        How I will get the updated theme?
                    </a>
                </div>

                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                    <div class="card-body">
                        If you already purchase the theme. When your download it from downloads you will always get the updated package. If not, you can <a href="{{ route('contact') }}" class="text-primary">contact us</a>. We will provide you the latest package.
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header" id="headingThree">
                    <a href="javascript:void(0)" class="accordion-toggle" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        How I will get refund?
                    </a>
                </div>
                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                    <div class="card-body">
                        <p>You can get a refund inside 7 days after the buy date if:</p>
                        <ul>
                            <li>Item is "not as portrayed"</li>
                            <li>Item doesn't work the manner in which it ought to </li>
                            <li>Item  support is guaranteed but not provided</li>
                        </ul>
                        <p><strong>We will refund amount after the deduction of currency conversion and payment fees charged by payment provider.</strong></p>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header" id="headingFour">
                    <a href="javascript:void(0)" class="accordion-toggle" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                        What is your's support timing?
                    </a>
                </div>
                <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
                    <div class="card-body">
                        The hours of support are monday - saturday between 9.00AM - 6.00PM(GMT) india.
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header" id="headingSix">
                    <a href="javascript:void(0)" class="accordion-toggle" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="headingSix">
                        How I will get the invoice?
                    </a>
                </div>
                <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordionExample">
                    <div class="card-body">
                        You have to send mail an <a href="info@lettstartdesign.com">email</a> with your transaction id or just reply on email that had sent when you have purchase the product. We'll revert on that.
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header" id="headingSix">
                    <a href="javascript:void(0)" class="accordion-toggle" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="headingSix">
                        Can I sell your product any where else?
                    </a>
                </div>
                <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordionExample">
                    <div class="card-body">
                        No. You can not sell the product at any platform. You can use our products for your client or your personal use.
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Demo's End-->
</div>

<!-- Footer Start-->
<!-- Modal -->
@include('layouts.partials.modals')

@endsection