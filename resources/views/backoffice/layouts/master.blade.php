<!DOCTYPE html>
<html lang="en">

<head>
    <title>@yield('title')</title>
    <!-- HTML5 Shim and Respond.js IE10 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 10]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="Gradient Able Bootstrap admin template made using Bootstrap 4 and it has huge amount of ready made feature, UI components, pages which completely fulfills any dashboard needs." />
    <meta name="keywords" content="bootstrap, bootstrap admin template, admin theme, admin dashboard, dashboard template, admin template, responsive" />
    <meta name="author" content="codedthemes" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <!-- Favicon icon -->
    <link rel="icon" href="{{asset('files/assets/images/favicon.ico')}}" type="image/x-icon">
    <!-- Google font-->
	<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600" rel="stylesheet">
    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="{{asset('files/bower_components/bootstrap/css/bootstrap.css')}}">
    <!-- themify icon -->
    <link rel="stylesheet" type="text/css" href="{{asset('files/assets/icon/themify-icons/themify-icons.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" type="text/css" href="{{asset('files/assets/icon/font-awesome/css/font-awesome.min.css')}}">
    <!-- scrollbar.css -->
    <link rel="stylesheet" type="text/css" href="{{asset('files/assets/css/jquery.mCustomScrollbar.css')}}">
    <!-- radial chart.css -->
    <link rel="stylesheet" href="{{asset('files/assets/pages/chart/radial/css/radial.css')}}" type="text/css" media="all">
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="{{asset('files/assets/css/style.css')}}">
    <!-- Data Table Css -->
    <link rel="stylesheet" type="text/css" href="{{asset('files/bower_components/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('files/assets/pages/data-table/css/buttons.dataTables.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('files/bower_components/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css')}}">
    @yield('css')
</head>

