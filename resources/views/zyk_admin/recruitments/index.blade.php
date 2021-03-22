@extends('zyk_admin.layouts.content')

@section('title')
    Bài viết tuyển dụng
@endsection

@section('view')
    <div class="view-header">
        <div class="view-header-left">
            <div class="header-navigation">
                <h3>
                    Bài viết tuyển dụng
                </h3>
            </div>
        </div>

        <div class="view-header-right">
            @include('zyk_admin.utils._search', ['route' => route('tuyen-dung.index'), 'keyword' => $keyword])

            <button class="btn btn-primary btn-update-item" data-url="{{ route('tuyen-dung.create') }}" type="button" data-popup-full="true">
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
                                'routeEdit' => route('tuyen-dung.edit', ['tuyen_dung' => $value->id]),
                                'routeDel' => route('tuyen-dung.remove', ['tuyen_dung' => $value->id]),
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
    {{-- <script  src="{{ asset('plugins/tinymce/tinymce.min.js') }}"></script> --}}
    <script src="https://cdn.tiny.cloud/1/oj84zl752xbwr8k0visg3kosy189okrqsy5jt9bp6kmpnhgz/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

    <!-- SELECT2 JS -->
    <script  src="{{ asset('plugins/select2/select2.full.js') }}"></script>
@endsection
