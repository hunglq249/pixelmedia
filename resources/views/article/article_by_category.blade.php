@extends('layouts.main')

@section('meta')

@endsection

@section('title')
	Articles
@endsection

@section('view')
	<div class="article">
		<div class="container">
			<div class="article-title" data-scroll-section>
				<h3>
					Articles
				</h3>
			</div>

			<div class="article-nav" data-scroll-section>
				<div class="article-nav-wrapper">
					<div class="swiper-container" id="swiperArticleNav">
						<div class="swiper-wrapper">
							<div class="swiper-slide">
								<a href="{{ route('article_by_category') }}">
									<div class="mask">
										<img src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=60" alt="Image thumb of all category">

										<div class="overlay">
											<h5>
												All articles
											</h5>
										</div>
									</div>
								</a>
							</div>

							@foreach ($articleTypes as $type)
								<div class="swiper-slide">
									<a href="{{ route('article_by_category', ['id' => $type['id']]) }}">
										<div class="mask">
											<img src="{{ asset('storage/app'. $type['image']) }}" alt="Image thumb of {{ $type['title'] }}">

											<div class="overlay">
												<h5>
													{{ $type['title'] }}
												</h5>
											</div>
										</div>
									</a>
								</div>
							@endforeach
						</div>
					</div>
				</div>
			</div>

			<div class="article-posts" data-scroll-section>
				<div class="post-sizer"></div>

				@foreach ($articles as $key => $article)
					<div class="post" data-scroll data-scroll-speed="{{ rand(1, 3) }}">
						<div class="card">
							<div class="card-body">
								@if(isset($article['image']) && $article['image'] != '')
									<img src="{{ asset('storage/app'. $article['image']) }}" alt="Image of article {{ $article['title'] }}">
								@endif

								<h6>
									{{ $article['id'] }}
								</h6>

								<a href="#">
									<h4>
										{{ $article['title'] }}
									</h4>
								</a>

								@if(isset($article['description']) && $article['description'] != '')
									<p>
										{{ $article['description'] }}
									</p>
								@endif

								<a href="#" class="btn btn-sm" role="button">
									See detail
								</a>
							</div>
						</div>
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

	<!-- MANSORY JS -->
	<script src="{{ asset('plugins/mansory/masonry.pkgd.min.js') }}"></script>

	<!-- LOCOMOTIVE JS -->
	<script src="{{ asset('plugins/locomotive/js/locomotive-scroll.min.js') }}"></script>

	<!-- SWIPER JS -->
	<script src="{{ asset('plugins/swiper/js/swiper-bundle.min.js') }}"></script>

	<script src="{{ asset('dist/js/article/function.min.js') }}"></script>
@endsection
