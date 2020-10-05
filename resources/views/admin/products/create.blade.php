@extends('admin.products.base')

@section('action-content')
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-slug">Thêm Mới sản phẩm</h3>
                        @if(Session::has('error'))
                            <p class="alert {{ Session::get('alert-class', 'alert-warning') }}">{{ Session::get('error') }}</p>
                        @endif
                    </div>

                    <div class="box-body">
                        <form action="{{ route('san-pham.store') }}" method="post" enctype="multipart/form-data">
                            @include('admin.products.form', [
                                    'title_vi' => '', 'title_en' => '',
                                    'sub_title_vi' => '', 'sub_title_en' => '',
                                    'description_vi' => '', 'description_en' => '',
                                    'content_vi' => '', 'content_en' => '', 'slug' => '',
                                    'client' => '', 'date' => '', 'images' => '', 'product' => '',
                                    'categories' => $customCategories, 'teams' => $customTeams,
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
