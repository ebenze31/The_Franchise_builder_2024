<!doctype html>
<html lang="en" class="color-sidebar sidebarcolor1">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Favicons -->
    <link href="{{ url('/img/logo/ALV.DE-78cd6600.png') }}" rel="icon">
    <link href="{{ url('/img/logo/ALV.DE-78cd6600.png') }}" rel="apple-touch-icon">

	<!--plugins-->
	<link rel="stylesheet" href="{{ asset('/theme_admin/plugins/notifications/css/lobibox.min.css') }}" />

	<link href="{{ asset('/theme_admin/plugins/simplebar/css/simplebar.css') }}">
	<link href="{{ asset('/theme_admin/plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet" />
	<link href="{{ asset('/theme_admin/plugins/highcharts/css/highcharts.css') }}" rel="stylesheet" />
	<link href="{{ asset('/theme_admin/plugins/metismenu/css/metisMenu.min.css') }}" rel="stylesheet" />
	<link href="{{ asset('/theme_admin/plugins/vectormap/jquery-jvectormap-2.0.2.css') }}" rel="stylesheet" />
	<!-- loader-->
	<link href="{{ asset('/theme_admin/css/pace.min.css') }}" rel="stylesheet" />
	<script src="{{ asset('/theme_admin/js/pace.min.js') }}"></script>
	<!-- Bootstrap CSS -->
	<link href="{{ asset('/theme_admin/css/bootstrap.min.css') }}" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
	<link href="{{ asset('/theme_admin/css/app.css') }}" rel="stylesheet">
	<link href="{{ asset('/theme_admin/css/icons.css') }}" rel="stylesheet">
	<!-- Theme Style CSS -->
	<link rel="stylesheet" href="{{ asset('/theme_admin/css/dark-theme.css') }}" />
	<link rel="stylesheet" href="{{ asset('/theme_admin/css/semi-dark.css') }}" />
	<link rel="stylesheet" href="{{ asset('/theme_admin/css/header-colors.css') }}" />
    <!-- fontawesome icon -->
	<link href="https://kit-pro.fontawesome.com/releases/v6.2.1/css/pro.min.css" rel="stylesheet">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

    <!-- font -->
    <link href="https://fonts.googleapis.com/css2?family=Kanit&family=Laila:wght@700&family=Mitr&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Baloo+Bhaijaan+2:wght@600;700;800&family=Prompt:wght@500&display=swap" rel="stylesheet">

    <title>Admin - The Franchise builder 2024</title>

</head>

