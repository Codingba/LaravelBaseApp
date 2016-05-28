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
        Admin area
        <small>BaseApp</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="/admin"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">

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