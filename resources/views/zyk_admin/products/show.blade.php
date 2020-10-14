@extends('admin.products.base')

@section('action-content')
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-slug">Chi Tiết Sản Phẩm</h3>
                        @if(Session::has('error'))
                            <p class="alert {{ Session::get('alert-class', 'alert-warning') }}">{{ Session::get('error') }}<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></p>
                        @endif
                        @if(Session::has('success'))
                            <p class="alert {{ Session::get('alert-class', 'alert-success') }}">{{ Session::get('success') }}<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></p>
                        @endif
                    </div>
                    <?php
                        $langs = ['vi' => 'Tiếng Việt', 'en' => 'Tiếng Anh']
                    ?>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="panel panel-default">
                                <div class="panel-heading">Thông Tin</div>
                                <div class="panel-body">
                                    <div class="my-3 p-3 bg-white rounded box-shadow">
                                        @foreach($detail->lang as $item)
                                            <div class="media text-muted pt-3" style="border-bottom: 1px solid #777777">
                                                <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                                                    <h4 class="d-block text-gray-dark">Tiêu Đề ({{ $langs[$item->lang] }})</h4>
                                                    {{ $item->title }}
                                                </p>
                                            </div>
                                            <div class="media text-muted pt-3" style="border-bottom: 1px solid #777777">
                                                <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                                                    <h4 class="d-block text-gray-dark">Tiêu Đề Phụ  ({{ $langs[$item->lang] }})</h4>
                                                    {{ $item->sub_title }}
                                                </p>
                                            </div>
                                            <div class="media text-muted pt-3" style="border-bottom: 1px solid #777777">
                                                <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                                                    <h4 class="d-block text-gray-dark">Mô Tả  ({{ $langs[$item->lang] }})</h4>
                                                    {!! $item->description !!}
                                                </p>
                                            </div>
                                            <div class="media text-muted pt-3" style="border-bottom: 1px solid #777777">
                                                <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                                                    <h4 class="d-block text-gray-dark">Nội Dung  ({{ $langs[$item->lang] }})</h4>
                                                {!! $item->content !!}
                                                </p>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="panel panel-default">
                                <div class="panel-heading">Thumb</div>
                                <div class="panel-body">
                                    <img src="{{ asset('storage/app'. $detail->cover_mask) }}" width="50%" alt="..." class="margin">
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">Danh Sách Ảnh</div>
                                <div class="panel-body">
                                    @foreach($detail->images as $iamge)
                                        <img src="{{ asset('storage/app'. $iamge) }}" width="20%" alt="..." class="margin">
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

@endsection