<body>
    <!-- Pre-loader start -->
    <div class="theme-loader">
        <div class="loader-track">
            <div class="loader-bar"></div>
        </div>
    </div>
    <!-- Pre-loader end -->
    <div id="pcoded" class="pcoded">
        <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">
            <nav class="navbar header-navbar pcoded-header">
                <div class="navbar-wrapper">
                    <div class="navbar-logo">
                        <a class="mobile-menu" id="mobile-collapse" href="{{url('backoffice/dashboard')}}">
                            <i class="ti-menu"></i>
                        </a>
                        <div class="mobile-search">
                            <div class="header-search">
                                <div class="main-search morphsearch-search">
                                    <div class="input-group">
                                        <span class="input-group-addon search-close"><i class="ti-close"></i></span>
                                        <input type="text" class="form-control" placeholder="Enter Keyword">
                                        <span class="input-group-addon search-btn"><i class="ti-search"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="{{url('backoffice/dashboard')}}">
                            <img class="img-fluid" src="{{asset('files/assets/images/logo.png')}}" alt="Theme-Logo" />
                        </a>
                        <a class="mobile-options">
                            <i class="ti-more"></i>
                        </a>
                    </div>

                    <div class="navbar-container container-fluid">
                        <ul class="nav-left">
                            <li>
                                <div class="sidebar_toggle"><a href="javascript:void(0)"><i class="ti-menu"></i></a></div>
                            </li>
                            <li class="header-search">
                                <div class="main-search morphsearch-search">
                                    <div class="input-group">
                                        <span class="input-group-addon search-close"><i class="ti-close"></i></span>
                                        <input type="text" class="form-control">
                                        <span class="input-group-addon search-btn"><i class="ti-search"></i></span>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <a href="#!" onclick="javascript:toggleFullScreen()">
                                    <i class="ti-fullscreen"></i>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav-right">
                            <li class="user-profile header-notification">
                                <a href="#!">
                                    <img src="{{asset('files/assets/images/avatar-4.jpg')}}" class="img-radius" alt="User-Profile-Image">
                                    <span>John Doe</span>
                                    <i class="ti-angle-down"></i>
                                </a>
                                <ul class="show-notification profile-notification">
                                    <li>
                                        <a href="auth-normal-sign-in.html">
                                        <i class="ti-layout-sidebar-left"></i> Logout
                                    </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- Sidebar inner chat end-->
            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">
                    <nav class="pcoded-navbar">
                        <div class="sidebar_toggle"><a href="#"><i class="icon-close icons"></i></a></div>
                        <div class="pcoded-inner-navbar main-menu">

                            <div class="pcoded-navigation-label">Landing Page</div>
                            <ul class="pcoded-item pcoded-left-item">
                                <li class="">
                                    <a href="{{url('backoffice/banner/index')}}">
                                        <span class="pcoded-micon"><i class="fa fa-circle"></i></i></span>
                                        <span class="pcoded-mtext">แบนเนอร์</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="{{url('backoffice/aboutus/index')}}">
                                        <span class="pcoded-micon"><i class="fa fa-circle"></i></i></span>
                                        <span class="pcoded-mtext">เกี่ยวกับเรา</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                                {{-- <li class="">
                                    <a href="{{url('backoffice/product/select')}}">
                                        <span class="pcoded-micon"><i class="fa fa-circle"></i></i></span>
                                        <span class="pcoded-mtext">สินค้าของเรา</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li> --}}
                                <li class="">
                                    <a href="{{url('backoffice/contact/index')}}">
                                        <span class="pcoded-micon"><i class="fa fa-circle"></i></i></span>
                                        <span class="pcoded-mtext">ติดต่อเรา</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="{{url('backoffice/footer/index')}}">
                                        <span class="pcoded-micon"><i class="fa fa-circle"></i></i></span>
                                        <span class="pcoded-mtext">ฟุตเตอร์</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                            </ul>
                            <div class="pcoded-navigation-label">สินค้าของเรา</div>
                            <ul class="pcoded-item pcoded-left-item">
                                <li class="">
                                    <a href="{{url('backoffice/product/index')}}">
                                        <span class="pcoded-micon"><i class="fa fa-circle"></i></span>
                                        <span class="pcoded-mtext">สินค้า</span>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="{{url('backoffice/category/index')}}">
                                        <span class="pcoded-micon"><i class="fa fa-circle"></i></span>
                                        <span class="pcoded-mtext">หมวดหมู่</span>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="{{url('backoffice/customize/index')}}">
                                        <span class="pcoded-micon"><i class="fa fa-circle"></i></span>
                                        <span class="pcoded-mtext">รายการปรับแต่งสินค้า</span>
                                    </a>
                                </li>
                            </ul>
                            <div class="pcoded-navigation-label">รายการใบเสนอราคา</div>
                            <ul class="pcoded-item pcoded-left-item">
                                <li class="">
                                    <a href="javascript:void(0)">
                                        <span class="pcoded-micon"><i class="fa fa-circle"></i><b>P</b></span>
                                        <span class="pcoded-mtext">ใบเสนอราคา</span>
                                    </a>
                                </li>
                            </ul>
                            <div class="pcoded-navigation-label">ผู้ใช้งาน</div>
                            <ul class="pcoded-item pcoded-left-item">
                                <li class="">
                                    <a href="javascript:void(0)">
                                        <span class="pcoded-micon"><i class="fa fa-circle"></i><b>P</b></span>
                                        <span class="pcoded-mtext">รายชื่อผู้ใช้งาน</span>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="javascript:void(0)">
                                        <span class="pcoded-micon"><i class="fa fa-circle"></i><b>P</b></span>
                                        <span class="pcoded-mtext">กำหนดสิทธิ์ผู้ใช้งาน</span>
                                    </a>
                                </li>
                            </ul>
                            <div class="pcoded-navigation-label">สิทธิ์ผู้ใช้งาน</div>
                            <ul class="pcoded-item pcoded-left-item">
                                <li class="">
                                    <a href="javascript:void(0)">
                                        <span class="pcoded-micon"><i class="fa fa-circle"></i><b>P</b></span>
                                        <span class="pcoded-mtext">รายการสิทธิ์ผู้ใช้งาน</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                    <div class="pcoded-content">
                        <div class="pcoded-inner-content">
                            <!-- Main-body start -->
                            <div class="main-body">
                                @yield('content')
                                <div id="styleSelector"> </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
    <!-- Warning Section Starts -->
    <!-- Older IE warning message -->
    <!--[if lt IE 10]><![endif]-->
    <!-- Warning Section Ends -->
    <!-- Required Jquery -->
    <!-- Older IE warning message -->
    <!--[if lt IE 10]>
    <div class="ie-warning">
        <h1>Warning!!</h1>
        <p>You are using an outdated version of Internet Explorer, please upgrade <br/>to any of the following web browsers to access this website.</p>
        <div class="iew-container">
            <ul class="iew-download">
                <li>
                    <a href="http://www.google.com/chrome/">
                        <img src="../files/assets/images/browser/chrome.png" alt="Chrome">
                        <div>Chrome</div>
                    </a>
                </li>
                <li>
                    <a href="https://www.mozilla.org/en-US/firefox/new/">
                        <img src="../files/assets/images/browser/firefox.png" alt="Firefox">
                        <div>Firefox</div>
                    </a>
                </li>
                <li>
                    <a href="http://www.opera.com">
                        <img src="../files/assets/images/browser/opera.png" alt="Opera">
                        <div>Opera</div>
                    </a>
                </li>
                <li>
                    <a href="https://www.apple.com/safari/">
                        <img src="../files/assets/images/browser/safari.png" alt="Safari">
                        <div>Safari</div>
                    </a>
                </li>
                <li>
                    <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">
                        <img src="../files/assets/images/browser/ie.png" alt="">
                        <div>IE (9 & above)</div>
                    </a>
                </li>
            </ul>
        </div>
        <p>Sorry for the inconvenience!</p>
    </div>
    <![endif]-->
    <!-- Warning Section Ends -->
    <script src="{{asset('files/bower_components/jquery/js/jquery.min.js')}}"></script>
    <script src="{{asset('files/bower_components/jquery-ui/js/jquery-ui.min.js')}} "></script>
    <script src="{{asset('files/bower_components/popper.js/js/popper.min.js')}}"></script>
    <script src="{{asset('files/bower_components/bootstrap/js/bootstrap.min.js')}} "></script>
    <script src="{{asset('files/assets/pages/widget/excanvas.js')}} "></script>
    <!-- jquery slimscroll js -->
    <script src="{{asset('files/bower_components/jquery-slimscroll/js/jquery.slimscroll.js')}} "></script>
    <!-- modernizr js -->
    <script src="{{asset('files/bower_components/modernizr/js/modernizr.js')}} "></script>
    <!-- slimscroll js -->
    <script src="{{asset('files/assets/js/SmoothScroll.js')}}"></script>
    <script src="{{asset('files/assets/js/jquery.mCustomScrollbar.concat.min.js')}} "></script>
    <!-- Chart js -->
    <script src="{{asset('files/bower_components/chart.js/js/Chart.js')}}"></script>
    <script src="{{asset('files/assets/pages/widget/amchart/amcharts.js')}}"></script>
    <script src="{{asset('files/assets/pages/widget/amchart/serial.js')}}"></script>
    <script src="{{asset('files/assets/pages/widget/amchart/light.js')}}"></script>
    <!-- data-table js -->
    <script src="{{asset('files/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('files/bower_components/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('files/assets/pages/data-table/js/jszip.min.js')}}"></script>
    <script src="{{asset('files/assets/pages/data-table/js/pdfmake.min.js')}}"></script>
    <script src="{{asset('files/assets/pages/data-table/js/vfs_fonts.js')}}"></script>
    <script src="{{asset('files/bower_components/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
    <script src="{{asset('files/bower_components/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
    <script src="{{asset('files/bower_components/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('files/bower_components/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('files/bower_components/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js')}}"></script>
    <!-- ck editor -->
    <script src="{{asset('files/assets/pages/ckeditor/ckeditor.js')}}"></script>
    <!-- menu js -->
    <script src="{{asset('files/assets/js/pcoded.min.js')}}"></script>
    <script src="{{asset('files/assets/js/vertical/vertical-layout.min.js')}} "></script>
    <!-- custom js -->
    <script src="{{asset('files/assets/js/script.js')}} "></script>
    <!--sweet alert2 -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript">
       $.ajaxSetup({
           headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
           }
       });
   </script>
    <script>
         setTimeout(function() { 
            $('.alert').fadeOut(1000); 
        }, 5000);
    </script>
    @yield('js')
</body>

</html>
