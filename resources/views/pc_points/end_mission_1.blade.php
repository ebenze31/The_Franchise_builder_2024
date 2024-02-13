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
        background-color: #00368D;
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
        position: relative;
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
</style>

<div id="div_data_all"></div>

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
                    <p class="nameTeam">Team : 1</p>
                    <p class="nameTeam">PC <span id="">10000000</span></p>
                </div>
            </div>
           
            <div class="statusTeam text-center w-100 d-flex justify-content-end">
               <a href="" class="btn px-3" style="background-color: #FCBF29;color:#07285A;font-size: 15px;font-weight: bolder;">
                ทีมของฉัน
               </a>

               <span style="position: absolute;top: 0; right: 0;background-color: #FF3A3A;color: #fff;width: 20px;height: 20px;display: flex;align-items: center;justify-content: center;-webkit-border-radius: 50%;border-radius: 50%;-moz-border-radius:50%;-khtml-border-radius:50%;">!</span>
            </div>
        </div>
    </div>

    <div class="mb-2" id="content_ME">
        <div class="my-team">
            <div class="number-my-team w-100">คุณยังไม่มีบ้าน</div>
            <div class="statusTeam text-center w-100 d-flex justify-content-end">
               <a href="" class="btn px-3" style="background-color: #FCBF29;color:#07285A;font-size: 15px;font-weight: bolder;">
                จัดทีมใหม่
               </a>
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
<!-- moda -->
<button id="btn_mission_success" class="d-none" data-toggle="modal" data-target="#mission_success">
    sorry na
</button>

<div class="modal fade" style="z-index:999999999" id="mission_success" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered px-3">
        <div class="modal-content " style="border-radius: 10px; margin: 0 40px;">
            <div id="modal_body_content"  class="modal-body text-center pb-0">
                <div class="px-3 mt-2">
                    <img src="{{ url('/img/icon/sorry2.png') }}"  class="mt-2 mb-2 w-80">
                </div>             
                <p style="color: #3055CD;font-size: 18px;font-style: normal;font-weight: 700;line-height: normal;" class="mt-3 mb-0">ขออภัย !</p>
                <p class="mt-0" style="color: #3055CD;font-size: 12px;font-style: normal;font-weight: 700;line-height: normal;">
                เนื่องจาก PC ของคุณไม่ผ่าเกณฑ์ที่กำหนด
                </p>
            </div>
            <div class="d-flex justify-content-center mt-1 mb-3">
                <a  type="button" class="btn btn-submit padding-btn" data-dismiss="modal">
                    Close
                </a>
            </div>
            
        </div>
    </div>
</div>



<button id="btn_modal_show_perefct_team" class="d-none" data-toggle="modal" data-target="#show_status_in_team" onclick="show_status_in_mission('perfect_team')">
    perefct_team
</button>
<button id="btn_modal_show_team_success" class="d-none" data-toggle="modal" data-target="#show_status_in_team" onclick="show_status_in_mission('team_success')">
   team_success
</button>
<button id="btn_modal_show_you_success" class="d-none" data-toggle="modal" data-target="#show_status_in_team" onclick="show_status_in_mission('you_success')">
   you_success
</button>
<button id="btn_modal_show_new_host" class="d-none" data-toggle="modal" data-target="#show_status_in_team" onclick="show_status_in_mission('new_host')">
   new_host
</button>
<button id="btn_modal_show_you_lost" class="d-none" data-toggle="modal" data-target="#show_status_in_team" onclick="show_status_in_mission('you_lost')">
    you_lost
</button>

<div class="modal fade" style="z-index:999999999" id="show_status_in_team" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered px-3">
        <div class="modal-content " style="border-radius: 10px; margin: 0 40px;">
            <div id="modal_body_content"  class="modal-body text-center p-0 ">
                <div class="p-0 m-0">
                    <img src="{{ url('/img/icon/sorry2.png') }}" id="img_modal_show_status_in_team" class="mt-2 mb-0 w-100">
                </div>     
                <div id="text_show_status_in_team">

                </div>        
                <!-- <p style="color: #3055CD;font-size: 18px;font-style: normal;font-weight: 700;line-height: normal;" class="mt-0 mb-0">ขออภัย !</p>
                <p class="mt-0" style="color: #3055CD;font-size: 12px;font-style: normal;font-weight: 700;line-height: normal;">
                เนื่องจาก PC ของคุณไม่ผ่าเกณฑ์ที่กำหนด
                </p> -->
            </div>
            <div id="btn_footer" class="d-flex justify-content-center mt-1 mb-3">
                <!--  -->
            </div>
        </div>
    </div>
</div>


<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.js'></script>

