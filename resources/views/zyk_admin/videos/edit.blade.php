<div class="popup-header">
    <h5>
        Cập Nhật Video
    </h5>

    <button class="btn" data-dismiss="popup" type="button">
        <i class="elo el-2x el-close"></i>
    </button>
</div>

<div class="popup-body">
    <form action="{{ route('video.update', ['video' => $video->id]) }}" method="post" enctype="multipart/form-data" autocomplete="off">
        {{ method_field('PUT') }}
        @include('zyk_admin.videos.form', [
            'title_vi' => $langData['title_vi'], 'title_en' => $langData['title_en'], 'path' => $video['path']
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
