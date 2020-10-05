@extends('admin.teams.base')

@section('action-content')
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-slug">Danh Sách Sản Phẩm</h3>
                        @if(Session::has('error'))
                            <p class="alert {{ Session::get('alert-class', 'alert-warning') }}">{{ Session::get('error') }}<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></p>
                        @endif
                        @if(Session::has('success'))
                            <p class="alert {{ Session::get('alert-class', 'alert-success') }}">{{ Session::get('success') }}<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></p>
                        @endif
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-sm-6"><a class="btn btn-primary" href="{{ route('thanh-vien.create') }}">Thêm Mới Thành Viên</a></div>
                            <div class="col-sm-6">
                                @include('admin.layouts.search', ['route' => route('thanh-vien.index'), 'keyword' => $keyword])
                            </div>
                        </div>
                    </div>

                    <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                        <div class="row">
                            <div class="col-sm-12">
                                <table  class="table table-bordered table-hover dataTable" role="grid">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th width="20%">Ảnh Đại Diện</th>
                                        <th>Họ & Tên</th>
                                        <th>Vị Trí</th>
                                        <th>Thời Gian Tạo</th>
                                        <th>Thời Gian Cập Nhật</th>
                                        <th>Thao Tác</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($teams as $team)
                                        <tr>
                                            <td>{{ $team->id }}</td>
                                            <td>
                                                <img src="{{ asset('storage/app'. $team['image']) }}" style="width:100%" alt="Avatar">
                                            </td>
                                            <td>{{ $team->name }}</td>
                                            <td>{{ $team->position }}</td>
                                            <td>{{ $team->created_at }}</td>
                                            <td>{{ $team->updated_at }}</td>
                                            <td>
                                                <a href="{{ route('thanh-vien.edit', ['thanh_vien' => $team->id]) }}"><i class="fa fa-pencil-square-o mr-2"></i></a>
                                                <i class="far fa-trash-alt"></i>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
