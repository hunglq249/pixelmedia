@extends('admin.abouts.base')

@section('content')

    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Cập Nhật Thành Viên</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active">Cập Nhật Thành Viên</li>
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
                <form action="{{ route('thanh-vien.update', ['thanh_vien' => $team->id]) }}" method="post" enctype="multipart/form-data">
                    {{ method_field('PUT') }}

                    <div class="card-footer text-right">
                        <button type="submit" class="btn btn-primary">Cập Nhật</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
