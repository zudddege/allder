<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="Description" content="Bootstrap Responsive Admin Web Dashboard HTML5 Template">
    <meta name="Author" content="Spruko Technologies Private Limited">
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
    <link rel="stylesheet" href="{{asset('assets/css/sidemenu.css')}}">
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/boxed.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/dark-boxed.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/style-dark.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/skin-modes.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/animate.css')}}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Kanit&display=swap" rel="stylesheet">

    <script>
        window.addEventListener("load", function () {
            const loader = document.querySelector(".loader");
            loader.className += " hidden"; // class "loader hidden"
        });

    </script>

    <style>
        .loader {
            position: fixed;
            z-index: 99;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: white;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .loader>img {
            width: 100px;
        }

        .loader.hidden {
            animation: fadeOut 0.1s;
            animation-fill-mode: forwards;
        }

        @keyframes fadeOut {
            100% {
                opacity: 0;
                visibility: hidden;
            }
        }

    </style>

    <style>
        .switch {
            position: relative;
            display: inline-block;
            width: 30px;
            height: 17px;
        }

        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            -webkit-transition: .4s;
            transition: .4s;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 13px;
            width: 13px;
            left: 2px;
            bottom: 2px;
            background-color: white;
            -webkit-transition: .4s;
            transition: .4s;
        }

        input:checked+.slider {
            background-color: #2196F3;
        }

        input:focus+.slider {
            box-shadow: 0 0 1px #2196F3;
        }

        input:checked+.slider:before {
            -webkit-transform: translateX(26px);
            -ms-transform: translateX(26px);
            transform: translateX(13px);
        }

        /* Rounded sliders */
        .slider.round {
            border-radius: 34px;
        }

        .slider.round:before {
            border-radius: 50%;
        }

        .dropdown-menu {
            width: 350px !important;
            margin-right: 50% !important;
        }

        body {
            font-family: 'Kanit', 'Helvetica', 'Arial', sans-serif;
        }

    </style>

</head>

