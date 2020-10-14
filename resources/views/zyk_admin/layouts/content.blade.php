<!doctype html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		@yield('meta')

		<!-- ZAYEKI CSS -->
		<link rel="stylesheet" href="{{ asset('plugins/zayeki/css/zayeki.min.css') }}">

		<!-- ADMIN CSS -->
		<link rel="stylesheet" href="{{ asset('zyk_admin/scss/css/style.min.css') }}">

		@yield('css')

		<link rel="shortcut icon" href="{{ asset('dist/img/favicon.ico') }}" type="image/x-icon">
		<link rel="icon" href="{{ asset("dist/img/favicon.ico") }}" type="image/x-icon">
		
		<title>
			@yield('title')
		</title>
	</head>
	<body>
		<div class="page">
			<div class="page-navside">
				@include('zyk_admin.layouts.content_navside')
			</div>

			<div class="page-content">
				<div class="page-header">
					@include('zyk_admin.layouts.content_header')
				</div>

				<div class="page-view">
					@yield('view')
				</div>
			</div>
		</div>

		<!--jQUERY JS -->
		<script src="{{ asset('plugins/jquery/jquery-3.4.1.min.js') }}"></script>

		<!--POPPER JS -->
		<script src="https://unpkg.com/@popperjs/core@2"></script>

		<!--ZAYEKI JS -->
		<script src="{{ asset('plugins/zayeki/js/common.js') }}"></script>
		<script src="{{ asset('plugins/zayeki/js/utils.js') }}"></script>
		<script src="{{ asset('plugins/zayeki/js/zayeki.js') }}"></script>

		<!-- ADMIN COMMMON JS -->
		<script src="{{ asset('zyk_admin/js/admin/common.js') }}"></script>
		
		@yield('js')
	</body>
</html>