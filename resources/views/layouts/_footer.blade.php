<footer data-scroll-section>
	<div class="row">
		<div class="col-md-6 footer-contact">
			<h4>
				{{ trans('lang.footer_desc') }}
			</h4>

			<address>
				<h5>
					<i class="elo el-lg el-home"></i> {{ $contactInfo['Address'] }}
				</h5>
				<h5>
					<i class="elo el-lg el-envelope"></i> <a href="mailto:{{ $contactInfo['Email'] }}">{{ $contactInfo['Email'] }}</a>
				</h5>
				
				@foreach ($contactInfo['PhoneNumber'] as $person => $number)
					<h5>
						<i class="elo el-lg el-phone"></i> <a href="tel:{{ $number }}">{{ $number }} ({{ $person }})</a>
					</h5>
				@endforeach
			</address>
		</div>

		<div class="col-md-6 footer-social">
			<div class="social-network">
				<h5>
					{{ trans('lang.footer_follow') }}
				</h5>
				
				@foreach ($contactInfo['Social'] as $key => $contact)
					@php
						$icon = '';
						
						if ($key == 'Facebook') {
							$icon = 'fa-facebook-f';
						} elseif ($key == 'Behance') {
							$icon = 'fa-behance';
						} elseif ($key == 'Youtube') {
							$icon = 'fa-youtube';
						} elseif ($key == 'Instagram') {
							$icon = 'fa-instagram';
						}
					@endphp

					@if($contact != null)
						<a href="{{ $contact }}" target="_blank">
							<i class="fab {{ $icon }}"></i>
						</a>
					@endif
				@endforeach
			</div>

			<div class="social-logo">
				<a href="{{ route('home')}}">
					<img src="{{ asset('dist/img/logo_footer.svg') }}" alt="Logo Pixel Media">
				</a>
			</div>
		</div>
	</div>
</footer>