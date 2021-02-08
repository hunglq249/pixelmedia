{{ csrf_field() }}
@php
    $isUpdate = $product ? true : false;
@endphp

<div class="row">
    <div class="form-group col-md-8">
        <label>
            Danh Mục (<span class="required">*</span>)
        </label>
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
    <div class="form-group col-md-4">
        <label>
            Khách Hàng
        </label>
        <input type="text" class="form-control" name="client" placeholder="Khách Hàng" value="{{$client ? $client : ''}}">
    </div>

    <div class="form-group col-md-12">
        <label>
            Ngày Tháng
        </label>
        <input type="text" class="form-control datepicker" name="date" value="{{$date}}">
    </div>

    <div class="form-group col-md-4">
        <label>
            Thể Loại
        </label>
        <select class="form-control" name="cover_type" id="selectCoverType">
            <option value="">Chọn thể loại</option>
            <option value="0" {{$isUpdate ? ($product->cover_type == 0 ? 'selected' : '') : ''}}>Hình Ảnh</option>
            <option value="1" {{$isUpdate ? ($product->cover_type == 1 ? 'selected' : '') : ''}}>Video</option>
        </select>
    </div>

    <div class="form-group col-md-8 render-by-type">
        <!-- COVER TYPE APPENDS HERE -->
    </div>

    <div class="form-group col-md-12">
        <label>
            Thành Viên
        </label>
        <select class="form-control select2" name="team_id[]" multiple="multiple" data-placeholder="Chọn thành viên" style="width: 100%;" id="team-id">
            @foreach($teams as $id => $team)
                <option value="{{ $id }}" {{$isUpdate ? (in_array($id, $product->team_id) ? 'selected' : '') : ''}}>{{$team}}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group col-md-6">
        <label>
            Tiêu Đề (Tiếng Việt)
        </label>

        <input type="text" class="form-control input-title-vi" name="title_vi" placeholder="Tiêu đề tiếng việt" value="{{$title_vi ? $title_vi : ''}}">
    </div>

    <div class="form-group col-md-6">
        <label>
            Tiêu Đề (Tiếng Anh)
        </label>

        <input type="text" class="form-control" name="title_en" placeholder="Tiêu đề tiếng anh" value="{{$title_en ? $title_en : ''}}">
    </div>

    <div class="form-group col-md-6">
        <label>
            Tiêu Đề Phụ (Tiếng Việt)
        </label>

        <input type="text" class="form-control" name="sub_title_vi" placeholder="Tiêu đề phụ tiếng việt" value="{{$sub_title_vi ? $sub_title_vi : ''}}">
    </div>

    <div class="form-group col-md-6">
        <label>
            Tiêu Đề Phụ (Tiếng Anh)
        </label>

        <input type="text" class="form-control" name="sub_title_en" placeholder="Tiêu đề phụ tiếng anh" value="{{$sub_title_en ? $sub_title_en : ''}}">
    </div>

    <div class="form-group col-md-6">
        <label>
            Slug
        </label>
        <input type="text" class="form-control input-title-slug" name="slug" placeholder="Slug" value="{{$slug ? $slug : ''}}">
    </div>
    <div class="form-group col-md-6">
        {{-- <input class="form-check-input" type="checkbox" value="1" id="is-top" name="is_top" {{$is_top ? 'checked' : ''}}>
        <label class="form-check-label" for="is-top">
            Top
        </label> --}}

        <div class="form-check-group">
            <div class="form-check">
                <input type="checkbox" value="1" name="is_top" {{$is_top ? 'checked' : ''}}>
                <label data-toggle="check" data-type="checkbox">
                    <i class=" el-lg {{ $is_top ? 'els el-check-square' : 'elo el-square'}}"></i> Is top
                </label>
            </div>
        </div>
      </div>

    <div class="col-md-12">
        <div class="row">
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
    </div>

    <div class="form-group col-md-12">
        <label>
            Danh Sách Ảnh
        </label>
        <input type="file" name="images[]" class="custom-file-input {{ $errors->has('images') ? ' is-invalid' : '' }}" id="imageUpload" multiple  value="{{ old('images') }}" accept="image/*">
    </div>

    <div class="list-images col-md-12">
        @if($isUpdate)
            <div class="row">
                @foreach($product->images as $image)
                    <div class="item-image col-md-3">
                        <button class="btn btn-danger btn-remove-image" type="button" data-image="{{ $image }}" data-url="{{route('san-pham.remove.image', ['san_pham' => $product_id])}}">
                            <i class="elo el-lg el-close"></i>
                        </button>
                        <div class="mask">
                            <img src="{{ asset('storage/app'. $image) }}" width="20%" alt="..." class="margin">
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</div>
