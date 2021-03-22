@extends('layouts.main')

@section('meta')
	<meta property="og:url" content="{{ url()->full() }}" />
	<meta property="og:type" content="website" />
	<meta property="og:title" content="{{ $product['title'] }}" />
	<meta property="og:description" content="{{ $product['description'] }}" />
	<meta property="og:image" content="{{ asset('storage/app'. $product['cover_mask']) }}" />
@endsection

@section('title')
	{{ $product['title'] }}
@endsection

@section('view')
	<div id="fb-root"></div>
	<script>
	(function(d, s, id) {
		var js, fjs = d.getElementsByTagName(s)[0];
		if (d.getElementById(id)) return;
		js = d.createElement(s); js.id = id;
		js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0";
		fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk')
	);
	</script>
	<script src="https://player.vimeo.com/api/player.js"></script>

	<div class="showcase-detail">
		<div class="showcase-cover">
			@if ($product['cover_type'] == 0)
				<div class="mask">
					<img src="{{ asset('storage/app'. $product['cover_mask']) }}" alt="Cover of product {{ $product['title'] }}">
				</div>
			@elseif($product['cover_type'] == 1)
				<div style="padding:56.25% 0 0 0;position:relative;">
					<iframe src="https://player.vimeo.com/video/{{ $product['cover_url'] }}?autoplay=1&loop=1&title=0&byline=0&portrait=0?controls=0&muted=1" style="position:absolute;top:0;left:0;width:100%;height:100%;" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen></iframe>
				</div>
			@endif

			<div class="cover-overlay">
				@if($product['cover_type'] == 1)
					<button class="btn btn-outline-dark" id="btnPlayVideo" data-id="{{ $product['cover_url'] }}" type="button">
						{{ trans('lang.home_btn_play') }}
					</button>
				@endif
			</div>

			@if ($previous)
				<div class="overlay-hover overlay-prev" data-direction="prev">
					<div class="overlay-hover-wrapper">
						<a href="#" class="overlay-hover-text change-project" data-url="{{ route('showcase_detail', ['slug' => $previous->slug] )}}">
							<span class="circle">
								<i class="els el-lg el-caret-left"></i>
							</span>
							{{ trans('lang.showcase_previous') }}
						</a>

						{{-- <div class="overlay-cover overlay-cover-prev">
							<div class="overlay-cover-wrapper">
								@if ($previous['cover_type'] == 0)
									<div class="mask">
										<img src="{{ asset('storage/app'. $previous['cover_mask']) }}" alt="">
									</div>
								@elseif($previous['cover_type'] == 1)
									<div class="video-wrapper">
										<iframe src="https://player.vimeo.com/video/{{ $product['cover_url'] }}?autoplay=1&loop=1&title=0&byline=0&portrait=0?controls=0&muted=1" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen></iframe>
									</div>
								@endif

								<a href="{{ route('showcase_detail', ['slug' => $previous->slug] )}}"></a>
							</div>
						</div> --}}
					</div>
				</div>
			@endif

			@if ($next)
				<div class="overlay-hover overlay-next" data-direction="next">
					<div class="overlay-hover-wrapper">
						<a href="#" class="overlay-hover-text change-project" data-url="{{ route('showcase_detail', ['slug' => $next->slug] )}}">
							{{ trans('lang.showcase_next') }}
		
							<span class="circle">
								<i class="els el-lg el-caret-right"></i>
							</span>
						</a>

						{{-- <div class="overlay-cover overlay-cover-next">
							<div class="overlay-cover-wrapper">
								@if ($next['cover_type'] == 0)
									<div class="mask">
										<img src="{{ asset('storage/app'. $next['cover_mask']) }}" alt="">
									</div>
								@elseif($next['cover_type'] == 1)
									<div class="video-wrapper">
										<iframe src="https://player.vimeo.com/video/{{ $next['cover_url'] }}?autoplay=1&loop=1&title=0&byline=0&portrait=0?controls=0&muted=1" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen></iframe>
									</div>
								@endif

								<a href="{{ route('showcase_detail', ['slug' => $next->slug] )}}"></a>
							</div>
						</div> --}}
					</div>
				</div>
			@endif

			<div class="breadcrumb-wrapper">
				<div class="container-fluid">
					<ul class="breadcrumb">
						<li class="breadcrumb-item">
							<a href="{{ route('showcase') }}">
								{{ trans('lang.nav_showcase') }}
							</a>
						</li>

						<li class="breadcrumb-item">
							<a href="javascript:void(0)">
								{{ $product['product_category'] }}
							</a>
						</li>

						<li class="breadcrumb-item active">
							<a href="javascript:void(0)">
								{{ $product['title'] }}
							</a>
						</li>
					</ul>
				</div>
			</div>

            {{-- @if ($previous)
                <div class="overlay-hover overlay-prev" data-direction="prev">
                    <a href="{{ route('showcase_detail', ['slug' => $previous->slug] )}}" class="btn" role="button">
                        <span class="circle">
                            <i class="els el-lg el-caret-left"></i>
                        </span>
                        {{ trans('lang.showcase_previous') }}
                    </a>
                </div>
			@endif

            @if ($next)
				<div class="overlay-hover overlay-next" data-direction="next">
					<a href="{{ route('showcase_detail', ['slug' => $next->slug] )}}" class="btn" role="button">
						{{ trans('lang.showcase_next') }}
						<span class="circle">
							<i class="els el-lg el-caret-right"></i>
						</span>
					</a>
				</div>
            @endif

            @if ($previous)
                <div class="cover-prev">
					@if ($product['cover_type'] == 0)
						<div class="mask">
							<img src="{{ asset('storage/app'. $previous['cover_mask']) }}" alt="">
						</div>
					@elseif($product['cover_type'] == 1)
						<a href="https://vimeo.com/{{ $previous['cover_url'] }}" class="btn btn-outline-dark" role="button" target="_blank"></a>
					@endif
                </div>
            @endif
            @if ($next)
                <div class="cover-next">
					@if ($product['cover_type'] == 0)
						<div class="mask">
							<img src="{{ asset('storage/app'. $next['cover_mask']) }}" alt="">
						</div>
					@elseif($product['cover_type'] == 1)
						<a href="https://vimeo.com/{{ $next['cover_url'] }}" class="btn btn-outline-dark" role="button" target="_blank"></a>
					@endif
                </div>
            @endif --}}
		</div>

		{{-- <div class="showcase-info">
			<div class="container">
				<div class="info-title">
					<ul class="breadcrumb">
						<li class="breadcrumb-item">
							<a href="{{ route('showcase') }}">
								{{ trans('lang.nav_showcase') }}
							</a>
						</li>

						<li class="breadcrumb-item">
							<a href="javascript:void(0)">
								{{ $product['product_category'] }}
							</a>
						</li>

						<li class="breadcrumb-item active">
							<a href="javascript:void(0)">
								{{ $product['title'] }}
							</a>
						</li>
					</ul>

					<h3>
						{{ $product['title'] }}
					</h3>

					<p>
						{{ $product['description'] }}
					</p>

					<div class="group">
						<p>
							{{ trans('lang.showcase_client') }}
						</p>

						<h5>
							{{ $product['client'] }}
						</h5>
					</div>

					<div class="group">
						<p>
							{{ trans('lang.showcase_date') }}
						</p>

						<h5>
							{{ $product['date'] }}
						</h5>
					</div>

					@foreach ($product['teams'] as $item)
						<div class="group">
							<p>
								{{ $item['position'] }}
							</p>

							<h5>
								{{ $item['name'] }}
							</h5>
						</div>
					@endforeach
				</div>
			</div>
		</div> --}}

		<div class="showcase-images">
			<div class="container-fluid">
				<div>
                    {!! $product['content'] !!}
				</div>
				
				{{-- <div class="list-items row row-no-gutters">
					@if(count($product->images) > 0)
						@foreach ($product->images as $key => $item)
							@php
								$addtionalClass = '';
								$limit = ceil(count($product->images) / 6);

								for($i = 0; $i < $limit; $i++){
									if($key - $i * 6 == 0){
										$addtionalClass = 'col-md-12';
									} elseif ($key - $i * 6 == 1 || $key - $i * 6 == 2) {
										$addtionalClass = 'col-md-6';
									} elseif ($key - $i * 6 == 3 || $key - $i * 6 == 4 || $key - $i * 6 == 5) {
										$addtionalClass = 'col-md-4';
									}
								}
							@endphp

							<div class="wow slideInUp item-image {{ $addtionalClass }}">
								<a href="#" class="open-image">
									<img src="{{ asset('storage/app'. $item) }}" alt="Image">
								</a>
							</div>
						@endforeach
					@endif
				</div> --}}
			</div>
		</div>

		<div class="showcase-share">
			<div class="btn-wrapper">
				<button class="btn" type="button">
					<i class="fas fa-lg fa-share-alt"></i>
				</button>

				<div class="btn-list">
					<div class="btn btn-default btn-share" id="btnFbShare" data-href="{{ url()->full() }}" type="button">
						<i class="fab fa-lg fa-facebook"></i>
					</div>

					<div class="btn btn-default btn-share" id="btnTwShare" data-href="{{ url()->full() }}" type="button">
						<i class="fab fa-lg fa-twitter"></i>
					</div>
				</div>
			</div>
		</div>

		<div class="showcase-related">
			<div class="related-header">
				<h5>
					{{ trans('lang.showcase_related') }}
				</h5>
			</div>
			<div class="related-body">
				<div class="swiper-container" id="swiperRelated">
					<div class="swiper-wrapper">
						@if (count($relateds) > 0)
							@foreach ($relateds as $key => $related)
								<div class="swiper-slide">
									<a href="{{ route('showcase_detail', ['slug' => $related['slug']] )}}">
										<div class="mask">
											<div class="mask-overlay"></div>
											<img src="{{ asset('storage/app'. $related['cover_mask']) }}" alt="Image related">
										</div>

										<div class="item-content offset">
											<h6 class="subtitle-md">
												{{ $product['product_category'] }}
											</h6>

											<h4>
												{{ $related['title'] }}
											</h4>

											<h6 class="subtitle-sm">
												{{ trans('lang.articles_see_detail') }}
											</h6>
										</div>
									</a>
								</div>
							@endforeach
						@endif
					</div>

					<div class="swiper-button-prev"></div>
	
					<div class="swiper-button-next"></div>
	
					<div class="swiper-pagination"></div>
				</div>
				{{-- <div class="container-fluid">
					<div class="row">
						@if (count($relateds) > 0)
							@foreach ($relateds as $key => $related)
								<div class="item-related col-md-4">
									<a href="{{ route('showcase_detail', ['slug' => $related['slug']] )}}">
										<div class="mask">
											<div class="mask-overlay"></div>
											<img src="{{ asset('storage/app'. $related['cover_mask']) }}" alt="Image related">
										</div>

										<div class="item-content offset">
											<h6 class="subtitle-md">
												{{ $product['product_category'] }}
											</h6>

											<h4>
												{{ $related['title'] }}
											</h4>

											<h6 class="subtitle-sm">
												{{ trans('lang.articles_see_detail') }}
											</h6>
										</div>
									</a>
								</div>
							@endforeach
						@endif
					</div>
				</div> --}}
			</div>
		</div>

		<div class="showcase-detail-nav">
			@if ($previous)
				<a href="{{ route('showcase_detail', ['slug' => $previous->slug] )}}" class="btn btn-control-showcase" role="button">
					<span class="circle">
						<i class="els el-lg el-caret-left"></i>
					</span>
					{{ trans('lang.showcase_previous') }}
				</a>
			@else
				<div></div>
			@endif

			<a href="#" class="btn btn-top" id="btnTop">
				<span class="circle">
					<i class="elo el-lg el-caret-up"></i>
				</span>
				{{ trans('lang.showcase_top') }}
			</a>

			@if ($next)
				<a href="{{ route('showcase_detail', ['slug' => $next->slug] )}}" class="btn btn-control-showcase" role="button">
					{{ trans('lang.showcase_next') }}
					<span class="circle">
						<i class="els el-lg el-caret-right"></i>
					</span>
				</a>
			@else
				<div></div>
			@endif
		</div>

		@include('showcase._popup')
	</div>
@endsection

@section('css')
	<!-- FONT AWESOME CSS -->
	<link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.css') }}">
	
	<!-- SWIPER CSS -->
	<link rel="stylesheet" href="{{ asset('plugins/swiper/css/swiper-bundle.min.css') }}">
	
	<!-- ANIMATE CSS -->
	<link rel="stylesheet" href="{{ asset('plugins/animate/animate.css') }}">

	<link rel="stylesheet" href="{{ asset('dist/scss/css/showcase.css') }}">
@endsection

@section('js')
	<!-- WOW JS -->
	<script src="{{ asset('plugins/wow/wow.min.js') }}"></script>

	<!-- IMAGELOADED JS -->
	<script src="{{ asset('plugins/imagesLoaded/imagesloaded.pkgd.min.js') }}"></script>

	<!-- SWIPER JS -->
	<script src="{{ asset('plugins/swiper/js/swiper-bundle.min.js') }}"></script>

	<!-- MANSORY JS -->
	<script src="{{ asset('plugins/mansory/masonry.pkgd.min.js') }}"></script>

	<script src="{{ asset('dist/js/showcase/detail/function.min.js') }}"></script>
@endsection
