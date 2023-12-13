<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - The Franchise builder 2024</title>

    <!-- Favicons -->
    <link href="{{ url('/img/logo/Favicons.png') }}" rel="icon">
    <link href="{{ url('/img/logo/Favicons.png') }}" rel="apple-touch-icon">

    <!-- loader-->
    <link href="{{ asset('/theme_admin/css/pace.min.css') }}" rel="stylesheet" />
    <script src="{{ asset('/theme_admin/js/pace.min.js') }}"></script>

    <!-- Bootstrap CSS -->
    <link href="{{ asset('/theme_admin/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link href="{{ asset('/theme_admin/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('/theme_admin/css/icons.css') }}" rel="stylesheet">

    <!-- fontawesome icon -->
    <link href="https://kit-pro.fontawesome.com/releases/v6.2.1/css/pro.min.css" rel="stylesheet">

    <!-- font -->
    <link href="https://fonts.googleapis.com/css2?family=Kanit&family=Laila:wght@700&family=Mitr&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Baloo+Bhaijaan+2:wght@600;700;800&family=Prompt:wght@500&display=swap" rel="stylesheet">
</head>

<style>
    body {
        background-image: url("{{ asset('theme_admin/images/BG/background_home.png') }}");
        background-size: cover;
        background-position: center; 
        background-repeat: no-repeat;
        background-attachment: fixed;
        height: 100vh;
        margin: 0;
        color: #ffffff;
    }
</style>

<body>

<div class="container">
    <div class="row">

        <div class="col-12">
            <div class="text-center">
                <div class="col d-block d-md-none">
                    <img src="{{ url('/img/logo/Favicons.png') }}" style="width: 60%" id="header-text-login">
                </div>

                <div class="col d-none d-lg-block d-xl-block d-md-block">
                    <img src="{{ url('/img/logo/Favicons.png') }}" style="width: 20%" id="header-text-login">
                </div>
            </div>
        </div>

        <div class="col-12">
            @yield('content')
        </div>
    </div>
</div>

    
<!-- Bootstrap JS -->
<script src="{{asset('theme_admin/js/bootstrap.bundle.min.js')}}"></script>

<!--plugins-->
<script src="{{asset('theme_admin/js/jquery.min.js')}}"></script>

<!--app JS-->
<link href="{{ asset('/theme_admin/plugins/datatable/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet" />

<!-- <script src="{{asset('theme_admin/js/jquery.min.js')}}"></script> -->
<script src="{{asset('theme_admin/plugins/simplebar/js/simplebar.min.js')}}"></script>
<script src="{{asset('theme_admin/plugins/perfect-scrollbar/js/perfect-scrollbar.js')}}"></script>

<!--app JS-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>

<!--notification js -->
<script src="{{ asset('/theme_admin/plugins/notifications/js/lobibox.min.js') }}"></script>
<script src="{{ asset('/theme_admin/plugins/notifications/js/notifications.min.js') }}"></script>
<script src="{{ asset('/theme_admin/plugins/notifications/js/notification-custom-script.js') }}"></script>
<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"></script>
</body>
</html>
