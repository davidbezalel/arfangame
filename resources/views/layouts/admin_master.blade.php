<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> ArfanGame | {{ $data['title'] }} </title>

    {{-- make site responsive to the screen width --}}
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    {{-- load all required css --}}
    <link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/font-awesome.min.css">
    <link rel="stylesheet" href="/dist/css/AdminLTE.css">
    <link rel="stylesheet" href="/dist/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="/plugins/iCheck/flat/blue.css">
    <link rel="stylesheet" href="/plugins/datatables/dataTables.bootstrap.css">
    <link rel="stylesheet" href="/plugins/morris/morris.css">
    <link rel="stylesheet" href="/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
    <link rel="stylesheet" href="/plugins/datepicker/datepicker3.css">
    <link rel="stylesheet" href="/plugins/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
    <link rel="stylesheet" href="/css/datatable_custom.css">
    <link rel="stylesheet" href="/css/style.css">


    {{-- load all additional css --}}
    <?php
    if (isset($data['styles'])) {
        foreach ($data['styles'] as $style) {
            echo '<link rel="stylesheet" href="/css/' . $style . '">';
        }
    }
    ?>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    <header class="main-header">

        <!-- Logo -->
        <a href="/dashboard" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>AG</b></span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>Arfan</b>Game</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>

            <div class="navbar-custom-menu">
                <ul class="navbar-nav nav">

                    <!-- Notifications: style can be found in dropdown.less -->
                    <li class="dropdown notifications-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-bell-o"></i>
                            <span class="label label-warning">10</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">You have 10 notifications</li>
                            <li>
                                <!-- inner menu: contains the actual data -->
                                <ul class="menu">
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-users text-aqua"></i> 5 new members joined today
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-warning text-yellow"></i> Very long description here that
                                            may not fit into the
                                            page and may cause design problems
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-users text-red"></i> 5 new members joined
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-shopping-cart text-green"></i> 25 sales made
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-user text-red"></i> You changed your username
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="footer"><a href="#">View all</a></li>
                        </ul>
                    </li>

                    {{-- log out  --}}
                    <li style="background-color: #23527c; margin-left: 20px;"><a href="/admin/logout">Log Out</a></li>
                </ul>
            </div>
        </nav>
    </header>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @yield('content')
    </div>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="/assets/default_icons/administrator.png" class="img-circle user_photo_dashboard"
                         alt="User Image">
                </div>
                <div class="pull-left info">
                    <p>{{ Auth::user()->name }}</p>
                    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
            </div>
            <!-- /.search form -->
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu">
                {{-- dashboard menu --}}
                <li class="<?php echo ($data['controller'] == 'dashboard' ? 'active' : ''); ?> treeview">
                    <a href="/admin/dashboard">
                        <i class="fa"><span class="glyphicon glyphicon-dashboard"></span></i> <span>Dashboard</span>
                    </a>
                </li>
                {{-- player menu --}}
                <li class="<?php echo ($data['controller'] == 'player' ? 'active' : ''); ?> treeview">
                    <a href="/admin/dashboard">
                        <i class="fa fa-users"></i> <span>Player</span>
                    </a>
                </li>
                {{-- game menu --}}
                <li class="<?php echo ($data['controller'] == 'game' ? 'active' : ''); ?> treeview">
                    <a href="/admin/dashboard">
                        <i class="fa fa-gamepad"></i> <span>Game</span>
                        <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="<?php echo($data['function'] == 'togel' ? 'active' : ''); ?>"><a href="#"><i class="fa fa-american-sign-language-interpreting"></i>Togel</a></li>
                        <li class="<?php echo($data['function'] == 'bola' ? 'active' : ''); ?>"><a href="#"><i class="fa fa-futbol-o"></i>Bola</a></li>
                    </ul>
                </li>
                {{-- transaction menu --}}
                <li class="<?php echo ($data['controller'] == 'transaction' ? 'active' : ''); ?> treeview">
                    <a href="/admin/dashboard">
                        <i class="fa"><span class="glyphicon glyphicon-transfer"></span></i><span>Transaction</span>
                    </a>
                </li>
            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>

    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <b>Version</b> beta
        </div>
        <strong>&copy; 2017 </strong>
        All rights reserved.
    </footer>


    <!-- /.control-sidebar -->
    <!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

{{-- load all required javascript --}}
<script src="/plugins/jQuery/jquery-2.2.3.min.js"></script>
<script src="/bootstrap/js/bootstrap.min.js"></script>
<script src="/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="/plugins/datatables/dataTables.bootstrap.min.js"></script>
<script src="/dist/js/app.min.js"></script>
<script src="/js/admin.js"></script>

{{-- load all the additional javascript --}}
<?php
if (isset($data['scripts'])) {
    foreach ($data['scripts'] as $script) {
        echo '<script src="/js/' . $script . '"></script>';
    }
}
?>
{{--<script src="/dist/js/pages/dashboard.js"></script>--}}
{{--<script src="/dist/js/demo.js"></script>--}}

</body>
</html>
