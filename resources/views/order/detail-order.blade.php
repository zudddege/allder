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
                            <h5 class="content-title mb-0 my-auto">???????????????????????????????????????</h5>
                        </div>
                    </div>
                </div>

                <div class="row row-sm">
                    <div class="col-sm-8">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex flex-row align-self-center">
                                    <h6 class="px-2 mt-2">??????????????????????????????</h6>
                                    <h6 class="px-3 mt-2" style="color:blue">{{$order->order_no}}</h6>
                                    <h6 class="px-2 mt-2">????????????????????????</h6>
                                    <h6 class="px-3 mt-2" style="color:blue">{{$order->tracking_no}}</h6>
                                    <h6 class="px-2 mt-2">?????????????????????????????????????????????</h6>
                                    <h6 class="px-3 mt-2" style="color:blue">
                                        {{$order->created_at->addYear(543)->format('d/m/Y - h:i a')}}
                                    </h6>
                                </div>
                                <br>
                                <div class="row row-cols-12">
                                    <div class="col-6 bd-r bd-2">
                                        <div class="d-flex">
                                            <h5 class="px-2 mt-2"><b>????????????????????????????????????</b></h5>
                                        </div>
                                        <div class="px-4">
                                            <p class="mt-2 mb-1">??????????????????????????????</p>
                                            <input class="form-control" type="text" value="{{$order->send_name}}" readonly>
                                        </div>
                                        <div class="px-4">
                                            <p class="mt-2 mb-1">???????????????????????????????????????</p>
                                            <input class="form-control" type="text" value="{{$order->send_tel}}" readonly>
                                        </div>
                                        <div class="px-4">
                                            <p class="mt-2 mb-1">?????????????????????</p>
                                            <textarea style="resize: none; width: 100%;" rows="4" class="border border-light form-control" readonly>{{ $order->send_detail }}</textarea>
                                        </div>
                                        <div class="px-4">
                                            <p class="mt-2 mb-1">???????????? / ????????????</p>
                                            <input class="form-control" type="text" value="{{ $order->send_district }}" readonly>
                                        </div>
                                        <div class="px-4">
                                            <p class="mt-2 mb-1">??????????????? / ?????????</p>
                                            <input class="form-control" type="text" value="{{ $order->send_city }}" readonly>
                                        </div>
                                        <div class="px-4">
                                            <p class="mt-2 mb-1">?????????????????????</p>
                                            <input class="form-control" type="text" value="{{ $order->send_province }}" readonly>
                                        </div>
                                        <div class="px-4">
                                            <p class="mt-2 mb-1">????????????????????????????????????</p>
                                            <input class="form-control" type="text" value="{{ $order->send_postal_code }}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="d-flex">
                                            <h5 class="px-2 mt-2"><b>????????????????????????????????????</b></h5>
                                        </div>
                                        <div class="px-4">
                                            <p class="mt-2 mb-1">??????????????????????????????</p>
                                            <input class="form-control" type="text" value="{{$order->recv_name}}" readonly>
                                        </div>
                                        <div class="px-4">
                                            <p class="mt-2 mb-1">???????????????????????????????????????</p>
                                            <input class="form-control" type="text" value="{{$order->recv_tel}}" readonly>
                                        </div>
                                        <div class="px-4">
                                            <p class="mt-2 mb-1">?????????????????????</p>
                                            <textarea style="resize: none; width: 100%;" rows="4" class="border border-light form-control" readonly>{{ $order->recv_detail }}</textarea>
                                        </div>
                                        <div class="px-4">
                                            <p class="mt-2 mb-1">???????????? / ????????????</p>
                                            <input class="form-control" type="text" value="{{ $order->recv_district }}" readonly>
                                        </div>
                                        <div class="px-4">
                                            <p class="mt-2 mb-1">??????????????? / ?????????</p>
                                            <input class="form-control" type="text" value="{{ $order->recv_city }}" readonly>
                                        </div>
                                        <div class="px-4">
                                            <p class="mt-2 mb-1">?????????????????????</p>
                                            <input class="form-control" type="text" value="{{ $order->recv_province }}" readonly>
                                        </div>
                                        <div class="px-4">
                                            <p class="mt-2 mb-1">????????????????????????????????????</p>
                                            <input class="form-control" type="text" value="{{ $order->recv_postal_code }}" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="jumps-prevent" style="padding-top: 20px;"></div>
                                <h5 class="px-2 mt-2"><b>????????????????????????????????????????????????</b></h5>
                                <div class="row px-2 mt-3">
                                    <div class="col-3">
                                        <p class="mb-1">????????????????????????????????????</p>
                                        <input class="form-control" type="text" value="{{ $order->category_text}}" readonly>
                                    </div>
                                    <div class="col-3">
                                        <p class="mb-1">?????????????????????</p>
                                        <div class="d-flex">
                                            <input class="form-control" type="text" value="{{ $order->weight }}" readonly>
                                            <p class="mt-2 px-1">kg.</p>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <p class="mb-1">????????????<a class="text-muted px-2">??????????????? x ????????? x ?????????</a></p>
                                        <div class="d-flex">
                                            <input class="form-control" type="text" value="{{ $order->length}}" readonly>
                                            <a class="mt-2 px-2">x</a>
                                            <input class="form-control" type="text" value="{{ $order->width}}" readonly>
                                            <a class="mt-2 px-2">x</a>
                                            <input class="form-control" type="text" value="{{ $order->height }}" readonly>
                                            <a class="mt-2 px-2">cm.</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="row px-2 mt-3">
                                    <div class="col-4">
                                        <p class="mb-1">COD<a class="text-muted px-2">??????????????????????????????????????????????????????</a></p>
                                        <input class="form-control" type="text" value="{{$order->order_cod}}" readonly>
                                    </div>
                                    <div class="col">
                                        <p class="mb-1">????????????????????????</p>
                                        <input class="form-control" type="text" value="{{$order->note_detail}}" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex">
                                    <input type="checkbox" class="mt-1" id="accept" disabled checked>
                                    <p class="px-1">???????????????????????????????????????????????????????????????????????????????????????<br>
                                        <a href="#" class="" style="color: blue;"><u>???????????????????????????????????????????????????????????????????????????</u></a>
                                    </p>
                                </div>
                                <div class="jumps-prevent" style="padding-top: 20px;"></div>
                                <div class="d-flex">
                                    <input type="checkbox" class="mt-1" disabled @if($order->is_return_insurance) checked @endif>
                                    <p class="px-1">??????????????????????????????????????????????????????<br>
                                        <a class="text-muted">??????????????????????????????????????????????????????
                                            ?????????????????????????????????????????????????????????????????????<br>??????????????????????????????????????????????????????????????????????????????????????? <br>
                                            <a href="#" class="" style="color: blue;"><u>????????????????????????????????????????????????????????????????????????????????????????????????</u></a>
                                            <a class="text-muted">????????????</a></a>
                                    </p>
                                </div>
                                <div class="jumps-prevent" style="padding-top: 20px;"></div>
                                <div class="d-flex">
                                    <input type="checkbox" class="mt-1" disabled @if($order->is_protect_insurance) checked @endif>
                                    <p class="px-1">?????????????????????????????????????????????????????????</p>
                                </div>
                                <div class="jumps-prevent" style="padding-top: 20px;"></div>
                                <div class="d-flex">
                                    <input type="checkbox" class="mt-1" disabled @if($order->is_express_transport) checked @endif>
                                    <p class="px-1">SPEED<br>
                                        <a class="text-muted">???????????????????????????????????????????????????????????????????????????<br>????????????????????????????????????????????????????????????????????????????????????????????????????????????
                                            ??????????????????????????????????????????????????????????????? <br> ??????????????????????????????????????????????????????????????????????????????????????? <br>
                                            <a href="#" class="" style="color: blue;"><u>??????????????????????????????????????????????????????????????????
                                                    SPEED</u></a>
                                            <a class="text-muted">????????????</a></a>
                                    </p>
                                </div>
                                <div class="jumps-prevent" style="padding-top: 20px;"></div>
                                <div class="d-flex">
                                    <input type="checkbox" class="mt-1" disabled @if($order->is_damage_insurance) checked @endif>
                                    <p class="px-1">???????????????????????????????????????????????????????????????????????????????????????<br>
                                        <a class="text-muted">????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????
                                            <br>?????????????????????????????????
                                            ????????????????????????????????????????????????????????????????????????????????????????????????<br> ??????????????????????????????????????????????????????????????????????????????????????? <br>
                                            <a href="#" class="" style="color: blue;"><u>???????????????????????????????????????????????????????????????????????????????????????????????????????????????</u></a>
                                            <a class="text-muted">????????????</a></a>
                                    </p>
                                </div>
                                @if($order->status_text == "??????????????????")
                                <div class="my-4">
                                    <a class="btn btn-link d-flex justify-content-center  " style="color: red;"><u>?????????????????????????????????????????????????????????</u></a>
                                </div>
                                <div>
                                    <h5>????????????????????????????????????????????????????????????</h5>
                                </div>
                                <div class="d-flex mx-4">
                                    <a>{{$order->cancel_reason}}</a>
                                </div>
                                @else
                                <div class="jumps-prevent d-flex justify-content-center" style="padding-top: 100px;">
                                    <a type="button" data-toggle="modal" data-target="#exampleModalCenter" style="color: red;">
                                        <u>????????????????????????????????????</u>
                                    </a>
                                </div>
                                <div class="jumps-prevent" style="padding-top: 25px;"></div>
                                <div class="d-flex justify-content-center">
                                    <a class="btn btn-primary mx-2" id="submit-button" disabled="true" href="{{url('orders/edit/'.$order->id.'')}}" style="color: white;"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-in-down-left" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M9.636 2.5a.5.5 0 0 0-.5-.5H2.5A1.5 1.5 0 0 0 1 3.5v10A1.5 1.5 0 0 0 2.5 15h10a1.5 1.5 0 0 0 1.5-1.5V6.864a.5.5 0 0 0-1 0V13.5a.5.5 0 0 1-.5.5h-10a.5.5 0 0 1-.5-.5v-10a.5.5 0 0 1 .5-.5h6.636a.5.5 0 0 0 .5-.5z" />
                                        <path fill-rule="evenodd" d="M5 10.5a.5.5 0 0 0 .5.5h5a.5.5 0 0 0 0-1H6.707l8.147-8.146a.5.5 0 0 0-.708-.708L6 9.293V5.5a.5.5 0 0 0-1 0v5z" />
                                    </svg> ???????????????</a>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Container closed -->
        </div>
        <!-- main-content closed -->
        @include('layouts.main.modal-courier')

        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <form action="{{url('/api/orders/cancel/'.$order->id.'')}}" method="POST">
                    @csrf
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalCenterTitle">
                                ???????????????????????????????????????????????????????????????????????????????????????
                            </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            ????????????????????????????????????????????????????????????
                            <input class="form-control" type="text" value="" name="cancel_reason" id="cancel_reason">
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-danger">????????????????????????????????????</button>
                            <button type="button" class="btn btn-outline-primary" data-dismiss="modal">?????????????????????????????????</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
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

        <script>
            $('#accept').on('click', function (e) {
                if (this.checked == true) {
                    $('#submit-button').prop('disabled', false);
                } else {
                    $('#submit-button').prop('disabled', true);
                }
            })

        </script>
</body>

</html>
