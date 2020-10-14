@extends('admin.abouts.base')

@section('action-content')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Cập Nhật Giới Thiệu</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active">Cập Nhật Giới Thiệu</li>
            </ol>
        </div>
    </div>
    @if(Session::has('error'))
        <p class="alert {{ Session::get('alert-class', 'alert-warning') }}">{{ Session::get('error') }}<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></p>
    @endif
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                </div>
                <form action="{{ route('gioi-thieu.update', ['gioi_thieu' => $detail->id]) }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <input type="hidden" name="id_lang" value="{{$ids}}">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-md-2 col-form-label text-md-right" for="cover">Ảnh</label>
                                <div class="col-md-10">
                                    <input type="file" name="cover" value="" class="custom-file-input" id="cover">
                                    @if ($errors->has('cover'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('cover') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-2 col-form-label text-md-right" for="break1">Danh Sách Ảnh 1 </label>
                                <div class="col-md-10">
                                    <input type="file" name="break1[]" value="{{ old('break1') }}"
                                           class="custom-file-input {{ $errors->has('break1') ? ' is-invalid' : '' }}" id="break1" multiple>
                                    @if ($errors->has('break1'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('break1') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-2 col-form-label text-md-right" for="break2">Danh Sách Ảnh 2</label>
                                <div class="col-md-10">
                                    <input type="file" name="break2[]" value="{{ old('break2') }}"
                                           class="custom-file-input {{ $errors->has('break2') ? ' is-invalid' : '' }}" id="break2" multiple>
                                    @if ($errors->has('break2'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('break2') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-2 col-form-label text-md-right" for="team-id">Thành Viên</label>
                                <div class="col-md-10">
                                    <select class="form-control select2" name="team_id[]" multiple="multiple" data-placeholder="Chọn thành viên" style="width: 100%;" id="team-id">
                                        @foreach($customTeams as $id => $team)
                                            <option value="{{ $id }}" {{in_array($id, $detail->team_id) ? 'selected' : ''}}>{{$team}}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('team_id'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('team_id') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="panel panel-default">
                                <div class="panel-heading">Danh Sách Ảnh 1</div>
                                <div class="panel-body">
                                    @foreach($detail->break['break1'] as $image)
                                        <img src="{{ asset('storage/app'. $image) }}" width="20%" alt="..." class="margin">
                                    @endforeach
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">Danh Sách Ảnh 2</div>
                                <div class="panel-body">
                                    @foreach($detail->break['break2'] as $image)
                                        <img src="{{ asset('storage/app'. $image) }}" width="20%" alt="..." class="margin">
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group row">
                                <label class="col-md-1 col-form-label text-md-right" for="description-vi">Mô Tả<br>(Tiếng Việt)</label>
                                <div class="col-md-11">
                                    <textarea class="form-control" id="description-vi" name="description_vi" placeholder="Mô tả tiếng việt" cols="30" rows="10">{{$langData['description_vi']}}</textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-1 col-form-label text-md-right" for="description-en">Mô Tả<br>(Tiếng Anh)</label>
                                <div class="col-md-11">
                                    <textarea class="form-control" id="description-en" name="description_en" placeholder="Mô tả tiếng anh" cols="30" rows="10">{{$langData['description_en']}}</textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-1 col-form-label text-md-right" for="content-vi">Nội Dung<br>(Tiếng Việt)</label>
                                <div class="col-md-11">
                                    <textarea class="form-control tinymce"  rows="15" id="content-vi" name="content_vi" placeholder="Nội dung tiếng việt">{{$langData['content_vi']}}</textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-1 col-form-label text-md-right" for="content-en">Nội Dung<br>(Tiếng Anh)</label>
                                <div class="col-md-11">
                                    <textarea class="form-control tinymce"  rows="15" id="content-en" name="content_en" placeholder="Nội dung tiếng anh">{{$langData['content_en']}}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer text-right">
                        <button type="submit" class="btn btn-primary">Cập Nhật</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
