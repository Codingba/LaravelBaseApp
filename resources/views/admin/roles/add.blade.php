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
        Add permission
        <small>create a new role here</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="/admin"><i class="fa fa-dashboard"></i> Dashboard </a></li>
        <li><a href="/admin/roles"><i class="fa fa-credit-card"></i> Roles overview </a></li>
        <li><a href="#"><i class="fa fa-plus-square-o"></i> Add role </a></li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Create your role below</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    @include('errors.error-snippet')
					<form  method="POST" action="" class="form-horizontal">
                        {!! csrf_field() !!}
                        <div class="form-group">
                            <label class="col-md-3 control-label"> Role name * </label>
                            <div class="col-md-6">
                                <input type="text" name="name" class="form-control" placeholder="what is the name of your role..." value="{{ old('name') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label"> Role display name </label>
                            <div class="col-md-6">
                                <input type="text" name="display_name" class="form-control" placeholder="choose a display name..." value="{{ old('display_name') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label"> Description </label>
                            <div class="col-md-6">
                                <input type="text" name="description" class="form-control" placeholder="describe the role (optional) ..." value="{{ old('description') }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label"> Permissions: </label>
                            <div class="col-md-6">
                                @foreach($permissions as $permission)
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="permissions[]" value="{{ $permission->id }}">{{ $permission->name }}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>

						<div class="row">
							<div class="col-sm-9 col-md-offset-3">
								<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Add role </button>
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