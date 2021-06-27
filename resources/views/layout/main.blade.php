<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="{{ asset('template') }}/dist/img/p3mlogo-ori-hd-remake-logo.png" />
    <title>P3M - @yield('title')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{ asset('template') }}/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('template') }}/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ asset('template') }}/bower_components/Ionicons/css/ionicons.min.css">
    <!-- DataTables -->
    <link rel="stylesheet"
        href="{{ asset('template') }}/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('template') }}/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{ asset('template') }}/dist/css/skins/_all-skins.min.css">
    <!-- Morris chart -->
    <!-- <link rel="stylesheet" href="{{ asset('template') }}/bower_components/morris.js/morris.css"> -->
    <!-- jvectormap -->
    <link rel="stylesheet" href="{{ asset('template') }}/bower_components/jvectormap/jquery-jvectormap.css">
    <!-- Date Picker -->
    <link rel="stylesheet"
        href="{{ asset('template') }}/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet"
        href="{{ asset('template') }}/bower_components/bootstrap-daterangepicker/daterangepicker.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="{{ asset('template') }}/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
    <link rel="stylesheet" href="{{ asset('template') }}/plugins/iCheck/all.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('template') }}/bower_components/select2/dist/css/select2.min.css">
    <link rel="stylesheet" href="{{ asset('css') }}/tweaks.css">

    <!-- Google Font -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

    @toastr_css
    <style>
        .aduan-urgent {
            animation: blinker 2s linear infinite;
        }

        .aduan-danger {
            animation: blinker-danger 2s linear infinite;
        }

        @keyframes blinker {
            50% {
                /* background: #FFFACD; */
                background: #f6e58d;
            }
        }

        @keyframes blinker-danger {
            50% {
                /* background: #FFFACD; */
                background: #f54263;
            }
        }

    </style>
    @yield('head')

    @yield('css')
</head>

<body class="hold-transition sidebar-mini">
    <?php $userRole = Auth::user()->level_id; ?>
    <div class="wrapper">

        <header class="main-header header-gradient">
            <a href="#" class="logo">
                <span class="logo-mini"><img src="{{ asset('template') }}/dist/img/p3mlogo-ori-hd-remake-logo.png"
                        alt="P3M Logo" class="logo"></span>
                <span class="logo-lg"><img src="{{ asset('template') }}/dist/img/p3mlogo-ori-hd-remake.png"
                        alt="P3M Logo" class="logo"></span>
            </a>
            <nav class="navbar navbar-static-top" style="margin-right: 5rem;">
                {{-- <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a> --}}
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <li>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                                <button type="submit" class="btn rounded-button">Sign Out</button>
                            </form>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>

        <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar">
            <section class="sidebar">

                <div class="user-panel" style="white-space: normal">
                    <!-- <div class="pull-left image">
                        <img src="{{ asset('template') }}/dist/img/avatar.png" class="img-circle" alt="User Image">
                    </div> -->
                    <div class="panel-name">
                        <!-- pull-left info -->
                        <p style="font-weight: normal">
                            {{ Auth::user()->name }}<br><span
                                style="font-size:16px">{{ Auth::user()->level->level }}</span>
                        </p>
                        {{-- <p class="h1">Alexander</p>
                        {{ var_dump(Auth::user()) }} --}}
                        <!-- <a href="#"><i class="fa fa-circle text-success"></i> Online</a> -->
                    </div>
                </div>

                <ul class="sidebar-menu" data-widget="tree" data-accordion=0>
                    @if (in_array($userRole, [1]))
                        {{-- <li class="">
                            <a href="{{ '/home' }}">
                                <i class="fa fa-home"></i> <span>Home</span>
                            </a>
                        </li> --}}
                    @endif
                    <li class="treeview active menu-open" style="font-weight:normal">
                        <!-- active menu-open -->
                        <a href="#">
                            <i class="fa fa-edit"></i> <span>Pengaduan</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{ '/pengaduan/create' }}"><i class="fa fa-edit"></i>Form Pengaduan</a>
                            </li>
                            <li><a href="{{ '/pengaduan' }}"><i class="fa fa-list"></i>Daftar Pengaduan</a>
                            </li>
                            {{-- <li><a href="{{ '/distribusi' }}"><i class="fa fa-chain"></i> Distribusi</a></li> --}}
                        </ul>
                    </li>
                    {{-- <li class="">
                        <a href="">
                            <i class="fa fa-commenting"></i> <span>Respon</span>
                            <span class="pull-right-container">
                                <small class="label pull-right bg-green">new</small>
                            </span>
                        </a>
                    </li> --}}
                    @if (in_array($userRole, [1]))
                        <li class="treeview active menu-open" style="font-weight:normal">
                            <a href="#">
                                <i class="fa fa-cogs"></i> <span>Pengaturan</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="{{ '/user' }}"><i class="fa fa-user"></i> User</a></li>
                                <li><a href="{{ '/opd' }}"><i class="fa fa-building"></i> OPD</a></li>
                                <li><a href="{{ '/bidang' }}"><i class="fa fa-archive"></i> Bidang</a></li>
                                <li><a href="{{ '/media' }}"><i class="fa fa-map"></i> Media</a></li>
                                <li><a href="{{ '/pekerjaan' }}"><i class="fa fa-briefcase"></i> Pekerjaan</a></li>
                            </ul>
                        </li>
                    @endif
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
    <script src="{{ asset('template') }}/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ asset('template') }}/bower_components/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button);

    </script>
    <!-- Bootstrap 3.3.7 -->
    <script src="{{ asset('template') }}/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- Morris.js charts -->
    <!-- <script src="{{ asset('template') }}/bower_components/raphael/raphael.min.js"></script>
    <script src="{{ asset('template') }}/bower_components/morris.js/morris.min.js"></script> -->
    <!-- Sparkline -->
    <script src="{{ asset('template') }}/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
    <!-- jvectormap -->
    <!-- <script src="{{ asset('template') }}/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="{{ asset('template') }}/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script> -->
    <!-- jQuery Knob Chart -->
    <script src="{{ asset('template') }}/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="{{ asset('template') }}/bower_components/moment/min/moment.min.js"></script>
    <script src="{{ asset('template') }}/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- datepicker -->
    <script src="{{ asset('template') }}/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js">
    </script>
    <!-- DataTables -->
    <script src="{{ asset('template') }}/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('template') }}/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="{{ asset('template') }}/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
    <!-- Slimscroll -->
    <script src="{{ asset('template') }}/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="{{ asset('template') }}/bower_components/fastclick/lib/fastclick.js"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('template') }}/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <!-- <script src="{{ asset('template') }}/dist/js/pages/dashboard.js"></script> -->
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('template') }}/dist/js/demo.js"></script>
    <!-- Select2 -->
    <!-- <script src="../../bower_components/select2/dist/js/select2.full.min.js"></script>
    <script>
        $(function () {
            //Initialize Select2 Elements
            $('.select2').select2()
        });
    </script> -->
    <script>
        function onlyNumber(evt) {

            // Only ASCII character in that range allowed
            var ASCIICode = (evt.which) ? evt.which : evt.keyCode
            if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
                return false;
            return true;
        }

    </script>

</body>
@toastr_js
@toastr_render
@yield('scripts')

</html>
