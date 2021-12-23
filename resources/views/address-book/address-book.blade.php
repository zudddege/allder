<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Allder Express</title>
    <link rel="icon" href="{{asset('assets/img/brand/icon.png')}}" type="image/x-icon">
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
</head>

<body class="main-body app sidebar-mini">
    <div class="page">
        <div class="app-sidebar__overlay" data-bs-toggle="sidebar"></div>
        <aside class="app-sidebar sidebar-scroll ps">
            <div class="main-sidebar-header active">
                <a class="desktop-logo logo-light active" href="#"><img src="{{asset('assets/img/brand/allderExpress.png')}}" class="main-logo" alt="logo"></a>
                <a class="logo-icon mobile-logo icon-light active" href="#"><img src="{{asset('assets/img/brand/icon.png')}}" class="logo-icon" alt="logo"></a>
            </div>
            <div class="main-sidemenu is-expanded">
                <ul class="side-menu open">
                    <li class="slide">
                        <a class="side-menu__item" data-bs-toggle="slide" href="{{url('/order')}}"><span class="side-menu__label">จัดการออเดอร์</span></a>
                    </li>
                    <li class="slide">
                        <a class="side-menu__item" data-bs-toggle="slide" href="{{url('/courier')}}"><span class="side-menu__label">เรียกคูเรียร์รับพัสดุ</span></a>
                    </li>
                    <li class="slide">
                        <a class="side-menu__item" data-bs-toggle="slide" href="#"><span class="side-menu__label">ระหว่างจัดการพัสดุที่มีปัญหา</span></a>
                    </li>
                    <li class="slide">
                        <a class="side-menu__item" data-bs-toggle="slide" href="#"><span class="side-menu__label">ตรวจเช็คพัสดุ</span></a>
                    </li>
                    <li class="slide is-expanded">
                        <a class="side-menu__item" data-bs-toggle="slide" href="{{url('/book/address')}}"><span class="side-menu__label">สมุดที่อยู่</span></a>
                    </li>
                    <li class="slide">
                        <a class="side-menu__item" data-bs-toggle="slide" href="#"><span class="side-menu__label">กระทบค่าขนส่ง</span></a>
                    </li>
                    <li class="slide">
                        <a class="side-menu__item" data-bs-toggle="slide" href="#"><span class="side-menu__label">เก็บเงินพัสดุปลายทาง</span></a>
                    </li>
                    <li class="slide">
                        <a class="side-menu__item" data-bs-toggle="slide" href="#"><span class="side-menu__label">ตารางรายการ POD</span></a>
                    </li>
                    <li class="slide">
                        <a class="side-menu__item" data-bs-toggle="slide" href="{{url('/subaccount')}}"><span class="side-menu__label">จัดการ Sub-Account</span></a>
                    </li>
                </ul>
            </div>
        </aside>

        <div class="main-content app-content">
            <div class="main-header sticky side-header nav nav-item" style="margin-bottom: -63px;">
                <div class="container-fluid">
                    <div class="d-flex">
                        <div>
                            <div class="app-sidebar__toggle" data-bs-toggle="sidebar">
                                <a class="open-toggle" href="#"><i class="header-icon fe fe-align-left"></i></a>
                                <a class="close-toggle" href="#"><i class="header-icons fe fe-x"></i></a>
                            </div>
                        </div>
                        <div>
                            <button type="button" class="btn btn-primary mx-2">เรียกพนักงานเข้ามารับพัสดุ</button>
                            <button type="button" class="btn btn-primary mx-2">ระบุพนักงานเข้ารับพัสดุ</button>
                        </div>

                    </div>

                    <div>
                        <div class="nav nav-item  navbar-nav-right ml-auto">
                            <div class="nav-item full-screen fullscreen-button">
                                <a class="new nav-link full-screen-link" href="#"><svg xmlns="http://www.w3.org/2000/svg" class="header-icon-svgs" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M8 3H5a2 2 0 0 0-2 2v3m18 0V5a2 2 0 0 0-2-2h-3m0 18h3a2 2 0 0 0 2-2v-3M3 16v3a2 2 0 0 0 2 2h3">
                                        </path>
                                    </svg></a>
                            </div>
                            <div class="dropdown main-profile-menu nav nav-item nav-link">
                                <a class="profile-user d-flex" href=""><img alt="" src="{{asset('assets/images/91831124_p0.jpg')}}"></a>
                                <div class="dropdown-menu">
                                    <div class="main-header-profile bg-primary p-3">
                                        <div class="d-flex wd-100p">
                                            <div class="main-img-user"><img alt="" src="{{asset('assets/images/91831124_p0.jpg')}}" class=""></div>
                                            <div class="ml-3 my-auto">
                                                <h6>Zudddege</h6><span>Super Admin</span>
                                            </div>
                                        </div>
                                    </div>
                                    <a class="dropdown-item" href="page-signin.html"><i class="bx bx-log-out"></i> Sign Out</a>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container-fluid">
                <div class="breadcrumb-header justify-content-between">
                    <div class="my-auto">
                        <div class="d-flex">
                            <h5 class="content-title mb-0 my-auto">สมุดที่อยู่</h5>
                        </div>
                    </div>
                </div>
                <div class="row row-sm">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-header" style="background-color: white;">
                                <nav>
                                    <div class="nav main-nav-line" id="nav-tab" role="tablist">
                                        <a class="nav-item nav-link active" id="nav-address-book-tab" data-toggle="tab" href="#nav-address-book" role="tab" aria-controls="nav-address-book" aria-selected="true">ผู้ส่ง / ผู้รับ</a>
                                        <a class="nav-item nav-link" id="nav-address-storage-tab" data-toggle="tab" href="#nav-address-storage" role="tab" aria-controls="nav-address-storage" aria-selected="false">ที่อยู่เข้ารับพัสดุ</a>
                                    </div>
                                </nav>
                            </div>
                            <div class="jumps-prevent" style="padding-top: 10px;"></div>
                            <div class="card-body">
                                {{-- navbar content --}}
                                <div class="tab-content" id="nav-tabContent">
                                    {{-- address-book navbar --}}
                                    <div class="tab-pane fade show active" id="nav-address-book" role="tabpanel" aria-labelledby="nav-address-book-tab">
                                        <div class="d-flex">
                                            <a href="{{url('/add_order')}}"><label class="btn btn-primary mx-3"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                                    <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                                                </svg> เพิ่มที่อยู่ </label>
                                            </a>
                                            <label class="btn btn-info mx-3" id='upload'>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-upload" viewBox="0 0 16 16">
                                                    <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z" />
                                                    <path d="M7.646 1.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 2.707V11.5a.5.5 0 0 1-1 0V2.707L5.354 4.854a.5.5 0 1 1-.708-.708l3-3z" />
                                                </svg> นำเข้าข้อมูล
                                            </label>
                                            <form action="/import" method="post" enctype="multipart/form-data" id="main-form">
                                                @csrf
                                                <input type="file" style="display: none;" name="image" id='me'>
                                            </form>
                                            <a class="btn btn-link" href="{{url('/export')}}">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-download" viewBox="0 0 16 16">
                                                    <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z" />
                                                    <path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z" />
                                                </svg> <u>ดาวน์โหลด (Excel)</u>
                                            </a>
                                        </div>

                                        <div class="jumps-prevent" style="padding-top: 15px;"></div>
                                        <form action="/search" method="get" id="testform">
                                            <div class="row px-2 mb-3">

                                                <div class="col-6">
                                                    <div class="mb-1">ค้นหา<a class="text-muted px-2">เลขออเดอร์, เลขพัสดุ,
                                                            เบอร์โทรศัพท์</a></div>
                                                    <div class="d-flex ">
                                                        <div class="">
                                                            <input class="form-control" type="text" value="" style="width:325px;">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                        <div class="px-2 ">
                                            <table class="table table-striped position-relative" id="my-table">
                                                <thead>
                                                    <tr>
                                                        <th><input id='mainbox' type="checkbox"></th>
                                                        <th class='subbox1'>ชื่อผู้ส่ง / ผู้รับ</th>
                                                        <th class='subbox2'>เบอร์โทรศัพท์</th>
                                                        <th class='subbox3'>ที่อยู่</th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($addressBooks as $addressBook)
                                                    <tr>
                                                        <td><input id='mainbox' type="checkbox"></td>
                                                        <td>{{$addressBook->book_name}}</td>
                                                        <td>{{$addressBook->book_tel}}</td>
                                                        <td>
                                                            {{$addressBook->book_detail}}
                                                            {{$addressBook->book_district}}
                                                            {{$addressBook->book_city}}
                                                            {{$addressBook->book_province}}
                                                            {{$addressBook->book_postal_code}}
                                                        </td>
                                                        <td class="shadow"><a href="{{url('#')}}" class="btn btn-link"><u>ดูรายละเอียด</u></a></td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    {{-- end address-book navbar --}}

                                    {{-- address-storage navbar --}}
                                    <div class="tab-pane fade" id="nav-address-storage" role="tabpanel" aria-labelledby="nav-address-storage-tab">
                                        <div class="d-flex">
                                            <a href="{{url('/add_order')}}"><label class="btn btn-primary mx-3"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                                    <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                                                </svg> เพิ่มที่อยู่ </label>
                                            </a>
                                            <label class="btn btn-info mx-3" id='upload'>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-upload" viewBox="0 0 16 16">
                                                    <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z" />
                                                    <path d="M7.646 1.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 2.707V11.5a.5.5 0 0 1-1 0V2.707L5.354 4.854a.5.5 0 1 1-.708-.708l3-3z" />
                                                </svg> นำเข้าข้อมูล
                                            </label>
                                            <form action="/import" method="post" enctype="multipart/form-data" id="main-form">
                                                @csrf
                                                <input type="file" style="display: none;" name="image" id='me'>
                                            </form>
                                            <a class="btn btn-link" href="{{url('/export')}}">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-download" viewBox="0 0 16 16">
                                                    <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z" />
                                                    <path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z" />
                                                </svg> <u>ดาวน์โหลด (Excel)</u>
                                            </a>
                                        </div>

                                        <div class="jumps-prevent" style="padding-top: 15px;"></div>
                                        <form action="/search" method="get" id="testform">
                                            <div class="row px-2 mb-3">

                                                <div class="col-6">
                                                    <div class="mb-1">ค้นหา<a class="text-muted px-2">เลขออเดอร์, เลขพัสดุ,
                                                            เบอร์โทรศัพท์</a></div>
                                                    <div class="d-flex ">
                                                        <div class="">
                                                            <input class="form-control" type="text" value="" style="width:325px;">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                        <div class="px-2 ">
                                            <table class="table table-striped position-relative" id="address-storage-table">
                                                <thead>
                                                    <tr>
                                                        <th><input id='mainbox' type="checkbox"></th>
                                                        <th class='subbox1'>รหัสคลังสินค้า</th>
                                                        <th class='subbox2'>ชื่อคลังสินค้า</th>
                                                        <th class='subbox3'>ที่อยู่</th>
                                                        <th class='subbox4'>ผู้ติดต่อ</th>
                                                        <th class='subbox5'>เบอร์ติดต่อ</th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($addressBooks as $addressBook)
                                                    <tr>
                                                        <td><input id='mainbox' type="checkbox"></td>
                                                        <td>{{$addressBook->book_name}}</td>
                                                        <td>{{$addressBook->book_tel}}</td>
                                                        <td>
                                                            {{$addressBook->book_detail}}
                                                            {{$addressBook->book_district}}
                                                            {{$addressBook->book_city}}
                                                            {{$addressBook->book_province}}
                                                            {{$addressBook->book_postal_code}}
                                                        </td>
                                                        <td>aaaaaa</td>
                                                        <td>1111111111</td>
                                                        <td class="shadow"><a href="{{url('#')}}" class="btn btn-link"><u>ดูรายละเอียด</u></a></td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    {{-- end address-storage navbar --}}
                                </div>
                                {{-- end navbar content --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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

    <script>
        $('#my-table').DataTable({
            scrollX: false,
            autoWidth: false,
            columns: [{
                width: "2%"
            }, {
                width: '20%',
            }, {
                width: '10%',
            }, {
                width: '55%',
            }, {
                width: '13%',
            }, ],
            ordering: false
        });
        $(".dataTables_length").css("display", "none");
        $(".dataTables_filter").css("display", "none");

    </script>

    <script>
        $('#address-storage-table').DataTable({
            scrollX: false,
            autoWidth: false,
            columns: [{
                width: "2%"
            }, {
                width: '10%',
            }, {
                width: '20%',
            }, {
                width: '30%',
            }, {
                width: '15%',
            }, {
                width: '10%',
            }, {
                width: '13%',
            }, ],
            ordering: false
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

</body>

</html>
