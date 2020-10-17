<div class="popup-header">
    <h5>
        Thêm Mới Bài Viết
    </h5>

    <button class="btn" data-dismiss="popup" type="button">
        <i class="elo el-2x el-close"></i>
    </button>
</div>

<div class="popup-body">
    <form action="{{ route('bai-viet.store') }}" method="post" enctype="multipart/form-data" autocomplete="off">
        @include('zyk_admin.articles.form', [
            'title_vi' => '', 'title_en' => '',
            'description_vi' => '', 'description_en' => '',
            'content_vi' => '', 'content_en' => '', 'slug' => '',
            'detail' => '', 'image' => '', 'article' => '',
            'categories' => $customCategories
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
