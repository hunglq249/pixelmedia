@extends('layouts.main')

@section('meta')

@endsection

@section('title')
	Showcase
@endsection

@section('view')
	<div class="showcase">
		<div class="showcase-desc" data-scroll-section>
			<div class="container">
				<div class="row">
					<div class="col-md-4">
						<h3>
							Portfolio
						</h3>
					</div>

					<div class="col-md-8">
						<p>
							Nullam in lorem ut nulla mattis ultricies. Etiam at sem in erat dignissim dictum. Cras feugiat mi magna. Proin auctor blandit massa sit amet rhoncus. Aenean consectetur, mauris id molestie bibendum, purus ex elementum purus, a volutpat leo elit a neque. Aliquam erat volutpat. Etiam ut tellus quis velit rutrum mollis. Cras mollis purus id orci aliquam, vel tincidunt ante efficitur. Pellentesque eget dui est.
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
								All
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
