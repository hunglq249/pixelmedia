<div class="popup-header">
    <h5>
        Cập Nhật Bài Viết
    </h5>

    <button class="btn" data-dismiss="popup" type="button">
        <i class="elo el-2x el-close"></i>
    </button>
</div>

<div class="popup-body">
    <form action="{{ route('banner-tuyen-dung.update', ['banner_tuyen_dung' => $detail->id]) }}" method="post" enctype="multipart/form-data" autocomplete="off">
        {{ method_field('PUT') }}
        {{ csrf_field() }}

        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="form-group col-md-4">
                        <label>
                            Hình Ảnh
                        </label>
                        <input type="file" name="image" value="" class="custom-file-input">
                    </div>
                    <div class="form-group col-md-8">
                        <div class="article-image-wrapper">
                            @if($detail->image)
                                <div class="mask" style="width: 100%; height: 230px">
                                    <img src="{{ asset('storage/app'. $detail->image) }}" alt="Thumb of {{ $detail->image }}">
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

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
