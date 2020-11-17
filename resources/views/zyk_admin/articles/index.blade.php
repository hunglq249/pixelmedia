@extends('zyk_admin.layouts.content')

@section('title')
    Bài Viết
@endsection

@section('view')
    <div class="view-header">
        <div class="view-header-left">
            <div class="header-navigation">
                <h3>
                    Bài Viết
                </h3>
            </div>
        </div>

        <div class="view-header-right">
            @include('zyk_admin.utils._search', ['route' => route('bai-viet.index'), 'keyword' => $keyword])

            <button class="btn btn-primary btn-update-item" data-url="{{ route('bai-viet.create') }}" data-popup-full="true" type="button">
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
                @foreach($result as $key => $value)
                    <div class="item-row item-row-{{ $value->id }}">
                        <div class="item-col-1">
                            <p class="text-break">
                                {{ $value->id }}
                            </p>
                        </div>
                        <div class="item-col-2">
                            @if(count($value->lang) > 0)
                                @foreach($value->lang as $item)
                                    @if($item->lang == 'vi')
                                        <p class="text-break">
                                            {{$item->title}}
                                        </p>
                                    @endif
                                @endforeach
                            @endif
                        </div>
                        <div class="item-col-2">
                            @if(count($value->lang) > 0)
                                @foreach($value->lang as $item)
                                    @if($item->lang == 'en')
                                        <p class="text-break">
                                            {{$item->title}}
                                        </p>
                                    @endif
                                @endforeach
                            @endif
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
                                'routeEdit' => route('bai-viet.edit', ['bai_viet' => $value->id]),
                                'routeDel' => route('bai-viet.remove', ['bai_viet' => $value->id]),
                                'idDel' => $value->id,
                                'popupFull' => true
                            ])
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="list-items-footer">
                {{ $result->links('zyk_admin.utils._pagination', ['pages' => $result]) }}
            </div>
        </div>
    </div>
    @include('zyk_admin.utils._popup_common')
@endsection

@section('js')
    <!-- TINYMCE JS -->
    <script  src="{{ asset('plugins/tinymce/tinymce.min.js') }}"></script>
@endsection