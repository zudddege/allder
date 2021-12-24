<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Allder Express</title>
    <link rel="icon" href="{{asset('assets/img/brand/icon.png')}}" type="image/x-icon">
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
    <link href="{{asset('assets/css/sidemenu.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/boxed.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/dark-boxed.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/style-dark.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/skin-modes.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/animate.css')}}" rel="stylesheet">
    <link href="https://earthchie.github.io/jquery.Thailand.js/jquery.Thailand.js/dist/jquery.Thailand.min.css" rel="stylesheet">
</head>

<body class="main-body app sidebar-mini">
    <div class="page">
        <div class="app-sidebar__overlay" data-bs-toggle="sidebar"></div>
        <aside class="app-sidebar sidebar-scroll ps">
            <div class="main-sidebar-header active">
                <a class="desktop-logo logo-light active" href="#"><img src="{{asset('assets/img/brand/allderExpress.png')}}" class="main-logo" alt="logo"></a>
                <a class="logo-icon mobile-logo icon-light active" href="#"><img src="{{asset('assets/img/brand/icon.png')}}" class="logo-icon" alt="logo"></a>
            </div>
            <div class="main-sidemenu is-expanded">
                <ul class="side-menu open">
                    <li class="slide">
                        <a class="side-menu__item" data-bs-toggle="slide" href="{{url('/order')}}"><span class="side-menu__label">จัดการออเดอร์</span></a>
                    </li>
                    <li class="slide">
                        <a class="side-menu__item" data-bs-toggle="slide" href="{{url('/callcourier')}}"><span class="side-menu__label">เรียกคูเรียร์รับพัสดุ</span></a>
                    </li>
                    <li class="slide">
                        <a class="side-menu__item" data-bs-toggle="slide" href="#"><span class="side-menu__label">ระหว่างจัดการพัสดุที่มีปัญหา</span></a>
                    </li>
                    <li class="slide">
                        <a class="side-menu__item" data-bs-toggle="slide" href="#"><span class="side-menu__label">ตรวจเช็คพัสดุ</span></a>
                    </li>
                    <li class="slide is-expanded">
                        <a class="side-menu__item" data-bs-toggle="slide" href="{{url('/bookaddress')}}"><span class="side-menu__label">สมุดที่อยู่</span></a>
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
                        <a class="side-menu__item" data-bs-toggle="slide" href="{{url('/subaccount')}}"><span class="side-menu__label">จัดการ Sub-Account</span></a>
                    </li>
                </ul>
            </div>
        </aside>

        <div class="main-content app-content">
            <div class="main-header sticky side-header nav nav-item" style="margin-bottom: -63px;">
                <div class="container-fluid">
                    <div class="d-flex">
                        <div>
                            <div class="app-sidebar__toggle" data-bs-toggle="sidebar">
                                <a class="open-toggle" href="#"><i class="header-icon fe fe-align-left"></i></a>
                                <a class="close-toggle" href="#"><i class="header-icons fe fe-x"></i></a>
                            </div>
                        </div>
                        <div>
                            <button type="button" class="btn btn-primary mx-2">เรียกพนักงานเข้ามารับพัสดุ</button>
                            <button type="button" class="btn btn-primary mx-2">ระบุพนักงานเข้ารับพัสดุ</button>
                        </div>

                    </div>

                    <div>
                        <div class="nav nav-item  navbar-nav-right ml-auto">
                            <div class="nav-item full-screen fullscreen-button">
                                <a class="new nav-link full-screen-link" href="#"><svg xmlns="http://www.w3.org/2000/svg" class="header-icon-svgs" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M8 3H5a2 2 0 0 0-2 2v3m18 0V5a2 2 0 0 0-2-2h-3m0 18h3a2 2 0 0 0 2-2v-3M3 16v3a2 2 0 0 0 2 2h3">
                                        </path>
                                    </svg></a>
                            </div>
                            <div class="dropdown main-profile-menu nav nav-item nav-link">
                                <a class="profile-user d-flex" href=""><img alt="" src="{{asset('assets/images/91831124_p0.jpg')}}"></a>
                                <div class="dropdown-menu">
                                    <div class="main-header-profile bg-primary p-3">
                                        <div class="d-flex wd-100p">
                                            <div class="main-img-user"><img alt="" src="{{asset('assets/images/91831124_p0.jpg')}}" class=""></div>
                                            <div class="ml-3 my-auto">
                                                <h6>Zudddege</h6><span>Super Admin</span>
                                            </div>
                                        </div>
                                    </div>
                                    <a class="dropdown-item" href="page-signin.html"><i class="bx bx-log-out"></i> Sign
                                        Out</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container-fluid">
                <div class="breadcrumb-header justify-content-between">
                    <div class="my-auto">
                        <div class="d-flex">
                            <h5 class="content-title mb-0 my-auto">สมุดที่อยู่</h5>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-5">
                        {{-- card --}}
                        <form action="{{url('/api/book/address-book/create')}}" method="post">
                            @csrf
                            <div class="card">
                                <div class="px-4 py-4">
                                    <div class="d-flex align-items-center">
                                        <span>รหัสที่อยู่ ผู้รับ / ผู้ส่ง</span>
                                        <input class="form-control mx-2" type="text" style="width: 70%" name="book_no">
                                    </div>
                                    <div class="my-3">
                                        <h5>ข้อมูลที่อยู่ ผู้รับ / ผู้ส่ง</h5>
                                    </div>
                                    <div class="my-2">
                                        <span>ชื่อผู้ส่ง / ผู้รับ</span>
                                        <input class="form-control" type="text" name="book_name">
                                    </div>
                                    <div class="my-2">
                                        <span>เบอร์โทรศัพท์</span>
                                        <input class="form-control" type="text" name="book_tel">
                                    </div>
                                    <div class="my-2">
                                        <span class="mt-2 mb-1">ที่อยู่</span>
                                        <textarea style="resize: none; width: 100%;" rows="4" class="border border-light form-control" name="book_detail"></textarea>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="my-2">
                                                <span class="mt-2 mb-1">ตำบล / แขวง</span>
                                                <div class="">
                                                    <input class="form-control" type="text" value="" name="book_district" id="book_district">
                                                </div>
                                            </div>
                                            <div class="my-2">
                                                <span class="mt-2 mb-1">จังหวัด</span>
                                                <div class="">
                                                    <input class="form-control" type="text" value="" name="book_province" id="book_province">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="my-2">
                                                <span class="mt-2 mb-1">อำเภอ / เขต</span>
                                                <div class="">
                                                    <input class="form-control" type="text" value="" name="book_city" id="book_city">
                                                </div>
                                            </div>
                                            <div class="my-2">
                                                <span class="mt-2 mb-1">รหัสไปรษณีย์</span>
                                                <div class="">
                                                    <input class="form-control" type="text" value="" name="book_postal_code" id="book_postal_code">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex mt-3">
                                        <input type="checkbox" class="mt-1" name="is_main_book" value="1">
                                        <p class="px-1">ตั้งเป็นที่อยู่หลัก</p>
                                    </div>
                                    <div class="d-flex justify-content-center">
                                        <a href="{{url('/book')}}"><button class="btn btn-danger mx-2" type="button">ยกเลิก</button></a>
                                        <button class="btn btn-primary mx-2" type="submit" id="submit-button">สร้างรายการ</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        {{-- end card --}}
                    </div>
                </div>
            </div>
        </div>
    </div>

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

    <script src="https://earthchie.github.io/jquery.Thailand.js/jquery.Thailand.js/dependencies/JQL.min.js"></script>
    <script src="https://earthchie.github.io/jquery.Thailand.js/jquery.Thailand.js/dependencies/typeahead.bundle.js"></script>
    <script src="https://earthchie.github.io/jquery.Thailand.js/jquery.Thailand.js/dist/jquery.Thailand.min.js"></script>

    <script>
        $.Thailand.setup({
            autocomplete_size: 3,
        });

        $.Thailand({
            // database: './jquery.Thailand.js/database/db.zip', // ฐานข้อมูลเป็นไฟล์ zip
            $district: $('#book_district'), // input ของตำบล
            $amphoe: $('#book_city'), // input ของอำเภอ
            $province: $('#book_province'), // input ของจังหวัด
            $zipcode: $('#book_postal_code'), // input ของรหัสไปรษณีย์
        });

    </script>
</body>

</html>
