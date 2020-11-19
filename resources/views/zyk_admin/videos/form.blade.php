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
                    Video
                </label>
                <input type="file" name="path" value="" class="custom-file-input">
            </div>
            <div class="form-group col-md-8">
                <div class="article-image-wrapper">
                    @if($path)
                        <div class="mask" style="width: 100%; height: 230px">
                            <img src="{{ asset('storage/app'. $path) }}" alt="Thumb of {{ $path }}">
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
