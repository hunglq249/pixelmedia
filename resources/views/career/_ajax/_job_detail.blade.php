<div class="row row-no-gutters job-detail">
	<div class="col-md-6 job-detail-cover">
		<div class="mask">
			<img src="{{ asset('storage/app'. $job->image) }}" alt="Image cover of {{ $job->title }}">
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
					<h3>{{ $job->title }}</h3>

					<p>{{ $job->description }}</p>
				</div>

				<div class="content-body">
					{!! $job->content !!}
				</div>
			</div>

			<div class="job-apply">
				<div class="apply-header">
					<h3>Apply now</h3>
				</div>

				<div class="apply-body">
					<form action="{{ route('career.apply') }}" method="post" autocomplete="off" enctype="multipart/form-data">
						@csrf
						<input type="hidden" name="JobId" value="{{ $job->id }}">
						<div class="form-group">
							<input type="text" class="form-control" name="name" placeholder="Name">
							<small class="form-text text-danger"></small>
						</div>
						<div class="form-group">
							<input type="text" class="form-control" name="email" placeholder="Email">
							<small class="form-text text-danger"></small>
						</div>
						<div class="form-group">
							<input type="text" class="form-control" name="PhoneNumber"placeholder="Phone number">
							<small class="form-text text-danger"></small>
						</div>
						<div class="form-group">
							<textarea class="form-control" name="message" rows="7" placeholder="What skills, work projects or achievements make you a strong candidate?"></textarea>
							<small class="form-text text-danger"></small>
						</div>
						<div class="form-group upload-file">
							<button class="btn btn-outline-dark" id="inputCV" onclick="$('#inputUploadFile').trigger('click')" type="button">
								Upload your file
							</button>

							<p class="p-overline">No file selected</p>

							<input type="file" name="file" id="inputUploadFile">
						</div>
						<div class="form-group">
							<button class="btn btn-primary" onclick="submitFormApply(this)" type="submit">
								Apply now
							</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
