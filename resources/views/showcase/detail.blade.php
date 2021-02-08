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

						<li class="breadcrumb-item">
							<a href="javascript:void(0)">
								{{ $product['product_category'] }}
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
				
				<div class="list-items row row-no-gutters">
					@foreach ($product->images as $key => $item)
						@php
							$addtionalClass = '';
							$limit = ceil(count($product->images) / 6);

							for($i = 0; $i < $limit; $i++){
								if($key - $i * 6 == 0){
									$addtionalClass = 'col-md-12';
								} elseif ($key - $i * 6 == 1 || $key - $i * 6 == 2) {
									$addtionalClass = 'col-md-6';
								} elseif ($key - $i * 6 == 3 || $key - $i * 6 == 4 || $key - $i * 6 == 5) {
									$addtionalClass = 'col-md-4';
								}
							}
						@endphp

						<div class="wow slideInUp item-image {{ $addtionalClass }}">
							<a href="#" class="open-image">
								<img src="{{ asset('storage/app'. $item) }}" alt="Image">
							</a>
                        </div>
                    @endforeach
                </div>
			</div>
		</div>

		{{-- <div class="showcase-share">
			<div class="btn-wrapper">
				<button class="btn" type="button">
					<i class="elo el-lg el-share"></i>
				</button>
			</div>
		</div> --}}

		<div class="showcase-related">
			<div class="related-header">
				<h5>
					{{ trans('lang.showcase_related') }}
				</h5>
			</div>
			<div class="related-body">
				<div class="container-fluid">
					<div class="row">
						@if (count($relateds) > 0)
							@foreach ($relateds as $key => $related)
								<div class="item-related col-md-4">
									<a href="{{ route('showcase_detail', ['slug' => $related['slug']] )}}">
										<div class="mask">
											<div class="mask-overlay"></div>
											<img src="{{ asset('storage/app'. $related['cover_mask']) }}" alt="Image related">
										</div>

										<div class="item-content offset">
											<h6 class="subtitle-md">
												{{ $product['product_category'] }}
											</h6>

											<h4>
												{{ $related['title'] }}
											</h4>

											<h6 class="subtitle-sm">
												{{ trans('lang.articles_see_detail') }}
											</h6>
										</div>
									</a>
								</div>
							@endforeach
						@endif
					</div>
				</div>
			</div>
		</div>

		<div class="showcase-detail-nav">
			@if ($previous)
				<a href="{{ route('showcase_detail', ['slug' => $previous->slug] )}}" class="btn btn-control-showcase" role="button">
					<span class="circle">
						<i class="els el-lg el-caret-left"></i>
					</span>
					{{ trans('lang.showcase_previous') }}
				</a>
			@else
				<div></div>
			@endif

			<a href="#" class="btn btn-top" id="btnTop">
				<span class="circle">
					<i class="elo el-lg el-caret-up"></i>
				</span>
				{{ trans('lang.showcase_top') }}
			</a>

			@if ($next)
				<a href="{{ route('showcase_detail', ['slug' => $next->slug] )}}" class="btn btn-control-showcase" role="button">
					{{ trans('lang.showcase_next') }}
					<span class="circle">
						<i class="els el-lg el-caret-right"></i>
					</span>
				</a>
			@else
				<div></div>
			@endif
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

	<script src="{{ asset('dist/js/showcase/detail/function.min.js') }}"></script>
@endsection
