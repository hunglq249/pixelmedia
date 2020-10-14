<div class="input-group" data-url="{{ $route }}">
	<div class="input-group-before">
		<div class="input-group-text">
			<i class="elo el-lg el-search"></i>
		</div>
	</div>

	<input type="search" class="form-control input-search-items" name="keyword" value="{{ $keyword }}" placeholder="Tìm kiếm..." autocomplete="off">

	<div class="input-group-after">
		<button class="btn btn-primary btn-search" type="button">
			Tìm kiếm
		</button>
	</div>
</div>