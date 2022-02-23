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
        .dropdown-menu {
            width: 350px !important;
            margin-right: 50% !important;
        }
        #dropdowntracking {
            width: 550px !important;
            margin-right: 150% !important;
        }

        .dropend button:focus,
        .dropdown button:focus {
            color: blue !important;
        }

        body {
            font-family: 'Kanit', 'Helvetica', 'Arial', sans-serif;
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
                            <h5 class="content-title mb-0 my-auto">ตรวจเช็คพัสดุ</h5>
                        </div>
                    </div>
                </div>
                <div class="row row-sm">
                    <div class="col-xl-12">
                        <div class="card">
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
                                            <input class="form-control" type="text" value="Allder Express">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="mb-1">ค้นหา<a class="text-muted px-2">เลขออเดอร์, เลขพัสดุ,
                                                เบอร์โทรศัพท์</a></div>
                                        <div class="d-flex ">
                                            <div class="">
                                                <input class="form-control" type="text" style="width:325px;" id="search-traking">
                                            </div>
                                            <div class="dropdown closedropdownoutside">
                                                <button class="btn btn-link dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-layout-three-columns" viewBox="0 0 16 16">
                                                        <path d="M0 1.5A1.5 1.5 0 0 1 1.5 0h13A1.5 1.5 0 0 1 16 1.5v13a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 14.5v-13zM1.5 1a.5.5 0 0 0-.5.5v13a.5.5 0 0 0 .5.5H5V1H1.5zM10 15V1H6v14h4zm1 0h3.5a.5.5 0 0 0 .5-.5v-13a.5.5 0 0 0-.5-.5H11v14z" />
                                                    </svg> <u>ตัวเลือกการแสดงผล</u>
                                                </button>
                                                <div class="dropdown-menu shadow" aria-labelledby="dropdownMenuButton" id="dropdowntracking">
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
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($orders as $order)
                                            <tr class="td_detail_row">
                                                <td><input class='subbox' type="checkbox"></td>
                                                <td class='subbox1'>{{$order->created_at->addYear(543)->format('d/m/Y - h:i a')}}</td>
                                                <td class='subbox2'>@if($order->status_text == "ปริ้นแล้ว")
                                                    <span class="border border-primary rounded-10" style="padding: 5px 10px; color: #0275d8;">{{$order->status_text}}</span>
                                                    @elseif($order->status_text == "รอปริ้น")
                                                    <span class="border border-warning rounded-10" style="padding: 5px 10px; color: #f0ad4e;">{{$order->status_text}}</span>
                                                    @elseif($order->status_code == "9")
                                                    <span class="border border-danger rounded-10" style="padding: 5px 10px; color: #d9534f;">{{$order->status_text}}</span>
                                                    @endif</td>
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
                                                <td class='subbox9'>{{$order->recv_tel}}</td>
                                                <td class='subbox10'>{{$order->category_text}} <br> {{$order->weight}} kg / {{$order->length}} x {{$order->width}} x {{$order->height}} cm</td>
                                                <td class='subbox11'>{{$order->user_cod}}</td>
                                                <td class='subbox12'>{{$order->user_price }}</td>
                                                <td class='subbox13'>{{$order->note_detail}}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="paginated"></div>
                            </div>
                        </div>
                    </div>
                </div>
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
            },
            ],
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
        $('.closedropdownoutside').on('hide.bs.dropdown', function (e) {
            if (e.clickEvent) {
                e.preventDefault();
            }
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
                $('.daterange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format(
                    'MMMM D, YYYY'));
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
        $('#search-traking').on("keyup", function () {
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
                    return $('#search-traking').val() != "" ? $(tr).find("td").get().map(function (td) {
                        return $(td).text();
                    }).filter(function (td) {
                        return td.indexOf($('#search-traking').val()) != -1;
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
    </script>
</body>

</html>
