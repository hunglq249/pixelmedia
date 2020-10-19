@extends('layouts.main')

@section('meta')

@endsection

@section('title')
	Homepage
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
						@if ($item['cover_type'] == 0)
							<div class="mask">
								<img src="{{ asset('storage/app'. $item['cover_url']) }}" alt="Image cover of {{ $item['title'] }}">
							</div>
						@else
							<div class="play-video-wrapper" data-ytb-id="{{ $item['cover_url'] }}">
								<div class="play-video"></div>
								<div class="play-video-overlay">
									<div class="mask">
										@if ($item['cover_mask'] != '')
											<img src="{{ asset('storage/app'. $item['cover_mask']) }}" alt="Thumb mask of {{ $item['title'] }}">
										@endif
									</div>
								</div>
							</div>
						@endif

						<div class="overlay">
							<div class="overlay-text">
								<h6>
                                    @if($key == 0)
										{!! convertString($types[$item['product_category_id']], true) !!}
									@else
										{!! convertString($types[$item['product_category_id']]) !!}
									@endif
								</h6>
								<h5>
									@if ($key == 0)
										{!! convertString($item['sub_title'], true) !!}
									@else
										{!! convertString($item['sub_title']) !!}
									@endif
								</h5>
								<h3>
									@if ($key == 0)
										{!! convertString($item['title'], true) !!}
									@else
										{!! convertString($item['title']) !!}
									@endif
								</h3>
							</div>

							<div class="overlay-actions {{ $key == 0 ? 'show' : '' }}">
								<a href="#" class="btn btn-lg btn-outline-dark">
									View experience
								</a>
								@if ($item['cover_type'] == 1)
									<button class="btn btn-lg btn-outline-dark" onclick="playVideo(this)" data-play="false" type="button">
										Play video
									</button>
								@endif
							</div>
						</div>
					</div>
				@endforeach
			</div>

			<div class="swiper-pagination"></div>
		</div>

		{{-- <div class="scroll-nav">
			<ul>
				<li>
					<a href="#" class="scroll-nav-item active" onclick="scrollToSection(this)" data-target="" data-index="0">
						<div class="circle"></div>
					</a>
				</li>

				@foreach ($products as $key => $item)
					<li>
						<a href="#" class="scroll-nav-item" onclick="scrollToSection(this)" data-target="#section_{{ $key + 1 }}" data-index="{{ $key + 1 }}">
							<div class="circle"></div>
						</a>

						<h6 class="subtitle-md">
							{{ $item['title'] }}
						</h6>
					</li>
				@endforeach
			</ul>
		</div>

		<div class="section section-greeting" data-scroll-section>
			<div class="mask-wrapper">
				<div class="mask" data-scroll data-scroll-speed="1">
					<img src="https://images.unsplash.com/photo-1512025316832-8658f04f8a83?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1051&q=80" alt="Image greeting">
				</div>

				<div class="greeting-title">
					<h1 data-scroll data-scroll-speed="3">
						We make people dig your brand. We make videos.
					</h1>
				</div>
			</div>
		</div>

		@foreach ($products as $key => $item)
			<div class="section section-product" id="section_{{ $key + 1 }}" data-scroll-section>
				@if ($item['cover_type'] == 0)
					<div class="mask">
						<img src="{{ $item['cover_url'] }}" alt="Image cover of {{ $item['title'] }}">
					</div>
				@else
					<div class="play-video-wrapper" data-ytb-id="{{ $item['cover_url'] }}">
						<div class="play-video"></div>
						<div class="play-video-overlay">
							<div class="mask">
								@if ($item['cover_mask'] != '')
									<img src="{{ $item['cover_mask'] }}" alt="Thumb mask of {{ $item['title'] }}">
								@endif
							</div>
						</div>
					</div>
				@endif

				<div class="section-overlay">
					<div class="overlay-text">
						<h6 data-scroll data-scroll-speed="2">
							{{ $item['Category'] }}
						</h6>
						<h5 data-scroll data-scroll-speed="3">
							{{ $item['Subtitle'] }}
						</h5>
						<h3 data-scroll data-scroll-speed="4">
							{{ $item['title'] }}
						</h3>
					</div>

					<div class="overlay-actions">
						<a href="#" class="btn btn-lg btn-outline-dark">
							View experience
						</a>
						@if ($item['cover_type'] == 1)
							<button class="btn btn-lg btn-outline-dark" onclick="playVideo(this)" data-play="false" type="button">
								Play video
							</button>
						@endif
					</div>
				</div>
			</div>
		@endforeach

		<div class="home-contact">
			<div class="home-contact-left">
				@foreach ($contactInfo['Social'] as $key => $socialUrl)
					@php
						$icon = 'fab ';

						if($key == 'Facebook'){
							$icon = $icon . 'fa-facebook-f';
						} else if ($key == 'Instagram'){
							$icon = $icon . 'fa-instagram';
						} else if ($key == 'Behance'){
							$icon = $icon . 'fa-behance';
						} else if ($key == 'Youtube'){
							$icon = $icon . 'fa-youtube';
						}
					@endphp

					<a href="{{ $socialUrl }}">
						<i class="{{ $icon }}"></i>
					</a>
				@endforeach
			</div>

			<div class="home-contact-center">
			</div>

			<div class="home-contact-right">
			</div>
		</div> --}}
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
