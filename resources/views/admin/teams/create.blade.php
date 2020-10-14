@extends('admin.teams.base')


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
                        <form action="{{ route('thanh-vien.store') }}" method="post" enctype="multipart/form-data">
                            @include('admin.teams.form', [
                                'name' => null, 'position' => null, 'error' => $errors, 'is_update' => false
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


