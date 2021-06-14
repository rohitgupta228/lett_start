@extends('layouts.main')

@section('title', 'Terms of Use')

@section('meta_title', $metaData[0])

@section('meta_description', $metaData[1])

@section('content')
<!--Demo's Start-->
<div class="banner-title mt-100">
    <div class="container">
        <div class="row">
            <div class="col-xl-10">
                <h1 id="main-title" class="h3 mb-3">Terms of Use</h1>
                <p class="subtitle">Terms and Condition of LettStart Design to Use our Product and Access the Website</p>
            </div>
        </div>
    </div>
</div>
<section class="section pt-4 mb-50" id="demos">
    <div class="container">
        <p>By getting to and placing an order or downloading free template with LettStart Design, you confirm that you are in agreement with and bound by the terms and condition contained in the Terms of Use outlined below. These terms apply to the whole site and any email or other sort of correspondence among you and LettStart Design.</p>
        <ul class="checklist checklist-align-top list-unstyled">
            <li><i class="bx bxs-check-circle text-success h5 mb-0 mr-2 font-weight-normal"></i> By no means will LettStart Design group be subject for any immediate, roundabout, unique, coincidental or important harms, including, yet not restricted to, loss of information or benefit, emerging out of the utilization, or the failure to utilize, the materials on this site, regardless of whether LettStart Design group or an approved delegate has been instructed concerning the chance of such harms. On the off chance that your utilization of materials from this outcomes in the requirement for overhauling, fix or adjustment of gear or information, you expect any expenses thereof.</li>
            <li><i class="bx bxs-check-circle text-success h5 mb-0 mr-2 font-weight-normal"></i> LettStart Design won't be answerable for any result that may happen over the span of use of our assets. We save the rights to change costs and modify the assets use strategy at whatever second.
            </li>
            <li class="font-weight-bold"><i class="bx bxs-check-circle text-success h5 mb-0 mr-2 font-weight-normal"></i> LettStart Design makes no representations or warranties of any kind, express or implied, as to the operation of this site or the information, content, materials, or products included on this site. you expressly agree that your use of this site is at your sole risk.</li>
        </ul>
        <h5 class="mt-30 mb-15">Free Products</h5>
        <p>All Products and administrations are conveyed by LettStart Design electronically. You can get to your download by sign in to lettstartdesign.com and found under downloads. For downloading our Free Templates, you need to Login/Signup to our website and that can be possible by just filling out our login/registration form, and you consent to give your own data like your name and email address to have the option to download our free items. We at LettStart Design, request that client or business register with us just to advise them about future reports regarding the item they downloaded and to have the option to educate about our new items, any arrangements and other data like updation as far as use and security strategy. By tolerating our terms of utilization, you as business or client are concurred with this term of utilization. What's more, by enlisting with you, we are adding you to our mailing list, which we use to give you reports on future item refreshes, new arrangements, new free and premium items, industry news and different stuffs. Likewise we don't offer your own data to any third party.</p>
        <h5 class="mt-30 mb-15">Premium Products</h5>
        <p>All Products and administrations are conveyed by LettStart Design electronically. You can get to your download by sign in to lettstartdesign.com and found under downloads. For downloading our excellent items, you need to finish your checkout cycle and keeping in mind that finishing, you would needed to give your email address, name and your payment details. Which will be utilized to give you future item refreshes, new arrangements, new item delivers, industry news and different stuffs from us and you are consenting to that while buying from us.</p>
        <h5 class="mt-30 mb-15">Payment and Security</h5>
        <p>LettStart Design doesn't handle any payment request through the website. All payments are handled safely through Paypal and Razorpay, outsider/third party online payment providers. We does not save your payment information like card number, expiry date, cvc etc. it's used by payment service providers. Don't hesitate to reach us about our security arrangements.</p>
        <h5 class="mt-30 mb-15">Refund</h5>
        <p>LettStart Design remains behind the entirety of our items and we will settle any shortcomings or defects found in any of our items. </p>
        <p>In the event that you have any inquiries regarding configuring the product please get in touch with us by means of <a href="{{ route('support') }}">Contact Us</a> or <a href="mailto:support@lettstartdesign.com">Email Us</a> whenever.</p>
        <p>You can get a refund inside 7 days after the buy date if:</p>
        <ul>
            <li>Item is "not as portrayed"</li>
            <li>Item doesn't work the manner in which it ought to </li>
            <li>Item  support is guaranteed but not provided</li>
        </ul>
        <p>If you don't mind reach us at <a href="{{ route('support') }}">Contact Us</a> or <a href="mailto:support@lettstartdesign.com">Email Us</a> with your refund requests.</p>
        <p><strong>We will refund amount after the deduction of currency conversion and payment fees charged by payment provider</strong></p>
        <p>By no means will a refund be given 7 days after your buy date.</p>
        <h5 class="mt-30 mb-15">Support does include</h5>
        <p>Help to setup project.</p>
        <p>Giving solution to the Bugs reported.</p>
        <p>Answering your questions or problems regarding the template.</p>
        <h5 class="mt-30 mb-15">Support does not include:</h5>
        <p>Customisation Work</p>
        <p>Support for any Third Party Plugins / Software we used in our template.</p>
        <p>Support or Guide for How to integrate with any technologies (like, PHP, .net, Java etc).</p>
        <p>Solve bug in your implemented template</p>
        <p><strong>Note:</strong> You have to pay extra for work that we are not included in our support. If you want too.</p>
    </div>
</section>
<!--Demo's End-->
</div>


<!-- Footer Start-->
<!-- Modal -->
@include('layouts.partials.modals')

@endsection