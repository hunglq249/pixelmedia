<footer data-scroll-section>
	<div class="row">
		<div class="col-md-6 footer-contact">
			<h3>
				Pixel Media is a media
			</h3>

			<address>
				<h5>
					<i class="elo el-lg el-home"></i> {{ $contactInfo['Address'] }}
				</h5>
				<h5>
					<i class="elo el-lg el-envelope"></i> <a href="mailto:{{ $contactInfo['Email'] }}">{{ $contactInfo['Email'] }}</a>
				</h5>
				<h5>
					<i class="elo el-lg el-phone"></i> <a href="tel:{{ $contactInfo['PhoneNumber'] }}">{{ $contactInfo['PhoneNumber'] }}</a>
				</h5>
			</address>
		</div>

		<div class="col-md-6 footer-social">
			<div class="social-network">
				<h6>
					Follow us	
				</h6>
				
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

					<a href="{{ $contact }}" target="_blank">
						<i class="fab {{ $icon }}"></i>
					</a>
				@endforeach
			</div>

			<div class="social-logo">
				<a href="{{ route('home')}}">
					<img src="{{ asset('dist/img/logo.svg') }}" alt="Logo Pixel Media">
				</a>
			</div>
		</div>
	</div>
</footer>