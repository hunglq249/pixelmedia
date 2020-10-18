<div class="popup-header">
    <h5>
        Thêm Mới Sản phẩm
    </h5>

    <button class="btn" data-dismiss="popup" type="button">
        <i class="elo el-2x el-close"></i>
    </button>
</div>

<div class="popup-body">
    <form action="{{ route('san-pham.store') }}" method="post" enctype="multipart/form-data" autocomplete="off">
        @include('zyk_admin.products.form', [
            'title_vi' => '', 'title_en' => '',
            'sub_title_vi' => '', 'sub_title_en' => '',
            'description_vi' => '', 'description_en' => '',
            'content_vi' => '', 'content_en' => '', 'slug' => '',
            'client' => '', 'date' => '', 'images' => '', 'product' => '',
            'categories' => $customCategories, 'teams' => $customTeams, 'is_top' => 0
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
