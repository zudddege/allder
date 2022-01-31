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
        @include('layouts.main.sidebar')
        <div class="main-content app-content">
            @include('layouts.main.navbar')
            {{-- page --}}
            <div class="container-fluid">
                <div class="breadcrumb-header justify-content-between">
                    <div class="my-auto">
                        <div class="d-flex">
                            <h5 class="content-title mb-0 my-auto">กระทบค่าขนส่ง</h5>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <nav>
                                    <div class="nav main-nav-line" id="nav-tab" role="tablist">
                                        <a class="nav-item nav-link active" id="nav-today-tab" data-toggle="tab" href="#nav-today" role="tab" aria-controls="nav-today" aria-selected="true">ข้อมูลวันนี้</a>
                                        <a class="nav-item nav-link" id="nav-lastday-tab" data-toggle="tab" href="#nav-lastday" role="tab" aria-controls="nav-lastday" aria-selected="false">ข้อมูลวันที่ผ่านมา</a>
                                        <a class="nav-item nav-link" id="nav-paid-tab" data-toggle="tab" href="#nav-paid" role="tab" aria-controls="nav-paid" aria-selected="false">บัญชีที่ควรชำระ</a>
                                    </div>
                                </nav>
                            </div>
                            <div class="card-body">
                                <div class="tab-content" id="nav-tabContent">
                                    {{-- nav ข้อมูลวันนี้ --}}
                                    <div class="tab-pane fade show active" id="nav-today" role="tabpanel" aria-labelledby="nav-today-tab">
                                        <div class="mx-2 my-2">
                                            <h6>ทั้งหมด</h6>
                                            <table class="table table-striped position-relative my-4" id="my-table">
                                                <thead>
                                                    <tr>
                                                        <th>จำนวนพัสดุ</th>
                                                        <th>ค่าขนส่งที่ควรได้รับ</th>
                                                        <th>ส่วนลดโปรโมชั่น</th>
                                                        <th>ค่าขนส่งจริง</th>
                                                        <th>ค่าลาเบลงานรับ (รวมภาษี)</th>
                                                        <th>ค่าบรรจุภัณฑ์</th>
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
                                            <nav>
                                                <div class="nav main-nav-line" id="nav-tab" role="tablist">
                                                    <a class="nav-item nav-link active" id="nav-receive-tab" data-toggle="tab" href="#nav-receive" role="tab" aria-controls="nav-receive" aria-selected="true">วันที่เข้ารับพัสดุ</a>
                                                    <a class="nav-item nav-link" id="nav-bounce-tab" data-toggle="tab" href="#nav-bounce" role="tab" aria-controls="nav-bounce" aria-selected="false">พัสดุที่ถูกตีกลับวันนี้</a>
                                                </div>
                                            </nav>
                                            <div class="tab-content" id="nav-tabContent">
                                                {{-- nav วันที่เข้ารับพัสดุ --}}
                                                <div class="tab-pane fade show active" id="nav-receive" role="tabpanel" aria-labelledby="nav-receive-tab">
                                                    <div class="jumps-prevent" style="padding-top: 15px;"></div>
                                                    <div>
                                                        <table class="table table-striped position-relative my-4" id="my-table">
                                                            <thead>
                                                                <tr>
                                                                    <th>จำนวนพัสดุ</th>
                                                                    <th>ค่าขนส่งที่ควรได้รับ</th>
                                                                    <th>ส่วนลดโปรโมชั่น</th>
                                                                    <th>ค่าขนส่งจริง</th>
                                                                    <th>ค่าลาเบลงานรับ (รวมภาษี)</th>
                                                                    <th>ค่าบรรจุภัณฑ์</th>
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
                                                </div>
                                                {{-- end nav วันที่เข้ารับพัสดุ --}}
                                                {{-- nav พัสดุที่ถูกตีกลับวันนี้ --}}
                                                <div class="tab-pane fade" id="nav-bounce" role="tabpanel" aria-labelledby="nav-bounce-tab">
                                                    <div class="jumps-prevent" style="padding-top: 15px;"></div>
                                                    <div>
                                                        <table class="table table-striped position-relative my-4" id="my-table">
                                                            <thead>
                                                                <tr>
                                                                    <th>จำนวนพัสดุ</th>
                                                                    <th>ค่าขนส่งที่ควรได้รับ</th>
                                                                    <th>ส่วนลดโปรโมชั่น</th>
                                                                    <th>ค่าขนส่งจริง</th>
                                                                    <th>ค่าลาเบลงานรับ (รวมภาษี)</th>
                                                                    <th>ค่าบรรจุภัณฑ์</th>
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
                                                </div>
                                                {{-- end nav พัสดุที่ถูกตีกลับวันนี้ --}}
                                            </div>
                                        </div>
                                    </div>
                                    {{-- end nav ข้อมูลวันนี้ --}}
                                    {{-- nav ข้อมูลวันที่ผ่านมา --}}
                                    <div class="tab-pane fade" id="nav-lastday" role="tabpanel" aria-labelledby="nav-lastday-tab">
                                        <div class="jumps-prevent" style="padding-top: 15px;"></div>
                                        <div class="d-flex">
                                            <a class="btn btn-link" href="#">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-download" viewBox="0 0 16 16">
                                                    <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z" />
                                                    <path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z" />
                                                </svg> <u>ดาวน์โหลด (Excel)</u>
                                            </a>
                                            <div class="mt-2 mx-2">วันที่ส่งพัสดุ</div>
                                            <div>
                                                <input class="form-control" type="text" value="">
                                            </div>
                                        </div>
                                        <div class="mx-2 my-2">
                                            <table class="table table-striped position-relative my-4" id="my-table">
                                                <thead>
                                                    <tr>
                                                        <th>เวลาทำการ</th>
                                                        <th>จำนวนพัสดุ</th>
                                                        <th>ค่าขนส่งที่ควรได้รับ</th>
                                                        <th>ส่วนลดโปรโมชั่น</th>
                                                        <th>ค่าขนส่งจริง</th>
                                                        <th>ค่าลาเบลงานรับ (รวมภาษี)</th>
                                                        <th>ค่าบรรจุภัณฑ์</th>
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
                                                        <td></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    {{-- end nav ข้อมูลวันที่ผ่านมา --}}
                                    {{-- nav บัญชีที่ควรชำระ --}}
                                    <div class="tab-pane fade" id="nav-paid" role="tabpanel" aria-labelledby="nav-paid-tab">
                                        <div class="jumps-prevent" style="padding-top: 15px;"></div>
                                        <div class="row mx-2 mb-3">
                                            <div class="col-2">
                                                <div class="mb-1 ">สถานะชำระเงิน</div>
                                                <div>
                                                    <input class="form-control" type="text" value="">
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="mb-1 ">วันที่ทำรายการ</div>
                                                <div>
                                                    <input class="form-control" type="text" value="">
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="mb-1 ">วันที่ชำระ</div>
                                                <div>
                                                    <input class="form-control" type="text" value="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mx-2 my-2">
                                            <table class="table table-striped position-relative my-4" id="my-table">
                                                <thead>
                                                    <tr>
                                                        <th>เวลาทำการ</th>
                                                        <th>จำนวนพัสดุ</th>
                                                        <th>ค่าขนส่งที่ควรได้รับ</th>
                                                        <th>ส่วนลดโปรโมชั่น</th>
                                                        <th>ค่าขนส่งจริง</th>
                                                        <th>ค่าลาเบลงานรับ (รวมภาษี)</th>
                                                        <th>ค่าบรรจุภัณฑ์</th>
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
                                                        <td></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    {{-- end nav บัญชีที่ควรชำระ --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- end page --}}
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

</body>

</html>
