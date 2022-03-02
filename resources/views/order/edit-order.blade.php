<!DOCTYPE html>
<html lang="en">

<head>
    @include('layouts.main.header')
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

    <style>
        div.pager-address1 {
            text-align: center;
            margin: 1em 0;
        }

        div.pager-address1 span {
            display: inline-block;
            width: 1.8em;
            height: 1.8em;
            line-height: 1.8;
            text-align: center;
            cursor: pointer;
            background: #2196F3;
            color: #ffff;
            margin-right: 0.5em;
        }

        div.pager-address1 span.active {
            background: #0036e7;
        }

        div.pager-address2 {
            text-align: center;
            margin: 1em 0;
        }

        div.pager-address2 span {
            display: inline-block;
            width: 1.8em;
            height: 1.8em;
            line-height: 1.8;
            text-align: center;
            cursor: pointer;
            background: #2196F3;
            color: #ffff;
            margin-right: 0.5em;
        }

        div.pager-address2 span.active {
            background: #0036e7;
        }

    </style>

</head>

<body class="main-body app sidebar-mini">

    <div class="loader">
        <img src="{{asset("assets/img/loader.gif")}}" alt="Loading..." />
    </div>

    <!-- Page -->
    <div class="page">
        @include('layouts.main.sidebar')
        <div class="main-content app-content">
            @include('layouts.main.topbar')
            <div class="container-fluid">

                <!-- breadcrumb -->
                <div class="breadcrumb-header justify-content-between">
                    <div class="my-auto">
                        <div class="d-flex">
                            <h5 class="content-title mb-0 my-auto">จัดการออเดอร์</h5>
                        </div>
                    </div>
                </div>
                <form action="{{ url('/api/orders/edit/'.$order->id) }}" method="POST">
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
                                                <input class="form-control" type="text" name="send_district" value="{{ $order->send_district }}" id="send_district">
                                            </div>
                                            <div class="px-4">
                                                <p class="mt-2 mb-1">อำเภอ / เขต</p>
                                                <input class="form-control" type="text" name="send_city" value="{{ $order->send_city }}" id="send_city">
                                            </div>
                                            <div class="px-4">
                                                <p class="mt-2 mb-1">จังหวัด</p>
                                                <input class="form-control" type="text" name="send_province" value="{{ $order->send_province }}" id="send_province">
                                            </div>
                                            <div class="px-4">
                                                <p class="mt-2 mb-1">รหัสไปรษณีย์</p>
                                                <input class="form-control" type="text" name="send_postal_code" value="{{ $order->send_postal_code }}" id="send_postal_code">
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
                                            <p class="mb-1">ขนาด<a class="text-muted px-2">กว้าง x ยาว x สูง</a></p>
                                            <div class="d-flex">
                                                <input class="form-control" type="text" value="{{ $order->length}}" name="length">
                                                <a class="mt-2 px-2">x</a>
                                                <input class="form-control" type="text" value="{{ $order->width}}" name="width">
                                                <a class="mt-2 px-2">x</a>
                                                <input class="form-control" type="text" value="{{ $order->height }}" name="height">
                                                <a class="mt-2 px-2">cm.</a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row px-2 mt-3">
                                        <div class="col-4">
                                            <p class="mb-1">COD<a class="text-muted px-2">ยอดเก็บเงินปลายทาง</a></p>
                                            <input class="form-control" type="text" value="{{$order->order_cod}}" name="order_cod">
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
                                        <a href="{{url('/orders')}}"><button type="button" class="btn btn-danger mx-2">ยกเลิก</button></a>
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
                <form action="{{url('/api/orders/cancel/'.$order->id.'')}}" method="POST">
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
                        <input class="form-control form-control-sm" type="text" id="search-address1" style="width : 25%;">
                    </div>
                    <div class="jumps-prevent" style="padding-top: 15px;"></div>
                    <table class="table table-striped position-relative paginated-address1" id="send-table" style="width: 100%;">
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
                        <input class="form-control form-control-sm" type="text" id="search-address2" style="width : 25%;">
                    </div>
                    <div class="jumps-prevent" style="padding-top: 15px;"></div>
                    <table class="table table-striped position-relative paginated-address2" id="recv-table" style="width: 100%;">
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

    @include('layouts.main.modal-courier')

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

        $.Thailand({
            // database: './jquery.Thailand.js/database/db.zip', // ฐานข้อมูลเป็นไฟล์ zip
            $district: $('#notify_warehouse_district'), // input ของตำบล
            $amphoe: $('#notify_warehouse_city'), // input ของอำเภอ
            $province: $('#notify_warehouse_province'), // input ของจังหวัด
            $zipcode: $('#notify_warehouse_postal_code'), // input ของรหัสไปรษณีย์
        });

        $.Thailand({
            // database: './jquery.Thailand.js/database/db.zip', // ฐานข้อมูลเป็นไฟล์ zip
            $district: $('#assign_warehouse_district'), // input ของตำบล
            $amphoe: $('#assign_warehouse_city'), // input ของอำเภอ
            $province: $('#assign_warehouse_province'), // input ของจังหวัด
            $zipcode: $('#assign_warehouse_postal_code'), // input ของรหัสไปรษณีย์
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

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('.notify-wh-button').on('click', function () {
            var id = $(this).attr('id');
            $.ajax({
                url: '/api/books/warehouse/' + id,
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
                url: '/api/books/warehouse/' + id,
                success: function (res) {
                    $('#assign_warehouse_detail').val(res.warehouse_detail);
                    $('#assign_warehouse_district').val(res.warehouse_district);
                    $('#assign_warehouse_city').val(res.warehouse_city);
                    $('#assign_warehouse_province').val(res.warehouse_province);
                    $('#assign_warehouse_postal_code').val(res.warehouse_postal_code);
                    $('#assign-courier-modal').modal('show');
                }
            });
        });

        $('.hotkey-note-notify').on('click', function () {
            var value = $(this).attr('value');
            $('#notify_note_detail').val($('#notify_note_detail').val() + value);
        });

        $('.hotkey-note-assign').on('click', function () {
            var value = $(this).attr('value');
            $('#assign_note_detail').val($('#assign_note_detail').val() + value);
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
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '/api/books/address/' +id,
                method: 'get',

                success: function (res) {
                    $('#send_name').val(res.book_name);
                    $('#send_tel').val(res.book_tel);
                    $('#send_detail').val(res.book_detail);
                    $('#send_district').val(res.book_district);
                    $('#send_city').val(res.book_city);
                    $('#send_province').val(res.book_province);
                    $('#send_postal_code').val(res.book_postal_code);
                    $('#main_address').prop('indeterminate', res.is_main_book);
                    $('#main_address').val(null);
                    $('#save_send_address').prop('indeterminate', true);
                    $('#save_send_address').val(null);
                }
            });
        });

        $('.recv-button').on('click', function () {
            var id = $(this).attr('id');
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '/api/books/address/' +id,
                method: 'get',

                success: function (res) {
                    $('#recv_name').val(res.book_name);
                    $('#recv_tel').val(res.book_tel);
                    $('#recv_detail').val(res.book_detail);
                    $('#recv_district').val(res.book_district);
                    $('#recv_city').val(res.book_city);
                    $('#recv_province').val(res.book_province);
                    $('#recv_postal_code').val(res.book_postal_code);
                    $('#save_recv_address').prop('indeterminate', true);
                    $('#save_recv_address').val(null);
                }
            });
        });

    </script>

