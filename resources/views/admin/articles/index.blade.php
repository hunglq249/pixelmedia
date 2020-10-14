@extends('admin.articles.base')

@section('action-content')
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-slug">Danh Sách Bài Viết</h3>
                        @if(Session::has('error'))
                            <p class="alert {{ Session::get('alert-class', 'alert-warning') }}">{{ Session::get('error') }}<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></p>
                        @endif
                        @if(Session::has('success'))
                            <p class="alert {{ Session::get('alert-class', 'alert-success') }}">{{ Session::get('success') }}<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></p>
                        @endif
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-sm-6"><a class="btn btn-primary" href="{{ route('bai-viet.create') }}">Thêm mới bài viết</a></div>
                            <div class="col-sm-6">
                                @include('admin.layouts.search', ['route' => route('bai-viet.index'), 'keyword' => $keyword])
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
                                        <th>Tiêu Đề (Tiếng Việt)</th>
                                        <th>Tiêu Đề (Tiếng Anh)</th>
                                        <th>Slug</th>
                                        <th>Tài Khoản Tạo</th>
                                        <th>Tài Khoản Cập Nhật</th>
                                        <th>Thời Gian Tạo</th>
                                        <th>Thời Gian Cập Nhật</th>
                                        <th>Thao Tác</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($result as $key => $value)
                                        <tr role="row" class="odd row-{{$value->id}}" >
                                            <td>{{ $value->id }}</td>
                                            @if(count($value->lang) > 0)
                                                @foreach($value->lang as $item)
                                                    <td>
                                                        {{$item->title}}
                                                    </td>
                                                @endforeach
                                            @endif
                                            <td>{{ $value->slug }}</td>
                                            <td>{{ $value->created_by }}</td>
                                            <td>{{ $value->updated_by }}</td>
                                            <td>{{ $value->created_at }}</td>
                                            <td>{{ $value->updated_at }}</td>
                                            <td>
                                                <a href="{{ route('bai-viet.show', ['bai_viet' => $value->id]) }}" style="margin: 0px 10px" title="Chi Tiết">
                                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                                </a>
                                                @include('admin.layouts.btn_action_group', [
                                                    'routeEdit' => route('bai-viet.edit', ['bai_viet' => $value->id]),
                                                    'routeDel' => route('bai-viet.remove', ['bai_viet' => $value->id]),
                                                    'idDel' => $value->id,
                                                ])
                                            </td>
                                        <tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 text-center">
                                <div class="paging_simple_numbers" id="example2_paginate">
                                    {{ $result->links('pagination::bootstrap-4') }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
