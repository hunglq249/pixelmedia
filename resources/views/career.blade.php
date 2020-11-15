@extends('layouts.main')

@section('meta')

@endsection

@section('title')
	{{ trans('lang.nav_recruitment') }}
@endsection

@section('view')
	<div class="career">
		<div class="career-cover" data-scroll-section>
			<div class="container">
				<div class="row">
					<div class="cover-content col-md-5">
						<h6>
							{{ trans('lang.career_welcome') }}
						</h6>
		
						<h3>
							{{ trans('lang.career_greeting') }}
						</h3>

						<h4>
							{{ trans('lang.career_intro_subtitle') }}
						</h4>

						<p>
							{{ trans('lang.career_intro_content') }}
						</p>

						<a href="#careerJobs" class="link-to-job-list">
							{{ trans('lang.career_btn_view') }}
						</a>
					</div>
					<div class="cover-image col-md-7" data-scroll data-scroll-speed="1">
						<div class="mask">
							<div class="mask-overlay"></div>
	
							<img src="https://images.unsplash.com/photo-1553268882-827ff90c67e2?ixlib=rb-1.2.1&auto=format&fit=crop&w=967&q=80" alt="Career cover">
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="career-jobs" id="careerJobs" data-scroll-section>
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
								{{ trans('lang.career_btn_view') }}
							</a>

							<a href="#" onclick="callPopup(event, {{ $job['id'] }})">
								{{ trans('lang.career_btn_apply') }}
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
	<!-- LOCOMOTIVE CSS -->
	<link rel="stylesheet" href="{{ asset('plugins/locomotive/css/locomotive-scroll.min.css') }}">
	
	<link rel="stylesheet" href="{{ asset('dist/scss/css/career.css') }}">
@endsection

@section('js')
	<script>
		let numOfJobs = '{{ count($jobs) }}';
	</script>

	<!-- LOCOMOTIVE JS -->
	<script src="{{ asset('plugins/locomotive/js/locomotive-scroll.min.js') }}"></script>
	
	<script src="{{ asset('dist/js/career/function.min.js') }}"></script>
@endsection
