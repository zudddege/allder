<div class="app-sidebar__overlay" data-bs-toggle="sidebar"></div>
<aside class="app-sidebar sidebar-scroll ps">
    <div class="main-sidebar-header active">
        <a class="desktop-logo logo-light active" href="#"><img src="{{asset('assets/img/brand/allderExpress.png')}}" class="main-logo" alt="logo"></a>
        <a class="logo-icon mobile-logo icon-light active" href="#"><img src="{{asset('assets/img/brand/icon.png')}}" class="logo-icon" alt="logo"></a>
    </div>
    <div class="main-sidemenu is-expanded">
        <ul class="side-menu open">
            <li class="slide">
                <a class="side-menu__item" data-bs-toggle="slide" href="{{url('/orders')}}"><span class="side-menu__label">จัดการออเดอร์</span></a>
            </li>
            <li class="slide">
                <a class="side-menu__item" data-bs-toggle="slide" href="{{url('/couriers')}}"><span class="side-menu__label">เรียกคูเรียร์รับพัสดุ</span></a>
            </li>
            <li class="slide">
                <a class="side-menu__item" data-bs-toggle="slide" href="{{url('/problem-orders')}}"><span class="side-menu__label">ระหว่างจัดการพัสดุที่มีปัญหา</span></a>
            </li>
            <li class="slide">
                <a class="side-menu__item" data-bs-toggle="slide" href="{{url('/tracking')}}"><span class="side-menu__label">ตรวจเช็คพัสดุ</span></a>
            </li>
            <li class="slide">
                <a class="side-menu__item" data-bs-toggle="slide" href="{{url('/books')}}"><span class="side-menu__label">สมุดที่อยู่</span></a>
            </li>
            <li class="slide">
                <a class="side-menu__item" data-bs-toggle="slide" href="{{url('/affect-costs')}}"><span class="side-menu__label">กระทบค่าขนส่ง</span></a>
            </li>
            <li class="slide">
                <a class="side-menu__item" data-bs-toggle="slide" href="{{url('/cod')}}"><span class="side-menu__label">เก็บเงินพัสดุปลายทาง</span></a>
            </li>
            <li class="slide">
                <a class="side-menu__item" data-bs-toggle="slide" href="{{url('/pod')}}"><span class="side-menu__label">ตารางรายการ POD</span></a>
            </li>
            @if(Auth::user()->is_admin==1)
            <li class="slide">
                <a class="side-menu__item" data-bs-toggle="slide" href="{{url('/sub-accounts')}}"><span class="side-menu__label">จัดการ Sub-Account</span></a>
            </li>
            @endif
        </ul>
    </div>
</aside>
