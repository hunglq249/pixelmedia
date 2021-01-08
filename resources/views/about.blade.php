@extends('layouts.main')

@section('meta')

@endsection

@section('title')
	{{ trans('lang.nav_about') }}
@endsection

@section('view')
	<div class="about">
		<div class="container-fluid" data-scroll-section>
			<div class="row">
				<div class="heading-content col-md-5">
					<h3>
						{{ trans('lang.nav_about') }}
					</h3>

					<h4>
						{{ $aboutInfo->description }}
					</h4>

					<p>
						{!! $aboutInfo->content !!}
					</p>
				</div>
				<div class="heading-image col-md-7" data-scroll data-scroll-speed="1">
					<div class="mask">
						<div class="mask-overlay"></div>

						<img src="{{ asset('storage/app'. $aboutInfo->cover) }}" alt="About cover">
					</div>
				</div>
			</div>
		</div>

		<div class="container-fluid" data-scroll-section>
			<div class="team-header">
				<div class="container">
					<h3>
						{{ trans('lang.about_team') }}
					</h3>
				</div>
			</div>

			<div class="team-body">
				<div class="row">
					@foreach ($staffs as $staff)
						<div class="item-team col-md-4">
							<div class="mask">
								<div class="overlay">
									<h3>
										{{ $staff['name'] }}
									</h3>
									<h6>
										{{ $staff['position'] }}
									</h6>
								</div>

								<img src="{{ asset('storage/app'. $staff['image']) }}" alt="Avatar of {{ $staff['name'] }}">
							</div>
						</div>
					@endforeach
				</div>
			</div>
		</div>

			<div class="hidden-div" data-scroll-section></div>
		</div>
	</div>
@endsection

@section('css')
	<!-- LOCOMOTIVE CSS -->
	<link rel="stylesheet" href="{{ asset('plugins/locomotive/css/locomotive-scroll.min.css') }}">

	<!-- SWIPER CSS -->
	<link rel="stylesheet" href="{{ asset('plugins/swiper/css/swiper-bundle.min.css') }}">

	<link rel="stylesheet" href="{{ asset('dist/scss/css/about.css') }}">
@endsection

@section('js')
	<!-- LOCOMOTIVE JS -->
	<script src="{{ asset('plugins/locomotive/js/locomotive-scroll.min.js') }}"></script>

	<!-- SWIPER JS -->
	<script src="{{ asset('plugins/swiper/js/swiper-bundle.min.js') }}"></script>

	<script src="{{ asset('dist/js/about/function.min.js') }}"></script>
@endsection
