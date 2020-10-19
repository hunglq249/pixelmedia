@extends('layouts.main')

@section('meta')

@endsection

@section('title')
	{{ trans('lang.nav_home') }}
@endsection

@section('view')
	@php
		function convertString($string, $alreadyShow = false){
			$str = $string;
			$strConvert = '';

			$blockSplit = true;

			for($i = 0; $i < strlen($str); $i++){
				if (mb_substr($str,$i,1, "utf-8") == '<') {
					$blockSplit = false;
				}

				if (($blockSplit) and (mb_substr($str,$i,1, "utf-8") != ' ')) {
					if($alreadyShow){
						$strConvert .= '<span class="show">' . mb_substr($str,$i,1, "utf-8") . '</span>';
					} else {
						$strConvert .= '<span>' . mb_substr($str,$i,1, "utf-8") . '</span>';
					}
				} else {
					$strConvert .= mb_substr($str,$i,1, "utf-8");
				}

				if (mb_substr($str,$i,1, "utf-8") == '>') {
					$blockSplit = true;
				}
			}

			return $strConvert;
		}	
	@endphp

	<div class="homepage">
		<div class="swiper-container" id="swiperHomepage">
			<div class="swiper-wrapper">
				@foreach ($products as $key => $item)
					<div class="swiper-slide">
						@if ($item['CoverType'] == 0)
							<div class="mask">
								<img src="{{ $item['CoverUrl'] }}" alt="Image cover of {{ $item['Title'] }}">
							</div>
						@else
							<div class="play-video-wrapper" data-ytb-id="{{ $item['CoverUrl'] }}">
								<div class="play-video"></div>
								<div class="play-video-overlay">
									<div class="mask">
										@if ($item['CoverMask'] != '')
											<img src="{{ $item['CoverMask'] }}" alt="Thumb mask of {{ $item['Title'] }}">
										@endif
									</div>
								</div>
							</div>
						@endif

						<div class="overlay">
							<div class="overlay-text">
								<h6>
									@if($key == 0)
										{!! convertString($item['Category'], true) !!}
									@else
										{!! convertString($item['Category']) !!}
									@endif
								</h6>
								<h5>
									@if ($key == 0)
										{!! convertString($item['Subtitle'], true) !!}
									@else
										{!! convertString($item['Subtitle']) !!}
									@endif
								</h5>
								<h3>
									@if ($key == 0)
										{!! convertString($item['Title'], true) !!}
									@else
										{!! convertString($item['Title']) !!}
									@endif
								</h3>
							</div>
		
							<div class="overlay-actions {{ $key == 0 ? 'show' : '' }}">
								<a href="#" class="btn btn-lg btn-outline-dark">
									{{ trans('lang.home_btn_view') }}
								</a>
								@if ($item['CoverType'] == 1)
									<button class="btn btn-lg btn-outline-dark" onclick="playVideo(this)" data-play="false" type="button">
										{{ trans('lang.home_btn_play') }}
									</button>
								@endif
							</div>
						</div>
					</div>
				@endforeach
			</div>

			<div class="swiper-pagination"></div>
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
	<!-- SWIPER CSS -->
	<script src="{{ asset('plugins/swiper/js/swiper-bundle.min.js') }}"></script>

	<!-- LOCOMOTIVE JS -->
	<script src="{{ asset('plugins/locomotive/js/locomotive-scroll.min.js') }}"></script>

	<!-- YOUTUBE BACKGROUND -->
    <script src="{{ asset('plugins/youtube-background/src/jquery.youtubebackground.min.js') }}"></script>

	<script src="{{ asset('dist/js/homepage/function.min.js') }}"></script>
@endsection