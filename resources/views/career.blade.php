@extends('layouts.main')

@section('meta')

@endsection

@section('title')
	Career
@endsection

@section('view')
	<div class="career">
		<div class="career-cover" style="background-image: url('https://images.unsplash.com/photo-1553268882-827ff90c67e2?ixlib=rb-1.2.1&auto=format&fit=crop&w=967&q=80')">
			<div class="career-overlay">
				<h5>
					Welcome to
				</h5>

				<h2>
					Pixel Media Career
				</h2>

				<div class="career-select">
					<select class="form-control" id="selectJob">
						@foreach ($jobs as $job)
							<option value="{{ $job['id'] }}">
								{{ $job['title'] }}
							</option>
						@endforeach
					</select>

					<a href="#" class="btn btn-outline-dark" role="button">
						View Experience
					</a>
				</div>
			</div>
		</div>

		<div class="career-jobs">
			@foreach ($jobs as $job)
				<div class="row row-no-gutters job" id="job{{ $job['id'] }}">
					<div class="col-md-6 job-cover">
						<div class="mask">
							<img src="{{ asset('storage/app'. $job['image']) }}" alt="Cover of job {{ $job['title'] }}">
						</div>
					</div>

					<div class="col-md-6 job-content">
						<div class="job-content-wrapper">
							<h4>
								{{ $job['title'] }}
							</h4>

							<p>
								{{ $job['description'] }}
							</p>

							<a href="#" onclick="callPopup(event, {{ $job['id'] }}, false)">
								See detail
							</a>

							<a href="#" onclick="callPopup(event, {{ $job['id'] }})">
								Apply now
							</a>
						</div>
					</div>
				</div>
			@endforeach
		</div>

		@include('career._popup')
	</div>
@endsection

@section('css')
	<link rel="stylesheet" href="{{ asset('dist/scss/css/career.css') }}">
@endsection

@section('js')
	<script src="{{ asset('dist/js/career/function.min.js') }}"></script>
@endsection
