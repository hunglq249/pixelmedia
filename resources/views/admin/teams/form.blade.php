{{ csrf_field() }}
<div class="card-body">
    <div class="row">
        <div class="col-md-{{ $is_update ? 8 : 12 }}">
            <div class="card-body">
                <div class="form-group">
                    <label for="imageUpload">Ảnh Đại Diện</label>
                    <input type="file" name="image" value="{{ old('image') }}"
                           class="custom-file-input" id="imageUpload">
                    @if ($errors->has('image'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('image') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="name">Họ & Tên</label>
                    <input type="text" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" id="name" name="name"
                           placeholder="Họ & Tên" value="{{old('name') ? old('name') : $name}}">
                    @if ($errors->has('name'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="position">Vị Trí</label>
                    <input type="text" class="form-control {{ $errors->has('position') ? ' is-invalid' : '' }}" id="position"
                           name="position" placeholder="Vị Trí" value="{{old('position') ? old('position') : $position}}">
                    @if ($errors->has('position'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('position') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
        </div>
        @if($is_update)
        <div class="col-md-4">
            <img src="{{ asset('storage/app'. $image) }}" style="width:100%" alt="Avatar">
        </div>
        @endif
    </div>
</div>

