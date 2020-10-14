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
	$segmentPos = 3;	
@endphp

<div class="navside-menu">
	<div class="menu-group">
		<div class="menu-group-wrapper">
			<div class="menu-group-item @if(Request::Segment(1) == 'admin' && Request::Segment(2) == '') active @endif">
				<a href="#">
					<i class="elo el-lg el-dashboard"></i> Dashboard
				</a>
			</div>
		</div>
	</div>

	<div class="menu-group">
		<div class="menu-group-heading">
			<p class="p-overline">
				Sản phẩm
			</p>
		</div>

		<div class="menu-group-wrapper">
			<div class="menu-group-item @if(Request::Segment($segmentPos) == 'danh-muc-san-pham' || Request::Segment($segmentPos) == 'san-pham') active @endif">
				<a href="javascript:void(0)">
					<i class="elo el-lg el-square"></i> Sản phẩm
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
	</div>
</div>