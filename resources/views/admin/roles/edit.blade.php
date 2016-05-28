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
        Edit role
        <small>edit role details</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="/admin"><i class="fa fa-dashboard"></i> Dashboard </a></li>
        <li><a href="/admin/roles"><i class="fa fa-credit-card"></i> Roles overview </a></li>
        <li><a href="#"><i class="fa fa-pencil-square-o"></i> Edit role </a></li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Edit role details below</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
					<form  method="POST" action="" class="form-horizontal form-bordered">
                        {!! csrf_field() !!}
                        <div class="form-group">
                            <label class="col-md-3 control-label"> Role name </label>
                            <div class="col-md-6">
                                <input type="text" name="name" class="form-control" value="{{ $role->name }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label"> Role display name </label>
                            <div class="col-md-6">
                                <input type="text" name="display_name" class="form-control" value="{{ $role->display_name }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label"> Description </label>
                            <div class="col-md-6">
                                <input type="text" name="description" class="form-control" value="{{ $role->description }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label"> Permissions: </label>
                            <div class="col-md-6">
                                @foreach($permissions as $permission)
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" {{ (in_array($permission->id, $role->perms->pluck('id')->toArray())) ? 'checked' : '' }} name="permissions[]" value="{{ $permission->id }}">{{ $permission->name }}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-9 col-md-offset-3">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Update role </button>
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