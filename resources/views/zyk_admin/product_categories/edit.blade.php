<div class="popup-header">
    <h5>
        Cập Nhật Danh mục sản phẩm
    </h5>

    <button class="btn" data-dismiss="popup" type="button">
        <i class="elo el-2x el-close"></i>
    </button>
</div>

<div class="popup-body">
    <form action="{{ route('danh-muc-san-pham.update', ['danh_muc_san_pham' => $productCategory->id]) }}" method="post" enctype="multipart/form-data" autocomplete="off">
        {{ method_field('PUT') }}
        @include('zyk_admin.product_categories.form', [
            'title_vi' => $title_vi,
            'title_en' => $title_en,
            'slug' => $productCategory->slug,
            'image' => $productCategory->image,
            'is_update' => true
        ])
    </form>
</div>

<div class="popup-footer">
    <button class="btn" data-dismiss="popup" type="button">
        Huỷ bỏ
    </button>

    <button class="btn btn-primary btn-update" type="button">
        Cập nhật
    </button>
</div>
