<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Allder Express</title>
    <link href="{{asset('assets/img/brand/icon.png')}}" type="image/x-icon" rel="icon">
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
    <link href="https://earthchie.github.io/jquery.Thailand.js/jquery.Thailand.js/dist/jquery.Thailand.min.css" rel="stylesheet">
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
        .modal-lg {
            max-width: 70% !important;
            /* desired relative width */
            margin-left: auto !important;
            margin-right: auto !important;
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
                <a class="desktop-logo logo-light active" href="#"><img src="{{ asset('assets/img/brand/allderExpress.png')}}" class="main-logo" alt="logo"></a>
                <a class="logo-icon mobile-logo icon-light active" href="#"><img src="{{ asset('assets/img/brand/icon.png')}}" class="logo-icon" alt="logo"></a>
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
                    <li class="slide">
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
                        <div class="d-flex">
                            <h5 class="content-title mb-0 my-auto">จัดการออเดอร์</h5>
                        </div>
                    </div>
                </div>
                <form action="{{ url('/api/order/'.$order->id.'/modify') }}" method="POST">
                    @csrf
                    <div class="row row-sm">
                        <div class="col-sm-8">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex flex-row align-self-center">
                                        <h6 class="px-2 mt-2">เลขออเดอร์</h6>
                                        <h6 class="px-3 mt-2" style="color:blue">{{$order->order_no}}</h6>
                                        <h6 class="px-2 mt-2">เลขพัสดุ</h6>
                                        <h6 class="px-3 mt-2" style="color:blue">{{$order->tracking_no}}</h6>
                                        <h6 class="px-2 mt-2">เวลาที่ทำรายการ</h6>
                                        <h6 class="px-3 mt-2" style="color:blue">{{$order->created_at->addYear(543)->format('d/m/Y - h:i a')}}</h6>
                                    </div>
                                    <br>
                                    <div class="row row-cols-12">
                                        <div class="col-6 bd-r bd-2">
                                            <div class="d-flex">
                                                <h5 class="px-2 mt-2"><b>ข้อมูลผู้ส่ง</b></h5>
                                                <button type="button" class="btn btn-link" data-toggle="modal" data-target="#send-modal"><u>เลือกจากสมุดที่อยู่</u></button>
                                            </div>
                                            <div class="px-4">
                                                <p class="mt-2 mb-1">ชื่อผู้ส่ง</p>
                                                <input class="form-control" type="text" value="{{$order->send_name}}" name="send_name" id="send_name">
                                            </div>
                                            <div class="px-4">
                                                <p class="mt-2 mb-1">เบอร์โทรศัพท์</p>
                                                <input class="form-control" type="text" value="{{$order->send_tel}}" name="send_tel" id="send_tel">
                                            </div>
                                            <div class="px-4">
                                                <p class="mt-2 mb-1">ที่อยู่</p>
                                                <textarea style="resize: none; width: 100%;" rows="4" class="border border-light form-control" name="send_detail" id="send_detail">{{ $order->send_detail }}</textarea>
                                            </div>
                                            <div class="px-4">
                                                <p class="mt-2 mb-1">ตำบล / แขวง</p>
                                                <input class="form-control" type="text" name="send_district" value="{{ $order->send_district }}" readonly>
                                            </div>
                                            <div class="px-4">
                                                <p class="mt-2 mb-1">อำเภอ / เขต</p>
                                                <input class="form-control" type="text" name="send_city" value="{{ $order->send_city }}" readonly>
                                            </div>
                                            <div class="px-4">
                                                <p class="mt-2 mb-1">จังหวัด</p>
                                                <input class="form-control" type="text" name="send_province" value="{{ $order->send_province }}" readonly>
                                            </div>
                                            <div class="px-4">
                                                <p class="mt-2 mb-1">รหัสไปรษณีย์</p>
                                                <input class="form-control" type="text" name="send_postal_code" value="{{ $order->send_postal_code }}" readonly>
                                            </div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="d-flex px-4 mt-3">
                                                        <input type="checkbox" class="mt-1" name="main_address" value="1" id="main_address">
                                                        <p class="px-1">ตั้งเป็นที่อยู่หลัก</p>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="d-flex px-1 mt-3">
                                                        <input type="checkbox" class="mt-1" name="save_send_address" value="1" id="save_send_address">
                                                        <p class="px-1">บันทึกข้อมูลที่อยู่</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="d-flex">
                                                <h5 class="px-2 mt-2"><b>ข้อมูลผู้รับ</b></h5>
                                                <button type="button" class="btn btn-link" data-toggle="modal" data-target="#recv-modal"><u>เลือกจากสมุดที่อยู่</u></button>
                                            </div>
                                            <div class="px-4">
                                                <p class="mt-2 mb-1">ชื่อผู้รับ</p>
                                                <input class="form-control" type="text" value="{{$order->recv_name}}" name="recv_name" id="recv_name">
                                            </div>
                                            <div class="px-4">
                                                <p class="mt-2 mb-1">เบอร์โทรศัพท์</p>
                                                <input class="form-control" type="text" value="{{$order->recv_tel}}" name="recv_tel" id="recv_tel">
                                            </div>
                                            <div class="px-4">
                                                <p class="mt-2 mb-1">ที่อยู่</p>
                                                <textarea style="resize: none; width: 100%;" rows="4" class="border border-light form-control" name="recv_detail" id="recv_detail">{{ $order->recv_detail }}</textarea>
                                            </div>
                                            <div class="px-4">
                                                <p class="mt-2 mb-1">ตำบล / แขวง</p>
                                                <input class="form-control" type="text" value="{{ $order->recv_district }}" name="recv_district" id="recv_district">
                                            </div>
                                            <div class="px-4">
                                                <p class="mt-2 mb-1">อำเภอ / เขต</p>
                                                <input class="form-control" type="text" value="{{ $order->recv_city }}" name="recv_city" id="recv_city">
                                            </div>
                                            <div class="px-4">
                                                <p class="mt-2 mb-1">จังหวัด</p>
                                                <input class="form-control" type="text" value="{{ $order->recv_province }}" name="recv_province" id="recv_province">
                                            </div>
                                            <div class="px-4">
                                                <p class="mt-2 mb-1">รหัสไปรษณีย์</p>
                                                <input class="form-control" type="text" value="{{ $order->recv_postal_code }}" name="recv_postal_code" id="recv_postal_code">
                                            </div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="d-flex px-4 mt-3">
                                                        <input type="checkbox" class="mt-1" name="save_recv_address" id="save_recv_address">
                                                        <p class="px-1">บันทึกข้อมูลที่อยู่</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="jumps-prevent" style="padding-top: 20px;"></div>
                                    <h5 class="px-2 mt-2"><b>รายละเอียดสินค้า</b></h5>
                                    <div class="row px-2 mt-3">
                                        <div class="col-3">
                                            <p class="mb-1">ประเภทสินค้า</p>
                                            <select class="custom-select my-1 mr-sm-2 border-light" id="inlineFormCustomSelectPref" style="width: 100%; height: 35px;" name="category">
                                                <option disabled>ประเภทสินค้า</option>
                                                <option value="0" @if($order->category_text == "เอกสาร")selected @endif>เอกสาร</option>
                                                <option value="1" @if($order->category_text == "อาหารแห้ง")selected @endif>อาหารแห้ง</option>
                                                <option value="2" @if($order->category_text == "ของใช้ทั่วไป")selected @endif>ของใช้ทั่วไป</option>
                                                <option value="3" @if($order->category_text == "อุปกรณ์ไอที")selected @endif>อุปกรณ์ไอที</option>
                                                <option value="4" @if($order->category_text == "เสื้อผ้า")selected @endif>เสื้อผ้า</option>
                                                <option value="5" @if($order->category_text == "สื่อบันเทิง")selected @endif>สื่อบันเทิง</option>
                                                <option value="6" @if($order->category_text == "อะไหล่ยนต์")selected @endif>อะไหล่ยนต์</option>
                                                <option value="7" @if($order->category_text == "รองเท้า/กระเป๋า")selected @endif>รองเท้า/กระเป๋า</option>
                                                <option value="8" @if($order->category_text == "อุปกรณ์กีฬา")selected @endif>อุปกรณ์กีฬา</option>
                                                <option value="9" @if($order->category_text == "เครื่องสำอางค์")selected @endif>เครื่องสำอางค์</option>
                                                <option value="10" @if($order->category_text == "เฟอร์นิเจอร์")selected @endif>เฟอร์นิเจอร์</option>
                                                <option value="11" @if($order->category_text == "ผลไม้")selected @endif>ผลไม้</option>
                                                <option value="99" @if($order->category_text == "อื่นๆ")selected @endif>อื่นๆ</option>
                                            </select>
                                        </div>
                                        <div class="col-3">
                                            <p class="mb-1">น้ำหนัก</p>
                                            <div class="d-flex">
                                                <input class="form-control" type="text" value="{{ $order->weight }}" name="weight">
                                                <p class="mt-2 px-1">kg.</p>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <p class="mb-1">ขนาด<a class="text-muted px-2">ยาว x กว้าง x สูง</a></p>
                                            <div class="d-flex">
                                                <input class="form-control" type="text" value="{{ $order->length}}" name="length_size">
                                                <a class="mt-2 px-2">x</a>
                                                <input class="form-control" type="text" value="{{ $order->width}}" name="width_size">
                                                <a class="mt-2 px-2">x</a>
                                                <input class="form-control" type="text" value="{{ $order->height }}" name="height_size">
                                                <a class="mt-2 px-2">cm.</a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row px-2 mt-3">
                                        <div class="col-4">
                                            <p class="mb-1">COD<a class="text-muted px-2">ยอดเก็บเงินปลายทาง</a></p>
                                            <input class="form-control" type="text" value="{{$order->order_cod}}" name="cod">
                                        </div>
                                        <div class="col">
                                            <p class="mb-1">หมายเหตุ</p>
                                            <input class="form-control" type="text" value="{{$order->note_detail}}" name="note_detail">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex">
                                        <input type="checkbox" class="mt-1" id="accept" checked>
                                        <p class="px-1">ฉันได้อ่านและยอมรับข้อกำหนดใน<br>
                                            <a href="#" class="" style="color: blue;"><u>ข้อกำหนดเงื่อนไขการบริการ</u></a>
                                        </p>
                                    </div>
                                    <div class="jumps-prevent" style="padding-top: 20px;"></div>
                                    <div class="d-flex">
                                        <input type="checkbox" class="mt-1" name="is_return_insurance" value="1" @if($order->is_return_insurance) checked @endif>
                                        <p class="px-1">ประกันพัสดุดีดกลับ<br>
                                            <a class="text-muted">หากพัสดุถูกดีดกลับ
                                                จะไม่คิดค่าขนส่งดีดกลับ<br>ฉันได้อ่านและยอมรับข้อกำหนดใน <br>
                                                <a href="#" class="" style="color: blue;"><u>เงื่อนไขความคุ้มครองพัสดุดีดกลับ</u></a>
                                                <a class="text-muted">แล้ว</a></a>
                                        </p>
                                    </div>
                                    <div class="jumps-prevent" style="padding-top: 20px;"></div>
                                    <div class="d-flex">
                                        <input type="checkbox" class="mt-1" name="is_protect_insurance" value="1" @if($order->is_protect_insurance) checked @endif>
                                        <p class="px-1">ประกันคุ้มครองพัสดุ</p>
                                    </div>
                                    <div class="jumps-prevent" style="padding-top: 20px;"></div>
                                    <div class="d-flex">
                                        <input type="checkbox" class="mt-1" name="is_express_transport" value="1" @if($order->is_express_transport) checked @endif>
                                        <p class="px-1">SPEED<br>
                                            <a class="text-muted">คาดการณ์จัดส่งภายในวันที่<br>เพื่อรับรองประสิทธิภาพการจัดส่งพัสดุ
                                                กรุณาบุ๊คกิ๊งก่อนเวลา <br> ฉันได้อ่านและยอมรับข้อกำหนดใน <br>
                                                <a href="#" class="" style="color: blue;"><u>เงื่อนไขและข้อกำหนดของ SPEED</u></a>
                                                <a class="text-muted">แล้ว</a></a>
                                        </p>
                                    </div>
                                    <div class="jumps-prevent" style="padding-top: 20px;"></div>
                                    <div class="d-flex">
                                        <input type="checkbox" class="mt-1" name="is_damage_insurance" value="1" @if($order->is_damage_insurance) checked @endif>
                                        <p class="px-1">ประกันบรรจุภัณฑ์ภายนอกเสียหาย<br>
                                            <a class="text-muted">เมื่อบรรจุภัณฑ์ภายนอกเสียหายจะได้รับค่าชดเชย
                                                <br>และเคลมเต็ม
                                                จำนวนเงินรับประกันที่บริษัทกำหนด<br> ฉันได้อ่านและยอมรับข้อกำหนดใน <br>
                                                <a href="#" class="" style="color: blue;"><u>เงื่อนไขบริการบรรจุภัณฑ์ภายนอกเสียหาย</u></a>
                                                <a class="text-muted">แล้ว</a></a>
                                        </p>
                                    </div>

                                    <div class="jumps-prevent d-flex justify-content-center" style="padding-top: 100px;">
                                        <a type="button" data-toggle="modal" data-target="#exampleModalCenter" style="color: red;">
                                            <u>ยกเลิกรายการ</u>
                                        </a>
                                    </div>
                                    <div class="jumps-prevent" style="padding-top: 25px;"></div>
                                    <div class="d-flex justify-content-center">
                                        <a href="{{url('/order')}}"><button type="button" class="btn btn-danger mx-2">ยกเลิก</button></a>
                                        <button class="btn btn-primary mx-2" type="submit" id="submit-button">บันทึกการแก้ไข</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <!-- Container closed -->
        </div>
        <!-- main-content closed -->

        <!-- End Page -->
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <form action="{{url('/api/order/'.$order->id.'/cancel')}}" method="POST">
                    @csrf
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalCenterTitle">
                                ต้องการยกเลิกรายการใช่หรือไม่
                            </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            เหตุผลที่ทำการยกเลิก
                            <input class="form-control" type="text" value="" name="cancel_reason" id="cancel_reason">
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-danger">ยกเลิกรายการ</button>
                            <button type="button" class="btn btn-outline-primary" data-dismiss="modal">เก็บไว้ก่อน</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="send-modal">
            <div class="modal-dialog modal-lg">
                <div class="modal-content" style="padding-left: 25px; padding-right: 25px;">
                    <div class="jumps-prevent" style="padding-top: 25px;"></div>
                    <h5><b>เลือกจากสมุดที่อยู่</b></h5>
                    <div class="mb-1">ค้นหา<a class="text-muted px-2">เลขออเดอร์, เลขพัสดุ, เบอร์โทรศัพท์</a></div>
                    <div class=" ">
                        <input class="form-control form-control-sm" type="text" value="" style="width : 25%;">
                    </div>
                    <div class="jumps-prevent" style="padding-top: 15px;"></div>
                    <table class="table table-striped position-relative " id="send-table" style="width: 100%;">
                        <thead>
                            <tr>
                                <th>ชื่อผู้ส่ง / ผู้รับ</th>
                                <th>เบอร์โทรศัพท์</th>
                                <th>ที่อยู่</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($addressBooks as $addressBook)
                            <tr>
                                <td>{{$addressBook->book_name}}</td>
                                <td>{{$addressBook->book_tel}}</td>
                                <td>
                                    {{$addressBook->book_detail}}
                                    {{$addressBook->book_district}}
                                    {{$addressBook->book_city}}
                                    {{$addressBook->book_province}}
                                    {{$addressBook->book_postal_code}}
                                </td>
                                <td><button type='button' class='btn btn-primary send-button' id="{{$addressBook->id}}" data-dismiss='modal'>ใช้ที่อยู่นี้</button></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="jumps-prevent" style="padding-top: 25px;"></div>
                </div>
            </div>
        </div>
        <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="recv-modal">
            <div class="modal-dialog modal-lg">
                <div class="modal-content" style="padding-left: 25px; padding-right: 25px;">
                    <div class="jumps-prevent" style="padding-top: 25px;"></div>
                    <h5><b>เลือกจากสมุดที่อยู่</b></h5>
                    <div class="mb-1">ค้นหา<a class="text-muted px-2">เลขออเดอร์, เลขพัสดุ, เบอร์โทรศัพท์</a></div>
                    <div class=" ">
                        <input class="form-control form-control-sm" type="text" value="" style="width : 25%;">
                    </div>
                    <div class="jumps-prevent" style="padding-top: 15px;"></div>
                    <table class="table table-striped position-relative " id="recv-table" style="width: 100%;">
                        <thead>
                            <tr>
                                <th>ชื่อผู้ส่ง / ผู้รับ</th>
                                <th>เบอร์โทรศัพท์</th>
                                <th>ที่อยู่</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($addressBooks as $addressBook)
                            <tr>
                                <td>{{$addressBook->book_name}}</td>
                                <td>{{$addressBook->book_tel}}</td>
                                <td>
                                    {{$addressBook->book_detail}}
                                    {{$addressBook->book_district}}
                                    {{$addressBook->book_city}}
                                    {{$addressBook->book_province}}
                                    {{$addressBook->book_postal_code}}
                                </td>
                                <td><button type='button' class='btn btn-primary recv-button' id="{{$addressBook->id}}" data-dismiss='modal'>ใช้ที่อยู่นี้</button></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="jumps-prevent" style="padding-top: 25px;"></div>
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
        $('#accept').on('click', function (e) {
            if (this.checked == true) {
                $('#submit-button').prop('disabled', false);
            } else {
                $('#submit-button').prop('disabled', true);
            }
        });

        $.Thailand.setup({
            autocomplete_size: 10,
        });

        $.Thailand({
            // database: './jquery.Thailand.js/database/db.zip', // ฐานข้อมูลเป็นไฟล์ zip
            $district: $('#send_district'), // input ของตำบล
            $amphoe: $('#send_city'), // input ของอำเภอ
            $province: $('#send_province'), // input ของจังหวัด
            $zipcode: $('#send_postal_code'), // input ของรหัสไปรษณีย์
        });

        $.Thailand({
            // database: './jquery.Thailand.js/database/db.zip', // ฐานข้อมูลเป็นไฟล์ zip
            $district: $('#recv_district'), // input ของตำบล
            $amphoe: $('#recv_city'), // input ของอำเภอ
            $province: $('#recv_province'), // input ของจังหวัด
            $zipcode: $('#recv_postal_code'), // input ของรหัสไปรษณีย์
        });

        $('#main_address').on('click', function (e) {
            if (this.checked == true) {
                $('#save_send_address').prop('checked', true);
            }
        });

        $('#save_send_address').on('click', function (e) {
            if (this.checked == false) {
                $('#main_address').prop('checked', false);
            }
        });

        $('#accept').on('click', function (e) {
            if (this.checked == true) {
                $('#submit-button').prop('disabled', false);
            } else {
                $('#submit-button').prop('disabled', true);
            }
        });

        $("#send-table").DataTable({
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
                width: '25%',
            }, {
                width: '15%',
            }, {
                width: '45%',
            }, {
                width: '15%',
            }],
        });

        $("#recv-table").DataTable({
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
                width: '25%',
            }, {
                width: '15%',
            }, {
                width: '45%',
            }, {
                width: '15%',
            }],
        });

        $(document).ready(function () {
            if ($('#main_address').prop('checked')) {
                $('#main_address').prop('indeterminate', true);
                $('#save_send_address').prop('indeterminate', true);
            }

            if ($('#save_send_address').prop('checked')) {
                $('#save_send_address').prop('indeterminate', true);
            }
        });

        $('.send-button').on('click', function () {
            var id = $(this).attr('id');
            $.ajax({
                url: '/api/book/address-book/get',
                method: 'GET',
                data: {
                    id: id
                },
                success: function (res) {
                    $('#send_name').val(res.book_name);
                    $('#send_tel').val(res.book_tel);
                    $('#send_detail').val(res.book_detail);
                    $('#send_district').val(res.book_district);
                    $('#main_address').prop('indeterminate', res.is_main_book);
                    $('#save_send_address').prop('indeterminate', true);
                }
            })
        });

        $('.recv-button').on('click', function () {
            var id = $(this).attr('id');
            $.ajax({
                url: '/api/book/get/id',
                method: 'GET',
                data: {
                    id: id
                },
                success: function (res) {
                    $('#recv_name').val(res.book_name);
                    $('#recv_tel').val(res.book_tel);
                    $('#recv_detail').val(res.book_detail);
                    $('#recv_district').val(res.book_district);
                    $('#recv_city').val(res.book_city);
                    $('#recv_province').val(res.book_province);
                    $('#recv_postal_code').val(res.book_postal_code);
                    $('#save_recv_address').prop('indeterminate', true);
                }
            })
        });

    </script>

</body>

</html>
