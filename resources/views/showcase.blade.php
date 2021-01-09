@extends('layouts.main')

@section('meta')

@endsection

@section('title')
{{ trans('lang.nav_showcase') }}
@endsection

@section('view')
	<div class="showcase">
		<div class="showcase-cover" data-scroll-section>
			<div class="mask">
				<img src="https://images.unsplash.com/photo-1591976158059-35d5fcf46a6d?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1350&q=80" alt="Showcase cover">

				<div class="mask-content container-fluid">
					<div class="heading-wrapper">
						<h3>
							{{ trans('lang.showcase_title') }}
						</h3>
					</div>

					<h4>
						{{ trans('lang.showcase_desc') }}
					</h4>
				</div>
			</div>

			<div class="showcase-nav">
				<div class="container-fluid">
					<div class="nav">
						<a href="#" class="active" data-type="*">
							{{ trans('lang.showcase_all') }}
						</a>

						@foreach ($productTypes as $key => $productType)
							<a href="#" data-type="{{ $key }}">
								{{ $productType }}
							</a>
						@endforeach
					</div>
				</div>
			</div>
		</div>

		<div class="container-fluid" data-scroll-section>
			<div class="showcase-list">
				<div class="list-products row row-no-gutters">
					@foreach ($products as $key => $product)
						@php
							$addtionalClass = '';

							if($key >= 5){
								if(($key % 10) - 5 == 0 || ($key % 10) - 5 == 1 || ($key % 10) - 5 == 2){
									$additionalClass= 'col-md-4';
								} else if(($key % 10) - 5 == 3 || ($key % 10) -5 == 4) {
									$additionalClass= 'col-md-6';
								}
							} else {
								if($key == 0 || $key == 1 || $key == 2){
									$additionalClass= 'col-md-4';
								} else if($key == 3 || $key == 4) {
									$additionalClass = 'col-md-6';
								}
							}
						@endphp

						<div class="item-product item-product-{{ $product['product_category_id'] }} {{ $additionalClass }}" data-scroll data-scroll-speed="1">
							<a href="{{ route('showcase_detail', ['slug' => $product['slug']] )}}">
								<div class="mask offset">
									<div class="mask-overlay"></div>
									<img src="{{ asset('storage/app'. $product['cover_mask']) }}" alt="Thumbnail of {{ $product['title'] }}">
								</div>

								<div class="item-content offset">
									<h6 class="subtitle-md">
										{{ $productTypes[$product['product_category_id']] }}
									</h6>

									<h4>
										{{ $product['title'] }}
									</h4>

									<h6 class="subtitle-sm">
										{{ trans('lang.articles_see_detail') }}
									</h6>
								</div>
							</a>
						</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>
@endsection

@section('css')
	<!-- LOCOMOTIVE CSS -->
	<link rel="stylesheet" href="{{ asset('plugins/locomotive/css/locomotive-scroll.min.css') }}">

	<link rel="stylesheet" href="{{ asset('dist/scss/css/showcase.css') }}">
@endsection

@section('js')
	<!-- IMAGELOADED JS -->
	<script src="{{ asset('plugins/imagesLoaded/imagesloaded.pkgd.min.js') }}"></script>

	<!-- ISOTOPE JS -->
	<script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.js"></script>

	<!-- LOCOMOTIVE JS -->
	<script src="{{ asset('plugins/locomotive/js/locomotive-scroll.min.js') }}"></script>

	<script src="{{ asset('dist/js/showcase/function.min.js') }}"></script>
@endsection
