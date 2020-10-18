<div class="popup-header">
    <h5>
        Thêm Mới Tuyển Dụng
    </h5>

    <button class="btn" data-dismiss="popup" type="button">
        <i class="elo el-2x el-close"></i>
    </button>
</div>

<div class="popup-body">
    <form action="{{ route('tuyen-dung.store') }}" method="post" autocomplete="off" enctype="multipart/form-data">
        @include('zyk_admin.recruitments.form', [
            'title_vi' => '', 'title_en' => '',
            'description_vi' => '', 'description_en' => '',
            'content_vi' => '', 'content_en' => '', 'image' => ''
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
