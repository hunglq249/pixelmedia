@extends('layouts.blank')

@section('title')
	Pixel Media | Page under construction
@endsection

@section('view')
	<div class="view-countdown">
		<div class="play-video-wrapper">
			<div class="play-video"></div>

			<div class="play-video-overlay">

			</div>
		</div>

		<h4>
			This page is under construction
		</h4>

		<div class="timer">
			<div class="row">
				<div class="col">
					<h6>
						Day(s)
					</h6>
					<h3 id="timerDay">0</h3>
				</div>
				<div class="col">
					<h6>
						Hour(s)
					</h6>
					<h3 id="timerHour">0</h3>
				</div>
				<div class="col">
					<h6>
						Minute(s)
					</h6>
					<h3 id="timerMin">0</h3>
				</div>
				<div class="col">
					<h6>
						Second(s)
					</h6>
					<h3 id="timerSec">0</h3>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('css')
	<link rel="stylesheet" href="{{ asset('dist/scss/css/countdown.css') }}">
@endsection

@section('js')
	<!-- YOUTUBE BACKGROUND -->
    <script src="{{ asset('plugins/youtube-background/src/jquery.youtubebackground.min.js') }}"></script>

	<script src="{{ asset('dist/js/countdown/function.js') }}"></script>
@endsection