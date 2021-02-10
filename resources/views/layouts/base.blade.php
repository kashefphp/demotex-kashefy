<!DOCTYPE html>
<html>
<head>
<meta name="robots" content="noindex">
<meta name="googlebot" content="noindex">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="robots" content="nofollow">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>پنل مدیریت | داشبورد </title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
@yield('css')
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('plugins/font-awesome/css/font-awesome.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href={{ asset('css/adminlte.min.css') }}>
    <!-- iCheck -->
    <link rel="stylesheet" href={{ asset('plugins/iCheck/flat/blue.css') }}>
    <!-- Morris chart -->
    <link rel="stylesheet" href={{ asset('plugins/morris/morris.css') }}>
    <!-- jvectormap -->
    <link rel="stylesheet" href={{ asset('plugins/jvectormap/jquery-jvectormap-1.2.2.css') }}>
    <!-- Date Picker -->
    <link rel="stylesheet" href={{ asset('plugins/datepicker/datepicker3.css') }}>
    <!-- Daterange picker -->
    <link rel="stylesheet" href={{ asset('plugins/daterangepicker/daterangepicker-bs3.css') }}>
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href={{ asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}>
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- bootstrap rtl -->
    <link rel="stylesheet" href={{ asset('css/bootstrap-rtl.min.css') }}>
    <!-- template rtl version -->
    <link rel="stylesheet" href={{ asset('css/custom-style.css') }}>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body class="hold-transition sidebar-mini">

<div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
        <!-- Left navbar links -->
        <ul class="navbar-nav">

            <li class="nav-item d-none d-sm-inline-block">
                <a href="{{ url('admin/dashboard') }}" class="nav-link">خانه</a>
            </li>

        </ul>

        <div class="navbar">
            <a href="{{--{{ route('logout') }}--}}"><i style="color: red;" class="fa fa-fw fa-power-off"></i></a>
        </div>

        <!-- SEARCH FORM -->
      {{--  <form class="form-inline ml-3">
            <div class="input-group input-group-sm">
                <input class="form-control form-control-navbar" type="search" placeholder="جستجو" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-navbar" type="submit">
                        <i class="fa fa-search"></i>
                    </button>
                </div>
            </div>
        </form>--}}


        <!-- Right navbar links -->
        <ul class="navbar-nav mr-auto">
            <!-- Messages Dropdown Menu -->
            <li class="nav-item dropdown">

                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-left">
                    <a href="#" class="dropdown-item">
                        <!-- Message Start -->
                        <div class="media">
                            <img src="{{ asset('img/user8-128x128.jpg')}}" alt="User Avatar" class="img-size-50 img-circle ml-3">
                            <div class="media-body">
                                <h3 class="dropdown-item-title">
                                    پیمان احمدی
                                    <span class="float-left text-sm text-muted"><i class="fa fa-star"></i></span>
                                </h3>
                                <p class="text-sm">من پیامتو دریافت کردم</p>
                                <p class="text-sm text-muted"><i class="fa fa-clock-o mr-1"></i> 4 ساعت قبل</p>
                            </div>
                        </div>
                        <!-- Message End -->
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <!-- Message Start -->
                        <div class="media">
                            <img src="{{ asset('img/user3-128x128.jpg')}}" alt="User Avatar" class="img-size-50 img-circle ml-3">
                            <div class="media-body">
                                <h3 class="dropdown-item-title">
                                    سارا وکیلی
                                    <span class="float-left text-sm text-warning"><i class="fa fa-star"></i></span>
                                </h3>
                                <p class="text-sm">پروژه اتون عالی بود مرسی واقعا</p>
                                <p class="text-sm text-muted"><i class="fa fa-clock-o mr-1"></i>4 ساعت قبل</p>
                            </div>
                        </div>
                        <!-- Message End -->
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item dropdown-footer">مشاهده همه پیام‌ها</a>
                </div>
            </li>
            <!-- Notifications Dropdown Menu -->

        </ul>
    </nav>

    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="{{ url('product') }}" class="brand-link">
            <img src="{{ asset('img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                 style="opacity: .8">
            <span class="brand-text font-weight-light">پنل مدیریت</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar" style="direction: ltr">
            <div style="direction: rtl">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
{{--                    <div class="image">--}}
{{--                        <img src=""--}}
{{--                             class="img-circle elevation-2" alt="User Image">--}}
{{--                    </div>--}}
                    <div class="info">
                        <a href="#" class="d-block">
                            @if (\Illuminate\Support\Facades\Auth::check())
                                {{ \Illuminate\Support\Facades\Auth::user()->name }}
                            @endif
                        </a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">

                        <li class="nav-item has-treeview {{ !request()->is('/') ? 'menu-open' : ''}}">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fa fa-pie-chart"></i>
                                <p>
                                    مدیریت محصولات
                                    <i class="right fa fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item {{ request()->is('admin/category') || request()->is('admin/category_tags/*') ? 'menu-open' : ''}}">
                                    <a href="{{ route('product.index') }}" class="nav-link">
                                        <i class="fa fa-circle-o nav-icon"></i>
                                        <p>نمایش </p>
                                    </a>
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon fa fa-pie-chart"></i>
                                        <p>
                                            دسته بندی
                                            <i class="right fa fa-angle-left"></i>
                                        </p>
                                    </a>

                                    <ul class="nav nav-treeview" style="{{ request()->is('admin/category_tags') || request()->is('admin/category_tags/*') ? 'display: block;' : 'display: none;'}}">

                                        <li class="nav-item">
                                            <a href="{{ route('category.index') }}" class="nav-link">
                                                <i class="fa fa-circle-o nav-icon"></i>
                                                <p>نمایش </p>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-item {{ request()->is('detail') || request()->is('detail/*') ? 'menu-open' : ''}}" >
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon fa fa-pie-chart"></i>
                                        <p>
                                            جزییات
                                            <i class="right fa fa-angle-left"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview" style="{{ request()->is('admin/tags') || request()->is('admin/tags/*') ? 'display: block;' : 'display: none;'}}">
                                        <li class="nav-item">
                                            <a href="{{ route('detail.create') }}" class="nav-link">
                                                <i class="fa fa-circle-o nav-icon"></i>
                                                <p>ایجاد </p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ route('detail.index') }}" class="nav-link">
                                                <i class="fa fa-circle-o nav-icon"></i>
                                                <p>نمایش لیست </p>
                                            </a>
                                        </li>
                                    </ul>
                                </li>


                            </ul>
                        </li>

                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
        </div>
        <!-- /.sidebar -->
    </aside>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

@yield('content')


<!-- /.content -->
    </div>
<!-- /.content-wrapper -->
    <footer class="main-footer">
        <strong>Copy Right &copy; 2020 <a href="mailto: kashefymajid1992@gmail.com">مجید کاشفی</a>.</strong>
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="{{ asset('plugins/morris/morris.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{ asset('plugins/sparkline/jquery.sparkline.min.js') }}"></script>
<!-- jvectormap -->
<script src="{{ asset('plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
<script src="{{ asset('plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('plugins/knob/jquery.knob.js') }}"></script>
<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
<script src="{{ asset('plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- datepicker -->
<script src="{{ asset('plugins/datepicker/bootstrap-datepicker.js') }}"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="{{ asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>
<!-- Slimscroll -->
<script src="{{ asset('plugins/slimScroll/jquery.slimscroll.min.js') }}"></script>
<!-- FastClick -->
<script src="{{ asset('plugins/fastclick/fastclick.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('js/adminlte.js') }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('js/pages/dashboard.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('js/demo.js') }}"></script>

@include('sweet::alert')


@yield('js')

</body>
</html>

