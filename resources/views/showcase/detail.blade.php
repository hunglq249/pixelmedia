@extends('layouts.main')

@section('meta')

@endsection

@section('title')
	{{ $product['Title'] }}
@endsection

@section('view')
	<div class="showcase-detail">
		<div class="showcase-cover">
			@if ($product['Type'] == 0)
				<div class="mask">
					<img src="{{ $product['Thumb'] }}" alt="Cover of product {{ $product['Title'] }}">
				</div>
			@elseif($product['Type'] == 1)
				
			@endif

			<div class="cover-overlay"></div>
			
			<div class="overlay-hover overlay-prev" data-direction="prev">
				<a href="#" class="btn" role="button">
					<span class="circle">
						<i class="els el-lg el-caret-left"></i>
					</span>

					Previous<br>project
				</a>
			</div>

			<div class="overlay-hover overlay-next" data-direction="next">
				<a href="#" class="btn" role="button">
					Next<br>project
					<span class="circle">
						<i class="els el-lg el-caret-right"></i>
					</span>
				</a>
			</div>

			<div class="cover-prev">
				<div class="mask">
					<img src="https://images.unsplash.com/photo-1602433834445-401f98fa8f73?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=60" alt="">
				</div>
			</div>

			<div class="cover-next">
				<div class="mask">
					<img src="https://images.unsplash.com/photo-1602433834445-401f98fa8f73?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=60" alt="">
				</div>
			</div>
		</div>

		<div class="showcase-info">
			<div class="container">
				<div class="row">
					<div class="col-md-4 info-title">
						<ul class="breadcrumb">
							<li class="breadcrumb-item">
								<a href="{{ route('showcase') }}">
									Showcase
								</a>
							</li>

							<li class="breadcrumb-item active">
								<a href="javascript:void(0)">
									{{ $product['Title'] }}
								</a>
							</li>
						</ul>

						<h3>
							{{ $product['Title'] }}
						</h3>
					</div>
					<div class="col-md-8 info-content">
						<div class="content-desc">
							<p>
								{{ $product['Desc'] }}
							</p>

							<div class="row">
								<div class="col-md-4">
									<div class="group">
										<p>
											Client
										</p>

										<h5>
											{{ $product['Client'] }}
										</h5>
									</div>
								</div>

								<div class="col-md-4">
									<div class="group">
										<p>
											Date
										</p>

										<h5>
											{{ $product['Date'] }}
										</h5>
									</div>
								</div>

								<div class="col-md-4">
									@foreach ($product['TakenBy'] as $item)
										<div class="group">
											<p>
												{{ $item['Position'] }}
											</p>

											<h5>
												{{ $item['Name'] }}
											</h5>
										</div>
									@endforeach
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="showcase-images">
			<div class="container-fluid">
				<div class="list-items">
					<div class="item-sizer"></div>
					@for ($i = 0; $i < 13; $i++)
						<div class="item-image @if($i%3 == 0) item-image-full @elseif($i%3 == 1 || $i%3 == 2) item-image-half @endif">
							<img src="https://images.unsplash.com/photo-1471341971476-ae15ff5dd4ea?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1489&q=80" alt="Image">
						</div>
					@endfor
				</div>
			</div>
		</div>
	</div>
@endsection

@section('css')
	<link rel="stylesheet" href="{{ asset('dist/scss/css/showcase.css') }}">
@endsection

@section('js')
	<!-- IMAGELOADED JS -->
	<script src="{{ asset('plugins/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>

	<!-- MANSORY JS -->
	<script src="{{ asset('plugins/mansory/masonry.pkgd.min.js') }}"></script>

	<script src="{{ asset('dist/js/showcase/detail/function.min.js') }}"></script>
@endsection
