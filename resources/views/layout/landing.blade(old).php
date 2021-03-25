

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="{{asset('template')}}/dist/img/p3mlogosquare.svg" />
    <title>P3M - Landing</title>
        <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{asset('template')}}/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('template')}}/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{asset('template')}}/bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('template')}}/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{asset('template')}}/dist/css/skins/_all-skins.min.css">
    <!-- Morris chart -->
    <link rel="stylesheet" href="{{asset('template')}}/bower_components/morris.js/morris.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="{{asset('template')}}/bower_components/jvectormap/jquery-jvectormap.css">
    <!-- Date Picker -->
    <link rel="stylesheet" href="{{asset('template')}}/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{asset('template')}}/bower_components/bootstrap-daterangepicker/daterangepicker.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="{{asset('template')}}/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
    <link rel="stylesheet" href="{{asset('css')}}/tweaks.css">
    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition fixed">

    <div class="wrapper">
        <header class="main-header primary-color">
            <img src="{{asset('template')}}/dist/img/p3mlogo.svg" alt="P3M Logo" class="logo">
            <div class="navbar-custom-menu">
                <nav class="navbar navbar-static-top" style="margin-right: 5rem;">
                    <ul class="nav navbar-nav">
                        <li>
                            <a href="{{url('/login')}}" class="rounded-button">Sign In</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </header>

        <div class="landing-content">
            <div class="landing-box">
                <h3>Latar Belakang</h3>
                <ol>
                    <li>Misi Kabupaten Sidoarjo : memberikan pelayanan kepada masyarakat secara professional</li>
                    <li>Tujuan Pemerintah Kabupaten Sidoarjo : meningkatkan kualitas layanan masyarakat.</li>
                    <li>Adanya perintisan manajemen pelayanan berstandar ISO 9001 - 2000 di Dinas Perijinan dan Penanaman Modal Kabupaten Sidoarjo.</li>
                    <li>Standar Internasional ( ISO 9001 - 9004 ) tentang pelayanan yang baik menyatakan bahwa untuk mengukur keberhasilan pelayanan Pemerintah kepada masyarakat adalah senantiasa mendengar keluhan-keluhan / pengaduan dari masyrakat (feedback from the customer)</li>
                    <li>Kebutuhan terhadap wadah komunikasi dua arah antara Pemerintah Kabupaten Sidoarjo dengan masyarakat guna menghindari terjadinya kebuntuan informasi dan komunikasi</li>
                    <li>Masyarakat membutuhkan wadah yang tepat sebagai tempat mengadukan berbagai permasalahan yang timbul sekaligus memperoleh jawaban yang dibutuhkan </li>
                </ol>
                
                <h3>Media Pengaduan</h3>
                <ol>
                    <li>Formulir Pengaduan, disediakan di Kantor Sekretariat P3M</li>
                    <li>Surat</li>
                    <li>Email</li>
                    <li>Telepon / Fax</li>
                    <li>Media Cetak (surat kabar, majalah, tabloid, dll)</li>
                    <li>Media Elektronik ( Radio dan Televisi )</li>
                    <li>Form pengaduan pada aplikasi pengaduan masyarakat pada situs p3m.sidoarjokab.go.id</li>
                    <li>Masyarakat membutuhkan wadah yang tepat sebagai tempat mengadukan berbagai permasalahan yang timbul sekaligus memperoleh jawaban yang dibutuhkan </li>
                </ol>

                <h3>Media Respon</h3>
                <ol>
                    <li>Papan pengumuman yang tersedia di Kantor Sekretariat P3M dan Kantor instansi Pemerintah Kabupaten Sidoarjo, dan tempat lainnya</li>
                    <li>Media Cetak (surat kabar, majalah, tabloid)</li>
                    <li>Radio</li>
                    <li>Aplikasi pengaduan masyarakat di situs p3m.sidoarjokab.go.id</li>
                    <li>Masyarakat membutuhkan wadah yang tepat sebagai tempat mengadukan berbagai permasalahan yang timbul sekaligus memperoleh jawaban yang dibutuhkan </li>
                </ol>    
            </div>
        </div>
    </div>
    
    <!-- jQuery 3 -->
    <script src="{{asset('template')}}/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="{{asset('template')}}/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- iCheck -->
    <script src="{{asset('template')}}/plugins/iCheck/icheck.min.js"></script>
</body>

</html>