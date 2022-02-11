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
    {{-- <link href="https://earthchie.github.io/jquery.Thailand.js/jquery.Thailand.js/dist/jquery.Thailand.min.css" rel="stylesheet"> --}}
    <link href="https://fonts.googleapis.com/css2?family=Kanit&display=swap" rel="stylesheet">

    <link href='{{asset("assets/packages/core/main.css")}}' rel='stylesheet' />
    <link href='{{asset("assets/packages/daygrid/main.css")}}' rel='stylesheet' />

    <script src='{{asset("assets/packages/core/main.js")}}'></script>
    <script src='{{asset("assets/packages/daygrid/main.js")}}'></script>
    <!--   ส่วนที่เพิ่มเข้ามาใหม่-->
    <link href='{{asset("assets/packages/timegrid/main.css")}}' rel='stylesheet' />
    <link href='{{asset("assets/packages/list/main.css")}}' rel='stylesheet' />

    <!--   ส่วนที่เพิ่มเข้ามาใหม่-->
    <script src='{{asset("assets/packages/core/locales/th.js")}}'></script>
    <script src='{{asset("assets/packages/timegrid/main.js")}}'></script>
    <script src='{{asset("assets/packages/interaction/main.js")}}'></script>
    <script src='{{asset("assets/packages/list/main.js")}}'></script>

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

        body {
            font-family: 'Kanit', 'Helvetica', 'Arial', sans-serif;
        }

    </style>

    <style type="text/css">
        #calendar {
            width: 90%;
            margin: auto;
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
                            <h5 class="content-title mb-0 my-auto">เก็บเงินพัสดุปลายทาง</h5>
                        </div>
                    </div>
                </div>
                <div class="row row-sm">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-header" style="background-color: white;">
                                <nav>
                                    <div class="nav main-nav-line" id="nav-tab" role="tablist">
                                        <a class="nav-item nav-link active" id="nav-cod-table-tab" data-toggle="tab" href="#nav-cod-table" role="tab" aria-controls="nav-cod-table" aria-selected="true">เวลาการรับเงินค่า COD</a>
                                        <a class="nav-item nav-link" id="nav-cod-detail-tab" data-toggle="tab" href="#nav-cod-detail" role="tab" aria-controls="nav-cod-detail" aria-selected="false">รายละเอียด COD งานส่งสำเร็จ</a>
                                        <a class="nav-item nav-link" id="nav-cod-get-tab" data-toggle="tab" href="#nav-cod-get" role="tab" aria-controls="nav-cod-get" aria-selected="false">ยอดเงินควรรับ</a>
                                    </div>
                                </nav>
                                <div class="tab-content" id="nav-tabContent">
                                    {{-- ปฏิทิน COD --}}
                                    <div class="tab-pane fade show active" id="nav-cod-table" role="tabpanel" aria-labelledby="nav-cod-table-tab">
                                        <div class="jumps-prevent" style="padding-top: 25px;"></div>
                                        <form action="#" method="" id="">
                                            <div class="d-flex px-5">
                                                <label class="mt-2">เลือกเดือนที่แสดง</label>
                                                <input type="month" class="form-control mx-2" style="width: 200px;" id="month">
                                            </div>
                                        </form>
                                        <div class="jumps-prevent" style="padding-top: 25px;"></div>
                                        {{-- ปฏิทิน --}}
                                        <div id='calendar'></div>
                                    </div>
                                    {{-- end ปฏิทิน COD --}}
                                    {{-- รายละเอียด COD ส่งสำเร็จ --}}
                                    <div class="tab-pane fade" id="nav-cod-detail" role="tabpanel" aria-labelledby="nav-cod-detail-tab">
                                        <div class="jumps-prevent" style="padding-top: 25px;"></div>
                                        <a class="btn btn-link" href="#">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-download" viewBox="0 0 16 16">
                                                <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z" />
                                                <path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z" />
                                            </svg> <u>ดาวน์โหลด (Excel)</u>
                                        </a>
                                        <div class="row px-2 my-3">
                                            <div class="col-4">
                                                <div class="mb-1 ">วันที่ส่งพัสดุ</div>
                                                <div>
                                                    <input class="form-control" type="text" value="">
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="mb-1">เลขพัสดุ</div>
                                                <div class="">
                                                    <input class="form-control" type="text" value="">
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="mb-1">ID บุ๊คงาน</div>
                                                <div class="">
                                                    <input class="form-control" type="text" value="">
                                                </div>
                                            </div>
                                        </div>
                                        <table class="table table-striped position-relative my-3" id="my-table">
                                            <thead>
                                                <tr>
                                                    <th>ชื่อลูกค้า</th>
                                                    <th>ID บุ๊คงาน</th>
                                                    <th>วันที่ส่งพัสดุ</th>
                                                    <th>เลขพัสดุ</th>
                                                    <th>ค่าสินค้าที่เรียกเก็บ COD</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    {{-- end รายละเอียด COD ส่งสำเร็จ --}}
                                    {{-- ยอดเงินควรรับ --}}
                                    <div class="tab-pane fade" id="nav-cod-get" role="tabpanel" aria-labelledby="nav-cod-get-tab">
                                        <div class="jumps-prevent" style="padding-top: 25px;"></div>
                                        <a class="btn btn-link" href="#">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-download" viewBox="0 0 16 16">
                                                <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z" />
                                                <path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z" />
                                            </svg> <u>ดาวน์โหลด (Excel)</u>
                                        </a>
                                        <div class="row px-2 my-3">
                                            <div class="col-4">
                                                <div class="mb-1 ">วันที่ส่งพัสดุ</div>
                                                <div>
                                                    <input class="form-control" type="text" value="">
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="mb-1">วันที่ชำระ</div>
                                                <div class="">
                                                    <input class="form-control" type="text" value="">
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="mb-1">สถานะชำระเงิน</div>
                                                <div class="">
                                                    <input class="form-control" type="text" value="">
                                                </div>
                                            </div>
                                        </div>
                                        <table class="table table-striped position-relative my-3" id="my-table">
                                            <thead>
                                                <tr>
                                                    <th>ชื่อลูกค้า</th>
                                                    <th>วันที่ส่งพัสดุ</th>
                                                    <th>จำนวนพัสดุ</th>
                                                    <th>ค่าสินค้าที่เรียกเก็บ COD</th>
                                                    <th>สถานะชำระเงิน</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    {{-- end ยอดเงินควรรับ --}}
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
    {{-- <script src="https://earthchie.github.io/jquery.Thailand.js/jquery.Thailand.js/dependencies/JQL.min.js"></script>
    <script src="https://earthchie.github.io/jquery.Thailand.js/jquery.Thailand.js/dependencies/typeahead.bundle.js"></script>
    <script src="https://earthchie.github.io/jquery.Thailand.js/jquery.Thailand.js/dist/jquery.Thailand.min.js"></script> --}}

    @include('layouts.main.courier')

    <script  src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
              integrity="sha256-4+XzXVhsDmqanXGHaHvgh1gMQKX40OUvDEBTu8JcmNs="
              crossorigin="anonymous"></script>
    <script type="text/javascript">
        $(function () {
            // กำหนด element ที่จะแสดงปฏิทิน
            var calendarEl = $("#calendar")[0];

            // กำหนดการตั้งค่า
            var calendar = new FullCalendar.Calendar(calendarEl, {
                plugins: ['interaction', 'dayGrid', 'timeGrid', 'list'], // plugin ที่เราจะใช้งาน
                defaultView: 'dayGridMonth', // ค้าเริ่มร้นเมื่อโหลดแสดงปฏิทิน
                header: {
                    left: 'prev',
                    center: 'title',
                    right: 'today next '
                },
                events: { // เรียกใช้งาน event จาก json ไฟล์ ที่สร้างด้วย php
                    url: '/event',
                    error: function() {

                    }
                },
                eventLimit: true, // allow "more" link when too many events
                locale: 'th',    // กำหนดให้แสดงภาษาไทย
                firstDay: 0, // กำหนดวันแรกในปฏิทินเป็นวันอาทิตย์ 0 เป็นวันจันทร์ 1
                showNonCurrentDates: true, // แสดงที่ของเดือนอื่นหรือไม่
            });
            // แสดงปฏิทิน
            calendar.render();
        });

    </script>

</body>

</html>
