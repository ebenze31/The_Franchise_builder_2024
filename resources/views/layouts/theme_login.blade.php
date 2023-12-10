<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Home - The Franchise builder 2024</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ url('/img/logo/Favicons.png') }}" rel="icon">
  <link href="{{ url('/img/logo/Favicons.png') }}" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('theme_user/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('theme_user/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('theme_user/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link href="{{ asset('theme_user/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
  <link href="{{ asset('theme_user/vendor/aos/aos.css') }}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('theme_user/css/main.css') }}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Append
  * Updated: Sep 18 2023 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/append-bootstrap-website-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->

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

      #navbar-botttom {
          position: fixed;
          bottom: 0;
          text-align: center;
          left: 0;
          right: 0;
          background: #002440;
          z-index: 99999;
      }

      #header{
          position: fixed;
          top: 0;
          text-align: center;
          left: 0;
          right: 0;
          z-index: 99999;
      }

      .mheebar {
          padding-top: 10px;
      }
      .col-navbar {
          padding-right: 0px;
          padding-left: 0px;
      }

      .text-truncate {
          overflow: hidden;
          text-overflow: ellipsis;
          white-space: nowrap;
          margin-top: 5px;
      }

      p {
          margin-bottom: 0px;
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
  </div>

  <div class="container">
    @yield('content')
  <div>

<!-- Scroll Top Button -->
<a href="#" id="scroll-top" class="d-none scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="{{ asset('theme_user/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('theme_user/vendor/glightbox/js/glightbox.min.js') }}"></script>
<script src="{{ asset('theme_user/vendor/purecounter/purecounter_vanilla.js') }}"></script>
<script src="{{ asset('theme_user/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
<script src="{{ asset('theme_user/vendor/swiper/swiper-bundle.min.js') }}"></script>
<script src="{{ asset('theme_user/vendor/aos/aos.js') }}"></script>
<script src="{{ asset('theme_user/vendor/php-email-form/validate.js') }}"></script>

<!-- Template Main JS File -->
<script src="{{ asset('theme_user/js/main.js') }}"></script>

</body>

</html>