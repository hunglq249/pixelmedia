@extends('zyk_admin.layouts.content')

@section('title')
    Ứng Tuyển
@endsection

@section('view')
    <div class="view-header">
        <div class="view-header-left">
            <div class="header-navigation">
                <h3>
                    Ứng Tuyển
                </h3>
            </div>
        </div>

        <div class="view-header-right">
            @include('zyk_admin.utils._search', ['route' => route('ung-tuyen.index'), 'keyword' => $keyword])
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
                    <div class="item-col-1">
                        <p class="p-overline">
                            Họ & Tên
                        </p>
                    </div>
                    <div class="item-col-1">
                        <p class="p-overline">
                            Email
                        </p>
                    </div>
                    <div class="item-col-1">
                        <p class="p-overline">
                            Điện Thoại
                        </p>
                    </div>
                    <div class="item-col-4">
                        <p class="p-overline">
                            Nội Dung
                        </p>
                    </div>
                    <div class="item-col-1">
                        <p class="p-overline">
                            Trạng Thái
                        </p>
                    </div>
                    <div class="item-col-1">
                        <p class="p-overline">
                            Thời Gian Tạo
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
                @foreach($result as $item)
                <div class="item-row">
                    <div class="item-col-1">
                        <p class="text-break">
                            {{ $item->id }}
                        </p>
                    </div>
                    <div class="item-col-1">
                        <p class="text-break">
                            {{ $item->name }}
                        </p>
                    </div>
                    <div class="item-col-1">
                        <p class="text-break">
                            {{ $item->email }}
                        </p>
                    </div>
                    <div class="item-col-1">
                        <p class="text-break">
                            {{ $item->phone }}
                        </p>
                    </div>
                    <div class="item-col-4">
                        <p class="text-break">
                            {!! $item->message !!}
                        </p>
                    </div>
                    <div class="item-col-1">
                        <p class="text-break">
                            {{ $item->status }}
                        </p>
                    </div>
                    <div class="item-col-1-half">
                        <p class="text-break">
                            {{ $item->created_at }}
                        </p>
                    </div>
                    <div class="item-col-1">
                        <div class="btn-group">
                            <button class="btn btn-sm btn-update-status" data-url="{{ route('ung-tuyen.updateStatus', ['id' => $item->id, 'status' => 1]) }}" type="button">
                                <i class="elo el-pencil"></i>
                            </button>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

        </div>
    </div>

    @include('zyk_admin.utils._popup_common')
@endsection
