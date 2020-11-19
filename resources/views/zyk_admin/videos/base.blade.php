@extends('admin.layouts.master')
@section('content')
    <link href="{{ asset("admin_dist/bower_components/AdminLTE/plugins/select2/select2.min.css")}}" rel="stylesheet" type="text/css" />
    <style type="text/css">
        .select2-container--default .select2-selection--multiple .select2-selection__choice{
            background-color: #3c8dbc;
        }
        .select2-container--default .select2-selection--multiple .select2-selection__choice__remove {
            color: rgba(255,255,255,0.7);
        }
        .select2-container--default .select2-selection--multiple .select2-selection__choice__remove:hover {
            color: rgba(255,255,255,0.7);
        }
        .required{
            color: red;
        }
    </style>
    <section class="content-header">
        <h1>
            Video
        </h1>
        <ol class="breadcrumb">
            <li><a href=""><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Video</li>
        </ol>
    </section>

    @yield('action-content')

@endsection
@section('list-js')
<script src="{{ asset ("admin_dist/bower_components/AdminLTE/plugins/select2/select2.full.min.js") }}" type="text/javascript"></script>
<script>
    $(function () {
        $('.select2').select2();
    });
</script>
@endsection
