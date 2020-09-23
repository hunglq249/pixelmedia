@extends('layouts.main')

@section('meta')
	
@endsection

@section('title')
	Homepage
@endsection

@section('view')
	<div class="homepage">
		<div class="scroll-nav">
			<ul>
				<li>
					<a href="#" class="scroll-nav-item active" data-index="0">
						<div class="circle"></div>
					</a>
				</li>

				@foreach ($products as $key => $item)
					<li>
						<a href="#" class="scroll-nav-item" data-index="{{ $key + 1 }}">
							<div class="circle"></div>
						</a>

						<h6 class="subtitle-md">
							{{ $item['Title'] }}
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
			<div class="section section-product" data-scroll-section>
				@if ($item['CoverType'] == 0)
					<div class="mask">
						<img src="{{ $item['CoverUrl'] }}" alt="Image cover of {{ $item['Title'] }}">
					</div>
				@else
					<div class="play-video-wrapper" data-ytb-id="{{ $item['CoverUrl'] }}">
						<div class="play-video"></div>
						<div class="play-video-overlay"></div>
					</div>
				@endif
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
		</div>
	</div>
@endsection

@section('css')
	<!-- LOCOMOTIVE CSS -->
	<link rel="stylesheet" href="{{ asset('plugins/locomotive/css/locomotive-scroll.min.css') }}">

	<link rel="stylesheet" href="{{ asset('dist/scss/css/homepage.css') }}">
@endsection

@section('js')
	<!-- LOCOMOTIVE JS -->
	<script src="{{ asset('plugins/locomotive/js/locomotive-scroll.min.js') }}"></script>

	<!-- YOUTUBE BACKGROUND -->
    <script src="{{ asset('plugins/youtube-background/src/jquery.youtubebackground.min.js') }}"></script>

	<script src="{{ asset('dist/js/homepage/function.min.js') }}"></script>
@endsection