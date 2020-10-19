@extends('zyk_admin.layouts.content')

@section('title')
    Thành Viên
@endsection

@section('view')
    <div class="view-header">
        <div class="view-header-left">
            <div class="header-navigation">
                <h3>
                    Thành Viên
                </h3>
            </div>
        </div>

        <div class="view-header-right">
            @include('zyk_admin.utils._search', ['route' => route('thanh-vien.index'), 'keyword' => $keyword])

            <button class="btn btn-primary btn-update-item" data-url="{{ route('thanh-vien.create') }}" type="button">
                <i class="elo el-lg el-plus"></i> Thêm Mới
            </button>
        </div>
    </div>

    <div class="view-body">
        <div class="list-items list-table">
            <div class="list-items-header">
                <div class="item-row">
                    <div class="item-col-1">
                        <p class="p-overline">
                            Id
                        </p>
                    </div>
                    <div class="item-col-1-half">
                        <p class="p-overline">
                            Ảnh Đại Diện
                        </p>
                    </div>
                    <div class="item-col-4">
                        <p class="p-overline">
                            Họ & Tên
                        </p>
                    </div>
                    <div class="item-col-1-half">
                        <p class="p-overline">
                            Vị Trí
                        </p>
                    </div>
                    <div class="item-col-1-half">
                        <p class="p-overline">
                            Thời Gian Tạo
                        </p>
                    </div>
                    <div class="item-col-1-half">
                        <p class="p-overline">
                            Thời Gian Cập Nhật
                        </p>
                    </div>
                    <div class="item-col-1">
                        <p class="p-overline">
                            Thao Tác
                        </p>
                    </div>
                </div>
            </div>
            <div class="list-items-body">
                @foreach($teams as $team)
                <div class="item-row">
                    <div class="item-col-1">
                        <p class="text-break">
                            {{ $team->id }}
                        </p>
                    </div>
                    <div class="item-col-1-half">
                        <div class="mask mask-circle" style="width: 64px; height: 64px;">
                            <img src="{{ asset('storage/app'. $team['image']) }}" style="width:100%" alt="Avatar">
                        </div>
                    </div>
                    <div class="item-col-4">
                        <p class="text-break">
                            {{ $team->name }}
                        </p>
                    </div>
                    <div class="item-col-1-half">
                        <p class="text-break">
                            {{ $team->position }}
                        </p>
                    </div>
                    <div class="item-col-1-half">
                        <p class="text-break">
                            {{ $team->created_at }}
                        </p>
                    </div>
                    <div class="item-col-1-half">
                        <p class="text-break">
                            {{ $team->updated_at }}
                        </p>
                    </div>
                    <div class="item-col-1">
                        @include('zyk_admin.utils.btn_group_actions', [
                            'routeEdit' => route('thanh-vien.edit', ['thanh_vien' => $team->id]),
                            'routeDel' => '#',
                            'idDel' => ''
                        ])
                    </div>
                </div>
                @endforeach
            </div>
            <div class="list-items-footer">
                {{ $teams->links('zyk_admin.utils._pagination', ['pages' => $teams]) }}
            </div>
        </div>
    </div>
    
    @include('zyk_admin.utils._popup_common')
@endsection