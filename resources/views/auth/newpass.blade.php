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
        body {
            background-image: url('/assets/img/login/bg-login.png');
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
            font-family: 'Kanit', 'Helvetica', 'Arial', sans-serif;
        }

    </style>

</head>


<body>

    <div class="loader">
        <img src="{{asset("assets/img/loader.gif")}}" alt="Loading..." />
    </div>

    <!-- Page -->
    <div class="page">
        <div>
            <div class="jumps-prevent" style="padding-top: 40px;"></div>
            <div class="d-flex justify-content-center">

                <div class="card" style="width: 1000px; height: 500px;">

                    <div class="row">
                        <div class="col-8">
                            <img src="{{asset('assets/img/login/delivery.png')}}" alt="" style="width: 900px;">
                        </div>
                        <div class="col">
                            <div class="" style="margin-right: 15px;">
                                <div class="d-flex justify-content-center">
                                    <img src="{{asset('assets/img/brand/allderExpress.png')}}" alt="" sizes="w:350px" class="my-" style="padding-top: 45px; padding-bottom: 45px;">
                                </div>

                                <div class="d-flex justify-content-center">
                                    <p>กรุณาตั้งค่ารหัสผ่านใหม่ของท่าน</p>
                                </div>
                                <form action="{{ route('reset.password.post') }}" method="POST">
                                    @csrf
                                    @if (Session::has('errors'))
                                    <div class="alert alert-danger">
                                        @foreach ($errors->all() as $error)
                                        {{ $error }}<br />
                                        @endforeach
                                    </div>
                                    @endif
                                    <div class="d-flex justify-content-center">
                                        <input class="form-control mb-3" type="password" id="password" name="password" required autofocus value="" placeholder="รหัสผ่านใหม่" style="width: 250;">
                                    </div>
                                    <input type="hidden" name="token" value="{{ $token }}">
                                    <input type="hidden" name="email" value="{{ $email }}">


                                    <div class="d-flex justify-content-center">
                                        <input class="form-control" type="password" id="password-confirm" name="password_confirmation" required autofocus value="" placeholder="รหัสผ่านใหม่อีกครั้ง" style="width: 250;">
                                    </div>

                                    <div class="jumps-prevent" style="padding-top: 45px;"></div>
                                    <div class="d-flex justify-content-center">
                                        <button type="submit" class="btn btn-primary" style="color: white; width: 220px;">ยืนยันเปลี่ยนรหัสผ่าน</button>
                                    </div>
                                </form>
                            </div>


                        </div>
                    </div>

                </div>
            </div>
        </div>
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

</body>

</html>
