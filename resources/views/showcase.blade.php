@extends('layouts.main')

@section('meta')

@endsection

@section('title')
{{ trans('lang.nav_showcase') }}
@endsection

@section('view')
	<div class="showcase">
		<div class="showcase-desc" data-scroll-section>
			<div class="container">
				<div class="row">
					<div class="col-md-4">
						<h3>
							{{ trans('lang.showcase_title') }}
						</h3>
					</div>

					<div class="col-md-8">
						<p>
							{{ trans('lang.showcase_desc') }}
						</p>
					</div>
				</div>
			</div>
		</div>

		<div class="showcase-nav" data-scroll-section>
			<div class="container">
				<div class="row">
					<div class="col-md-4"></div>

					<div class="col-md-8 nav-wrapper">
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
		</div>

		<div class="showcase-list" data-scroll-section>
			<div class="container-fluid">
				<div class="list-products">
					<div class="item-sizer"></div>
					@foreach ($products as $key => $product)
						<div class="item-product" data-scroll data-scroll-speed="{{ rand(1, 3) }}">
							<a href="{{ route('showcase_detail', ['slug' => $product['slug']] )}}">
								<img src="{{ asset('storage/app'. $product['cover_mask']) }}" alt="Thumbnail of {{ $product['title'] }}">

								<p>
									{{ $product['title'] }} - {{ $product['client'] }}
								</p>
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
	<script src="{{ asset('plugins/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>

	<!-- MANSORY JS -->
	<script src="{{ asset('plugins/mansory/masonry.pkgd.min.js') }}"></script>

	<!-- LOCOMOTIVE JS -->
	<script src="{{ asset('plugins/locomotive/js/locomotive-scroll.min.js') }}"></script>

	<script src="{{ asset('dist/js/showcase/function.min.js') }}"></script>
@endsection
