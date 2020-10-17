@extends('zyk_admin.layouts.content')

@section('title')
    Danh Sách Danh Mục Bài Viết
@endsection

@section('view')
    <div class="view-header">
        <div class="view-header-left">
            <div class="header-navigation">
                <h3>
                    DS Danh Mục Bài Viết
                </h3>
            </div>
        </div>

        <div class="view-header-right">
            @include('zyk_admin.utils._search', ['route' => route('danh-muc-bai-viet.index'), 'keyword' => $keyword])

            <button class="btn btn-primary btn-update-item" data-url="{{ route('danh-muc-bai-viet.create') }}" type="button">
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
                    <div class="item-col-2">
                        <p class="p-overline">
                            Tiêu Đề (Tiếng Việt)
                        </p>
                    </div>
                    <div class="item-col-2">
                        <p class="p-overline">
                            Tiêu Đề (Tiếng Anh)
                        </p>
                    </div>
                    <div class="item-col-1">
                        <p class="p-overline">
                            Slug
                        </p>
                    </div>
                    <div class="item-col-1">
                        <p class="p-overline">
                            Tài Khoản Tạo
                        </p>
                    </div>
                    <div class="item-col-1">
                        <p class="p-overline">
                            Tài Khoản Cập Nhật
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
                @foreach($categories as $key => $value)
                    <div class="item-row item-row-{{ $value->id }}">
                        <div class="item-col-1">
                            <p class="text-break">
                                {{ $value->id }}
                            </p>
                        </div>
                        <div class="item-col-2">
                            <p class="text-break">
                                @if(count($value->lang) > 0)
                                    @foreach($value->lang as $item)
                                        @if($item->lang == 'vi')
                                            {{$item->title}}
                                        @endif
                                    @endforeach
                                @endif
                            </p>
                        </div>
                        <div class="item-col-2">
                            <p class="text-break">
                                @if(count($value->lang) > 0)
                                    @foreach($value->lang as $item)
                                        @if($item->lang == 'en')
                                            {{$item->title}}
                                        @endif
                                    @endforeach
                                @endif
                            </p>
                        </div>
                        <div class="item-col-1">
                            <p class="text-break">
                                {{ $value->slug }}
                            </p>
                        </div>
                        <div class="item-col-1">
                            <p class="text-break">
                                {{ $value->created_by }}
                            </p>
                        </div>
                        <div class="item-col-1">
                            <p class="text-break">
                                {{ $value->updated_by }}
                            </p>
                        </div>
                        <div class="item-col-1-half">
                            <p class="text-break">
                                {{ $value->created_at }}
                            </p>
                        </div>
                        <div class="item-col-1-half">
                            <p class="text-break">
                                {{ $value->updated_at }}
                            </p>
                        </div>
                        <div class="item-col-1">
                            @include('zyk_admin.utils.btn_group_actions', [
                                'routeEdit' => route('danh-muc-bai-viet.edit', ['danh_muc_bai_viet' => $value->id]),
                                'routeDel' => route('danh-muc-bai-viet.remove', ['danh_muc_bai_viet' => $value->id]),
                                'idDel' => $value->id,
                            ])
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    @include('zyk_admin.utils._popup_common')
@endsection