@extends('layouts.main')

@section('meta')
	
@endsection

@section('title')
	Articles
@endsection

@section('view')
	<div class="article-detail">
		<div class="container">
			<div class="article-breadcrumb">
				<ul class="breadcrumb">
					<li class="breadcrumb-item">
						<a href="{{ route('article') }}">
							Articles
						</a>
					</li>

					<li class="breadcrumb-item">
						<a href="{{ route('article_by_category', ['id' => $article['CategoryId']]) }}">
							{{ $article['CategoryId'] }}
						</a>
					</li>

					<li class="breadcrumb-item active">
						<a href="javascript:void(0)">
							{{ $article['Title'] }}
						</a>
					</li>
				</ul>
			</div>

			<div class="article-title">
				<h3>
					{{ $article['Title'] }}
				</h3>
			</div>

			<div class="article-date">
				<h6>
					{{ $article['CreatedAt'] }}
				</h6>
			</div>

			@if (isset($article['Desc']) && $article['Desc'] != '')
				<div class="article-desc">
					<h4>
						{{ $article['Desc'] }}
					</h4>
				</div>
			@endif

			<div class="article-content">
				<p>
					Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam dapibus leo blandit, suscipit velit vel, vestibulum neque. Suspendisse potenti. Nam ut nulla sed sapien consectetur lobortis non sit amet erat. Maecenas vestibulum augue vitae mi viverra consectetur. Donec condimentum facilisis eros. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Sed quis magna lectus. Sed scelerisque pulvinar pellentesque. Maecenas pulvinar, urna at malesuada auctor, ex lectus finibus elit, sit amet euismod libero quam quis nibh. Nunc venenatis sit amet magna ac vehicula. Nullam nec odio ipsum. Nam rutrum bibendum odio ac molestie.
				</p>

				<p>
					Etiam nulla nulla, vestibulum in lorem interdum, finibus vestibulum lacus. Fusce pretium leo nec orci malesuada, a fringilla mi tincidunt. Ut faucibus aliquam sem, vel auctor metus dictum non. Cras vel est imperdiet, euismod justo quis, luctus eros. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean tempor ex non egestas bibendum. Pellentesque vel malesuada ex. Maecenas gravida elit mollis semper pellentesque. Nam a libero quis sem maximus laoreet. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.
				</p>
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