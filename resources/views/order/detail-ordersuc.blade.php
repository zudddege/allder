<!DOCTYPE html>
<html lang="en">

<head>
    @include('layouts.main.header')
    <link href="{{ asset('assets/css/icons.css')}}" rel="stylesheet">
    <link href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ asset('assets/plugins/datatable/datatables.min.css')}}" rel="stylesheet">
    <link href="{{ asset('assets/plugins/datatable/responsive.dataTables.min.css')}}" rel="stylesheet">
    <link href="{{ asset('assets/plugins/datatable/responsive.bootstrap5.css')}}" rel="stylesheet">
    <link href="{{ asset('assets/plugins/datatable/css/buttons.bootstrap5.min.css')}}" rel="stylesheet">
    <link href="{{ asset('assets/plugins/datatable/css/dataTables.bootstrap5.min.css')}}" rel="stylesheet">
    <link href="{{ asset('assets/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
    <link href="{{ asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
    <link href="{{ asset('assets/plugins/sidebar/sidebar.css')}}" rel="stylesheet">
    <link href="{{ asset('assets/plugins/perfect-scrollbar/p-scrollbar.css')}}" rel="stylesheet">
    <link href="{{ asset('assets/css/sidemenu.css')}}" rel="stylesheet">
    <link href="{{ asset('assets/css/style.css')}}" rel="stylesheet">
    <link href="{{ asset('assets/css/boxed.css')}}" rel="stylesheet">
    <link href="{{ asset('assets/css/dark-boxed.css')}}" rel="stylesheet">
    <link href="{{ asset('assets/css/style-dark.css')}}" rel="stylesheet">
    <link href="{{ asset('assets/css/skin-modes.css')}}" rel="stylesheet">
    <link href="{{ asset('assets/css/animate.css')}}" rel="stylesheet">
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
            max-width: 50% !important;
            /* desired relative width */
            margin-left: auto !important;
            margin-right: auto !important;
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
                        <div class="d-flex">
                            <h5 class="content-title mb-0 my-auto">รายละเอียดการส่ง</h5>
                        </div>
                    </div>
                </div>

                <div class="row row-sm">
                    <div class="col-sm-8">
                        <div class="card">
                            <div class="card-body">
                                <div class="jumps-prevent" style="padding-top: 25px;"></div>
                                <div class="d-flex mx-1 my-1">
                                    <p class="mr-4">เลขออเดอร์</p>
                                    <p>{{$order->order_no}}</p>
                                </div>
                                <div class="d-flex mx-1 my-1">
                                    <p class="mr-4">เลขพัสดุ</p>
                                    <p>{{$order->tracking_no}}</p>
                                </div>
                                <div class="d-flex mx-1 my-1">
                                    <p class="mr-4">ประเภทพัสดุ</p>
                                    <p>--------</p>
                                </div>
                                <div class="d-flex mx-1 my-1">
                                    <p class="mr-4">เลขพัสดุเดิม</p>
                                    <p>{{$order->original_no}}</p>
                                </div>
                                <div class="d-flex mx-1 my-1">
                                    <p class="mr-4">เลขพัสดุหลังจากตีกลับ</p>
                                    <p>{{$order->return_no}}</p>
                                </div>
                                <div class="d-flex mx-1 my-1">
                                    <p class="mr-4">ที่อยู่เข้ารับพัสดุ</p>
                                    <p>---------</p>
                                </div>
                                <div class="d-flex mx-1 my-1">
                                    <p class="mr-4">ผู้ส่ง</p>
                                    <p>{{$order->send_name}} {{$order->send_tel}} {{$order->send_detail}} {{$order->send_district}} {{$order->send_city}} {{$order->send_province}} {{$order->send_postal_code}}</p>
                                </div>
                                <div class="d-flex mx-1 my-1">
                                    <p class="mr-4">ผู้รับ</p>
                                    <p>{{$order->recv_name}} {{$order->recv_tel}} {{$order->recv_detail}} {{$order->recv_district}} {{$order->recv_city}} {{$order->recv_province}} {{$order->recv_postal_code}}</p>
                                </div>
                                <div class="d-flex mx-1 my-1">
                                    <p class="mr-4">ประเภทสินค้า</p>
                                    <p>{{$order->category_text}}</p>
                                </div>
                                <div class="d-flex mx-1 my-1">
                                    <p class="mr-4">น้ำหนัก (กก.)</p>
                                    <p>{{$order->weight}} kg</p>
                                </div>
                                <div class="d-flex mx-1 my-1">
                                    <p class="mr-4">ขนาด</p>
                                    <p>{{$order->length}} x {{$order->width}} x {{$order->height}} cm</p>
                                </div>
                                <div class="d-flex mx-1 my-1">
                                    <p class="mr-4">น้ำหนักของค่าขนส่ง</p>
                                    <p>---------</p>
                                </div>
                                <div class="d-flex mx-1 my-1">
                                    <p class="mr-4">ประเภทสินค้า</p>
                                    <p>---------</p>
                                </div>
                                <div class="d-flex mx-1 my-1">
                                    <p class="mr-4">ค่าสินค้าที่เรียกเก็บ COD</p>
                                    <p>---------</p>
                                </div>
                                <div class="d-flex mx-1 my-1">
                                    <p class="mr-4">ค่าขนส่ง(คิดค่าขนส่งตามขนาด)</p>
                                    <p>---------</p>
                                </div>
                                <div class="d-flex mx-1 my-1">
                                    <p class="mr-4">ค่าธรรมเนียม COD</p>
                                    <p>---------</p>
                                </div>
                                <div class="d-flex mx-1 my-1">
                                    <p class="mr-4">ค่าลาเบล</p>
                                    <p>---------</p>
                                </div>
                                <div class="d-flex mx-1 my-1">
                                    <p class="mr-4">ประกันพัสดุตีกลับ</p>
                                    <p>---------</p>
                                </div>
                                <div class="d-flex mx-1 my-1">
                                    <p class="mr-4">ค่าบรรจุภัณฑ์</p>
                                    <p>---------</p>
                                </div>
                                <div class="d-flex mx-1 my-1">
                                    <p class="mr-4">ประกันคุ้มครองพัสดุ</p>
                                    <p>---------</p>
                                </div>
                                <div class="d-flex mx-1 my-1">
                                    <p class="mr-4">ค่า Speed</p>
                                    <p>---------</p>
                                </div>
                                <div class="d-flex mx-1 my-1">
                                    <p class="mr-4">ประกันบรรจุภัณฑ์ภายนอกเสียหาย</p>
                                    <p>---------</p>
                                </div>
                                <div class="d-flex mx-1 my-1">
                                    <p class="mr-4">คำนวณค่าคุ้มครองพัสดุ</p>
                                    <p>---------</p>
                                </div>
                                <div class="d-flex mx-1 my-1">
                                    <p class="mr-4">ส่วนลดโปรโมชั่น</p>
                                    <p>---------</p>
                                </div>
                                <div class="d-flex mx-1 my-1">
                                    <p class="mr-4">ราคาสุทธิ</p>
                                    <p>---------</p>
                                </div>
                                <div class="d-flex mx-1 my-1">
                                    <p class="mr-4">วิธีชำระเงิน</p>
                                    <p>---------</p>
                                </div>
                                <div class="d-flex mx-1 my-1">
                                    <p class="mr-4">หมายเหตุ</p>
                                    <p>{{$order->note_detail}}</p>
                                </div>
                                <div class="d-flex mx-1 my-1">
                                    <p class="mr-4">ค่าประกัน</p>
                                    <p>---------</p>
                                </div>
                                <div class="jumps-prevent" style="padding-top: 25px;"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="jumps-prevent" style="padding-top: 25px;"></div>
                                <div class="px-4">
                                    <p class="mt-2 mb-1">เซ็นชื่อด้วยตัวบรรจง</p>
                                    <img src="{{$order->signature_url}}" width="100%;" height="100%;" alt="" class="border">
                                </div>
                                <div class="jumps-prevent" style="padding-top: 25px;"></div>
                                <div class="d-flex justify-content-center">
                                    <button type="button" class="btn btn-primary mx-1">ยื่นเคลม</button>
                                    <button type="button" class="btn btn-danger mx-1">เร่งติดตามพัสดุ</button>
                                </div>
                                <div class="jumps-prevent" style="padding-top: 25px;"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Container closed -->
        </div>
        <!-- main-content closed -->
        @include('layouts.main.modal-courier')

        <!-- End Page -->

        <!-- Back-to-top -->
        <a href="#top" id="back-to-top" style="display: none;"><i class="las la-angle-double-up"></i></a>
        <script src="/assets/plugins/jquery/jquery.min.js"></script>
        <script src="/assets/plugins/bootstrap/js/popper.min.js"></script>
        <script src="/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="/assets/plugins/ionicons/ionicons.js"></script>
        <script src="/assets/plugins/moment/moment.js"></script>
        <script src="/assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
        <script src="/assets/plugins/perfect-scrollbar/p-scroll.js"></script>
        <script src="/assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
        <script src="/assets/plugins/datatable/datatables.min.js"></script>
        <script src="/assets/plugins/datatable/js/dataTables.bootstrap5.js"></script>
        <script src="/assets/plugins/datatable/js/dataTables.buttons.min.js"></script>
        <script src="/assets/plugins/datatable/js/buttons.bootstrap5.min.js"></script>
        <script src="/assets/plugins/datatable/js/jszip.min.js"></script>
        <script src="/assets/plugins/datatable/js/buttons.html5.min.js"></script>
        <script src="/assets/plugins/datatable/js/buttons.print.min.js"></script>
        <script src="/assets/plugins/datatable/js/buttons.colVis.min.js"></script>
        <script src="/assets/plugins/datatable/pdfmake/pdfmake.min.js"></script>
        <script src="/assets/plugins/datatable/pdfmake/vfs_fonts.js"></script>
        <script src="/assets/js/table-data.js"></script>
        <script src="/assets/plugins/rating/jquery.rating-stars.js"></script>
        <script src="/assets/plugins/rating/jquery.barrating.js"></script>
        <script src="/assets/plugins/side-menu/sidemenu.js"></script>
        <script src="/assets/plugins/sidebar/sidebar.js"></script>
        <script src="/assets/plugins/sidebar/sidebar-custom.js"></script>
        <script src="/assets/js/sticky.js"></script>
        <script src="/assets/js/eva-icons.min.js"></script>
        <script src="/assets/js/custom.js"></script>
        <script src="https://earthchie.github.io/jquery.Thailand.js/jquery.Thailand.js/dependencies/JQL.min.js"></script>
        <script src="https://earthchie.github.io/jquery.Thailand.js/jquery.Thailand.js/dependencies/typeahead.bundle.js"></script>
        <script src="https://earthchie.github.io/jquery.Thailand.js/jquery.Thailand.js/dist/jquery.Thailand.min.js"></script>

        @include('layouts.main.courier')

</body>

</html>