<style>
    *:not(i) {
		font-family: 'Prompt', sans-serif !important;
	}

    .bg-menu-bar{
        background: linear-gradient(to right, #011644 , #0455AC , #0467CE , #94daff)!important;
    }
</style>

@php
    // PASSWORD FOR LOG MENU
    $pass_lock = "superadmin";
@endphp

<body>

    <!-- Button trigger modal -->
    <button type="button" id="btn_modal_pass_lock" class="d-none" data-toggle="modal" data-target="#modal_pass_lock"></button>
    <!-- Modal -->
    <div class="modal fade" id="modal_pass_lock" tabindex="-1" aria-labelledby="Labelmodal_pass_lock" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header" style="position: relative;">
            <h5 class="modal-title" id="Labelmodal_pass_lock">กรุณาใส่รหัสผ่าน</h5>
            <button type="button" class="close btn float-end" data-dismiss="modal" aria-label="Close" style="position: absolute;top: 10%;right: 0%;">
                <i class="fa-sharp fa-solid fa-circle-xmark fa-2xl"></i>
            </button>
          </div>
          <div class="modal-body">
            <img src="{{ url('/img/icon/locked.png') }}" class="d-none" style="width:50px;">
            <input type="password" id="input_pass_lock_menu" class="form-control">
            <a id="link_go_to" class="d-none"></a>
          </div>
          <div class="modal-footer">
            <button id="cf_pass_lock" type="button" class="btn btn-primary">ยืนยัน</button>
          </div>
        </div>
      </div>
    </div>

    <div class="wrapper">

        <div class="sidebar-wrapper" data-simplebar="true">
            <div class="has-arrow">
                <div class="sidebar-header toggle-icon">
                    <img id="img_logo_sidebar" src="{{ url('/img/logo/ALV.DE-78cd6600.svg') }}" class="d-none" style="width:50px;">
                    <!-- <h6 style="font-size: 20px;" class="logo-text">The Franchise builder 2024</h6> -->

                    <div class="text-center mt-3 logo-text">
                        <img src="{{ url('/img/logo/Allianz.svg') }}" style="width:55%;">
                        <p class="mt-1" style="margin-left: 5px;color: #fff;font-size: 12px;">The Franchise builder 2024</p>
                    </div>

                    <div class="ms-auto">
                        <i id="icon_hide_sidebar" class="fa-solid fa-angle-left text-white"></i>
                    </div>
                </div>
            </div>
            <ul class="metismenu" id="menu">

                <li class="d-none">
                    <a href="{{ url('/groups') }}" class="">
                        <div class="parent-icon">
                            <i class="fa-solid fa-chart-user"></i>
                        </div>
                        <div class="menu-title">
                            Dashboard
                        </div>
                    </a>
                </li>

                <li>
                    <a href="javascript:;" class="has-arrow">
                        <div class="parent-icon">
                            <i class="fa-duotone fa-users"></i>
                        </div>
                        <div class="menu-title">
                            สมาชิก
                        </div>
                    </a>
                    
                    <ul>
                        <li>
                            <a class="btn" onclick="pass_lock_menu('{{ url("/add_account") }}');">
                                <i class="fa-solid fa-plus"></i> เพิ่มสมาชิก
                            </a>
                        </li>
                        <li>
                            <a class="btn" onclick="pass_lock_menu('{{ url("/delete_account") }}');">
                                <i class="fa-sharp fa-solid fa-delete-right"></i> ลบสมาชิก
                            </a>
                        </li>
                        <li>
                            <a class="btn" href="{{ url('/account_all') }}">
                                <i class="fa-solid fa-address-card"></i> รายชื่อสมาชิกทั้งหมด
                            </a>
                        </li>
                        <li>
                            <a class="btn" href="{{ url('/user_get_shirt') }}">
                                <i class="fa-solid fa-shirt"></i> รับเสื้อแล้ว
                            </a>
                        </li>
                        <li>
                            <a class="btn" href="{{ url('/account_reg_success') }}">
                                <i class="fa-solid fa-user-check"></i> ผู้ร่วมกิจกรรม
                            </a>
                        </li>
                        <li>
                            <a class="btn" href="{{ url('/account_admin') }}">
                                <i class="fa-duotone fa-user-nurse"></i> แอดมินและเจ้าหน้าที่
                            </a>
                        </li>
                        <li>
                            <a class="btn" href="{{ url('/view_cancel_join') }}">
                                <i class="fa-solid fa-ban"></i> ยกเลิกการเข้าร่วม
                            </a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="javascript:;" class="has-arrow">
                        <div class="parent-icon">
                            <i class="fa-solid fa-house-flag"></i>
                        </div>
                        <div class="menu-title">
                            บ้าน
                        </div>
                    </a>
                    
                    <ul>
                        <li>
                            <a class="btn" onclick="pass_lock_menu('{{ url("/add_group") }}');">
                                <i class="fa-solid fa-plus"></i> เพิ่มจำนวนบ้าน
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('/view_group') }}" class="btn">
                                <i class="fa-solid fa-house-building"></i> บ้านทั้งหมด
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:;" class="has-arrow">
                        <div class="parent-icon">
                            <i class="fa-sharp fa-solid fa-hundred-points"></i>
                        </div>
                        <div class="menu-title">
                            คะแนน
                        </div>
                    </a>
                    
                    <ul>
                        <li>
                            <a class="btn" onclick="pass_lock_menu('{{ url("/add_score") }}');">
                                <i class="fa-solid fa-grid-2-plus"></i> เพิ่มคะแนน
                            </a>
                        </li>
                    </ul>
                    <ul>
                        <li>
                            <a class="btn" href="{{ url('/ranking_by_individual') }}" target="bank">
                                <i class="fa-solid fa-person"></i> Individual
                            </a>
                        </li>
                    </ul>
                    <ul>
                        <li>
                            <a class="btn" href="{{ url('/ranking_by_team') }}" target="bank">
                                <i class="fa-solid fa-people-group"></i> Team
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:;" class="has-arrow">
                        <div class="parent-icon">
                            <i class="fa-solid fa-newspaper"></i>
                        </div>
                        <div class="menu-title">
                            News
                        </div>
                    </a>
                    
                    <ul>
                        <li>
                            <a class="btn" href="{{ url('/add_news') }}">
                                <i class="fa-solid fa-plus"></i> เพิ่มข่าวใหม่
                            </a>
                        </li>
                    </ul>
                    <ul>
                        <li>
                            <a class="btn" href="{{ url('/news_admin') }}">
                            <i class="fa-duotone fa-newspaper"></i> ข่าวทั้งหมด
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:;" class="has-arrow">
                        <div class="parent-icon">
                            <i class="fa-solid fa-calendar-lines-pen"></i>
                        </div>
                        <div class="menu-title">
                            Activities
                        </div>
                    </a>
                    
                    <ul>
                        <li>
                            <a class="btn" href="{{ url('/activities/create') }}">
                                <i class="fa-solid fa-plus"></i> เพิ่มกิจกรรมใหม่
                            </a>
                        </li>
                        <li>
                            <a class="btn" href="{{ url('/activities') }}">
                                <i class="fa-solid fa-calendar-days"></i> กิจกรรมทั้งหมด
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="">
                    <a href="{{ url('/contact_staff') }}" class="">
                        <div class="parent-icon">
                            <i class="fa-solid fa-comments-question-check"></i>
                        </div>
                        <div class="menu-title">
                            FAQ
                        </div>
                    </a>
                </li>
                <li class="">
                    <a href="{{ url('/excel_end_mission1') }}" class="">
                        <div class="parent-icon">
                            <i class="fa-sharp fa-solid fa-octagon-exclamation"></i>
                        </div>
                        <div class="menu-title">
                            End Mission 1
                        </div>
                    </a>
                </li>
                <hr>
                <li class="">
                    <a href="{{ url('/groups') }}" class="">
                        <div class="parent-icon">
                            <i class="fa-solid fa-people-group"></i>
                        </div>
                        <div class="menu-title">
                            รวมบ้าน (ผู้ใช้)
                        </div>
                    </a>
                </li>

            </ul>
        </div>

        <header>
            <div class="topbar d-flex align-items-center bg-menu-bar">
                <nav class="navbar navbar-expand">
                    <div class="mobile-toggle-menu">
                        <i class="fa-solid fa-angle-right text-white"></i>
                    </div>
                    <div class="top-menu-left d-none d-lg-block">
                        <ul class="nav">
                            <li class="nav-item">
                                <a class="nav-link" href="{{url('/account_reg_success')}}">
                                    <i class="fa-solid fa-house text-white"></i>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div class="top-menu ms-auto">
                        <ul class="navbar-nav align-items-center">
                            <li class="nav-item mobile-search-icon">
                                <a href="{{ url('/admin/scanner') }}">
                                    <img src="{{ asset('img/icon/scan.png') }}" style="width: 32px;">
                                </a>
                            </li>
                            <li class="nav-item dropdown dropdown-large">
                                <div class="dropdown-menu dropdown-menu-end">
                                    <div class="header-notifications-list">
                                        <!--  -->
                                    </div>
                                </div>
                            </li>
                            <li class="nav-item dropdown dropdown-large">
                                <div class="dropdown-menu dropdown-menu-end">
                                    <div class="header-message-list">
                                        <!--  -->
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>

                    <div class="user-box dropdown">
                        <a class="d-flex align-items-center nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            @if( !empty(Auth::user()->photo) )
                                <img src="{{ url('storage')}}/{{ Auth::user()->photo }}" class="user-img">
                            @else
                                <img src="{{ url('/img/icon/profile.png') }}" class="user-img">
                            @endif
                            <div class="user-info ps-3">
                                <p class="user-name mb-0" style="color: #ffffff!important;">
                                    @if( !empty(Auth::user()->name) )
                                        {{ Auth::user()->name }}
                                    @else
                                        Name User
                                    @endif
                                </p>
                            </div>
                            <div style="margin-left:10px ;">
                            <i class="fa-solid fa-bars text-white"></i>
                            </div>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li>

                                <a class="dropdown-item btn" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                    <i class='bx bx-log-out-circle'></i>
                                    <span>Logout</span>
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </header>

        <div class="page-wrapper">
            <div class="page-content">
                @yield('content')
            </div>
        </div>
    </div>
  
    <!-- Bootstrap JS -->
    <script src="{{asset('theme_admin/js/bootstrap.bundle.min.js')}}"></script>
    <!--plugins-->
    <!-- <script src="{{asset('theme_admin/js/jquery.min.js')}}"></script> -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="{{asset('theme_admin/plugins/simplebar/js/simplebar.min.js')}}"></script>
    <script src="{{asset('theme_admin/plugins/metismenu/js/metisMenu.min.js')}}"></script>
    <script src="{{asset('theme_admin/plugins/perfect-scrollbar/js/perfect-scrollbar.js')}}"></script>
    <!--app JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    <script src="{{asset('theme_admin/js/app.js')}}"></script>
    <!--notification js -->
    <script src="{{ asset('/theme_admin/plugins/notifications/js/lobibox.min.js') }}"></script>
	<script src="{{ asset('/theme_admin/plugins/notifications/js/notifications.min.js') }}"></script>
	<script src="{{ asset('/theme_admin/plugins/notifications/js/notification-custom-script.js') }}"></script>
    
    <link href="{{ asset('/theme_admin/plugins/datatable/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet" />

    <script>
        
        function pass_lock_menu(link){
            document.querySelector('#btn_modal_pass_lock').click();
            // input_pass_lock_menu
            // cf_pass_lock

            document.getElementById("cf_pass_lock").addEventListener("click", function() {
                let input = document.querySelector('#input_pass_lock_menu').value;

                if(input == "{{ $pass_lock }}"){
                    document.querySelector('#link_go_to').setAttribute("href", link);
                    document.querySelector('#link_go_to').click();
                }else{
                    alert("รหัสไม่ถูกต้อง!");
                }
            });

        }

    </script>

</body>

</html>
