@extends('layouts.main')

@section('content')
<div class="banner-title mt-100">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <div class="breadcrumb">
                    <ul class="list-unstyled">
                        <li><a href="../index.html" title="Home">Home</a></li>
                        <li class="{{ $title && $title != 'All Themes, Templates & Landing Pages' ? '' : 'active' }}">All Themes</li>
                        @if ($title && $title != 'All Themes, Templates & Landing Pages')
                            <li class="active">{{ $title }}</li>
                        @endif
                    </ul>
                </div>
                <h1 id="main-title" class="h2 mb-4">{{ $title }}</h1>
                <p class="subtitle">
                    {{ $description }}</p>
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
                <div class="demo-item" id="1">
                    <a href="{{ $template['detailLink'] }}" class="screenshot">
                        <img src="{{ url('images/slider-screenshot/'.$template['screenshot']) }}"  alt="{{$template['name']}}" class="img-fluid w-100" width="714" height="456">
                    </a>
                    <div class="action-btn">
                        <a href="{{ $template['demolink'] }}" title="Live Preview" class="btn btn-primary btn-sm">Live Preview</a>
                    </div>
                    <div class="theme-desc">
                        <div class="title">
                            <h3 class="h5">
                                <a href="theme/{{$template['detailLink']}}" title="{{$template['name']}}">{{$template['name']}}</a></h3>
                            <p>{{ $template['oneLinerDesc'] }}</p>
                        </div>
                        <div class="price">
                            <h4 class="font-weight-bold">$5<span class="original-price">${{$template['price']}}</span></h4>
                            <a class="category" href="{{$template['catLink']}}">{{ $template['mainCat'] }}</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div id="pagination-wrapper" class="mt-30">
            <ul class="pagination">
                <li class="page-item first disabled"><a href="#" class="page-link"><i class="bx bx-chevrons-left"></i></a>
                </li>
                <li class="page-item prev disabled"><a href="#" class="page-link"><i class="bx bx-chevron-left"></i></a>
                </li>
                <li class="page-item active"><a href="#" class="page-link">1</a></li>
                <li class="page-item"><a href="#" class="page-link">2</a></li>
                <li class="page-item next"><a href="#" class="page-link"><i class="bx bx-chevron-right"></i></a></li>
                <li class="page-item last"><a href="#" class="page-link"><i class="bx bx-chevrons-right"></i></a></li>
            </ul>
        </div>
    </div>
</section>
<!--Demo's End-->
</div>

<!-- Footer Start-->
<!-- Modal -->
@include('layouts.partials.modals')

@endsection

