@extends('zyk_admin.layouts.content')

@section('title')
    Giới Thiệu
@endsection

@section('view')
    <div class="view-header">
        <div class="view-header-left">
            <div class="header-navigation">
                <h3>
                    Giới Thiệu
                </h3>
            </div>
        </div>

        <div class="view-header-right">
            <button class="btn btn-primary btn-update-item" data-url="{{ route('gioi-thieu.edit', ['gioi_thieu' => $detail->id]) }}" data-popup-full="true" type="button">
                Cập Nhật
            </button>
        </div>
    </div>

    <div class="view-body">
        <?php
            $langs = ['vi' => 'Tiếng Việt', 'en' => 'Tiếng Anh']
        ?>
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h6>
                            Thông Tin
                        </h6>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            @foreach($detail->lang as $item)
                                <div class="col-md-6">
                                    <h6 class="subtitle-md">
                                        Mô Tả  ({{ $langs[$item->lang] }})
                                    </h6>

                                    {!! $item->description !!}
                                </div>

                                <div class="col-md-6">
                                    <h6 class="subtitle-md">
                                        Nội Dung  ({{ $langs[$item->lang] }})
                                    </h6>

                                    {!! $item->content !!}
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card" style="margin-bottom: 1.5rem">
                    <div class="card-header">
                        <h6>
                            Ảnh cover
                        </h6>
                    </div>
                    <div class="card-body">
                        <div class="mask" style="width: 100%; height: 230px">
                            <img src="{{ asset('storage/app'. $detail->cover) }}" alt="Cover About">
                        </div>
                    </div>
                </div>

                <div class="card" style="margin-bottom: 1.5rem">
                    <div class="card-header">
                        <h6>
                            Danh Sách Ảnh 1
                        </h6>
                    </div>
                    <div class="card-body">
                        @foreach($detail->break['break1'] as $image)
                            <div class="mask" style="width: 33.33%; height: 170px">
                                <img src="{{ asset('storage/app'. $image) }}" alt="Image break 1">
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="card" style="margin-bottom: 1.5rem">
                    <div class="card-header">
                        <h6>
                            Danh Sách Ảnh 2
                        </h6>
                    </div>
                    <div class="card-body">
                        @foreach($detail->break['break1'] as $image)
                            <div class="mask" style="width: 33.33%; height: 170px">
                                <img src="{{ asset('storage/app'. $image) }}" alt="Image break 2">
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('zyk_admin.utils._popup_common')
@endsection

@section('css')
    <!-- SELECT2 CSS -->
    <link rel="stylesheet" href="{{ asset('plugins/select2/select2.min.css') }}">
@endsection

@section('js')
    <!-- TINYMCE JS -->
    {{-- <script  src="{{ asset('plugins/tinymce/tinymce.min.js') }}"></script> --}}
    <script src="https://cdn.tiny.cloud/1/oj84zl752xbwr8k0visg3kosy189okrqsy5jt9bp6kmpnhgz/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

    <!-- SELECT2 JS -->
    <script  src="{{ asset('plugins/select2/select2.full.js') }}"></script>
@endsection