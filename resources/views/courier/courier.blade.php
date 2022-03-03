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
    <link href="https://fonts.googleapis.com/css2?family=Kanit&display=swap" rel="stylesheet">
    <link href="https://earthchie.github.io/jquery.Thailand.js/jquery.Thailand.js/dist/jquery.Thailand.min.css" rel="stylesheet">

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
                            <h5 class="content-title mb-0 my-auto">เรียกคูเรียร์รับพัสดุ</h5>
                        </div>
                    </div>
                </div>
                <!-- breadcrumb -->

                <!-- row opened -->
                <div class="row row-sm">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="jumps-prevent" style="padding-top: 5px;"></div>
                            <div class="card-body">
                                <div class="d-flex">
                                    <button type="button" class="btn btn-primary mx-2" data-toggle="modal" data-target="#notify-courier-modal">เรียกพนักงานเข้ามารับพัสดุ</button>
                                    <button type="button" class="btn btn-primary mx-2" data-toggle="modal" data-target="#assign-courier-modal">ระบุพนักงานเข้ารับพัสดุ</button>
                                    <form action="/api/import/excel" method="post" enctype="multipart/form-data" id="main-form">
                                        @csrf
                                        <input type="file" style="display: none;" name="image" id='me'>
                                    </form>
                                    <a class="btn btn-link" href="{{url('/api/export/excel')}}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-download" viewBox="0 0 16 16">
                                            <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z" />
                                            <path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z" />
                                        </svg> <u>ดาวน์โหลด (Excel)</u>
                                    </a>
                                </div>
                            </div>
                            <div class="jumps-prevent" style="padding-top: 15px;"></div>
                            <div class="row px-2 mb-3">
                                <div class="col-4">
                                    <div class="mb-1">เวลาที่ทำรายการ</div>
                                    <div class="">
                                        <input class="form-control" type="text" value="18/10/2564 - 09:00 am ถึง 18/10/2564 - 09:00 am">
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="mb-1">สถานะการรับพัสดุ</div>
                                    <div class="">
                                        <input class="form-control" type="text" value="">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="mb-1">ค้นหา<a class="text-muted px-2">เลขออเดอร์, เลขพัสดุ, เบอร์โทรศัพท์</a></div>
                                    <div class="d-flex ">
                                        <div class="">
                                            <input class="form-control" type="text" id="search" style="width: 300px;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="px-2">
                                <table class="table table-striped position-relative paginated" id="my-table">
                                    <thead>
                                        <tr>
                                            <th><input type="checkbox"></th>
                                            <th>เวลาที่ทำรายการ</th>
                                            <th>สถานะจัดส่ง</th>
                                            <th>ที่อยู่เข้ารับพัสดุ</th>
                                            <th>ข้อมูลคูเรียร์</th>
                                            <th>หมายเหตุ</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($couriers as $courier)
                                        <tr>
                                            <td><input type="checkbox"></td>
                                            <td>{{$courier->created_at->addYear(543)->format('d/m/Y - h:i a')}}</td>
                                            <td><span class="border  rounded-10" style="padding: 5px 10px; color: #ffffff; background-color: orange;">{{$courier->status_text}}</span></td>
                                            <td>
                                                <div>{{$courier->warehouse_name}}</div>
                                                <div class="text-muted">
                                                    {{$courier->warehouse_detail}}
                                                    {{$courier->warehouse_district}}
                                                    {{$courier->warehouse_city}}
                                                    {{$courier->warehouse_province}}
                                                    {{$courier->warehouse_postal_code}}
                                                </div>
                                            </td>
                                            <td>
                                                <div>{{$courier->operator_tel}}</div>
                                                <div class="text-muted">{{$courier->operator_name}} ({{$courier->operator_id}})</div>
                                            </td>
                                            <td>{{$courier->note_detail}}</td>
                                            <td class="td_detail shadow"><a href="{{url('/couriers/detail/'.$courier->id.'')}}" class="btn btn-link"><u>ดูรายละเอียด</u></a></td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="paginated"></div>
                            </div>
                            <div class="jumps-prevent" style="padding-top: 15px;"></div>
                        </div>
                    </div>
                    <!--/div-->
                </div>
                <!-- /row -->
            </div>
            <!-- Container closed -->
        </div>
        <!-- main-content closed -->
    </div>
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

    <script>
        $('#my-table').DataTable({
            scrollX: true,
            paging: false,
            ordering: false,
            info: false,
            language: {
                emptyTable: "ไม่พบข้อมูล"
            },
            "columns": [{
                "width": "2%"
            }, {
                "width": "150px"
            }, {
                "width": "100px"
            }, {
                "width": "400px"
            }, {
                "width": "250px"
            }, {
                "width": "250px"
            }, ],
            "ordering": false
        });
        $(".dataTables_length").css("display", "none");
        $(".dataTables_filter").css("display", "none");

    </script>

    <script>
        $('#search').on("keyup", function () {
            $('table.paginated').trigger('repaginate');
        })

        $('table.paginated').each(function () {
            var currentPage = 0;
            var numPerPage = 7;
            var $table = $(this);
            var $pager = $('<div class="pager"></div>');
            var $previous = $('<span class="previous"><<</span>');
            var $next = $('<span class="next">>></span>');

            $pager.insertAfter('div.paginated').find('span.page-number:first').addClass('active');

            $table.bind('repaginate', function () {
                $table.find('tbody tr').hide();

                $filteredRows = $table.find('tbody tr').filter(function (i, tr) {
                    return $('#search').val() != "" ? $(tr).find("td").get().map(function (td) {
                        return $(td).text();
                    }).filter(function (td) {
                        return td.indexOf($('#search').val()) != -1;
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
