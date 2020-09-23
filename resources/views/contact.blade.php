@extends('layouts.main')

@section('meta')
	
@endsection

@section('title')
	Contact us
@endsection

@section('view')
	<div class="contact">
		<div class="container">
			<div class="section section-heading" data-scroll-section>
				<div class="row">
					<div class="col-md-3"></div>
					<div class="col-md-9">
						<h2 data-scroll data-scroll-speed="2">
							Keep it touch
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
						<h5>
							About us
						</h5>
					</div>
					<div class="col-md-9 meassage-form">
						<form action="" autocomplete="off">
							<div class="row">
								<div class="form-group col-md-12">
									<input type="text" class="form-control" name="Name" placeholder="Name">
								</div>
								<div class="form-group col-md-6">
									<input type="email" class="form-control" name="Email" placeholder="Email">
								</div>
								<div class="form-group col-md-6">
									<input type="text" class="form-control" name="PhoneNumer" placeholder="Phone number">
								</div>
								<div class="form-group col-md-12">
									<textarea class="form-control" name="Message" rows="7" placeholder="Write something..."></textarea>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>

			<div class="section section-address" data-scroll-section>
				<div class="row">
					<div class="col-md-3 text-heading">
						<h5>
							Contact us
						</h5>
					</div>
					<div class="col-md-9 text-form">
						<div class="row">
							<div class="col">
								<p>
									Address
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
									Phone number
								</p>
								<h6>
									{{ $contactInfo['PhoneNumber'] }}
								</h6>
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
@endsection