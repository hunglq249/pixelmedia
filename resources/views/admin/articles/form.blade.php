{{ csrf_field() }}
<?php
$isUpdate = $article ? true : false;
?>
<div class="row">
    <div class="col-md-6">
        <div class="form-group row">
            <label class="col-md-2 col-form-label text-md-right" for="gender">Danh Mục (<span class="required">*</span>)</label>
            <div class="col-md-9">
                <select name="category_id" value="{{ old('category_id') }}" class="form-control{{ $errors->has('category_id') ? ' is-invalid' : '' }}">
                    @foreach($categories as $id => $title)
                        <option value="{{ $id }}" {{$isUpdate ? ($article->category_id == $id ? 'selected' : '') : ''}}>{{ $title }}</option>
                    @endforeach
                </select>
                @if ($errors->has('category_id'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('category_id') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-2 col-form-label text-md-right" for="detail">Chi Tiết</label>
            <div class="col-md-9">
                <input type="text" class="form-control" id="detail" name="detail" placeholder="Chi Tiết" value="{{$detail ? $detail : ''}}">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-2 col-form-label text-md-right" for="image">Hình Ảnh</label>
            <div class="col-md-9">
                <input type="file" name="image" value=""
                       class="custom-file-input" id="image">

                @if($image)
                    <img src="{{ asset('storage/app'. $image) }}" width="50%" alt="..." class="margin">
                @endif
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group row">
            <label class="col-md-2 col-form-label text-md-right" for="title-vi">Tiêu Đề<br>(Tiếng Việt)</label>
            <div class="col-md-9">
                <input type="text" class="form-control" id="title-vi" name="title_vi" placeholder="Tiêu đề tiếng việt" value="{{$title_vi ? $title_vi : ''}}">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-2 col-form-label text-md-right" for="title-en">Tiêu Đề<br>(Tiếng Anh)</label>
            <div class="col-md-9">
                <input type="text" class="form-control" id="title-en" name="title_en" placeholder="Tiêu đề tiếng anh" value="{{$title_en ? $title_en : ''}}">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-2 col-form-label text-md-right" for="slug">Slug</label>
            <div class="col-md-9">
                <input type="text" class="form-control" id="slug" name="slug" placeholder="Slug" value="{{$slug ? $slug : ''}}">
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group row">
            <label class="col-md-1 col-form-label text-md-right" for="description-vi">Mô Tả<br>(Tiếng Việt)</label>
            <div class="col-md-11">
                <textarea class="form-control" id="description-vi" name="description_vi" placeholder="Mô tả tiếng việt" cols="30" rows="10">{{$description_vi ? $description_vi : ''}}</textarea>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-1 col-form-label text-md-right" for="description-en">Mô Tả<br>(Tiếng Anh)</label>
            <div class="col-md-11">
                <textarea class="form-control" id="description-en" name="description_en" placeholder="Mô tả tiếng anh" cols="30" rows="10">{{$description_en ? $description_en : ''}}</textarea>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-1 col-form-label text-md-right" for="content-vi">Nội Dung<br>(Tiếng Việt)</label>
            <div class="col-md-11">
                <textarea class="form-control tinymce" id="content-vi" name="content_vi" placeholder="Nội dung tiếng việt">{{$content_vi ? $content_vi : ''}}</textarea>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-1 col-form-label text-md-right" for="content-en">Nội Dung<br>(Tiếng Anh)</label>
            <div class="col-md-11">
                <textarea class="form-control tinymce" id="content-en" name="content_en" placeholder="Nội dung tiếng anh">{{$content_en ? $content_en : ''}}</textarea>
            </div>
        </div>
    </div>
</div>
