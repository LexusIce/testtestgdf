<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Dashboard</title>

    <!-- Fontfaces CSS-->
    <link href="{{asset('Admin/css/font-face.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('Admin/vendor/font-awesome-4.7/css/font-awesome.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('Admin/vendor/font-awesome-5/css/fontawesome-all.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('Admin/vendor/mdi-font/css/material-design-iconic-font.min.css')}}" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="{{asset('Admin/vendor/bootstrap-4.1/bootstrap.min.css')}}" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="{{asset('Admin/vendor/animsition/animsition.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('Admin/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('Admin/vendor/wow/animate.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('Admin/vendor/css-hamburgers/hamburgers.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('Admin/vendor/slick/slick.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('Admin/vendor/select2/select2.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('Admin/vendor/perfect-scrollbar/perfect-scrollbar.css')}}" rel="stylesheet" media="all">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!-- Main CSS-->
    <link href="{{asset('Admin/css/theme.css')}}" rel="stylesheet" media="all">

</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a class="logo" href="{{url('/admin/DashBoard')}}">
                            <img src="images/icon/logo.png" alt="CoolAdmin" />
                        </a>
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <nav class="navbar-mobile">
                <div class="container-fluid">
                    <ul class="navbar-mobile__list list-unstyled">
                        <li class="active has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-tachometer-alt"></i>Tables</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="{{url('/admin/MasterBarang')}}">Barang</a>
                                </li>
                                <li>
                                    <a href="{{url('/admin/ListTransaksi')}}">Transaksi</a>
                                </li>
                                @if(session()->get('Login') == 'Admin')
                                    <li>
                                        <a href="{{url('/admin/ListUser')}}">User</a>
                                    </li>
                                @endif
                            </ul>
                        </li>
                        <li>
                            <a class="js-arrow" href="#">
                                <i class="fas fa-tachometer-alt"></i>Service</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="{{url('/admin/Service')}}">Barang</a>
                                </li>
                                <li>
                                    <a href="{{url('/admin/ListService')}}">Transaksi</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="{{url('/admin/Transaksi')}}">
                                <i class="fas fa-table"></i>Transaksi</a>
                        </li>
                </div>
            </nav>
        </header>
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="{{url('/admin/DashBoard')}}">
                    <img src="images/icon/logo.png" alt="Cool Admin" />
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li class="active has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-tachometer-alt"></i>Tables</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="{{url('/admin/MasterBarang')}}">Barang</a>
                                </li>
                                <li>
                                    <a href="{{url('/admin/ListTransaksi')}}">Transaksi</a>
                                </li>
                                @if (session()->get('Login') == 'Admin')
                                    <li>
                                        <a href="{{url('/admin/ListUser')}}">User</a>
                                    </li>
                                @endif
                            </ul>
                        </li>
                        <li>
                            <a class="js-arrow" href="#">
                                <i class="fas fa-tachometer-alt"></i>Service</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="{{url('/admin/Service')}}">Input Service</a>
                                </li>
                                <li>
                                    <a href="{{url('/admin/ListService')}}">List Service</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="{{url('/admin/Transaksi')}}">
                                <i class="fas fa-table"></i>Transaksi</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">
                            <form class="form-header" action="" method="POST">
                                {{-- <input class="au-input au-input--xl" type="text" name="search" placeholder="Search for datas &amp; reports..." />
                                <button class="au-btn--submit" type="submit">
                                    <i class="zmdi zmdi-search"></i>
                                </button> --}}
                            </form>
                            <div class="header-button">
                                <div class="noti-wrap">
                                    <div class="noti__item js-item-menu">
                                        {{-- <i class="zmdi zmdi-comment-more"></i>
                                        <span class="quantity">1</span> --}}
                                        <div class="mess-dropdown js-dropdown">
                                            <div class="mess__title">
                                                {{-- <p>You have 2 news message</p> --}}
                                            </div>
                                            <div class="mess__item">
                                                <div class="image img-cir img-40">
                                                    {{-- <img src="images/icon/avatar-06.jpg" alt="Michelle Moreno" /> --}}
                                                </div>
                                                <div class="content">
                                                    {{-- <h6>Michelle Moreno</h6>
                                                    <p>Have sent a photo</p>
                                                    <span class="time">3 min ago</span> --}}
                                                </div>
                                            </div>
                                            <div class="mess__item">
                                                <div class="image img-cir img-40">
                                                    {{-- <img src="images/icon/avatar-04.jpg" alt="Diane Myers" /> --}}
                                                </div>
                                                <div class="content">
                                                    {{-- <h6>Diane Myers</h6>
                                                    <p>You are now connected on message</p>
                                                    <span class="time">Yesterday</span> --}}
                                                </div>
                                            </div>
                                            <div class="mess__footer">
                                                {{-- <a href="#">View all messages</a> --}}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="noti__item js-item-menu">
                                        {{-- <i class="zmdi zmdi-email"></i>
                                        <span class="quantity">1</span> --}}
                                        <div class="email-dropdown js-dropdown">
                                            <div class="email__title">
                                                {{-- <p>You have 3 New Emails</p> --}}
                                            </div>
                                            <div class="email__item">
                                                <div class="image img-cir img-40">
                                                    {{-- <img src="images/icon/avatar-06.jpg" alt="Cynthia Harvey" /> --}}
                                                </div>
                                                <div class="content">
                                                    {{-- <p>Meeting about new dashboard...</p>
                                                    <span>Cynthia Harvey, 3 min ago</span> --}}
                                                </div>
                                            </div>
                                            <div class="email__item">
                                                <div class="image img-cir img-40">
                                                    {{-- <img src="images/icon/avatar-05.jpg" alt="Cynthia Harvey" /> --}}
                                                </div>
                                                <div class="content">
                                                    {{-- <p>Meeting about new dashboard...</p>
                                                    <span>Cynthia Harvey, Yesterday</span> --}}
                                                </div>
                                            </div>
                                            <div class="email__item">
                                                <div class="image img-cir img-40">
                                                    {{-- <img src="images/icon/avatar-04.jpg" alt="Cynthia Harvey" /> --}}
                                                </div>
                                                <div class="content">
                                                    {{-- <p>Meeting about new dashboard...</p>
                                                    <span>Cynthia Harvey, April 12,,2018</span> --}}
                                                </div>
                                            </div>
                                            <div class="email__footer">
                                                {{-- <a href="#">See all emails</a> --}}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="noti__item js-item-menu">
                                        {{-- <i class="zmdi zmdi-notifications"></i>
                                        <span class="quantity">3</span> --}}
                                        <div class="notifi-dropdown js-dropdown">
                                            <div class="notifi__title">
                                                {{-- <p>You have 3 Notifications</p> --}}
                                            </div>
                                            <div class="notifi__item">
                                                <div class="bg-c1 img-cir img-40">
                                                    {{-- <i class="zmdi zmdi-email-open"></i> --}}
                                                </div>
                                                <div class="content">
                                                    {{-- <p>You got a email notification</p> --}}
                                                    {{-- <span class="date">April 12, 2018 06:50</span> --}}
                                                </div>
                                            </div>
                                            <div class="notifi__item">
                                                <div class="bg-c2 img-cir img-40">
                                                    {{-- <i class="zmdi zmdi-account-box"></i> --}}
                                                </div>
                                                <div class="content">
                                                    {{-- <p>Your account has been blocked</p> --}}
                                                    {{-- <span class="date">April 12, 2018 06:50</span> --}}
                                                </div>
                                            </div>
                                            <div class="notifi__item">
                                                <div class="bg-c3 img-cir img-40">
                                                    {{-- <i class="zmdi zmdi-file-text"></i> --}}
                                                </div>
                                                <div class="content">
                                                    {{-- <p>You got a new file</p>
                                                    <span class="date">April 12, 2018 06:50</span> --}}
                                                </div>
                                            </div>
                                            <div class="notifi__footer">
                                                {{-- <a href="#">All notifications</a> --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu">
                                        <div class="image">
                                            <img src="{{url('Admin/images/icon/avatar-01.jpg')}}" alt="John Doe" />
                                        </div>
                                        <div class="content">
                                            <a class="js-acc-btn" href="#">{{session()->get('Login')}}</a>
                                        </div>
                                        <div class="account-dropdown js-dropdown">
                                            <div class="info clearfix">
                                                <div class="image">
                                                    <a href="#">
                                                        <img src="{{url('Admin/images/icon/avatar-01.jpg')}}" alt="John Doe" />
                                                    </a>
                                                </div>
                                                <div class="content">
                                                    <h5 class="name">
                                                        <a href="#">{{session()->get('Login')}}</a>
                                                    </h5>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__body">
                                                @if (session()->get('Login') != "Admin")
                                                    <div class="account-dropdown__item">
                                                        <a href="#">
                                                            <i class="zmdi zmdi-account"></i>Change Password</a>
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="account-dropdown__footer">
                                                <a href="/admin/LogOut">
                                                    <i class="zmdi zmdi-power"></i>Logout</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="col-md-6"></div>
                    <div class="container-fluid">
                        @yield('contents')
                    </div>
                </div>
            </div>
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
        </div>

    </div>

    <!-- Jquery JS-->
    <script src="{{asset('Admin/vendor/jquery-3.2.1.min.js')}}"></script>
    <!-- Bootstrap JS-->
    <script src="{{asset('Admin/vendor/bootstrap-4.1/popper.min.js')}}"></script>
    <script src="{{asset('Admin/vendor/bootstrap-4.1/bootstrap.min.js')}}"></script>
    <!-- Vendor JS       -->
    <script src="{{asset('Admin/vendor/slick/slick.min.js')}}">
    </script>
    <script src="{{asset('Admin/vendor/wow/wow.min.js')}}"></script>
    <script src="{{asset('Admin/vendor/animsition/animsition.min.js')}}"></script>
    <script src="{{asset('Admin/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js')}}">
    </script>
    <script src="{{asset('Admin/vendor/counter-up/jquery.waypoints.min.js')}}"></script>
    <script src="{{asset('Admin/vendor/counter-up/jquery.counterup.min.js')}}">
    </script>
    <script src="{{asset('Admin/vendor/circle-progress/circle-progress.min.js')}}"></script>
    <script src="{{asset('Admin/vendor/perfect-scrollbar/perfect-scrollbar.js')}}"></script>
    <script src="{{asset('Admin/vendor/chartjs/Chart.bundle.min.js')}}"></script>
    <script src="{{asset('Admin/vendor/select2/select2.min.js')}}">
    </script>

    <!-- Main JS-->
    <script src="{{asset('Admin/js/main.js')}}"></script>
    @stack('ScannerBarcode')
</body>

</html>
<!-- end document-->