<script>
    
    function check_end_mission_1(){

        if("{{ Auth::user()->role }}" == "Player_OUT"){
            document.querySelector('#btn_modal_show_you_lost').click();
            let seconds = 10;
            let countdownTimer = setInterval(function() {
                // console.log(seconds);
                document.querySelector('#span_countdown_logout').innerHTML = seconds;
                seconds--;
                if (seconds < 0) {
                    clearInterval(countdownTimer);
                    // console.log("หมดเวลา!");
                    document.querySelector('#btn_go_to_logout').click();
                }
            }, 1000); // 1000 milliseconds = 1 วินาที
        }
        else if("{{ Auth::user()->remark }}" == "new_host"){
            document.querySelector('#btn_modal_show_new_host').click();
        }
        else if("{{ Auth::user()->role }}" == "Player" && !"{{ Auth::user()->group_id }}"){
            document.querySelector('#btn_modal_show_you_success').click();
        }
        else{
            fetch("{{ url('/') }}/api/check_role_end_mission_1" + "/" + "{{ Auth::user()->id }}")
                .then(response => response.text())
                .then(data => {
                    // console.log(data);

                    if(data == "perfect_team"){
                        document.querySelector('#btn_modal_show_perefct_team').click();
                    }
                    else if(data == "team_success"){
                        document.querySelector('#btn_modal_show_team_success').click();
                    }

            });
        }

    }

    function show_status_in_mission(status) {
        img_show = document.querySelector('#img_modal_show_status_in_team');
        text_show_status = document.querySelector('#text_show_status_in_team');

        let btn_footer ;

        switch (status) {
            case 'perfect_team':
                img_show.src = "{{ url('img/icon')}}/" + status+'.png' ;
                text_show_status.innerHTML = `
                    <div class="p-2 pb-0" style="margin-top:-30px">
                    <p class="mb-2 " style="color:#005CD3;font-size:14px;">ขอแสดงความยินดีทีมและสมาชิกทั้งหมด<br>ของทีมคุณได้ไปต่อ!</p>
                    <p class="mb-0 " styl="color:#000;font-size:12px;font-whight:light;">เตรียมพบกับ missionใหม่วันที่ 4 มีนาคม 2024</p>
                    </div>
                `;

                btn_footer = `
                    <a  type="button" class="btn btn-submit padding-btn" data-dismiss="modal">
                        Close
                    </a>
                `;

                document.querySelector('#btn_footer').innerHTML = btn_footer ;
            break;
            case 'team_success':
                img_show.src = "{{ url('img/icon')}}/" + status+'.png';
                text_show_status.innerHTML = `
                    <div class="p-4 pb-0" style="margin-top:-30px">
                        <p class="mb-2 " style="color:#005CD3;font-size:14px;">ขอแสดงความยินดีคุณได้ไปต่อ!</p>
                        <p class="mb-0 " styl="color:#000;font-size:12px;font-whight:light;">เนื่องจากสมาชิกบางท่านไม่ผ่านเกณฑ์หัวหน้าทีม
                        <color style="color:#935F0B;">ต้องรวบรวมสมาชิกใหม่ให้ครบ 10 </color>
                        ภายใน 
                        <color style="color:#FF3838;">26 กพ. 2024 </color>
                        เพื่อให้ทีมยังอยู่ในกิจกรรมต่อไป
                        
                        <color style="color:#935F0B;">และเตรียมพบกับ 
                        <i>mission</i> ใหม่ วันที่ 4 มีนาคม 2024</color></p>
                    </div>
                `;

                btn_footer = `
                    <a  type="button" class="btn btn-submit padding-btn" data-dismiss="modal">
                        Close
                    </a>
                `;

                document.querySelector('#btn_footer').innerHTML = btn_footer ;
            break;
            case 'you_success':
                img_show.src = "{{ url('img/icon')}}/" + status+'.png';
                text_show_status.innerHTML = `
                    <div class="p-4 pb-0" style="margin-top:-30px">
                        <p class="mb-2 " style="color:#005CD3;font-size:14px;">ขอแสดงความยินดีคุณได้ไปต่อ!</p>
                        <p class="mb-0 " styl="color:#000;font-size:12px;font-whight:light;">
                            แต่เนื่องจากผลงานรวมของบ้านไม่ถึงเกณฑ์
                            คุณมีเวลาถึงวันที่ <color style="color:#FF3838">26 ก.พ. 2024</color> เพื่อ<color style="color:#05ADD0">เลือกเข้าบ้านหลังใหม่</color>
                            <color style="color:#935F0B ">และเตรียมพบกับ mission ใหม่ วันที่ 4 มีนาคม 2024</color>
                        </p>
                    </div>
                `;

                btn_footer = `
                    <a  type="button" class="btn btn-submit padding-btn" data-dismiss="modal">
                        Close
                    </a>
                `;

                document.querySelector('#btn_footer').innerHTML = btn_footer ;
            break;
            case 'new_host':
                img_show.src = "{{ url('img/icon')}}/" + status+'.png';
                text_show_status.innerHTML = `
                    <div class="p-3 pb-0" style="margin-top:-30px">
                    <p class="mb-2 " style="color:#005CD3;font-size:14px;">คุณได้รับมอบหมายหน้าที่เป็นหัวหน้าทีม ! </p>
                    <p class="mb-0 " styl="color:#000;font-size:12px;font-whight:light;">เนื่องจากหัวหน้าทีมของคุณไม่ผ่านเกณฑ์ <i>mission1</i> </p>
                    </div>
                `;

                btn_footer = `
                    <a  type="button" class="btn btn-submit padding-btn" data-dismiss="modal">
                        Close
                    </a>
                `;

                document.querySelector('#btn_footer').innerHTML = btn_footer ;
            break;
            case 'you_lost':
                img_show.src = "{{ url('img/icon')}}/" + status+'.png';
                text_show_status.innerHTML = `
                    <div class="p-3 pb-0" style="margin-top:-30px">
                    <p class="mb-0 " styl="color:#000;font-size:12px;font-whight:light;"><b>ขอแสดงความเสียใจคุณไม่ผ่านเกณฑ์เพื่อไปต่อใน 
                    <i>Franchise Builder 2024</i> </b></p>
                    </div>
                `;

                btn_footer = `
                    <a id="btn_go_to_logout" type="button" class="btn btn-submit padding-btn" data-dismiss="modal" onclick="create_logs('logout')">
                        Close (<span id="span_countdown_logout"></span>)
                    </a>
                    <a class="d-none" href="{{ route('logout') }}" id="btn-logout" onclick="event.preventDefault();document.getElementById('logout-form').submit();" style="position: absolute;top:10px;right: 20px;">
                    </a>
                `;

                document.querySelector('#btn_footer').innerHTML = btn_footer ;

            break;
            default:
            break;
        }
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