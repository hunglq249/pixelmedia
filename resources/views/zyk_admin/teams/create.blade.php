<div class="popup-header">
    <h5>
        Thêm Mới Thành Viên
    </h5>

    <button class="btn" data-dismiss="popup" type="button">
        <i class="elo el-2x el-close"></i>
    </button>
</div>

<div class="popup-body">
    <form action="{{ route('thanh-vien.store') }}" method="post" enctype="multipart/form-data" autocomplete="off">
        @include('zyk_admin.teams.form', [
            'name' => null, 'position' => null, 'error' => $errors, 'is_update' => false
        ])
    </form>
</div>

<div class="popup-footer">
    <button class="btn" data-dismiss="popup" type="button">
        Huỷ bỏ
    </button>

    <button class="btn btn-primary btn-update" type="button">
        Thêm mới
    </button>
</div>


