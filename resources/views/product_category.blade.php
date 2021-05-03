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
                            <li
                                class="{{ $pageTitle && $pageTitle != 'All Themes, Templates & Landing Pages' ? '' : 'active' }}">
                                @if ($pageTitle && $pageTitle != 'All Themes, Templates & Landing Pages')
                                <a href="{{ route('product.category', ['category' => 'premium-admin-bootstrap-templates']) }}" title="All themes">All Themes</a>
                                @else All Themes
                                @endif
                            </li>
                            @if ($pageTitle && $pageTitle != 'All Themes, Templates & Landing Pages')
                                <li class="active" title="{{ $pageTitle }}">{{ $pageTitle }}</li>
                            @endif
                        </ul>
                    </div>
                    <h1 id="main-title" class="h2 mb-4">{{ $pageTitle }}</h1>
                    <p class="subtitle">
                        {{ $pageDescription }}
                    </p>
                </div>
                <div class="col-lg-4 pl-lg-5">
                    <form id="search-form" novalidate="" action="javascript:void(0);">
                        <div class="search-box">
                            <div class="position-relative">
                                <input type="text" placeholder="Search Theme &amp; Template"
                                    class="form-control form-control-sm">
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
            <div class="row gutter-size-25" id="themes-list">
                @foreach ($products as $template)
                    <div class="col-md-6 col-xl-4">
                        <div class="demo-item" id="{{ $template['id'] }}">
                            <a href="{{ route('product.theme', ['detailLink' => $template['detailLink']]) }}" data-track-elem event-category="View Product"  event-action="click" event-label="{{ $template['name'] }}"
                                class="screenshot">
                                <img src="{{ url('assets/images/slider-screenshot/' . $template['screenshot']) }}"
                                srcset="{{ url('assets/images/slider-screenshot/' . explode('.', $template['screenshot'])[0] . '-sm.' . explode('.', $template['screenshot'])[1]) }} 767w, {{ url('assets/images/slider-screenshot/' . $template['screenshot']) }} 3000w"
                                sizes="100vw"
                                    title="{{ $template['name'] }} Template"
                                    alt="Buy {{ $template['name'] }} Template at {{ $template['price'] }}"
                                    class="img-fluid w-100" width="714" height="456">
                            </a>
                            <div class="action-btn">
                                <a href="{{ route('product.theme', ['detailLink' => $template['detailLink']]) . '#demos' }}" data-track-elem event-category="Live Preview"  event-action="click" event-label="{{ $template['name'] }}"
                                    title="Live Preview" class="btn btn-primary btn-sm">Live Preview</a>
                            </div>
                            <div class="theme-desc">
                                <div class="title">
                                    <div class="h5">
                                        <a data-track-elem event-category="Live Preview"  event-action="click" event-label="{{ $template['name'] }}" href="{{ route('product.theme', ['detailLink' => $template['detailLink']]) }}"
                                            title="{{ $template['name'] }}">{{ $template['name'] }}</a>
                                    </div>
                                    <p>{{ $template['oneLinerDesc'] }}</p>
                                </div>
                                
                                <div class="demo-footer">
                                    @if($template['price'] != 0)
                                        <span class="h4 mb-0 price">${{ $template['price'] }}</span>
                                    
                                    @else 
                                        <span class="h4 mb-0 price">Free</span>
                                    @endif
                                    <div class="rating-info">
                                        <input type="hidden" class="rating" name="rating" data-filled="bx bxs-star text-warning" data-empty="bx bx-star text-warning" value="{{ $template['rating'] }}" data-readonly data-fractions=2 />
                                        <span class="sale-count">{{ $template['num_downloads'] }} sales</span>
                                    </div>
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
    @include('layouts.partials.'.$category)
    @include('layouts.partials.modals')
@endsection
@section('footer_script')
<script>
    $(".read-more-link").on("click", function() {
        var self = this;
        var href = $(this).attr("data-href");
        $(href).slideToggle(300, 'linear', function(){
            var txt = $(self).text();
            if(txt.toLowerCase() === 'read less'){
                $(self).text("Read More")
            }
            else {
                $(self).text("Read Less")
            }
        });
    })
    var pageTitle = '<?= $pageTitle ?>', pageDescription = "<?= $pageDescription ?>", products = <?= json_encode($products) ?>, route = '<?=  Request::getRequestUri() ?>', title = '<?=  $title ?>', description = '<?=  $description ?>';
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
            "name": 'All Themes',
            "item": "https://lettstartdesign.com/category/premium-admin-bootstrap-templates"
        }]
    };
    if(pageTitle && pageTitle != 'All Themes, Templates & Landing Pages') {
        breadcrumb['itemListElement'].push({
            "@type": "ListItem", 
            "position": 3, 
            "name": pageTitle,
            "item": "https://lettstartdesign.com" + route
        })
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
			{
				"@type": "WebPage",
				"@id": "https://lettstartdesign.com"+route+"#webpage",
				"url": "https://lettstartdesign.com"+route,
				"name": title,
                "description": description,
				"datePublished": "2021-02-11",
				"isPartOf": {
					"@id": "https://lettstartdesign.com/#website"
				},
				"inLanguage": "en-US"
			},
            breadcrumb,
            {
                "@type": "WebPage",
                "name": pageTitle,
                "description": pageDescription,
            }
		]
	};
    var itemList = addProduct(products.data);
    ldSchema["@graph"].push(itemList);
	var el = document.createElement('script');
	el.type = 'application/ld+json';
	el.text = JSON.stringify(ldSchema);
	document.querySelector('head').appendChild(el);
</script>
@endsection