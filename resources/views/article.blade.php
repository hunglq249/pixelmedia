@extends('layouts.main')

@section('meta')

@endsection

@section('title')
	{{ trans('lang.nav_articles') }}
@endsection

@section('view')
	<div class="article">
		<div class="article-cover" data-scroll-section>
			<div class="swiper-container" id="swiperArticle">
				<div class="swiper-wrapper">
					<div class="swiper-slide">
						<div class="mask">
							<img src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=60" alt="Image thumb of all category">
						</div>
					</div>

					@foreach ($articleTypes as $type)
						<div class="swiper-slide">
							<div class="mask">
								<img src="{{ asset('storage/app'. $type['image']) }}" alt="Image thumb of {{ $type['title'] }}">
							</div>
						</div>
					@endforeach
				</div>

				<div class="article-nav">
					<div class="container">
						<div class="nav">
							<a href="#" class="active" data-type="*">
								{{ trans('lang.showcase_all') }}
							</a>
	
							@foreach ($articleTypes as $key => $articleType)
								<a href="#" data-type="{{ $key }}">
									{{ $articleType['title'] }}
								</a>
							@endforeach
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="container" data-scroll-section>
			<div class="article-posts">
				<div class="post-sizer"></div>

				@foreach ($articles as $key => $article)
					<div class="post post-{{ $article['category_id'] }}" data-scroll data-scroll-speed="{{ rand(1, 3) }}">
						<a href="{{ route('article_detail', ['slug' => $article['slug']]) }}">
							@if(isset($article['image']) && $article['image'] != '')
								<img src="{{ asset('storage/app'. $article['image']) }}" alt="Image of article {{ $article['title'] }}">
							@else
								<div class="blank-image"></div>
							@endif

							<div class="post-content">
								<h6 class="subtitle-md">
									{{ $articleCategorieArr[$article['category_id']] }}
								</h6>
								
								<h4>
									{{ str_limit($article['title'], 70, '...') }}
								</h4>

								@if(isset($article['description']) && $article['description'] != '')
									<p>
										{{ str_limit($article['description'], 120, '...') }}
									</p>
								@endif

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
@endsection

@section('css')
	<!-- LOCOMOTIVE CSS -->
	<link rel="stylesheet" href="{{ asset('plugins/locomotive/css/locomotive-scroll.min.css') }}">

	<!-- SWIPER CSS -->
	<link rel="stylesheet" href="{{ asset('plugins/swiper/css/swiper-bundle.min.css') }}">

	<link rel="stylesheet" href="{{ asset('dist/scss/css/article.css') }}">
@endsection

@section('js')
	<!-- IMAGELOADED JS -->
	<script src="{{ asset('plugins/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>

	<!-- ISOTOPE JS -->
	<script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.js"></script>

	<!-- LOCOMOTIVE JS -->
	<script src="{{ asset('plugins/locomotive/js/locomotive-scroll.min.js') }}"></script>

	<!-- SWIPER JS -->
	<script src="{{ asset('plugins/swiper/js/swiper-bundle.min.js') }}"></script>

	<script src="{{ asset('dist/js/article/function.min.js') }}"></script>
@endsection
