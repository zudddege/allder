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
            @include('layouts.main.topbar')
            <div class="container-fluid">
                <div class="breadcrumb-header justify-content-between">
                    <div class="my-auto">
                        <div class="d-flex">
                            <h5 class="content-title mb-0 my-auto">สมุดที่อยู่</h5>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-5">
                        {{-- card --}}
                        <form action="{{ url('/api/books/warehouse/edit/'.$warehouse->id)}}" method="post">
                            @csrf
                            <div class="card">
                                <div class="px-4 py-4">
                                    <div class="d-flex align-items-center">
                                        <span>รหัสคลังสินค้า</span>
                                        <input class="form-control mx-2" type="text" style="width: 70%" name="warehouse_no" value="{{$warehouse->warehouse_no}}">
                                    </div>
                                    <div class="my-3">
                                        <h5>ข้อมูลที่อยู่คลังสินค้า</h5>
                                    </div>
                                    <div class="my-2">
                                        <span>ขื่อคลังสินค้า</span>
                                        <input class="form-control" type="text" name="warehouse_name" value="{{$warehouse->warehouse_name}}">
                                    </div>
                                    <div class="my-2">
                                        <span>ชื่อผู้ติดต่อ</span>
                                        <input class="form-control" type="text" name="contact_name" value="{{$warehouse->contact_name}}">
                                    </div>
                                    <div class="my-2">
                                        <span>เบอร์โทรศัพท์</span>
                                        <input class="form-control" type="text" name="warehouse_tel" value="{{$warehouse->warehouse_tel}}">
                                    </div>
                                    <div class="my-2">
                                        <span class="mt-2 mb-1">ที่อยู่</span>
                                        <textarea style="resize: none; width: 100%;" rows="4" class="border border-light form-control" name="warehouse_detail">{{$warehouse->warehouse_detail}}</textarea>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="my-2">
                                                <span class="mt-2 mb-1">ตำบล / แขวง</span>
                                                <div class="">
                                                    <input class="form-control" type="text" value="{{$warehouse->warehouse_district}}" name="warehouse_district" id="warehouse_district">
                                                </div>
                                            </div>
                                            <div class="my-2">
                                                <span class="mt-2 mb-1">จังหวัด</span>
                                                <div class="">
                                                    <input class="form-control" type="text" value="{{$warehouse->warehouse_province}}" name="warehouse_province" id="warehouse_province">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="my-2">
                                                <span class="mt-2 mb-1">อำเภอ / เขต</span>
                                                <div class="">
                                                    <input class="form-control" type="text" value="{{$warehouse->warehouse_city}}" name="warehouse_city" id="warehouse_city">
                                                </div>
                                            </div>
                                            <div class="my-2">
                                                <span class="mt-2 mb-1">รหัสไปรษณีย์</span>
                                                <div class="">
                                                    <input class="form-control" type="text" value="{{$warehouse->warehouse_postal_code}}" name="warehouse_postal_code" id="warehouse_postal_code">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-center">
                                        <a href="{{url('/book')}}"><button class="btn btn-danger mx-2" type="button">ยกเลิก</button></a>
                                        <button class="btn btn-primary mx-2" type="submit" id="submit-button">บันทึกการแก้ไข</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        {{-- end card --}}
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

    <script>
        $.Thailand.setup({
            autocomplete_size: 3,
        });

        $.Thailand({
            // database: './jquery.Thailand.js/database/db.zip', // ฐานข้อมูลเป็นไฟล์ zip
            $district: $('#warehouse_district'), // input ของตำบล
            $amphoe: $('#warehouse_city'), // input ของอำเภอ
            $province: $('#warehouse_province'), // input ของจังหวัด
            $zipcode: $('#warehouse_postal_code'), // input ของรหัสไปรษณีย์
        });

    </script>

    @include('layouts.main.courier')

</body>

</html>
