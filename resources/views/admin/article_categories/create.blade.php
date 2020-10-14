@extends('admin.article_categories.base')

@section('action-content')
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-slug">Thêm Mới Danh Mục Bài Viết</h3>
                        @if(Session::has('error'))
                            <p class="alert {{ Session::get('alert-class', 'alert-warning') }}">{{ Session::get('error') }}</p>
                        @endif
                    </div>

                    <div class="box-body">
                        <form action="{{ route('danh-muc-bai-viet.store') }}" method="post">
                            @include('admin.article_categories.form', ['title_vi' => '', 'title_en' => '', 'slug' => ''])
                            <div class="card-footer text-right">
                                <button type="submit" class="btn btn-primary">Thêm mới</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
