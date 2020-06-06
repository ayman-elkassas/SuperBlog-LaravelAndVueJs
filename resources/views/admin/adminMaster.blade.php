<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 3 | Blank Page</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

{{--    Style--}}
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

{{--    csrftoken--}}
    <meta name="csrf-token" content="{{csrf_token()}}">

</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div id="app" class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <!-- Messages Dropdown Menu -->
            <!-- Notifications Dropdown Menu -->
            <li class="nav-item">
                <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#">
                    <i class="fa fa-th-large"></i>
                </a>
            </li>
        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="../../index3.html" class="brand-link">
            <img src="{{asset('assets/admin/default/admin2.png')}}"
                 alt="AdminLTE Logo"
                 class="brand-image img-circle elevation-3"
                 style="opacity: .8">
            <span class="brand-text font-weight-light">{{auth()->user()->name}}</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
						 with font-awesome or any other icon font library -->
                    <li class="nav-item has-treeview">
                        <router-link to='/home' class="nav-link">
                            <i class="nav-icon fa fa-dashboard"></i>
                            <p>
                                Dashboard
                                <i class="right fa fa-angle-left"></i>
                            </p>
                        </router-link>
{{--                        <ul class="nav nav-treeview">--}}
{{--                            <li class="nav-item">--}}
{{--                                <a href="../../index.html" class="nav-link">--}}
{{--                                    <i class="fa fa-circle-o nav-icon"></i>--}}
{{--                                    <p>Dashboard v1</p>--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                            <li class="nav-item">--}}
{{--                                <a href="../../index2.html" class="nav-link">--}}
{{--                                    <i class="fa fa-circle-o nav-icon"></i>--}}
{{--                                    <p>Dashboard v2</p>--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                            <li class="nav-item">--}}
{{--                                <a href="../../index3.html" class="nav-link">--}}
{{--                                    <i class="fa fa-circle-o nav-icon"></i>--}}
{{--                                    <p>Dashboard v3</p>--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                        </ul>--}}
                    </li>
                    <li class="nav-item">
                        <router-link to="/category-list" class="nav-link">
                            <i class="nav-icon fa fa-th"></i>
                            <p>
                                Category
                            </p>
                        </router-link>
                    </li>
                    <li class="nav-item">
                        <router-link to="/post-list" class="nav-link">
                            <i class="nav-icon fa fa-th"></i>
                            <p>
                                Post
                                <span class="right badge badge-danger">New</span>
                            </p>
                        </router-link>
                    </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Main content -->
        <admin-main></admin-main>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

{{--    <example-component></example-component>--}}

    <footer class="main-footer">
        <div class="float-right d-none d-sm-block">
            <b>Version</b> 3.0.0-alpha
        </div>
        <strong>Copyright &copy; 2014-2018 <a href="http://adminlte.io">AdminLTE.io</a>.</strong> All rights
        reserved.
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<script src="{{ asset('js/app.js') }}" defer></script>

</body>
</html>
