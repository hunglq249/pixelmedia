@extends('layouts.main')

@section('meta')

@endsection

@section('title')
	{{ $article['title'] }}
@endsection

@section('view')
	<div class="article-detail">
		<div class="container">
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
