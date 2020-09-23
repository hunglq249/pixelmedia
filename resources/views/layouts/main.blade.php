<!doctype html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="author" content="Pixel Media">
		<meta name="csrf-token" content="{{ csrf_token() }}">
		
		@yield('meta')

		<!-- FONTAWESOME CSS -->
		<link rel="stylesheet" href="{{ asset('plugins/fa/css/brands.min.css')}}">

		<!-- ZAYEKI CSS -->
		<link rel="stylesheet" href="{{ asset('plugins/zayeki/css/zayeki.min.css')}}">
		@yield('css')

		<link rel="shortcut icon" href="{{ asset('dist/img/favicon.ico') }}" type="image/x-icon">
    	<link rel="icon" href="{{ asset("dist/img/favicon.ico") }}" type="image/x-icon">

		<title>@yield('title')</title>
	</head>
	<body class="theme-dark" data-scroll-container>
		@include('layouts._header')
		
		@yield('view')

		@include('layouts._footer')
		
		<!-- JQUERY JS -->
		<script src="{{ asset('plugins/jquery/jquery-3.4.1.min.js')}}"></script>

		<!-- POPPER JS -->
		<script src="https://unpkg.com/@popperjs/core@2"></script>

		<!-- ZAYEKI JS-->
		<script src="{{ asset('plugins/zayeki/js/zayeki.js')}}"></script>
		<!-- ZAYEKI UTILS JS-->
		<script src="{{ asset('plugins/zayeki/js/utils.js')}}"></script>

		<!-- COMMON JS-->
		<script src="{{ asset('dist/js/common.js')}}"></script>

		@yield('js')
	</body>
</html>