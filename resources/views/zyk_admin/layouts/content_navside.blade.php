<div class="navside-toggle">
	<button class="btn btn-toggle-navside" type="button">
		<span></span>
	</button>
</div>

<div class="navside-brand">
	<a href="{{ route('dashboard') }}">
		<img src="{{ asset('dist/img/logo.svg') }}" alt="Logo Zayeki">
	</a>
</div>

@php
	$segmentPos = 2;	
@endphp

<div class="navside-menu">
	<div class="menu-group">
		{{-- <div class="menu-group-wrapper">
			<div class="menu-group-item @if(Request::Segment(1) == 'admin' && Request::Segment(2) == '') active @endif">
				<a href="#">
					<i class="elo el-lg el-dashboard"></i> Dashboard
				</a>
			</div>
		</div> --}}

		<div class="menu-group-wrapper">
			<div class="menu-group-item @if(Request::Segment($segmentPos) == 'danh-muc-san-pham' || Request::Segment($segmentPos) == 'san-pham') active @endif">
				<a href="javascript:void(0)">
					<i class="elo el-lg el-video"></i> Sản phẩm
				</a>
				<a href="#" class="btn-toggle-menu-expand">
					<i class="elo el-lg el-caret-right"></i>
				</a>
			</div>

			<div class="menu-group-expand">
				<div class="menu-group-item @if(Request::Segment($segmentPos) == 'danh-muc-san-pham') active @endif">
					<a href="{{ route('danh-muc-san-pham.index') }}">
						Danh mục sản phẩm
					</a>
				</div>
				<div class="menu-group-item @if(Request::Segment($segmentPos) == 'san-pham') active @endif">
					<a href="{{ route('san-pham.index') }}">
						Sản phẩm
					</a>
				</div>
			</div>
		</div>

		<div class="menu-group-wrapper">
			<div class="menu-group-item @if(Request::Segment($segmentPos) == 'thanh-vien') active @endif">
				<a href="{{ route('thanh-vien.index') }}">
					<i class="elo el-lg el-users"></i> Thành Viên
				</a>
			</div>
		</div>

		<div class="menu-group-wrapper">
			<div class="menu-group-item @if(Request::Segment($segmentPos) == 'danh-muc-bai-viet' || Request::Segment($segmentPos) == 'bai-viet') active @endif">
				<a href="javascript:void(0)">
					<i class="elo el-lg el-news"></i> Bài Viết
				</a>
				<a href="#" class="btn-toggle-menu-expand">
					<i class="elo el-lg el-caret-right"></i>
				</a>
			</div>

			<div class="menu-group-expand">
				<div class="menu-group-item @if(Request::Segment($segmentPos) == 'danh-muc-bai-viet') active @endif">
					<a href="{{ route('danh-muc-bai-viet.index') }}">
						Danh mục Bài viết
					</a>
				</div>
				<div class="menu-group-item @if(Request::Segment($segmentPos) == 'bai-viet') active @endif">
					<a href="{{ route('bai-viet.index') }}">
						Bài viết
					</a>
				</div>
			</div>
		</div>

		<div class="menu-group-wrapper">
			<div class="menu-group-item @if(Request::Segment($segmentPos) == 'gioi-thieu') active @endif">
				<a href="{{ route('gioi-thieu.index') }}">
					<i class="elo el-lg el-users"></i> Giới Thiệu
				</a>
			</div>
		</div>

		<div class="menu-group-wrapper">
			<div class="menu-group-item @if(Request::Segment($segmentPos) == 'tuyen-dung' || Request::Segment($segmentPos) == 'ung-tuyen') active @endif">
				<a href="javascript:void(0)">
					<i class="elo el-lg el-news"></i> Tuyển dụng
				</a>
				<a href="#" class="btn-toggle-menu-expand">
					<i class="elo el-lg el-caret-right"></i>
				</a>
			</div>

			<div class="menu-group-expand">
				<div class="menu-group-item @if(Request::Segment($segmentPos) == 'tuyen-dung') active @endif">
					<a href="{{ route('tuyen-dung.index') }}">
						Tuyển dụng
					</a>
				</div>
				<div class="menu-group-item @if(Request::Segment($segmentPos) == 'ung-tuyen') active @endif">
					<a href="{{ route('ung-tuyen.index') }}">
						Ứng tuyển
					</a>
				</div>
			</div>
		</div>
	</div>
</div>