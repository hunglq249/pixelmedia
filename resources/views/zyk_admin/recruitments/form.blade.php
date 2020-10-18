{{ csrf_field() }}

<div class="row">
    <div class="form-group col-md-6">
        <label>
            Tiêu Đề (Tiếng Việt)
        </label>
        <input type="text" class="form-control input-title-vi" name="title_vi" placeholder="Tiêu đề tiếng việt" value="{{$title_vi ? $title_vi : ''}}">
    </div>
    <div class="form-group col-md-6">
        <label>
            Tiêu Đề (Tiếng anh)
        </label>
        <input type="text" class="form-control input-title-en" name="title_en" placeholder="Tiêu đề tiếng anh" value="{{$title_en ? $title_en : ''}}">
    </div>

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
                    @if($image)
                        <div class="mask" style="width: 100%; height: 230px">
                            <img src="{{ asset('storage/app'. $image) }}" alt="Thumb of {{ $image }}">
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="form-group col-md-6">
        <label>
            Mô Tả (Tiếng Việt)
        </label>
        <textarea class="form-control" name="description_vi" placeholder="Mô tả tiếng việt" rows="10">{{$description_vi ? $description_vi : ''}}</textarea>
    </div>

    <div class="form-group col-md-6">
        <label>
            Mô Tả (Tiếng Anh)
        </label>
        <textarea class="form-control" name="description_en" placeholder="Mô tả tiếng anh" rows="10">{{$description_en ? $description_en : ''}}</textarea>
    </div>

    <div class="form-group col-md-6">
        <label>
            Nội Dung (Tiếng Việt)
        </label>
        <textarea class="form-control tinymce" name="content_vi" placeholder="Nội dung tiếng việt" rows="10">{{$content_vi ? $content_vi : ''}}</textarea>
    </div>

    <div class="form-group col-md-6">
        <label>
            Nội Dung (Tiếng Anh)
        </label>
        <textarea class="form-control tinymce" name="content_en" placeholder="Nội dung tiếng anh" rows="10">{{$content_en ? $content_en : ''}}</textarea>
    </div>
</div>
