<!doctype html>
<html lang="en" class="color-sidebar sidebarcolor1">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Favicons -->
    <link href="{{ url('/img/logo/Favicons.png') }}" rel="icon">
    <link href="{{ url('/img/logo/Favicons.png') }}" rel="apple-touch-icon">

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
</style>

<body>

    <div class="wrapper">

        <div class="sidebar-wrapper" data-simplebar="true">
            <div class="has-arrow">
                <div class="sidebar-header">
                    <img id="img_logo_sidebar" src="{{ url('/img/logo/ALV.DE-78cd6600.svg') }}" class="d-none" style="width:50px;">
                    <!-- <h6 style="font-size: 20px;" class="logo-text">The Franchise builder 2024</h6> -->

                    <div class="text-center mt-3 logo-text">
                        <img src="{{ url('/img/logo/Allianz.svg') }}" style="width:55%;">
                        <p class="mt-1" style="margin-left: 5px;color: #fff;font-size: 12px;">The Franchise builder 2024</p>
                    </div>

                    <div class="toggle-icon ms-auto">
                        <i class='bx bx-first-page'></i>
                    </div>
                </div>
            </div>
            <ul class="metismenu" id="menu">
                <li>
                    <a href="javascript:;" class="has-arrow">
                        <div class="parent-icon">
                            <i class="fa-solid fa-bars"></i>
                        </div>
                        <div class="menu-title">
                            เมนู
                        </div>
                    </a>
                    
                    <ul>
                        <li>
                            <a href="javascript:;">
                                <i class="fa-sharp fa-solid fa-caret-down"></i> 1
                            </a>
                            <ul class="mm-collapse">
								<li>
                                    <a href="javascript:;">
                                        <i class="fa-solid fa-caret-right"></i> 1.1
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                        <i class="fa-solid fa-caret-right"></i> 1.2
                                    </a>
                                </li>
							</ul>
                        </li>
                        <li>
                            <a href="{{ url('/') }}">
                                <i class="fa-solid fa-caret-right"></i> 2
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>

        <header>
            <div class="topbar d-flex align-items-center" style="background-color:#3495c9!important;">
                <nav class="navbar navbar-expand">
                    <div class="mobile-toggle-menu">
                        <i class='bx bx-menu'></i>
                    </div>
                    <div class="top-menu-left d-none d-lg-block">
                        <ul class="nav">
                            <li class="nav-item">
                                <a class="nav-link" href="{{url('/dashboard')}}">
                                    <i class="fa-solid fa-house text-white"></i>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div class="top-menu ms-auto">
                        <ul class="navbar-nav align-items-center">
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
                            <img src="" class="user-img" alt="user avatar">
                            <div class="user-info ps-3">
                                <p class="user-name mb-0" style="color: #ffffff!important;">name</p>
                            </div>
                            <div style="margin-left:10px ;">
                            <i class="fa-solid fa-bars text-white"></i>
                            </div>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li>
                                <a class="dropdown-item btn" href="">
                                    <i class="bx bx-user"></i><span>Profile</span>
                                </a>
                            </li>
                                <div class="dropdown-divider mb-0"></div>
                            </li>
                            <li>
                                <a class="dropdown-item btn">
                                    <i class='bx bx-log-out-circle'></i>
                                    <span>Logout</span>
                                </a>

                                <a id="btn_go_to_logout" href="{ route('logout') }" class="dropdown-item d-none">
                                    Logout
                                </a>

                            <form id="logout-form" action="{ route('logout') }" method="POST" class="d-none">
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

</body>

</html>
