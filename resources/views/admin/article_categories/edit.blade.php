@extends('admin.article_categories.base')

@section('action-content')
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-slug">Cập Nhật Danh Mục</h3>
                        @if(Session::has('error'))
                            <p class="alert {{ Session::get('alert-class', 'alert-warning') }}">{{ Session::get('error') }}</p>
                        @endif
                    </div>

                    <div class="box-body">
                        <form action="{{ route('danh-muc-bai-viet.update', ['danh_muc_bai_viet' => $category->id]) }}" method="post" enctype="multipart/form-data">
                            {{ method_field('PUT') }}
                            @include('admin.article_categories.form', ['title_vi' => $title_vi, 'title_en' => $title_en, 'slug' => $category->slug])
                            <div class="card-footer text-right">
                                <button type="submit" class="btn btn-primary">Cập nhật</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
