<div class="popup-header">
    <h5>
        Cập Nhật Danh mục
    </h5>

    <button class="btn" data-dismiss="popup" type="button">
        <i class="elo el-2x el-close"></i>
    </button>
</div>

<div class="popup-body">
    <form action="{{ route('danh-muc-bai-viet.update', ['danh_muc_bai_viet' => $category->id]) }}" method="post" enctype="multipart/form-data" autocomplete="off">
        {{ method_field('PUT') }}
        @include('zyk_admin.article_categories.form', ['title_vi' => $title_vi, 'title_en' => $title_en, 'slug' => $category->slug, 'image' => $category->image,'is_update' => true])
    </form>
</div>

<div class="popup-footer">
    <button class="btn" data-dismiss="popup" type="button">
        Huỷ bỏ
    </button>

    <button class="btn btn-primary btn-update-item" type="button">
        Cập nhật
    </button>
</div>
