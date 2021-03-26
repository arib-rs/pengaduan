<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="{{asset('template')}}/dist/img/p3mlogosquare.svg" />
    <title>P3M - @yield('title')</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{asset('template')}}/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('template')}}/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{asset('template')}}/bower_components/Ionicons/css/ionicons.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{asset('template')}}/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('template')}}/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{asset('template')}}/dist/css/skins/_all-skins.min.css">
    <!-- Morris chart -->
    <!-- <link rel="stylesheet" href="{{asset('template')}}/bower_components/morris.js/morris.css"> -->
    <!-- jvectormap -->
    <link rel="stylesheet" href="{{asset('template')}}/bower_components/jvectormap/jquery-jvectormap.css">
    <!-- Date Picker -->
    <link rel="stylesheet" href="{{asset('template')}}/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{asset('template')}}/bower_components/bootstrap-daterangepicker/daterangepicker.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="{{asset('template')}}/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
    <link rel="stylesheet" href="{{asset('template')}}/plugins/iCheck/all.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{asset('template')}}/bower_components/select2/dist/css/select2.min.css">
    <link rel="stylesheet" href="{{asset('css')}}/tweaks.css">

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    @yield('head')

    @yield('css')
</head>

<body class="hold-transition sidebar-mini">

    <div class="wrapper">
        
        <header class="main-header header-gradient">
            <a href="#" class="logo">
                <span class="logo-mini"><img src="{{asset('template')}}/dist/img/p3mlogosquare.svg" alt="P3M Logo" class="logo"></span>
                <span class="logo-lg"><img src="{{asset('template')}}/dist/img/p3mlogo.svg" alt="P3M Logo" class="logo"></span>
            </a>
            <nav class="navbar navbar-static-top" style="margin-right: 5rem;">
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <li>
                            <a href="" class="rounded-button"><i class="fa fa-sign-out" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;Sign Out</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>

        <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar">
            <section class="sidebar">

                <div class="user-panel">
                    <!-- <div class="pull-left image">
                        <img src="{{asset('template')}}/dist/img/avatar.png" class="img-circle" alt="User Image">
                    </div> -->
                    <div class="panel-name"><!-- pull-left info -->
                        <p class="h1">Alexander Pierce</p>
                        <!-- <a href="#"><i class="fa fa-circle text-success"></i> Online</a> -->
                    </div>
                </div>

                <ul class="sidebar-menu" data-widget="tree">
                    <li class=""><!-- active -->
                        <a href="">
                            <i class="fa fa-home"></i> <span>Home</span>
                        </a>
                    </li>
                    <li class="treeview"> <!-- active menu-open -->
                        <a href="#">
                        <i class="fa fa-edit"></i> <span>Pengaduan</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{ '/form_pengaduan' }}"><i class="fa fa-circle-o"></i> Form Pengaduan</a></li>
                            <li class=""><a href="{{ '/daftar_pengaduan' }}"><i class="fa fa-circle-o"></i> Daftar Pengaduan</a></li> <!-- active -->
                        </ul>
                    </li>
                    <li class=""><!-- active -->
                        <a href="">
                            <i class="fa fa-envelope"></i> <span>Respon</span>
                            <span class="pull-right-container">
                                <small class="label pull-right bg-green">new</small>
                            </span>
                        </a>
                    </li>
                </ul>

            </section>
        </aside>

        @yield('container')

        <footer class="main-footer">
            <div class="pull-right hidden-xs">
                <b>Version</b> 1.0
            </div>
            <strong>Copyright &copy; 2021 P3M Kab. Sidoarjo</a>.</strong> All rights reserved.
        </footer>

        <!-- <div class="control-sidebar-bg"></div> -->
    </div>
    <!-- ./wrapper -->

    @yield('modal')

    <!-- jQuery 3 -->
    <script src="{{asset('template')}}/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{asset('template')}}/bower_components/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.7 -->
    <script src="{{asset('template')}}/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- Morris.js charts -->
    <!-- <script src="{{asset('template')}}/bower_components/raphael/raphael.min.js"></script>
    <script src="{{asset('template')}}/bower_components/morris.js/morris.min.js"></script> -->
    <!-- Sparkline -->
    <script src="{{asset('template')}}/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
    <!-- jvectormap -->
    <!-- <script src="{{asset('template')}}/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="{{asset('template')}}/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script> -->
    <!-- jQuery Knob Chart -->
    <script src="{{asset('template')}}/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="{{asset('template')}}/bower_components/moment/min/moment.min.js"></script>
    <script src="{{asset('template')}}/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- datepicker -->
    <script src="{{asset('template')}}/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
    <!-- DataTables -->
    <script src="{{asset('template')}}/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="{{asset('template')}}/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="{{asset('template')}}/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
    <!-- Slimscroll -->
    <script src="{{asset('template')}}/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="{{asset('template')}}/bower_components/fastclick/lib/fastclick.js"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('template')}}/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <!-- <script src="{{asset('template')}}/dist/js/pages/dashboard.js"></script> -->
    <!-- AdminLTE for demo purposes -->
    <script src="{{asset('template')}}/dist/js/demo.js"></script>
    <!-- Select2 -->
    <!-- <script src="../../bower_components/select2/dist/js/select2.full.min.js"></script>
    <script>
        $(function () {
            //Initialize Select2 Elements
            $('.select2').select2()
        });
    </script> -->
</body>

@yield('scripts')

</html>