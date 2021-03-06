{{ csrf_field() }}
<div class="card-body">
    <div class="form-group">
        <label for="title-vi">Tiêu đề (Tiếng Việt)</label>
        <input type="text" class="form-control" id="title-vi" name="title_vi" placeholder="Tiêu đề tiếng việt" value="{{$title_vi}}">
        @if ($errors->has('title_vi'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('title_vi') }}</strong>
            </span>
        @endif
    </div>
    <div class="form-group">
        <label for="title-en">Tiêu đề (Tiếng Anh)</label>
        <input type="text" class="form-control" id="title-en" name="title_en" placeholder="Tiêu đề tiếng anh" value="{{$title_en}}">
        @if ($errors->has('title_en'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('title_en') }}</strong>
            </span>
        @endif
    </div>
    <div class="form-group">
        <label for="slug">Slug</label>
        <input type="text" class="form-control" id="slug" name="slug" placeholder="Slug" value="{{$slug}}">
        @if ($errors->has('slug'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('slug') }}</strong>
            </span>
        @endif
    </div>
</div>
