@extends('layouts.main')

@section('title', 'Frequently Asked Questions')

@section('meta_title', $metaData[0])

@section('meta_description', $metaData[1])

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
                        If you already purchase the theme. When you download it from downloads you will always get the updated package. If not, you can <a href="{{ route('contact-us') }}" class="text-primary">contact us</a>. We will provide you the latest package.
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
                        <p><strong>We will refund the amount after the deduction of currency conversion and payment fees charged by the payment provider.</strong></p>
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
                        The hours of support are Monday - Saturday between 9.00 AM - 6.00 PM (GMT) India.
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
                        You have to send mail an <a href="mailto:info@lettstartdesign.com">email</a> with your transaction id or just reply to the email that had sent when you have purchased the product. We'll revert to that.
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
                        No. You can not sell the product on any platform. You can use our products for your client or your personal use.
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
@section('footer_script')
<script>
    var breadcrumb = {
        "@type": "BreadcrumbList",
        "itemListElement": [{
            "@type": "ListItem", 
            "position": 1, 
            "name": "Home",
            "item": "https://lettstartdesign.com"  
        },{
            "@type": "ListItem", 
            "position": 2, 
            "name": 'FAQs',
        }]
    };
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
            breadcrumb,
            {
                "@type": "FAQPage",
                "mainEntity": [{
                    "@type": "Question",
                    "name": "How I can download my theme?",
                    "acceptedAnswer": {
                    "@type": "Answer",
                    "text": "You can download your files any time in downloads."
                    }
                },{
                    "@type": "Question",
                    "name": "How I will get the updated theme?",
                    "acceptedAnswer": {
                    "@type": "Answer",
                    "text": "If you already purchase the theme. When you download it from downloads you will always get the updated package. If not, you can contact us. We will provide you the latest package."
                    }
                },{
                    "@type": "Question",
                    "name": "How I will get refund?",
                    "acceptedAnswer": {
                    "@type": "Answer",
                    "text": "You can get a refund inside 7 days after the buy date if:\n Item is \"not as portrayed\"\n Item doesn't work the manner in which it ought to\n Item  support is guaranteed but not provided\n We will refund the amount after the deduction of currency conversion and payment fees charged by the payment provider."
                    }
                },{
                    "@type": "Question",
                    "name": "What is your's support timing?",
                    "acceptedAnswer": {
                    "@type": "Answer",
                    "text": "The hours of support are Monday - Saturday between 9.00 AM - 6.00 PM (GMT) India."
                    }
                },{
                    "@type": "Question",
                    "name": "How I will get the invoice?",
                    "acceptedAnswer": {
                    "@type": "Answer",
                    "text": "You have to send mail an email with your transaction id or just reply to the email that had sent when you have purchased the product. We'll revert to that."
                    }
                },{
                    "@type": "Question",
                    "name": "Can I sell your product any where else?",
                    "acceptedAnswer": {
                    "@type": "Answer",
                    "text": "No. You can not sell the product on any platform. You can use our products for your client or your personal use."
                    }
                }]
            }
        ]
    };
    var el = document.createElement('script');
    el.type = 'application/ld+json';
    el.text = JSON.stringify(ldSchema);
    document.querySelector('head').appendChild(el);
</script>
@endsection