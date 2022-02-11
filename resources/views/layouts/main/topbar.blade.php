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
                <button type="button" class="btn btn-primary mx-2" data-toggle="modal" data-target="#notify-courier-modal">เรียกพนักงานเข้ามารับพัสดุ</button>
                <button type="button" class="btn btn-primary mx-2" data-toggle="modal" data-target="#assign-courier-modal">ระบุพนักงานเข้ารับพัสดุ</button>
            </div>
        </div>
        {{-- dropdown profile --}}
        <div>
            <div class="nav nav-item  navbar-nav-right ml-auto">
                <div class="dropdown main-profile-menu nav nav-item nav-link">
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->account_name }}
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <div>
                                <div class="d-flex justify-content-center my-2">
                                    {{ Auth::user()->close_id }}
                                </div>
                                <div class="d-flex justify-content-center my-2">
                                    ชื่อผู้ใช้งาน / ชื่อธุรกิจ : {{ Auth::user()->account_name }}
                                </div>
                                <div class="d-flex justify-content-center my-2">
                                    อีเมล : {{ Auth::user()->email }}
                                </div>
                                <div class="d-flex justify-content-center my-2">
                                    เบอร์โทร : {{ Auth::user()->tel_no }}
                                </div>
                            </div>
                            @if(Auth::user()->is_admin==0)
                            <div class="row" style="margin: 15px 0px;">
                                {{-- ส่วนลด COD --}}
                                <div class="col-6">
                                    <div>
                                        <div class="d-flex justify-content-center align-items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-tag" viewBox="0 0 16 16">
                                                <path d="M6 4.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm-1 0a.5.5 0 1 0-1 0 .5.5 0 0 0 1 0z" />
                                                <path d="M2 1h4.586a1 1 0 0 1 .707.293l7 7a1 1 0 0 1 0 1.414l-4.586 4.586a1 1 0 0 1-1.414 0l-7-7A1 1 0 0 1 1 6.586V2a1 1 0 0 1 1-1zm0 5.586 7 7L13.586 9l-7-7H2v4.586z" />
                                            </svg>
                                            <span class="mx-1">ส่วนลดที่ได้รับ</span>
                                        </div>
                                        <div class="d-flex justify-content-center">
                                            <p style="color: #0275d8">{{ Auth::user()->discount_rate }}%</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div>
                                        <div class="d-flex justify-content-center align-items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-seam" viewBox="0 0 16 16">
                                                <path d="M8.186 1.113a.5.5 0 0 0-.372 0L1.846 3.5l2.404.961L10.404 2l-2.218-.887zm3.564 1.426L5.596 5 8 5.961 14.154 3.5l-2.404-.961zm3.25 1.7-6.5 2.6v7.922l6.5-2.6V4.24zM7.5 14.762V6.838L1 4.239v7.923l6.5 2.6zM7.443.184a1.5 1.5 0 0 1 1.114 0l7.129 2.852A.5.5 0 0 1 16 3.5v8.662a1 1 0 0 1-.629.928l-7.185 2.874a.5.5 0 0 1-.372 0L.63 13.09a1 1 0 0 1-.63-.928V3.5a.5.5 0 0 1 .314-.464L7.443.184z" />
                                            </svg>
                                            <span class="mx-1">COD</span>
                                        </div>
                                        <div class="d-flex justify-content-center">
                                            <p style="color: #0275d8">{{ Auth::user()->cod_rate }}%</p>
                                        </div>
                                    </div>
                                </div>
                                {{-- ส่วนลด COD --}}
                            </div>
                            @endif
                            <div class="jumps-prevent border-top" style="padding-top: 15px;"></div>
                            {{-- ปุ่ม logout --}}
                            <div class="d-flex justify-content-center">
                                <a type="button" class="btn btn-danger rounded-10 mx-1 my-1" href="{{ route('logout') }}" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();" style="width: 90%; height: 50%;">
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                            {{-- ปุ่ม logout --}}
                            <div class="jumps-prevent" style="padding-top: 15px;"></div>
                        </div>
                    </li>
                </div>
            </div>
        </div>
        {{-- end dropdown profile --}}
    </div>
</div>
