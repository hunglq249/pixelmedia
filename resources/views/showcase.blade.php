@extends('layouts.main')

@section('meta')

@endsection

@section('title')
{{ trans('lang.nav_showcase') }}
@endsection

@section('view')
	<div class="showcase">
		<div class="showcase-cover" data-scroll-section>
			<div class="swiper-container" id="swiperShowcase">
				<div class="swiper-wrapper">
					@foreach ($productTypes as $type)
						<div class="swiper-slide">
							<div class="mask">
								<img src="{{ asset('storage/app'. $type['image']) }}" alt="Image thumb of {{ $type['title'] }}">
							</div>
						</div>
					@endforeach
				</div>

				<div class="showcase-nav">
					<div class="container-fluid">
						<div class="nav">
							@php
								$customProductTypes = array_values($productTypes)
							@endphp
							@foreach ($customProductTypes as $key => $productType)
								<a href="#" class="{{ $productType['id'] == 38 ? 'active' : '' }}" data-index="{{ $key }}" data-type="{{ $productType['id'] == 38 ? '*' : $productType['id'] }}">
									{{ $productType['title'] }}
								</a>
							@endforeach
						</div>
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

							if($key % 5 == 0 || $key % 5 == 1 || $key % 5 == 2){
								$additionalClass= 'col-md-4';
							} else if($key % 5 == 3 || $key % 5 == 4) {
								$additionalClass= 'col-md-6';
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
										{{ $productTypes[$product['product_category_id']]['title'] }}
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

	<!-- SWIPER CSS -->
	<link rel="stylesheet" href="{{ asset('plugins/swiper/css/swiper-bundle.min.css') }}">

	<link rel="stylesheet" href="{{ asset('dist/scss/css/showcase.css') }}">
@endsection

@section('js')
	<!-- IMAGELOADED JS -->
	<script src="{{ asset('plugins/imagesLoaded/imagesloaded.pkgd.min.js') }}"></script>

	<!-- ISOTOPE JS -->
	<script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.js"></script>

	<!-- LOCOMOTIVE JS -->
	<script src="{{ asset('plugins/locomotive/js/locomotive-scroll.min.js') }}"></script>

	<!-- SWIPER JS -->
	<script src="{{ asset('plugins/swiper/js/swiper-bundle.min.js') }}"></script>

	<script>
		let request = '{{ request()->get('request') }}';
	</script>
	<script src="{{ asset('dist/js/showcase/function.js') }}"></script>
@endsection
