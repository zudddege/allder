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

    <style>
        .table th:last-child,
        .table td:last-child {
            position: sticky;
            right: 0px;
        }

        .td_detail_row:nth-child(odd) .td_detail {
            background-color: #E3E8F7;
        }

        .td_detail_row:nth-child(even) .td_detail {
            background-color: white;
        }

        .dropdown-menu {
            width: 350px !important;
            margin-right: 50% !important;
        }

        .dropend button:focus,
        .dropdown button:focus {
            color: blue !important;
        }

    </style>

    <style>
        .modal-lg {
            max-width: 50% !important;
            /* desired relative width */
            margin-left: auto !important;
            margin-right: auto !important;
        }

    </style>

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
                    <li class="slide is-expanded">
                        <a class="side-menu__item" data-bs-toggle="slide" href="{{url('/order')}}"><span class="side-menu__label">จัดการออเดอร์</span></a>
                    </li>
                    <li class="slide">
                        <a class="side-menu__item" data-bs-toggle="slide" href="{{url('/courier')}}"><span class="side-menu__label">เรียกคูเรียร์รับพัสดุ</span></a>
                    </li>
                    <li class="slide">
                        <a class="side-menu__item" data-bs-toggle="slide" href="#"><span class="side-menu__label">ระหว่างจัดการพัสดุที่มีปัญหา</span></a>
                    </li>
                    <li class="slide">
                        <a class="side-menu__item" data-bs-toggle="slide" href="{{url('/tracking')}}"><span class="side-menu__label">ตรวจเช็คพัสดุ</span></a>
                    </li>
                    <li class="slide">
                        <a class="side-menu__item" data-bs-toggle="slide" href="{{url('/book')}}"><span class="side-menu__label">สมุดที่อยู่</span></a>
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
                    @if (auth()->user()->is_admin==1)
                    <li class="slide">
                        <a class="side-menu__item" data-bs-toggle="slide" href="{{url('/sub-account')}}"><span class="side-menu__label">จัดการ Sub-Account</span></a>
                    </li>
                    @endif

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
                                        <div class="container-fluid">
                                            <div class="d-flex justify-content-center my-2">
                                                {{ Auth::user()->close_id }}
                                            </div>
                                            <div class="d-flex justify-content-center my-2">
                                                {{ Auth::user()->name }}
                                            </div>
                                            <div class="d-flex justify-content-between mx-3 my-2">
                                                <div>
                                                    {{ Auth::user()->email }}
                                                </div>
                                                <div>
                                                    tel.{{ Auth::user()->tel_no }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" style="margin: 15px 0px;">
                                            {{-- ส่วนลด COD --}}
                                            <div class="col-6">
                                                <div>
                                                    <div class="d-flex justify-content-center align-items-center">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-tag" viewBox="0 0 16 16">
                                                            <path d="M6 4.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm-1 0a.5.5 0 1 0-1 0 .5.5 0 0 0 1 0z"/>
                                                            <path d="M2 1h4.586a1 1 0 0 1 .707.293l7 7a1 1 0 0 1 0 1.414l-4.586 4.586a1 1 0 0 1-1.414 0l-7-7A1 1 0 0 1 1 6.586V2a1 1 0 0 1 1-1zm0 5.586 7 7L13.586 9l-7-7H2v4.586z"/>
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
                                                            <path d="M8.186 1.113a.5.5 0 0 0-.372 0L1.846 3.5l2.404.961L10.404 2l-2.218-.887zm3.564 1.426L5.596 5 8 5.961 14.154 3.5l-2.404-.961zm3.25 1.7-6.5 2.6v7.922l6.5-2.6V4.24zM7.5 14.762V6.838L1 4.239v7.923l6.5 2.6zM7.443.184a1.5 1.5 0 0 1 1.114 0l7.129 2.852A.5.5 0 0 1 16 3.5v8.662a1 1 0 0 1-.629.928l-7.185 2.874a.5.5 0 0 1-.372 0L.63 13.09a1 1 0 0 1-.63-.928V3.5a.5.5 0 0 1 .314-.464L7.443.184z"/>
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
            <div class="container-fluid">
                <div class="breadcrumb-header justify-content-between">
                    <div class="my-auto">
                        <div class="d-flex">
                            <h5 class="content-title mb-0 my-auto">จัดการออเดอร์</h5>
                        </div>
                    </div>
                </div>
                <div class="row row-sm">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-header" style="background-color: white;">
                                <nav>
                                    <div class="nav main-nav-line" id="nav-tab" role="tablist">
                                        <a class="nav-item nav-link active" id="nav-order-tab" data-toggle="tab" href="#nav-order" role="tab" aria-controls="nav-order" aria-selected="true">รายการเตรียมจัดส่ง</a>
                                        <a class="nav-item nav-link" id="nav-ordersuc-tab" data-toggle="tab" href="#nav-ordersuc" role="tab" aria-controls="nav-ordersuc" aria-selected="false">รายการจัดส่งแล้ว</a>
                                    </div>
                                </nav>
                            </div>
                            <div class="jumps-prevent" style="padding-top: 10px;"></div>

                            <div class="card-body">
                                <div class="tab-content" id="nav-tabContent">
                                    {{-- order-nav --}}
                                    <div class="tab-pane fade show active" id="nav-order" role="tabpanel" aria-labelledby="nav-order-tab">
                                        <div class="d-flex">
                                            <a href="{{url('/order/create')}}"><label class="btn btn-primary mx-3"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                                                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                                        <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                                                    </svg> สร้างรายการ </label>
                                            </a>
                                            <label class="btn btn-info mx-3" id='upload'>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-upload" viewBox="0 0 16 16">
                                                    <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z" />
                                                    <path d="M7.646 1.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 2.707V11.5a.5.5 0 0 1-1 0V2.707L5.354 4.854a.5.5 0 1 1-.708-.708l3-3z" />
                                                </svg> นำเข้าข้อมูล
                                            </label>
                                            <form action="/api/import/excel" method="post" enctype="multipart/form-data" id="main-form">
                                                @csrf
                                                <input type="file" style="display: none;" name="image" id='me'>
                                            </form>
                                            <a class="btn btn-link" href="{{url('/api/export/excel')}}">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-download" viewBox="0 0 16 16">
                                                    <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z" />
                                                    <path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z" />
                                                </svg> <u>ดาวน์โหลด (Excel)</u>
                                            </a>
                                            <label class="btn btn-success mx-3">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-printer" viewBox="0 0 16 16">
                                                    <path d="M2.5 8a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z"/>
                                                    <path d="M5 1a2 2 0 0 0-2 2v2H2a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h1v1a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-1h1a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-1V3a2 2 0 0 0-2-2H5zM4 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v2H4V3zm1 5a2 2 0 0 0-2 2v1H2a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1v-1a2 2 0 0 0-2-2H5zm7 2v3a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1z"/>
                                                </svg> Print
                                            </label>
                                            <label class="btn btn-danger">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-x" viewBox="0 0 16 16">
                                                    <path d="M6.854 7.146a.5.5 0 1 0-.708.708L7.293 9l-1.147 1.146a.5.5 0 0 0 .708.708L8 9.707l1.146 1.147a.5.5 0 0 0 .708-.708L8.707 9l1.147-1.146a.5.5 0 0 0-.708-.708L8 8.293 6.854 7.146z"/>
                                                    <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5v2z"/>
                                                </svg> Cancel Order
                                            </label>
                                        </div>
                                        <div class="jumps-prevent" style="padding-top: 15px;"></div>
                                        <form action="/search" method="get" id="testform">
                                            <div class="row px-2 mb-3">
                                                <div class="col-2">
                                                    <div class="mb-1 ">เวลาที่ทำรายการ</div>
                                                    <div>
                                                        <input class="form-control daterange" type="text" name="datefilter" id="datefilter" value="" />
                                                    </div>
                                                </div>
                                                <div class="col-2">
                                                    <div class="mb-1">สถานะการทำรายการ</div>
                                                    <div class="">
                                                        <input class="form-control" type="text" value="">
                                                    </div>
                                                </div>
                                                <div class="col-2">
                                                    <div class="mb-1">แหล่งที่มา</div>
                                                    <div class="">
                                                        <input class="form-control" type="text" value="">
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="mb-1">ค้นหา<a class="text-muted px-2">เลขออเดอร์, เลขพัสดุ, เบอร์โทรศัพท์</a></div>
                                                    <div class="d-flex">
                                                        <div class="">
                                                            <input class="form-control" type="text" value="" style="width:325px;">
                                                        </div>
                                                        <div class="dropdown ">
                                                            <button class="btn btn-link dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-layout-three-columns" viewBox="0 0 16 16">
                                                                    <path d="M0 1.5A1.5 1.5 0 0 1 1.5 0h13A1.5 1.5 0 0 1 16 1.5v13a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 14.5v-13zM1.5 1a.5.5 0 0 0-.5.5v13a.5.5 0 0 0 .5.5H5V1H1.5zM10 15V1H6v14h4zm1 0h3.5a.5.5 0 0 0 .5-.5v-13a.5.5 0 0 0-.5-.5H11v14z" />
                                                                </svg> <u>ตัวเลือกการแสดงผล</u>
                                                            </button>
                                                            <div class="dropdown-menu shadow" aria-labelledby="dropdownMenuButton" id="sizedrop">
                                                                <h5 class="dropdown-header">เลือกรายการเพื่อแสดงผล</h5>
                                                                <div class="row">
                                                                    <div class="col">
                                                                        <div class="d-flexd align-content-center mx-1">
                                                                            <div class=""><input type="checkbox" id='box1' checked><span>เวลาที่ทำรายการ</span></input></div>
                                                                            <div class=""><input type="checkbox" id='box2' checked>สถานะจัดส่ง</input></div>
                                                                            <div class=""><input type="checkbox" id='box3' checked>เลขออเดอร์</input></div>
                                                                            <div class=""><input type="checkbox" id='box4' checked>เลขพัสดุ</input></div>
                                                                            <div class=""><input type="checkbox" id='box5' checked>แหล่งที่มา</input></div>
                                                                            <div class=""><input type="checkbox" id='box6' checked>ผู้ส่ง</input></div>
                                                                            <div class=""><input type="checkbox" id='box7' checked>เบอร์โทรศัพท์ผู้ส่ง</input></div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col">
                                                                        <div class="d-flexd align-content-center mx-1">
                                                                            <div class=""><input type="checkbox" id='box8' checked>ผู้รับ</input></div>
                                                                            <div class=""><input type="checkbox" id='box9' checked>เบอร์โทรศัพท์ผู้รับ</input></div>
                                                                            <div class=""><input type="checkbox" id='box10' checked>ประเภทสินค้า</input></div>
                                                                            <div class=""><input type="checkbox" id='box11' checked>ยอดเก็บเงินปลายทาง</input></div>
                                                                            <div class=""><input type="checkbox" id='box12' checked>ราคาโดยประมาณ</input></div>
                                                                            <div class=""><input type="checkbox" id='box13' checked>หมายเหตุ</input></div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                        <div class="px-2 ">
                                            <table class="table table-striped position-relative" id="my-table">
                                                <thead>
                                                    <tr>
                                                        <th class=""><input id='mainbox' type="checkbox"></th>
                                                        <th class='subbox1'>เวลาที่ทำรายการ</th>
                                                        <th class='subbox2'>สถานะจัดส่ง</th>
                                                        <th class='subbox3'>เลขออเดอร์</th>
                                                        <th class='subbox4'>เลขพัสดุ</th>
                                                        <th class='subbox5'>แหล่งที่มา</th>
                                                        <th class='subbox6'>ผู้ส่ง</th>
                                                        <th class='subbox7'>เบอร์โทรศัพท์ผู้ส่ง</th>
                                                        <th class='subbox8'>ผู้รับ </th>
                                                        <th class='subbox9'>เบอร์โทรศัพท์ผู้รับ</th>
                                                        <th class='subbox10'>ประเภทสินค้า</th>
                                                        <th class='subbox11'>ยอดเก็บเงินปลายทาง</th>
                                                        <th class='subbox12'>ราคาโดยประมาณ</th>
                                                        <th class='subbox13'>หมายเหตุ</th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($orders as $order)
                                                    @if($order->status == "รอปริ้น" || $order->status == "ปริ้นแล้ว")
                                                    <tr class="td_detail_row">
                                                        <td><input class='subbox' type="checkbox"></td>
                                                        <td class='subbox1'>
                                                            {{$order->created_at->addYear(543)->format('d/m/Y - h:i a')}}</td>
                                                        <td class='subbox2'>
                                                            @if($order->status == "ปริ้นแล้ว")
                                                            <span class="border border-primary rounded-10" style="padding: 5px 10px; color: #0275d8;">{{$order->status}}</span>
                                                            @elseif($order->status == "รอปริ้น")
                                                            <span class="border border-warning rounded-10" style="padding: 5px 10px; color: #f0ad4e;">{{$order->status}}</span>
                                                            @endif
                                                        </td>
                                                        <td class='subbox3'>{{$order->order_no}}</td>
                                                        <td class='subbox4'>{{$order->tracking_no}}</td>
                                                        <td class='subbox5'>Allder Express</td>
                                                        <td class='subbox6'>{{$order->send_name}}<br>
                                                            <a class="text-muted">{{$order->send_detail}}</a>
                                                            <a class="text-muted">{{$order->send_district}}</a>
                                                            <a class="text-muted">{{$order->send_city}}</a>
                                                            <a class="text-muted">{{$order->send_province}}</a>
                                                            <a class="text-muted">{{$order->send_postal_code}}</a></td>
                                                        <td class='subbox7'>{{$order->send_tel}}</td>
                                                        <td class='subbox8'>{{$order->recv_name}}<br>
                                                            <a class="text-muted">{{$order->recv_detail}}</a>
                                                            <a class="text-muted">{{$order->recv_district}}</a>
                                                            <a class="text-muted">{{$order->recv_city}}</a>
                                                            <a class="text-muted">{{$order->recv_province}}</a>
                                                            <a class="text-muted">{{$order->recv_postal_code}}</a></td>
                                                        </td>
                                                        <td class='subbox9'>{{$order->recv_tel}}</td>
                                                        <td class='subbox10'>{{$order->category}} <br> {{$order->weight}} kg / {{$order->length_size}} x {{$order->width_size}} x {{$order->height_size}} cm</td>
                                                        <td class='subbox11'>{{$order->cod_rate}} ({{$order->cod}})</td>
                                                        <td class='subbox12'>{{$order->estimate_price_rate}} ({{$order->estimate_price}})</td>
                                                        <td class='subbox13'>{{$order->note_detail}}</td>
                                                        <td class="td_detail shadow"><a href="{{url('/order/'.$order->id.'/detail')}}" class="btn btn-link"><u>ดูรายละเอียด</u></a></td>
                                                    </tr>
                                                    @endif
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    {{-- end order-nav --}}

                                    {{-- order-suc-nav --}}
                                    <div class="tab-pane fade" id="nav-ordersuc" role="tabpanel" aria-labelledby="nav-ordersuc-tab">
                                        <div class="d-flex">
                                            <a class="btn btn-link" href="{{url('/users/export')}}"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-download" viewBox="0 0 16 16">
                                                    <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z" />
                                                    <path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z" />
                                                </svg> <u>ดาวน์โหลด (Excel)</u>
                                            </a>
                                        </div>
                                        <div class="jumps-prevent" style="padding-top: 15px;"></div>
                                        <div class="row px-2 mb-3">
                                            <div class="col-2">
                                                <div class="mb-1 ">เวลาที่ทำรายการ</div>
                                                <div>
                                                    <input class="form-control daterange" type="text" name="datefilter" value="" />
                                                </div>
                                            </div>
                                            <div class="col-2">
                                                <div class="mb-1">สถานะการทำรายการ</div>
                                                <div class="">
                                                    <input class="form-control" type="text" value="">
                                                </div>
                                            </div>
                                            <div class="col-2">
                                                <div class="mb-1">แหล่งที่มา</div>
                                                <div class="">
                                                    <input class="form-control" type="text" value="">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="mb-1">ค้นหา<a class="text-muted px-2">เลขออเดอร์, เลขพัสดุ,
                                                        เบอร์โทรศัพท์</a></div>
                                                <div class="d-flex ">
                                                    <div class="">
                                                        <input class="form-control" type="text" value="" style="width:325px;">
                                                    </div>
                                                    <div class="dropdown ">
                                                        <button class="btn btn-link dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-layout-three-columns" viewBox="0 0 16 16">
                                                                <path d="M0 1.5A1.5 1.5 0 0 1 1.5 0h13A1.5 1.5 0 0 1 16 1.5v13a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 14.5v-13zM1.5 1a.5.5 0 0 0-.5.5v13a.5.5 0 0 0 .5.5H5V1H1.5zM10 15V1H6v14h4zm1 0h3.5a.5.5 0 0 0 .5-.5v-13a.5.5 0 0 0-.5-.5H11v14z" />
                                                            </svg> <u>ตัวเลือกการแสดงผล</u>
                                                        </button>
                                                        <div class="dropdown-menu shadow" aria-labelledby="dropdownMenuButton" id="sizedrop">
                                                            <h5 class="dropdown-header">เลือกรายการเพื่อแสดงผล</h5>
                                                            <div class="row">
                                                                <div class="col">
                                                                    <div class="d-flexd align-content-center mx-1">
                                                                        <div class=""><input type="checkbox" id='box1' checked><span>เวลาที่ทำรายการ</span></input></div>
                                                                        <div class=""><input type="checkbox" id='box2' checked>สถานะจัดส่ง</input></div>
                                                                        <div class=""><input type="checkbox" id='box3' checked>เลขออเดอร์</input></div>
                                                                        <div class=""><input type="checkbox" id='box4' checked>เลขพัสดุ</input></div>
                                                                        <div class=""><input type="checkbox" id='box5' checked>แหล่งที่มา</input></div>
                                                                        <div class=""><input type="checkbox" id='box6' checked>ผู้ส่ง</input></div>
                                                                        <div class=""><input type="checkbox" id='box7' checked>เบอร์โทรศัพท์ผู้ส่ง</input></div>
                                                                    </div>
                                                                </div>
                                                                <div class="col">
                                                                    <div class="d-flexd align-content-center mx-1">
                                                                        <div class=""><input type="checkbox" id='box8' checked>ผู้รับ</input></div>
                                                                        <div class=""><input type="checkbox" id='box9' checked>เบอร์โทรศัพท์ผู้รับ</input></div>
                                                                        <div class=""><input type="checkbox" id='box10' checked>ประเภทสินค้า</input></div>
                                                                        <div class=""><input type="checkbox" id='box11' checked>ยอดเก็บเงินปลายทาง</input></div>
                                                                        <div class=""><input type="checkbox" id='box12' checked>ราคาโดยประมาณ</input></div>
                                                                        <div class=""><input type="checkbox" id='box13' checked>หมายเหตุ</input></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="px-2 ">
                                            <table class="table table-striped position-relative" id="order-success-table">
                                                <thead>
                                                    <tr>
                                                        <th class=""><input id='mainbox' type="checkbox"></th>
                                                        <th class='subbox1'>เวลาที่ทำรายการ</th>
                                                        <th class='subbox2'>สถานะจัดส่ง</th>
                                                        <th class='subbox3'>เลขออเดอร์</th>
                                                        <th class='subbox4'>เลขพัสดุ</th>
                                                        <th class='subbox5'>แหล่งที่มา</th>
                                                        <th class='subbox6'>ผู้ส่ง</th>
                                                        <th class='subbox7'>เบอร์โทรศัพท์ผู้ส่ง</th>
                                                        <th class='subbox8'>ผู้รับ </th>
                                                        <th class='subbox9'>เบอร์โทรศัพท์ผู้รับ</th>
                                                        <th class='subbox10'>ประเภทสินค้า</th>
                                                        <th class='subbox11'>ยอดเก็บเงินปลายทาง</th>
                                                        <th class='subbox12'>ราคาโดยประมาณ</th>
                                                        <th class='subbox13'>หมายเหตุ</th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($orders as $order)
                                                    @if($order->status == "เสร็จสิ้น" || $order->status == "ยกเลิก")
                                                    <tr class="td_detail_row">
                                                        <td><input class='subbox' type="checkbox"></td>
                                                        <td class='subbox1'>
                                                            {{$order->created_at->addYear(543)->format('d/m/Y - h:i a')}}</td>
                                                        <td class='subbox2'>
                                                            @if($order->status == "รอจัดสรร")
                                                            <span class="border border-primary rounded-10" style="padding: 5px 10px; color: #0275d8;">{{$order->status}}</span>
                                                            @elseif($order->status == "ระหว่างจัดส่ง")
                                                            <span class="border border-warning rounded-10" style="padding: 5px 10px; color: #f0ad4e;">{{$order->status}}</span>
                                                            @elseif($order->status == "เสร็จสิ้น")
                                                            <span class="border border-success rounded-10" style="padding: 5px 10px; color: #5cb85c;">{{$order->status}}</span>
                                                            @elseif($order->status == "ยกเลิก")
                                                            <span class="border border-danger rounded-10" style="padding: 5px 10px; color: #d9534f;">{{$order->status}}</span>
                                                            @endif
                                                        </td>
                                                        <td class='subbox3'>{{$order->order_no}}</td>
                                                        <td class='subbox4'>{{$order->tracking_no}}</td>
                                                        <td class='subbox5'>Allder Express</td>
                                                        <td class='subbox6'>{{$order->send_name}}<br>
                                                            <a class="text-muted">{{$order->send_detail}}</a>
                                                            <a class="text-muted">{{$order->send_district}}</a>
                                                            <a class="text-muted">{{$order->send_city}}</a>
                                                            <a class="text-muted">{{$order->send_province}}</a>
                                                            <a class="text-muted">{{$order->send_postal_code}}</a></td>
                                                        <td class='subbox7'>{{$order->send_tel}}</td>
                                                        <td class='subbox8'>{{$order->recv_name}}<br>
                                                            <a class="text-muted">{{$order->recv_detail}}</a>
                                                            <a class="text-muted">{{$order->recv_district}}</a>
                                                            <a class="text-muted">{{$order->recv_city}}</a>
                                                            <a class="text-muted">{{$order->recv_province}}</a>
                                                            <a class="text-muted">{{$order->recv_postal_code}}</a></td>
                                                        </td>
                                                        <td class='subbox9'>{{$order->recv_tel}}</td>
                                                        <td class='subbox10'>{{$order->category}} <br> {{$order->weight}} kg / {{$order->length_size}} x {{$order->width_size}} x {{$order->height_size}} cm</td>
                                                        <td class='subbox11'>{{$order->cod_rate}} ({{$order->cod}})</td>
                                                        <td class='subbox12'>{{$order->estimate_price_rate}} ({{$order->estimate_price}})</td>
                                                        <td class='subbox13'>{{$order->note_detail}}</td>
                                                        <td class="td_detail shadow"><a href="{{url('/order/'.$order->id.'/detail')}}" class="btn btn-link"><u>ดูรายละเอียด</u></a>
                                                        </td>
                                                    </tr>
                                                    @endif
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    {{-- end order-suc-nav --}}
                                </div>
                                {{-- end nav-con --}}
                            </div>
                            {{-- end card body --}}
                        </div>
                    </div>

                </div>

            </div>
        </div>
        {{-- modal เรียกรับพัสดุ --}}
        <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="notify-courier-modal">
            <div class="modal-dialog modal-lg">
                <form action="{{url('/api/courier/notify-courier')}}" method="POST">
                    <div class="modal-content" style="padding-left: 25px; padding-right: 25px;">
                        <div class="jumps-prevent" style="padding-top: 25px;"></div>
                        <h6><b>เรียกพนักงานเข้ารับพัสดุ</b></h6>
                        <div class="d-flex mx-2">
                            <p class="my-2"><b>ที่อยู่เข้ารับ</b></p>
                            <button type="button" class="btn btn-link" data-dismiss="modal" data-toggle="modal" data-target="#warehouse-notify-modal"><u>เลือกจากสมุดที่อยู่</u></button>
                        </div>
                        <div class="row mx-2">
                            <div class="col-6">
                                <div class="my-1">
                                    <span>รหัสคลัง</span>
                                    <input class="form-control" type="text" name="warehouse_no" id="notify_warehouse_no">
                                </div>
                                <div class="my-1">
                                    <span>ผู้ติดต่อ</span>
                                    <input class="form-control" type="text" name="contact_name" id="notify_contact_name">
                                </div>
                                <div class="my-1">
                                    <span>พื้นที่บริการ</span>
                                    <textarea style="resize: none; width: 100%;" rows="4" class="border border-light form-control" name="warehouse_detail" id="notify_warehouse_detail"></textarea>
                                </div>
                                <div class="my-1">
                                    <span>จังหวัด</span>
                                    <div class="">
                                        <input class="form-control" type="text" value="" name="warehouse_province" id="notify_warehouse_province">
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="my-1">
                                    <span>ชื่อคลัง</span>
                                    <div class="">
                                        <input class="form-control" type="text" name="warehouse_name" id="notify_warehouse_name">
                                    </div>
                                </div>
                                <div class="my-1">
                                    <span>เบอร์โทรศัพท์</span>
                                    <input class="form-control" type="text" name="warehouse_tel" id="notify_warehouse_tel">
                                </div>
                                <div class="my-1">
                                    <span>ตำบล / แขวง</span>
                                    <div class="">
                                        <input class="form-control" type="text" value="" name="warehouse_district" id="notify_warehouse_district">
                                    </div>
                                </div>
                                <div class="my-1">
                                    <span>อำเภอ / เขต</span>
                                    <div class="">
                                        <input class="form-control" type="text" value="" name="warehouse_city" id="notify_warehouse_city">
                                    </div>
                                </div>
                                <div class="my-1">
                                    <span>รหัสไปรษณีย์</span>
                                    <div class="">
                                        <input class="form-control" type="text" value="" name="warehouse_postal_code" id="notify_warehouse_postal_code">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="jumps-prevent border-bottom" style="padding-top: 25px;"></div>
                        <div class="jumps-prevent" style="padding-top: 25px;"></div>
                        <h6><b>ฝากข้อความ</b></h6>
                        <div class="mx-4">
                            <div class="row">
                                <div class="col-6">
                                    <div class="my-1">
                                        <span>จำนวนพัสดุ</span>
                                        <input class="form-control" type="text" name="estimate_parcel_quantity">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="my-1">
                                        <span>ขนาดพัสดุ</span>
                                        <input class="form-control" type="text" name="parcel size">
                                    </div>
                                </div>
                            </div>
                            <div class="my-1">
                                <span>หมายเหตุ</span>
                                <textarea style="resize: none; width: 100%;" rows="4" class="border border-light form-control" name="note_detail" id="notify_note_detail"></textarea>
                            </div>
                            <div class="container-fluid my-2">
                                <div class="d-flex my-1">
                                    <button type="button" class="btn btn-outline-secondary rounded-10 mx-1 my-1 hotkey-note-notify" style="padding: 0px 10px; height: 25px; font-size: 12px; text-align: center;">นำเทปกาวมาด้วย</button>
                                    <button type="button" class="btn btn-outline-secondary rounded-10 mx-1 my-1 hotkey-note-notify" style="padding: 0px 10px; height: 25px; font-size: 12px; text-align: center;">สินค้าพัสดุแตกหักง่าย</button>
                                    <button type="button" class="btn btn-outline-secondary rounded-10 mx-1 my-1 hotkey-note-notify" style="padding: 0px 10px; height: 25px; font-size: 12px; text-align: center;">พัสดุจำนวนมาก / ขนาดใหญ่ต้องการรถบรรทุกของ VAN เข้ารับ</button>
                                </div>
                                <div class="d-flex my-1">
                                    <button type="button" class="btn btn-outline-secondary rounded-10 mx-1 my-1 hotkey-note-notify" style="padding: 0px 10px; height: 25px; font-size: 12px; text-align: center;">นำซองเอกสารมาด้วย</button>
                                    <button type="button" class="btn btn-outline-secondary rounded-10 mx-1 my-1 hotkey-note-notify" style="padding: 0px 10px; height: 25px; font-size: 12px; text-align: center;">นำบรรจุภัณฑ์มาด้วย</button>
                                    <button type="button" class="btn btn-outline-secondary rounded-10 mx-1 my-1 hotkey-note-notify" style="padding: 0px 10px; height: 25px; font-size: 12px; text-align: center;">โปรดติดต่อก่อนเข้ารับ</button>
                                    <button type="button" class="btn btn-outline-secondary rounded-10 mx-1 my-1 hotkey-note-notify" style="padding: 0px 10px; height: 25px; font-size: 12px; text-align: center;">สถานที่เป็นตึก / อาคาร</button>
                                </div>
                            </div>
                            <div class=" d-flex align-items-center my-2">
                                <input type="checkbox" id="">ฉันได้อ่านและยอมรับข้อกำหนดใน</input>
                                <a href="#"><u>ข้อกำหนดเงื่อนไขการบริการ</u></a>
                            </div>
                            <div class="d-flex my-1" style="padding-top: 15px;">
                                <button type="button" class="btn btn-danger mx-2" data-dismiss="modal">ยกเลิก</button>
                                <button class="btn btn-primary mx-2" type="submit" id="submit-button">บันทึกการแก้ไข</button>
                            </div>
                        </div>
                        <div class="jumps-prevent" style="padding-top: 25px;"></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- end modal เรียกรับพัสดุ --}}

    {{-- modal ระบุพนักงาน --}}
    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="assign-courier-modal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content" style="padding-left: 25px; padding-right: 25px;">
                <div class="jumps-prevent" style="padding-top: 25px;"></div>
                <h6><b>ระบุพนักงานเข้ารับพัสดุ</b></h6>
                <div class="rounded-lg mx-2" style="background-color: #e48383bd">
                    <p class="mt-2" style="color: rgb(201, 61, 61); font-size: 12px; text-align: center;">คำแนะนำ: ในกรณีที่ลูกค้ามีจำนวนพัสดุที่ต้องการส่งเยอะ ลูกค้าสามารถแจ้งทางสาขาว่าต้องการพนักงานหลายท่านเข้ารับพัสดุ
                        <br>จากนั้นสอบถามรหัสพนักงานเมื่อพนักงานมาถึง แล้วกรอกรหัสพนักงานนั้นในฟังก์ชั่น"ระบุพนักงานเข้ารับพัสดุ" เพื่อสร้างงานรับให้พนักงานตั้งกล่าว</p>
                </div>
                <div class="jumps-prevent" style="padding-top: 25px;"></div>
                <div class="my-1 mx-2">
                    <span>รหัสพนักงานรับพัสดุ</span>
                    <input class="form-control" type="text" style="width: 50%" name="staff_id">
                </div>
                <div class="jumps-prevent border-bottom" style="padding-top: 25px;"></div>
                <div class="jumps-prevent" style="padding-top: 25px;"></div>
                <div class="d-flex align-items-center">
                    <span class="mx-2"><b>ที่อยู่เข้ารับพัสดุ</b></span>
                    <button type="button" class="btn btn-link" data-dismiss="modal" data-toggle="modal" data-target="#warehouse-assign-modal"><u>เลือกจากสมุดที่อยู่</u></button>
                </div>
                <div class="row mx-1">
                    <div class="col-6">
                        <div class="my-1">
                            <span>พื้นที่บริการ</span>
                            <textarea style="resize: none; width: 100%;" rows="4" class="border border-light form-control" name="warehouse_detail" id="assign_warehouse_detail"></textarea>
                        </div>
                        <div class="my-1">
                            <span>จังหวัด</span>
                            <div class="">
                                <input class="form-control" type="text" name="warehouse_province" id="assign_warehouse_province">
                            </div>

                        </div>
                    </div>
                    <div class="col-6">
                        <div class="my-1">
                            <span>ตำบล / แขวง</span>
                            <div class="">
                                <input class="form-control" type="text" name="warehouse_district" id="assign_warehouse_district">
                            </div>
                        </div>
                        <div class="my-1">
                            <span>อำเภอ / เขต</span>
                            <div class="">
                                <input class="form-control" type="text" name="warehouse_city" id="assign_warehouse_city">
                            </div>
                        </div>
                        <div class="my-1">
                            <span>รหัสไปรษณีย์</span>
                            <div class="">
                                <input class="form-control" type="text" name="warehouse_postal_code" id="assign_warehouse_postal_code">
                            </div>
                        </div>
                    </div>
                </div>
                <p><b>ที่อยู่เข้ารับพัสดุ</b></p>
                <div class="my-1 mx-2">
                    <span>จำนวนพัสดุ</span>
                    <input class="form-control" type="text" style="width: 50%">
                </div>
                <div class="my-1 mx-2">
                    <span>หมายเหตุ</span>
                    <textarea style="resize: none; width: 100%;" rows="4" class="border border-light form-control" name="note_detail" id="assign_note_detail"></textarea>
                </div>
                <div class="container-fluid my-2 mx-2">
                    <div class="d-flex my-1">
                        <button type="button" class="btn btn-outline-secondary rounded-10 mx-1 my-1 hotkey-note-assign" style="padding: 0px 10px; height: 25px; font-size: 12px; text-align: center;">นำเทปกาวมาด้วย</button>
                        <button type="button" class="btn btn-outline-secondary rounded-10 mx-1 my-1 hotkey-note-assign" style="padding: 0px 10px; height: 25px; font-size: 12px; text-align: center;">สินค้าพัสดุแตกหักง่าย</button>
                        <button type=" button" class="btn btn-outline-secondary rounded-10 mx-1 my-1 hotkey-note-assign" style="padding: 0px 10px; height: 25px; font-size: 12px; text-align: center;">พัสดุจำนวนมาก / ขนาดใหญ่ต้องการรถบรรทุกของ VAN เข้ารับ</button>
                    </div>
                    <div class=" d-flex my-1">
                        <button type="button" class="btn btn-outline-secondary rounded-10 mx-1 my-1 hotkey-note-assign" style="padding: 0px 10px; height: 25px; font-size: 12px; text-align: center;">นำซองเอกสารมาด้วย</button>
                        <button type=" button" class="btn btn-outline-secondary rounded-10 mx-1 my-1 hotkey-note-assign" style="padding: 0px 10px; height: 25px; font-size: 12px; text-align: center;">นำบรรจุภัณฑ์มาด้วย</button>
                        <button type=" button" class="btn btn-outline-secondary rounded-10 mx-1 my-1 hotkey-note-assign" style="padding: 0px 10px; height: 25px; font-size: 12px; text-align: center;">โปรดติดต่อก่อนเข้ารับ</button>
                        <button type=" button" class="btn btn-outline-secondary rounded-10 mx-1 my-1 hotkey-note-assign" style="padding: 0px 10px; height: 25px; font-size: 12px; text-align: center;">สถานที่เป็นตึก / อาคาร</button>
                    </div>
                </div>
                <div class=" d-flex my-1 mx-2" style="padding-top: 15px;">
                    <input class="btn btn-danger mx-2" type="reset" value="ยกเลิก">
                    <input class="btn btn-primary mx-2" type="submit" value="ยืนยันรายการ" id="submit-button">
                </div>
                <div class="jumps-prevent" style="padding-top: 25px;"></div>
            </div>
        </div>
    </div>
    {{-- end modal ระบุพนักงาน --}}

    {{-- modal สมุดที่อยู่คลัง --}}
    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="warehouse-notify-modal">
        <div class="modal-dialog modal-xl">
            <div class="modal-content" style="padding-left: 25px; padding-right: 25px;">
                <div class="jumps-prevent" style="padding-top: 25px;"></div>
                <h5><b>เลือกจากสมุดที่อยู่</b></h5>
                <div class="mb-1">ค้นหา<a class="text-muted px-2">เลขออเดอร์, เลขพัสดุ, เบอร์โทรศัพท์</a></div>
                <div class=" ">
                    <input class="form-control form-control-sm" type="text" value="" style="width : 25%;">
                </div>
                <div class="jumps-prevent" style="padding-top: 15px;"></div>
                <table class="table table-striped position-relative warehouse-table" style="width: 100%;">
                    <thead>
                        <tr>
                            <th>รหัสคลังสินค้า</th>
                            <th>ชื่อคลังสินค้า</th>
                            <th>ที่อยู่</th>
                            <th>ผู้ติดต่อ</th>
                            <th>เบอร์โทรศัพท์</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($warehouses as $warehouse)
                        <tr>
                            <td>{{$warehouse->warehouse_no}}</td>
                            <td>{{$warehouse->warehouse_name}}</td>
                            <td>
                                {{$warehouse->warehouse_detail}}
                                {{$warehouse->warehouse_district}}
                                {{$warehouse->warehouse_city}}
                                {{$warehouse->warehouse_province}}
                                {{$warehouse->warehouse_postal_code}}
                            </td>
                            <td>{{$warehouse->contact_name}}</td>
                            <td>{{$warehouse->warehouse_tel}}</td>
                            <td><button type='button' class='btn btn-primary notify-wh-button' id="{{$warehouse->id}}" data-dismiss='modal'>ใช้ที่อยู่นี้</button></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="jumps-prevent" style="padding-top: 25px;"></div>
            </div>
        </div>
    </div>

    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="warehouse-assign-modal">
        <div class="modal-dialog modal-xl">
            <div class="modal-content" style="padding-left: 25px; padding-right: 25px;">
                <div class="jumps-prevent" style="padding-top: 25px;"></div>
                <h5><b>เลือกจากสมุดที่อยู่</b></h5>
                <div class="mb-1">ค้นหา<a class="text-muted px-2">เลขออเดอร์, เลขพัสดุ, เบอร์โทรศัพท์</a></div>
                <div class=" ">
                    <input class="form-control form-control-sm" type="text" value="" style="width : 25%;">
                </div>
                <div class="jumps-prevent" style="padding-top: 15px;"></div>
                <table class="table table-striped position-relative warehouse-table" style="width: 100%;">
                    <thead>
                        <tr>
                            <th>รหัสคลังสินค้า</th>
                            <th>ชื่อคลังสินค้า</th>
                            <th>ที่อยู่</th>
                            <th>ผู้ติดต่อ</th>
                            <th>เบอร์โทรศัพท์</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($warehouses as $warehouse)
                        <tr>
                            <td>{{$warehouse->warehouse_no}}</td>
                            <td>{{$warehouse->warehouse_name}}</td>
                            <td>
                                {{$warehouse->warehouse_detail}}
                                {{$warehouse->warehouse_district}}
                                {{$warehouse->warehouse_city}}
                                {{$warehouse->warehouse_province}}
                                {{$warehouse->warehouse_postal_code}}
                            </td>
                            <td>{{$warehouse->contact_name}}</td>
                            <td>{{$warehouse->warehouse_tel}}</td>
                            <td><button type='button' class='btn btn-primary assign-wh-button' id="{{$warehouse->id}}" data-dismiss='modal'>ใช้ที่อยู่นี้</button></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="jumps-prevent" style="padding-top: 25px;"></div>
            </div>
        </div>
    </div>
    {{-- end modal สมุดที่อยู่คลัง --}}

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
            autocomplete_size: 5,
        });

        $.Thailand({
            // database: './jquery.Thailand.js/database/db.zip', // ฐานข้อมูลเป็นไฟล์ zip
            $district: $('#notify_warehouse_district'), // input ของตำบล
            $amphoe: $('#notify_warehouse_city'), // input ของอำเภอ
            $province: $('#notify_warehouse_province'), // input ของจังหวัด
            $zipcode: $('#notify_warehouse_postal_code'), // input ของรหัสไปรษณีย์
        });

    </script>

    <script>
        $('#my-table').DataTable({
            scrollX: true,
            language: {
                emptyTable: "ไม่พบข้อมูล"
            },
            columns: [{
                "width": "2%"
            }, {
                "width": "150px"
            }, {
                "width": "100px",
            }, {
                "width": "100px"
            }, {
                "width": "100px"
            }, {
                "width": "60px"
            }, {
                "width": "600px"
            }, {
                "width": "120px"
            }, {
                "width": "600px"
            }, {
                "width": "120px"
            }, {
                "width": "300px"
            }, {
                "width": "150px"
            }, {
                "width": "120px"
            }, {
                "width": "250px"
            }, {
                "width": "120px"
            }, ],
            "ordering": false
        });
        $(".dataTables_length").css("display", "none");
        $(".dataTables_filter").css("display", "none");

        $('.warehouse-table').DataTable({
            autoWidth: false,
            searching: false,
            filter: false,
            ordering: false,
            paging: false,
            info: false,
            language: {
                emptyTable: "ไม่พบข้อมูล"
            },
            columns: [{
                "width": "15%"
            }, {
                "width": "15%"
            }, {
                "width": "23%",
            }, {
                "width": "20%"
            }, {
                "width": "15%"
            }, {
                "width": "12%"
            }],
            "ordering": false
        });
        $(".dataTables_length").css("display", "none");
        $(".dataTables_filter").css("display", "none");

    </script>

    <script>
        $('#order-success-table').DataTable({
            scrollX: true,
            autoWidth: true,
            language: {
                emptyTable: "ไม่พบข้อมูล"
            },
            columns: [{
                "width": "2%"
            }, {
                "width": "150px"
            }, {
                "width": "100px",
            }, {
                "width": "100px"
            }, {
                "width": "100px"
            }, {
                "width": "60px"
            }, {
                "width": "600px"
            }, {
                "width": "120px"
            }, {
                "width": "600px"
            }, {
                "width": "120px"
            }, {
                "width": "300px"
            }, {
                "width": "150px"
            }, {
                "width": "120px"
            }, {
                "width": "250px"
            }, {
                "width": "120px"
            }, ],
            "ordering": false,

        });
        $(".dataTables_length").css("display", "none");
        $(".dataTables_filter").css("display", "none");

    </script>

    <script>
        var mytable = $('#my-table').DataTable()
        var ordersuccesstable = $('#order-success-table').DataTable()

        $('a[data-toggle="tab"]').on("shown.bs.tab", function (e) {
            mytable.columns.adjust().draw();
            ordersuccesstable.columns.adjust().draw();
        });

    </script>

    <script>
        $('#upload').click(function () {
            $('#me').click();
        });

        function readURL(input) {
            if (input.files && input.files[0]) {
                $('#main-form').submit();
            }
        }

        $('#me').on("change", function () {
            readURL(this);
        });

        $('#mainbox').on('change', function (e) {
            if (this.checked == true) {
                $('.subbox').prop('checked', true)
            } else {
                $('.subbox').prop('checked', false)
            }
            $('.subbox')
        })

    </script>
    <script>
        $("#box1").click(function () {
            if ($(this).prop("checked")) {
                $(".subbox1").show();
            } else {
                $(".subbox1").hide();
            }
        });
        $("#box2").click(function () {
            if ($(this).prop("checked")) {
                $(".subbox2").show();
            } else {
                $(".subbox2").hide();
            }
        });
        $("#box3").click(function () {
            if ($(this).prop("checked")) {
                $(".subbox3").show();
            } else {
                $(".subbox3").hide();
            }
        });
        $("#box4").click(function () {
            if ($(this).prop("checked")) {
                $(".subbox4").show();
            } else {
                $(".subbox4").hide();
            }
        });
        $("#box5").click(function () {
            if ($(this).prop("checked")) {
                $(".subbox5").show();
            } else {
                $(".subbox5").hide();
            }
        });
        $("#box6").click(function () {
            if ($(this).prop("checked")) {
                $(".subbox6").show();
            } else {
                $(".subbox6").hide();
            }
        });
        $("#box7").click(function () {
            if ($(this).prop("checked")) {
                $(".subbox7").show();
            } else {
                $(".subbox7").hide();
            }
        });
        $("#box8").click(function () {
            if ($(this).prop("checked")) {
                $(".subbox8").show();
            } else {
                $(".subbox8").hide();
            }
        });
        $("#box9").click(function () {
            if ($(this).prop("checked")) {
                $(".subbox9").show();
            } else {
                $(".subbox9").hide();
            }
        });
        $("#box10").click(function () {
            if ($(this).prop("checked")) {
                $(".subbox10").show();
            } else {
                $(".subbox10").hide();
            }
        });
        $("#box11").click(function () {
            if ($(this).prop("checked")) {
                $(".subbox11").show();
            } else {
                $(".subbox11").hide();
            }
        });
        $("#box12").click(function () {
            if ($(this).prop("checked")) {
                $(".subbox12").show();
            } else {
                $(".subbox12").hide();
            }
        });
        $("#box13").click(function () {
            if ($(this).prop("checked")) {
                $(".subbox13").show();
            } else {
                $(".subbox13").hide();
            }
        });

        $('#mainbox').on('change', function (e) {
            if (this.checked == true) {
                $('.subbox').prop('checked', true)
            } else {
                $('.subbox').prop('checked', false)
            }
            $('.subbox')
        });

    </script>

    <script>
        $('.notify-wh-button').on('click', function () {
            var id = $(this).attr('id');
            $.ajax({
                url: '/api/book/warehouse/get',
                data: {
                    id: id
                },
                success: function (res) {
                    $('#notify_warehouse_no').val(res.warehouse_no);
                    $('#notify_warehouse_name').val(res.warehouse_name);
                    $('#notify_contact_name').val(res.contact_name);
                    $('#notify_warehouse_tel').val(res.warehouse_tel);
                    $('#notify_warehouse_detail').val(res.warehouse_detail);
                    $('#notify_warehouse_district').val(res.warehouse_district);
                    $('#notify_warehouse_city').val(res.warehouse_city);
                    $('#notify_warehouse_province').val(res.warehouse_province);
                    $('#notify_warehouse_postal_code').val(res.warehouse_postal_code);
                    $('#notify-courier-modal').modal('show');
                }
            })
        });

        $('.assign-wh-button').on('click', function () {
            var id = $(this).attr('id');
            $.ajax({
                url: '/api/book/warehouse/get',
                data: {
                    id: id
                },
                success: function (res) {
                    $('#assign_warehouse_detail').val(res.warehouse_detail);
                    $('#assign_warehouse_district').val(res.warehouse_district);
                    $('#assign_warehouse_city').val(res.warehouse_city);
                    $('#assign_warehouse_province').val(res.warehouse_province);
                    $('#assign_warehouse_postal_code').val(res.warehouse_postal_code);
                    $('#assign-courier-modal').modal('show');
                }
            })
        });

        $('.hotkey-note-notify').on('click', function () {
            var text = $(this).html();
            $('#notify_note_detail').append(text + "   ");
        });

        $('.hotkey-note-assign').on('click', function () {
            var text = $(this).html();
            $('#assign_note_detail').append(text + "   ");
        });

    </script>

    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

    <script type="text/javascript">
        $(function () {

            $('input[name="datefilter"]').daterangepicker({
                autoUpdateInput: false,
                locale: {
                    cancelLabel: 'Clear'
                }
            });

            $('input[name="datefilter"]').on('apply.daterangepicker', function (ev, picker) {
                $(this).val(picker.startDate.format('DD/MM/YYYY') + ' - ' + picker.endDate.format(
                    'DD/MM/YYYY'));
            });

            $('input[name="datefilter"]').on('cancel.daterangepicker', function (ev, picker) {
                $(this).val('');
            });

        });
        $(function () {
            var start = moment().subtract(15, 'days');
            var end = moment();

            function cb(start, end) {
                $('.daterange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
            }

            $('.daterange').daterangepicker({
                startDate: start,
                endDate: end,
                autoUpdateInput: true,
                alwaysShowCalendars: true,
                locale: {
                    format: 'DD/MM/YYYY',
                },
                ranges: {
                    'Today': [moment(), moment()],
                    'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                    'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                    'This Month': [moment().startOf('month'), moment().endOf('month')],
                    'Last Month': [moment().subtract(1, 'month').startOf('month'), moment()
                        .subtract(1, 'month').endOf('month')
                    ]
                }
            }, cb);

            $('.daterange').on('apply.daterangepicker', function (ev, picker) {
                $('#testform').submit();
            });
            cb(start, end);
        });

    </script>
</body>

</html>
