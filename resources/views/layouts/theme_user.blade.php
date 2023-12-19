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

    #navbar-botttom {
        position: fixed;
        bottom: 0;
        text-align: center;
        left: 0;
        right: 0;
        background: #002440;
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

    p{
        margin-bottom: 0px;
    }

</style>

<body>

<div class="container">
    <div class="row">

        <div class="col">
            <button type="button" class="btn btn-sm btn-outline-light radius-10 mt-2" onclick="goBack();">
                <span class="mx-2"><i class="fa-solid fa-chevron-left"></i>Back</span>
            </button>
        </div>

        <div class="col-12">
            <div class="text-center">
                <div class="col d-block d-md-none">
                    <img src="{{ url('/img/logo/Favicons.png') }}" style="width: 60%" id="header-text-login">
                </div>

                <div class="col d-none d-lg-block">
                    <img src="{{ url('/img/logo/Favicons.png') }}" style="width: 20%" id="header-text-login">
                </div>
            </div>
        </div>

        <div class="col-12">
            @yield('content')
        </div>
    </div>
</div>

<br><br><br><br>
<div id="navbar-botttom">
                
    <div class="row justify-content-between" style="margin-bottom:10px;">
     
        <div class="col text-center text-truncate col-navbar mheebar" onclick="change_menu_bar('rank')">
            <a href="/">
                <img src="{{ asset('theme_admin/images/icons/bottom_bar_rank.svg') }}" id="navbar-icon-rank" style="width: 30px; color: rgb(0, 224, 255); filter: none;">
                <p id="navbar-text-rank" class="text-truncate" style="font-size: 10px; text-overflow: unset; color: rgb(0, 224, 255); filter: none;">
                    Ranking
                </p>
            </a>
        </div>
  
        <div class="col text-center text-truncate col-navbar mheebar" onclick="change_menu_bar('news')">
            <a href="/news">
                <img src="{{ asset('theme_admin/images/icons/bottom_bar_news.svg') }}" id="navbar-icon-news" style="width: 33px; color: rgb(0, 224, 255); filter: none;">
                <p id="navbar-text-news" class="text-truncate" style="font-size: 10px; text-overflow: unset; color: rgb(0, 224, 255); filter: none;">
                    News
                </p>
            </a>
        </div>

        <div class="col text-center text-truncate col-navbar mheebar" onclick="change_menu_bar('scan')">
            <a href="/qrcode">
            <img src="{{ asset('theme_admin/images/icons/bottom_bar_scan.svg') }}" id="navbar-icon-scan" style="width: 32px; color: rgb(0, 224, 255); filter: none;">
            <p id="navbar-text-scan" class="text-truncate" style="font-size: 10px; text-overflow: unset; color: rgb(0, 224, 255); filter: none;">
                Scan QR code 
            </p>
            </a>
        </div>

        <div class="col text-center text-truncate col-navbar mheebar" onclick="change_menu_bar('activities')">
            <a href="/activities">
            <img src="{{ asset('theme_admin/images/icons/bottom_activities.svg') }}" id="navbar-icon-activities" style="width: 30px; color: rgb(0, 224, 255); filter: none;">
            <p id="navbar-text-activities" class="text-truncate" style="font-size: 10px; text-overflow: unset; color: rgb(0, 224, 255); filter: none;">
                Activities
            </p>
            </a>
        </div>

        <div class="col text-center text-truncate col-navbar mheebar" onclick="change_menu_bar('profile')">
            <a href="/profile">
            <img src="{{ asset('theme_admin/images/icons/bottom_bar_profile.svg') }}" id="navbar-icon-profile" style="width: 30px; color: rgb(0, 224, 255); filter: none;">
            <p id="navbar-text-profile" class="text-truncate" style="font-size: 10px; text-overflow: unset; color: rgb(0, 224, 255); filter: none;">
                My Profile
            </p>
            </a>
        </div>

    </div>

  </div>

<script>
  
  var menu_rank = document.querySelector('#navbar-text-rank');
  var menu_news = document.querySelector('#navbar-text-news');
  var menu_qrcode = document.querySelector('#navbar-text-qrcode');
  var menu_activities = document.querySelector('#navbar-text-activities');
  var menu_profile = document.querySelector('#navbar-text-profile');

  document.addEventListener('DOMContentLoaded', (event) => {
    // console.log("START");
    change_menu_bar('rank');
  });

  function change_menu_bar(menu){
    // console.log(menu);

    document.querySelector('#navbar-text-'+menu).style.color = '#00E0FF' ;
    document.querySelector('#navbar-text-'+menu).style.filter = 'filter","drop-shadow(0px 0px 5px #00FBFF)' ;

  }

</script>

<script>
    function goBack() {
        window.history.back();
    }
</script>

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
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>  

</body>
</html>
