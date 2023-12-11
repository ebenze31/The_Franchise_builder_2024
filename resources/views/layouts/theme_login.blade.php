<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

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

  <style>
      body {
          background-image: url("{{ asset('theme_user/img/BG/background_home.png') }}"); /* เปลี่ยน 'ชื่อไฟล์รูปภาพ.jpg' เป็นชื่อไฟล์ของรูปภาพที่คุณต้องการใช้ */
          background-size: cover; /* ทำให้รูปภาพเต็มขนาดของหน้าจอ */
          background-position: center; /* จัดตำแหน่งของรูปภาพให้อยู่กลางหน้าจอ */
          background-repeat: no-repeat; /* ป้องกันการทับซ้อนรูปภาพ */
          height: 100vh; /* ทำให้พื้นที่ของหน้าจอมีความสูง 100% */
          margin: 0; /* ลบระยะขอบของหน้าจอ */
          display: flex;
          flex-direction: column;
          justify-content: center;
          align-items: center;
          color: #ffffff; /* สีตัวอักษรที่ต่างออกมาบนรูปภาพ */
      }

      #header{
          position: fixed;
          top: 0;
          text-align: center;
          left: 0;
          right: 0;
          z-index: 99999;
      }

  </style>

</head>

<body class="index-page" data-bs-spy="scroll" data-bs-target="#navmenu">

  <div class="container">
    <div id="header">
        <div class="row text-center align-content-center align-items-center">
            <div class="col d-block d-md-none">
                <img src="{{ url('/img/logo/Favicons.png') }}" style="width: 60%" id="header-text-login">
            </div>

            <div class="col d-none d-lg-block">
                <img src="{{ url('/img/logo/Favicons.png') }}" style="width: 20%" id="header-text-login">
            </div>
        </div>
    </div>

    @yield('content')
    
  <div>

<!-- Scroll Top Button -->
<a href="#" id="scroll-top" class="d-none scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

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