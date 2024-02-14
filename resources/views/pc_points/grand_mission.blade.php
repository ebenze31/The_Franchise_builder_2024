@extends('layouts.theme_user')
@section('content')

<style>
    .content-section {
        padding: 0;
    }

    #header-text-login {
        width: 45% !important;
    }

    .sub-rank {
        margin-top: 50px;
    }

    .sub-rank-img {
        -webkit-border-radius: 50%;    
        border-radius: 50%; 
        -moz-border-radius:50%;
        -khtml-border-radius:50%;
        width: 68px;
        height: 68px;
        aspect-ratio: 1/1;
        border: 2px solid #fff;
    }

    .main-rank-img {
        -webkit-border-radius: 50%;    
        border-radius: 50%; 
        -moz-border-radius:50%;
        -khtml-border-radius:50%;
        width: 85px;
        height: 85px;
        aspect-ratio: 1/1;
        border: 2px solid #fff;
    }

    .number-top-rank {
        color: #fff;
        font-weight: bolder;
        margin-bottom: 8px;
    }

    .number-team {
        margin-top: 10px;
        font-size: 12px;
        color: #fff;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        width:100%;
    }

    .score-team {
        font-size: 12px;
        font-weight: bold;
        color: #FFE500;
    }

    .contentSection {
        width: 100%;
        background: rgb(0, 27, 87);
        background: linear-gradient(360deg, rgba(0, 27, 87, 0) 0%, rgba(0, 27, 87, 1) 100%);
        margin: 0px 0 10px 0;
        -webkit-border-radius: 0px;    
        border-radius: 0px; 
        -moz-border-radius:0px;
        -khtml-border-radius:0px;
        padding: 10px;
        color: #fff;
        z-index: -5;
        overflow: auto;
    }

    .my-team {
        /* padding: 15px 10px 15px 25px; */
        display: flex;
        -webkit-border-radius: 10px;    
        border-radius: 10px; 
        -moz-border-radius:10px;
        -khtml-border-radius:10px;
        background-color: #021B56;
        border: 1px solid #00E0FF;

        z-index: 9999 !important;
        position: relative;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    }

    .other-team {
        /* padding: 15px 10px 15px 25px; */
        display: flex;
        -webkit-border-radius: 10px;    
        border-radius: 10px; 
        -moz-border-radius:10px;
        -khtml-border-radius:10px;
        background-color: rgb(35, 87, 127, 0.3);
        margin-top: 10px;
        z-index: 9999 !important;
        position: relative;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    }

    .profileTeam {
        -webkit-border-radius: 50%;    
        border-radius: 50%; 
        -moz-border-radius:50%;
        -khtml-border-radius:50%;
        width: 50px;
        height: 50px;
        border: #fff 1px solid;
        margin-right: 15px;
    }

    .score-my-team {
        display: flex;
        align-items: center;
    }
    .score-my-team .text-score{
        color: #FFE500;
        font-size: 16px;
        margin: 0 0px 0 0;
    }
    .number-my-team {
/*        margin-right: 15px;*/
        /* width: 20%; */
        display: flex;
        align-items: center;
        /* text-indent: 10px; */
/*        justify-content: center;*/
    }

    .nameTeam {
        font-size: 14px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        width: 25vw;
    }
    @media screen and (max-device-width: 465px){
        .other-team {
            padding: 10px 10px 10px 18px;
        }
        .my-team {
            padding: 10px 10px 10px 18px;
        }.number-my-team {
/*        margin-right: 15px;*/
            width: 85px

        }
    }
    @media screen and (min-device-width: 465px){

        .other-team {
            padding: 10px 10px 10px 25px;
        }
        .my-team {
            padding: 10px 10px 10px 25px;
        }.number-my-team {
/*        margin-right: 15px;*/
            width: 27.5%;
        }
    }
    .menberInTeam {
        /* font-size: 10px; */
        color: #52cbff;
    }

    .detailTeam {
        display: flex;
        align-items: center;
        width: 100%;
    }

    .collapseContent {
        margin-top: -10px;
        z-index: 1 !important;
        background-color: #0c2f66;
        color: #fff;
        position: relative;
        margin-bottom: 20px;
        -webkit-border-radius: 0 0 10px 10px;    
        border-radius: 0 0 10px 10px;
        -moz-border-radius:0 0 10px 10px;
        -khtml-border-radius:0 0 10px 10px;
    }

    .statusTeam {
/*        margin: 0 5px 0 15px;*/
        /* width: 27.5%; */
        width: 120px;

        display: flex;
        align-items: center;
        justify-content: center;
    }

    .statusNumber {
        text-align: center;
        font-size: 12px;
    }

    .rankUP {
        color: #4CAF50;
    }

    .rankDOWN {
        color: #C33A3A;
    }

    .rankNORMAL {
        color: #C3C3C3;

    }

    #dataMyteam {
        -webkit-border-radius: 10px;    
        border-radius: 10px; 
        -moz-border-radius:10px;
        -khtml-border-radius:10px;
        padding: 20px 10px 10px 10px;
    }

    .collapseContent * {
        font-size: 10px;
        color: #fff;
    }

    .head-teble-data-my-team {
        border-bottom: 1px solid #00B2FF;
    }

    .profile-img {
        width: 20px;
        height: 20px;
        -webkit-border-radius: 50%;    
        border-radius: 50%; 
        -moz-border-radius:50%;
        -khtml-border-radius:50%;
    }

    .nameUserteam {
        max-width: 60px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .text-data-team {
        color: #00E0FF;
    }.text-point{
        margin-left: 5px;
    }.nav-menu {
        margin-top: 25px;
        padding: 0 40px;
        /* background-color: rgb(255, 255, 255, 0.5); */
        position: relative;
        z-index: 1;
        display: flex;
        align-items: center;
        position: -webkit-sticky;
        position: sticky;
        background-color: rgb(0, 27, 87);
        -webkit-border-radius:  15px 15px 0 0;    
        border-radius:  15px 15px 0 0; 
        -moz-border-radius: 15px 15px 0 0;
        -khtml-border-radius: 15px 15px 0 0;
    }   


    .content-section {
        padding: 0;
    }

    .owl-prev,
    .owl-carousel__next,
    .owl-carousel__prev {
        position: absolute;
        color: #fff;
        top: 50%;
        transform: translate(-50%, -50%);
        z-index: 9999999;
        width: 20px;
        display: flex;
        justify-content: center;
    }
    .owl-carousel__next{
        right: 10px;
    }.owl-carousel__prev{
        left: 25px;
    }.btn-sort-group{
        color: rgb(255, 255, 255 ,.5);
        padding: 10px 0;
        font-size: 15px;
        height: 100%;
        position: sticky;
    }.btn-sort-group.btn:hover ,.btn-sort-group.btn:active{
        color: rgb(255, 255, 255 ,.5) ;
        box-shadow: none !important;
}
    .btn-sort-group .item{
        display: flex;
        align-items: center;
    }
    
    .btn-sort-group-active{
        color: #fff !important;
        padding: 10px 0;
        font-size: 16px;
        -webkit-border-radius: 0px;    
        border-radius: 0px; 
        -moz-border-radius:0px;
        -khtml-border-radius:0px;
        border-bottom: #00B2FF 1px solid;

    }
    .sticky {
        position: -webkit-sticky;
        position: sticky;
        top: 0;
        z-index: 99999999;
    }.btn-submit {
        border-radius: 5px;
        width: auto;
        font-size: 16px;
        margin-top: 15px;
        padding: 8px 35px;
        background-color: #005CD3;
        color: #fff;
    }

    .btn-submit:hover {
        border: 1px solid #00E0FF;
        box-shadow: 0px 0px 15px 1px #00FBFF;
        
        color: #fff;

    }
    .btn-sort-data{
        /* padding: 6px 20px ; */
        width: 100px;
        background-color: rgb(0, 155, 176 , .61);
        border: 1px solid #00E0FF;
        color: #fff;
        font-weight: bold;
    }

    .btn-sort-data:hover{
        color: #055683;
        border: 1px solid #00E0FF;
        background-color: #00E0FF;
        font-weight: bold;
    }
    .btn-sort-data.active{
        color: #055683;
        border: 1px solid #00E0FF;
        background-color: #00E0FF;
        font-weight: bold;
    }
</style>

<div id="div_data_all"></div>
<div class="w-100 d-flex justify-content-center my-3">
    <div class="btn-group" role="group" aria-label="Basic example">
        <button type="button" class="btn btn-sort-data active">PC</button>
        <button type="button" class="btn btn-sort-data">New code</button>
    </div>
</div>

<div class="d-flex justify-content-center mt-1">
    <div class="container row ">
        <div class="col-4 text-center sub-rank">
            <p class="number-top-rank">No.2</p>
            <img id="img_rank_2" src="{{ url('/img/icon/profile.png') }}" class="sub-rank-img" alt="รูปภาพปก">
            <p id="name_rank_2" class="number-team">Team 1</p>
            <p id="score_rank_2" class="score-team" style="color: #E7C517!important;">800</p>
        </div>
        <div class="col-4 text-center">
            <p class="number-top-rank">No.1</p>
            <img id="img_rank_1" src="{{ url('/img/icon/profile.png') }}" class="main-rank-img" alt="รูปภาพปก">
            <p id="name_rank_1" class="number-team">Team 1</p>
            <p id="score_rank_1" class="score-team" style="color: #E7C517!important;">800</p>
        </div>
        <div class="col-4 text-center sub-rank">
            <p class="number-top-rank">No.3</p>
            <img id="img_rank_3" src="{{ url('/img/icon/profile.png') }}" class="sub-rank-img" alt="รูปภาพปก">
            <p id="name_rank_3" class="number-team">Team 1</p>
            <p id="score_rank_3" class="score-team" style="color: #E7C517!important;">800</p>
        </div>
    </div>
</div>

<a id="click_to_div_data_all" href="#div_data_all" class="d-none"></a>

<div class=" sticky"  >
    <div class="nav-menu" id="div_menu_view">
        <div class="btn-group owl-carousel owl-theme owl-nav-nemu" role="group" aria-label="First group">
      
            <div class="item text-center py-2">
                <button btn="menu_view" type="button" class="btn btn-sort-group-active text-center mt-1"  style="font-size: 12px!important;">
                ลำดับที่ 1 - 100
                </button>
            </div>
            <div class="item text-center py-2">
                <button btn="menu_view"  type="button" class="btn btn-sort-group text-center mt-1"  style="font-size: 12px!important;">
                ลำดับที่ 100 - 200
                </button>
            </div>
            <div class="item text-center py-2">
                <button btn="menu_view"  type="button" class="btn btn-sort-group text-center mt-1"  style="font-size: 12px!important;">
                ลำดับที่ 200 - 300
                </button>
            </div>
            <div class="item text-center py-2">
                <button btn="menu_view"  type="button" class="btn btn-sort-group text-center mt-1"  style="font-size: 12px!important;">
                ลำดับที่ 300 - 100
                </button>
            </div>
            
        </div>
        <div class="owl-carousel__prev"><i class="fa-solid fa-caret-right fa-rotate-180"></i></div>
        <div class="owl-carousel__next"><i class="fa-solid fa-caret-right"></i></div>
    </div>

    <style>
        .text-header-column{
            color: #00E0FF;
            font-size: 14px;
            font-style: normal;
            font-weight: 400;
            line-height: normal;
            background-color: rgb(0, 27, 87);
        }
    </style>
  <div class="text-header-column" style="width: 100%;padding: 10px 10px 10px 12px;display: flex;">
        <div class="text-center number-my-team" style="margin-left: 5px;">No.</div>
        <div style="min-width: 65px !important;max-width: 65px !important;"></div>
        <div class="w-100">Username</div>
        <div  style="min-width: 65px !important;max-width: 65px !important;margin-right: 10px;  ">Mission 1</div>
        <div style="min-width: 65px !important;max-width: 65px !important;">Last week</div>
    </div>
</div>

<div class="contentSection">

    <!-- ของตัวเอง -->
    <div class="mb-2" id="content_ME">
        <div class="my-team">
        <div class="number-my-team">1</div>
            <img src="{{ url('storage')}}/{{Auth::user()->photo}}" class="profileTeam" alt="">
            <div class="detailTeam">
                <div>
                    <p class="nameTeam">Team 1 <img class="ms-2" src="{{ url('/img/icon/trophy.png') }}" style="width: 21px;height: 21px;flex-shrink: 0;" alt=""></p>
                </div>
            </div>
            <div class="score-my-team">
                <span class="text-score" style="color: #E7C517!important;">1000000</span>
                <span class="text-point"> PC</span>

            </div>
            <div class="statusTeam text-center">
                <div>
                    <i class="fa-solid fa-triangle rankUP"></i>
                    <!-- <i class="fa-solid fa-triangle fa-flip-vertical rankDOWN"></i>
                    <i class="fa-solid fa-hyphen fa-2xl rankNORMAL"></i> -->
                    <p class="statusNumber ">3</p>
                </div>
            </div>
        </div>
    </div>

    <!-- เรียงตามลำดับ -->
    <div id="content_ASC">
        <!--  -->
        <div  class="other-team">
            <div class="number-my-team">1</div>
            <img src="{{ url('storage')}}/{{Auth::user()->photo}}" class="profileTeam" alt="">
            <div class="detailTeam">
                <div>
                    <p class="nameTeam">Team 1 <img class="ms-2" src="{{ url('/img/icon/trophy.png') }}" style="width: 21px;height: 21px;flex-shrink: 0;" alt=""></p>
                </div>
            </div>
            <div class="score-my-team">
                <span class="text-score" style="color: #E7C517!important;">1000000</span>
                <span class="text-point"> PC</span>

            </div>
            <div class="statusTeam text-center">
                <div>
                    <i class="fa-solid fa-triangle rankUP"></i>
                    <!-- <i class="fa-solid fa-triangle fa-flip-vertical rankDOWN"></i>
                    <i class="fa-solid fa-hyphen fa-2xl rankNORMAL"></i> -->
                    <p class="statusNumber ">3</p>
                </div>
            </div>
        </div>
    </div>

</div>

</div>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.js'></script>

<script>
    document.addEventListener('DOMContentLoaded', (event) => {
           // console.log("START");
           change_menu_bar('grand');
       });
    $(document).ready(function() {
        const owl = $('.owl-nav-nemu')
        owl.owlCarousel({
            loop: false,
            margin: 5,
            nav: false,
            items: 3,
            dots: false
        });

        // Custom Nav

        $('.owl-carousel__next').click(() => owl.trigger('next.owl.carousel'))

        $('.owl-carousel__prev').click(() => owl.trigger('prev.owl.carousel'))
    })
</script>

@endsection