<body class="main-body app sidebar-mini">

    <div class="loader">
        <img src="{{asset("assets/img/loader.gif")}}" alt="Loading..." />
    </div>

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
                    <li class="slide">
                        <a class="side-menu__item" data-bs-toggle="slide" href="{{url('/order')}}"><span class="side-menu__label">จัดการออเดอร์</span></a>
                    </li>
                    <li class="slide">
                        <a class="side-menu__item" data-bs-toggle="slide" href="{{url('/courier')}}"><span class="side-menu__label">เรียกคูเรียร์รับพัสดุ</span></a>
                    </li>
                    <li class="slide">
                        <a class="side-menu__item" data-bs-toggle="slide" href="{{url('/problem-order')}}"><span class="side-menu__label">ระหว่างจัดการพัสดุที่มีปัญหา</span></a>
                    </li>
                    <li class="slide">
                        <a class="side-menu__item" data-bs-toggle="slide" href="{{url('/check-order')}}"><span class="side-menu__label">ตรวจเช็คพัสดุ</span></a>
                    </li>
                    <li class="slide">
                        <a class="side-menu__item" data-bs-toggle="slide" href="{{url('/book')}}"><span class="side-menu__label">สมุดที่อยู่</span></a>
                    </li>
                    <li class="slide">
                        <a class="side-menu__item" data-bs-toggle="slide" href="{{url('/affect-cost')}}"><span class="side-menu__label">กระทบค่าขนส่ง</span></a>
                    </li>
                    <li class="slide">
                        <a class="side-menu__item" data-bs-toggle="slide" href="{{url('/cod')}}"><span class="side-menu__label">เก็บเงินพัสดุปลายทาง</span></a>
                    </li>
                    <li class="slide is-expanded">
                        <a class="side-menu__item" data-bs-toggle="slide" href="{{url('/pod')}}"><span class="side-menu__label">ตารางรายการ POD</span></a>
                    </li>
                    @if (auth()->user()->is_admin==1)
                    <li class="slide">
                        <a class="side-menu__item" data-bs-toggle="slide" href="{{url('/sub-account')}}"><span class="side-menu__label">จัดการ Sub-Account</span></a>
                    </li>
                    @endif
                </ul>
            </div>
        </aside>
        <!-- main-sidebar -->

        <!-- main-content -->
        <div class="main-content app-content">

            <!-- main-header -->
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
                            <button type="button" class="btn btn-primary mx-2" data-toggle="modal" data-target="#notify-courier-modal">เรียกพนักงานเข้ามารับพัสดุ</button>
                            <button type="button" class="btn btn-primary mx-2" data-toggle="modal" data-target="#assign-courier-modal">ระบุพนักงานเข้ารับพัสดุ</button>
                        </div>
                    </div>

                    {{-- dropdown profile --}}
                    <div>
                        <div class="nav nav-item  navbar-nav-right ml-auto">
                            <div class="dropdown main-profile-menu nav nav-item nav-link">
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }}
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <div>
                                            <div class="d-flex justify-content-center my-2">
                                                {{ Auth::user()->close_id }}
                                            </div>
                                            <div class="d-flex justify-content-center my-2">
                                                ชื่อผู้ใช้งาน / ชื่อธุรกิจ : {{ Auth::user()->name }}
                                            </div>
                                            <div class="d-flex justify-content-center my-2">
                                                อีเมล : {{ Auth::user()->email }}
                                            </div>
                                            <div class="d-flex justify-content-center my-2">
                                                เบอร์โทร : {{ Auth::user()->tel_no }}
                                            </div>
                                        </div>
                                        <div class="row" style="margin: 15px 0px;">
                                            {{-- ส่วนลด COD --}}
                                            <div class="col-6">
                                                <div>
                                                    <div class="d-flex justify-content-center align-items-center">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-tag" viewBox="0 0 16 16">
                                                            <path d="M6 4.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm-1 0a.5.5 0 1 0-1 0 .5.5 0 0 0 1 0z" />
                                                            <path d="M2 1h4.586a1 1 0 0 1 .707.293l7 7a1 1 0 0 1 0 1.414l-4.586 4.586a1 1 0 0 1-1.414 0l-7-7A1 1 0 0 1 1 6.586V2a1 1 0 0 1 1-1zm0 5.586 7 7L13.586 9l-7-7H2v4.586z" />
                                                        </svg>
                                                        <span class="mx-1">ส่วนลดที่ได้รับ</span>
                                                    </div>
                                                    <div class="d-flex justify-content-center">
                                                        <p style="color: #0275d8">{{ Auth::user()->discount }}%</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div>
                                                    <div class="d-flex justify-content-center align-items-center">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-seam" viewBox="0 0 16 16">
                                                            <path d="M8.186 1.113a.5.5 0 0 0-.372 0L1.846 3.5l2.404.961L10.404 2l-2.218-.887zm3.564 1.426L5.596 5 8 5.961 14.154 3.5l-2.404-.961zm3.25 1.7-6.5 2.6v7.922l6.5-2.6V4.24zM7.5 14.762V6.838L1 4.239v7.923l6.5 2.6zM7.443.184a1.5 1.5 0 0 1 1.114 0l7.129 2.852A.5.5 0 0 1 16 3.5v8.662a1 1 0 0 1-.629.928l-7.185 2.874a.5.5 0 0 1-.372 0L.63 13.09a1 1 0 0 1-.63-.928V3.5a.5.5 0 0 1 .314-.464L7.443.184z" />
                                                        </svg>
                                                        <span class="mx-1">COD</span>
                                                    </div>
                                                    <div class="d-flex justify-content-center">
                                                        <p style="color: #0275d8">{{ Auth::user()->cod }}%</p>
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- ส่วนลด COD --}}
                                        </div>
                                        <div class="jumps-prevent border-top" style="padding-top: 15px;"></div>
                                        {{-- ปุ่ม logout --}}
                                        <div class="d-flex justify-content-center">
                                            <a type="button" class="btn btn-danger rounded-10 mx-1 my-1" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();" style="width: 90%; height: 50%;">
                                                {{ __('Logout') }}
                                            </a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                @csrf
                                            </form>
                                        </div>
                                        {{-- ปุ่ม logout --}}
                                        <div class="jumps-prevent" style="padding-top: 15px;"></div>
                                    </div>
                                </li>
                            </div>
                        </div>
                    </div>
                    {{-- end dropdown profile --}}
                </div>
            </div>
            <!-- /main-header -->

            <!-- container -->
            <div class="container-fluid">
                <!-- breadcrumb -->
                <div class="breadcrumb-header justify-content-between">
                    <div class="my-auto">
                        <div class="d-flex px-2">
                            <h5 class="content-title mb-0 my-auto">รายละเอียด POD</h5>
                        </div>
                    </div>
                </div>
                <!-- breadcrumb -->

                <!-- row opened -->
                <div class="row row-sm">
                    <div class="col-sm-8">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex flex-row align-self-center">
                                    <h6 class="px-2 mt-2">เลขออเดอร์</h6>
                                    <h6 class="px-3 mt-2" style="color:blue"></h6>
                                    <h6 class="px-2 mt-2">เลขพัสดุ</h6>
                                    <h6 class="px-3 mt-2" style="color:blue"></h6>
                                    <h6 class="px-2 mt-2">เวลาเข้ารับพัสดุ</h6>
                                    <h6 class="px-3 mt-2" style="color:blue"></h6>
                                </div>
                                <br>
                                <div class="row row-cols-12">
                                    <div class="col-6 bd-r bd-2">
                                        <div class="d-flex">
                                            <h5 class="px-2 mt-2"><b>ข้อมูลผู้ส่ง</b></h5>
                                        </div>
                                        <div class="px-4">
                                            <p class="mt-2 mb-1">ชื่อผู้ส่ง</p>
                                            <input class="form-control" type="text" value="" readonly>
                                        </div>
                                        <div class="px-4">
                                            <p class="mt-2 mb-1">ที่อยู่</p>
                                            <textarea style="resize: none; width: 100%;" rows="4" class="border border-light form-control" readonly></textarea>
                                        </div>
                                        <div class="px-4">
                                            <p class="mt-2 mb-1">ตำบล / แขวง</p>
                                            <input class="form-control" type="text" value="" readonly>
                                        </div>
                                        <div class="px-4">
                                            <p class="mt-2 mb-1">อำเภอ / เขต</p>
                                            <input class="form-control" type="text" value="" readonly>
                                        </div>
                                        <div class="px-4">
                                            <p class="mt-2 mb-1">จังหวัด</p>
                                            <input class="form-control" type="text" value="" readonly>
                                        </div>
                                        <div class="px-4">
                                            <p class="mt-2 mb-1">รหัสไปรษณีย์</p>
                                            <input class="form-control" type="text" value="" readonly>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="d-flex">
                                            <h5 class="px-2 mt-2"><b>ข้อมูลผู้รับ</b></h5>
                                        </div>
                                        <div class="px-4">
                                            <p class="mt-2 mb-1">ชื่อผู้รับ</p>
                                            <input class="form-control" type="text" value="" readonly>
                                        </div>
                                        <div class="px-4">
                                            <p class="mt-2 mb-1">ที่อยู่</p>
                                            <textarea style="resize: none; width: 100%;" rows="4" class="border border-light form-control" readonly></textarea>
                                        </div>
                                        <div class="px-4">
                                            <p class="mt-2 mb-1">ตำบล / แขวง</p>
                                            <input class="form-control" type="text" value="" readonly>
                                        </div>
                                        <div class="px-4">
                                            <p class="mt-2 mb-1">อำเภอ / เขต</p>
                                            <input class="form-control" type="text" value="" readonly>
                                        </div>
                                        <div class="px-4">
                                            <p class="mt-2 mb-1">จังหวัด</p>
                                            <input class="form-control" type="text" value="" readonly>
                                        </div>
                                        <div class="px-4">
                                            <p class="mt-2 mb-1">รหัสไปรษณีย์</p>
                                            <input class="form-control" type="text" value="" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="jumps-prevent" style="padding-top: 20px;"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="px-4">
                                    <p class="mt-2 mb-1">ประเภทผู้เซ็นรับ</p>
                                    <input class="form-control" type="text" value="" readonly>
                                </div>
                                <div class="px-4">
                                    <p class="mt-2 mb-1">ชื่อผู้เซ็นรับ</p>
                                    <input class="form-control" type="text" value="" readonly>
                                </div>
                                <div class="px-4">
                                    <p class="mt-2 mb-1">เซ็นชื่อด้วยตัวบรรจง</p>
                                    <img src="https://fle-asset-internal.oss-ap-southeast-1.aliyuncs.com/deliveryConfirm/1641816343-04eab6a95f1b47fc8b4a9a6d1ebef144.jpg" width="100%;" height="100%;" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
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


</body>

</html>
