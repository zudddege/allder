<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="Description" content="Bootstrap Responsive Admin Web Dashboard HTML5 Template">
	<meta name="Author" content="Spruko Technologies Private Limited">
	<title>Allder Express</title>
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

    <script>
        window.addEventListener("load", function() {
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

        .loader > img {
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
        background-image: url('./assets/img/login/bg-login.png');
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-size: cover;
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
                            <img src="./assets/img/login/delivery.png" alt="" style="width: 900px;">
                        </div>
                        <div class="col">
                            <div class="" style="margin-right: 15px;">
                                <div class="d-flex justify-content-center">
                                    <img src="./assets/img/brand/allderExpress.png" alt="" sizes="w:350px" class="my-" style="padding-top: 45px; padding-bottom: 50px;">
                                </div>

                                <div class="d-flex justify-content-center" style="padding-right: 10px;">
                                    <img src="./assets/img/login/mail.png" style="width: 90px; height: 90px;">
                                </div>

                                <div class="d-flex flex-column justify-content-center align-items-center my-2" style="line-height: 0.5;">
                                    <p style="font-size: small;">ระบบได้ทำการส่งลิ้งค์เปลี่ยนรหัสไปยังอีเมลของท่านแล้ว</p>
                                    <p style="font-size: small;">โปรดตรวจสอบอีเมลของท่าน</p>
                                    <p style="font-size: small;">เพื่อทำการเปลี่ยนรหัสผ่านใหม่</p>
                                </div>
                                <form action="{{ route('forget.password.post') }}" method="POST">
                                    @csrf
                                    <div class="d-flex flex-column justify-content-center align-items-center">
                                        <button class="btn btn-link" type="submit" style="color: blue;"><u>ไม่ได้รับอีเมล</u></button>
                                        <p class="mt-3">หรือ</p>
                                        <a href="{{ route('login') }}" style="color: blue;"><u>กลับสู่หน้าหลัก</u></a>
                                    </div>
                                </form>
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
