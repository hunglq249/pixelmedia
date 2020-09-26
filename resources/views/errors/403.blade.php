@extends('layouts.blank')

@section('title')
	Page not found
@endsection

@section('view')
	<div class="view-error">
		<h1>
			403
		</h1>

		<h4>
			Fobidden Error!
		</h4>

		<a href="{{ route('home') }}" class="btn btn-outline-dark">
			Return home
		</a>
	</div>
@endsection

@section('css')
	<link rel="stylesheet" href="{{ asset('dist/scss/css/errors.css') }}">
@endsection