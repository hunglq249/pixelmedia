<div class="popup-header">
    <h5>
        Cập Nhật Bài Viết
    </h5>

    <button class="btn" data-dismiss="popup" type="button">
        <i class="elo el-2x el-close"></i>
    </button>
</div>

<div class="popup-body">
    <form action="{{ route('tuyen-dung.update', ['tuyen_dung' => $detail->id]) }}" method="post" enctype="multipart/form-data" autocomplete="off">
        {{ method_field('PUT') }}
        @include('zyk_admin.recruitments.form', [
            'title_vi' => $langData['title_vi'], 'title_en' => $langData['title_en'],
            'description_vi' => $langData['description_vi'], 'description_en' => $langData['description_en'],
            'content_vi' => $langData['content_vi'], 'content_en' => $langData['content_en'], 'image' => $detail->image
        ])
        <input type="hidden" name="id_lang" value="{{$ids}}">
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
