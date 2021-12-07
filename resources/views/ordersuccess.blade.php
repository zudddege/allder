<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Allder Express</title>
    <link rel="icon" href="assets/img/brand/icon.png" type="image/x-icon">
    <link href="assets/css/icons.css" rel="stylesheet">
    <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/plugins/datatable/datatables.min.css" rel="stylesheet">
    <link href="assets/plugins/datatable/responsive.dataTables.min.css" rel="stylesheet">
    <link href="assets/plugins/datatable/responsive.bootstrap5.css" rel="stylesheet">
    <link href="assets/plugins/datatable/css/buttons.bootstrap5.min.css" rel="stylesheet">
    <link href="assets/plugins/datatable/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <link href="assets/plugins/datatable/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="assets/plugins/select2/css/select2.min.css" rel="stylesheet">
    <link href="assets/plugins/sidebar/sidebar.css" rel="stylesheet">
    <link href="assets/plugins/perfect-scrollbar/p-scrollbar.css" rel="stylesheet">
    <link href="assets/css/sidemenu.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/boxed.css" rel="stylesheet">
    <link href="assets/css/dark-boxed.css" rel="stylesheet">
    <link href="assets/css/style-dark.css" rel="stylesheet">
    <link href="assets/css/skin-modes.css" rel="stylesheet">
    <link href="assets/css/animate.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <link rel="stylesheet" type="text/css" href="assets/bootstrap-multiselect/dist/css/bootstrap-multiselect.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/custom.css">

    <style>
        .table th:last-child,
        .table td:last-child {
            position: sticky;
            right: 0px;
        }

        .table td:last-child {
            background-color: lightgray;
        }

    </style>

</head>

