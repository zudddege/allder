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

        button:disabled,
        button[disabled] {
            background-color: #cccccc !important;
            color: #666666 !important;
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

    <div class="page">
        @include('layouts.main.sidebar')
        <div class="main-content app-content">
            @include('layouts.main.topbar')
            <div class="container-fluid">
                <div class="breadcrumb-header justify-content-between">
                    <div class="my-auto">
                        <div class="d-flex">
                            <h5 class="content-title mb-0 my-auto">จัดการออเดอร์</h5>
                            <a class="px-2" href="{{url('/orders')}}"><u>รายการเตรียมจัดส่ง</u></a>
                        </div>
                    </div>
                </div>
                <form action="/api/orders/create" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-8">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <h6 class="px-2" style="padding-top: 10px;">เลขออเดอร์</h6>
                                        <div class="d-flex">
                                            <input class="form-control" type="text" value="" id="order_no" name="order_no">
                                            <b class='px-1' style='color:red;' id="star0" hidden>*</b>
                                        </div>
                                        <button type="button" class="btn btn-link" id="auto_order_no"><u>ใช้รหัสอัตโนมัติ</u></button>
                                    </div>
                                    <hr>
                                    <div class="row row-cols-12">
                                        <div class="col-6 bd-r bd-2">
                                            <div class="d-flex">
                                                <h5 class="px-2 mt-2"><b>ข้อมูลผู้ส่ง</b></h5>
                                                <button type="button" class="btn btn-link" data-toggle="modal" data-target="#send-modal"><u>เลือกจากสมุดที่อยู่</u></button>
                                            </div>
                                            <div class="px-4">
                                                <p class="mt-2 mb-1">ชื่อผู้ส่ง</p>
                                                <div class="d-flex">
                                                    <input class="form-control" type="text" value="{{ $mainBook->book_name ?? '' }}" name="send_name" id="send_name">
                                                    <b class='px-1' style='color:red;' id="star1" hidden>*</b>
                                                </div>
                                            </div>
                                            <div class="px-4">
                                                <p class="mt-2 mb-1">เบอร์โทรศัพท์</p>
                                                <div class="d-flex">
                                                    <input class="form-control" type="text" value="{{ $mainBook->book_tel ?? ''}}" name="send_tel" id="send_tel">
                                                    <b class='px-1' style='color:red;' id="star2" hidden>*</b>
                                                </div>
                                            </div>
                                            <div class="px-4">
                                                <p class="mt-2 mb-1">ที่อยู่</p>
                                                <div class="d-flex">
                                                    <textarea style="resize: none; width: 100%;" rows="4" class="form-control" name="send_detail" id="send_detail">{{ $mainBook->book_detail ?? ''}}</textarea>
                                                    <b class='px-1' style='color:red;' id="star3" hidden>*</b>
                                                </div>
                                            </div>
                                            <div class="px-4">
                                                <p class="mt-2 mb-1">ตำบล / แขวง</p>
                                                <div class="d-flex">
                                                    <input class="form-control" type="text" value="{{ $mainBook->book_district ?? ''}}" name="send_district" id="send_district">
                                                    <b class='px-1' style='color:red;' id="star4" hidden>*</b>
                                                </div>
                                            </div>
                                            <div class="px-4">
                                                <p class="mt-2 mb-1">อำเภอ / เขต</p>
                                                <div class="d-flex">
                                                    <input class="form-control" type="text" value="{{ $mainBook->book_city ?? ''}}" name="send_city" id="send_city">
                                                    <b class='px-1' style='color:red;' id="star5" hidden>*</b>
                                                </div>
                                            </div>
                                            <div class="px-4">
                                                <p class="mt-2 mb-1">จังหวัด</p>
                                                <div class="d-flex">
                                                    <input class="form-control" type="text" value="{{ $mainBook->book_province ?? ''}}" name="send_province" id="send_province">
                                                    <b class='px-1' style='color:red;' id="star6" hidden>*</b>
                                                </div>
                                            </div>
                                            <div class="px-4">
                                                <p class="mt-2 mb-1">รหัสไปรษณีย์</p>
                                                <div class="d-flex">
                                                    <input class="form-control" type="text" value="{{ $mainBook->book_postal_code ?? ''}}" name="send_postal_code" id="send_postal_code">
                                                    <b class='px-1' style='color:red;' id="star7" hidden>*</b>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="d-flex justify-content-center mt-3">
                                                        <input type="checkbox" class="mt-1" name="main_address" value="" id="main_address" @if($mainBook) checked @endif>
                                                        <p class="px-1">ตั้งเป็นที่อยู่หลัก</p>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="d-flex justify-content-center mt-3">
                                                        <input type="checkbox" class="mt-1" name="save_send_address" value="" id="save_send_address" @if($mainBook) checked @endif>
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
                                                <div class="d-flex">
                                                    <input class="form-control" type="text" value="" name="recv_name" id="recv_name">
                                                    <b class='px-1' style='color:red;' id="star8" hidden>*</b>
                                                </div>
                                            </div>
                                            <div class="px-4">
                                                <p class="mt-2 mb-1">เบอร์โทรศัพท์</p>
                                                <div class="d-flex">
                                                    <input class="form-control" type="text" value="" name="recv_tel" id="recv_tel">
                                                    <b class='px-1' style='color:red;' id="star9" hidden>*</b>
                                                </div>
                                            </div>
                                            <div class="px-4">
                                                <p class="mt-2 mb-1">ที่อยู่</p>
                                                <div class="d-flex">
                                                    <textarea style="resize: none; width: 100%;" rows="4" class="form-control" name="recv_detail" id="recv_detail"></textarea>
                                                    <b class='px-1' style='color:red;' id="star10" hidden>*</b>
                                                </div>
                                            </div>
                                            <div class="px-4">
                                                <p class="mt-2 mb-1">ตำบล / แขวง</p>
                                                <div class="d-flex">
                                                    <input class="form-control" type="text" value="" name="recv_district" id="recv_district">
                                                    <b class='px-1' style='color:red;' id="star11" hidden>*</b>
                                                </div>
                                            </div>
                                            <div class="px-4">
                                                <p class="mt-2 mb-1">อำเภอ / เขต</p>
                                                <div class="d-flex">
                                                    <input class="form-control" type="text" value="" name="recv_city" id="recv_city">
                                                    <b class='px-1' style='color:red;' id="star12" hidden>*</b>
                                                </div>
                                            </div>
                                            <div class="px-4">
                                                <p class="mt-2 mb-1">จังหวัด</p>
                                                <div class="d-flex">
                                                    <input class="form-control" type="text" value="" name="recv_province" id="recv_province">
                                                    <b class='px-1' style='color:red;' id="star13" hidden>*</b>
                                                </div>
                                            </div>
                                            <div class="px-4">
                                                <p class="mt-2 mb-1">รหัสไปรษณีย์</p>
                                                <div class="d-flex">
                                                    <input class="form-control" type="text" value="" name="recv_postal_code" id="recv_postal_code">
                                                    <b class='px-1' style='color:red;' id="star14" hidden>*</b>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="d-flex px-4 mt-3">
                                                        <input type="checkbox" class="mt-1" name="save_recv_address" value="0" id="save_recv_address">
                                                        <p class="px-1">บันทึกข้อมูลที่อยู่</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <p style="color: #ff0000">ค่าขนส่งพื้นที่ห่างไกลเพิ่ม 50บ.</p>
                                        </div>
                                    </div>
                                    <div class="jumps-prevent" style="padding-top: 20px;"></div>
                                    <h5 class="px-2 mt-2"><b>รายละเอียดสินค้า</b></h5>
                                    <div class="row px-2 mt-3">
                                        <div class="col-3">
                                            <p class="mb-1">ประเภทสินค้า</p>
                                            <div class="d-flex">
                                                <select class="custom-select my-1 mr-sm-2 form-control" id="selectdrop" style="width: 100%; height: 35px;" name="category">
                                                    <option selected value="เลือกประเภท">เลือกประเภท</option>
                                                    <option value="0">เอกสาร</option>
                                                    <option value="1">อาหารแห้ง</option>
                                                    <option value="2">ของใช้ทั่วไป</option>
                                                    <option value="3">อุปกรณ์ไอที</option>
                                                    <option value="4">เสื้อผ้า</option>
                                                    <option value="5">สื่อบันเทิง</option>
                                                    <option value="6">อะไหล่ยนต์</option>
                                                    <option value="7">รองเท้า/กระเป๋า</option>
                                                    <option value="8">อุปกรณ์กีฬา</option>
                                                    <option value="9">เครื่องสำอางค์</option>
                                                    <option value="10">เฟอร์นิเจอร์</option>
                                                    <option value="11">ผลไม้</option>
                                                    <option value="99">อื่นๆ</option>
                                                </select>
                                                <b class='px-1' style='color:red;' id="star15" hidden>*</b>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <p class="mb-1">น้ำหนัก</p>
                                            <div class="d-flex">
                                                <input class="form-control" type="text" value="" name="weight" id="weight" >
                                                <b class='px-1' style='color:red;' id="star16" hidden>*</b>
                                                <p class="mt-2 px-1">kg.</p>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <p class="mb-1">ขนาด<a class="text-muted px-2">กว้าง x ยาว  x สูง</a></p>
                                            <div class="d-flex">
                                                <input class="form-control" type="text" value="" name="width" id="width" placeholder="กว้าง">
                                                <b class='px-1' style='color:red;' id="star17" hidden>*</b>
                                                <a class="mt-2 px-2">x</a>
                                                <input class="form-control" type="text" value="" name="length" id="length" placeholder="ยาว">
                                                <b class='px-1' style='color:red;' id="star18" hidden>*</b>
                                                <a class="mt-2 px-2">x</a>
                                                <input class="form-control" type="text" value="" name="height" id="height" placeholder="สูง">
                                                <b class='px-1' style='color:red;' id="star19" hidden>*</b>
                                                <a class="mt-2 px-2">cm.</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row px-2 mt-3">
                                        <div class="col-4">
                                            <p class="mb-1">COD<a class="text-muted px-2">ยอดเก็บเงินปลายทาง</a></p>
                                            <div class="d-flex">
                                                <input class="form-control" type="text" value="0" name="order_cod" id="order_cod" >
                                                <b class='px-1' style='color:red;' id="star20" hidden>*</b>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <p class="mb-1">หมายเหตุ</p>
                                            <input class="form-control" type="text" value="" name="note_detail">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex">
                                        <input type="checkbox" class="mt-1" id="accept" checked>
                                        <p class="px-1">ฉันได้อ่านและยอมรับข้อกำหนดใน<br>
                                            <a href="#" class="" style="color: blue;"><u>ข้อกำหนดเงื่อนไขการบริการ</u></a>
                                        </p>
                                    </div>
                                    <div class="d-flex">
                                        <input type="checkbox" class="mt-1" name="is_return_insurance" value="1" id="insurance-return">
                                        <p class="px-1">ประกันพัสดุดีดกลับ<br>
                                            <a class="text-muted">หากพัสดุถูกดีดกลับ
                                                จะไม่คิดค่าขนส่งดีดกลับ<br>ฉันได้อ่านและยอมรับข้อกำหนดใน <br>
                                                <a href="#" class="" style="color: blue;"><u>เงื่อนไขความคุ้มครองพัสดุดีดกลับ</u></a>
                                                <a class="text-muted">แล้ว</a></a>
                                        </p>
                                    </div>
                                    <div class="d-flex">
                                        <input type="checkbox" class="mt-1" name="is_protect_insurance" value="1" id="insurance-protection">
                                        <p class="px-1">ประกันคุ้มครองพัสดุ</p>
                                    </div>
                                    <div class="d-flex">
                                        <input type="checkbox" class="mt-1" name="is_express_transport" value="1">
                                        <p class="px-1">SPEED<br>
                                            <a class="text-muted">คาดการณ์จัดส่งภายในวันที่<br>เพื่อรับรองประสิทธิภาพการจัดส่งพัสดุ
                                                กรุณาบุ๊คกิ๊งก่อนเวลา <br> ฉันได้อ่านและยอมรับข้อกำหนดใน <br>
                                                <a href="#" class="" style="color: blue;"><u>เงื่อนไขและข้อกำหนดของ
                                                        SPEED</u></a>
                                                <a class="text-muted">แล้ว</a></a>
                                        </p>
                                    </div>
                                    <div class="d-flex">
                                        <input type="checkbox" class="mt-1" name="is_damage_insurance" value="1" id="insurance-damaged">
                                        <p class="px-1">ประกันบรรจุภัณฑ์ภายนอกเสียหาย<br>
                                            <a class="text-muted">เมื่อบรรจุภัณฑ์ภายนอกเสียหายจะได้รับค่าชดเชย
                                                <br>และเคลมเต็ม จำนวนเงินรับประกันที่บริษัทกำหนด<br>
                                                ฉันได้อ่านและยอมรับข้อกำหนดใน <br>
                                                <a href="#" class="" style="color: blue;"><u>เงื่อนไขบริการบรรจุภัณฑ์ภายนอกเสียหาย</u></a>
                                                <a class="text-muted">แล้ว</a></a>
                                        </p>
                                    </div>
                                    <div class="jumps-prevent" style="padding-top: 100px;"></div>
                                    <div class="d-flex justify-content-center">
                                        <a href="{{url('/orders')}}"><button type="button" class="btn btn-danger mx-2">ยกเลิก</button></a>
                                        <button class="btn btn-primary mx-2" type="submit" id="submit-button" >สร้างรายการ</button>
                                    </div>
                                </div>
                            </div>
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
                                <td><button type='button' class='btn btn-primary recv-button' id='{{$addressBook->id}}' data-dismiss='modal'>ใช้ที่อยู่นี้</button></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="jumps-prevent" style="padding-top: 25px;"></div>
                </div>
            </div>
        </div>
    </div>

    {{-- modal ประกันพัสดุตีกลับ --}}
    <div class="modal fade" id="Modal-return" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content px-4 py-4">
                <h5>กรุณากรอกข้อมูลบริษัทผู้รับผลประโยชน์</h5>
                <div class="modal-body">
                    <p style="font-size: 12px; color: red;">หมายเหตุ: ข้อมูลผู้รับผลประโยชน์จะต้องสอดคล้องกับข้อมูลบัญชี Flash ข้อมูลนี้จะเป็นข้อมูลผู้รับผลประโยชน์ประกันหลังจากส่งข้อมูลแล้วไม่สามารถแก้ไขได้</p>
                    <div class="my-1">
                        <span>ชื่อบริษัท</span>
                        <input class="form-control" type="text">
                    </div>
                    <div class="my-2">
                        <span>เลขประจำตัวผู้เสียภาษี</span>
                        <input class="form-control" type="text">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal" id="close-return">ยกเลิก</button>
                    <button type="button" class="btn btn-primary">ยืนยัน</button>
                </div>
            </div>
        </div>
    </div>
    {{-- end modal ประกันพัสดุตีกลับ --}}

    {{-- modal ประกันพัสดุตีกลับ --}}
    <div class="modal fade" id="Modal-protection" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content px-4 py-4">
                <h5>กรุณากรอกข้อมูลบริษัทผู้รับผลประโยชน์</h5>
                <div class="modal-body">
                    <p style="font-size: 12px; color: red;">หมายเหตุ: ข้อมูลผู้รับผลประโยชน์จะต้องสอดคล้องกับข้อมูลบัญชี Flash ข้อมูลนี้จะเป็นข้อมูลผู้รับผลประโยชน์ประกันหลังจากส่งข้อมูลแล้วไม่สามารถแก้ไขได้</p>
                    <div class="my-1">
                        <span>ชื่อบริษัท</span>
                        <input class="form-control" type="text">
                    </div>
                    <div class="my-2">
                        <span>เลขประจำตัวผู้เสียภาษี</span>
                        <input class="form-control" type="text">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal" id="close-protection">ยกเลิก</button>
                    <button type="button" class="btn btn-primary">ยืนยัน</button>
                </div>
            </div>
        </div>
    </div>
    {{-- end modal ประกันพัสดุตีกลับ --}}

    {{-- modal ประกันพัสดุตีกลับ --}}
    <div class="modal fade" id="Modal-damaged" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content px-4 py-4">
                <h5>กรุณากรอกข้อมูลบริษัทผู้รับผลประโยชน์</h5>
                <div class="modal-body">
                    <p style="font-size: 12px; color: red;">หมายเหตุ: ข้อมูลผู้รับผลประโยชน์จะต้องสอดคล้องกับข้อมูลบัญชี Flash ข้อมูลนี้จะเป็นข้อมูลผู้รับผลประโยชน์ประกันหลังจากส่งข้อมูลแล้วไม่สามารถแก้ไขได้</p>
                    <div class="my-1">
                        <span>ชื่อบริษัท</span>
                        <input class="form-control" type="text">
                    </div>
                    <div class="my-2">
                        <span>เลขประจำตัวผู้เสียภาษี</span>
                        <input class="form-control" type="text">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal" id="close-damaged">ยกเลิก</button>
                    <button type="button" class="btn btn-primary">ยืนยัน</button>
                </div>
            </div>
        </div>
    </div>
    {{-- end modal ประกันพัสดุตีกลับ --}}

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
        // modal ประกัน
        $("#Modal-return").modal({
            show: false,
            backdrop: 'static'
        });

        $('input[id="insurance-return"]').on('change', function (e) {
            if (e.target.checked) {
                $('#Modal-return').modal();
            }
        });

        $('#close-return').click(function () {
            $('#insurance-return').prop('checked', false);
        });

        $("#Modal-protection").modal({
            show: false,
            backdrop: 'static'
        });

        $('input[id="insurance-protection"]').on('change', function (e) {
            if (e.target.checked) {
                $('#Modal-protection').modal();
            }
        });

        $('#close-protection').click(function () {
            $('#insurance-protection').prop('checked', false);
        });

        $("#Modal-damaged").modal({
            show: false,
            backdrop: 'static'
        });

        $('input[id="insurance-damaged"]').on('change', function (e) {
            if (e.target.checked) {
                $('#Modal-damaged').modal();
            }
        });

        $('#close-damaged').click(function () {
            $('#insurance-damaged').prop('checked', false);
        });
        // modal ประกัน

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


        $(document).ready(function () {
            if ($('#main_address').prop('checked')) {
                $('#main_address').prop('indeterminate', true);
                $('#save_send_address').prop('indeterminate', true);
            }
        });

        $('#main_address').on('click', function (e) {
            if (this.checked == true) {
                $('#save_send_address').prop('checked', true);
                $('#main_address').val('1');
                $('#save_send_address').val('1');
            } else if (this.checked == false) {
                $('#main_address').val('0');
            }
        });

        $('#save_send_address').on('click', function (e) {
            if (this.checked == false) {
                $('#main_address').prop('checked', false);
                $('#save_send_address').val('0');
                $('#main_address').val('0');
            } else if (this.checked == true) {
                $('#save_send_address').val('1');
            }
        });

        $('#save_recv_address').on('click', function (e) {
            if (this.checked == true) {
                $('#save_recv_address').val('1');
            } else if (this.checked == false) {
                $('#save_recv_address').val('0');
            }
        });

        $('#accept').on('click', function (e) {
            if (this.checked == true) {
                $('#submit-button').prop('disabled', false);
            } else {
                $('#submit-button').prop('disabled', true);
            }
        });

        $('#auto_order_no').on('click', function () {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '/api/orders/gen-order-no',
                method: 'post',
                success: function (data) {
                    $('#order_no').val(data);
                }
            })
        });

        $("#send-table").DataTable({
            autoWidth: false,
            searching: false,
            filter: false,
            ordering: false,
            paging: false,
            info: false,
            dom: 'rtip',
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
            dom: 'rtip',
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

<script>
    $("#submit-button").on('click',function(){
        var order_no= $("#order_no").val();
        var send_name= $("#send_name").val();
        var send_tel= $("#send_tel").val();
        var send_detail= $("#send_detail").val();
        var send_district= $("#send_district").val();
        var send_city= $("#send_city").val();
        var send_province= $("#send_province").val();
        var send_postal_code= $("#send_postal_code").val();
        var recv_name= $("#recv_name").val();
        var recv_tel= $("#recv_tel").val();
        var recv_detail= $("#recv_detail").val();
        var recv_district= $("#recv_district").val();
        var recv_city= $("#recv_city").val();
        var recv_province= $("#recv_province").val();
        var recv_postal_code= $("#recv_postal_code").val();
        var selectdrop= $("#selectdrop").val();
        var weight= $("#weight").val();
        var width= $("#width").val();
        var length= $("#length").val();
        var height= $("#height").val();
        var order_cod= $("#order_cod").val();
        var check = 0;

        if (order_no==""){
            $("#order_no").css('border-color', 'red');
            $("#star0").prop('hidden', false);
            var check = 1;
        }
        if (send_name==""){
            $("#send_name").css('border-color', 'red');
            $("#star1").prop('hidden', false);
            var check = 1;
        }
        if (send_tel==""){
            $("#send_tel").css('border-color', 'red');
            $("#star2").prop('hidden', false);
            var check = 1;
        }
        if (send_detail==""){
            $("#send_detail").css('border-color', 'red');
            $("#star3").prop('hidden', false);
            var check = 1;
        }
        if (send_district==""){
            $("#send_district").css('border-color', 'red');
            $("#star4").prop('hidden', false);
            var check = 1;
        }
        if (send_city==""){
            $("#send_city").css('border-color', 'red');
            $("#star5").prop('hidden', false);
            var check = 1;
        }
        if (send_province==""){
            $("#send_province").css('border-color', 'red');
            $("#star6").prop('hidden', false);
            var check = 1;
        }
        if (send_postal_code==""){
            $("#send_postal_code").css('border-color', 'red');
            $("#star7").prop('hidden', false);
            var check = 1;
        }
        if (recv_name==""){
            $("#recv_name").css('border-color', 'red');
            $("#star8").prop('hidden', false);
            var check = 1;
        }
        if (recv_tel==""){
            $("#recv_tel").css('border-color', 'red');
            $("#star9").prop('hidden', false);
            var check = 1;
        }
        if (recv_detail==""){
            $("#recv_detail").css('border-color', 'red');
            $("#star10").prop('hidden', false);
            var check = 1;
        }
        if (recv_district==""){
            $("#recv_district").css('border-color', 'red');
            $("#star11").prop('hidden', false);
            var check = 1;
        }
        if (recv_city==""){
            $("#recv_city").css('border-color', 'red');
            $("#star12").prop('hidden', false);
            var check = 1;
        }
        if (recv_province==""){
            $("#recv_province").css('border-color', 'red');
            $("#star13").prop('hidden', false);
            var check = 1;
        }
        if (recv_postal_code==""){
            $("#recv_postal_code").css('border-color', 'red');
            $("#star14").prop('hidden', false);
            var check = 1;
        }
        if (selectdrop=="เลือกประเภท"){
            $("#selectdrop").css('border-color', 'red');
            $("#star15").prop('hidden', false);
            var check = 1;
        }
        if (weight==""){
            $("#weight").css('border-color', 'red');
            $("#star16").prop('hidden', false);
            var check = 1;
        }
        if (width==""){
            $("#width").css('border-color', 'red');
            $("#star17").prop('hidden', false);
            var check = 1;
        }
        if (length==""){
            $("#length").css('border-color', 'red');
            $("#star18").prop('hidden', false);
            var check = 1;
        }
        if (height==""){
            $("#height").css('border-color', 'red');
            $("#star19").prop('hidden', false);
            var check = 1;
        }
        if (order_cod==""){
            $("#order_cod").css('border-color', 'red');
            $("#star20").prop('hidden', false);
            var check = 1;
        }

        if (check=="1"){
            return false;
        }
    });
</script>

<script>

    $('#checkbox-courier').on('click', function (e) {
        if (this.checked == true) {
            $('#submit-button-courier').prop('disabled', false);
        } else {
            $('#submit-button-courier').prop('disabled', true);
        }
    });

    $("#submit-button-courier").on("click", function(){
        var notify_warehouse_no= $("#notify_warehouse_no").val();
        var notify_contact_name= $("#notify_contact_name").val();
        var notify_warehouse_detail= $("#notify_warehouse_detail").val();
        var notify_warehouse_province= $("#notify_warehouse_province").val();
        var notify_warehouse_name= $("#notify_warehouse_name").val();
        var notify_warehouse_tel= $("#notify_warehouse_tel").val();
        var notify_warehouse_district= $("#notify_warehouse_district").val();
        var notify_warehouse_city= $("#notify_warehouse_city").val();
        var notify_warehouse_postal_code= $("#notify_warehouse_postal_code").val();
        var estimate_parcel_quantity= $("#estimate_parcel_quantity").val();
        var check_courier= 0;

        if (notify_warehouse_no==""){
            $("#notify_warehouse_no").css('border-color', 'red');
            $("#star01").prop('hidden', false);
            var check_courier = 1;
        }
        if (notify_contact_name==""){
            $("#notify_contact_name").css('border-color', 'red');
            $("#star02").prop('hidden', false);
            var check_courier = 1;
        }
        if (notify_warehouse_detail==""){
            $("#notify_warehouse_detail").css('border-color', 'red');
            $("#star03").prop('hidden', false);
            var check_courier = 1;
        }
        if (notify_warehouse_province==""){
            $("#notify_warehouse_province").css('border-color', 'red');
            $("#star04").prop('hidden', false);
            var check_courier = 1;
        }
        if (notify_warehouse_name==""){
            $("#notify_warehouse_name").css('border-color', 'red');
            $("#star05").prop('hidden', false);
            var check_courier = 1;
        }
        if (notify_warehouse_tel==""){
            $("#notify_warehouse_tel").css('border-color', 'red');
            $("#star06").prop('hidden', false);
            var check_courier = 1;
        }
        if (notify_warehouse_district==""){
            $("#notify_warehouse_district").css('border-color', 'red');
            $("#star07").prop('hidden', false);
            var check_courier = 1;
        }
        if (notify_warehouse_city==""){
            $("#notify_warehouse_city").css('border-color', 'red');
            $("#star08").prop('hidden', false);
            var check_courier = 1;
        }
        if (notify_warehouse_postal_code==""){
            $("#notify_warehouse_postal_code").css('border-color', 'red');
            $("#star09").prop('hidden', false);
            var check_courier = 1;
        }
        if (estimate_parcel_quantity==""){
            $("#estimate_parcel_quantity").css('border-color', 'red');
            $("#star010").prop('hidden', false);
            var check_courier = 1;
        }


        if (check_courier=="1"){
            return false;
        }
    });

    $("#submit-button-courier2").on("click", function(){
        var staff_id= $("#staff_id").val();
        var assign_warehouse_detail= $("#assign_warehouse_detail").val();
        var assign_warehouse_province= $("#assign_warehouse_province").val();
        var assign_warehouse_district= $("#assign_warehouse_district").val();
        var assign_warehouse_city= $("#assign_warehouse_city").val();
        var assign_warehouse_postal_code= $("#assign_warehouse_postal_code").val();
        var assign_estimate_parcel_quantity= $("#assign_estimate_parcel_quantity").val();
        var check_courier2= 0;

        if (staff_id==""){
            $("#staff_id").css('border-color', 'red');
            $("#star011").prop('hidden', false);
            var check_courier2 = 1;
        }
        if (assign_warehouse_detail==""){
            $("#assign_warehouse_detail").css('border-color', 'red');
            $("#star012").prop('hidden', false);
            var check_courier2 = 1;
        }
        if (assign_warehouse_province==""){
            $("#assign_warehouse_province").css('border-color', 'red');
            $("#star013").prop('hidden', false);
            var check_courier2 = 1;
        }
        if (assign_warehouse_district==""){
            $("#assign_warehouse_district").css('border-color', 'red');
            $("#star014").prop('hidden', false);
            var check_courier2 = 1;
        }
        if (assign_warehouse_city==""){
            $("#assign_warehouse_city").css('border-color', 'red');
            $("#star015").prop('hidden', false);
            var check_courier2 = 1;
        }
        if (assign_warehouse_postal_code==""){
            $("#assign_warehouse_postal_code").css('border-color', 'red');
            $("#star016").prop('hidden', false);
            var check_courier2 = 1;
        }
        if (assign_estimate_parcel_quantity==""){
            $("#assign_estimate_parcel_quantity").css('border-color', 'red');
            $("#star017").prop('hidden', false);
            var check_courier2 = 1;
        }

        if (check_courier2=="1"){
            return false;
        }
    });

</script>


</body>

</html>
