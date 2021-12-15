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

		input:checked + .slider {
		  background-color: #2196F3;
		}

		input:focus + .slider {
		  box-shadow: 0 0 1px #2196F3;
		}

		input:checked + .slider:before {
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
	</style>

</head>

<body class="main-body app sidebar-mini">

	<!-- Page -->
	<div class="page">

		<!-- main-sidebar -->
		<div class="app-sidebar__overlay" data-bs-toggle="sidebar"></div>
		<aside class="app-sidebar sidebar-scroll ps" >
			<div class="main-sidebar-header active">
				<a class="desktop-logo logo-light active" href="#"><img src="assets/img/brand/allderExpress.png" class="main-logo" alt="logo"></a>
				<a class="logo-icon mobile-logo icon-light active" href="#"><img src="assets/img/brand/icon.png" class="logo-icon" alt="logo"></a>
			</div>
			<div class="main-sidemenu is-expanded">

				<ul class="side-menu open" >

					<li class="slide">
						<a class="side-menu__item" data-bs-toggle="slide" href="{{url('/order')}}"><span class="side-menu__label">จัดการออเดอร์</span></a>
					</li>
					<li class="slide">
						<a class="side-menu__item" data-bs-toggle="slide" href="{{url('/callcuria')}}"><span class="side-menu__label">เรียกคูเรียร์รับพัสดุ</span></a>
					</li>
					<li class="slide">
						<a class="side-menu__item" data-bs-toggle="slide" href="#"><span class="side-menu__label">ระหว่างจัดการพัสดุที่มีปัญหา</span></a>
					</li>
					<li class="slide">
						<a class="side-menu__item" data-bs-toggle="slide" href="#"><span class="side-menu__label">ตรวจเช็คพัสดุ</span></a>
					</li>
					<li class="slide">
						<a class="side-menu__item" data-bs-toggle="slide" href="#"><span class="side-menu__label">สมุดที่อยู่</span></a>
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
					<li class="slide is-expanded">
						<a class="side-menu__item" data-bs-toggle="slide" href="{{url('/subaccount')}}"><span class="side-menu__label">จัดการ Sub-Account</span></a>
					</li>

				</ul>
			</div>
		<div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; height: 722px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 580px;"></div></div><div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div></div><div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div></div></aside>
		<!-- main-sidebar -->

		<!-- main-content -->
		<div class="main-content app-content">

			<!-- main-header -->
			<div class="main-header sticky side-header nav nav-item" style="margin-bottom: -63px;">
				<div class="d-flex align-items-center">

                    <div class="main-header-left ">
						<div class="app-sidebar__toggle" data-bs-toggle="sidebar">
							<a class="open-toggle" href="#"><i class="header-icon fe fe-align-left"></i></a>
							<a class="close-toggle" href="#"><i class="header-icons fe fe-x"></i></a>
						</div>
					</div>

					<button type="button" class="btn btn-primary mx-2" >เรียกพนักงานเข้ามารับพัสดุ</button>
                    <button type="button" class="btn btn-primary" >ระบุพนักงานเข้ารับพัสดุ</button>

				</div>
			</div>
			<!-- /main-header -->

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
				<div class="row row-sm">
					<div class="col-xl-5">
						<div class="card card-body">
                            <div class="d-flex">
                                <p class="px-2 mt-2">รหัสผู้ใช้งาน</p>
                                <input class="form-control" type="text" value="" style="width: 65%; height: 75%;">
                            </div>
                            <div class="">
                                <div class="">
                                    <p class="my-1">อีเมล</p>
                                    <div class="">
                                        <input class="form-control" type="text" value="" style="width: 65%; height: 75%;">
                                    </div>
                                </div>
                                <div class="my-1">
                                    <p class="my-1">ชื่อผู้ใช้งาน / ชื่อธุรกิจ</p>
                                    <div class="">
                                        <input class="form-control" type="text" value="" style="width: 65%; height: 75%;">
                                    </div>
                                </div>
                                <div class="">
                                    <p class="my-1">เบอร์ติดต่อ</p>
                                    <div class="">
                                        <input class="form-control" type="text" value="" style="width: 65%; height: 75%;">
                                    </div>
                                </div>
                            </div>
						</div>

						<div class="card card-body">
							<p>เงื่อนไขการใช้งาน</p>
							<div class="">
								<p class="my-1">ส่วนลดที่ได้รับ</p>
								<div class="d-flex align-items-center">
									<input class="form-control" type="text" value="" style="width: 50%; height: 75%;">
									<span class="px-1">%</span>
								</div>
							</div>
							<div class="my-2">
								<p class="my-1">COD</p>
								<div class="d-flex align-items-center">
									<input class="form-control" type="text" value="" style="width: 50%; height: 75%;">
									<span class="px-1">%</span>
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
										<input type="checkbox" checked>
										<span class="slider round"></span>
									</label>
								</div>
                            </div>
							<div class="">
								<p class="my-1">ID</p>
								<div class="">
									<input class="form-control" type="text" value="" style="width: 65%; height: 75%;">
								</div>
							</div>
							<div class="my-1">
								<p class="my-1">รหัสผ่าน  <span class="text-muted">(8 - 16 ตัวอักษร)</span></p>
								<div class="d-flex align-items-center">
									<input class="form-control" type="password" value="" style="width: 65%; height: 75%;">
									<button class="btn btn-link"><u>ใช้รหัสผ่านอัตโนมัติ</u></button>
								</div>
							</div>
							<div class="">
								<p class="my-1">รหัสผ่านอีกครั้ง</p>
								<div class="">
									<input class="form-control" type="password" value="" style="width: 65%; height: 75%;">
								</div>
							</div>

							<div class="jumps-prevent" style="padding-top: 150px;"></div>

							<div class="d-flex justify-content-center">
								<button type="button" class="btn btn-outline-danger mx-1" style="width: 125px;">ยกเลิก</button>
								<button type="button" class="btn btn-primary mx-1" style="width: 125px;">เพิ่มผู้ใช้งาน</button>
							</div>

							<div class="jumps-prevent" style="padding-top: 25px;"></div>
						</div>
					</div>
					<!--/div-->
				</div>
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

</body>
</html>
