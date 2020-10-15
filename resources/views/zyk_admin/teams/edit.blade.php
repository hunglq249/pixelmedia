<div class="popup-header">
    <h5>
        Cập Nhật Thành Viên
    </h5>

    <button class="btn" data-dismiss="popup" type="button">
        <i class="elo el-2x el-close"></i>
    </button>
</div>

<div class="popup-body">
    <form action="{{ route('thanh-vien.update', ['thanh_vien' => $team->id]) }}" method="post" autocomplete="off">
        {{ method_field('PUT') }}
        @include('zyk_admin.teams.form', [
            'name' => $team->name, 'position' => $team->position,
            'error' => $errors, 'is_update' => true, 'image' => $team->image
        ])
    </form>
</div>

<div class="popup-footer">
    <button class="btn" data-dismiss="popup" type="button">
        Huỷ bỏ
    </button>

    <button class="btn btn-primary btn-update-item" type="button">
        Thêm mới
    </button>
</div>


