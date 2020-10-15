{{ csrf_field() }}
<div class="form-group">
    @if($is_update)
        <div class="mask mask-circle" style="width: 128px; height: 128px;">
            <img src="{{ asset('storage/app'. $image) }}" style="width:100%" alt="Avatar">
        </div>
    @endif

    <label>
        Ảnh Đại Diện
    </label>
    <input type="file" name="image" value="{{ old('image') }}" class="custom-file-input" id="imageUpload">
</div>

<div class="form-group">
    <label>
        Họ & Tên
    </label>
    <input type="text" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" placeholder="Họ & Tên" value="{{old('name') ? old('name') : $name}}">
</div>

<div class="form-group">
    <label>
        Vị Trí
    </label>
    <input type="text" class="form-control {{ $errors->has('position') ? ' is-invalid' : '' }}" name="position" placeholder="Vị Trí" value="{{old('position') ? old('position') : $position}}">
</div>

