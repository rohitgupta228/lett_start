@extends('layouts.main')

@section('title', $title)

@section('meta_title', $title)

@section('meta_description', $description)

@section('content')
<div class="banner-title mt-100">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <div class="breadcrumb">
                    <ul class="list-unstyled">
                        <li><a href="{{ route('home.products.list') }}" title="Home">Home</a></li>
                        <li class="{{ $pageTitle && $pageTitle != 'All Themes, Templates & Landing Pages' ? '' : 'active' }}">All Themes</li>
                        @if ($pageTitle && $pageTitle != 'All Themes, Templates & Landing Pages')
                            <li class="active">{{ $pageTitle }}</li>
                        @endif
                    </ul>
                </div>
                <h1 id="main-title" class="h2 mb-4">{{ $pageTitle }}</h1>
                <p class="subtitle">
                    {{ $pageDescription }}</p>
            </div>
            <div class="col-lg-4 pl-lg-5">
                <form id="search-form" novalidate="" action="javascript:void(0);">
                    <div class="search-box">
                        <div class="position-relative">
                            <input type="text" placeholder="Search Theme &amp; Template" class="form-control form-control-sm">
                            <button class="bx bx-search icon" type="submit"></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!--Hero Banner End-->
<!--Demo's Start-->
<section class="demos section" id="themes">
    <div class="container">
        <div class="row" id="themes-list">
            @foreach ($products as $template)
            <div class="col-md-6">
                <div class="demo-item" id="{{ $template['id'] }}">
                    <a href="{{ route('product.theme', ['detailLink' => $template['detailLink']]) }}" class="screenshot">
                        <img src="{{ url('assets/images/slider-screenshot/'.$template['screenshot']) }}" srcset="{{ url('assets/images/slider-screenshot/'.explode('.', $template['screenshot'])[0].'-sm.'.explode('.', $template['screenshot'])[1]) }} 766w, {{ url('assets/images/slider-screenshot/'.$template['screenshot']) }} 3000w" title="{{$template['name']}} Template" alt="Buy {{$template['name']}} Template at {{ $template['price'] }}" class="img-fluid w-100" width="714" height="456">
                    </a>
                    <div class="action-btn">
                        <a href="{{ route('product.theme', ['detailLink' => $template['detailLink']]).'#demos' }}" title="Live Preview" class="btn btn-primary btn-sm">Live Preview</a>
                    </div>
                    <div class="theme-desc">
                        <div class="title">
                            <h3 class="h5">
                                <a href="{{ route('product.theme', ['detailLink' => $template['detailLink']]) }}" title="{{$template['name']}}">{{$template['name']}}</a></h3>
                            <p>{{ $template['oneLinerDesc'] }}</p>
                        </div>
                        <div class="price">
                            <h4 class="font-weight-bold">${{$template['price']}}</h4>
                            <a class="category" href="{{$template['catLink']}}">{{ $template['mainCat'] }}</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @if (\Request::is('category/premium-admin-bootstrap-templates') || \Request::is('category'))  
        <div id="pagination-wrapper" class="mt-30">
            {!! $products->links('bootstrap-4') !!}
        </div>
        @endif
    </div>
</section>

</div>

@include('layouts.partials.modals')
@endsection

