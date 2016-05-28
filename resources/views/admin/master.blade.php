<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>BaseApp 0.1</title>
    @yield('head-assets')
</head>
<body class="hold-transition skin-purple sidebar-mini">
<div class="wrapper">

    @yield('main-header')

    @yield('main-sidebar')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @yield('main-content')
    </div>
    <!-- /.content-wrapper -->

    @yield('main-footer')

</div>
<!-- ./wrapper -->

@yield('footer-assets')
</body>
</html>
