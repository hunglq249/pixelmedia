<div class="popup-header">
    <h5>
        Thêm Mới Danh mục sản phẩm
    </h5>

    <button class="btn" data-dismiss="popup" type="button">
        <i class="elo el-2x el-close"></i>
    </button>
</div>

<div class="popup-body">
    <form action="{{ route('danh-muc-bai-viet.store') }}" method="post" autocomplete="off" enctype="multipart/form-data">
        @include('zyk_admin.article_categories.form', ['title_vi' => '', 'title_en' => '', 'slug' => '', 'is_update' => false])
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
