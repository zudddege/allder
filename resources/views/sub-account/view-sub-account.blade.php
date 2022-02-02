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

    <style data-styles="">
        ion-icon {
            visibility: hidden
        }

        .hydrated {
            visibility: inherit
        }

    </style>
    <style data-styles="">
        ion-icon {
            visibility: hidden
        }

        .hydrated {
            visibility: inherit
        }

    </style>
    <style data-styles="">
        ion-icon {
            visibility: hidden
        }

        .hydrated {
            visibility: inherit
        }

    </style>



    <style>
        table {
            border-collapse: collapse;
            border-spacing: 0;
            width: 100%;
            border: 1px solid #ddd;
        }

        th,
        td {
            text-align: left;
            padding: 8px;
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

        .dropdown-menu {
            width: 350px !important;
            margin-right: 50% !important;
        }

        .slider.round:before {
            border-radius: 50%;
        }

    </style>

    <style>
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
                            <h5 class="content-title mb-0 my-auto">จัดการ Sub - Account</h5>
                        </div>
                    </div>
                </div>
                <!-- breadcrumb -->

                <!-- row opened -->
                <div class="row row-sm">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex">
                                    <a href="{{url('/sub-accounts/create')}}"><label class="btn btn-primary mx-3"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                                <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" /></svg> สร้างรายการ
                                        </label></a>
                                </div>
                                <div class="jumps-prevent" style="padding-bottom: 15px;"></div>
                                <form action="">
                                    <div class="mb-1 px-4">ค้นหา<a class="text-muted px-2">อีเมล, ชื่อผู้ใช้งาน / ชื่อธุรกิจ, เบอร์โทรศัพท์</a></div>
                                    <div class="search-container px-4 mb-2">
                                        <input class="form-control" type="text" id="search" style="width: 300px;">
                                    </div>
                                </form>
                                <div class="px-1">
                                    <table class="table table-striped position-relative paginated" id="my-table">
                                        <thead>
                                            <tr>
                                                <th>
                                                    <input type="checkbox" class="main-check">
                                                </th>
                                                <th>รหัสผู้ใช้งาน</th>
                                                <th>ชื่อย่อ</th>
                                                <th>ID</th>
                                                <th>อีเมล</th>
                                                <th>ชื่อผู้ใช้งาน / ชื่อธุรกิจ</th>
                                                <th>เบอร์ติดต่อ</th>
                                                <th>ส่วนลดที่ได้รับ</th>
                                                <th>COD</th>
                                                <th>สถานะ</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($subaccount as $account)
                                            <tr>
                                                <td>
                                                    <input type="checkbox" class="sub-check">
                                                </td>
                                                <td><u><a href="{{url('/sub-accounts/detail?id='.$account->id)}}">{{$account->close_id}}</a></u></td>
                                                <td>{{$account->short_id}}</td>
                                                <td>{{$account->username}}</td>
                                                <td>{{$account->email}}</td>
                                                <td>{{$account->account_name}}</td>
                                                <td>{{$account->tel_no}}</td>
                                                <td>{{$account->discount_rate}} %</td>
                                                <td>{{$account->cod_rate}} %</td>
                                                <td><label class="switch"><input type="checkbox" class="switchstatus" id="{{$account->id}}" @if($account->is_status === 1) checked @endif><span class="slider round"></span></label></td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/div-->
                </div>
                <!-- /row -->
            </div>
            <!-- Container closed -->
        </div>
        <!-- main-content closed -->
        @include('layouts.main.modal-courier')
    </div>
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
    <script src="https://earthchie.github.io/jquery.Thailand.js/jquery.Thailand.js/dependencies/JQL.min.js"></script>
    <script src="https://earthchie.github.io/jquery.Thailand.js/jquery.Thailand.js/dependencies/typeahead.bundle.js"></script>
    <script src="https://earthchie.github.io/jquery.Thailand.js/jquery.Thailand.js/dist/jquery.Thailand.min.js"></script>

    @include('layouts.main.courier')
    
    <script>
        $('#my-table').DataTable({
            scrollX: false,
            autoWidth: false,
            searching: false,
            filter: false,
            ordering: false,
            paging: false,
            info: false,
            language: {
                emptyTable: "ไม่พบข้อมูล"
            },
            "columns": [{
                "width": "2%"
            }, {
                "width": "10%"
            }, {
                "width": "10%"
            }, {
                "width": "22%"
            }, {
                "width": "22%"
            }, {
                "width": "10%"
            }, {
                "width": "10%"
            }, {
                "width": "8%"
            }, {
                "width": "5%"
            }, {
                "width": ""
            }],
            "ordering": false
        });
        $(".dataTables_length").css("display", "none");
        $(".dataTables_filter").css("display", "none");

        // $('.app-sidebar__toggle').click(function () {
        //     setTimeout(function () {
        //         table.columns.adjust().draw();
        //     }, 230);
        // });

    </script>
    <script>
        $('.main-check').on("change", function (e) {
            if (this.checked) {
                $('.sub-check').prop('checked', true)
            } else {
                $('.sub-check').prop('checked', false)
            }
        })

    </script>
    <script>
        $('.switchstatus').on('click', function () {
            var id = $(this).attr('id');
            $.ajax({
                url: '/api/sub-accounts/status',
                method: 'POST',
                data: {
                    id: id
                },
            })
        });

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
            var $previous = $('<span class="previous"><<</spnan>');
            var $next = $('<span class="next">>></spnan>');

            $pager.insertAfter($table).find('span.page-number:first').addClass('active');

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
