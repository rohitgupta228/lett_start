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
                                    sizes="100vw"
                                        title="{{ $template['name'] }} Template"
                                        alt="Download Your {{ $template['name'] }} Template }}" class="img-fluid w-100"
                                        width="714" height="456">
                                </a>
                                <div class="theme-desc">
                                    <div class="title">
                                        <h3 class="h5 mb-0">
                                            <a href="theme/{{ $template['detailLink'] }}"
                                                title="{{ $template['name'] }}">{{ $template['name'] }}</a>
                                        </h3>
                                        <form id="rating" method="POST" action="{{ route('product.rating') }}">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="product_id" value="1">
                                            <input type="hidden" name="rating" value="4">
                                            <button type="submit" id="rating-btn">Submit</button>
</form>
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

    <script>
        ('#rating-btn').click(function () {
        var details = $('#rating').valid();
        if (details) {
            $('#rating').submit();
        } else {
            return false;
        }
    });
            </script>

@endsection
