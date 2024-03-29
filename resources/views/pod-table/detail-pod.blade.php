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
        .switch {
            position: relative;
            display: inline-block;
            width: 30px;
            height: 17px;
        }

        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            -webkit-transition: .4s;
            transition: .4s;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 13px;
            width: 13px;
            left: 2px;
            bottom: 2px;
            background-color: white;
            -webkit-transition: .4s;
            transition: .4s;
        }

        input:checked+.slider {
            background-color: #2196F3;
        }

        input:focus+.slider {
            box-shadow: 0 0 1px #2196F3;
        }

        input:checked+.slider:before {
            -webkit-transform: translateX(26px);
            -ms-transform: translateX(26px);
            transform: translateX(13px);
        }

        /* Rounded sliders */
        .slider.round {
            border-radius: 34px;
        }

        .slider.round:before {
            border-radius: 50%;
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
        @include('layouts.main.sidebar')
        <div class="main-content app-content">
            @include('layouts.main.topbar')
            <!-- container -->
            <div class="container-fluid">
                <!-- breadcrumb -->
                <div class="breadcrumb-header justify-content-between">
                    <div class="my-auto">
                        <div class="d-flex px-2">
                            <h5 class="content-title mb-0 my-auto">รายละเอียด POD</h5>
                        </div>
                    </div>
                </div>
                <!-- breadcrumb -->

                <!-- row opened -->
                <div class="row row-sm">
                    <div class="col-sm-8">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex flex-row align-self-center">
                                    <h6 class="px-2 mt-2">เลขออเดอร์</h6>
                                    <h6 class="px-3 mt-2" style="color:blue">{{$order->order_no}}</h6>
                                    <h6 class="px-2 mt-2">เลขพัสดุ</h6>
                                    <h6 class="px-3 mt-2" style="color:blue">{{$order->tracking_no}}</h6>
                                    <h6 class="px-2 mt-2">เวลาเข้ารับพัสดุ</h6>
                                    <h6 class="px-3 mt-2" style="color:blue">{{$order->created_at->addYear(543)->format('d/m/Y - h:i a')}}</h6>
                                </div>
                                <br>
                                <div class="row row-cols-12">
                                    <div class="col-6 bd-r bd-2">
                                        <div class="d-flex">
                                            <h5 class="px-2 mt-2"><b>ข้อมูลผู้ส่ง</b></h5>
                                        </div>
                                        <div class="px-4">
                                            <p class="mt-2 mb-1">ชื่อผู้ส่ง</p>
                                            <input class="form-control" type="text" value="{{$order->send_name}}" readonly>
                                        </div>
                                        <div class="px-4">
                                            <p class="mt-2 mb-1">ที่อยู่</p>
                                            <textarea style="resize: none; width: 100%;" rows="4" class="form-control" readonly>{{$order->send_detail}}</textarea>
                                        </div>
                                        <div class="px-4">
                                            <p class="mt-2 mb-1">ตำบล / แขวง</p>
                                            <input class="form-control" type="text" value="{{$order->send_district}}" readonly>
                                        </div>
                                        <div class="px-4">
                                            <p class="mt-2 mb-1">อำเภอ / เขต</p>
                                            <input class="form-control" type="text" value="{{ $order->send_city }}" readonly>
                                        </div>
                                        <div class="px-4">
                                            <p class="mt-2 mb-1">จังหวัด</p>
                                            <input class="form-control" type="text" value="{{ $order->send_province }}" readonly>
                                        </div>
                                        <div class="px-4">
                                            <p class="mt-2 mb-1">รหัสไปรษณีย์</p>
                                            <input class="form-control" type="text" value="{{ $order->send_postal_code }}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="d-flex">
                                            <h5 class="px-2 mt-2"><b>ข้อมูลผู้รับ</b></h5>
                                        </div>
                                        <div class="px-4">
                                            <p class="mt-2 mb-1">ชื่อผู้รับ</p>
                                            <input class="form-control" type="text" value="{{$order->recv_name}}" readonly>
                                        </div>
                                        <div class="px-4">
                                            <p class="mt-2 mb-1">ที่อยู่</p>
                                            <textarea style="resize: none; width: 100%;" rows="4" class="form-control" readonly>{{$order->recv_detail}}</textarea>
                                        </div>
                                        <div class="px-4">
                                            <p class="mt-2 mb-1">ตำบล / แขวง</p>
                                            <input class="form-control" type="text" value="{{ $order->recv_district }}" readonly>
                                        </div>
                                        <div class="px-4">
                                            <p class="mt-2 mb-1">อำเภอ / เขต</p>
                                            <input class="form-control" type="text" value="{{ $order->recv_city }}" readonly>
                                        </div>
                                        <div class="px-4">
                                            <p class="mt-2 mb-1">จังหวัด</p>
                                            <input class="form-control" type="text" value="{{ $order->recv_province }}" readonly>
                                        </div>
                                        <div class="px-4">
                                            <p class="mt-2 mb-1">รหัสไปรษณีย์</p>
                                            <input class="form-control" type="text" value="{{ $order->recv_postal_code }}" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="jumps-prevent" style="padding-top: 20px;"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="px-4">
                                    <p class="mt-2 mb-1">ประเภทผู้เซ็นรับ</p>
                                    <input class="form-control" type="text" value="{{ $order->signer_type }}"" readonly>
                                </div>
                                <div class="px-4">
                                    <p class="mt-2 mb-1">ชื่อผู้เซ็นรับ</p>
                                    <input class="form-control" type="text" value="{{ $order->signer_name }}"" readonly>
                                </div>
                                <div class="px-4">
                                    <p class="mt-2 mb-1">เซ็นชื่อด้วยตัวบรรจง</p>
                                    <img src="{{$order->signature_url}}" width="100%;" height="100%;" alt="" class="border">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /row -->
            </div>
            <!-- Container closed -->
        </div>
        <!-- main-content closed -->

        <!-- End Page -->
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


</body>

</html>
