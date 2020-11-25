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
					<h3>
						{{ trans('lang.showcase_title') }}
					</h3>

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
				<div class="list-products">
					<div class="item-sizer"></div>
					@foreach ($products as $key => $product)
						<div class="item-product item-product-{{ $product['product_category_id'] }}" data-scroll data-scroll-speed="{{ rand(2, 4) }}">
							<a href="{{ route('showcase_detail', ['slug' => $product['slug']] )}}">
								<div class="mask">
									<div class="mask-overlay"></div>
									<img src="{{ asset('storage/app'. $product['cover_mask']) }}" alt="Thumbnail of {{ $product['title'] }}">
								</div>

								<div class="item-content">
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
