<!doctype html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		@yield('meta')

		<!-- ZAYEKI CSS -->
		<link rel="stylesheet" href="{{ asset('assets/plugins/zayeki/css/zayeki.min.css') }}">

		@yield('css')

		<title>
			@yield('title')
		</title>
	</head>
	<body>
		<div class="page">
			
		</div>

		<!--jQUERY JS -->
		<script src="{{ asset('assets/plugins/jquery/jquery-3.4.1.min.js') }}"></script>

		<!--POPPER JS -->
		<script src="https://unpkg.com/@popperjs/core@2"></script>

		<!--ZAYEKI JS -->
		<script src="{{ asset('assets/plugins/zayeki/js/common.js') }}"></script>
		<script src="{{ asset('assets/plugins/zayeki/js/utils.js') }}"></script>
		<script src="{{ asset('assets/plugins/zayeki/js/zayeki.js') }}"></script>
		
		@yield('js')
	</body>
</html>