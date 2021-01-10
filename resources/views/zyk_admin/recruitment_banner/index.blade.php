@extends('zyk_admin.layouts.content')

@section('title')
    Banner tuyển dụng
@endsection

@section('view')
    <div class="view-header">
        <div class="view-header-left">
            <div class="header-navigation">
                <h3>
                    Banner tuyển dụng
                </h3>
            </div>
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
                    <div class="item-col-3">
                        <p class="p-overline">
                            Banner
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
                <div class="item-row item-row-{{ $result->id }}">
                    <div class="item-col-1">
                        <p class="text-break">
                            {{ $result->id }}
                        </p>
                    </div>
                    <div class="item-col-3">
                        <img src="{{ asset('storage/app'. $result->image) }}" alt="Thumb of {{ $result->image }}" width="100%">
                    </div>
                    <div class="item-col-1-half">
                        <p class="text-break">
                            {{ $result->created_at }}
                        </p>
                    </div>
                    <div class="item-col-1-half">
                        <p class="text-break">
                            {{ $result->updated_at }}
                        </p>
                    </div>
                    <div class="item-col-1">
                        <div class="btn-group">
                            <button class="btn btn-sm btn-update-item" data-url="{{ route('banner-tuyen-dung.edit', ['banner_tuyen_dung' => $result->id]) }}" data-popup-full="true" type="button">
                                <i class="elo el-pencil"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('zyk_admin.utils._popup_common')
@endsection
@section('js')
    <!-- TINYMCE JS -->
    <script  src="{{ asset('plugins/tinymce/tinymce.min.js') }}"></script>

    <!-- SELECT2 JS -->
    <script  src="{{ asset('plugins/select2/select2.full.js') }}"></script>
@endsection
