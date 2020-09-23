<footer data-scroll-section>
	<div class="row">
		<div class="col-md-6 footer-contact">
			<h3>
				Pixel Media is a media
			</h3>

			<address>
				<h5>
					{{ $contactInfo['Address'] }}
				</h5>
				<h5>
					<a href="mailto:{{ $contactInfo['Email'] }}">{{ $contactInfo['Email'] }}</a>
				</h5>
				<h5>
					<a href="tel:{{ $contactInfo['PhoneNumber'] }}">{{ $contactInfo['PhoneNumber'] }}</a>
				</h5>
			</address>
		</div>

		<div class="col-md-6 footer-social">
			<ul>
				@foreach ($contactInfo['Social'] as $key => $contact)
					<li>
						<a href="{{ $contact }}" target="_blank">
							{{ $key }}
						</a>
					</li>
				@endforeach
			</ul>
		</div>
	</div>
</footer>