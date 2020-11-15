@extends('layouts.main')

@section('meta')

@endsection

@section('title')
	{{ trans('lang.nav_about') }}
@endsection

@section('view')
	<div class="about">
		<div class="container" data-scroll-section>
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

						<img src="https://images.unsplash.com/photo-1532800783378-1bed60adaf58?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1050&q=80" alt="About cover">
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

			{{-- <div class="section section-cover" data-scroll-section>
				<div class="row">
					<div class="col-md-3"></div>
					<div class="col-md-9">
						<div class="mask">
							<img src="{{ asset('storage/app'. $aboutInfo['cover']) }}" alt="Image cover">
						</div>
					</div>
				</div>
			</div>

			<div class="section section-desc" data-scroll-section>
				<div class="row">
					<div class="col-md-3 text-heading">
						<h5>
							{{ trans('lang.nav_about') }}
						</h5>
					</div>
					<div class="col-md-9 text-info">
						<h6>
							Vivamus enim tellus, eleifend vel sollicitudin ac, accumsan quis orci
						</h6>

						<h6 class="subtitle-sm">
							Aliquam vel malesuada purus, vel mollis tellus
						</h6>
					</div>
				</div>
			</div>

			<div class="section section-image-break" data-scroll-section>
				<div class="row">
					<div class="col-md-3"></div>
					<div class="col-md-9 images-wrapper">
						<div class="row">
							@foreach ($aboutInfo['break']['break1'] as $key => $image)
								<div class="col">
									<div class="mask" data-scroll data-scroll-speed="{{ $key }}">
										<img src="{{ asset('storage/app'. $image) }}" alt="Image break {{ $key }}">
									</div>
								</div>
							@endforeach
						</div>
					</div>
				</div>
			</div>

			<div class="section section-text-break" data-scroll-section>
				<div class="row">
					<div class="col-md-3"></div>
					<div class="col-md-9">
						<h4 data-scroll data-scroll-speed="2">
							{{ $aboutInfo->description }}
						</h4>
					</div>
				</div>
			</div>

			<div class="section section-image-break" data-scroll-section>
				<div class="row">
					<div class="col-md-3"></div>
					<div class="col-md-9 images-wrapper">
						<div class="row">
							@foreach ($aboutInfo['break']['break2'] as $key => $image)
								<div class="col-md-{{ $key == 0 ? '12' : '6'}}">
									<div class="mask" data-scroll data-scroll-speed="{{ $key }}">
										<img src="{{ asset('storage/app'. $image) }}" alt="Image break {{ $key }}">
									</div>
								</div>
							@endforeach
						</div>
					</div>
				</div>
			</div>

			<div class="section section-text-break" data-scroll-section>
				<div class="row">
					<div class="col-md-3"></div>
					<div class="col-md-9">
						<h3 data-scroll data-scroll-speed="2">
							{!! $aboutInfo->content !!}
						</h3>
					</div>
				</div>
			</div>

			<div class="section section-staff" data-scroll-section>
				<div class="row">
					<div class="col-md-3"></div>
					<div class="col-md-9">
						<div class="section-header">
							<h2 data-scroll data-scroll-speed="2">
								{{ trans('lang.about_title') }}
							</h2>

							<h4 data-scroll data-scroll-speed="1">
								{{ trans('lang.about_desc') }}
							</h4>
						</div>

						<div class="section-body">
							<div class="swiper-container" id="swiperStaff">
								<div class="swiper-wrapper">
									@foreach ($staffs as $staff)
										<div class="swiper-slide">
											<div class="mask">
												<div class="overlay">
													<h4>
														{{ $staff['name'] }}
													</h4>
													<h6 class="sutitle-md">
														{{ $staff['position'] }}
													</h6>
												</div>

												<img src="{{ asset('storage/app'. $staff['image']) }}" alt="Avatar of {{ $staff['name'] }}">
											</div>
										</div>
									@endforeach
								</div>

								<div class="swiper-pagination"></div>
							</div>
						</div>
					</div>
				</div>
			</div> --}}

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
