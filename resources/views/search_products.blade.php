@extends('layouts.main')

@section('content')

<section class="py-50 mt-100">
    <div class="container">
        <h1>Search result for <span id="search-keyword"><?= ucfirst($query) ?></span></h1>
    </div>
</section>

<section class="demos pb-100" id="themes">
    <div class="container">	
        <div class="row" id="themes-list">
            <div class="col-12">
                @if($productCount == 0)
                    <p>We are sorry! We couldn't find result.</p>
                    <h5 class="h4 mb-3">Search Hints:</h5>
                    <ul class="list-arrow">
                        <li>Please double check your spelling.</li>
                        <li>Use more generic search term like angular, landing, business, resume etc..</li>
                        <li>Product search may have been discontinued, remove or is not yet on our website</li>
                        <li>Navigate to our best selling products by using site navigation below</li>
                    </ul>
                @endif
                <div class="popular-products">
                    @if($productCount == 0)
                        <div class="heading">
                            <div class="heading-text">
                                <h4 class="mb-0">Best Selling Products</h4>
                            </div>
                        </div>
                    @endif
                    <div class="row" id="popular-list">
                        @foreach ($products as $template)
                        <div class="col-md-6">
                            <div class="demo-item" id="1">
                                <a href="theme/{{ $template['detailLink'] }}" class="screenshot">
                                    <img src="{{ url('assets/images/slider-screenshot/'.$template['screenshot']) }}" srcset="{{ url('assets/images/slider-screenshot/' . explode('.', $template['screenshot'])[0] . '-sm.' . explode('.', $template['screenshot'])[1]) }} 767w, {{ url('assets/images/slider-screenshot/' . $template['screenshot']) }} 3000w"
                                    sizes="100vw" 
                                    title="{{$template['name']}} Template" alt="Buy {{$template['name']}} Template at ${{ $template['price'] }}" class="img-fluid w-100" width="714" height="456">
                                </a>
                                <div class="action-btn">
                                    <a href="theme/{{ $template['detailLink'].'#demos' }}" title="Live Preview" class="btn btn-primary btn-sm">Live Preview</a>
                                </div>
                                <div class="theme-desc">
                                    <div class="title">
                                        <h3 class="h5">
                                            <a href="theme/{{$template['detailLink']}}" title="{{$template['name']}}">{{$template['name']}}</a></h3>
                                        <p>{{ $template['oneLinerDesc'] }}</p>
                                    </div>
                                    <div class="price">
                                        <span class="h4 mb-0">${{ $template['price'] }}</span>
                                        <a class="category" href="{{$template['catLink']}}">{{ $template['mainCat'] }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @if($productCount == 0)
                        <div class="text-center my-30">
                            <a href="{{ route('product.category', ['category' => '']) }}" class="btn btn-primary-gred rounded-50">Explore All Products <i class="bx bx-right-arrow-alt align-middle"></i></a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>

</div>
@include('layouts.partials.modals')

@endsection