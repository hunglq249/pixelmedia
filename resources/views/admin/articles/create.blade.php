@extends('admin.articles.base')

@section('action-content')
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-slug">Thêm Mới Bài Viết</h3>
                        @if(Session::has('error'))
                            <p class="alert {{ Session::get('alert-class', 'alert-warning') }}">{{ Session::get('error') }}</p>
                        @endif
                    </div>

                    <div class="box-body">
                        <form action="{{ route('bai-viet.store') }}" method="post" enctype="multipart/form-data">
                            @include('admin.articles.form', [
                                    'title_vi' => '', 'title_en' => '',
                                    'description_vi' => '', 'description_en' => '',
                                    'content_vi' => '', 'content_en' => '', 'slug' => '',
                                    'detail' => '', 'image' => '', 'article' => '',
                                    'categories' => $customCategories
                                ])
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
