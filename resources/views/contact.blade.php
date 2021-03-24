@extends('layouts.main')

@section('meta')

@endsection

@section('title')
	{{ trans('lang.nav_contact') }}
@endsection

@section('view')
	<div class="contact">
		<div class="container-fluid">
			<div class="section section-heading" data-scroll-section>
				<div class="row">
					<div class="col-md-3"></div>
					<div class="col-md-9">
						<h2 data-scroll data-scroll-speed="2">
							{{ trans('lang.contact_title') }}
						</h2>
					</div>
				</div>
			</div>

			<div class="section section-map" data-scroll-section>
				<div class="row">
					<div class="col-md-3"></div>
					<div class="col-md-9">
						<div class="map" id="map"></div>
					</div>
				</div>
			</div>

			<div class="section section-message" data-scroll-section>
				<div class="row">
					<div class="col-md-3 meassage-heading">
						<h3>
							{{ trans('lang.nav_about') }}
						</h3>
					</div>
					<div class="col-md-9 meassage-form">
                        <form action="{{ route('contact.sendEmail') }}" method="POST" autocomplete="off">
                            @csrf
							<div class="row">
								<div class="form-group col-md-12">
									<input type="text" class="form-control" name="Name" placeholder="{{ trans('lang.form_name') }}">
								</div>
								<div class="form-group col-md-6">
									<input type="email" class="form-control" name="Email" placeholder="{{ trans('lang.form_email') }}">
								</div>
								<div class="form-group col-md-6">
									<input type="text" class="form-control" name="PhoneNumer" placeholder="{{ trans('lang.form_phone') }}">
								</div>
								<div class="form-group col-md-12">
									<textarea class="form-control" name="Message" rows="7" placeholder="{{ trans('lang.form_message') }}"></textarea>
								</div>

								<div class="form-group col-md-12">
									<button class="btn btn-primary" type="submit">
										{{ trans('lang.form_submit') }}
									</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>

			<div class="section section-address" data-scroll-section>
				<div class="row">
					<div class="col-md-3 text-heading">
						<h3>
							{{ trans('lang.nav_contact') }}
						</h3>
					</div>
					<div class="col-md-9 text-form">
						<div class="row">
							<div class="col">
								<p>
									{{ trans('lang.contact_address') }}
								</p>
								<h6>
									{{ $contactInfo['Address'] }}
								</h6>
							</div>

							<div class="col">
								<p>
									Email
								</p>
								<h6>
									{{ $contactInfo['Email'] }}
								</h6>
							</div>

							<div class="col">
								<p>
									{{ trans('lang.contact_phone') }}
								</p>
								@foreach ($contactInfo['PhoneNumber'] as $person => $number)
									<h6>
										{{ $number }} ({{ $person }})
									</h6>
								@endforeach
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('css')
	<!-- LOCOMOTIVE CSS -->
	<link rel="stylesheet" href="{{ asset('plugins/locomotive/css/locomotive-scroll.min.css') }}">

	<link rel="stylesheet" href="{{ asset('dist/scss/css/contact.css') }}">
@endsection

@section('js')
	<!-- LOCOMOTIVE JS -->
	<script src="{{ asset('plugins/locomotive/js/locomotive-scroll.min.js') }}"></script>

	<script src="{{ asset('dist/js/contact/function.min.js') }}"></script>

	<!-- INIT GOOGLE MAP -->
	<script defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDoBEM4VvMs7EHN5ljlJVnpK8bA1M0jwJI&callback=initMap"></script>
@endsection
