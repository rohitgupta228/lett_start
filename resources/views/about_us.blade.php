@extends('layouts.main')

@section('title', 'About US')

@section('content')
<!--Demo's Start-->
 <!--Main title-->
 <div class="theme-title mt-100">
    <div class="container">
        <div class="breadcrumb">
            <ul class="list-unstyled">
                <li><a href="{{ route('home.products.list') }}" title="Home">Home</a></li>
                <li><a class="active" href="javascript:void(0)">About Us</a></li>
            </ul>
        </div>
        <h1 id="main-title" class="h2 font-weight-bold">About Us</h1>
    </div>
</div>
<div class="section pt-0">
    <div class="container">
        <p>In LettstartDesign, you will uncover top-of-the-board digital goods that follow contemporary online benchmarks. The product collection comprises a comprehensive choice ranging from the design of heavily discounted sites for a broad variety of explicitly specialized companies, small or big firms, and other enterprises you ultimately administer. There are superior quality and free templates for your imaginative website that you may obtain. One feature among many others that we offer are the angular-themed templates that are ready to use, can be customized and published. Make designed dashboard interfaces using our administrative templates and topics. Bootstrap is a CSS-based framework used to build responsive UI's. All Our layouts are built with the Bootstrap framework, including Angular, Landing Pages, Portfolio, Business & Corporates like WordPress, etc., followed by best coding practices. In addition, we have BOB, a multifunctional bootstrap template, and a multi-use summary built specifically for freelancers, designers, and photographers use.</p>
    </div>
</div>
<!--Demo's End-->
</div>


<!-- Footer Start-->
<!-- Modal -->
@include('layouts.partials.modals')

@endsection
