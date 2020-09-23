<header>
	<div class="header-brand">
		<a href="{{ route('home')}}">
			Pixel
			<br>
			Media
		</a>
	</div>

	<div class="header-greeting">
		<p class="p-sm" id="headerGreeting">
			Hello, how are you?
		</p>
	</div>

	<div class="header-toggle">
		<button class="btn btn-toggle-nav">
			<div class="line"></div>
		</button>
	</div>

	<div class="header-nav">
		@foreach ($navMenu as $key => $nav)
			<a href="{{ $nav['Link'] }}">
				{{ $nav['Title'] }}
			</a>
		@endforeach
	</div>
</header>