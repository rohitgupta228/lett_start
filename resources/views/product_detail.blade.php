@extends('layouts.main')

@section('title', $title)

@section('meta_title', $title)

@section('meta_description', $description)

@section('content')

<!--Main title-->
<div class="theme-title mt-100">
	<div class="container">
		<div class="breadcrumb">
			<ul class="list-unstyled">
				<li><a href="{{ route('home.products.list') }}" title="Home">Home</a></li>
				<li><a href="{{ route('product.category', ['category' => '']) }}" title="All themes">All Themes</a></li>
				<li><a class="active" href="{{ route('product.category', ['category' => $product['catLink']]) }}"
						title="Landing Pages">Landing Pages</a></li>
			</ul>
		</div>
		<h1 id="main-title" class="h2 font-weight-bold">{{$product['name']}}</h1>
	</div>
</div>
<!--Demo's Start-->
<!--Don't remove inner content wrapper-->
<section class="section pt-0">
	<div class="container">
		<div class="inner-content">
			<div class="row">
				<div class="col-lg-8">
					<div class="slider-area" id="slider-area">
						<img src="{{ url('assets/images/slider-screenshot/'.$product['screenshot']) }}"
							srcset="{{ url('assets/images/slider-screenshot/'.explode('.', $product['screenshot'])[0].'-sm.'.explode('.', $product['screenshot'])[1]) }} 766w, {{ url('assets/images/slider-screenshot/'.$product['screenshot']) }} 3000w"
							class="img-fluid border-radius-1x w-100" title="{{$product['name']}} Template" alt="Feature Image of {{$product['name']}} Template" width="714" height="456" />
						<div class="live-example">
							<div class="mb-2 mb-sm-0">
								<a href="javascript:void(0)" id="preview-btn" class="btn btn-dark mr-2">Live Preview</a>
								<a href="{{ url($product['docLink']) }}" target="_blank" id="doc-btn"
									class="btn btn-outline-secondary">Docs</a>
							</div>
							<div class="tech-details">
								@foreach(json_decode($product['techUsed']) as $techUsed)
								<div class="tooltip-wrap">
									<div class="tooltip bs-tooltip-top" role="tooltip">
										<div class="arrow"></div>
										<div class="tooltip-inner">{{ $techUsed->tooltip }}</div>
									</div>
									<span><i class="bx {{ $techUsed->icon }} text-{{ $techUsed->iconClass }} h2 mb-0"></i></span>
								</div>
								@endforeach
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-4 pl-xl-5">
					<aside class="theme-actions">
						<div class="package-type mb-15 position-relative">
							<ul class="list-unstyled" id="licence-types">
								<li class="selected" data-tab="single">
									<div class="licence-type">
										<span class="radio"></span>
										<div>
											<h6 class="mb-0">Single Use</h6>
											<span class="subtext"> For One Project </span>
										</div>
									</div>
									<div class="licence-value ml-auto text-right">
										<h6 class="price mb-0 font-weight-bold" id="single-use">${{ $product['price'] }}</h6>
										<span class="subtext">One time pay</span>
									</div>
								</li>
								<li data-tab="multiple">
									<div class="licence-type">
										<span class="radio"></span>
										<div>
											<h6 class="mb-0">Multiple Use</h6>
											<span class="subtext"> For Unlimited Project </span>
										</div>
									</div>
									<div class="licence-value ml-auto text-right">
										<h6 class="price mb-0 font-weight-bold" id="multi-use">${{ $product['price']*5 }}</h6>
										<span class="subtext">One time pay</span>
									</div>
								</li>
							</ul>
						</div>
						<div class="checklist-tabs">
							<div class="checklist" data-id="single">
								<ul class="list-unstyled mb-0">
									<li class="py-1 font-size-14"><i
											class="bx bxs-check-circle text-success h5 mb-0 mr-2 font-weight-normal"></i>Use
										for Single Project</li>
									<li class="py-1 font-size-14"><i
											class="bx bxs-check-circle text-success h5 mb-0 mr-2 font-weight-normal"></i>1
										Year Premium Support </li>
									<li class="py-1 font-size-14"><i
											class="bx bxs-check-circle text-success h5 mb-0 mr-2 font-weight-normal"></i>Free
										Lifetime Updates</li>
									<li class="py-1 font-size-14"><i class="bx bxs-x-circle text-danger h5 mb-0 mr-2"></i> Item may
										not be Redistributed or Resale
									</li>
								</ul>
							</div>
							<div class="checklist" data-id="multiple">
								<ul class="list-unstyled mb-0">
									<li class="py-1 font-size-14"><i
											class="bx bxs-check-circle text-success h5 mb-0 mr-2 font-weight-normal"></i>Use
										for Multiple Website</li>
									<li class="py-1 font-size-14"><i
											class="bx bxs-check-circle text-success h5 mb-0 mr-2 font-weight-normal"></i>1
										Year Premium Support </li>
									<li class="py-1 font-size-14"><i
											class="bx bxs-check-circle text-success h5 mb-0 mr-2 font-weight-normal"></i>Free
										Lifetime Updates</li>
									<li class="py-1 font-size-14"><i class="bx bxs-x-circle text-danger h5 mb-0 mr-2"></i>
										Redistributed or Resale of Template
									</li>
								</ul>
							</div>
						</div>
						<div class="licence-link mb-15">
							<a href="{{ route('license') }}">Licence Details</a>
						</div>
						<div class="payment-options" id="payment-options">
							@if ($product['price'] === '0')
							<button class="btn btn-primary-gred btn-block mt-30" id="free-purchase">
								<span>Free Download</span>
								<span class="align-middle btn-loader"><i class="bx bx-loader-alt bx-spin icon-md"></i></span>
							</button>
							@else
							<div class="pay-options">
								<h6 class="mr-3">Pay with</h6>
								<div class="options mb-15" id="options">
									<button class="pay-btn btn-paypal selected" button-selection='razorpay'>
										<img src="{{ url('assets/images/razorpay-icon.png') }}" title="Razorpay" alt="Razorpay Logo" width="15" />
										Razorpay
									</button>
									<button class="pay-btn btn-paypal" button-selection='paypal'>
										<i class="bx bxl-paypal text-paypal"></i> Paypal
									</button>
								</div>
							</div>
							<div class="tab-content pt-2" id="option-data">
								<div data-id="razorpay" payment-type="razorpay" class="tab-pane active fade show">
									<button class="btn btn-primary-gred btn-block" id="razorpay-btn" disabled>
										<span>Purchase</span>
										<span class="align-middle btn-loader"><i class="bx bx-loader-alt bx-spin icon-md"></i></span>
									</button>
								</div>
								<div data-id="paypal" payment-type="paypal" class="tab-pane fade">
									<button class="btn btn-primary-gred btn-block" id="paypal-btn">
										<span>Purchase</span>
										<span class="align-middle btn-loader"><i class="bx bx-loader-alt bx-spin icon-md"></i></span>
									</button>
								</div>
							</div>
							<div class="alert alert-info mt-2 mb-0 font-size-13">
								<b>Note:</b> Indian customers please choose Razorpay payment option and Outside india
								customers please choose paypal as payment option.
							</div>
							@endif
						</div>
					</aside>
				</div>
			</div>
			<div class="package-tabs mt-50">
				<ul class="nav nav-tabs" id="myTab" role="tablist">
					<li class="nav-item" role="presentation">
						<a class="nav-link active" id="home-tab" data-toggle="tab" href="#details" role="tab"
							aria-controls="Details" aria-selected="true"><i class="bx bx-detail mr-1 icon-sm align-middle"></i> <span
								class="align-middle">Details</span></a>
					</li>
					<li class="nav-item" role="presentation">
						<a class="nav-link" id="demo-tab" data-toggle="tab" href="#demos" role="tab" aria-controls="Demo"
							aria-selected="true"><i class="bx bx-screenshot mr-1 icon-sm align-middle"></i> <span
								class="align-middle">Demos</span></a>
					</li>
					<li class="nav-item" role="presentation">
						<a class="nav-link" id="Change-tab" data-toggle="tab" href="#change-log" role="tab" aria-controls="Change"
							aria-selected="false"><i class="bx bx-message-square-edit mr-1 icon-sm align-middle"></i> <span
								class="align-middle">Change Log</span></a>
					</li>
				</ul>
				<div class="tab-content" id="myTabContent">
					<div class="tab-pane fade show active" id="details" role="tabpanel" aria-labelledby="Details-tab">
						<div class="row pb-5 border-bottom">
							<div class="col-md-3">
								<h2 class="mb-30 h3">Overview</h2>
							</div>
							<div class="col-md-9" id="overview-html">
								{!! $product['overviewHTML'] !!}
							</div>
						</div>
						<div class="row mt-5 ">
							<div class="col-md-3">
								<h2 class="mb-30 h3">Highlights</h2>
							</div>
							<div class="col-md-9">
								<div class="row">
									<div class="col-md-6">
										<div class="checklist">
											<ul class="list-unstyled">
												@foreach (json_decode($product['highlight1']) as $highlight1)
												<li>
													<i class="bx bxs-check-circle text-success h5 mb-0 mr-2 font-weight-normal"></i>
													<span>{{$highlight1}}</span>
												</li>
												@endforeach
											</ul>
										</div>
									</div>
									<div class="col-md-6">
										<div class="checklist">
											<ul class="list-unstyled">
												@foreach (json_decode($product['highlight2']) as $highlight2)
												<li>
													<i class="bx bxs-check-circle text-success h5 mb-0 mr-2 font-weight-normal"></i>
													<span>{{$highlight2}}</span>
												</li>
												@endforeach
											</ul>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="theme-facts my-5">
							@foreach (json_decode($product['themeFacts']) as $key => $value)
							<div class="facts text-center">
								@foreach ($value as $facts)
								<div class="card box-shadow-none">
									<div class="card-body">
										<h3 class="card-title h2">{{ $facts -> title }}</h3>
										<p class="card-text mb-0">{{ $facts -> text }}</p>
									</div>
								</div>
								@endforeach
							</div>
							@endforeach
						</div>
					</div>
					<div class="tab-pane fade" id="demos" role="tabpanel" aria-labelledby="demo-tab">
						@foreach (json_decode($product['screenshots']) as $screenshots)
						<div class="theme-demos mb-3">
							<div class="head-text">
								<h2 class="h3">{{ $screenshots -> title }}</h2>
							</div>
							<div class="demo-screenshot">
								<div class="row gutter-size-25">
									@foreach ($screenshots->screens as $screens)
									<div class="col-md-6 col-lg-4">
										<div class="demo-theme-item">
											<a href="{{ $product['liveDemoBaseStr'].$screens->link }}" target="_blank">
												<img src="{{ url('assets/images/screenshots/'.$product['screenshotDir'].'/'.$screens->img) }}" class="img-fluid border-radius-1x" title="{{ $screens->imgTitle }}" alt="Image Preview of {{ $screens->imgTitle }} Product">
											</a>
											<div class="desc">
												<h5>{{ $screens->imgTitle }}</h5>
												<a href="{{ $product['liveDemoBaseStr'].$screens->link }}" title="Live Preview" target="_blank">Live Preview</a>
											</div>
										</div>
									</div>
									@endforeach
								</div>
							</div>
						</div>
						@endforeach
						<div class="theme-facts my-5">
							@foreach (json_decode($product['themeFacts']) as $key => $value)
							<div class="facts text-center">
								@foreach ($value as $facts)
								<div class="card box-shadow-none">
									<div class="card-body">
										<h3 class="card-title h2">{{ $facts -> title }}</h3>
										<p class="card-text mb-0">{{ $facts -> text }}</p>
									</div>
								</div>
								@endforeach
							</div>
							@endforeach
						</div>
					</div>
					<div class="tab-pane fade" id="change-log" role="tabpanel" aria-labelledby="Change-tab">
						<div class="initial-logs border-radius-2x">
							@foreach (json_decode($product['initialLog']) as $logs)
							@if ($logs->text == 'Created:')
							<div class="logs">
								<span class="bx {{ $logs->icon }} text-primary mr-1"></span>
								{{ $logs->text }} {{ date('M,d Y', strtotime($product['created_at'])) }}
							</div>
							@elseif ($logs->text == 'Updated:')
							<div class="logs">
								<span class="bx {{ $logs->icon }} text-primary mr-1"></span>
								{{ $logs->text }} {{ date('M,d Y', strtotime($product['updated_at'])) }}
							</div>
							@else
							<div class="logs">
								<span class="bx {{ $logs->icon }} text-primary mr-1"></span>
								{{ $logs->text }}
							</div>
							@endif
							@endforeach
						</div>
					</div>
				</div>
				<div class="mt-100">
					<div class="heading">
						<div class="heading-text">
							<h4 class="mb-0">Related Products</h4>
						</div>
						<a href="{{ route('product.category', ['category' => 'premium-admin-bootstrap-templates']) }}"
							class="btn btn-outline-primary rounded-50 btn-sm">
							View More
						</a>
					</div>
					<div class="row" id="related-products">
						@foreach ($relatedProducts as $template)
						<div class="col-md-4">
							<div class="demo-item" id="1">
								<a href="{{ route('product.theme', ['detailLink' => $template['detailLink']]) }}" class="screenshot">
									<img src="{{ url('assets/images/slider-screenshot/'.$template['screenshot']) }}" srcset="{{ url('assets/images/slider-screenshot/'.explode('.', $template['screenshot'])[0].'-sm.'.explode('.', $template['screenshot'])[1]) }} 766w, {{ url('assets/images/slider-screenshot/'.$template['screenshot']) }} 3000w" title="{{$template['name']}} Template" alt="Buy {{$template['name']}} Template at ${{ $template['price'] }}" class="img-fluid w-100" width="714" height="456">
								</a>
								<div class="action-btn">
									<a href="{{ route('product.theme', ['detailLink' => $template['detailLink']]).'#demos' }}"
										title="Live Preview" class="btn btn-primary btn-sm">Live Preview</a>
								</div>
								<div class="theme-desc">
									<div class="title">
										<h3 class="h5">
											<a href="{{ route('product.theme', ['detailLink' => $template['detailLink']]) }}"
												title="{{$template['name']}}">{{$template['name']}}</a>
										</h3>
										<p>{{ $template['oneLinerDesc'] }}</p>
									</div>
									<div class="price">
										<span class="font-weight-bold h4 mb-0">$5</span>
										<a class="category" href="{{$template['catLink']}}">{{ $template['mainCat']
											}}</a>
									</div>
								</div>
							</div>
						</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!--Demo's End-->
</div>
@include('layouts.partials.modals')
<script>
	var package_details = {
		packageName : '<?= $product->packageName ?>',
		productId : '<?= $product->productId ?>',
		price: '<?= $product->price ?>'
	};
	var logged_user_details = {
		id:  '<?= Auth::check() ? Auth::user()->id : '' ?>',
		email:  '<?= Auth::check() ? Auth::user()->email : '' ?>',
	}
</script>
@endsection
