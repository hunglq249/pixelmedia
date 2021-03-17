@extends('layouts.main')

@section('meta')

@endsection

@section('title')
	{{ $article['title'] }}
@endsection

@section('view')
	<div class="article-detail">
		<div class="container-fluid">
			<div class="article-breadcrumb">
				<ul class="breadcrumb">
					<li class="breadcrumb-item">
						<a href="{{ route('article') }}">
							{{ trans('lang.nav_articles') }}
						</a>
					</li>

					<li class="breadcrumb-item">
						<a href="{{ route('article_by_category', ['id' => $article['category_id']]) }}">
							{{ $types[$article['category_id']] }}
						</a>
					</li>

					<li class="breadcrumb-item active">
						<a href="javascript:void(0)">
							{{ $article['title'] }}
						</a>
					</li>
				</ul>
			</div>

			<div class="article-title">
				<h3>
					{{ $article['title'] }}
				</h3>
			</div>

			<div class="article-date">
				<h6>
					{{ $article['created_at'] }}
				</h6>
			</div>

			@if (isset($article['description']) && $article['description'] != '')
				<div class="article-desc">
					<h4>
						{{ $article['description'] }}
					</h4>
				</div>
			@endif

			<div class="article-content">
				{!! $article['content'] !!}
			</div>

			<div class="article-share">
				<div class="btn-wrapper">
					<button class="btn" type="button">
						<i class="fas fa-lg fa-share-alt"></i>
					</button>
	
					<div class="btn-list">
						<div class="btn btn-default btn-share" id="btnFbShare" data-href="{{ url()->full() }}" type="button">
							<i class="fab fa-lg fa-facebook"></i>
						</div>
	
						<div class="btn btn-default btn-share" id="btnTwShare" data-href="{{ url()->full() }}" type="button">
							<i class="fab fa-lg fa-twitter"></i>
						</div>
					</div>
				</div>
			</div>

			<div class="article-related">
				<div class="related-header">
					<h5>
						{{ trans('lang.articles_related') }}
					</h5>
				</div>
				<div class="related-body">
					<div class="swiper-container" id="swiperRelated">
						<div class="swiper-wrapper">
							@if (count($relateds) > 0)
								@foreach ($relateds as $key => $related)
									<div class="swiper-slide">
										<a href="{{ route('article_detail', ['slug' => $related['slug']] )}}">
											<div class="mask">
												<div class="mask-overlay"></div>
												<img src="{{ asset('storage/app'. $related['image']) }}" alt="Image related">
											</div>
	
											<div class="item-content offset">
												<h6 class="subtitle-md">
													{{ $types[$article['category_id']] }}
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
					{{-- <div class="container-fluid">
						<div class="row">
							@if (count($relateds) > 0)
								@foreach ($relateds as $key => $related)
									<div class="item-related col-md-4">
										<a href="{{ route('article_detail', ['slug' => $related['slug']] )}}">
											<div class="mask">
												<div class="mask-overlay"></div>
												<img src="{{ asset('storage/app'. $related['image']) }}" alt="Image related">
											</div>
	
											<div class="item-content offset">
												<h6 class="subtitle-md">
													{{ $types[$article['category_id']] }}
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
					</div> --}}
				</div>
			</div>
		</div>
	</div>
@endsection

@section('css')
	<!-- SWIPER CSS -->
	<link rel="stylesheet" href="{{ asset('plugins/swiper/css/swiper-bundle.min.css') }}">

	<link rel="stylesheet" href="{{ asset('dist/scss/css/article.css') }}">
@endsection

@section('js')
	<!-- SWIPER JS -->
	<script src="{{ asset('plugins/swiper/js/swiper-bundle.min.js') }}"></script>

	<script src="{{ asset('dist/js/article/detail/function.min.js') }}"></script>
@endsection
