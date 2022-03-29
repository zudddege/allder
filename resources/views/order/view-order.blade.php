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
    <link href="{{asset('assets/css/sidemenu.css')}}" rel="stylesheet">
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

        .dropdown-menu-right {
            width: 350px !important;
            margin-right: 50% !important;
        }

        .dropend button:focus,
        .dropdown button:focus {
            color: blue !important;
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
        .modal-lg {
            max-width: 50% !important;
            /* desired relative width */
            margin-left: auto !important;
            margin-right: auto !important;
        }

    </style>

    <style>
        div.pager {
            text-align: center;
            margin: 1em 0;
        }

        div.pager span {
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

        div.pager span.active {
            background: #0036e7;
        }

        div.pager-suc {
            text-align: center;
            margin: 1em 0;
        }

        div.pager-suc span {
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

        div.pager-suc span.active {
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
                                            <a href="{{url('/orders/create')}}"><label class="btn btn-primary mx-3"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
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
                                            <a class="btn btn-link" href="{{url('/api/excel/export')}}">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-download" viewBox="0 0 16 16">
                                                    <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z" />
                                                    <path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z" />
                                                </svg> <u>ดาวน์โหลด (Excel)</u>
                                            </a>
                                            <button class="btn btn-success mx-3" style="height: 40px;" data-toggle="modal" id="printlabel" data-target="#print-modal"   >
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-printer" viewBox="0 0 16 16">
                                                    <path d="M2.5 8a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z" />
                                                    <path d="M5 1a2 2 0 0 0-2 2v2H2a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h1v1a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-1h1a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-1V3a2 2 0 0 0-2-2H5zM4 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v2H4V3zm1 5a2 2 0 0 0-2 2v1H2a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1v-1a2 2 0 0 0-2-2H5zm7 2v3a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1z" />
                                                </svg> Print
                                            </button>
                                            <button class="btn btn-danger" id="cancelorder" style="height: 40px;" >
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-x" viewBox="0 0 16 16">
                                                    <path d="M6.854 7.146a.5.5 0 1 0-.708.708L7.293 9l-1.147 1.146a.5.5 0 0 0 .708.708L8 9.707l1.146 1.147a.5.5 0 0 0 .708-.708L8.707 9l1.147-1.146a.5.5 0 0 0-.708-.708L8 8.293 6.854 7.146z" />
                                                    <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5v2z" />
                                                </svg> Cancel Order
                                            </button>
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
                                                        <select class="custom-select form-control" style="width: 100%; height: 40px;">
                                                            <option value="" selected>รับพัสดุแล้ว</option>
                                                            <option value="">ระหว่างการขนส่ง</option>
                                                            <option value="">ระหว่างการจัดส่ง</option>
                                                            <option value="">พัสดุคงคลัง</option>
                                                            <option value="">เซ็นรับแล้ว</option>
                                                            <option value="">ระหว่างจัดการพัสดุมีปัญหา</option>
                                                            <option value="">พัสดุตีกลับแล้ว</option>
                                                            <option value="">ปิดงานมีปัญหา</option>
                                                            <option value="">เรียกคืนพัสดุ</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                @if (Auth::user()->is_admin == 1)
                                                <div class="col-2">
                                                    <div class="mb-1">แหล่งที่มา</div>
                                                    <div class="">
                                                        <input class="form-control" type="text" value="Allder Express">
                                                    </div>
                                                </div>
                                                @endif
                                                <div class="col-6">
                                                    <div class="mb-1">ค้นหา<a class="text-muted px-2">เลขออเดอร์, เลขพัสดุ, เบอร์โทรศัพท์</a></div>
                                                    <div class="d-flex">
                                                        <div class="">
                                                            <input class="form-control" type="text" value="" style="width:325px;" id="search">
                                                        </div>
                                                        <div class="dropdown closedropdownoutside">
                                                            <button class="btn btn-link dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-layout-three-columns" viewBox="0 0 16 16">
                                                                    <path d="M0 1.5A1.5 1.5 0 0 1 1.5 0h13A1.5 1.5 0 0 1 16 1.5v13a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 14.5v-13zM1.5 1a.5.5 0 0 0-.5.5v13a.5.5 0 0 0 .5.5H5V1H1.5zM10 15V1H6v14h4zm1 0h3.5a.5.5 0 0 0 .5-.5v-13a.5.5 0 0 0-.5-.5H11v14z" />
                                                                </svg> <u>ตัวเลือกการแสดงผล</u>
                                                            </button>
                                                            <div class="dropdown-menu shadow" aria-labelledby="dropdownMenuButton" style="width: 550px;">
                                                                <h5 class='dropdown-header'>เลือกรายการเพื่อแสดงผล</h5>
                                                                <div class="row">
                                                                    <div class="col">
                                                                        <div class="d-flexd align-content-center mx-1">
                                                                            <div><input class="dropsubbox" type="checkbox" id='box1' checked></input><label for='box1' style="height: 0px;">เวลาที่ทำรายการ</label></div>
                                                                            <div><input class="dropsubbox" type="checkbox" id='box2' checked></input><label for='box2' style="height: 0px;">สถานะจัดส่ง</label></div>
                                                                            <div><input class="dropsubbox" type="checkbox" id='box3' checked></input><label for='box3' style="height: 0px;">เลขออเดอร์</label></div>
                                                                            <div><input class="dropsubbox" type="checkbox" id='box4' checked></input><label for='box4' style="height: 0px;">เลขพัสดุ</label></div>
                                                                            <div><input class="dropsubbox" type="checkbox" id='box5' checked></input><label for='box5' style="height: 0px;">แหล่งที่มา</label></div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col">
                                                                        <div class="d-flexd align-content-center mx-1">
                                                                            <div><input class="dropsubbox" type="checkbox" id='box6' checked></input><label for='box6' style="height: 0px;">ผู้ส่ง</label></div>
                                                                            <div><input class="dropsubbox" type="checkbox" id='box7' checked></input><label for='box7' style="height: 0px;">เบอร์โทรศัพท์ผู้ส่ง</label></div>
                                                                            <div><input class="dropsubbox" type="checkbox" id='box8' checked></input><label for='box8' style="height: 0px;">ผู้รับ</label></div>
                                                                            <div><input class="dropsubbox" type="checkbox" id='box9' checked></input><label for='box9' style="height: 0px;">เบอร์โทรศัพท์ผู้รับ</label></div>
                                                                            <div><input class="dropsubbox" type="checkbox" id='box10' checked></input><label for='box10' style="height: 0px;">ประเภทสินค้า</label></div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col">
                                                                        <div class="d-flexd align-content-center mx-1">
                                                                            <div><input class="dropsubbox" type="checkbox" id='box11' checked></input><label for='box11' style="height: 0px;">ยอดเก็บเงินปลายทาง</label></div>
                                                                            <div><input class="dropsubbox" type="checkbox" id='box12' checked></input><label for='box12' style="height: 0px;">ราคาโดยประมาณ</label></div>
                                                                            <div><input class="dropsubbox" type="checkbox" id='box13' checked></input><label for='box13' style="height: 0px;">หมายเหตุ</label></div>
                                                                            <div><input class="dropall" type="checkbox" id='box0' checked></input><label for='box0' style="height: 0px;">ทั้งหมด</label></div>
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
                                            <table class="table table-striped position-relative paginated" id="my-table">
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
                                                    @if($order->status_text == "รอปริ้น" || $order->status_text == "ปริ้นแล้ว" || $order->status_text == "ยกเลิก")
                                                    <tr class="td_detail_row">
                                                        <td><input class='subbox' type="checkbox" value="{{$order->id}}"></td>
                                                        <td class='subbox1'>
                                                            {{$order->created_at->addYear(543)->format('d/m/Y - h:i a')}}</td>
                                                        <td class='subbox2'>
                                                            @if($order->status_text == "ปริ้นแล้ว")
                                                            <span class="border border-primary rounded-10" style="padding: 5px 10px; color: #ffffff; background-color: #005cfb;">{{$order->status_text}}</span>
                                                            @elseif($order->status_text == "รอปริ้น")
                                                            <span class="border border-warning rounded-10" style="padding: 5px 10px; color: #ffffff; background-color: #ff9100;">{{$order->status_text}}</span>
                                                            @elseif($order->status_code == "9")
                                                            <span class="border border-danger rounded-10" style="padding: 5px 10px; color: #ffffff; background-color: #ff0800;">{{$order->status_text}}</span>

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
                                                        <td class='subbox10'>{{$order->category_text}} <br> {{$order->weight}} kg / {{$order->length}} x {{$order->width}} x {{$order->height}} cm</td>
                                                        <td class='subbox11'>{{$order->user_cod}} </td>
                                                        <td class='subbox12'>{{$order->user_price }}</td>
                                                        <td class='subbox13'>{{$order->note_detail}}</td>
                                                        <td class="td_detail shadow"><a href="{{url('/orders/detail/'.$order->id.'')}}" class="btn btn-link"><u>ดูรายละเอียด</u></a></td>
                                                    </tr>
                                                    @endif
                                                    @endforeach
                                                </tbody>
                                            </table>
                                            <div class="paginated"></div>
                                        </div>
                                    </div>
                                    {{-- end order-nav --}}

                                    {{-- order-suc-nav --}}
                                    <div class="tab-pane fade" id="nav-ordersuc" role="tabpanel" aria-labelledby="nav-ordersuc-tab">
                                        <div class="d-flex justify-content-between">
                                            <a class="btn btn-link" href="{{url('/users/export')}}"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-download" viewBox="0 0 16 16">
                                                    <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z" />
                                                    <path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z" />
                                                </svg> <u>ดาวน์โหลด (Excel)</u>
                                            </a>

                                            <div>
                                                <div class="mb-1">ค้นหา<a class="text-muted px-2">เลขออเดอร์, เลขพัสดุ, เบอร์โทรศัพท์</a></div>
                                                <div>
                                                    <div>
                                                        <input class="form-control" type="text" value="" style="width:325px;" id="search-suc">
                                                    </div>
                                                </div>
                                            </div>

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
                                                    <select class="custom-select form-control" style="width: 100%; height: 40px;">
                                                        <option value="" selected>รับพัสดุแล้ว</option>
                                                        <option value="">ระหว่างการขนส่ง</option>
                                                        <option value="">ระหว่างการจัดส่ง</option>
                                                        <option value="">พัสดุคงคลัง</option>
                                                        <option value="">เซ็นรับแล้ว</option>
                                                        <option value="">ระหว่างจัดการพัสดุมีปัญหา</option>
                                                        <option value="">พัสดุตีกลับแล้ว</option>
                                                        <option value="">ปิดงานมีปัญหา</option>
                                                        <option value="">เรียกคืนพัสดุ</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-2">
                                                <div class="mb-1">แหล่งที่มา</div>
                                                <div class="">
                                                    <input class="form-control" type="text" value="Allder Express">
                                                </div>
                                            </div>
                                            <div class="col-2">
                                                <div class="mb-1">ประเภทพัสดุ</div>
                                                <div class="">
                                                    <select class="custom-select form-control" style="width: 100%; height: 40px;">
                                                        <option value="" selected>PickUp</option>
                                                        <option value="">Return</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-2">
                                                <div class="mb-1">ประเภทสินค้า</div>
                                                <div class="">
                                                    <select class="custom-select form-control" style="width: 100%; height: 40px;">
                                                        <option value="" selected>พัสดุทั่วไป</option>
                                                        <option value="">พัสดุCOD</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-2 pt-4">
                                                <div class="dropdown closedropdownoutside">
                                                    <button class="btn btn-link dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-layout-three-columns" viewBox="0 0 16 16">
                                                            <path d="M0 1.5A1.5 1.5 0 0 1 1.5 0h13A1.5 1.5 0 0 1 16 1.5v13a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 14.5v-13zM1.5 1a.5.5 0 0 0-.5.5v13a.5.5 0 0 0 .5.5H5V1H1.5zM10 15V1H6v14h4zm1 0h3.5a.5.5 0 0 0 .5-.5v-13a.5.5 0 0 0-.5-.5H11v14z" />
                                                        </svg> <u>ตัวเลือกการแสดงผล</u>
                                                    </button>
                                                    <div class="dropdown-menu shadow" aria-labelledby="dropdownMenuButton" style="width: 550px;">
                                                        <h5 class='dropdown-header'>เลือกรายการเพื่อแสดงผล</h5>
                                                        <div class="row">
                                                            <div class="col">
                                                                <div class="d-flexd align-content-center mx-1">
                                                                    <div><input class="dropsubbox2" type="checkbox" id='box14' checked></input><label for='box14' style="height: 0px;">เวลาที่ทำรายการ</label></div>
                                                                    <div><input class="dropsubbox2" type="checkbox" id='box15' checked></input><label for='box15' style="height: 0px;">สถานะจัดส่ง</label></div>
                                                                    <div><input class="dropsubbox2" type="checkbox" id='box16' checked></input><label for='box16' style="height: 0px;">เลขออเดอร์</label></div>
                                                                    <div><input class="dropsubbox2" type="checkbox" id='box17' checked></input><label for='box17' style="height: 0px;">เลขพัสดุ</label></div>
                                                                    <div><input class="dropsubbox2" type="checkbox" id='box18' checked></input><label for='box18' style="height: 0px;">แหล่งที่มา</label></div>
                                                                </div>
                                                            </div>
                                                            <div class="col">
                                                                <div class="d-flexd align-content-center mx-1">
                                                                    <div><input class="dropsubbox2" type="checkbox" id='box19' checked></input><label for='box19' style="height: 0px;">ผู้ส่ง</label></div>
                                                                    <div><input class="dropsubbox2" type="checkbox" id='box20' checked></input><label for='box20' style="height: 0px;">เบอร์โทรศัพท์ผู้ส่ง</label></div>
                                                                    <div><input class="dropsubbox2" type="checkbox" id='box21' checked></input><label for='box21' style="height: 0px;">ผู้รับ</label></div>
                                                                    <div><input class="dropsubbox2" type="checkbox" id='box22' checked></input><label for='box22' style="height: 0px;">เบอร์โทรศัพท์ผู้รับ</label></div>
                                                                    <div><input class="dropsubbox2" type="checkbox" id='box23' checked></input><label for='box23' style="height: 0px;">ประเภทสินค้า</label></div>
                                                                </div>
                                                            </div>
                                                            <div class="col">
                                                                <div class="d-flexd align-content-center mx-1">
                                                                    <div><input class="dropsubbox2" type="checkbox" id='box24' checked></input><label for='box24' style="height: 0px;">ยอดเก็บเงินปลายทาง</label></div>
                                                                    <div><input class="dropsubbox2" type="checkbox" id='box25' checked></input><label for='box25' style="height: 0px;">ราคาโดยประมาณ</label></div>
                                                                    <div><input class="dropsubbox2" type="checkbox" id='box26' checked></input><label for='box26' style="height: 0px;">หมายเหตุ</label></div>
                                                                    <div><input class="dropall2" type="checkbox" id='box00' checked></input><label for='box00' style="height: 0px;">ทั้งหมด</label></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="px-2 ">
                                            <table class="table table-striped position-relative paginated-suc" id="order-success-table">
                                                <thead>
                                                    <tr>
                                                        <th class=""><input id='mainbox' type="checkbox"></th>
                                                        <th class='subbox14'>เวลาที่ทำรายการ</th>
                                                        <th class='subbox15'>สถานะจัดส่ง</th>
                                                        <th class='subbox16'>เลขออเดอร์</th>
                                                        <th class='subbox17'>เลขพัสดุ</th>
                                                        <th class='subbox18'>แหล่งที่มา</th>
                                                        <th class='subbox19'>ผู้ส่ง</th>
                                                        <th class='subbox20'>เบอร์โทรศัพท์ผู้ส่ง</th>
                                                        <th class='subbox21'>ผู้รับ </th>
                                                        <th class='subbox22'>เบอร์โทรศัพท์ผู้รับ</th>
                                                        <th class='subbox23'>ประเภทสินค้า</th>
                                                        <th class='subbox24'>ยอดเก็บเงินปลายทาง</th>
                                                        <th class='subbox25'>ราคาโดยประมาณ</th>
                                                        <th class='subbox26'>หมายเหตุ</th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($orders as $order)
                                                    @if($order->status_text == "เสร็จสิ้น" || $order->status_text == "ระหว่างการขนส่ง" || $order->status_code == "5" )
                                                    <tr class="td_detail_row">
                                                        <td><input class='subbox' type="checkbox"></td>
                                                        <td class='subbox14'>
                                                            {{$order->created_at->addYear(543)->format('d/m/Y - h:i a')}}</td>
                                                        <td class='subbox15'>
                                                            @if($order->status_text == "รอจัดสรร")
                                                            <span class="border border-primary rounded-10" style="padding: 5px 10px; color: #ffffff; background-color: #0275d8;">{{$order->status_text}}</span>
                                                            @elseif($order->status_text == "ระหว่างการขนส่ง")
                                                            <span class="border  rounded-10" style="padding: 5px 10px; color: #ffffff; background-color: #ff6c58;">{{$order->status_text}}</span>
                                                            @elseif($order->status_text == "เซ็นรับแล้ว")
                                                            <span class="border border-success rounded-10" style="padding: 5px 10px; color: #ffffff; background-color: #5cb85c;">{{$order->status_text}}</span>
                                                            @endif
                                                        </td>
                                                        <td class='subbox16'>{{$order->order_no}}</td>
                                                        <td class='subbox17'>{{$order->tracking_no}}</td>
                                                        <td class='subbox18'>Allder Express</td>
                                                        <td class='subbox19'>{{$order->send_name}}<br>
                                                            <a class="text-muted">{{$order->send_detail}}</a>
                                                            <a class="text-muted">{{$order->send_district}}</a>
                                                            <a class="text-muted">{{$order->send_city}}</a>
                                                            <a class="text-muted">{{$order->send_province}}</a>
                                                            <a class="text-muted">{{$order->send_postal_code}}</a></td>
                                                        <td class='subbox20'>{{$order->send_tel}}</td>
                                                        <td class='subbox21'>{{$order->recv_name}}<br>
                                                            <a class="text-muted">{{$order->recv_detail}}</a>
                                                            <a class="text-muted">{{$order->recv_district}}</a>
                                                            <a class="text-muted">{{$order->recv_city}}</a>
                                                            <a class="text-muted">{{$order->recv_province}}</a>
                                                            <a class="text-muted">{{$order->recv_postal_code}}</a></td>
                                                        </td>
                                                        <td class='subbox22'>{{$order->recv_tel}}</td>
                                                        <td class='subbox23'>{{$order->category_text}} <br> {{$order->weight}} kg / {{$order->length}} x {{$order->width}} x {{$order->height}} cm</td>
                                                        <td class='subbox24'>{{$order->user_cod}} </td>
                                                        <td class='subbox25'>{{$order->user_price}} </td>
                                                        <td class='subbox26'>{{$order->note_detail}}</td>
                                                        <td class="td_detail shadow"><button data-toggle="modal" data-target="#detail-ordersuccess-modal"  class="btn btn-link success-id" value="{{$order->id}}">ดูรายละเอียด</button>
                                                        </td>
                                                    </tr>
                                                    @endif
                                                    @endforeach
                                                </tbody>
                                            </table>
                                            <div class="paginated-suc"></div>
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

        @include('layouts.main.modal-courier')

        {{-- modal print --}}

            <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="print-modal">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content" style="padding-left: 25px; padding-right: 25px;">
                        <div class="jumps-prevent" style="padding-top: 25px;"></div>
                        <div class="d-flex justify-content-between">
                            <h5><b>ปริ้นออเดอร์</b></h5>
                            <div class="d-flex">
                                <p class="mx-2 pt-2">เลือกขนาด</p>
                                <select class="form-control" id="sizeprint" style="width: 120px;">
                                    <option value="1" selected>ขนาดเล็ก</option>
                                    <option value="2">ขนาดใหญ่</option>
                                </select>
                            </div>
                        </div>

                        <div class="jumps-prevent" style="padding-top: 15px;"></div>
                        <p>เลือกจำนวนบุ๊คกิ้งแล้ว : </p>
                        <table class="table table-striped mt-2" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th>เลขออเดอร์</th>
                                    <th>เลขพัสดุ</th>
                                    <th>สถานะ</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($orders as $order)
                                @if($order->status_text == "รอปริ้น" || $order->status_text == "ปริ้นแล้ว" )
                                <tr>
                                    <th>{{$order->order_no}}</th>
                                    <th>{{$order->tracking_no}}</th>
                                    <th>{{$order->status_text}}</th>
                                    <th><button class="btn btn-primary printorder" type="button" value="{{$order->id}}" target="_blank" >ปริ้น</button></th>
                                </tr>
                                @endif
                                @endforeach
                            </tbody>
                        </table>
                        <div>
                        </div>
                    </div>
                </div>
            </div>

        {{-- end modal print --}}

        {{-- modal ดูรายละเอียด ของรายการจัดส่งแล้ว --}}
        <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="detail-ordersuccess-modal">
            <div class="modal-dialog modal-lg">
                <div class="modal-content" style="padding-left: 25px; padding-right: 25px;">
                    <div class="jumps-prevent" style="padding-top: 25px;"></div>
                    <h5><b>เรียกดู</b></h5>
                    <div class="d-flex justify-content-end">
                        <button type="button" class="btn btn-primary mx-1">ยื่นเคลม</button>
                        <button type="button" class="btn btn-danger mx-1">เร่งติดตามพัสดุ</button>
                    </div>
                    <div class="jumps-prevent" style="padding-top: 25px;"></div>
                    <nav>
                        <div class="nav main-nav-line" id="nav-tab" role="tablist">
                            <a class="nav-item nav-link active" id="nav-label-detail-tab" data-toggle="tab" href="#nav-label-detail" role="tab" aria-controls="nav-label-detail" aria-selected="true">รายละเอียดใบจ่าหน้า</a>
                            <a class="nav-item nav-link" id="nav-send-detail-tab" data-toggle="tab" href="#nav-send-detail" role="tab" aria-controls="nav-send-detail" aria-selected="false">รายละเอียดการส่ง</a>
                            <a class="nav-item nav-link" id="nav-signature-tab" data-toggle="tab" href="#nav-signature" role="tab" aria-controls="nav-signature" aria-selected="false">ลายเซ็นผู้รับพัสดุ</a>
                        </div>
                    </nav>
                    <div class="jumps-prevent" style="padding-top: 30px;"></div>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-label-detail" role="tabpanel" aria-labelledby="nav-label-detail-tab">
                            <div class="row">
                                <div class="col-4">
                                    <p>เลขออเดอร์</p>
                                    <p>เลขพัสดุ</p>
                                    <p>ประเภทพัสดุ</p>
                                    <p>เลขพัสดุเดิม</p>
                                    <p>เลขพัสดุหลังจากตีกลับ</p>
                                    <p>ที่อยู่เข้ารับพัสดุ</p>
                                    <p>ผู้ส่ง</p>
                                    <p>ผู้รับ</p>
                                    <p>ประเภทสินค้า</p>
                                    <p>น้ำหนัก (กก.)</p>
                                    <p>ขนาด</p>
                                    <p>น้ำหนักของค่าขนส่ง</p>
                                    <p>ประเภทสินค้า</p>
                                    <p>ค่าสินค้าที่เรียกเก็บ COD</p>
                                    <p>ค่าขนส่ง(คิดค่าขนส่งตามขนาด)</p>
                                    <p>ค่าธรรมเนียม COD</p>
                                    <p>ค่าลาเบล</p>
                                    <p>ประกันพัสดุตีกลับ</p>
                                    <p>ค่าบรรจุภัณฑ์</p>
                                    <p>ประกันคุ้มครองพัสดุ</p>
                                    <p>ค่า Speed</p>
                                    <p>ประกันบรรจุภัณฑ์ภายนอกเสียหาย</p>
                                    <p>คำนวณค่าคุ้มครองพัสดุ</p>
                                    <p>ส่วนลดโปรโมชั่น</p>
                                    <p>ราคาสุทธิ</p>
                                    <p>วิธีชำระเงิน</p>
                                    <p>หมายเหตุ</p>
                                    <p>ค่าประกัน</p>
                                </div>
                                <div class="col-8">
                                    @foreach($orders as $order)
                                    @if($order->id == 1)
                                    <p>{{$order->order_no}}</p>
                                    <p>{{$order->tracking_no}}</p>
                                    <p>--------</p>
                                    <p>{{$order->original_no}}</p>
                                    <p>{{$order->return_no}}</p>
                                    <p>---------</p>
                                    <p>---------</p>
                                    <p>---------</p>
                                    <p>{{$order->send_name}} {{$order->send_tel}} {{$order->send_detail}} {{$order->send_district}} {{$order->send_city}} {{$order->send_province}} {{$order->send_postal_code}}</p>
                                    <p>{{$order->recv_name}} {{$order->recv_tel}} {{$order->recv_detail}} {{$order->recv_district}} {{$order->recv_city}} {{$order->recv_province}} {{$order->recv_postal_code}}</p>
                                    <p>{{$order->category_text}}</p>
                                    <p>{{$order->weight}} kg</p>
                                    <p>{{$order->length}} x {{$order->width}} x {{$order->height}} cm</p>
                                    <p></p>
                                    <p></p>
                                    <p></p>
                                    <p></p>
                                    <p></p>
                                    <p></p>
                                    <p></p>
                                    <p></p>
                                    <p></p>
                                    <p></p>
                                    <p></p>
                                    <p></p>
                                    <p></p>
                                    <p></p>
                                    <p></p>
                                    @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="nav-send-detail" role="tabpanel" aria-labelledby="nav-send-detail-tab">...</div>
                        <div class="tab-pane fade" id="nav-signature" role="tabpanel" aria-labelledby="nav-signature-tab">
                            <p>เซ็นชื่อด้วยตัวบรรจง</p>
                            <img src="{{$order->signature_url}}" width="60%;" height="100%;" alt="" class="shadow" >
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- end modal ดูรายละเอียด ของรายการจัดส่งแล้ว --}}

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

    @include('layouts.main.courier')
    <script>
        $('#my-table').DataTable({
            scrollX: true,
            paging: false,
            ordering: false,
            info: false,
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
                "width": "400px"
            }, {
                "width": "120px"
            }, {
                "width": "400px"
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

    </script>

    <script>
        $('#order-success-table').DataTable({
            scrollX: true,
            autoWidth: true,
            paging: false,
            ordering: false,
            info: false,
            language: {
                emptyTable: "ไม่พบข้อมูล"
            },
            columns: [{
                "width": "2%"
            }, {
                "width": "150px"
            }, {
                "width": "125px",
            }, {
                "width": "100px"
            }, {
                "width": "100px"
            }, {
                "width": "60px"
            }, {
                "width": "400px"
            }, {
                "width": "120px"
            }, {
                "width": "400px"
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



    </script>
    <script>
        $(".dropall").click(function () {
            if ($(this).prop("checked")) {
                $('.dropsubbox').prop('checked', true)
                $(".subbox1").show();
                $(".subbox2").show();
                $(".subbox3").show();
                $(".subbox4").show();
                $(".subbox5").show();
                $(".subbox6").show();
                $(".subbox7").show();
                $(".subbox8").show();
                $(".subbox9").show();
                $(".subbox10").show();
                $(".subbox11").show();
                $(".subbox12").show();
                $(".subbox13").show();
            } else {
                $('.dropsubbox').prop('checked', false)
                $(".subbox1").hide();
                $(".subbox2").hide();
                $(".subbox3").hide();
                $(".subbox4").hide();
                $(".subbox5").hide();
                $(".subbox6").hide();
                $(".subbox7").hide();
                $(".subbox8").hide();
                $(".subbox9").hide();
                $(".subbox10").hide();
                $(".subbox11").hide();
                $(".subbox12").hide();
                $(".subbox13").hide();
            }
        });

        $(".dropall2").click(function () {
            if ($(this).prop("checked")) {
                $('.dropsubbox2').prop('checked', true)
                $(".subbox14").show();
                $(".subbox15").show();
                $(".subbox16").show();
                $(".subbox17").show();
                $(".subbox18").show();
                $(".subbox19").show();
                $(".subbox20").show();
                $(".subbox21").show();
                $(".subbox22").show();
                $(".subbox23").show();
                $(".subbox24").show();
                $(".subbox25").show();
                $(".subbox26").show();
            } else {
                $('.dropsubbox2').prop('checked', false)
                $(".subbox14").hide();
                $(".subbox15").hide();
                $(".subbox16").hide();
                $(".subbox17").hide();
                $(".subbox18").hide();
                $(".subbox19").hide();
                $(".subbox20").hide();
                $(".subbox21").hide();
                $(".subbox22").hide();
                $(".subbox23").hide();
                $(".subbox24").hide();
                $(".subbox25").hide();
                $(".subbox26").hide();
            }
        });

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
        $("#box14").click(function () {
            if ($(this).prop("checked")) {
                $(".subbox14").show();
            } else {
                $(".subbox14").hide();
            }
        });
        $("#box15").click(function () {
            if ($(this).prop("checked")) {
                $(".subbox15").show();
            } else {
                $(".subbox15").hide();
            }
        });
        $("#box16").click(function () {
            if ($(this).prop("checked")) {
                $(".subbox16").show();
            } else {
                $(".subbox16").hide();
            }
        });
        $("#box17").click(function () {
            if ($(this).prop("checked")) {
                $(".subbox17").show();
            } else {
                $(".subbox17").hide();
            }
        });
        $("#box18").click(function () {
            if ($(this).prop("checked")) {
                $(".subbox18").show();
            } else {
                $(".subbox18").hide();
            }
        });
        $("#box19").click(function () {
            if ($(this).prop("checked")) {
                $(".subbox19").show();
            } else {
                $(".subbox19").hide();
            }
        });
        $("#box20").click(function () {
            if ($(this).prop("checked")) {
                $(".subbox20").show();
            } else {
                $(".subbox20").hide();
            }
        });
        $("#box21").click(function () {
            if ($(this).prop("checked")) {
                $(".subbox21").show();
            } else {
                $(".subbox21").hide();
            }
        });
        $("#box22").click(function () {
            if ($(this).prop("checked")) {
                $(".subbox22").show();
            } else {
                $(".subbox22").hide();
            }
        });
        $("#box23").click(function () {
            if ($(this).prop("checked")) {
                $(".subbox23").show();
            } else {
                $(".subbox23").hide();
            }
        });
        $("#box24").click(function () {
            if ($(this).prop("checked")) {
                $(".subbox24").show();
            } else {
                $(".subbox24").hide();
            }
        });
        $("#box25").click(function () {
            if ($(this).prop("checked")) {
                $(".subbox25").show();
            } else {
                $(".subbox25").hide();
            }
        });
        $("#box26").click(function () {
            if ($(this).prop("checked")) {
                $(".subbox26").show();
            } else {
                $(".subbox26").hide();
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


        $('.printorder').on('click', function () {
            var sizeprint = $('#sizeprint').val();
            var id = $(this).attr('value');
            if (sizeprint == 1) {
                $.ajax({
                    success: function(){
                        window.open('/orders/print-S/' +id);
                    },
                });
            }
            if (sizeprint == 2) {
                $.ajax({
                    success: function(){
                        window.open('/orders/print-L/' +id);
                    },
                });
            }
        });

        $('.success-id').on('click', function (e) {
            var success_id = $('.success-id').val();
        });


        $('#printlabel').on('click', function (e) {
            var checkboxID = [];
            $('.subbox:checked').each(function(i){
                checkboxID[i] = $(this).attr('value');
            });
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

    <script>
        $('.closedropdownoutside').on('hide.bs.dropdown', function (e) {
            if (e.clickEvent) {
                e.preventDefault();
            }
        });

    </script>
    <script>
        $('#search').on("keyup", function () {
            $('table.paginated').trigger('repaginate');
        })

        $('table.paginated').each(function () {
            var currentPage = 0;
            var numPerPage = 7;
            var $table = $(this);
            var $pager = $('<div class="pager"></div>');
            var $previous = $('<span class="previous"><<</span>');
            var $next = $('<span class="next">>></span>');

            $pager.appendTo('div.paginated').find('span.page-number:first').addClass('active');

            $table.bind('repaginate', function () {
                $table.find('tbody tr').hide();

                $filteredRows = $table.find('tbody tr').filter(function (i, tr) {
                    return $('#search').val() != "" ? $(tr).find("td").get().map(function (td) {
                        return $(td).text();
                    }).filter(function (td) {
                        return td.indexOf($('#search').val()) != -1;
                    }).length > 0 : true;
                });

                $filteredRows.slice(currentPage * numPerPage, (currentPage + 1) * numPerPage).show();

                var numRows = $filteredRows.length;
                var numPages = Math.ceil(numRows / numPerPage);

                $pager.find('.page-number, .previous, .next').remove();
                for (var page = 0; page < numPages; page++) {
                    var $newPage = $('<span class="page-number"></span>').text(page + 1).bind('click', {
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

                $previous.insertBefore('span.page-number:first');
                $next.insertAfter('span.page-number:last');

                $next.click(function (e) {
                    $previous.addClass('clickable');
                    $pager.find('.active').next('.page-number.clickable').click();
                });
                $previous.click(function (e) {
                    $next.addClass('clickable');
                    $pager.find('.active').prev('.page-number.clickable').click();
                });

                $next.addClass('clickable');
                $previous.addClass('clickable');

                setTimeout(function () {
                    var $active = $pager.find('.page-number.active');
                    if ($active.next('.page-number.clickable').length === 0) {
                        $next.removeClass('clickable');
                    } else if ($active.prev('.page-number.clickable').length === 0) {
                        $previous.removeClass('clickable');
                    }
                });
            });
            $table.trigger('repaginate');
        });

        $('#search-suc').on("keyup", function () {
            $('table.paginated-suc').trigger('repaginate');
        })

        $('table.paginated-suc').each(function () {
            var currentPage = 0;
            var numPerPage = 7;
            var $table = $(this);
            var $pager = $('<div class="pager-suc"></div>');
            var $previous = $('<span class="previous-suc"><<</span>');
            var $next = $('<span class="next-suc">>></span>');

            $pager.appendTo('div.paginated-suc').find('span.page-number-suc:first').addClass('active');

            $table.bind('repaginate', function () {
                $table.find('tbody tr').hide();

                $filteredRows = $table.find('tbody tr').filter(function (i, tr) {
                    return $('#search-suc').val() != "" ? $(tr).find("td").get().map(function (td) {
                        return $(td).text();
                    }).filter(function (td) {
                        return td.indexOf($('#search-suc').val()) != -1;
                    }).length > 0 : true;
                });

                $filteredRows.slice(currentPage * numPerPage, (currentPage + 1) * numPerPage).show();

                var numRows = $filteredRows.length;
                var numPages = Math.ceil(numRows / numPerPage);

                $pager.find('.page-number-suc, .previous-suc, .next-suc').remove();
                for (var page = 0; page < numPages; page++) {
                    var $newPage = $('<span class="page-number-suc"></span>').text(page + 1).bind('click', {
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

                $previous.insertBefore('span.page-number-suc:first');
                $next.insertAfter('span.page-number-suc:last');

                $next.click(function (e) {
                    $previous.addClass('clickable');
                    $pager.find('.active').next('.page-number-suc.clickable').click();
                });
                $previous.click(function (e) {
                    $next.addClass('clickable');
                    $pager.find('.active').prev('.page-number-suc.clickable').click();
                });

                $next.addClass('clickable');
                $previous.addClass('clickable');

                setTimeout(function () {
                    var $active = $pager.find('.page-number-suc.active');
                    if ($active.next('.page-number-suc.clickable').length === 0) {
                        $next.removeClass('clickable');
                    } else if ($active.prev('.page-number-suc.clickable').length === 0) {
                        $previous.removeClass('clickable');
                    }
                });
            });
            $table.trigger('repaginate');
        });
        </script>

</body>

</html>
