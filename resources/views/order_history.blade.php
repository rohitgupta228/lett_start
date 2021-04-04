@extends('layouts.main')

@section('content')
<div class="banner-title mt-100">
	<div class="container">
		<div class="row">
			<div class="col-lg-8">
				<h1 id="main-title" class="h3 mb-3">Downloads</h1>
				<h6 class="subtitle">Download your theme anytime by clicking download button.</h6>
			</div>
		</div>
	</div>
</div>
<!--Demo's Start-->
<section class="section pt-5">
	<div class="container">
		<div class="download-list">
			<div class="row">
				@foreach ($products as $template)
				<div class="col-md-6 col-xl-4">
					<div class="demo-item" id="{{ $template['id'] }}">
						<a href="theme/{{ $template['detailLink'] }}" class="screenshot">
							<img src="{{ url('assets/images/slider-screenshot/' . $template['screenshot']) }}"
								srcset="{{ url('assets/images/slider-screenshot/' . explode('.', $template['screenshot'])[0] . '-sm.' . explode('.', $template['screenshot'])[1]) }} 767w, {{ url('assets/images/slider-screenshot/' . $template['screenshot']) }} 3000w"
								sizes="100vw" title="{{ $template['name'] }} Template"
								alt="Download Your {{ $template['name'] }} Template }}" class="img-fluid w-100" width="714"
								height="456">
						</a>
						<div class="theme-desc">
							<div class="title">
								<h3 class="h5 mb-0 pr-2">
									<a href="theme/{{ $template['detailLink'] }}" title="{{ $template['name'] }}">{{ $template['name'] }}</a>
									<div class="font-size-14 mt-2">
										@if($rating[$template['id']])
										<input type="hidden" class="rating" name="rating" data-filled="bx bxs-star text-warning" data-empty="bx bx-star text-warning" value="{{ $rating[$template['id']]['rating'] }}" data-readonly data-fractions="2"/>
										@else 
										<a href="javascript:void(0)" class="text-primary font-weight-normal add-review-btn" data-id="{{ $template['id'] }}"><u>Add Reviews</u></a>
										@endif
									</div>
								</h3>
								<a href="{{ env('BASE_URL').'api/' }}user/download-theme/{{ $template['productId'] }}/{{ Auth::user()->userDetails && Auth::user()->userDetails->user_id ? Auth::user()->userDetails->user_id : '' }}"
									target="_blank" class="btn btn-sm btn-primary-gred">
									Download
								</a>
							</div>
							
						</div>
					</div>
				</div>
				@endforeach
			</div>
		</div>
	</div>
</section>
<!--Demo's End-->
</div>

<!-- Footer Start-->
<!-- Modal -->
@include('layouts.partials.modals')
<div class="modal fade" id="add-review" tabindex="-1" aria-labelledby="reviewModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
					<div class="modal-header">
							<h4 class="modal-title" id="reviewModalLabel">Add a review</h4>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<i class="bx bx-x"></i>
							</button>
					</div>
					<div class="modal-body">
						<form method="POST" action="{{ route('product.rating') }}">
							{{ csrf_field() }}
							<input type="hidden" name="product_id" id="product-id">
							<div class="form-group mb-3">
								<label class="mb-1">Your Rating <span class="text-danger">*</span></label>
								<div class="d-block">
									<input type="hidden" class="rating" name="rating" data-filled="bx bxs-star text-warning" data-empty="bx bx-star text-warning" data-fractions="2"/>
								</div>
							</div>
							<div class="form-group">
								<label class="mb-1">Your Reviews</label>
								<textarea class="form-control" name="comments" rows="2" cols="3"></textarea>
							</div>
							<div class="clearfix">
								<button type="submit" class="btn btn-primary">Submit</button>
							</div>
						</form>
					</div>
			</div>
	</div>
</div>
@endsection
@section('footer_script')
<script src="{{ url('assets/vendors/rating/bootstrap-rating.min.js') }}"></script>
<script>
	$(".add-review-btn").on("click", function() {
		$("#add-review").modal('show');
		$("#product-id").val($(this).attr("data-id"))
	})
</script>
@endsection