<script>
    $('#search-ware').on("keyup", function () {
        $('table.paginated-ware').trigger('repaginate');
    })

    $('table.paginated-ware').each(function () {
        var currentPage = 0;
        var numPerPage = 7;
        var $table = $(this);
        var $pager = $('<div class="pager-ware"></div>');
        var $previous = $('<span class="previous-ware"><<</span>');
        var $next = $('<span class="next-ware">>></span>');

        $pager.insertAfter($table).find('span.page-number-ware:first').addClass('active');

        $table.bind('repaginate', function () {
            $table.find('tbody tr').hide();

            $filteredRows = $table.find('tbody tr').filter(function (i, tr) {
                return $('#search-ware').val() != "" ? $(tr).find("td").get().map(function (td) {
                    return $(td).text();
                }).filter(function (td) {
                    return td.indexOf($('#search-ware').val()) != -1;
                }).length > 0 : true;
            });

            $filteredRows.slice(currentPage * numPerPage, (currentPage + 1) * numPerPage).show();

            var numRows = $filteredRows.length;
            var numPages = Math.ceil(numRows / numPerPage);

            $pager.find('.page-number-ware, .previous-ware, .next-ware').remove();
            for (var page = 0; page < numPages; page++) {
                var $newPage = $('<span class="page-number-ware"></span>').text(page + 1).bind('click', {
                    newPage: page
                }, function (event) {
                    currentPage = event.data['newPage'];
                    $table.trigger('repaginate');
                })
                if (page == currentPage) {
                    $newPage.addClass('clickable active');
                } else {
                    $newPage.addClass('clickable');
                }
                $newPage.appendTo($pager)
            }

            $previous.insertBefore('span.page-number-ware:first');
            $next.insertAfter('span.page-number-ware:last');

            $next.click(function (e) {
                $previous.addClass('clickable');
                $pager.find('.active').next('.page-number-ware.clickable').click();
            });
            $previous.click(function (e) {
                $next.addClass('clickable');
                $pager.find('.active').prev('.page-number-ware.clickable').click();
            });

            $next.addClass('clickable');
            $previous.addClass('clickable');

            setTimeout(function () {
                var $active = $pager.find('.page-number-ware.active');
                if ($active.next('.page-number-ware.clickable').length === 0) {
                    $next.removeClass('clickable');
                } else if ($active.prev('.page-number-ware.clickable').length === 0) {
                    $previous.removeClass('clickable');
                }
            });
        });
        $table.trigger('repaginate');
    });

    $('#search-ware2').on("keyup", function () {
        $('table.paginated-ware2').trigger('repaginate');
    })

    $('table.paginated-ware2').each(function () {
        var currentPage = 0;
        var numPerPage = 7;
        var $table = $(this);
        var $pager = $('<div class="pager-ware2"></div>');
        var $previous = $('<span class="previous-ware2"><<</span>');
        var $next = $('<span class="next-ware2">>></span>');

        $pager.insertAfter($table).find('span.page-number-ware2:first').addClass('active');

        $table.bind('repaginate', function () {
            $table.find('tbody tr').hide();

            $filteredRows = $table.find('tbody tr').filter(function (i, tr) {
                return $('#search-ware2').val() != "" ? $(tr).find("td").get().map(function (td) {
                    return $(td).text();
                }).filter(function (td) {
                    return td.indexOf($('#search-ware2').val()) != -1;
                }).length > 0 : true;
            });

            $filteredRows.slice(currentPage * numPerPage, (currentPage + 1) * numPerPage).show();

            var numRows = $filteredRows.length;
            var numPages = Math.ceil(numRows / numPerPage);

            $pager.find('.page-number-ware2, .previous-ware2, .next-ware2').remove();
            for (var page = 0; page < numPages; page++) {
                var $newPage = $('<span class="page-number-ware2"></span>').text(page + 1).bind('click', {
                    newPage: page
                }, function (event) {
                    currentPage = event.data['newPage'];
                    $table.trigger('repaginate');
                })
                if (page == currentPage) {
                    $newPage.addClass('clickable active');
                } else {
                    $newPage.addClass('clickable');
                }
                $newPage.appendTo($pager)
            }

            $previous.insertBefore('span.page-number-ware2:first');
            $next.insertAfter('span.page-number-ware2:last');

            $next.click(function (e) {
                $previous.addClass('clickable');
                $pager.find('.active').next('.page-number-ware2.clickable').click();
            });
            $previous.click(function (e) {
                $next.addClass('clickable');
                $pager.find('.active').prev('.page-number-ware2.clickable').click();
            });

            $next.addClass('clickable');
            $previous.addClass('clickable');

            setTimeout(function () {
                var $active = $pager.find('.page-number-ware2.active');
                if ($active.next('.page-number-ware2.clickable').length === 0) {
                    $next.removeClass('clickable');
                } else if ($active.prev('.page-number-ware2.clickable').length === 0) {
                    $previous.removeClass('clickable');
                }
            });
        });
        $table.trigger('repaginate');
    });

    $('#search-address1').on("keyup", function () {
        $('table.paginated-address1').trigger('repaginate');
    })

    $('table.paginated-address1').each(function () {
        var currentPage = 0;
        var numPerPage = 7;
        var $table = $(this);
        var $pager = $('<div class="pager-address1"></div>');
        var $previous = $('<span class="previous-address1"><<</span>');
        var $next = $('<span class="next-address1">>></span>');

        $pager.insertAfter($table).find('span.page-number-address1:first').addClass('active');

        $table.bind('repaginate', function () {
            $table.find('tbody tr').hide();

            $filteredRows = $table.find('tbody tr').filter(function (i, tr) {
                return $('#search-address1').val() != "" ? $(tr).find("td").get().map(function (td) {
                    return $(td).text();
                }).filter(function (td) {
                    return td.indexOf($('#search-address1').val()) != -1;
                }).length > 0 : true;
            });

            $filteredRows.slice(currentPage * numPerPage, (currentPage + 1) * numPerPage).show();

            var numRows = $filteredRows.length;
            var numPages = Math.ceil(numRows / numPerPage);

            $pager.find('.page-number-address1, .previous-address1, .next-address1').remove();
            for (var page = 0; page < numPages; page++) {
                var $newPage = $('<span class="page-number-address1"></span>').text(page + 1).bind('click', {
                    newPage: page
                }, function (event) {
                    currentPage = event.data['newPage'];
                    $table.trigger('repaginate');
                })
                if (page == currentPage) {
                    $newPage.addClass('clickable active');
                } else {
                    $newPage.addClass('clickable');
                }
                $newPage.appendTo($pager)
            }

            $previous.insertBefore('span.page-number-address1:first');
            $next.insertAfter('span.page-number-address1:last');

            $next.click(function (e) {
                $previous.addClass('clickable');
                $pager.find('.active').next('.page-number-address1.clickable').click();
            });
            $previous.click(function (e) {
                $next.addClass('clickable');
                $pager.find('.active').prev('.page-number-address1.clickable').click();
            });

            $next.addClass('clickable');
            $previous.addClass('clickable');

            setTimeout(function () {
                var $active = $pager.find('.page-number-address1.active');
                if ($active.next('.page-number-address1.clickable').length === 0) {
                    $next.removeClass('clickable');
                } else if ($active.prev('.page-number-address1.clickable').length === 0) {
                    $previous.removeClass('clickable');
                }
            });
        });
        $table.trigger('repaginate');
    });

    $('#search-address2').on("keyup", function () {
        $('table.paginated-address2').trigger('repaginate');
    })

    $('table.paginated-address2').each(function () {
        var currentPage = 0;
        var numPerPage = 7;
        var $table = $(this);
        var $pager = $('<div class="pager-address2"></div>');
        var $previous = $('<span class="previous-address2"><<</span>');
        var $next = $('<span class="next-address2">>></span>');

        $pager.insertAfter($table).find('span.page-number-address2:first').addClass('active');

        $table.bind('repaginate', function () {
            $table.find('tbody tr').hide();

            $filteredRows = $table.find('tbody tr').filter(function (i, tr) {
                return $('#search-address2').val() != "" ? $(tr).find("td").get().map(function (td) {
                    return $(td).text();
                }).filter(function (td) {
                    return td.indexOf($('#search-address2').val()) != -1;
                }).length > 0 : true;
            });

            $filteredRows.slice(currentPage * numPerPage, (currentPage + 1) * numPerPage).show();

            var numRows = $filteredRows.length;
            var numPages = Math.ceil(numRows / numPerPage);

            $pager.find('.page-number-address2, .previous-address2, .next-address2').remove();
            for (var page = 0; page < numPages; page++) {
                var $newPage = $('<span class="page-number-address2"></span>').text(page + 1).bind('click', {
                    newPage: page
                }, function (event) {
                    currentPage = event.data['newPage'];
                    $table.trigger('repaginate');
                })
                if (page == currentPage) {
                    $newPage.addClass('clickable active');
                } else {
                    $newPage.addClass('clickable');
                }
                $newPage.appendTo($pager)
            }

            $previous.insertBefore('span.page-number-address2:first');
            $next.insertAfter('span.page-number-address2:last');

            $next.click(function (e) {
                $previous.addClass('clickable');
                $pager.find('.active').next('.page-number-address2.clickable').click();
            });
            $previous.click(function (e) {
                $next.addClass('clickable');
                $pager.find('.active').prev('.page-number-address2.clickable').click();
            });

            $next.addClass('clickable');
            $previous.addClass('clickable');

            setTimeout(function () {
                var $active = $pager.find('.page-number-address2.active');
                if ($active.next('.page-number-address2.clickable').length === 0) {
                    $next.removeClass('clickable');
                } else if ($active.prev('.page-number-address2.clickable').length === 0) {
                    $previous.removeClass('clickable');
                }
            });
        });
        $table.trigger('repaginate');
    });
</script>

</body>

</html>
