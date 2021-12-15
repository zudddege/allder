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
                <a class="desktop-logo logo-light active" href="#"><img src="assets/img/brand/allderExpress.png"
                        class="main-logo" alt="logo"></a>
                <a class="logo-icon mobile-logo icon-light active" href="#"><img src="assets/img/brand/icon.png"
                        class="logo-icon" alt="logo"></a>
            </div>
            <div class="main-sidemenu is-expanded">

                <ul class="side-menu open">

                    <li class="slide is-expanded">
                        <a class="side-menu__item" data-bs-toggle="slide" href="{{url('/order')}}"><span
                                class="side-menu__label">จัดการออเดอร์</span></a>
                    </li>
                    <li class="slide">
                        <a class="side-menu__item" href="{{url('/callcuria')}}"><span
                                class="side-menu__label">เรียกคูเรียร์รับพัสดุ</span></a>
                    </li>
                    <li class="slide">
                        <a class="side-menu__item" data-bs-toggle="slide" href="#"><span
                                class="side-menu__label">ระหว่างจัดการพัสดุที่มีปัญหา</span></a>
                    </li>
                    <li class="slide">
                        <a class="side-menu__item" data-bs-toggle="slide" href="#"><span
                                class="side-menu__label">ตรวจเช็คพัสดุ</span></a>
                    </li>
                    <li class="slide">
                        <a class="side-menu__item" data-bs-toggle="slide" href="#"><span
                                class="side-menu__label">สมุดที่อยู่</span></a>
                    </li>
                    <li class="slide">
                        <a class="side-menu__item" data-bs-toggle="slide" href="#"><span
                                class="side-menu__label">กระทบค่าขนส่ง</span></a>
                    </li>
                    <li class="slide">
                        <a class="side-menu__item" data-bs-toggle="slide" href="#"><span
                                class="side-menu__label">เก็บเงินพัสดุปลายทาง</span></a>
                    </li>
                    <li class="slide">
                        <a class="side-menu__item" data-bs-toggle="slide" href="#"><span
                                class="side-menu__label">ตารางรายการ POD</span></a>
                    </li>
                    <li class="slide">
                        <a class="side-menu__item" data-bs-toggle="slide" href="subaccount.html"><span
                                class="side-menu__label">จัดการ Sub-Account</span></a>
                    </li>

                </ul>
            </div>
            <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
                <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
            </div>
            <div class="ps__rail-y" style="top: 0px; height: 722px; right: 0px;">
                <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 580px;"></div>
            </div>
            <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
                <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
            </div>
            <div class="ps__rail-y" style="top: 0px; right: 0px;">
                <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div>
            </div>
            <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
                <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
            </div>
            <div class="ps__rail-y" style="top: 0px; right: 0px;">
                <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div>
            </div>
        </aside>
        <!-- main-sidebar -->

        <!-- main-content -->
        <div class="main-content app-content">

            <!-- main-header -->
            <div class="main-header sticky side-header nav nav-item" style="margin-bottom: -63px;">
                <div class="container-fluid">


                    <div class="main-header-left ">
                        <div class="app-sidebar__toggle" data-bs-toggle="sidebar">
                            <a class="open-toggle" href="#"><i class="header-icon fe fe-align-left"></i></a>
                            <a class="close-toggle" href="#"><i class="header-icons fe fe-x"></i></a>
                        </div>
                        <button type="button" class="btn btn-primary mx-2">เรียกพนักงานเข้ามารับพัสดุ</button>
                        <button type="button" class="btn btn-primary mx-2">ระบุพนักงานเข้ารับพัสดุ</button>

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
                                                <svg xmlns="http://www.w3.org/2000/svg" class="header-icon-svgs"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                    <circle cx="11" cy="11" r="8"></circle>
                                                    <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                                                </svg>
                                            </button>
                                        </span>
                                    </div>
                                </form>
                            </div>
                            <div class="nav-item full-screen fullscreen-button">
                                <a class="new nav-link full-screen-link" href="#"><svg
                                        xmlns="http://www.w3.org/2000/svg" class="header-icon-svgs" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round">
                                        <path
                                            d="M8 3H5a2 2 0 0 0-2 2v3m18 0V5a2 2 0 0 0-2-2h-3m0 18h3a2 2 0 0 0 2-2v-3M3 16v3a2 2 0 0 0 2 2h3">
                                        </path>
                                    </svg></a>
                            </div>
                            <div class="dropdown main-profile-menu nav nav-item nav-link">
                                <a class="profile-user d-flex" href=""><img alt=""
                                        src="assets/images/91831124_p0.jpg"></a>
                                <div class="dropdown-menu">
                                    <div class="main-header-profile bg-primary p-3">
                                        <div class="d-flex wd-100p">
                                            <div class="main-img-user"><img alt="" src="assets/images/91831124_p0.jpg"
                                                    class=""></div>
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
            <!-- /main-header -->

            <!-- container -->
            <div class="container-fluid">

                <!-- breadcrumb -->
                <div class="breadcrumb-header justify-content-between">
                    <div class="my-auto">
                        <div class="d-flex">
                            <h5 class="content-title mb-0 my-auto">จัดการออเดอร์</h5>
                        </div>
                    </div>
                </div>


                <div class="row row-sm">
                    <div class="col-sm-8">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex flex-row align-self-center">
                                    <h6 class="px-2 mt-2">เลขออเดอร์</h6>
                                    <a class="px-3 mt-2" style="color:blue">OR2020100023</a>
                                    <h6 class="px-2 mt-2">เลขพัสดุ</h6>
                                    <a class="px-3 mt-2" style="color:blue">SM593373CH</a>
                                    <h6 class="px-2 mt-2">เวลาที่ทำรายการ</h6>
                                    <a class="px-3 mt-2" style="color:blue">18/10/2564 - 09:00 am</a>
                                </div>
                                <hr>

                                <div class="row row-cols-12">
                                    <div class="col-6" style="border-right: 1px solid black;">
                                        <div class="d-flex">
                                            <h5 class="px-2 mt-2"><b>ข้อมูลผู้ส่ง</b></h5>
                                            <button class="btn btn-link px-1" style="color:blue" data-toggle="modal"
                                                data-target=".bd-example-modal-lg"><u>เลือกจากสมุดที่อยู่</u></button>
                                        </div>
                                        <div class="px-4">
                                            <p class="mt-2 mb-1">ชื่อผู้ส่ง</p>
                                            <input class="form-control" type="text" value="">
                                        </div>
                                        <div class="px-4">
                                            <p class="mt-2 mb-1">เบอร์โทรศัพท์</p>
                                            <input class="form-control" type="text" value="">
                                        </div>
                                        <div class="px-4">
                                            <p class="mt-2 mb-1">พื้นที่บริการ</p>
                                            <textarea style="resize: none;" rows="4" cols="43"
                                                class="border border-light form-control"></textarea>
                                        </div>
                                        <div class="px-4">
                                            <p class="mt-2 mb-1">รายละเอียดที่อยู่</p>
                                            <textarea style="resize: none;" rows="4" cols="43"
                                                class="border border-light form-control"></textarea>
                                        </div>


                                        <div class="row">
                                            <div class="col-6">
                                                <div class="d-flex px-4 mt-3">
                                                    <input type="checkbox" class="mt-1">
                                                    <p class="px-1">ตั้งเป็นที่อยู่หลัก</p>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="d-flex px-1 mt-3">
                                                    <input type="checkbox" class="mt-1">
                                                    <p class="px-1">บันทึกข้อมูลที่อยู่</p>
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                    <div class="col-6">
                                        <div class="d-flex">
                                            <h5 class="px-2 mt-2"><b>ข้อมูลผู้รับ</b></h5>
                                            <button class="btn btn-link px-1" style="color:blue" data-toggle="modal"
                                                data-target=".bd-example-modal-lg"><u>เลือกจากสมุดที่อยู่</u></button>
                                        </div>
                                        <div class="px-4">
                                            <p class="mt-2 mb-1">ชื่อผู้ส่ง</p>
                                            <input class="form-control" type="text" value="">
                                        </div>
                                        <div class="px-4">
                                            <p class="mt-2 mb-1">เบอร์โทรศัพท์</p>
                                            <input class="form-control" type="text" value="">
                                        </div>
                                        <div class="px-4">
                                            <p class="mt-2 mb-1">พื้นที่บริการ</p>
                                            <textarea style="resize: none;" rows="4" cols="43"
                                                class="border border-light form-control"></textarea>
                                        </div>
                                        <div class="px-4">
                                            <p class="mt-2 mb-1">รายละเอียดที่อยู่</p>
                                            <textarea style="resize: none;" rows="4" cols="43"
                                                class="border border-light form-control"></textarea>
                                        </div>

                                        <div class="row">
                                            <div class="col-6">
                                                <div class="d-flex px-4 mt-3">
                                                    <input type="checkbox" class="mt-1">
                                                    <p class="px-1">บันทึกข้อมูลที่อยู่</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <h5 class="px-2 mt-2"><b>รายละเอียดสินค้า</b></h5>
                                <div class="row px-2 mt-3">
                                    <div class="col-3">
                                        <p class="mb-1">ประเภทสินค้า</p>
                                        <select class="custom-select my-1 mr-sm-2 border-light"
                                            id="inlineFormCustomSelectPref" style="width: 170px; height: 35px;">
                                            <option selected>เลือก...</option>
                                            <option value="1">เอกสาร</option>
                                            <option value="2">อาหารแห้ง</option>
                                            <option value="3">ของใช้ทั่วไป</option>
                                            <option value="4">อุปกรณ์ไอที</option>
                                            <option value="5">เสื้อผ้า</option>
                                            <option value="6">สื่อบันเทิง</option>
                                            <option value="7">อะไหล่ยนต์</option>
                                        </select>
                                    </div>
                                    <div class="col-3">
                                        <p class="mb-1">น้ำหนัก</p>
                                        <div class="d-flex">
                                            <input class="form-control" type="text" value="">
                                            <p class="mt-2 px-1">kg.</p>
                                        </div>

                                    </div>
                                    <div class="col-6">
                                        <p class="mb-1">ขนาด<a class="text-muted px-2">ยาว x กว้าง x สูง</a></p>
                                        <div class="d-flex">
                                            <input class="form-control" type="text" value="">
                                            <a class="mt-2 px-2">x</a>
                                            <input class="form-control" type="text" value="">
                                            <a class="mt-2 px-2">x</a>
                                            <input class="form-control" type="text" value="">
                                            <a class="mt-2 px-2">cm.</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="row px-2 mt-3">
                                    <div class="col-4">
                                        <p class="mb-1">COD<a class="text-muted px-2">ยอดเก็บเงินปลายทาง</a></p>
                                        <input class="form-control" type="text" value="">
                                    </div>
                                    <div class="col">
                                        <p class="mb-1">หมายเหตุ</p>
                                        <input class="form-control" type="text" value="">
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex">
                                    <input type="checkbox" class="mt-1" id="accept">
                                    <p class="px-1">ฉันได้อ่านและยอมรับข้อกำหนดใน<br>
                                        <a href="#" class="" style="color: blue;"><u>ข้อกำหนดเงื่อนไขการบริการ</u></a>
                                    </p>
                                </div>
                                <div class="jumps-prevent" style="padding-top: 20px;"></div>
                                <div class="d-flex">
                                    <input type="checkbox" class="mt-1">
                                    <p class="px-1">ประกันพัสดุดีดกลับ<br>
                                        <a class="text-muted">หากพัสดุถูกดีดกลับ
                                            จะไม่คิดค่าขนส่งดีดกลับ<br>ฉันได้อ่านและยอมรับข้อกำหนดใน <br>
                                            <a href="#" class=""
                                                style="color: blue;"><u>เงื่อนไขความคุ้มครองพัสดุดีดกลับ</u></a>
                                            <a class="text-muted">แล้ว</a></a>
                                    </p>
                                </div>
                                <div class="jumps-prevent" style="padding-top: 20px;"></div>
                                <div class="d-flex">
                                    <input type="checkbox" class="mt-1">
                                    <p class="px-1">ประกันคุ้มครองพัสดุ</p>
                                </div>
                                <div class="jumps-prevent" style="padding-top: 20px;"></div>
                                <div class="d-flex">
                                    <input type="checkbox" class="mt-1">
                                    <p class="px-1">SPEED<br>
                                        <a class="text-muted">คาดการณ์จัดส่งภายในวันที่<br>เพื่อรับรองประสิทธิภาพการจัดส่งพัสดุ
                                            กรุณาบุ๊คกิ๊งก่อนเวลา <br> ฉันได้อ่านและยอมรับข้อกำหนดใน <br>
                                            <a href="#" class="" style="color: blue;"><u>เงื่อนไขและข้อกำหนดของ
                                                    SPEED</u></a>
                                            <a class="text-muted">แล้ว</a></a>
                                    </p>
                                </div>
                                <div class="jumps-prevent" style="padding-top: 20px;"></div>
                                <div class="d-flex">
                                    <input type="checkbox" class="mt-1">
                                    <p class="px-1">ประกันบรรจุภัณฑ์ภายนอกเสียหาย<br>
                                        <a class="text-muted">เมื่อบรรจุภัณฑ์ภายนอกเสียหายจะได้รับค่าชดเชย
                                            <br>และเคลมเต็ม
                                            จำนวนเงินรับประกันที่บริษัทกำหนด<br> ฉันได้อ่านและยอมรับข้อกำหนดใน <br>
                                            <a href="#" class=""
                                                style="color: blue;"><u>เงื่อนไขบริการบรรจุภัณฑ์ภายนอกเสียหาย</u></a>
                                            <a class="text-muted">แล้ว</a></a>
                                    </p>
                                </div>

                                <div class="jumps-prevent d-flex justify-content-center" style="padding-top: 100px;">
                                    <a type="button" data-toggle="modal" data-target="#exampleModalCenter"
                                        style="color: red;">
                                        <u>ยกเลิกรายการ</u>
                                    </a>
                                    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalCenterTitle">
                                                        ต้องการยกเลิกรายการใช่หรือไม่
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    เหตุผลที่ทำการยกเลิก
                                                    <input class="form-control" type="text" value="">
                                                </div>
                                                <div class="modal-footer">
                                                    <a href="{{url('/cancel')}}" class="btn btn-danger">ยกเลิกรายการ</a>
                                                    <button type="button"
                                                        class="btn btn-outline-primary">เก็บไว้ก่อน</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="jumps-prevent" style="padding-top: 25px;"></div>

                                <div class="d-flex justify-content-center">
                                    <a href="{{url('/order')}}" class="btn btn-danger mx-2"
                                        style="color: red;">ยกเลิก</a>
                                    <a href="{{url('/order')}}" id="submit-button" disabled="true"
                                        class="btn btn-primary mx-2" style="color: white;">บันทึกการแก้ไข</a>
                                </div>


                            </div>
                        </div>

                    </div>
                </div>

            </div>
            <!-- Container closed -->
        </div>
        <!-- main-content closed -->

        <!-- End Page -->
        <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content" style="padding-left: 25px; padding-right: 25px;">
                    <div class="jumps-prevent" style="padding-top: 25px;"></div>
                    <h5><b>เลือกจากสมุดที่อยู่</b></h5>
                    <div class="mb-1">ค้นหา<a class="text-muted px-2">เลขออเดอร์, เลขพัสดุ, เบอร์โทรศัพท์</a></div>
                    <div class=" ">
                        <input class="form-control form-control-sm" type="text" value="" style="width : 25%;">
                    </div>
                    <div class="jumps-prevent" style="padding-top: 15px;"></div>
                    <table class="table table-striped position-relative" id="my-table">
                        <thead>
                            <tr>
                                <th>ชื่อผู้ส่ง / ผู้รับ</th>
                                <th>เบอร์โทรศัพท์</th>
                                <th>ที่อยู่</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>บริษัท โรงแรมเกทเวย์ จำกัด (บัญชี)</td>
                                <td>081-123-1412</td>
                                <td>354 ซ.พหลโยธิน 40 ถ.พหลโยธิน แขวงเสนานิคม เขตจตุจักร กรุงเทพฯ 10900</td>
                                <td>
                                    <button type="button" class="btn btn-primary">ใช้ที่อยู่นี้</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="jumps-prevent" style="padding-top: 25px;"></div>
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

        <script>
            $('#accept').on('click', function (e) {
                if (this.checked == true) {
                    $('#submit-button').prop('disabled', false);
                } else {
                    $('#submit-button').prop('disabled', true);
                }
            })

        </script>

</body>

</html>
