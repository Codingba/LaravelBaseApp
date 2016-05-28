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
        Edit user
        <small>edit user details here</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="/admin"><i class="fa fa-dashboard"></i> Dashboard </a></li>
        <li><a href="/admin/users"><i class="fa fa-users"></i> Users overview </a></li>
        <li><a href="#"><i class="fa fa-pencil-square-o"></i> Edit user </a></li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Edit user details below</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">

                    @include('errors.error-snippet')
                    <form  method="POST" action="" class="form-horizontal form-bordered">
                        {!! csrf_field() !!}

                        <div class="form-group">
                            <label class="col-md-3 control-label"> Name </label>
                            <div class="col-md-6">
                                <div class="input-group input-group-icon">
                                    <span class="input-group-addon">
                                        <span class="icon"><i class="fa fa-user"></i></span>
                                    </span>
                                    <input type="text" name="name" class="form-control" value="{{ $user->name }}">
                                </div>
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="col-md-3 control-label">E-mail </label>
                            <div class="col-md-6">
                                <div class="input-group input-group-icon">
                                    <span class="input-group-addon">
                                        <span class="icon"><i class="fa fa-at"></i></span>
                                    </span>
                                    <input type="text" name="email" readonly="readonly" class="form-control" placeholder="Enter valid email..." value="{{ $user->email }}">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Roles: </label>
                            <div class="col-md-6">
                                @foreach($roles as $role)
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" @if($user->hasRole($role->name)) {{'checked'}} @endif name="roles[]" value="{{ $role->id }}">{{ $role->name }}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Password </label>
                            <div class="col-md-6">
                                <div class="input-group input-group-icon">
                                            <span class="input-group-addon">
                                                <span class="icon"><i class="fa fa-key"></i></span>
                                            </span>
                                    <input type="password" name="password" class="form-control" placeholder="Enter password..." >
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Confirm password </label>
                            <div class="col-md-6">
                                <div class="input-group input-group-icon">
                                            <span class="input-group-addon">
                                                   <span class="icon"><i class="fa fa-key"></i></span>
                                           </span>
                                    <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm password...">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-9 col-md-offset-3">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Update user </button>
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