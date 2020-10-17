<header>
	<div class="header-brand">
		<a href="{{ route('home')}}">
			<img src="{{ asset('dist/img/logo_lg_w.svg') }}" class="web-logo" alt="Logo Pixel Media">
		</a>
	</div>

	{{-- <div class="header-greeting">
		<p class="p-sm" id="headerGreeting">
			Hello, how are you?
		</p>
	</div> --}}

	<div class="header-nav">
		@foreach ($navMenu as $key => $nav)
			<a href="{{ $nav['Link'] }}" class="{{ Request::Segment(2) == $nav['Slug'] ? 'active' : ''}}">
				{{ $nav['Title'] }}
			</a>
		@endforeach

		<div class="dropdown">
			<button class="btn dropdown-toggle" data-toggle="dropdown" type="button">
				<img src="{{ asset('dist/img/lang_vi.png') }}" alt="Image lang vi">
			</button>

			<div class="dropdown-menu dropdown-menu-right">
				<a href="{!! route('user.change-language', ['vi']) !!}" class="dropdown-item">
					<img src="{{ asset('dist/img/lang_vi.png') }}" alt="Image lang vi"> Vietnam
				</a>
				<a href="{!! route('user.change-language', ['en']) !!}" class="dropdown-item">
					<img src="{{ asset('dist/img/lang_en.png') }}" alt="Image lang en"> English
				</a>
			</div>
		</div>
	</div>

	<div class="header-toggle">
		<button class="btn btn-toggle-nav">
			<div class="line"></div>
		</button>
	</div>
</header>
