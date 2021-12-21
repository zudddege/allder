<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="Description" content="Bootstrap Responsive Admin Web Dashboard HTML5 Template">
    <meta name="Author" content="Spruko Technologies Private Limited">
    <title>Allder Express</title>
    <link href="{{asset('assets/css/icons.css')}}" rel="stylesheet">
    <link href="{{asset('assets/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/plugins/datatable/datatables.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/plugins/datatable/responsive.dataTables.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/plugins/datatable/responsive.bootstrap5.css')}}" rel="stylesheet">
    <link href="{{asset('assets/plugins/datatable/css/buttons.bootstrap5.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/plugins/datatable/css/dataTables.bootstrap5.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/plugins/sidebar/sidebar.css')}}" rel="stylesheet">
    <link href="{{asset('assets/plugins/perfect-scrollbar/p-scrollbar.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('assets/css/sidemenu.css')}}">
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/boxed.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/dark-boxed.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/style-dark.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/skin-modes.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/animate.css')}}" rel="stylesheet">
</head>

<body class="main-body app sidebar-mini">

    <!-- Page -->
    <div class="page">

        <!-- main-sidebar -->
        <div class="app-sidebar__overlay" data-bs-toggle="sidebar"></div>
        <aside class="app-sidebar sidebar-scroll ps">
            <div class="main-sidebar-header active">
                <a class="desktop-logo logo-light active" href="#"><img src="{{asset('assets/img/brand/allderExpress.png')}}" class="main-logo" alt="logo"></a>
                <a class="logo-icon mobile-logo icon-light active" href="#"><img src="{{asset('assets/img/brand/icon.png')}}" class="logo-icon" alt="logo"></a>
            </div>
            <div class="main-sidemenu is-expanded">
                <ul class="side-menu open">
                    <li class="slide ">
                        <a class="side-menu__item" data-bs-toggle="slide" href="{{url('/order')}}"><span class="side-menu__label">จัดการออเดอร์</span></a>
                    </li>
                    <li class="slide is-expanded">
                        <a class="side-menu__item" data-bs-toggle="slide" href="{{url('/courier')}}"><span class="side-menu__label">เรียกคูเรียร์รับพัสดุ</span></a>
                    </li>
                    <li class="slide">
                        <a class="side-menu__item" data-bs-toggle="slide" href="#"><span class="side-menu__label">ระหว่างจัดการพัสดุที่มีปัญหา</span></a>
                    </li>
                    <li class="slide">
                        <a class="side-menu__item" data-bs-toggle="slide" href="#"><span class="side-menu__label">ตรวจเช็คพัสดุ</span></a>
                    </li>
                    <li class="slide">
                        <a class="side-menu__item" data-bs-toggle="slide" href="#"><span class="side-menu__label">สมุดที่อยู่</span></a>
                    </li>
                    <li class="slide">
                        <a class="side-menu__item" data-bs-toggle="slide" href="#"><span class="side-menu__label">กระทบค่าขนส่ง</span></a>
                    </li>
                    <li class="slide">
                        <a class="side-menu__item" data-bs-toggle="slide" href="#"><span class="side-menu__label">เก็บเงินพัสดุปลายทาง</span></a>
                    </li>
                    <li class="slide">
                        <a class="side-menu__item" data-bs-toggle="slide" href="#"><span class="side-menu__label">ตารางรายการ POD</span></a>
                    </li>
                    <li class="slide">
                        <a class="side-menu__item" data-bs-toggle="slide" href="{{url('/sub-account')}}"><span class="side-menu__label">จัดการ Sub-Account</span></a>
                    </li>
                </ul>
            </div>
        </aside>
        <!-- main-sidebar -->

        <!-- main-content -->
        <div class="main-content app-content">

            <!-- main-header -->
            <div class="main-header sticky side-header nav nav-item" style="margin-bottom: -63px;">
                <div class="container-fluid">
                    <button type="button" class="btn btn-primary" style="position: absolute; left: 330;">เรียกพนักงานเข้ามารับพัสดุ</button>
                    <button type="button" class="btn btn-primary" style="position: absolute; left: 540;">ระบุพนักงานเข้ารับพัสดุ</button>
                    <div class="main-header-left ">
                        <div class="app-sidebar__toggle" data-bs-toggle="sidebar">
                            <a class="open-toggle" href="#"><i class="header-icon fe fe-align-left"></i></a>
                            <a class="close-toggle" href="#"><i class="header-icons fe fe-x"></i></a>
                        </div>
                    </div>
                    <div class="main-header-right">
                        <div class="nav nav-item  navbar-nav-right ml-auto">
                            <div class="nav-link" id="bs-example-navbar-collapse-1">
                                <form class="navbar-form" role="search">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Search">
                                        <span class="input-group-btn">
                                            <button type="reset" class="btn btn-default">
                                                <i class="fas fa-times"></i>
                                            </button>
                                            <button type="submit" class="btn btn-default nav-link resp-btn">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="header-icon-svgs" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                    <circle cx="11" cy="11" r="8"></circle>
                                                    <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                                                </svg>
                                            </button>
                                        </span>
                                    </div>
                                </form>
                            </div>
                            <div class="nav-item full-screen fullscreen-button">
                                <a class="new nav-link full-screen-link" href="#"><svg xmlns="http://www.w3.org/2000/svg" class="header-icon-svgs" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M8 3H5a2 2 0 0 0-2 2v3m18 0V5a2 2 0 0 0-2-2h-3m0 18h3a2 2 0 0 0 2-2v-3M3 16v3a2 2 0 0 0 2 2h3">
                                        </path>
                                    </svg></a>
                            </div>
                            <div class="dropdown main-profile-menu nav nav-item nav-link">
                                <a class="profile-user d-flex" href=""><img alt="" src="assets/images/91831124_p0.jpg"></a>
                                <div class="dropdown-menu">
                                    <div class="main-header-profile bg-primary p-3">
                                        <div class="d-flex wd-100p">
                                            <div class="main-img-user"><img alt="" src="assets/images/91831124_p0.jpg" class=""></div>
                                            <div class="ml-3 my-auto">
                                                <h6>Zudddege</h6><span>Super Admin</span>
                                            </div>
                                        </div>
                                    </div>
                                    <a class="dropdown-item" href="page-signin.html"><i class="bx bx-log-out"></i> Sign Out</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /main-header -->

            <!-- container -->
            <div class="container-fluid">

                <!-- breadcrumb -->
                <div class="breadcrumb-header justify-content-between">
                    <div class="my-auto">
                        <div class="d-flex">
                            <h5 class="content-title mb-0 my-auto">เรียกคูเรียร์รับพัสดุ</h5>
                        </div>
                    </div>
                </div>
                <!-- breadcrumb -->

                <!-- row opened -->
                <div class="row row-sm">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="jumps-prevent" style="padding-top: 5px;"></div>
                            <div class="card-body">
                                <a class="btn btn-primary" style="position: absolute; left: 45;" href="add.html"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                        <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                                    </svg> เรียกพนักงานเข้ารับพัสดุ
                                </a>
                                <button type="button" class="btn btn-info" style="position: absolute; left: 260;"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-upload" viewBox="0 0 16 16">
                                        <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z" />
                                        <path d="M7.646 1.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 2.707V11.5a.5.5 0 0 1-1 0V2.707L5.354 4.854a.5.5 0 1 1-.708-.708l3-3z" />
                                    </svg> ระบุพนักงานเข้ารับพัสดุ</button>
                                <button type="button" class="btn btn-link" style="position: absolute; left: 450;"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-download" viewBox="0 0 16 16">
                                        <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z" />
                                        <path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z" />
                                    </svg> <u>ดาวน์โหลด (Excel)</u></button>
                            </div>
                            <div class="jumps-prevent" style="padding-top: 45px;"></div>
                            <div class="row px-2 mb-3">
                                <div class="col-4">
                                    <div class="mb-1">เวลาที่ทำรายการ</div>
                                    <div class="">
                                        <input class="form-control" type="text" value="18/10/2564 - 09:00 am ถึง 18/10/2564 - 09:00 am">
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="mb-1">สถานะการรับพัสดุ</div>
                                    <div class="">
                                        <input class="form-control" type="text" value="">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="mb-1">ค้นหา<a class="text-muted px-2">เลขออเดอร์, เลขพัสดุ,
                                            เบอร์โทรศัพท์</a></div>
                                    <div class="d-flex ">
                                        <div class="">
                                            <input class="form-control" type="text" value="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="px-2">
                                <table class="table table-striped position-relative" id="my-table">
                                    <thead>
                                        <tr>
                                            <th class="">
                                                <input type="checkbox">
                                            </th>
                                            <th>เวลาที่ทำรายการ</th>
                                            <th>สถานะจัดส่ง</th>
                                            <th>ที่อยู่เข้ารับพัสดุ</th>
                                            <th>ข้อมูลคูเรียร์</th>
                                            <th>หมายเหตุ</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="">
                                                <input type="checkbox">
                                            </td>
                                            <td>18/10/2564 - 09:00 am</td>
                                            <td style="color: orange;">รอรับพัสดุ</td>
                                            <td>
                                                <div class="">บริษัท โรงแรมเกทเวย์ จำกัด (บัญชี)</div>
                                                <div class="">354 ซ.พหลโยธิน 40 ถ.พหลโยธิน แขวงเสนานิคม เขตจตุจักร
                                                    กรุงเทพฯ 10900</div>
                                            </td>
                                            <td>
                                                <div class="">บริษัท อีเจนซี่เอเชีย จำกัด</div>
                                                <div class="">354 ซ.พหลโยธิน 40 ถ.พหลโยธิน แขวงเสนานิคม เขตจตุจักร
                                                    กรุงเทพฯ 10900</div>
                                            </td>
                                            <td>เป็นสินค้าเกี่ยวกับอิเล็กทรอนิกส์ห้ามกระแทกรุนแรง</td>
                                        </tr>
                                        <tr>
                                            <td class="">
                                                <input type="checkbox">
                                            </td>
                                            <td>18/10/2564 - 09:00 am</td>
                                            <td style="color: orange;">รอรับพัสดุ</td>
                                            <td>
                                                <div class="">บริษัท โรงแรมเกทเวย์ จำกัด (บัญชี)</div>
                                                <div class="">354 ซ.พหลโยธิน 40 ถ.พหลโยธิน แขวงเสนานิคม เขตจตุจักร
                                                    กรุงเทพฯ 10900</div>
                                            </td>
                                            <td>
                                                <div class="">บริษัท อีเจนซี่เอเชีย จำกัด</div>
                                                <div class="">354 ซ.พหลโยธิน 40 ถ.พหลโยธิน แขวงเสนานิคม เขตจตุจักร
                                                    กรุงเทพฯ 10900</div>
                                            </td>

                                            <td>เป็นสินค้าเกี่ยวกับอิเล็กทรอนิกส์ห้ามกระแทกรุนแรง</td>
                                        </tr>


                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                    <!--/div-->
                </div>
                <!-- /row -->
            </div>
            <!-- Container closed -->
        </div>
        <!-- main-content closed -->

        <!-- End Page -->

        <!-- Back-to-top -->
        <a href="#top" id="back-to-top" style="display: none;"><i class="las la-angle-double-up"></i></a>
        <script src="{{asset('assets/plugins/jquery/jquery.min.js')}}"></script>
        <script src="{{asset('assets/plugins/bootstrap/js/popper.min.js')}}"></script>
        <script src="{{asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{asset('assets/plugins/ionicons/ionicons.js')}}"></script>
        <script src="{{asset('assets/plugins/moment/moment.js')}}"></script>
        <script src="{{asset('assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
        <script src="{{asset('assets/plugins/perfect-scrollbar/p-scroll.js')}}"></script>
        <script src="{{asset('assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('assets/plugins/datatable/datatables.min.js')}}"></script>
        <script src="{{asset('assets/plugins/datatable/js/dataTables.bootstrap5.js')}}"></script>
        <script src="{{asset('assets/plugins/datatable/js/dataTables.buttons.min.js')}}"></script>
        <script src="{{asset('assets/plugins/datatable/js/buttons.bootstrap5.min.js')}}"></script>
        <script src="{{asset('assets/plugins/datatable/js/jszip.min.js')}}"></script>
        <script src="{{asset('assets/plugins/datatable/js/buttons.html5.min.js')}}"></script>
        <script src="{{asset('assets/plugins/datatable/js/buttons.print.min.js')}}"></script>
        <script src="{{asset('assets/plugins/datatable/js/buttons.colVis.min.js')}}"></script>
        <script src="{{asset('assets/plugins/datatable/pdfmake/pdfmake.min.js')}}"></script>
        <script src="{{asset('assets/plugins/datatable/pdfmake/vfs_fonts.js')}}"></script>
        <script src="{{asset('assets/js/table-data.js')}}"></script>
        <script src="{{asset('assets/plugins/rating/jquery.rating-stars.js')}}"></script>
        <script src="{{asset('assets/plugins/rating/jquery.barrating.js')}}"></script>
        <script src="{{asset('assets/plugins/side-menu/sidemenu.js')}}"></script>
        <script src="{{asset('assets/plugins/sidebar/sidebar.js')}}"></script>
        <script src="{{asset('assets/plugins/sidebar/sidebar-custom.js')}}"></script>
        <script src="{{asset('assets/js/sticky.js')}}"></script>
        <script src="{{asset('assets/js/eva-icons.min.js')}}"></script>
        <script src="{{asset('assets/js/custom.js')}}"></script>

        <script>
            $('#my-table').DataTable({
                scrollX: true,
                "columns": [{
                        "width": "650px"
                    },
                    {
                        "width": "650px"
                    },
                    {
                        "width": "650px"
                    },
                    {
                        "width": "650px"
                    },
                    {
                        "width": "650px"
                    },
                ],
                "ordering": false
            });
            $(".dataTables_length").css("display", "none");
            $(".dataTables_filter").css("display", "none");

        </script>

</body>

</html>
