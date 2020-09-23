<div class="row row-no-gutters job-detail">
	<div class="col-md-6 job-detail-cover">
		<div class="mask">
			<img src="{{ $job['Thumb'] }}" alt="Image cover of {{ $job['Title'] }}">
		</div>
	</div>
	<div class="col-md-6 job-detail-content">
		<div class="area-close">
			<button class="btn" data-dismiss="popup" type="button">
				<i class="elo el-2x el-close"></i>
			</button>
		</div>

		<div class="job-wrapper">
			<div class="job-content">
				<div class="content-header">
					<h3>{{ $job['Title'] }}</h3>
	
					<p>{{ $job['Desc'] }}</p>
				</div>
	
				<div class="content-body">
					@foreach ($job['Detail'] as $detail)
						<div class="detail-group">
							<h5>
								{{ $detail['Heading'] }}
							</h5>
		
							<p>
								{{ $detail['Content'] }}
							</p>
						</div>
					@endforeach
				</div>
			</div>

			<div class="job-apply">
				<div class="apply-header">
					<h3>Apply now</h3>
				</div>
	
				<div class="apply-body">
					<form action="">
						@csrf
						<input type="hidden" name="JobId" value="{{ $job['Id'] }}">
						<div class="form-group">
							<input type="text" class="form-control" name="Name" placeholder="Name">
							<small class="form-text text-danger"></small>
						</div>
						<div class="form-group">
							<input type="text" class="form-control" name="Email" placeholder="Email">
							<small class="form-text text-danger"></small>
						</div>
						<div class="form-group">
							<input type="text" class="form-control" name="PhoneNumber"placeholder="Phone number">
							<small class="form-text text-danger"></small>
						</div>
						<div class="form-group">
							<textarea class="form-control" rows="7" placeholder="What skills, work projects or achievements make you a strong candidate?"></textarea>
							<small class="form-text text-danger"></small>
						</div>
						<div class="form-group upload-file">
							<button class="btn btn-outline-dark" id="inputCV" type="button">
								Upload your file
							</button>

							<p class="p-overline">No file selected</p>

							<input type="file">
						</div>
						<div class="form-group">
							<button class="btn btn-primary" onclick="submitFormApply(this)" type="button">
								Apply now
							</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>