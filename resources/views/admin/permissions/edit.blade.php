@extends('admin.master')

@section('head-assets')
    @include('admin.partials.head-assets')
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
        Edit permission
        <small>Edit permission details</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="/admin"><i class="fa fa-dashboard"></i> Dashboard </a></li>
        <li><a href="/admin/permission/add"><i class="fa fa-key"></i> Permissions overview </a></li>
        <li><a href="#"><i class="fa fa-pencil-square-o"></i> Edit permission </a></li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Edit permission details below</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    @include('errors.error-snippet')
                    <form  method="POST" action="" class="form-horizontal">
                        {!! csrf_field() !!}
                        <div class="form-group">
                            <label class="col-md-3 control-label"> Role name </label>
                            <div class="col-md-6">
                                <input type="text" name="name" class="form-control" value="{{ $permission->name }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label"> Route </label>
                            <div class="col-md-6">
                                <input type="text" name="route" class="form-control" value="{{ $permission->route }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label"> Display name </label>
                            <div class="col-md-6">
                                <input type="text" name="display_name" class="form-control" value="{{ $permission->display_name }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label"> Description </label>
                            <div class="col-md-6">
                                <input type="text" name="description" class="form-control" value="{{ $permission->description }}">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-9 col-md-offset-3">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Update permission </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /.row -->
</section>
<!-- /.content -->

@stop

@section('main-footer')
    @include('admin.partials.main-footer')
@stop

@section('footer-assets')
    @include('admin.partials.footer-assets')
@stop





