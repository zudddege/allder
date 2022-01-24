<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
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

        body {
            font-family: 'Kanit', 'Helvetica', 'Arial', sans-serif;
        }

    </style>

</head>

<body class="main-body app sidebar-mini">

    <div class="loader">
        <img src="{{asset("assets/img/loader.gif")}}" alt="Loading..." />
    </div>

    <div class="page">
        <div class="app-sidebar__overlay" data-bs-toggle="sidebar"></div>
        <aside class="app-sidebar sidebar-scroll ps">
            <div class="main-sidebar-header active">
                <a class="desktop-logo logo-light active" href="#"><img src="assets/img/brand/allderExpress.png" class="main-logo" alt="logo"></a>
                <a class="logo-icon mobile-logo icon-light active" href="#"><img src="assets/img/brand/icon.png" class="logo-icon" alt="logo"></a>
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

            <div class="container-fluid">
                <div class="breadcrumb-header justify-content-between">
                    <div class="my-auto">
                        <div class="d-flex">
                            <h5 class="content-title mb-0 my-auto">ตารางรายการ POD</h5>
                        </div>
                    </div>
                </div>
                <div class="row row-sm">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="jumps-prevent" style="padding-top: 10px;"></div>
                            <div class="card-body">
                                <div class="d-flex">
                                    <a class="btn btn-link" href="{{url('/export')}}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-download" viewBox="0 0 16 16">
                                            <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z" />
                                            <path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z" />
                                        </svg> <u>ดาวน์โหลด (Excel)</u>
                                    </a>
                                </div>
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
                                        <div class="mb-1">ค้นหา<a class="text-muted px-2">เลขออเดอร์, เลขพัสดุ,
                                                เบอร์โทรศัพท์</a></div>
                                        <div class="d-flex ">
                                            <div class="">
                                                <input class="form-control" type="text" value="" style="width:325px;">
                                            </div>
                                            <div class="dropdown ">
                                                <button class="btn btn-link dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-layout-three-columns" viewBox="0 0 16 16">
                                                        <path d="M0 1.5A1.5 1.5 0 0 1 1.5 0h13A1.5 1.5 0 0 1 16 1.5v13a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 14.5v-13zM1.5 1a.5.5 0 0 0-.5.5v13a.5.5 0 0 0 .5.5H5V1H1.5zM10 15V1H6v14h4zm1 0h3.5a.5.5 0 0 0 .5-.5v-13a.5.5 0 0 0-.5-.5H11v14z" />
                                                    </svg> <u>ตัวเลือกการแสดงผล</u>
                                                </button>
                                                <div class="dropdown-menu shadow" aria-labelledby="dropdownMenuButton">
                                                    <h5 class="dropdown-header">เลือกรายการเพื่อแสดงผล</h5>
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="d-flexd align-content-center mx-1">
                                                                <div class=""><input type="checkbox" id='box1' checked=""><span>เวลาที่ทำรายการ</span></input>
                                                                </div>
                                                                <div class=""><input type="checkbox" id='box2' checked="">สถานะจัดส่ง</input></div>
                                                                <div class=""><input type="checkbox" id='box3' checked="">เลขออเดอร์</input></div>
                                                                <div class=""><input type="checkbox" id='box4' checked="">เลขพัสดุ</input></div>
                                                                <div class=""><input type="checkbox" id='box5' checked="">แหล่งที่มา</input></div>
                                                                <div class=""><input type="checkbox" id='box6' checked="">ผู้ส่ง</input></div>
                                                                <div class=""><input type="checkbox" id='box7' checked="">เบอร์โทรศัพท์ผู้ส่ง</input></div>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="d-flexd align-content-center mx-1">
                                                                <div class=""><input type="checkbox" id='box8' checked="">ผู้รับ</input></div>
                                                                <div class=""><input type="checkbox" id='box9' checked="">เบอร์โทรศัพท์ผู้รับ</input></div>
                                                                <div class=""><input type="checkbox" id='box10' checked="">ประเภทสินค้า</input></div>
                                                                <div class=""><input type="checkbox" id='box11' checked="">ยอดเก็บเงินปลายทาง</input></div>
                                                                <div class=""><input type="checkbox" id='box12' checked="">ราคาโดยประมาณ</input></div>
                                                                <div class=""><input type="checkbox" id='box13' checked="">หมายเหตุ</input></div>
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
                                            <th class='subbox1'>เวลาเข้ารับพัสดุ</th>
                                            <th class='subbox2'>เลขพัสดุ</th>
                                            <th class='subbox3'>เลขออเดอร์</th>
                                            <th class='subbox4'>ผู้ส่ง</th>
                                            <th class='subbox5'>ที่อยู่ผู้ส่ง</th>
                                            <th class='subbox6'>เวลาที่พัสดุถึงปลายทาง</th>
                                            <th class='subbox7'>ผู้รับ</th>
                                            <th class='subbox8'>ที่อยู่ผู้รับ </th>
                                            <th class='subbox9'>ประเภทผู้เซ็นรับ</th>
                                            <th class='subbox10'>ชื่อผู้เซ็นรับ</th>
                                            <th class='subbox11'>เซ็นชื่อด้วยตัวบรรจง</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="td_detail_row">
                                            <td></td>
                                            <td>bbbbbbbbbbbbbbbbbbb</td>
                                            <td>ccccccccccccccccccc</td>
                                            <td>dddddddddddddddddd</td>
                                            <td>eeeeeeeeeeeeeeee</td>
                                            <td>efrthdyjgfd</td>
                                            <td>agrhtjyh</td>
                                            <td>aertyjukgjfdrthy</td>
                                            <td>aertyjukgjfdrthy</td>
                                            <td>aertyjukgjfdrthy</td>
                                            <td>aertyjukgjfdrthy</td>
                                            <td> <img src="https://fle-asset-internal.oss-ap-southeast-1.aliyuncs.com/deliveryConfirm/1641816343-04eab6a95f1b47fc8b4a9a6d1ebef144.jpg" width="60%;" height="100%;" alt=""> </td>
                                            <td class="td_detail shadow"><a href="#" class="btn btn-link"><u>ดูรายละเอียด</u></a></td>
                                        </tr>
                                        <tr class="td_detail_row">
                                            <td></td>
                                            <td>bbbbbbbbbbbbbbbbbbb</td>
                                            <td>ccccccccccccccccccc</td>
                                            <td>dddddddddddddddddd</td>
                                            <td>eeeeeeeeeeeeeeee</td>
                                            <td>efrthdyjgfd</td>
                                            <td>agrhtjyh</td>
                                            <td>aertyjukgjfdrthy</td>
                                            <td>aertyjukgjfdrthy</td>
                                            <td>aertyjukgjfdrthy</td>
                                            <td>aertyjukgjfdrthy</td>
                                            <td> <img src="https://fle-asset-internal.oss-ap-southeast-1.aliyuncs.com/deliveryConfirm/1641816343-04eab6a95f1b47fc8b4a9a6d1ebef144.jpg" width="50%;" height="50%;" alt=""> </td>
                                            <td></td>
                                        </tr>
                                        <tr class="td_detail_row">
                                            <td></td>
                                            <td>bbbbbbbbbbbbbbbbbbb</td>
                                            <td>ccccccccccccccccccc</td>
                                            <td>dddddddddddddddddd</td>
                                            <td>eeeeeeeeeeeeeeee</td>
                                            <td>efrthdyjgfd</td>
                                            <td>agrhtjyh</td>
                                            <td>aertyjukgjfdrthy</td>
                                            <td>aertyjukgjfdrthy</td>
                                            <td>aertyjukgjfdrthy</td>
                                            <td>aertyjukgjfdrthy</td>
                                            <td> <img src="https://fle-asset-internal.oss-ap-southeast-1.aliyuncs.com/deliveryConfirm/1641816343-04eab6a95f1b47fc8b4a9a6d1ebef144.jpg" width="50%;" height="50%;" alt=""> </td>
                                            <td></td>
                                        </tr>
                                        <tr class="td_detail_row">
                                            <td></td>
                                            <td>bbbbbbbbbbbbbbbbbbb</td>
                                            <td>ccccccccccccccccccc</td>
                                            <td>dddddddddddddddddd</td>
                                            <td>eeeeeeeeeeeeeeee</td>
                                            <td>efrthdyjgfd</td>
                                            <td>agrhtjyh</td>
                                            <td>aertyjukgjfdrthy</td>
                                            <td>aertyjukgjfdrthy</td>
                                            <td>aertyjukgjfdrthy</td>
                                            <td>aertyjukgjfdrthy</td>
                                            <td> <img src="https://fle-asset-internal.oss-ap-southeast-1.aliyuncs.com/deliveryConfirm/1641816343-04eab6a95f1b47fc8b4a9a6d1ebef144.jpg" width="50%;" height="50%;" alt=""> </td>
                                            <td></td>
                                        </tr>
                                        <tr class="td_detail_row">
                                            <td></td>
                                            <td>bbbbbbbbbbbbbbbbbbb</td>
                                            <td>ccccccccccccccccccc</td>
                                            <td>dddddddddddddddddd</td>
                                            <td>eeeeeeeeeeeeeeee</td>
                                            <td>efrthdyjgfd</td>
                                            <td>agrhtjyh</td>
                                            <td>aertyjukgjfdrthy</td>
                                            <td>aertyjukgjfdrthy</td>
                                            <td>aertyjukgjfdrthy</td>
                                            <td>aertyjukgjfdrthy</td>
                                            <td> <img src="https://fle-asset-internal.oss-ap-southeast-1.aliyuncs.com/deliveryConfirm/1641816343-04eab6a95f1b47fc8b4a9a6d1ebef144.jpg" width="50%;" height="50%;" alt=""> </td>
                                            <td></td>
                                        </tr>
                                        <tr class="td_detail_row">
                                            <td></td>
                                            <td>bbbbbbbbbbbbbbbbbbb</td>
                                            <td>ccccccccccccccccccc</td>
                                            <td>dddddddddddddddddd</td>
                                            <td>eeeeeeeeeeeeeeee</td>
                                            <td>efrthdyjgfd</td>
                                            <td>agrhtjyh</td>
                                            <td>aertyjukgjfdrthy</td>
                                            <td>aertyjukgjfdrthy</td>
                                            <td>aertyjukgjfdrthy</td>
                                            <td>aertyjukgjfdrthy</td>
                                            <td> <img src="https://fle-asset-internal.oss-ap-southeast-1.aliyuncs.com/deliveryConfirm/1641816343-04eab6a95f1b47fc8b4a9a6d1ebef144.jpg" width="50%;" height="50%;" alt=""> </td>
                                            <td></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
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

    <script>
        $('#my-table').DataTable({
            scrollX: true,
            "columns": [{
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
                "width": "600px"
            }, {
                "width": "100px"
            }, {
                "width": "120px"
            }, {
                "width": "600px"
            }, {
                "width": "120px"
            }, {
                "width": "120px"
            }, {
                "width": "200px"
            }, {
                "width": "120px"
            }, ],
            "ordering": false
        });
        $(".dataTables_length").css("display", "none");
        $(".dataTables_filter").css("display", "none");

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

</body>

</html>
