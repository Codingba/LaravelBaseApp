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
        Add user
        <small>create a new user here</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="/admin"><i class="fa fa-dashboard"></i> Dashboard </a></li>
        <li><a href="/admin/users"><i class="fa fa-users"></i> Users overview </a></li>
        <li><a href="#"><i class="fa fa-plus-square-o"></i> Add user </a></li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Create new user below</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    @include('errors.error-snippet')
                    <form  method="POST" action="" class="form-horizontal">
                        {!! csrf_field() !!}

                        <div class="form-group">
                            <label class="col-md-3 control-label"> Name </label>
                            <div class="col-md-6">
                                <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Last name</label>
                            <div class="col-md-6">
                                <input type="text" name="last_name" class="form-control" value="{{ old('last_name') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label"> E-mail * </label>
                            <div class="col-md-6">
                                <input type="email" name="email" class="form-control" value="{{ old('email') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label"> Repeat E-mail * </label>
                            <div class="col-md-6">
                                <input type="email" name="email_confirmation" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label"> Password * </label>
                            <div class="col-md-6">
                                <input type="password" name="password" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label"> Repeat Password * </label>
                            <div class="col-md-6">
                                <input type="password" name="password_confirmation" class="form-control">
                            </div>
                        </div>
                        <div class="save-button">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Add user </button>
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