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
        background: linear-gradient(360deg, rgba(0, 27, 87, 0) 0%, rgba(221, 243, 255, 1) 100%);
        margin: 0px 0 10px 0;
        -webkit-border-radius: 0px;    
        border-radius: 0px; 
        -moz-border-radius:0px;
        -khtml-border-radius:0px;
        /* padding: 10px; */
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
        background-color: #23577F;
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
        object-fit: cover;
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
        object-fit: cover !important;
    }

    .nameUserteam {
        max-width: 150px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .text-data-team {
        color: #00E0FF;
    }.text-point{
        margin-left: 5px;
    }.nav-menu {
        /* margin-top: 25px; */
        padding: 0 40px;
        /* background-color: rgb(255, 255, 255, 0.5); */
        position: relative;
        z-index: 9999999;
        display: flex;
        align-items: center;
        position: -webkit-sticky;
        position: sticky;
        background-color: #DDF3FF;
        /* -webkit-border-radius:  15px 15px 0 0;    
        border-radius:  15px 15px 0 0; 
        -moz-border-radius: 15px 15px 0 0;
        -khtml-border-radius: 15px 15px 0 0; */
    }   


    .content-section {
        padding: 0;
    }

    .owl-prev,
    .owl-carousel__next,
    .owl-carousel__prev {
        position: absolute;
        color: #07285A;
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
        color: #07285A ;
        padding: 10px 0;
        font-size: 15px;
        height: 100%;
        position: sticky;
    }.btn-sort-group.btn:hover ,.btn-sort-group.btn:active{
        color: #07285A ;
        box-shadow: none !important;
}
    .btn-sort-group .item{
        display: flex;
        align-items: center;
    }
    
    .btn-sort-group-active{
        color: #07285A !important;
        padding: 10px 0;
        font-size: 16px;
        -webkit-border-radius: 0px;    
        border-radius: 0px; 
        -moz-border-radius:0px;
        -khtml-border-radius:0px;
        border-bottom: #07285A 1px solid;

    }
    .btn-submit {
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
        width: 120px;
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
    }.image-container {
  position: relative;
  display: inline-block;
  width: 100%;
z-index: 9999999;
}

.image-container img {
  display: block;
  width: 100%;
  height: auto;
}

.bottom-section{
    margin-top: -15%;
    position: relative;
}

.ranker-1 img,.ranker-2 img,.ranker-3 img {
    margin: auto !important;
}
.point-ranker{
    background-color: #fff;
    -webkit-border-radius: 50px;    
    border-radius: 50px; 
    -moz-border-radius:50px;
    -khtml-border-radius:50px;
    width: 110px;
    padding: 2px;
    border: #67CFFF 1px solid;
    font-weight: bolder;
    margin: auto;
    position: relative;

}
@media (max-width:576px) {
    .sticky {
        position: -webkit-sticky;
        position: sticky;
        top: calc(100% - 108%);
        z-index: 999999;
    }

    .ranker-1{
        position: absolute;
        top: -20%; left: 20%;
        transform: translate(-50%, -50%);
        text-align: center;
        
    }

    .ranker-2{
        position: absolute;
        top: 20%; left: 50%;
        transform: translate(-50%, -50%);
        text-align: center;
    }

    .ranker-3{
        position: absolute;
        top: 65%; left: 78%;
        transform: translate(-50%, -50%);
        text-align: center;
    }
}
@media (min-width:576px) {
    .sticky {
        position: -webkit-sticky;
        position: sticky;
        top: calc(100% - 108%);
        z-index: 999999;
    }

    .ranker-1{
        position: absolute;
        top: -20%; 
        left: 23%;
        transform: translate(-50%, -50%);
        text-align: center;
    }

    .ranker-2{
        position: absolute;
        top: 20%; 
        left: 53%;
        transform: translate(-50%, -50%);
        text-align: center;
    }

    .ranker-3{
        position: absolute;
        top: 65%; left: 78%;
        transform: translate(-50%, -50%);
        text-align: center;
    }
}

@media (min-width:768px) {
    .sticky {
        position: -webkit-sticky;
        position: sticky;
        top: -10%;
        z-index: 999999;
    }

    .ranker-1{
        position: absolute;
        top: -20%; 
        left: 23%;
        transform: translate(-50%, -50%);
        text-align: center;
    }

    .ranker-2{
        position: absolute;
        top: 20%; 
        left: 53%;
        transform: translate(-50%, -50%);
        text-align: center;
    }

    .ranker-3{
        position: absolute;
        top: 65%; left: 78%;
        transform: translate(-50%, -50%);
        text-align: center;
    }
}

@media (min-width:992px) {
	.sticky {
        position: -webkit-sticky;
        position: sticky;
        top: -13%;
        z-index: 999999;
    }
}

@media (min-width:1200px) {
	.sticky {
        position: -webkit-sticky;
        position: sticky;
        top: -17%;
        z-index: 999999;
    }
}

@media (min-width:1400px) {
	.sticky {
        position: -webkit-sticky;
        position: sticky;
        top: -19%;
        z-index: 999999;
    }

    .ranker-1{
        position: absolute;
        top: 0%; 
        left: 23%;
        transform: translate(-50%, -50%);
        text-align: center;
    }

    .ranker-2{
        position: absolute;
        top: 20%; 
        left: 53%;
        transform: translate(-50%, -50%);
        text-align: center;
    }

    .ranker-3{
        position: absolute;
        top: 65%; left: 78%;
        transform: translate(-50%, -50%);
        text-align: center;
    }


    .ranker-1 .sub-rank-img{
        width: 100px !important;
        height: 100px !important;
        border: #FCBF29 2px solid;
    }

    .ranker-2 .sub-rank-img{
        width: 86px !important;
        height: 86px !important;
        border: #FCBF29 2px solid;
    }

    .ranker-3 .sub-rank-img{
        width: 73px !important;
        height: 73px !important;
        border: #FCBF29 2px solid;
    }
}
.color-2m-up{
background-color: #163C96 !important;
}
.color-2m{
background-color: #23577F !important;
}
.color-1-5m{
    background-color: #2B618A !important;

}
.color-1m{
background-color: #2B4961 !important;

}.color-500k{
background-color: #1A3041 !important;

}

table {
    border-collapse: separate; /* หรือใช้ 'border-collapse: collapse;' ตามที่เหมาะสม */
    border-spacing: 0;
}
td.my-rank {
    border-top: 1px solid #00E0FF; /* ตัวอย่างเพื่อให้เห็นขอบ */
    border-bottom: 1px solid #00E0FF; /* ตัวอย่างเพื่อให้เห็นขอบ */
    margin: 0;
    gap: 0;
}

td.my-rank:first-child {
    border-left: 1px solid #00E0FF; /* ตัวอย่างเพื่อให้เห็นขอบ */
    border-radius: 10px 0 0 10px;
}
td.my-rank:last-child {
    border-right: 1px solid #00E0FF; /* ตัวอย่างเพื่อให้เห็นขอบ */
    border-radius: 0 10px 10px 0;
}
</style>

<div id="div_data_all"></div>
<div class="w-100 d-flex justify-content-center my-3">
    <div class="btn-group" role="group" aria-label="Basic example">
        <a id="btn_sort_pc" href="{{ url('/grand_mission') }}?Sort=pc" class="btn btn-sort-data active">
            PC
        </a>
        <a id="btn_sort_nc" href="{{ url('/grand_mission') }}?Sort=nc" class="btn btn-sort-data">
            New code
        </a>
    </div>
</div>
<div class="container p-0 m-0" >
    <div style="position: relative;width: auto;height: auto;height: 5px;">
        <img src="{{ url('/img/icon/snowflakes1.png') }}" alt="รูปภาพปก" style="width: 53px;position: absolute; left: -15px;top:500%">
        <img src="{{ url('/img/icon/snowflakes2.png') }}" alt="รูปภาพปก" style="width: 53px;position: absolute; right:5%;top:-1900%">
        <img src="{{ url('/img/icon/snowflake.png') }}" alt="รูปภาพปก" style="width: 20px;position: absolute; right: 14%;top:1700%">        
        <img src="{{ url('/img/icon/snowflake.png') }}" alt="รูปภาพปก" style="width: 20px;position: absolute; right: 14%;top:1700%">
        <img src="{{ url('/img/icon/snowflake.png') }}" alt="รูปภาพปก" style="width: 25px;position: absolute; left: 18%;top:-2808%">        
        <img src="{{ url('/img/icon/snowflake.png') }}" alt="รูปภาพปก" style="width: 13px;position: absolute; left: 15%;top:-2708%">
        <img src="{{ url('/img/icon/bubble.png') }}" alt="รูปภาพปก" style="width: 9px;position: absolute; left: 3%;top:-3008% ;">
        <img src="{{ url('/img/icon/bubble.png') }}" alt="รูปภาพปก" style="width: 9px;position: absolute; left: 18%;top:-2000% ;">
        <img src="{{ url('/img/icon/bubble.png') }}" alt="รูปภาพปก" style="width: 9px;position: absolute; right: 18%;top:-2500% ;">
        <img src="{{ url('/img/icon/bubble.png') }}" alt="รูปภาพปก" style="width: 9px;position: absolute; right: 5%;top:-200% ;">
        <img src="{{ url('/img/icon/bubble.png') }}" alt="รูปภาพปก" style="width: 9px;position: absolute; right: 28%;top:800% ;">
        <img src="{{ url('/img/icon/bubble.png') }}" alt="รูปภาพปก" style="width: 9px;position: absolute; right: 10%;top:3000% ;">
        <img src="{{ url('/img/icon/bubble.png') }}" alt="รูปภาพปก" style="width: 9px;position: absolute; left: 38%;top:2000% ;">
        <img src="{{ url('/img/icon/bubble.png') }}" alt="รูปภาพปก" style="width: 9px;position: absolute; left: 2%;top:2500% ;">
    </div>
</div>


<div class="d-flex justify-content-center" style="margin-top: 80px;">

    <div class="container p-0" style="position: relative;">
        <div class="image-container">
            <img src="{{ url('/img/icon/mountain.png') }}" style="width: 100%;" alt=""> 
            <div class="ranker-1">
                <img id="img_rank_1" src="{{ url('/img/icon/Frame 36594.png') }}" class="sub-rank-img" alt="รูปภาพปก" style="width: 83px;height: 83px;border: #FCBF29 2px solid;">
                <div class="point-ranker">
                    <span id="score_rank_1"></span>
                    <img src="{{ url('/img/icon/rank-1.png') }}" alt="รูปภาพปก" style="width: 27px;position: absolute; right: -18px;top:-8px">
                </div>

            </div>

            <div class="ranker-2">
                <img id="img_rank_2" src="{{ url('/img/icon/Frame 36594.png') }}" class="sub-rank-img" alt="รูปภาพปก" style="width: 66px;height: 66px;border: #FCBF29 2px solid;">
                <div class="point-ranker">
                    <span id="score_rank_2"></span>
                    <img src="{{ url('/img/icon/rank-2.png') }}" alt="รูปภาพปก" style="width: 27px;position: absolute; right: -18px;top:-8px">
                </div>
            </div>


            <div class="ranker-3">
                <img id="img_rank_3" src="{{ url('/img/icon/Frame 36594.png') }}" class="sub-rank-img" alt="รูปภาพปก" style="width: 53px;height: 53px;border: #FCBF29 2px solid;">
                <div class="point-ranker">
                    <span id="score_rank_3"></span>
                    <img src="{{ url('/img/icon/rank-3.png') }}" alt="รูปภาพปก" style="width: 27px;position: absolute; right: -18px;top:-8px">
                </div>
            </div>
        </div>
       

       
        <!-- <div class="row" >
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
        </div> -->
     
    </div>
</div>


<a id="click_to_div_data_all" href="#div_data_all" class="d-none"></a>

<div class="bottom-section">
    <div class="sticky"  >
        <img src="{{ url('/img/icon/Vector 426.png') }}" style="width: 100%;z-index: -1;" alt=""> 
        <div class="nav-menu d-none" id="div_menu_view">
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

        <!-- <style>
            .text-header-column{
                color:rgb(0, 27, 87);
                font-size: 14px;
                font-style: normal;
                font-weight: 400;
                line-height: normal;
                background-color: #DDF3FF;
            }
        </style>
    <div class="text-header-column" style="width: 100%;padding: 10px 10px 10px 12px;display: flex;">
            <div class="text-center number-my-team" style="margin-left: 5px;">No.</div>
            <div style="min-width: 65px !important;max-width: 65px !important;"></div>
            <div class="w-100">Username</div>
            <div  style="min-width: 65px !important;max-width: 65px !important;margin-right: 10px;  ">PC</div>
            <div style="min-width: 65px !important;max-width: 65px !important;">Last week</div>
        </div> -->
    </div>

    <div class="contentSection p-2">

        <!-- ของตัวเอง -->
        @if(Auth::user()->role == "Player")
            <p class="mb-2 mt-3" style="font-size: 17px;font-weight: bold;margin-left: 20px; color:#07285A">My  Team</p>
            <div class="mb-4" id="content_ME">
                <!--  -->
            </div>
        @endif
        <br>
        <!-- เรียงตามลำดับ -->
        <p style="font-size: 17px;font-weight: bold;margin-left: 20px; color:#07285A">All  Team</p>
        <div id="content_ASC">
            <!--  -->
        </div>

    </div>

    <div>
        <img src="{{ url('/img/icon/ice-cliff2.png') }}" alt="รูปภาพปก" style="width: 203px;position: absolute; left: 0px;top:20% ;">
        <img src="{{ url('/img/icon/ice-cliff1.png') }}" alt="รูปภาพปก" style="width: 203px;position: absolute; right: 0px;top:10% ;">

    </div>
</div>
</div>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.js'></script>

<script>

    var sort = "{{ url()->full() }}";
        sort = sort.split("?Sort=");

    var data_sort ;

    if(sort[1]){
        data_sort = sort[1] ;

        if(data_sort == 'pc'){
            document.querySelector('#btn_sort_pc').classList.add('active');
            document.querySelector('#btn_sort_nc').classList.remove('active');
        }else if(data_sort == 'nc'){
            document.querySelector('#btn_sort_pc').classList.remove('active');
            document.querySelector('#btn_sort_nc').classList.add('active');
        }

    }else{
        data_sort = "pc" ;
    }

    document.addEventListener('DOMContentLoaded', (event) => {
        // console.log("START");
        change_menu_bar('grand');
        get_data_user_grand_mission(data_sort);

        // console.log(data_sort);
    });

    function get_data_user_grand_mission(data_sort){

        fetch("{{ url('/') }}/api/get_data_user_grand_mission" + "/" + data_sort)
            .then(response => response.json())
            .then(result => {
                // console.log(result);

                if(result){

                    let class_of_score ;
                    let check_line_2m = 'no';
                    let check_line_1_5m = 'no';
                    let check_line_1m = 'no';
                    let check_line_500k = 'no';

                    let week = result['week'];
                    let as_of = result['as_of'];
                    let datePart = as_of.substring(0, 10); // 2024-01-31

                    let parts = datePart.split('-'); // แยกวันที่เป็นส่วนย่อย
                    let formattedDate = parts[2] + '/' + parts[1] + '/' + parts[0]; // ประกอบวันที่ใหม่ในรูปแบบที่ต้องการ

                    let content_ASC = document.querySelector('#content_ASC');
                        content_ASC.innerHTML = '';


                    if(data_sort == 'pc'){

                        // เส้นทั้งหมด
                        let line_2m = `<div class="d-flex align-items-center mt-2">
                            <span style="color: #00E0FF;font-size: 14px;font-weight:bolder;">2M</span>
                            <span class="w-100 m-2" style="border-top: #00E0FF 2px dashed;"></span>
                            <span style="color: #00E0FF;font-size: 14px;font-weight:bolder;">2M</span>
                        </div>`;

                        let line_1_5m = `<div class="d-flex align-items-center mt-2">
                            <span style="color: #00E0FF;font-size: 14px;font-weight:bolder;">1.5M</span>
                            <span class="w-100 m-2" style="border-top: #00E0FF 2px dashed;"></span>
                            <span style="color: #00E0FF;font-size: 14px;font-weight:bolder;">1.5M</span>
                        </div>`;

                        let line_1m = `<div class="d-flex align-items-center mt-2">
                            <span style="color: #00E0FF;font-size: 14px;font-weight:bolder;">1M</span>
                            <span class="w-100 m-2" style="border-top: #00E0FF 2px dashed;"></span>
                            <span style="color: #00E0FF;font-size: 14px;font-weight:bolder;">1M</span>
                        </div>`;

                        let line_500k = `<div class="d-flex align-items-center mt-2">
                            <span style="color: #00E0FF;font-size: 14px;font-weight:bolder;">500k</span>
                            <span class="w-100 m-2" style="border-top: #00E0FF 2px dashed;"></span>
                            <span style="color: #00E0FF;font-size: 14px;font-weight:bolder;">500k</span>
                        </div>`;
                        // จบ เส้นทั้งหมด

                        document.querySelector('#score_rank_1').innerHTML = "00 PC";
                        document.querySelector('#score_rank_2').innerHTML = "00 PC";
                        document.querySelector('#score_rank_3').innerHTML = "00 PC";

                        for (let i = 0; i < result['data'].length; i++) {

                            let text_id_group = result['data'][i].id.toString();

                            let grandmission_arr = [];
                                grandmission_arr = JSON.parse(result['data'][i].rank_record);
                            let grandmission = grandmission_arr[week]['grandmission'] ;
                            let pc_grand_of_gweek = grandmission_arr[week]['pc_grand_of_gweek'] ;
                            let pc_grand_last_gweek = grandmission_arr[week]['pc_grand_last_gweek'] ;
                            let formattedNumber = grandmission.toLocaleString();

                            if (grandmission >= 2000000) {
                                img_trophy = ` <img class="ms-2" src="{{ url('/img/icon/trophy.png') }}" style="width: 21px;height: 21px;flex-shrink: 0;" alt="">`;
                            } else {
                                img_trophy = ``;
                            }

                            let draw_line = ``;
                            if(grandmission > 2000000){
                                class_of_score = 'color-2m-up' ;
                            }
                            else if(grandmission < 2000000 && check_line_2m == 'no'){
                                // draw_line = line_2m;
                                class_of_score = 'color-2m';
                                check_line_2m = 'yes';
                                draw_line = draw_line_lux(i , '2M');
                            }
                            else if(grandmission < 1500000 && check_line_1_5m == 'no'){
                                // draw_line = line_1_5m;
                                class_of_score = 'color-1-5m';
                                check_line_1_5m = 'yes';
                                draw_line = draw_line_lux(i , '1.5M');
                            }
                            else if(grandmission < 1000000 && check_line_1m == 'no'){
                                // draw_line = line_1m;
                                class_of_score = 'color-1m';
                                check_line_1m = 'yes';
                                draw_line = draw_line_lux(i , '1M');
                            }
                            else if(grandmission < 500000 && check_line_500k == 'no'){
                                // draw_line = line_500k;
                                class_of_score = 'color-500k';
                                check_line_500k = 'yes';
                                draw_line = draw_line_lux(i , '500K');
                            }

                            content_ASC.insertAdjacentHTML('beforeend', draw_line);

                            let rank_up ;
                            if( parseInt(pc_grand_of_gweek) < parseInt(pc_grand_last_gweek) ){
                                rank_up = `<i class="fa-solid fa-triangle rankUP"></i>`;
                            }else if(parseInt(pc_grand_of_gweek) > parseInt(pc_grand_last_gweek)){
                                rank_up = `<i class="fa-solid fa-triangle fa-flip-vertical rankDOWN"></i>`;
                            }else{
                                rank_up = `<i class="fa-solid fa-hyphen fa-2xl rankNORMAL"></i>`;
                            }

                            // ทีมทั้งหมด
                            let html_other_team ;

                            if("{{ Auth::user()->role }}" == "Player" || "{{ Auth::user()->role }}" == "QR"){
                                html_other_team = `
                                    <div class="other-team `+class_of_score+`" data-toggle="collapse" href="#data_other_id_`+result['data'][i]['id']+`" role="button" aria-expanded="false" aria-controls="collapseExample">
                                        <div class="number-my-team">`+pc_grand_of_gweek+`</div>
                                        <img src="{{ url('/img/group_profile/profile/id (`+text_id_group+`).png') }}" class="profileTeam" alt="">

                                        <div class="detailTeam">
                                            <div>
                                                <p class="nameTeam">Team `+result['data'][i]['name_group']+`${img_trophy}</p>
                                            </div>
                                        </div>
                                        <div class="score-my-team">
                                            <span class="text-score" style="color: #E7C517!important;">`+formattedNumber+`</span>
                                            <span class="text-point"> PC</span>

                                        </div>
                                        <div class="statusTeam text-center">
                                            <div>
                                                `+rank_up+`
                                                <p class="statusNumber ">`+pc_grand_last_gweek+`</p>
                                            </div>
                                        </div>
                                    </div>
                                `;

                                content_ASC.insertAdjacentHTML('beforeend', html_other_team);
                            }
                            else{
                                html_other_team = `
                                    <div class="other-team `+class_of_score+`" data-toggle="collapse" href="#data_other_id_`+result['data'][i]['id']+`" role="button" aria-expanded="false" aria-controls="collapseExample">
                                        <div class="number-my-team">`+pc_grand_of_gweek+`</div>
                                        <img src="{{ url('/img/group_profile/profile/id (`+text_id_group+`).png') }}" class="profileTeam" alt="">

                                        <div class="detailTeam">
                                            <div>
                                                <p class="nameTeam">Team `+result['data'][i]['name_group']+`${img_trophy}</p>
                                            </div>
                                        </div>
                                        <div class="score-my-team">
                                            <span class="text-score" style="color: #E7C517!important;">`+formattedNumber+`</span>
                                            <span class="text-point"> PC</span>

                                        </div>
                                        <div class="statusTeam text-center">
                                            <div>
                                                `+rank_up+`
                                                <p class="statusNumber ">`+pc_grand_last_gweek+`</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="collapseContent">
                                        <div class="collapse p-0" id="data_other_id_`+result['data'][i]['id']+`">
                                            <div class="dataTeam" style="padding: 12px 8px 8px 8px;">
                                                <div class="table-responsive">
                                                    <table class="table mb-0 align-middle table-borderless">
                                                        <thead class="head-teble-data-my-team">
                                                            <tr>
                                                                <th class="text-center" style>
                                                                    <p>No.</p>
                                                                </th>
                                                                <th class="text-center" style>
                                                                    <p>User</p>
                                                                </th>
                                                                <th class="text-center" style>
                                                                    <p>PC</p>
                                                                    <small style="font-size: 7px;">As of  : `+formattedDate+`</small>
                                                                </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="tbody_content_id_`+text_id_group+`">
                                                            <!-- ข้อมูลสมาชิก -->
                                                        </tbody>
                                                    </table>

                                                    <a style="float:right;margin:10px 10px 5px 0px;color: #FFF;font-size: 10px;font-style: normal;font-weight: 500;line-height: normal;text-decoration-line: underline;" href="{{ url('/grand_mission_my_team')}}/`+text_id_group+`" );">ดูรายละเอียดเพิ่มเติม</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                `;

                                content_ASC.insertAdjacentHTML('beforeend', html_other_team);

                                // สมาชิกในทีมของทุกทีม
                                create_html_all_member(result['data'][i]['id'] , week , 'pc');
                            }
                            
                            // ของตัวเอง
                            if(result['data'][i]['id'] == "{{ Auth::user()->group_id }}"){

                                let content_ME = document.querySelector('#content_ME');
                                    content_ME.innerHTML = '';

                                let html_of_me = `
                                    <div class="my-team" data-toggle="collapse" href="#data_team_id_`+result['data'][i]['id']+`" role="button" aria-expanded="false" aria-controls="collapseExample">
                                        <div class="number-my-team">`+pc_grand_of_gweek+`</div>
                                        <img src="{{ url('/img/group_profile/profile/id (`+text_id_group+`).png') }}" class="profileTeam">

                                        <div class="detailTeam">
                                            <div>
                                                <p class="nameTeam">Team `+result['data'][i]['name_group']+`${img_trophy}</p>
                                            </div>
                                        </div>
                                        <div class="score-my-team">
                                            <span class="text-score" style="color: #E7C517!important;">`+formattedNumber+`</span>
                                            <span class="text-point"> PC</span>

                                        </div>
                                        <div class="statusTeam text-center">
                                            <div>
                                                `+rank_up+`
                                                <p class="statusNumber ">`+pc_grand_last_gweek+`</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="collapseContent">
                                        <div class="collapse p-0" id="data_team_id_`+result['data'][i]['id']+`">
                                            <div class="dataTeam" style="padding: 12px 8px 8px 8px;">
                                                <div class="table-responsive">
                                                    <table class="table mb-0 align-middle table-borderless">
                                                        <thead class="head-teble-data-my-team">
                                                            <tr>
                                                                <th class="text-center" style>
                                                                    <p>No.</p>
                                                                </th>
                                                                <th class="text-center" style>
                                                                    <p>User</p>
                                                                </th>
                                                                <th class="text-center" style>
                                                                    <p>PC</p>
                                                                    <small style="font-size: 7px;">As of  : `+formattedDate+`</small>
                                                                    </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="tbody_content_ME">
                                                            <!-- ข้อมูลสมาชิก -->
                                                        </tbody>
                                                    </table>

                                                    <a style="float:right;margin:10px 10px 5px 0px;color: #FFF;font-size: 10px;font-style: normal;font-weight: 500;line-height: normal;text-decoration-line: underline;" href="{{ url('/grand_mission_my_team')}}/`+text_id_group+`" );">ดูรายละเอียดเพิ่มเติม</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                `;

                                document.querySelector('#content_ME').classList.remove('d-none');
                                content_ME.insertAdjacentHTML('beforeend', html_of_me);

                                // สมาชิกในทีมของฉัน
                                create_html_member_in_team(result['data'][i]['id'] , week , 'pc');

                            }

                            if(week != "0"){
                                if(i == 0 || i == 1 || i == 2){
                                
                                    let pc_Number = grandmission.toLocaleString();

                                    let iii = i + 1 ;
                                    document.querySelector('#img_rank_'+iii).setAttribute('src' , `{{ url('/img/group_profile/profile/id (`+text_id_group+`).png') }}`);
                                    document.querySelector('#score_rank_'+iii).innerHTML = pc_Number + " PC";
                                }
                            }

                        }
                    }
                    else if(data_sort == 'nc'){

                        // เส้นทั้งหมด
                        let line_2m = `<div class="d-flex align-items-center mt-2">
                            <span style="color: #00E0FF;font-size: 14px;font-weight:bolder;">25NC</span>
                            <span class="w-100 m-2" style="border-top: #00E0FF 2px dashed;"></span>
                            <span style="color: #00E0FF;font-size: 14px;font-weight:bolder;">25NC</span>
                        </div>`;

                        let line_1_5m = `<div class="d-flex align-items-center mt-2">
                            <span style="color: #00E0FF;font-size: 14px;font-weight:bolder;">20NC</span>
                            <span class="w-100 m-2" style="border-top: #00E0FF 2px dashed;"></span>
                            <span style="color: #00E0FF;font-size: 14px;font-weight:bolder;">20NC</span>
                        </div>`;

                        let line_1m = `<div class="d-flex align-items-center mt-2">
                            <span style="color: #00E0FF;font-size: 14px;font-weight:bolder;">15NC</span>
                            <span class="w-100 m-2" style="border-top: #00E0FF 2px dashed;"></span>
                            <span style="color: #00E0FF;font-size: 14px;font-weight:bolder;">15NC</span>
                        </div>`;

                        let line_500k = `<div class="d-flex align-items-center mt-2">
                            <span style="color: #00E0FF;font-size: 14px;font-weight:bolder;">10NC</span>
                            <span class="w-100 m-2" style="border-top: #00E0FF 2px dashed;"></span>
                            <span style="color: #00E0FF;font-size: 14px;font-weight:bolder;">10NC</span>
                        </div>`;
                        // จบ เส้นทั้งหมด
                        document.querySelector('#score_rank_1').innerHTML = "0 NC";
                        document.querySelector('#score_rank_2').innerHTML = "0 NC";
                        document.querySelector('#score_rank_3').innerHTML = "0 NC";

                        for (let i = 0; i < result['data'].length; i++) {

                            let text_id_group = result['data'][i].id.toString();

                            let new_code_arr = [];
                                new_code_arr = JSON.parse(result['data'][i].rank_record);
                            let new_code = new_code_arr[week]['new_code'] ;
                            let nc_grand_of_gweek = new_code_arr[week]['nc_grand_of_gweek'] ;
                            let nc_grand_last_gweek = new_code_arr[week]['nc_grand_last_gweek'] ;
                            let formattedNumber = new_code.toLocaleString();

                            if (new_code >= 25) {
                                img_trophy = ` <img class="ms-2" src="{{ url('/img/icon/trophy.png') }}" style="width: 21px;height: 21px;flex-shrink: 0;" alt="">`;
                            } else {
                                img_trophy = ``;
                            }

                            let draw_line = ``;
                            if(new_code > 25){
                                class_of_score = 'color-2m-up' ;
                            }
                            else if(new_code < 25 && check_line_2m == 'no'){
                                // draw_line = line_2m;
                                class_of_score = 'color-2m';
                                check_line_2m = 'yes';
                                draw_line = draw_line_lux(i , '25NC');
                            }
                            else if(new_code < 20 && check_line_1_5m == 'no'){
                                // draw_line = line_1_5m;
                                class_of_score = 'color-1-5m';
                                check_line_1_5m = 'yes';
                                draw_line = draw_line_lux(i , '20NC');
                            }
                            else if(new_code < 15 && check_line_1m == 'no'){
                                // draw_line = line_1m;
                                class_of_score = 'color-1m';
                                check_line_1m = 'yes';
                                draw_line = draw_line_lux(i , '15NC');
                            }
                            else if(new_code < 10 && check_line_500k == 'no'){
                                // draw_line = line_500k;
                                class_of_score = 'color-500k';
                                check_line_500k = 'yes';
                                draw_line = draw_line_lux(i , '10NC');
                            }

                            content_ASC.insertAdjacentHTML('beforeend', draw_line);

                            let rank_up ;
                            if( parseInt(nc_grand_of_gweek) < parseInt(nc_grand_last_gweek) ){
                                rank_up = `<i class="fa-solid fa-triangle rankUP"></i>`;
                            }else if(parseInt(nc_grand_of_gweek) > parseInt(nc_grand_last_gweek)){
                                rank_up = `<i class="fa-solid fa-triangle fa-flip-vertical rankDOWN"></i>`;
                            }else{
                                rank_up = `<i class="fa-solid fa-hyphen fa-2xl rankNORMAL"></i>`;
                            }

                            // ทีมทั้งหมด
                            let html_other_team ;

                            if("{{ Auth::user()->role }}" == "Player" || "{{ Auth::user()->role }}" == "QR"){
                                html_other_team = `
                                    <div class="other-team `+class_of_score+`" data-toggle="collapse" href="#data_other_id_`+result['data'][i]['id']+`" role="button" aria-expanded="false" aria-controls="collapseExample">
                                        <div class="number-my-team">`+nc_grand_of_gweek+`</div>
                                        <img src="{{ url('/img/group_profile/profile/id (`+text_id_group+`).png') }}" class="profileTeam" alt="">

                                        <div class="detailTeam">
                                            <div>
                                                <p class="nameTeam">Team `+result['data'][i]['name_group']+`${img_trophy}</p>
                                            </div>
                                        </div>
                                        <div class="score-my-team">
                                            <span class="text-score" style="color: #E7C517!important;">`+formattedNumber+`</span>
                                            <span class="text-point"> PC</span>

                                        </div>
                                        <div class="statusTeam text-center">
                                            <div>
                                                `+rank_up+`
                                                <p class="statusNumber ">`+nc_grand_last_gweek+`</p>
                                            </div>
                                        </div>
                                    </div>
                                `;

                                content_ASC.insertAdjacentHTML('beforeend', html_other_team);
                            }
                            else{
                                html_other_team = `
                                    <div class="other-team `+class_of_score+`" data-toggle="collapse" href="#data_other_id_`+result['data'][i]['id']+`" role="button" aria-expanded="false" aria-controls="collapseExample">
                                        <div class="number-my-team">`+nc_grand_of_gweek+`</div>
                                        <img src="{{ url('/img/group_profile/profile/id (`+text_id_group+`).png') }}" class="profileTeam" alt="">

                                        <div class="detailTeam">
                                            <div>
                                                <p class="nameTeam">Team `+result['data'][i]['name_group']+`${img_trophy}</p>
                                            </div>
                                        </div>
                                        <div class="score-my-team">
                                            <span class="text-score" style="color: #E7C517!important;">`+formattedNumber+`</span>
                                            <span class="text-point"> NC</span>

                                        </div>
                                        <div class="statusTeam text-center">
                                            <div>
                                                `+rank_up+`
                                                <p class="statusNumber ">`+nc_grand_last_gweek+`</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="collapseContent">
                                        <div class="collapse p-0" id="data_other_id_`+result['data'][i]['id']+`">
                                            <div class="dataTeam" style="padding: 12px 8px 8px 8px;">
                                                <div class="table-responsive">
                                                    <table class="table mb-0 align-middle table-borderless">
                                                        <thead class="head-teble-data-my-team">
                                                            <tr>
                                                                <th class="text-center" style>
                                                                    <p>No.</p>
                                                                </th>
                                                                <th class="text-center" style>
                                                                    <p>User</p>
                                                                </th>
                                                                <th class="text-center" style>
                                                                    <p>NC</p>
                                                                    <small style="font-size: 7px;">As of  : `+formattedDate+`</small>
                                                                </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="tbody_content_id_`+text_id_group+`">
                                                            <!-- ข้อมูลสมาชิก -->
                                                        </tbody>
                                                    </table>

                                                    <a style="float:right;margin:10px 10px 5px 0px;color: #FFF;font-size: 10px;font-style: normal;font-weight: 500;line-height: normal;text-decoration-line: underline;" href="{{ url('/grand_mission_my_team')}}/`+text_id_group+`" );">ดูรายละเอียดเพิ่มเติม</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                `;

                                content_ASC.insertAdjacentHTML('beforeend', html_other_team);

                                // สมาชิกในทีมของทุกทีม
                                create_html_all_member(result['data'][i]['id'] , week , 'nc');
                            }
                            
                            // ของตัวเอง
                            if(result['data'][i]['id'] == "{{ Auth::user()->group_id }}"){

                                let content_ME = document.querySelector('#content_ME');
                                    content_ME.innerHTML = '';

                                let html_of_me = `
                                    <div class="my-team" data-toggle="collapse" href="#data_team_id_`+result['data'][i]['id']+`" role="button" aria-expanded="false" aria-controls="collapseExample">
                                        <div class="number-my-team">`+nc_grand_of_gweek+`</div>
                                        <img src="{{ url('/img/group_profile/profile/id (`+text_id_group+`).png') }}" class="profileTeam">

                                        <div class="detailTeam">
                                            <div>
                                                <p class="nameTeam">Team `+result['data'][i]['name_group']+`${img_trophy}</p>
                                            </div>
                                        </div>
                                        <div class="score-my-team">
                                            <span class="text-score" style="color: #E7C517!important;">`+formattedNumber+`</span>
                                            <span class="text-point"> NC</span>

                                        </div>
                                        <div class="statusTeam text-center">
                                            <div>
                                                `+rank_up+`
                                                <p class="statusNumber ">`+nc_grand_last_gweek+`</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="collapseContent">
                                        <div class="collapse p-0" id="data_team_id_`+result['data'][i]['id']+`">
                                            <div class="dataTeam" style="padding: 12px 8px 8px 8px;">
                                                <div class="table-responsive">
                                                    <table class="table mb-0 align-middle table-borderless">
                                                        <thead class="head-teble-data-my-team">
                                                            <tr>
                                                                <th class="text-center" style>
                                                                    <p>No.</p>
                                                                </th>
                                                                <th class="text-center" style>
                                                                    <p>User</p>
                                                                </th>
                                                                <th class="text-center" style>
                                                                    <p>NC</p>
                                                                    <small style="font-size: 7px;">As of  : `+formattedDate+`</small>
                                                                    </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="tbody_content_ME">
                                                            <!-- ข้อมูลสมาชิก -->
                                                        </tbody>
                                                    </table>

                                                    <a style="float:right;margin:10px 10px 5px 0px;color: #FFF;font-size: 10px;font-style: normal;font-weight: 500;line-height: normal;text-decoration-line: underline;" href="{{ url('/grand_mission_my_team')}}/`+text_id_group+`" );">ดูรายละเอียดเพิ่มเติม</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                `;

                                document.querySelector('#content_ME').classList.remove('d-none');
                                content_ME.insertAdjacentHTML('beforeend', html_of_me);

                                // สมาชิกในทีมของฉัน
                                create_html_member_in_team(result['data'][i]['id'] , week , 'nc');

                            }

                            if(week != "0"){
                                if(i == 0 || i == 1 || i == 2){
                                
                                    let nc_Number = new_code.toLocaleString();

                                    let iii = i + 1 ;
                                    document.querySelector('#img_rank_'+iii).setAttribute('src' , `{{ url('/img/group_profile/profile/id (`+text_id_group+`).png') }}`);
                                    document.querySelector('#score_rank_'+iii).innerHTML = nc_Number + " NC";
                                }
                            }

                        }

                    }

                }

        });

    }

    function draw_line_lux(amount , line_no){
        let line ;
        if( amount <= 32){
            line = `
                <div class="d-flex align-items-center mt-2">
                    <span style="color: #021B56;font-size: 14px;font-weight:bolder;">`+line_no+`</span>
                    <span class="w-100 m-2" style="border-top: #021B56 2px dashed;"></span>
                    <span style="color: #021B56;font-size: 14px;font-weight:bolder;">`+line_no+`</span>
                </div>
            `;
        }
        else{
            line = `
                <div class="d-flex align-items-center mt-2">
                    <span style="color: #ffffff;font-size: 14px;font-weight:bolder;">`+line_no+`</span>
                    <span class="w-100 m-2" style="border-top: #ffffff 2px dashed;"></span>
                    <span style="color: #ffffff;font-size: 14px;font-weight:bolder;">`+line_no+`</span>
                </div>
            `;
        }

        return line;
    }

    // เรียกอีกครั้ง สมาชิกในทีมของฉัน
    function re_create_html_member_in_team(group_id , week , type){
        console.log('เรียกใหม่ >> ' + group_id);
        create_html_member_in_team(group_id , week , type);
    }

    // สมาชิกในทีมของฉัน
    function create_html_member_in_team(group_id , week , type){

        // console.log(week);
        // console.log(typeof week);

        fetch("{{ url('/') }}/api/get_member_in_team_for_grand_mission" + "/" + group_id + "/" + week + "/" + type)
            .then(response => response.json())
            .then(member_in_team => {
                // console.log(member_in_team);

                let arr_sum_point = [];
                let arr_of_week = {};
                let sum_point_of_year = 0 ;
                let sum_point_of_month = 0 ;

                for (let xz = 0; xz < member_in_team.length; xz++) {

                    // let text_id_user = member_in_team[xz].user_id.toString();
                    if(type == 'pc'){

                        let grandmission_Value = 0 ;
                        let grandmission_formatted = 0 ;

                        if(week != "0"){
                            grandmission_Value = member_in_team[xz].grandmission;
                            grandmission_formatted = grandmission_Value.toLocaleString('en-UK', {maximumFractionDigits: 0});
                        }

                        let icon_me = ``;
                        if(member_in_team[xz].user_id == "{{ Auth::user()->id }}"){
                            icon_me = `my-rank`;
                        }

                        let html_tbody_content_ME = `
                            <tr >
                                <td class="${icon_me} text-center" style="position: relative;">
                                    `+parseInt(xz+1)+`
                                </td>
                                <td class="${icon_me} d-flex align-items-center">
                                    <img src="{{ url('storage')}}/`+member_in_team[xz].user_photo+`" class="profile-img" alt="รูปภาพปก">
                                    <span class="ms-2 nameUserteam">`+member_in_team[xz].user_name+`</span>
                                </td>
                                <td class=" ${icon_me} text-data-team text-center">
                                    `+grandmission_formatted+`
                                </td>
                            </tr>
                        `;
                        let tbody_content_ME = document.querySelector('#tbody_content_ME');
                        tbody_content_ME.insertAdjacentHTML('beforeend', html_tbody_content_ME); // แทรกล่างสุด
                    }
                    else if(type == 'nc'){
                        let new_code_Value = 0 ;
                        let new_code_formatted = 0 ;

                        if(week != "0"){
                            new_code_Value = member_in_team[xz].new_code;
                            new_code_formatted = new_code_Value.toLocaleString('en-UK', {maximumFractionDigits: 0});
                        }

                        let icon_me = ``;
                        if(member_in_team[xz].user_id == "{{ Auth::user()->id }}"){
                            icon_me = `my-rank`;
                        }

                        let html_tbody_content_ME = `
                            <tr >
                                <td class="${icon_me} text-center" style="position: relative;">
                                    `+parseInt(xz+1)+`
                                </td>
                                <td class="${icon_me} d-flex align-items-center">
                                    <img src="{{ url('storage')}}/`+member_in_team[xz].user_photo+`" class="profile-img" alt="รูปภาพปก">
                                    <span class="ms-2 nameUserteam">`+member_in_team[xz].user_name+`</span>
                                </td>
                                <td class=" ${icon_me} text-data-team text-center">
                                    `+new_code_formatted+`
                                </td>
                            </tr>
                        `;
                        let tbody_content_ME = document.querySelector('#tbody_content_ME');
                        tbody_content_ME.insertAdjacentHTML('beforeend', html_tbody_content_ME); // แทรกล่างสุด
                    }

                }

        })
        .catch(error => {
            // จัดการกับข้อผิดพลาดที่เกิดขึ้นที่นี่
            // console.log('error');
            // console.error('There was a problem with the fetch operation:', error);
            setTimeout(() => {
                re_create_html_member_in_team(group_id , week , type);
            }, 1000);
        });

    }

    // เรียกอีกครั้ง สมาชิกในทีมของทุกทีม
    function re_create_html_all_member(group_id , week , type){
        console.log('เรียกใหม่ >> ' + group_id);
        create_html_all_member(group_id , week , type)
    }

    // สมาชิกในทีมของทุกทีม
    function create_html_all_member(group_id , week , type){

        // console.log(typeof week);
        fetch("{{ url('/') }}/api/get_member_in_team_for_grand_mission" + "/" + group_id + "/" + week + "/" + type)
            .then(response => response.json())
            .then(member_in_team => {
                // console.log(group_id);
                // console.log(member_in_team);

                let arr_sum_point = [];
                let arr_of_week = {};
                let sum_point_of_year = 0 ;
                let sum_point_of_month = 0 ;

                for (let xz = 0; xz < member_in_team.length; xz++) {

                    // let text_id_user = member_in_team[xz].user_id.toString();

                    if(type == 'pc'){

                        let grandmission_Value = 0 ;
                        let grandmission_formatted = 0 ;

                        if(week != "0"){
                            grandmission_Value = member_in_team[xz].grandmission;
                            grandmission_formatted = grandmission_Value.toLocaleString('en-UK', {maximumFractionDigits: 0});
                        }

                        let html_tbody_content_ME = `
                            <tr>
                                <td class="text-center">
                                    `+parseInt(xz+1)+`
                                </td>
                                <td class="d-flex align-items-center">
                                    <img src="{{ url('storage')}}/`+member_in_team[xz].user_photo+`" class="profile-img" alt="รูปภาพปก">
                                    <span class="ms-2 nameUserteam">`+member_in_team[xz].user_name+`</span>
                                </td>
                                <td class="text-data-team text-center">
                                    `+grandmission_formatted+`
                                </td>
                            </tr>
                        `;

                        let tbody_content = document.querySelector('#tbody_content_id_'+group_id);
                        tbody_content.insertAdjacentHTML('beforeend', html_tbody_content_ME); // แทรกล่างสุด
                    }
                    else if(type == 'nc'){

                        let new_code_Value = 0 ;
                        let new_code_formatted = 0 ;

                        if(week != "0"){
                            new_code_Value = member_in_team[xz].new_code;
                            new_code_formatted = new_code_Value.toLocaleString('en-UK', {maximumFractionDigits: 0});
                        }

                        let html_tbody_content_ME = `
                            <tr>
                                <td class="text-center">
                                    `+parseInt(xz+1)+`
                                </td>
                                <td class="d-flex align-items-center">
                                    <img src="{{ url('storage')}}/`+member_in_team[xz].user_photo+`" class="profile-img" alt="รูปภาพปก">
                                    <span class="ms-2 nameUserteam">`+member_in_team[xz].user_name+`</span>
                                </td>
                                <td class="text-data-team text-center">
                                    `+new_code_formatted+`
                                </td>
                            </tr>
                        `;

                        let tbody_content = document.querySelector('#tbody_content_id_'+group_id);
                        tbody_content.insertAdjacentHTML('beforeend', html_tbody_content_ME); // แทรกล่างสุด

                    }

                }
        })
        .catch(error => {
            // จัดการกับข้อผิดพลาดที่เกิดขึ้นที่นี่
            // console.log('error');
            // console.error('There was a problem with the fetch operation:', error);
            setTimeout(() => {
                re_create_html_all_member(group_id , week , type);
            }, 1000);
        });

    }

</script>


<script>
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