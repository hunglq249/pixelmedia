@extends('layouts.main')

@section('meta')

@endsection

@section('title')
	{{ trans('lang.nav_home') }}
@endsection

@section('view')
	<div class="homepage">
		<div class="swiper-container" id="swiperHomepage">
			<div class="overlay">
				<div class="overlay-wrapper">
					@foreach ($products as $key => $item)
						<div class="overlay-item">
							<div class="overlay-text">
								<h2>
									{{ $item['title'] }}
								</h2>
								<h5>
									{{ $types[$item['product_category_id']] }}
								</h5>
							</div>
			
							<div class="overlay-actions">
								<a href="{{ route('showcase_detail', ['slug' => $item['slug']]) }}" class="btn btn-outline-dark">
									{{ trans('lang.home_btn_view') }}
								</a>
								@if ($item['cover_type'] == 1)
									<button class="btn btn-outline-dark" onclick="playVideo(this)" data-video-id="{{ $item['cover_url'] }}" type="button">
										{{ trans('lang.home_btn_play') }}
									</button>
								@endif
							</div>
						</div>
					@endforeach
				</div>
			</div>

			<div class="overlay-nav">
				<ul>
					@foreach ($videos as $key => $video)
						<li>
							<a href="#" class="switch-slide {{ $key == 0 ? 'active' : '' }}" data-slide-index="{{ $key }}">
								<span>
									{{ $video['title'] }}	
								</span>	
							</a>
						</li>
					@endforeach
				</ul>
			</div>

			<div class="swiper-wrapper">
				@foreach ($videos as $video)
					<div class="swiper-slide">
						<div class="swiper-inner">
							<video preload="auto" autoplay="true" loop muted>
								<source src="{{ asset('storage/app' . $video->path) }}" type="video/mp4">
								{{ $video->title }}
							</video>
						</div>
					</div>
				@endforeach
			</div>

			{{-- <div class="swiper-wrapper">
                @foreach ($products as $key => $item)
					<div class="swiper-slide">
						<div class="swiper-inner">
							<video preload="auto" autoplay="true" loop muted>
								<source src="{{ asset('storage/video/VERSATILE.mp4') }}" type="video/mp4">
								Your browser does not support video
							</video>
						</div>
						@if ($item['cover_type'] == 0)
							<div class="swiper-inner" style="background-image: url({{ asset('storage/app'. $item['cover_url']) }})"></div>
						@else
							<div class="swiper-inner" style="background-image: url({{ asset('storage/app'. $item['cover_mask']) }})"></div>
						@endif
					</div>
				@endforeach
			</div> --}}

			<div class="swiper-pagination"></div>
		</div>

		<div class="popup fade popup-full popup-play-video" id="popupPlayVideo">
			<div class="popup-dialog">
				<div class="popup-content">
					<div class="popup-header">
						<div></div>

						<button class="btn" data-dismiss="popup" type="button">
							<i class="elo el-2x el-close"></i>
						</button>
					</div>
					<div class="popup-body">

					</div>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('css')
	<!-- SWIPER CSS -->
	<link rel="stylesheet" href="{{ asset('plugins/swiper/css/swiper-bundle.min.css') }}">

	<!-- LOCOMOTIVE CSS -->
	<link rel="stylesheet" href="{{ asset('plugins/locomotive/css/locomotive-scroll.min.css') }}">

	<link rel="stylesheet" href="{{ asset('dist/scss/css/homepage.css') }}">
@endsection

@section('js')
	<!-- SWIPER JS -->
	<script src="{{ asset('plugins/swiper/js/swiper-bundle.min.js') }}"></script>

	<!-- LOCOMOTIVE JS -->
	<script src="{{ asset('plugins/locomotive/js/locomotive-scroll.min.js') }}"></script>

	<!-- YOUTUBE BACKGROUND -->
    <script src="{{ asset('plugins/youtube-background/src/jquery.youtubebackground.min.js') }}"></script>

	<script src="{{ asset('dist/js/homepage/function.js') }}"></script>
@endsection
