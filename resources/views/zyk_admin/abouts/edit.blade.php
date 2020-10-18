<div class="popup-header">
    <h5>
        Cập Nhật Giới Thiệu
    </h5>

    <button class="btn" data-dismiss="popup" type="button">
        <i class="elo el-2x el-close"></i>
    </button>
</div>

<div class="popup-body">
    <form action="{{ route('gioi-thieu.update', ['gioi_thieu' => $detail->id]) }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <input type="hidden" name="id_lang" value="{{$ids}}">
        
        <div class="row">
            <div class="col-md-12">
                <div class="card" style="margin-bottom: 1.5rem">
                    <div class="card-header">
                        <h6>
                            Thông Tin
                        </h6>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>
                                        Mô Tả (Tiếng Việt)
                                    </label>
                                    <textarea class="form-control" name="description_vi" placeholder="Mô tả tiếng việt" rows="10">{{$langData['description_vi']}}</textarea>
                                </div>
            
                                <div class="form-group">
                                    <label>
                                        Nội Dung (Tiếng Việt)
                                    </label>
                                    <textarea class="form-control tinymce" rows="15" name="content_vi" placeholder="Nội dung tiếng việt">{{$langData['content_vi']}}</textarea>
                                </div>
                            </div>
        
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>
                                        Mô Tả (Tiếng Anh)
                                    </label>
                                    <textarea class="form-control" name="description_en" placeholder="Mô tả tiếng anh" rows="10">{{$langData['description_en']}}</textarea>
                                </div>
            
                                <div class="form-group">
                                    <label>
                                        Nội Dung (Tiếng Anh)
                                    </label>
                                    <textarea class="form-control tinymce" rows="15" name="content_en" placeholder="Nội dung tiếng anh">{{$langData['content_en']}}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="card" style="margin-bottom: 1.5rem">
                    <div class="card-header">
                        <h6>
                            Thành Viên
                        </h6>
                    </div>
                    <div class="card-body">
                        <select class="form-control select2" name="team_id[]" multiple="multiple" data-placeholder="Chọn thành viên">
                            @foreach($customTeams as $id => $team)
                                <option value="{{ $id }}" {{in_array($id, $detail->team_id) ? 'selected' : ''}}>{{$team}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h6>
                            Ảnh cover
                        </h6>
                    </div>
                    <div class="card-body">
                        <input type="file" name="cover" value="" class="custom-file-input">
                    </div>
                </div>
            </div>
    
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h6>
                            Danh Sách Ảnh 1
                        </h6>
                    </div>
                    <div class="card-body">
                        <input type="file" name="break1[]" value="{{ old('break1') }}" class="custom-file-input {{ $errors->has('break1') ? ' is-invalid' : '' }}" multiple>
                    </div>
                </div>
            </div>
    
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h6>
                            Danh Sách Ảnh 2
                        </h6>
                    </div>
                    <div class="card-body">
                        <input type="file" name="break2[]" value="{{ old('break2') }}" class="custom-file-input {{ $errors->has('break2') ? ' is-invalid' : '' }}" multiple>
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
