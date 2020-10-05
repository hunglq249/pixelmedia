{{ csrf_field() }}
<?php
    $isUpdate = $product ? true : false;
?>
<div class="row">
    <div class="col-md-6">
        <div class="form-group row">
            <label class="col-md-2 col-form-label text-md-right" for="gender">Danh Mục (<span class="required">*</span>)</label>
            <div class="col-md-9">
                <select name="product_category_id" value="{{ old('product_category_id') }}" class="form-control{{ $errors->has('product_category_id') ? ' is-invalid' : '' }}">
                    @foreach($categories as $id => $title)
                        <option value="{{ $id }}" {{$isUpdate ? ($product->product_category_id == $id ? 'selected' : '') : ''}}>{{ $title }}</option>
                    @endforeach
                </select>
                @if ($errors->has('product_category_id'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('product_category_id') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-2 col-form-label text-md-right" for="client">Khách Hàng</label>
            <div class="col-md-9">
                <input type="text" class="form-control" id="client" name="client" placeholder="Khách Hàng" value="{{$client ? $client : ''}}">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-2 col-form-label text-md-right" for="datepicker">Ngày Tháng</label>
            <div class="col-md-9">
                <div class="input-group date">
                    <div class="input-group-addon">
                        <i class="fa fa-calendar" ></i>
                    </div>
                    <input type="text" class="form-control pull-right" name="date" id="datepicker" value="{{$date}}">
                </div>
            </div>

        </div>
        <div class="form-group row">
            <label class="col-md-2 col-form-label text-md-right" for="images">Danh Sách Ảnh</label>
            <div class="col-md-9">
                <input type="file" name="images[]" value="{{ old('images') }}"
                       class="custom-file-input {{ $errors->has('images') ? ' is-invalid' : '' }}" id="imageUpload" multiple>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-2 col-form-label text-md-right" for="cover-type">Thể Loại</label>
            <div class="col-md-9">
                <select class="form-control" name="cover_type" id="cover-type">
                    <option value="">Chọn thể loại</option>
                    <option value="0" {{$isUpdate ? ($product->cover_type == 0 ? 'selected' : '') : ''}}>Hình Ảnh</option>
                    <option value="1" {{$isUpdate ? ($product->cover_type == 1 ? 'selected' : '') : ''}}>Video</option>
                </select>
            </div>
        </div>

        <div class="render-by-type"></div>

        <div class="form-group row">
            <label class="col-md-2 col-form-label text-md-right" for="team-id">Thành Viên</label>
            <div class="col-md-9">
                <select class="form-control select2" name="team_id[]" multiple="multiple" data-placeholder="Chọn thành viên" style="width: 100%;" id="team-id">
                    @foreach($teams as $id => $team)
                        <option value="{{ $id }}" {{$isUpdate ? (in_array($id, $product->team_id) ? 'selected' : '') : ''}}>{{$team}}</option>
                    @endforeach
                </select>
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
            <label class="col-md-2 col-form-label text-md-right" for="sub-title-vi">Tiêu Đề Phụ<br>(Tiếng Việt)</label>
            <div class="col-md-9">
                <input type="text" class="form-control" id="sub-title-vi" name="sub_title_vi" placeholder="Tiêu đề phụ tiếng việt" value="{{$sub_title_vi ? $sub_title_vi : ''}}">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-2 col-form-label text-md-right" for="sub-title-en">Tiêu Đề Phụ<br>(Tiếng Anh)</label>
            <div class="col-md-9">
                <input type="text" class="form-control" id="sub-title-en" name="sub_title_en" placeholder="Tiêu đề phụ tiếng anh" value="{{$sub_title_en ? $sub_title_en : ''}}">
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
