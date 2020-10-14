<div class="btn-group">
	<button class="btn btn-sm btn-update-item" data-url="{{ $routeEdit }}" data-popup-full="{{ isset($popupFull) ? 'true' : 'false' }}" type="button">
		<i class="elo el-pencil"></i>
	</button>
	<a href="javascript:void(0)" class="btn btn-sm btn-remove" data-id="{{ $idDel }}" data-url="{{ $routeDel }}" role="button">
		<i class="elo el-trash"></i>
	</a>
</div>