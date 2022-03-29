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
                            <h5 class="content-title mb-0 my-auto">รายละเอียดคูเลียร์</h5>
                        </div>
                    </div>
                </div>
                <!-- breadcrumb -->

                <!-- row opened -->
                @csrf
                <div class="row">
                    <div class="col-6">
                        <div class="card  card-body">
                            <div class="px-2 py-2">
                                <p>ที่อยู่เข้ารับ</p>
                                <div class="row mx-2">
                                    <div class="col-6">
                                        <div class="my-1">
                                            <span>รหัสคลัง</span>
                                            <input class="form-control" type="text" name="warehouse_no" value="{{$courier->warehouse_no}}" readonly>
                                        </div>
                                        <div class="my-1">
                                            <span>ผู้ติดต่อ</span>
                                            <input class="form-control" type="text" name="contact_name" value="{{$courier->contact_name}}" readonly>
                                        </div>
                                        <div class="my-1">
                                            <span>พื้นที่บริการ</span>
                                            <textarea style="resize: none; width: 100%;" rows="4" class="form-control" name="warehouse_detail" readonly>{{$courier->warehouse_detail}}</textarea>
                                        </div>
                                        <div class="my-1">
                                            <span>จังหวัด</span>
                                            <input class="form-control" type="text" name="warehouse_province" value="{{$courier->warehouse_province}}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="my-1">
                                            <span>ชื่อคลัง</span>
                                            <input class="form-control" type="text" name="warehouse_name" value="{{$courier->warehouse_name}}" readonly>
                                        </div>
                                        <div class="my-1">
                                            <span>เบอร์โทรศัพท์</span>
                                            <input class="form-control" type="text" name="warehouse_tel" value="{{$courier->warehouse_tel}}" readonly>
                                        </div>
                                        <div class="my-1">
                                            <span>ตำบล / แขวง</span>
                                            <input class="form-control" type="text" name="warehouse_district" value="{{$courier->warehouse_district}}" readonly>
                                        </div>
                                        <div class="my-1">
                                            <span>อำเภอ / เขต</span>
                                            <input class="form-control" type="text" name="warehouse_city" value="{{$courier->warehouse_city}}" readonly>
                                        </div>
                                        <div class="my-1">
                                            <span>รหัสไปรษณีย์</span>
                                            <input class="form-control" type="text" name="warehouse_postal_code" value="{{$courier->warehouse_postal_code}}" readonly>
                                        </div>
                                    </div>
                                </div>
                                <p>ฝากข้อความ</p>
                                <div class="mx-4">
                                    <div class="my-1">
                                        <span>จำนวนพัสดุ</span>
                                        <input class="form-control" type="text" name="estimate_parcel_quantity" value="{{$courier->parcel_quantity}}" style="width:40%;" readonly>
                                    </div>
                                    <div class="my-1">
                                        <span>หมายเหตุ</span>
                                        <textarea style="resize: none; width: 100%;" rows="4" class="form-control" name="note_detail" readonly>{{$courier->note_detail}}</textarea>
                                    </div>
                                </div>
                                <div class="d-flex my-2">
                                    <p class="mx-1">เวลาคาดว่าจะไปรับ</p>
                                    <p>: {{$courier->timeout_text}}</p>
                                </div>
                                <div class="d-flex my-1" style="padding-top: 15px;">
                                    <form action="{{url('/api/couriers/cancel/'.$couriers->id)}}" method="post">
                                        <button type="submit" class="btn btn-danger mx-2">ยกเลิกการเรียกคูเรียร์</button>
                                    </form>
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
