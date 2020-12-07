@extends('layouts.main')

@section('meta')

@endsection

@section('title')
	{{ $product['title'] }}
@endsection

@section('view')
	<div class="showcase-detail">
		<div class="showcase-cover">
			@if ($product['Type'] == 0)
				<div class="mask">
					<img src="{{ asset('storage/app'. $product['cover_mask']) }}" alt="Cover of product {{ $product['title'] }}">
				</div>
			@elseif($product['Type'] == 1)

			@endif

			<div class="cover-overlay"></div>

            @if ($previous)
                <div class="overlay-hover overlay-prev" data-direction="prev">
                    <a href="{{ route('showcase_detail', ['slug' => $previous->slug] )}}" class="btn" role="button">
                        <span class="circle">
                            <i class="els el-lg el-caret-left"></i>
                        </span>
                        {{ trans('lang.showcase_previous') }}
                    </a>
                </div>
            @endif

            @if ($next)
				<div class="overlay-hover overlay-next" data-direction="next">
					<a href="{{ route('showcase_detail', ['slug' => $next->slug] )}}" class="btn" role="button">
						{{ trans('lang.showcase_next') }}
						<span class="circle">
							<i class="els el-lg el-caret-right"></i>
						</span>
					</a>
				</div>
            @endif

            @if ($previous)
                <div class="cover-prev">
                    <div class="mask">
                        <img src="{{ asset('storage/app'. $previous['cover_mask']) }}" alt="">
                    </div>
                </div>
            @endif
            @if ($next)
                <div class="cover-next">
                    <div class="mask">
                        <img src="{{ asset('storage/app'. $next['cover_mask']) }}" alt="">
                    </div>
                </div>
            @endif
		</div>

		<div class="showcase-info">
			<div class="container">
				<div class="info-title">
					<ul class="breadcrumb">
						<li class="breadcrumb-item">
							<a href="{{ route('showcase') }}">
								{{ trans('lang.nav_showcase') }}
							</a>
						</li>

						<li class="breadcrumb-item active">
							<a href="javascript:void(0)">
								{{ $product['title'] }}
							</a>
						</li>
					</ul>

					<h3>
						{{ $product['title'] }}
					</h3>

					<p>
						{{ $product['description'] }}
					</p>

					<div class="group">
						<p>
							{{ trans('lang.showcase_client') }}
						</p>

						<h5>
							{{ $product['client'] }}
						</h5>
					</div>

					<div class="group">
						<p>
							{{ trans('lang.showcase_date') }}
						</p>

						<h5>
							{{ $product['date'] }}
						</h5>
					</div>

					@foreach ($product['teams'] as $item)
						<div class="group">
							<p>
								{{ $item['position'] }}
							</p>

							<h5>
								{{ $item['name'] }}
							</h5>
						</div>
					@endforeach
				</div>
			</div>
		</div>

		<div class="showcase-images">
			<div class="container-fluid">
				<div>
                    {!! $product['content'] !!}
				</div>
				
				<div class="list-items">
					<div class="item-sizer"></div>
					
					@foreach ($product->images as $key => $item)
						@php
							$additionalClass = 'item-image';
							$limit = floor(count($product->images) / 7);

							for($i = 0; $i < $limit; $i++){
								if($key - $i * 7 == 1 || $key - $i * 7 == 2){
									$additionalClass = 'item-image-2';
								} elseif ($key - $i * 7 == 3 || $key - $i * 7 == 4 || $key - $i * 7 == 6 || $key - $i * 7 == 7) {
									$additionalClass = 'item-image-1';
								} elseif ($key - $i * 7 == 5) {
									$additionalClass = 'item-image-2-plus';
								}
							}
						@endphp

						<div class="wow slideInUp item-image {{ $additionalClass }}">
							<a href="#" class="open-image">
								<img src="{{ asset('storage/app'. $item) }}" alt="Image">
							</a>
                        </div>
                    @endforeach
                </div>
			</div>
		</div>

		@include('showcase._popup')
	</div>
@endsection

@section('css')
	<!-- SWIPER CSS -->
	<link rel="stylesheet" href="{{ asset('plugins/swiper/css/swiper-bundle.min.css') }}">
	
	<!-- ANIMATE CSS -->
	<link rel="stylesheet" href="{{ asset('plugins/animate/animate.css') }}">

	<link rel="stylesheet" href="{{ asset('dist/scss/css/showcase.css') }}">
@endsection

@section('js')
	<!-- WOW JS -->
	<script src="{{ asset('plugins/wow/wow.min.js') }}"></script>

	<!-- IMAGELOADED JS -->
	<script src="{{ asset('plugins/imagesLoaded/imagesloaded.pkgd.min.js') }}"></script>

	<!-- SWIPER JS -->
	<script src="{{ asset('plugins/swiper/js/swiper-bundle.min.js') }}"></script>

	<!-- MANSORY JS -->
	<script src="{{ asset('plugins/mansory/masonry.pkgd.min.js') }}"></script>

	<script>
		let imageArr = [];
		@foreach ($product->images as $key => $item)
			imageArr.push('{{ asset('storage/app'. $item) }}')
		@endforeach
	</script>

	<script src="{{ asset('dist/js/showcase/detail/function.min.js') }}"></script>
@endsection