<body class="main-body app sidebar-mini">


    <div class="page">
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
                        <a class="side-menu__item" data-bs-toggle="slide" href="{{url('/callcuria')}}"><span
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
        <div class="main-content app-content">
            <div class="main-header sticky side-header nav nav-item" style="margin-bottom: -63px;">
                <div class="d-flex align-items-center">
                    <div class="main-header-left ">
                        <div class="app-sidebar__toggle" data-bs-toggle="sidebar">
                            <a class="open-toggle" href="#"><i class="header-icon fe fe-align-left"></i></a>
                            <a class="close-toggle" href="#"><i class="header-icons fe fe-x"></i></a>
                        </div>
                    </div>
                    <a href="{{url('/callcuria')}}" type="button" class="btn btn-primary mx-3">เรียกพนักงานเข้ามารับพัสดุ</a>
                    <button type="button" class="btn btn-primary">ระบุพนักงานเข้ารับพัสดุ</button>
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
                                <ul class="nav main-nav-line">
                                    <li class="nav-item">
                                        <a class="nav-link " href="{{url('/order')}}">รายการเตรียมจัดส่ง</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link active" href="#">รายการจัดส่งแล้ว</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="jumps-prevent" style="padding-top: 10px;"></div>
                            <div class="card-body">
                                <div class="d-flex">
                                    <a class="btn btn-link" href="{{url('/users/export')}}"><svg
                                            xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-download" viewBox="0 0 16 16">
                                            <path
                                                d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z" />
                                            <path
                                                d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z" />
                                        </svg> <u>ดาวน์โหลด (Excel)</u>
                                    </a>
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
                                            <button class="btn btn-link dropdown-toggle" type="button"
                                                id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-layout-three-columns"
                                                    viewBox="0 0 16 16">
                                                    <path
                                                        d="M0 1.5A1.5 1.5 0 0 1 1.5 0h13A1.5 1.5 0 0 1 16 1.5v13a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 14.5v-13zM1.5 1a.5.5 0 0 0-.5.5v13a.5.5 0 0 0 .5.5H5V1H1.5zM10 15V1H6v14h4zm1 0h3.5a.5.5 0 0 0 .5-.5v-13a.5.5 0 0 0-.5-.5H11v14z" />
                                                </svg> <u>ตัวเลือกการแสดงผล</u>
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <h5 class="dropdown-header">เลือกรายการเพื่อแสดงผล</h5>
                                                <input type="checkbox" id='box1' checked=""><span>เวลาที่ทำรายการ</span>
                                                </input><br>
                                                <input type="checkbox" id='box2' checked="">สถานะจัดส่ง</input><br>
                                                <input type="checkbox" id='box3' checked="">เลขออเดอร์</input><br>
                                                <input type="checkbox" id='box4' checked="">เลขพัสดุ</input><br>
                                                <input type="checkbox" id='box5' checked="">แหล่งที่มา</input><br>
                                                <input type="checkbox" id='box6' checked="">ผู้ส่ง</input><br>
                                                <input type="checkbox" id='box7'
                                                    checked="">เบอร์โทรศัพท์ผู้ส่ง</input><br>
                                                <input type="checkbox" id='box8' checked="">ผู้รับ</input><br>
                                                <input type="checkbox" id='box9'
                                                    checked="">เบอร์โทรศัพท์ผู้รับ</input><br>
                                                <input type="checkbox" id='box10' checked="">ประเภทสินค้า</input><br>
                                                <input type="checkbox" id='box11'
                                                    checked="">ยอดเก็บเงินปลายทาง</input><br>
                                                <input type="checkbox" id='box12' checked="">ราคาโดยประมาณ</input><br>
                                                <input type="checkbox" id='box13' checked="">หมายเหตุ</input><br>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="px-2 ">
                                <table class="table table-striped position-relative" id="my-table">
                                    <thead>
                                        <tr>
                                            <th class="">
                                                <input id='mainbox' type="checkbox">
                                            </th>
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
                                        <tr>
                                            <td><input class='subbox' type="checkbox"></td>
                                            <td class='subbox1'>
                                                {{$order->created_at->addYear(543)->format('d/m/Y - h:i a')}}</td>
                                            <td class='subbox2'>{{$order->status}}</td>
                                            <td class='subbox3'>{{$order->order_no}}</td>
                                            <td class='subbox4'>{{$order->order_no}}</td>
                                            <td class='subbox5'>{{$order->order_no}}</td>
                                            <td class='subbox6'>{{$order->send_address}}</td>
                                            <td class='subbox7'>{{$order->send_tel}}</td>
                                            <td class='subbox8'>{{$order->recv_address}}</td>
                                            <td class='subbox9'>{{$order->recv_tel}}</td>
                                            <td class='subbox10'>{{$order->category}} <br> {{$order->weight}} kg /
                                                {{$order->width_size}} x {{$order->length_size}} x
                                                {{$order->height_size}} cm</td>
                                            <td class='subbox11'>{{$order->cod}}</td>
                                            <td class='subbox12'>{{$order->cod}}</td>
                                            <td class='subbox13'>{{$order->note_detail}}</td>
                                            <td><a href="{{url('/edit')}}" class="btn btn-link"><u>ดูรายละเอียด</u></a></td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Back-to-top -->
        <a href="#top" id="back-to-top" style="display: none;"><i class="las la-angle-double-up"></i></a>
        <script src="assets/plugins/jquery/jquery.min.js"></script>
        <script src="assets/plugins/bootstrap/js/popper.min.js"></script>
        <script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/plugins/ionicons/ionicons.js"></script>
        <script src="assets/plugins/moment/moment.js"></script>
        <script src="assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
        <script src="assets/plugins/perfect-scrollbar/p-scroll.js"></script>
        <script src="assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
        <script src="assets/plugins/datatable/datatables.min.js"></script>
        <script src="assets/plugins/datatable/js/dataTables.bootstrap5.js"></script>
        <script src="assets/plugins/datatable/js/dataTables.buttons.min.js"></script>
        <script src="assets/plugins/datatable/js/buttons.bootstrap5.min.js"></script>
        <script src="assets/plugins/datatable/js/jszip.min.js"></script>
        <script src="assets/plugins/datatable/js/buttons.html5.min.js"></script>
        <script src="assets/plugins/datatable/js/buttons.print.min.js"></script>
        <script src="assets/plugins/datatable/js/buttons.colVis.min.js"></script>
        <script src="assets/plugins/datatable/pdfmake/pdfmake.min.js"></script>
        <script src="assets/plugins/datatable/pdfmake/vfs_fonts.js"></script>
        <script src="assets/js/table-data.js"></script>
        <script src="assets/plugins/rating/jquery.rating-stars.js"></script>
        <script src="assets/plugins/rating/jquery.barrating.js"></script>
        <script src="assets/plugins/side-menu/sidemenu.js"></script>
        <script src="assets/plugins/sidebar/sidebar.js"></script>
        <script src="assets/plugins/sidebar/sidebar-custom.js"></script>
        <script src="assets/js/sticky.js"></script>
        <script src="assets/js/eva-icons.min.js"></script>
        <script src="assets/js/custom.js"></script>

        <script>
            $('#my-table').DataTable({
                scrollX: true,
                "columns": [{
                        "width": "2%"
                    },
                    {
                        "width": "175px"
                    },
                    {
                        "width": "90px"
                    },
                    {
                        "width": "5%"
                    },
                    {
                        "width": "5%"
                    },
                    {
                        "width": "60px"
                    },
                    {
                        "width": "700px"
                    },
                    {
                        "width": "120px"
                    },
                    {
                        "width": "700px"
                    },
                    {
                        "width": "120px"
                    },
                    {
                        "width": "300px"
                    },
                    {
                        "width": "150px"
                    },
                    {
                        "width": "120px"
                    },
                    {
                        "width": "220px"
                    },
                    {
                        "width": "120px"
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
                console.log("fff");
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

        </script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js">
        </script>
        <link rel="stylesheet" type="text/css"
            href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

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

                $('4.daterange').on('apply.daterangepicker', function (ev, picker) {
                    console.log(picker.startDate.format('YYYY-MM-DD'));
                    console.log(picker.endDate.format('YYYY-MM-DD'));
                });
                cb(start, end);
            });

        </script>
</body>

</html>
