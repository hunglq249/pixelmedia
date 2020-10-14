@extends('layouts.admin.content')

@section('title')
	Zayeki | Dashboard
@endsection

@section('view')
	<div class="view-header">
		<div class="view-header-left">
			<div class="header-navigation">
				<h6 class="subtitle-md">Hi, how are you today?</h6>

				<h3>
					Dashboard
				</h3>
			</div>
		</div>

		<div class="view-header-right">
			<div class="input-group">
				<div class="input-group-before">
					<div class="input-group-text">
						<i class="elo el-lg el-search"></i>
					</div>
				</div>

				<input type="search" class="form-control">

				<div class="input-group-after">
					<button class="btn btn-primary" type="button">
						Search
					</button>
				</div>
			</div>

			<button class="btn btn-primary" type="button">
				<i class="elo el-lg el-plus"></i> Thêm Mới Danh Mục
			</button>
		</div>
	</div>

	<div class="view-body">
		<div class="row">
			<div class="col-md-3">
				<div class="card">
					<div class="card-header">
						<h6>Hello</h6>
					</div>
					<div class="card-body">
						<h6 class="subtitle-md">
							Hello again
						</h6>
						<p>Hihi</p>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('js')
	<script>
		$(document).ready(() => {
			new Breadcrumb([
                {
                    text: '<i class="elo el-lg el-home"></i> Home',
                    link: '{{ route("dashboard") }}',
                }
            ])
		})
	</script>
@endsection