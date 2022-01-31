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

        <!-- main-sidebar -->
        @include('layouts.main.sidebar')
        <div class="main-content app-content">
            @include('layouts.main.navbar')
            <!-- container -->
            <div class="container-fluid">

                <!-- breadcrumb -->
                <div class="breadcrumb-header justify-content-between">
                    <div class="my-auto">
                        <div class="d-flex px-2">
                            <h5 class="content-title mb-0 my-auto">จัดการผู้ใช้งาน</h5>
                        </div>
                    </div>
                </div>
                <!-- breadcrumb -->

                <!-- row opened -->
                <form method="POST" action="{{ url('/api/sub-accounts/create') }}">
                    @csrf
                    <div class="row row-sm">
                        <div class="col-xl-5">
                            <div class="card card-body">
                                <div class="d-flex">
                                    <p class="px-2 mt-2">รหัสผู้ใช้งาน</p>
                                    <input class="form-control" type="text" value="{{$close_id}}" name="close_id" style="width: 25%; height: 75%;" readonly>
                                    <p class="px-2 mt-2 ml-5">ชื่อย่อ</p>
                                    <input class="form-control mx-2" type="text" value="" name="short_id" style="width: 20%; height: 75%;">
                                </div>
                                <div class="">
                                    <div class="">
                                        <p class="my-1">อีเมล</p>
                                        <div class="">
                                            <input class="form-control" name="email" type="text" value="" style="width: 65%; height: 75%;">
                                        </div>
                                    </div>
                                    <div class="my-1">
                                        <p class="my-1">ชื่อผู้ใช้งาน / ชื่อธุรกิจ</p>
                                        <div class="">
                                            <input class="form-control" name="account_name" type="text" value="" style="width: 65%; height: 75%;">
                                        </div>
                                    </div>
                                    <div class="">
                                        <p class="my-1">เบอร์ติดต่อ</p>
                                        <div class="">
                                            <input class="form-control" type="text" name="tel_no" value="" style="width: 65%; height: 75%;">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card card-body">
                                <p>เงื่อนไขการใช้งาน</p>
                                <div class="">
                                    <p class="my-1">ส่วนลดที่ได้รับ</p>
                                    <div class="d-flex align-items-center">
                                        <input class="form-control" type="text" name="discount_rate" value=""><span class="px-1">%</span>
                                    </div>
                                </div>
                                <div class="my-2">
                                    <p class="my-1">COD</p>
                                    <div class="d-flex align-items-center">
                                        <input class="form-control" type="text" value="" name="cod_rate"><span class="px-1">%</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-5">
                            <div class="card card-body">
                                <div class="d-flex align-content-center">
                                    <p>การเข้าสู่ระบบ</p>
                                    <div class="d-flex align-content-center" style="margin-left: 60%;">
                                        <p class="px-1">สถานะ</p>
                                        <label class="switch">
                                            <input type="checkbox" name="is_status" value="1" checked>
                                            <span class="slider round"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="">
                                    <p class="my-1">ID</p>
                                    <div class="">
                                        <input class="form-control" type="text" value="" style="width: 65%; height: 75%;" name="username">
                                    </div>
                                </div>
                                <div class="my-1">
                                    <p class="my-1">รหัสผ่าน <span class="text-muted">(8 - 16 ตัวอักษร)</span></p>
                                    <div class="d-flex align-items-center">
                                        <input class="form-control " type="password" value="" style="width: 65%; height: 75%;" name="password" required id="password">
                                        <button class="btn btn-link" type="button" b id="auto_password"><u>ใช้รหัสผ่านอัตโนมัติ</u></button>
                                    </div>
                                </div>
                                <div class="">
                                    <p class="my-1">รหัสผ่านอีกครั้ง</p>
                                    <div class="">
                                        <input class="form-control " type="password" value="" style="width: 65%; height: 75%;" required name="password_confirmation" id="password-confirm">
                                    </div>
                                </div>

                                <div class="jumps-prevent" style="padding-top: 130px;"></div>
                                <div class="d-flex justify-content-center my-2">
                                    <input class="btn btn-outline-danger mx-1" style="width: 125px;" type="reset" value="ยกเลิก">
                                    <input class="btn btn-primary mx-1" style="width: 125px;" type="submit" value="เพิ่มผู้ใช้งาน">
                                </div>
                                {{-- <div class="jumps-prevent" style="padding-top: 25px;"></div> --}}
                            </div>
                        </div>
                        <!--/div-->
                    </div>
                </form>
                <!-- /row -->
            </div>
            <!-- Container closed -->
        </div>
        <!-- main-content closed -->

        <!-- End Page -->

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
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#auto_password').on('click', function () {
                $.ajax({
                    url: '/api/sub-accounts/gen-pass',
                    method: "GET",
                    success: function (data) {
                        $('#password').val(data);
                        $('#password-confirm').val(data);
                    }
                })
            });

        </script>

</body>

</html>
