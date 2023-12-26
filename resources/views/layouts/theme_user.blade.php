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
    
    <!--  OwlCarousel -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">

    <!-- font -->
    <link href="https://fonts.googleapis.com/css2?family=Kanit&family=Laila:wght@700&family=Mitr&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Baloo+Bhaijaan+2:wght@600;700;800&family=Prompt:wght@500&display=swap" rel="stylesheet">
</head>

<style>
    #navbar-botttom {
        position: fixed !important;
        bottom: 0;
        text-align: center;
        left: 0;
        right: 0;
        background: rgb(3,174,209);
        background: linear-gradient(180deg, rgba(3,174,209,1) 0%, rgba(7,101,129,1) 31%, rgba(9,42,67,1) 100%);
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
    .background { 
            position: fixed; 
            height: 100%; 
            width: 100%; 
            background-image: url("{{ asset('theme_admin/images/BG/BG.png') }}");
            background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
        margin: 0;
        border: none;
        z-index: -10;
        } .mheebar a svg{
           width: 33px;
           height: 33px;
           fill: #fff;
        }
</style>

<body>
<div class="background"></div> 
<div class="container ">
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

        <div class="col-12 content-section">
            @yield('content')
        </div>
    </div>
</div>
<br><br><br>
<div id="navbar-botttom" class="mt-5">
                
    <div class="row justify-content-between">
     
        <div class="col text-center text-truncate col-navbar mheebar" onclick="change_menu_bar('rank-team')">
            <a href="{{ url('/ranking_by_team') }}">
                <svg id="navbar-icon-rank-team" fill="none" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 37 37">
                    <path fill="#fff" class="navbar-icon-rank-team" d="m37,29.55s0,.09,0,.13c0,2.04,0,4.09,0,6.13,0,.04,0,.09,0,.13-.02.09-.04.19-.06.27-.04.13-.1.26-.2.36-.03.03-.06.06-.08.09-.1.12-.24.19-.38.25-.02,0-.05,0-.07.01-.02,0-.05,0-.06.02-.01,0-.02.01-.03.02,0,0-.01,0-.02,0-.03,0-.06,0-.09.02-.07.01-.14.01-.21,0-.03-.03-.06-.02-.09-.02,0,0-.01,0-.02.01-.19-.04-.36-.12-.5-.24-.18-.15-.3-.34-.36-.57-.02-.08-.04-.16-.03-.25.03,0,.05-.02.06-.06,0-.04,0-.08,0-.12,0-1.98,0-3.95,0-5.93,0-.04,0-.08,0-.12,0-.04-.03-.05-.06-.06,0-.12,0-.24,0-.36,0-.05,0-.11-.01-.16,0-.04,0-.08,0-.12,0-.14,0-.28,0-.41,0-.06,0-.13-.02-.19,0-.01,0-.03,0-.04,0-.14-.03-.27-.04-.41,0-.06-.02-.13-.03-.19-.02-.08-.04-.16-.06-.25-.03-.13-.08-.24-.15-.35-.02-.03-.04-.07-.07-.09-.1-.12-.22-.21-.37-.26-.01,0-.03-.01-.04-.02-.01-.02-.04-.03-.06-.02,0,0-.02,0-.03,0-.02-.02-.04-.03-.06-.02,0,0-.02,0-.03,0-.02-.03-.06-.03-.09-.03-.02,0-.04,0-.06,0-.02-.03-.06-.03-.09-.02,0,0-.02,0-.02,0-.02,0-.04,0-.06-.01-.02-.02-.04-.03-.06-.02-.02,0-.04,0-.06,0,0,0-.02,0-.02,0-.03,0-.06,0-.09-.01-.01-.01-.03-.02-.05-.02-.03,0-.07,0-.1,0,0,0-.02,0-.02,0-.05,0-.1-.01-.15-.02-.02-.02-.04-.02-.06-.02h-.32c-.11,0-.22,0-.33,0,0,0-.02-.02-.03-.02-.98,0-1.96,0-2.94,0-.02,0-.04,0-.06.02-.1,0-.2,0-.3,0-.12,0-.23,0-.35,0-.03,0-.05,0-.07.03-.04,0-.08,0-.12.01-.02,0-.04,0-.05,0-.03,0-.07,0-.1,0-.02,0-.04,0-.05.02-.03,0-.06.01-.09.02,0,0-.02,0-.03,0-.02,0-.04,0-.06,0-.02,0-.05,0-.06.02-.02,0-.04.01-.06.02,0,0-.02,0-.02,0-.03,0-.07,0-.09.02-.01,0-.02,0-.03.01,0,0-.02,0-.02,0-.02,0-.05,0-.06.02-.06.02-.12.04-.18.06-.08.02-.15.06-.22.1-.17.1-.29.25-.37.43-.04.11-.08.22-.1.34-.02.1-.04.19-.05.29,0,.03,0,.07,0,.1,0,.05,0,.1-.02.15,0,0,0,.02,0,.03,0,.15-.03.31-.03.46,0,.3,0,.6,0,.91,0,.06,0,.13-.01.19,0,.05,0,.1,0,.15,0,.54,0,1.08,0,1.62,0,1.38,0,2.76,0,4.13,0,.06,0,.12,0,.18-.72,0-1.43,0-2.15,0-.02,0-.04,0-.06,0-.01-.02-.02-.03-.02-.05,0-.05,0-.1,0-.15,0-5.19,0-10.38,0-15.57,0-.5,0-.99,0-1.49,0-.04,0-.08,0-.12.02,0,.05,0,.05-.04,0-.03,0-.04-.05-.05,0-.06,0-.12-.02-.18-.01-.05,0-.1,0-.15,0-.1,0-.21-.03-.31,0,0,0-.02,0-.03,0-.12-.02-.24-.04-.35-.03-.19-.07-.37-.15-.54-.03-.08-.08-.15-.14-.21-.11-.13-.24-.21-.4-.27-.14-.05-.28-.08-.43-.11-.09-.02-.19-.02-.28-.04-.09-.02-.19-.02-.28-.02-.01,0-.03,0-.04,0-.14-.03-.28-.02-.41-.02-.03-.03-.06-.03-.1-.03-.28,0-.56,0-.84,0-.02,0-.05,0-.07,0-.06,0-.12,0-.18,0-1.61,0-3.22,0-4.84,0-.05,0-.11,0-.16,0-.05,0-.11,0-.16,0-.2,0-.41,0-.61,0-.07,0-.14,0-.22,0-.02,0-.04,0-.05.02-.06,0-.12,0-.18,0-.08,0-.15,0-.23,0-.02,0-.05,0-.07.02-.04,0-.08,0-.12,0-.04,0-.07,0-.11,0-.02,0-.05,0-.06.02-.03,0-.06,0-.09,0-.02,0-.04,0-.06,0-.02,0-.05,0-.06.02-.02,0-.04,0-.06,0-.02,0-.04,0-.06.02-.02,0-.04,0-.06,0-.03,0-.06,0-.09.02-.01,0-.02,0-.03,0-.02,0-.04,0-.06.02-.01,0-.02,0-.03,0-.02,0-.04,0-.06.02-.05.02-.1.04-.15.07,0,0-.02.02-.03.02-.02.01-.04.02-.06.04,0,0-.02.02-.03.02-.17.14-.26.33-.32.54-.04.14-.07.29-.09.44-.02.14-.05.28-.04.43,0,.02,0,.04,0,.06-.03.15-.02.3-.03.44,0,.08,0,.17,0,.25,0,.05,0,.1-.01.15,0,.05,0,.1,0,.15,0,.3,0,.6,0,.91,0,5.26,0,10.52,0,15.78,0,.07,0,.14,0,.21-.71,0-1.42,0-2.12,0-.03,0-.07,0-.1,0,0-.02,0-.04,0-.06,0-.19,0-.38,0-.57,0-.04,0-.09,0-.13,0-.31,0-.62,0-.94,0-.07,0-.14-.02-.21,0-.03,0-.07,0-.1,0-.08,0-.17,0-.25,0-.03,0-.07,0-.1-.01-.05-.01-.1-.02-.15,0-.05,0-.11-.02-.16-.01-.08-.02-.17-.04-.25-.03-.15-.06-.29-.12-.43-.04-.1-.09-.18-.17-.26-.1-.11-.22-.2-.37-.25-.04-.01-.08-.03-.12-.05-.02-.02-.04-.03-.06-.02-.02,0-.04,0-.06,0-.02-.02-.04-.02-.06-.02,0,0-.02,0-.02,0-.02,0-.04-.01-.07-.02-.02-.02-.04-.02-.06-.02-.02,0-.03,0-.05,0-.02,0-.04-.01-.07-.02-.03-.03-.06-.02-.09-.02h-.05s-.06,0-.1,0c-.01-.01-.03-.02-.05-.02-.03,0-.07,0-.1,0-.03,0-.05,0-.08,0-.05,0-.1-.01-.15-.02-.01,0-.02-.02-.03-.02-.13,0-.26,0-.38,0,0-.03-.02-.05-.05-.05-.02,0-.05,0-.07,0-.03,0-.05.02-.05.06-.14,0-.28,0-.42,0-.01-.01-.03-.02-.05-.02-.03,0-.07,0-.1,0-.64,0-1.28,0-1.92,0-.03,0-.07,0-.1,0-.02,0-.04.01-.05.02-.13,0-.25,0-.38,0-.05,0-.11,0-.16,0-.05,0-.09,0-.14,0-.09,0-.17,0-.26,0-.02,0-.05,0-.07.02-.05,0-.1.01-.15.02-.03,0-.05,0-.08,0-.03,0-.07,0-.1,0-.02,0-.04,0-.05.02-.03,0-.06.01-.09.02-.02,0-.03,0-.05,0-.03,0-.07,0-.09.02-.02,0-.04.01-.06.02-.02,0-.03,0-.05,0-.02,0-.05,0-.06.02-.02,0-.04.01-.06.02,0,0-.01,0-.02,0-.02,0-.05,0-.06.02-.01,0-.02.01-.03.02-.02,0-.03,0-.03.02-.18.03-.34.1-.47.22-.03.03-.06.06-.09.09-.05.05-.08.1-.11.16-.04.09-.07.17-.1.26-.04.15-.08.3-.09.45-.04.12-.01.26-.05.38,0,.08,0,.17,0,.25,0,.08,0,.16-.02.24,0,.02,0,.05,0,.07,0,.31,0,.61,0,.92,0,.01,0,.03,0,.04,0,.05,0,.1,0,.15,0,.23,0,.46,0,.69-.01.1-.03.21-.06.31-.04.16-.12.29-.23.41-.02.03-.05.05-.07.07-.11.12-.24.19-.39.24-.02,0-.04,0-.06,0-.02,0-.05,0-.06.02-.01,0-.02.01-.03.02,0,0-.02,0-.02,0-.03,0-.07,0-.09.02-.07.01-.14.01-.21,0-.02-.02-.04-.02-.06-.02-.02,0-.04,0-.06,0-.02,0-.04,0-.06,0-.01-.02-.04-.02-.06-.02-.01,0-.02,0-.03,0-.01-.02-.03-.02-.06-.02-.04,0-.07-.02-.1-.03-.28-.16-.47-.39-.56-.7-.03-.09-.03-.18-.03-.28,0-.29,0-.58,0-.88,0-.2,0-.41,0-.61,0-.04,0-.08,0-.12,0-.03,0-.06,0-.09,0-.1,0-.2.02-.3.01-.09,0-.18,0-.27,0-.09,0-.19.02-.28,0-.02,0-.05,0-.07,0-.07,0-.15.02-.22,0,0,0-.02,0-.03,0-.15.04-.29.06-.44.02-.11.04-.21.06-.32.06-.24.14-.47.24-.7.11-.24.24-.47.41-.67.1-.12.2-.25.32-.34.06-.04.11-.1.17-.15.01,0,.02,0,.02-.02.03-.02.06-.05.1-.07.01,0,.02,0,.02-.02.17-.12.36-.21.54-.3.02,0,.02,0,.03-.02.04,0,.08-.03.12-.04.01,0,.02,0,.03-.02.04,0,.08-.03.12-.04.02,0,.04,0,.06-.02.01,0,.02,0,.03,0,.02,0,.04,0,.06-.02.01,0,.02,0,.03,0,.03,0,.06,0,.09-.03.01,0,.02,0,.03,0,.02,0,.04,0,.06-.02.02,0,.04,0,.06,0,.03,0,.06,0,.09-.02.01,0,.02,0,.03,0,.04,0,.08,0,.12-.03.01,0,.02,0,.03,0,.04,0,.08,0,.12-.02.02,0,.04,0,.06,0,.03,0,.06,0,.08,0,.02,0,.05,0,.06-.03.03,0,.06,0,.09,0,.04,0,.07,0,.11,0,.02,0,.05,0,.06-.02.03,0,.06,0,.09,0,.07,0,.14,0,.21,0,.02,0,.03-.01.05-.02.05,0,.1,0,.15,0,.04,0,.08,0,.12,0,.12,0,.24,0,.35,0,.03,0,.05,0,.07-.02.03,0,.06,0,.09,0,.16,0,.32,0,.48,0,.04,0,.08,0,.12,0,.67,0,1.33,0,2,0,.04,0,.08,0,.12,0,.17,0,.34,0,.51,0,.02,0,.04,0,.06,0,.02,0,.04.02.05.02.16,0,.32,0,.48,0,.07,0,.14,0,.21,0,.02.02.04.02.07.02.05,0,.09,0,.14,0,.05,0,.1,0,.15,0,.03.03.08.03.12.02.04,0,.08,0,.12,0,.03.03.08.03.12.02.03,0,.06,0,.09,0,.03.03.06.03.09.02.02,0,.04,0,.06,0,.02.03.06.03.09.02.02,0,.04,0,.06,0,.02.03.06.03.09.03,0,0,.02,0,.03,0,.02.02.03.03.06.02.02,0,.04,0,.06,0,.02.02.04.03.06.02.01,0,.02,0,.03,0,.01.02.03.03.06.02.01,0,.02,0,.03,0,.02.03.06.03.09.04t.06,0s0-.1,0-.15c0-3.47,0-6.94,0-10.41,0-.04,0-.09,0-.13,0-.12,0-.24,0-.36,0-.05,0-.11.01-.16,0-.04,0-.08,0-.12,0-.11,0-.22,0-.33,0-.09,0-.18.02-.27.01-.05,0-.11,0-.16,0-.08,0-.17.02-.25,0,0,0-.02,0-.03,0-.12.02-.25.04-.37.02-.13.04-.25.07-.38.04-.2.1-.39.17-.59.12-.33.28-.64.5-.92.08-.1.17-.21.27-.3.22-.2.44-.38.71-.51.19-.1.39-.18.6-.25.04-.01.08-.03.13-.04.02,0,.05,0,.06-.02,0,0,.02,0,.03,0,.03,0,.07,0,.09-.03.02,0,.04,0,.06,0,.02,0,.04,0,.05,0,.01,0,.02-.01.03-.02.02,0,.04-.01.06-.02.02,0,.04,0,.05,0l.03-.02s.04-.01.06-.02c.03,0,.05,0,.08,0,.01,0,.02-.01.03-.02.03,0,.06-.01.09-.02.03,0,.05,0,.08,0,.01,0,.02-.01.03-.02.04,0,.08-.01.12-.02.04,0,.08,0,.11,0,.02,0,.04,0,.06-.02.04,0,.08-.01.12-.02.08,0,.15,0,.23,0,.03,0,.06,0,.09-.02.07,0,.14-.01.21-.02.11,0,.21,0,.32,0,.11,0,.23,0,.34,0,.11,0,.23,0,.34,0,.03,0,.05,0,.07-.02.05,0,.11,0,.16,0,1.65,0,3.29,0,4.94,0,.05,0,.11,0,.16,0,.02,0,.04.02.05.02.22,0,.44,0,.67,0,.11,0,.21,0,.32,0,.08,0,.16.01.24.02.02.02.04.02.06.02.08,0,.15,0,.23,0,.04,0,.08.01.12.02.02.02.04.02.06.02.05,0,.09,0,.14,0,.03,0,.06.01.09.02.01,0,.02.01.03.02.04,0,.07,0,.11,0,.03,0,.06,0,.09,0,.03.03.08.03.12.02.02,0,.04,0,.06,0,.02.03.06.03.09.02.02,0,.04,0,.06,0,.02.03.06.03.09.02.01,0,.02.01.03.02.01,0,.02.01.03.02.02,0,.04,0,.05,0,.05.01.1.04.15.04.02.02.04.03.06.02.01,0,.02,0,.03,0,.01.02.03.03.06.02.01,0,.02,0,.03,0,.01.02.03.03.06.02.12.05.24.1.35.15.22.1.42.23.6.38.09.07.17.16.26.25.15.15.28.31.39.49.08.12.15.25.21.38.07.14.12.29.17.44.04.13.07.27.1.4.04.18.08.37.09.56.03.1.03.2.03.29,0,.02,0,.04,0,.06.03.1.02.2.02.3-.01,0-.03,0-.04.01-.01,0-.01.03,0,.03.01,0,.02,0,.04.01,0,.01,0,.03,0,.04.04.22.02.45.02.67-.03,0-.05.02-.05.06,0,.06,0,.13,0,.19,0,.04.03.05.06.05,0,.06,0,.12,0,.18,0,1.65,0,3.3,0,4.95,0,.08,0,.16.01.24,0,.03,0,.07,0,.1,0,.06,0,.13,0,.19t.03,0s.02,0,.03,0c.02,0,.04,0,.06-.02.01,0,.02,0,.03,0,.02,0,.04,0,.06-.02.01,0,.02,0,.03,0,.02,0,.05,0,.06-.02.02,0,.04,0,.06,0,.02,0,.04,0,.06-.02,0,0,.02,0,.03,0,.03,0,.07,0,.09-.03.02,0,.04,0,.06,0,.02,0,.04,0,.05,0,.01,0,.02-.01.03-.02.02,0,.04-.01.06-.02.03,0,.05,0,.08,0,.01,0,.02-.01.03-.02.02,0,.04-.01.06-.02.03,0,.05,0,.08,0,.01,0,.02-.01.03-.02.02,0,.04-.01.06-.02.05,0,.09,0,.14,0,.01,0,.02-.01.03-.02.04,0,.08-.01.12-.02.06,0,.11,0,.17,0,.01,0,.02-.01.03-.02.05,0,.1-.01.15-.02.11,0,.21,0,.32,0,.03,0,.06,0,.09-.02.06,0,.12,0,.19,0,.06,0,.12,0,.17,0,.08,0,.16,0,.24,0,0,.03.02.05.05.05.03,0,.07,0,.1,0,.03,0,.05-.02.05-.05.04,0,.09,0,.13,0,.65,0,1.29,0,1.94,0,.04,0,.09,0,.13,0,0,.03.02.05.05.05.04,0,.09,0,.13,0,.03,0,.05-.02.06-.05.07,0,.14,0,.21,0,.12,0,.24,0,.36,0,.02.02.04.02.07.02.11,0,.21,0,.32,0,0,0,.02,0,.03,0,.05,0,.1.01.15.02.02.02.04.02.06.02.05,0,.09,0,.14,0,.04,0,.08.01.13.02.02.02.04.02.06.02.04,0,.08,0,.11,0,.02,0,.04.01.06.02.02.02.04.02.06.02.02,0,.04,0,.05,0,.03,0,.06.01.1.02.01,0,.02.01.03.02.03,0,.06,0,.08,0,.01,0,.02,0,.03.01.01,0,.02.01.03.02.03,0,.06,0,.08,0,.01,0,.02.01.03.02,0,0,.02.01.03.02.02,0,.04,0,.05,0,.01,0,.02.01.03.02.01,0,.02.01.03.02.03,0,.06,0,.09.01,0,0,.02.01.03.02.02,0,.04,0,.06,0,.2.06.39.14.58.23.17.09.33.19.49.31.18.14.34.3.49.47.1.11.18.23.25.35.15.24.26.49.35.75.07.23.13.47.17.71.01.09.03.18.05.26,0,0,0,.02,0,.03,0,.15.03.29.04.44,0,.05,0,.1.01.15.01.05.01.11.01.16,0,.02,0,.04,0,.06,0,.16,0,.32,0,.48.03.17.02.34.02.51,0,0,0,0,0,.01Z"/>
                    <path fill="#fff" class="navbar-icon-rank-team" d="m21.17,12.66s-.08-.01-.13-.02c-.02-.02-.04-.02-.06-.02-.02,0-.03,0-.05,0-.02,0-.04-.01-.07-.02-.02-.02-.04-.02-.06-.02,0,0-.02,0-.02,0-.03,0-.06,0-.09-.01,0-.01-.02-.02-.03-.02-.02,0-.04,0-.06-.01-.01-.02-.03-.03-.06-.02-.1-.03-.2-.07-.3-.1,0-.01-.01-.02-.02-.02-.16-.07-.32-.13-.48-.2-.11-.05-.22-.09-.32-.14-.18-.08-.37-.17-.55-.26-.09-.04-.19-.08-.28-.13,0,0-.02,0-.03,0,0-.01-.02-.02-.03-.02-.02,0-.04,0-.06,0-.09.04-.18.08-.27.12-.22.1-.44.2-.66.3-.18.08-.37.16-.56.24-.09.04-.18.07-.28.11-.01,0-.02,0-.03.02-.02,0-.04.01-.06.02-.01,0-.02,0-.02.01-.02,0-.04,0-.07.01-.01,0-.02,0-.02.01-.02,0-.04,0-.06.01-.01,0-.02,0-.03.02-.02,0-.04,0-.06,0-.02,0-.04,0-.06.02-.02,0-.04,0-.06,0-.02,0-.03,0-.05,0-.01,0-.02.01-.04.02-.02,0-.04.01-.06.02-.02,0-.03,0-.05,0-.02,0-.05,0-.06.02-.04,0-.08.01-.13.02-.1,0-.19,0-.29,0-.03,0-.06-.01-.09-.02-.02-.02-.04-.02-.07-.02-.02,0-.03,0-.05,0-.03,0-.06,0-.09-.01,0-.01-.01-.02-.03-.02-.18-.05-.34-.13-.5-.22-.08-.05-.16-.12-.23-.18-.26-.24-.43-.54-.52-.89-.03-.12-.06-.25-.06-.38-.05-.28-.02-.56-.02-.85,0-.06.02-.13.02-.19,0-.06,0-.13,0-.19.02-.1.02-.21.03-.31,0-.02,0-.05,0-.07,0-.04.01-.09.01-.13,0-.08,0-.16.02-.24,0-.02,0-.05,0-.07,0-.08,0-.17.02-.25,0-.04,0-.08,0-.12,0-.05,0-.11.02-.16,0-.03,0-.06-.02-.08-.08-.09-.16-.19-.24-.28-.09-.11-.18-.21-.27-.32-.08-.09-.15-.18-.23-.27-.21-.25-.42-.5-.61-.77-.1-.14-.18-.28-.26-.43-.11-.21-.18-.43-.22-.66,0-.01,0-.03,0-.04,0-.16-.01-.32,0-.48.01-.13.05-.26.1-.39.07-.18.16-.34.28-.49.16-.19.35-.35.57-.47.2-.11.41-.2.63-.27.03-.01.07-.02.1-.03.02,0,.04,0,.06-.02.01,0,.02,0,.03,0,.02,0,.05,0,.06-.02.02,0,.04,0,.06,0,.02,0,.04,0,.06-.02.03,0,.06,0,.08,0,.01,0,.02-.01.03-.02.01,0,.02-.01.03-.02.02,0,.04,0,.05,0,.01,0,.02-.01.03-.02.01,0,.02-.01.03-.02.02,0,.04,0,.05,0,.01,0,.02-.01.03-.02.01,0,.02-.01.03-.02.02,0,.04,0,.06,0,0,0,.02-.01.03-.02.02,0,.04-.01.07-.02.02,0,.04,0,.06-.02.02,0,.04,0,.06,0,.02,0,.03,0,.05,0,.01,0,.02-.01.03-.02.01,0,.02-.01.03-.02.02,0,.04,0,.06,0,0,0,.02-.01.03-.02.01,0,.02-.01.03-.02.03,0,.05,0,.08,0,.01,0,.02-.01.03-.02.01,0,.02-.01.03-.02.02,0,.04,0,.05,0,.01,0,.02-.01.03-.02.01,0,.02-.01.03-.02.02,0,.04,0,.06,0,0,0,.02-.01.03-.02.01,0,.02-.01.03-.02.03,0,.05,0,.08,0,.01,0,.02-.01.03-.02.01,0,.02-.01.03-.02.02,0,.04,0,.05,0,.01,0,.02-.01.03-.02.01,0,.02-.01.03-.02.02,0,.05,0,.06-.03.05-.04.08-.1.11-.16.13-.23.26-.47.39-.7.1-.17.2-.34.29-.52.14-.25.3-.49.48-.71.06-.07.12-.15.19-.21.21-.2.44-.38.72-.48.02,0,.04-.02.05-.03.02,0,.04,0,.06-.02.03,0,.06,0,.08,0,.01,0,.02-.01.03-.02.02,0,.04-.01.07-.02.03,0,.05,0,.08,0,.01,0,.02-.01.03-.02.12-.02.24-.02.36,0,.02.02.04.02.06.02.03,0,.06,0,.08,0,.01,0,.02,0,.03.01.01,0,.02.01.03.02.02,0,.03,0,.05,0,.1.03.2.06.29.11.19.1.37.21.52.36.15.15.29.31.41.49.16.22.3.45.43.69.11.19.22.39.33.58.06.11.12.23.19.34.04.08.09.15.13.23.03.05.07.07.12.07,0,0,0,0,.01,0,.02.03.06.03.09.03.01,0,.02.01.03.02.01,0,.02.01.03.02.02,0,.04,0,.05,0,.01,0,.02.01.03.02.01,0,.02.01.03.02.02,0,.03,0,.05,0,.02,0,.04,0,.06,0,.02.03.06.03.09.03.01,0,.02.01.03.02.01,0,.02.01.03.02.02,0,.04,0,.05,0,.01,0,.02.01.03.02.01,0,.02.01.03.02.03,0,.05,0,.08,0,.01,0,.02.01.03.02,0,0,.02.01.03.02.02,0,.04,0,.06,0,.01,0,.02.01.03.02.01,0,.02.01.03.02.02,0,.04,0,.05,0,.02,0,.04,0,.06,0,.02.02.04.03.06.02.02,0,.04,0,.06,0,.02.03.06.03.09.03,0,0,.02,0,.03,0,.02.02.03.03.06.02.02,0,.04,0,.06,0,.02.02.04.03.06.02.02,0,.04,0,.06,0,.02.02.04.03.06.02.01,0,.02.01.03.02.01,0,.02.01.03.02.03,0,.06.01.09.02.03,0,.06.01.09.02.02.02.04.03.06.02.19.07.38.14.56.24.2.11.38.23.53.4.24.26.39.55.46.9.03.17.03.34.02.5,0,.11-.03.23-.07.33-.06.19-.14.38-.24.56-.13.23-.29.45-.46.66-.11.13-.22.27-.33.4-.07.08-.13.16-.2.24-.1.12-.2.24-.31.36-.08.09-.15.18-.23.27-.02.03-.04.06-.03.09,0,.03,0,.07,0,.1.02.07.02.15.02.22,0,.05,0,.1.02.15,0,0,0,.02,0,.03,0,.13.03.26.03.38,0,.08,0,.16.02.24,0,.03,0,.06,0,.09,0,.07,0,.14.02.21,0,.03,0,.07,0,.1,0,.08,0,.16,0,.24,0,.03,0,.06,0,.09.03.15.01.31.02.46,0,.03,0,.06,0,.09,0,.03-.01.06-.01.09,0,.2-.05.39-.11.58-.07.23-.18.44-.34.62-.21.26-.47.43-.79.54-.01,0-.02,0-.03.02-.02,0-.04,0-.06.01,0,0-.01,0-.02,0-.02,0-.05,0-.06.02-.01,0-.02,0-.03.01-.02,0-.03,0-.05,0-.02,0-.05,0-.06.02-.03,0-.06.01-.09.02-.1,0-.19,0-.29,0Zm.74-7.33s-.02,0-.02,0c-.01,0-.02-.01-.03-.02-.02-.02-.04-.02-.06-.02,0,0-.01,0-.02,0-.03,0-.06,0-.09-.01-.02-.02-.03-.03-.06-.02-.01,0-.02,0-.03-.01-.02-.02-.04-.02-.06-.02,0,0-.02,0-.02,0l-.03-.02s-.04-.02-.06-.02c0,0-.01,0-.02.01-.03,0-.06,0-.09-.01-.01-.02-.03-.03-.06-.02-.01,0-.02-.01-.03-.02-.02-.02-.04-.02-.06-.02,0,0-.02,0-.02,0-.01,0-.02-.01-.03-.02-.02-.02-.04-.03-.06-.02,0,0-.01,0-.02.01-.03,0-.06,0-.09-.01-.01-.02-.03-.03-.06-.02-.01,0-.02-.01-.03-.02-.02-.02-.04-.02-.06-.02,0,0-.02,0-.02,0-.01,0-.02-.01-.03-.02-.02-.02-.04-.02-.06-.02-.02,0-.05,0-.07-.01-.09-.02-.17-.05-.25-.09-.21-.09-.39-.21-.56-.36-.1-.09-.18-.2-.26-.31-.14-.2-.25-.42-.38-.64-.06-.11-.12-.23-.19-.34-.11-.19-.22-.39-.33-.58-.03-.05-.05-.09-.09-.13-.02,0-.03.02-.04.04-.08.12-.15.25-.22.37-.12.22-.24.43-.36.65-.08.15-.17.29-.25.44-.12.21-.27.39-.45.55-.05.05-.11.1-.17.14-.13.09-.27.16-.42.21-.07.02-.14.05-.21.07-.01,0-.02,0-.03.02-.02,0-.04,0-.06,0-.02,0-.04,0-.06.02-.03,0-.06,0-.09.01,0,0-.01,0-.02-.01-.03,0-.05,0-.06.02-.01,0-.02.01-.03.02,0,0-.01,0-.02,0-.02,0-.05,0-.06.02-.01,0-.02,0-.03.01-.02,0-.04,0-.06.02-.03,0-.06,0-.09.01,0,0-.01,0-.02,0-.02,0-.05,0-.06.02-.01,0-.02.01-.03.02,0,0-.01,0-.02,0-.02,0-.05,0-.06.02-.01,0-.02,0-.03.01-.02,0-.04,0-.06.02-.03,0-.06,0-.09.01,0,0-.01,0-.02,0-.02,0-.05,0-.06.02-.01,0-.02.01-.03.01,0,0-.02,0-.02,0-.02,0-.05,0-.06.02h-.03s-.04.02-.06.04c-.03,0-.06,0-.09.01-.01,0-.02,0-.03.02-.03,0-.06,0-.09.01-.01,0-.02,0-.03.02-.03,0-.06,0-.09.01-.01,0-.02,0-.03.02-.03,0-.06,0-.09.01,0,0-.01.02-.01.02,0,0,0,.02.01.03.11.14.23.28.34.41.07.08.14.17.21.25.09.1.17.2.26.31.05.06.1.12.15.18.1.11.19.22.28.34.19.25.32.52.38.83.02.09.03.19.04.28,0,.13.01.26-.02.38,0,.01,0,.03,0,.04,0,.12,0,.24-.03.35,0,0,0,.02,0,.03,0,.07,0,.15-.02.22,0,.14-.02.29-.04.43,0,.03,0,.06,0,.09-.02.09-.02.19-.02.28,0,.07,0,.14-.02.21,0,.03,0,.06,0,.09,0,.02.02.03.04.03.02,0,.03-.02.05-.03.09-.02.16-.06.24-.09.02,0,.04,0,.05-.02.07-.03.14-.06.22-.1,0,0,.01,0,.02-.01.12-.06.25-.11.37-.17,0,0,.01,0,.02-.01.12-.06.24-.12.37-.17.02,0,.04,0,.05-.02.05-.03.1-.05.16-.07.02,0,.04,0,.05-.02.04-.02.08-.04.12-.05.03,0,.06-.01.09-.02,0,0,.02-.01.03-.02h.07s.04-.01.05-.03c.03,0,.06,0,.09-.01.03,0,.06,0,.09-.02.15-.02.3-.02.45,0,.02.02.06.02.08.02h.06s.05.03.08.03c.01,0,.02,0,.04,0,.01.02.03.02.06.02.02,0,.04,0,.07.01,0,0,.01.01.02.02l.07.02s.01,0,.02.01c.05,0,.09.03.13.05,0,0,.01,0,.02.01.07.03.15.05.22.1.01.02.03.02.05.02.11.05.23.09.34.15.01.02.03.02.05.02.12.05.25.11.37.16.11.05.23.1.34.15.03.01.07.02.1.03.01,0,.03-.01.03-.02,0-.12,0-.25-.01-.37,0-.05-.01-.11-.02-.16,0-.03,0-.07,0-.1-.02-.1-.02-.2-.03-.3,0-.03,0-.06,0-.09-.01-.05-.02-.11-.02-.16,0-.06,0-.12-.02-.18,0-.02,0-.05,0-.07,0-.09,0-.19-.03-.28,0-.02,0-.05,0-.07,0-.09,0-.19,0-.28,0-.1,0-.21.03-.31.05-.28.16-.54.32-.77.12-.18.27-.34.41-.51.08-.1.17-.19.25-.29.14-.17.28-.33.42-.5.07-.09.15-.17.2-.27.03-.04.03-.05-.02-.06,0,0,0,0-.01,0h0s-.04-.04-.06-.03c-.03,0-.06,0-.08,0-.01-.02-.03-.03-.06-.02-.02,0-.04,0-.06,0-.01-.02-.03-.03-.06-.02-.01,0-.02-.01-.03-.02-.02-.02-.04-.02-.06-.02Z"/>
                    </svg>
                    <path  d="M1 36C1 33.5238 1 32.2865 1.77 31.52C2.53825 30.75 3.7755 30.75 6.25 30.75C8.72625 30.75 9.9635 30.75 10.73 31.52C11.5 32.2883 11.5 33.5255 11.5 36V20.25C11.5 17.7738 11.5 16.5365 12.27 15.77C13.0382 15 14.2755 15 16.75 15H20.25C22.7262 15 23.9635 15 24.73 15.77C25.5 16.5382 25.5 17.7755 25.5 20.25V36V30.75C25.5 28.2738 25.5 27.0365 26.27 26.27C27.0383 25.5 28.2755 25.5 30.75 25.5C33.2262 25.5 34.4635 25.5 35.23 26.27C36 27.0383 36 28.2755 36 30.75V36" stroke="#F8F8F8" stroke-width="1.5" stroke-linecap="round"/>
                    <path d="M17.0055 2.79025C17.6705 1.595 18.003 1 18.5 1C18.997 1 19.3295 1.595 19.9945 2.79025L20.166 3.09825C20.355 3.43775 20.4495 3.60575 20.5965 3.71775C20.7453 3.82975 20.929 3.87175 21.2965 3.954L21.629 4.031C22.9205 4.32325 23.5663 4.4685 23.7203 4.962C23.8743 5.45725 23.4333 5.97175 22.553 7.00075L22.3255 7.26675C22.0753 7.559 21.9493 7.70425 21.8933 7.88625C21.8373 8.06825 21.8565 8.2625 21.8933 8.65275L21.9283 9.008C22.0613 10.3818 22.1278 11.0695 21.727 11.374C21.3245 11.6802 20.719 11.4002 19.5098 10.8438L19.1983 10.7003C18.8535 10.5428 18.682 10.4623 18.5 10.4623C18.318 10.4623 18.1465 10.5428 17.8018 10.7003L17.4903 10.8438C16.281 11.4002 15.6755 11.6802 15.273 11.374C14.8705 11.0695 14.9388 10.3818 15.0718 9.008L15.1068 8.65275C15.1435 8.2625 15.1628 8.06825 15.1068 7.88625C15.0508 7.706 14.9248 7.559 14.6745 7.26675L14.447 7.00075C13.5668 5.97175 13.1258 5.45725 13.2798 4.962C13.4338 4.4685 14.0795 4.32325 15.371 4.031L15.7035 3.954C16.071 3.87175 16.2548 3.8315 16.4035 3.71775C16.5505 3.60575 16.645 3.43775 16.834 3.09825L17.0055 2.79025Z" stroke="#F8F8F8" stroke-width="1.5"/>
                </svg>
                <p id="navbar-text-rank-team" class="text-truncate" style="font-size: 10px; text-overflow: unset; color: #fff; filter: none;">
                    Rank of team
                </p>
            </a>
        </div>
  
        <div class="col text-center text-truncate col-navbar mheebar" onclick="change_menu_bar('rank-individual')">
            <a href="{{ url('/ranking_by_individual') }}">
                <svg width="35" height="35" viewBox="0 0 35 35" fill="#000" xmlns="http://www.w3.org/2000/svg">
                <path class="navbar-icon-rank-individual" d="M17.5 14C19.3565 14 21.137 13.2625 22.4497 11.9497C23.7625 10.637 24.5 8.85652 24.5 7C24.5 5.14348 23.7625 3.36301 22.4497 2.05025C21.137 0.737498 19.3565 0 17.5 0C15.6435 0 13.863 0.737498 12.5503 2.05025C11.2375 3.36301 10.5 5.14348 10.5 7C10.5 8.85652 11.2375 10.637 12.5503 11.9497C13.863 13.2625 15.6435 14 17.5 14ZM6.125 19.25C7.28532 19.25 8.39812 18.7891 9.21859 17.9686C10.0391 17.1481 10.5 16.0353 10.5 14.875C10.5 13.7147 10.0391 12.6019 9.21859 11.7814C8.39812 10.9609 7.28532 10.5 6.125 10.5C4.96468 10.5 3.85188 10.9609 3.03141 11.7814C2.21094 12.6019 1.75 13.7147 1.75 14.875C1.75 16.0353 2.21094 17.1481 3.03141 17.9686C3.85188 18.7891 4.96468 19.25 6.125 19.25ZM33.25 14.875C33.25 16.0353 32.7891 17.1481 31.9686 17.9686C31.1481 18.7891 30.0353 19.25 28.875 19.25C27.7147 19.25 26.6019 18.7891 25.7814 17.9686C24.9609 17.1481 24.5 16.0353 24.5 14.875C24.5 13.7147 24.9609 12.6019 25.7814 11.7814C26.6019 10.9609 27.7147 10.5 28.875 10.5C30.0353 10.5 31.1481 10.9609 31.9686 11.7814C32.7891 12.6019 33.25 13.7147 33.25 14.875ZM17.5 15.75C19.8206 15.75 22.0462 16.6719 23.6872 18.3128C25.3281 19.9538 26.25 22.1794 26.25 24.5V35H8.75V24.5C8.75 22.1794 9.67187 19.9538 11.3128 18.3128C12.9538 16.6719 15.1794 15.75 17.5 15.75ZM5.25 24.5C5.25 23.2873 5.425 22.1165 5.754 21.0105L5.4565 21.035C3.95654 21.1997 2.57016 21.9123 1.56321 23.0361C0.556258 24.16 -0.000391578 25.616 2.06671e-07 27.125V35H5.25V24.5ZM35 35V27.125C35.0002 25.5646 34.4049 24.063 33.3355 22.9267C32.2662 21.7904 30.8035 21.105 29.246 21.0105C29.5732 22.1165 29.75 23.2873 29.75 24.5V35H35Z" fill="#F8F8F8"/>
                </svg>
                <p id="navbar-text-rank-individual" class="text-truncate" style="font-size: 10px; text-overflow: unset; color: rgb(255, 255, 255); filter: none;">
                Rank of individual
                </p>
            </a>
        </div>

        <div class="col text-center text-truncate col-navbar mheebar" onclick="change_menu_bar('scan')">
            <a href="{{ url('/scanner') }}">
            <svg width="35" height="35" viewBox="0 0 35 35" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path class="navbar-icon-scan" d="M0 1.09375C0 0.803669 0.115234 0.52547 0.320352 0.320352C0.52547 0.115234 0.803669 0 1.09375 0L7.65625 0C7.94633 0 8.22453 0.115234 8.42965 0.320352C8.63477 0.52547 8.75 0.803669 8.75 1.09375C8.75 1.38383 8.63477 1.66203 8.42965 1.86715C8.22453 2.07227 7.94633 2.1875 7.65625 2.1875H2.1875V7.65625C2.1875 7.94633 2.07227 8.22453 1.86715 8.42965C1.66203 8.63477 1.38383 8.75 1.09375 8.75C0.803669 8.75 0.52547 8.63477 0.320352 8.42965C0.115234 8.22453 0 7.94633 0 7.65625V1.09375ZM26.25 1.09375C26.25 0.803669 26.3652 0.52547 26.5704 0.320352C26.7755 0.115234 27.0537 0 27.3438 0L33.9062 0C34.1963 0 34.4745 0.115234 34.6796 0.320352C34.8848 0.52547 35 0.803669 35 1.09375V7.65625C35 7.94633 34.8848 8.22453 34.6796 8.42965C34.4745 8.63477 34.1963 8.75 33.9062 8.75C33.6162 8.75 33.338 8.63477 33.1329 8.42965C32.9277 8.22453 32.8125 7.94633 32.8125 7.65625V2.1875H27.3438C27.0537 2.1875 26.7755 2.07227 26.5704 1.86715C26.3652 1.66203 26.25 1.38383 26.25 1.09375ZM1.09375 26.25C1.38383 26.25 1.66203 26.3652 1.86715 26.5704C2.07227 26.7755 2.1875 27.0537 2.1875 27.3438V32.8125H7.65625C7.94633 32.8125 8.22453 32.9277 8.42965 33.1329C8.63477 33.338 8.75 33.6162 8.75 33.9062C8.75 34.1963 8.63477 34.4745 8.42965 34.6796C8.22453 34.8848 7.94633 35 7.65625 35H1.09375C0.803669 35 0.52547 34.8848 0.320352 34.6796C0.115234 34.4745 0 34.1963 0 33.9062V27.3438C0 27.0537 0.115234 26.7755 0.320352 26.5704C0.52547 26.3652 0.803669 26.25 1.09375 26.25ZM33.9062 26.25C34.1963 26.25 34.4745 26.3652 34.6796 26.5704C34.8848 26.7755 35 27.0537 35 27.3438V33.9062C35 34.1963 34.8848 34.4745 34.6796 34.6796C34.4745 34.8848 34.1963 35 33.9062 35H27.3438C27.0537 35 26.7755 34.8848 26.5704 34.6796C26.3652 34.4745 26.25 34.1963 26.25 33.9062C26.25 33.6162 26.3652 33.338 26.5704 33.1329C26.7755 32.9277 27.0537 32.8125 27.3438 32.8125H32.8125V27.3438C32.8125 27.0537 32.9277 26.7755 33.1329 26.5704C33.338 26.3652 33.6162 26.25 33.9062 26.25ZM8.75 8.75H10.9375V10.9375H8.75V8.75Z" fill="#F8F8F8"/>
                <path class="navbar-icon-scan" d="M15.3125 4.375H4.375V15.3125H15.3125V4.375ZM6.5625 6.5625H13.125V13.125H6.5625V6.5625ZM10.9375 24.0625H8.75V26.25H10.9375V24.0625Z" fill="#F8F8F8"/>
                <path class="navbar-icon-scan" d="M15.3125 19.6875H4.375V30.625H15.3125V19.6875ZM6.5625 21.875H13.125V28.4375H6.5625V21.875ZM24.0625 8.75H26.25V10.9375H24.0625V8.75Z" fill="#F8F8F8"/>
                <path class="navbar-icon-scan" d="M19.6875 4.375H30.625V15.3125H19.6875V4.375ZM21.875 6.5625V13.125H28.4375V6.5625H21.875ZM17.5 17.5V21.875H19.6875V24.0625H17.5V26.25H21.875V21.875H24.0625V26.25H26.25V24.0625H30.625V21.875H24.0625V17.5H17.5ZM21.875 21.875H19.6875V19.6875H21.875V21.875ZM30.625 26.25H28.4375V28.4375H24.0625V30.625H30.625V26.25ZM21.875 30.625V28.4375H17.5V30.625H21.875Z" fill="#F8F8F8"/>
                <path class="navbar-icon-scan" d="M26.25 19.6875H30.625V17.5H26.25V19.6875Z" fill="#F8F8F8"/>
            </svg>

            <p id="navbar-text-scan" class="text-truncate" style="font-size: 10px; text-overflow: unset; color: rgb(255, 255, 255); filter: none;">
            QR code
            </p>
            </a>
        </div>

        <div class="col text-center text-truncate col-navbar mheebar" onclick="change_menu_bar('news')">
            <a href="{{ url('/news/index') }}">
            <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 36.52 37">
                <path class="navbar-icon-news cls-1" d="m11.67,1.85c8.78,0,21.41,0,22.1,0,.03,0,.11.02.2.06.08.03.2.1.31.2.11.1.19.22.25.38.09.23.14.51.14.85v30.58c0,.12-.03.21-.1.28-.04.04-.1.07-.14.07,0,0-.03,0-.08-.03l-1.82-1.17c-.63-.4-1.35-.62-2.09-.62-.32,0-.64.04-.96.12-.32.08-.62.2-.91.36l-3.99,2.2s-.05.02-.08.02-.05,0-.08-.02l-4.03-2.22h0s0,0,0,0c-.29-.16-.59-.28-.91-.36-.31-.08-.63-.12-.96-.12-.7,0-1.38.19-1.98.55h0s0,0,0,0l-3.57,2.13s-.06.02-.08.02c-.03,0-.05,0-.08-.02l-3.96-2.18c-.29-.16-.59-.28-.91-.36-.31-.08-.63-.12-.96-.12-.74,0-1.45.21-2.08.61l-2.75,1.75s-.08.03-.08.03c-.04,0-.1-.03-.14-.07-.07-.07-.1-.16-.1-.28V3.76c0-.42.06-.78.17-1.08.04-.11.1-.21.16-.3.05-.08.11-.14.17-.2.12-.11.25-.19.41-.25.14-.05.3-.08.44-.08.4,0,3.25,0,8.47,0m22.09,0s0,0,0,0c0,0,0,0,0,0M11.67,0C7.17,0,3.65,0,3.2,0,1.83,0,0,.98,0,3.76v30.73c0,1.28,1,2.2,2.09,2.2.36,0,.73-.1,1.08-.32l2.75-1.75c.33-.21.71-.32,1.08-.32.33,0,.67.08.97.25l3.96,2.18c.3.17.64.25.97.25.36,0,.71-.1,1.03-.29l3.57-2.13c.32-.19.68-.29,1.03-.29.33,0,.67.08.97.25l4.03,2.22c.3.17.64.25.97.25s.67-.08.97-.25l3.99-2.2c.3-.17.64-.25.97-.25.38,0,.76.11,1.09.32l1.82,1.17c.35.22.72.33,1.09.33,1.09,0,2.09-.91,2.09-2.2V3.34C36.52.69,34.55,0,33.78,0h0S20.73,0,11.67,0h0Z"/>
                <path class="navbar-icon-news cls-1" d="m15.65,24.51H6.26c-.2,0-.4-.04-.58-.12-.17-.08-.33-.19-.46-.33-.13-.14-.23-.29-.3-.47-.07-.18-.11-.37-.11-.56v-12.06c0-.19.04-.38.11-.56.07-.17.17-.33.3-.47.13-.14.29-.25.46-.33.18-.08.38-.12.58-.12h9.39c.2,0,.4.04.58.12.17.08.33.19.46.33.13.14.23.29.3.47.07.18.11.37.11.56v12.06c0,.19-.04.38-.11.56-.07.17-.17.33-.3.47-.13.14-.29.25-.46.33-.18.08-.38.12-.58.12Zm-8.99-1.85h8.58v-11.31H6.66v11.31Z"/>
                <g>
                    <path class="navbar-icon-news cls-1" d="m20.87,12.07h9.39c.58,0,1.04.49,1.04,1.1h0c0,.61-.47,1.1-1.04,1.1h-9.39c-.58,0-1.04-.49-1.04-1.1h0c0-.61.47-1.1,1.04-1.1Z"/>
                    <path class="navbar-icon-news cls-1" d="m30.26,12.06h-9.39c-.58,0-1.04.49-1.04,1.1s.47,1.1,1.04,1.1h9.39c.58,0,1.04-.49,1.04-1.1s-.47-1.1-1.04-1.1h0Z"/>
                </g>
                <g>
                    <path class="navbar-icon-news cls-1" d="m20.87,19.74h9.39c.58,0,1.04.49,1.04,1.1h0c0,.61-.47,1.1-1.04,1.1h-9.39c-.58,0-1.04-.49-1.04-1.1h0c0-.61.47-1.1,1.04-1.1Z"/>
                    <path class="navbar-icon-news cls-1" d="m30.26,19.74h-9.39c-.58,0-1.04.49-1.04,1.1s.47,1.1,1.04,1.1h9.39c.58,0,1.04-.49,1.04-1.1s-.47-1.1-1.04-1.1h0Z"/>
                </g>
            </svg>
            <p id="navbar-text-news" class="text-truncate" style="font-size: 10px; text-overflow: unset; color: rgb(255, 255, 255); filter: none;">
            News
            </p>
            </a>
        </div>

        <div class="col text-center text-truncate col-navbar mheebar" onclick="change_menu_bar('profile')">
            <a href="{{ url('/profile') }}">
            <svg width="35" height="35" viewBox="0 0 35 35" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path class="navbar-icon-profile" d="M24.5 14C24.5 15.8565 23.7625 17.637 22.4497 18.9497C21.137 20.2625 19.3565 21 17.5 21C15.6435 21 13.863 20.2625 12.5503 18.9497C11.2375 17.637 10.5 15.8565 10.5 14C10.5 12.1435 11.2375 10.363 12.5503 9.05025C13.863 7.7375 15.6435 7 17.5 7C19.3565 7 21.137 7.7375 22.4497 9.05025C23.7625 10.363 24.5 12.1435 24.5 14Z" fill="#F8F8F8"/>
            <path class="navbar-icon-profile" fill-rule="evenodd" clip-rule="evenodd" d="M16.786 34.986C7.45238 34.6115 0 26.9255 0 17.5C0 7.83475 7.83475 0 17.5 0C27.1652 0 35 7.83475 35 17.5C35 27.1653 27.1652 35 17.5 35C17.4201 35.0005 17.3402 35.0005 17.2603 35C17.1019 35 16.9435 34.9948 16.786 34.986ZM6.27025 28.5425C6.13941 28.1668 6.09487 27.7664 6.13995 27.371C6.18502 26.9757 6.31856 26.5956 6.53063 26.259C6.74271 25.9223 7.02788 25.6378 7.36498 25.4264C7.70209 25.2151 8.08246 25.0824 8.47787 25.0381C15.2994 24.283 19.7426 24.3513 26.5309 25.0539C26.9268 25.0951 27.3081 25.2262 27.6458 25.437C27.9834 25.6479 28.2685 25.933 28.4793 26.2707C28.6901 26.6084 28.821 26.9898 28.8621 27.3857C28.9033 27.7817 28.8535 28.1818 28.7166 28.5556C31.6259 25.612 33.2552 21.6387 33.25 17.5C33.25 8.80163 26.1984 1.75 17.5 1.75C8.80163 1.75 1.75 8.80163 1.75 17.5C1.75 21.8015 3.47463 25.7005 6.27025 28.5425Z" fill="#F8F8F8"/>
            </svg>
            <p id="navbar-text-profile" class="text-truncate" style="font-size: 10px; text-overflow: unset; color: rgb(255, 255, 255); filter: none;">
                Profile
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
    // change_menu_bar('rank');
  });

  function change_menu_bar(menu){
    // console.log(menu);

    let navbarText = document.querySelector('#navbar-text-'+menu);
    let navbarIcons = document.querySelectorAll('.navbar-icon-'+menu);

        // navbarText.style.filter = 'drop-shadow(0px 0px 5px #FFF)';
        // navbarText.style.border = '1px solid #00E0FF';
        navbarText.style.filter = 'drop-shadow(0px 0px 5px #00E0FF)';
        navbarText.style.color = '#00E0FF';
        navbarIcons.forEach(function(navbarIcon) {
            navbarIcon.style.fill = '#00E0FF'; // Cyan color
            navbarIcon.style.filter = 'drop-shadow(0rem 0rem 2rem #00E0FF)W';

        });
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

<!-- OwlCarousel -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>


</body>
</html>
