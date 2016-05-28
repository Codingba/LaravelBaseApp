@extends('admin.master')

@section('head-assets')
    @include('admin.partials.head-assets')
    <link rel="stylesheet" href="/assets/plugins/sweetalert/sweetalert2.min.css">
    <script src="/assets/plugins/sweetalert/sweetalert2.min.js"></script>
@stop

@section('main-header')
    @include('admin.partials.main-header')
@stop

@section('main-sidebar')
    @include('admin.partials.main-sidebar')
@stop

@section('main-content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Permissions overview
        <small>All app permissions are here</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="/admin"><i class="fa fa-dashboard"></i> Dashboard </a></li>
        <li><a href="#"><i class="fa fa-key"></i> Permissions overview </a></li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Permission list</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <tr>
                            <th>Name</th>
                            <th>Route</th>
                            <th class="col-md-1 center">Actions</th>
                        </tr>
                        @foreach($permissions as $permission)
                            <tr>
                                <td>{{ $permission->name }}</td>
                                <td>/{{ $permission->route }}</td>
                                <td class="col-md-1 center">
                                    <a class="btn btn-primary btn-xs" href="/admin/permission/edit/{{ $permission->id }}/"><i class="fa fa-pencil icon-only"></i></a>
                                    <button type="button" onclick="deletePermission('{{$permission->id}}');" class="btn btn-inverse btn-xs"><i class="fa fa-trash-o icon-only"></i></button>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>
    <!-- /.row -->
</section>
<!-- /.content -->
@stop

@section('main-footer')
    @include('admin.partials.main-footer')
    <script>
        function deletePermission(id) {
            swal({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then(function(isConfirm) {
                if (isConfirm) {
                    location.href = "/admin/permission/delete/" + id;
                }
            })
        }

    </script>
@stop

@section('footer-assets')
    @include('admin.partials.footer-assets')
@stop



