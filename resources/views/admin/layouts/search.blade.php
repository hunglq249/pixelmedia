<form method="get" action="{{ $route }}">
    <div class="row">
        <div class="col-xs-9 clearable">
            <input type="text" name="keyword" value="{{ $keyword }}" class="form-control search" placeholder="Tìm kiếm... " style="border-radius: 4px">
            <i class="clearable__clear">&times;</i>
        </div>
        <div class="col-xs-2">
            <input type="submit" class="btn btn-info" value="Tìm Kiếm">
        </div>
    </div>
</form>
