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
            <p id="name_rank_2" class="number-team"></p>
            <p id="score_rank_2" class="score-team" style="color: #E7C517!important;"></p>
        </div>
        <div class="col-4 text-center">
            <p class="number-top-rank">No.1</p>
            <img id="img_rank_1" src="{{ url('/img/icon/profile.png') }}" class="main-rank-img" alt="รูปภาพปก">
            <p id="name_rank_1" class="number-team"></p>
            <p id="score_rank_1" class="score-team" style="color: #E7C517!important;"></p>
        </div>
        <div class="col-4 text-center sub-rank">
            <p class="number-top-rank">No.3</p>
            <img id="img_rank_3" src="{{ url('/img/icon/profile.png') }}" class="sub-rank-img" alt="รูปภาพปก">
            <p id="name_rank_3" class="number-team"></p>
            <p id="score_rank_3" class="score-team" style="color: #E7C517!important;"></p>
        </div>
    </div>
</div>
@php
    $activeGroupsCount = App\Models\Group::where('active', 'Yes')
        ->where('status', 'ยืนยันเรียบร้อย')
        ->count();

    $menu_row = ceil($activeGroupsCount / 20) ;
    $start = 1 ;
    $end = 20 ;
@endphp

<a id="click_to_div_data_all" href="#div_data_all" class="d-none"></a>

<div class=" sticky"  >
    <div class="nav-menu"id="div_menu_view">
    <div class="btn-group owl-carousel owl-theme owl-nav-nemu" role="group" aria-label="First group">
        @for ($i=1; $i <= $menu_row; $i++)

            @php
                $check_active = '';
                if($start == 1){
                    $check_active = 'btn-sort-group-active' ;
                }
            @endphp
            @if($i==$menu_row) 
                <div class="item text-center py-2">
                    <button btn="menu_view" id="btn_view_{{ $start }}_{{ $activeGroupsCount }}" type="button" class="btn btn-sort-group text-center mt-1 {{ $check_active }}" onclick="change_menu_view('{{ $start }}-{{ $activeGroupsCount }}' , 'No');" style="font-size: 12px!important;">
                       ลำดับที่ {{ $start }} - {{ $activeGroupsCount }}
                    </button>
                </div>
            @else
                <div class="item text-center py-2">
                    <button btn="menu_view" id="btn_view_{{ $start }}_{{ $end }}" type="button" class="btn btn-sort-group text-center mt-1 {{ $check_active }}" onclick="change_menu_view('{{ $start }}-{{ $end }}' , 'No');" style="font-size: 12px!important;">
                       ลำดับที่ {{ $start }} - {{ $end }}
                    </button>
                </div>
            @endif

            @php
                $start = $start + 20 ;
                $end = $end + 20 ;
            @endphp

        @endfor
        
    </div>
    @if($menu_row > 0)
        <div class="owl-carousel__prev"><i class="fa-solid fa-caret-right fa-rotate-180"></i></div>
        <div class="owl-carousel__next"><i class="fa-solid fa-caret-right"></i></div>
    @endif
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
        <div  style="min-width: 65px !important;max-width: 65px !important;margin-right: 10px;">Mission 1</div>
        <div style="min-width: 65px !important;max-width: 65px !important;">Last week</div>
    </div>
</div>

<script>
    
    function change_menu_view(type_get_data , first){

        @if($menu_row > 0)
        type_get_data = type_get_data.replace("-", "_");

        let menu_view = document.querySelectorAll('[btn="menu_view"]');
        menu_view.forEach(menu_view => {
            menu_view.setAttribute('class', 'btn btn-sort-group mt-1');
        });

        document.querySelector('#btn_view_' + type_get_data).setAttribute('class', 'btn btn-sort-group-active');

        let team_start = type_get_data.split('_')[0];
        let team_end = type_get_data.split('_')[1];

        let other_team = document.querySelectorAll('.other-team');
        other_team.forEach(item => {
            // console.log(item);
            item.classList.add('d-none');
        })

        let collapse = document.querySelectorAll('.collapse');
        collapse.forEach(item_collapse => {
            // console.log(item_collapse);
            item_collapse.classList.remove('show');
        })

        for (let i = parseInt(team_start); i <= parseInt(team_end); i++) {
            // if (document.querySelector('#Team_' + i)) {
            if (document.querySelector('div[count="div_'+i+'"]')) {
                // document.querySelector('#Team_' + i).classList.remove('d-none');
                document.querySelector('div[count="div_'+i+'"]').classList.remove('d-none');

            }
        }

        if(first == 'No'){
            document.querySelector('#click_to_div_data_all').click();
        }
        @endif

    }

</script>

<div class="contentSection">

    <!-- ของตัวเอง -->
    <div class="mb-2" id="content_ME">
        <div class="my-team">
            <div class="number-my-team w-100">คุณไม่มีทีม</div>
            <div class="statusTeam text-center w-100 d-flex justify-content-end">
               <a href="{{ url('/groups') }}" class="btn px-3" style="background-color: #FCBF29;color:#07285A;font-size: 15px;font-weight: bolder;">
                จัดทีมใหม่
               </a>
            </div>
        </div>
    </div>

    <!-- เรียงตามลำดับ -->
    <div id="content_ASC">
        <!--  -->
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

<script>
    document.addEventListener('DOMContentLoaded', (event) => {
        // console.log("START");
        change_menu_bar('mission-1');
        first_get_data_rank('team');
        get_data_rank('end_mission_1');
        check_end_mission_1();
    });

    var score_mission1_of_team = 0 ;
    var amount_member_50k = 0 ;

    function first_get_data_rank(type){

        fetch("{{ url('/') }}/api/get_data_rank" + "/" + type)
            .then(response => response.json())
            .then(result => {
            // console.log(result);

            if(result){
                setTimeout(() => {

                    let week = result['week'];

                    let as_of = result['as_of'];
                    let datePart = as_of.substring(0, 10); // 2024-01-31

                    let parts = datePart.split('-'); // แยกวันที่เป็นส่วนย่อย
                    let formattedDate = parts[2] + '/' + parts[1] + '/' + parts[0]; // ประกอบวันที่ใหม่ในรูปแบบที่ต้องการ

                    let count_div = 1 ;

                    for (let i = 0; i < result['data'].length; i++) {

                        let count_member = 0;

                        let pc_point_arr = [];

                        let pc_point ;
                        let mission1 ;
                        if(result['data'][i].rank_of_week){
                            count_member = JSON.parse(result['data'][i].member).length;
                            pc_point_arr = JSON.parse(result['data'][i].rank_record);
                            pc_point = pc_point_arr[week]['pc_point'] ;
                            mission1 = pc_point_arr[week]['mission1'] ;
                        }
                        else{
                            pc_point = 0 ;
                            mission1 = 0 ;
                        }

                        // console.log(pc_point);
                        
                        let text_id_group = result['data'][i].id.toString();
                        let originalNumber = pc_point;
                        // let formattedNumber = formatLargeNumber(originalNumber);
                        let formattedNumber = formatLargeNumber(mission1);

                        if(week != "0"){
                            if(i == 0 || i == 1 || i == 2){

                                let iii = i + 1 ;
                                document.querySelector('#img_rank_'+iii).setAttribute('src' , `{{ url('/img/group_profile/profile/id (`+text_id_group+`).png') }}`);
                                document.querySelector('#name_rank_'+iii).innerHTML = "Team " + result['data'][i].name_group;
                                document.querySelector('#score_rank_'+iii).innerHTML = formattedNumber;
                            }
                        }

                    }

                }, 500);
            }
        });

    }

    function get_data_rank(type){

        fetch("{{ url('/') }}/api/get_data_rank" + "/" + type)
            .then(response => response.json())
            .then(result => {
            // console.log(result);

            let content_ASC = document.querySelector('#content_ASC');
            let content_ME = document.querySelector('#content_ME');

            if(result){
                setTimeout(() => {

                    let week = result['week'];

                    let as_of = result['as_of'];
                    let datePart = as_of.substring(0, 10); // 2024-01-31

                    let parts = datePart.split('-'); // แยกวันที่เป็นส่วนย่อย
                    let formattedDate = parts[2] + '/' + parts[1] + '/' + parts[0]; // ประกอบวันที่ใหม่ในรูปแบบที่ต้องการ

                    let count_div = 1 ;

                    for (let i = 0; i < result['data'].length; i++) {

                        let count_member = 0;

                        let pc_point_arr = [];

                        let pc_point ;
                        let mission1 ;
                        if(result['data'][i].rank_of_week){
                            count_member = JSON.parse(result['data'][i].member).length;
                            pc_point_arr = JSON.parse(result['data'][i].rank_record);
                            pc_point = pc_point_arr[week]['pc_point'] ;
                            mission1 = pc_point_arr[week]['mission1'] ;
                        }
                        else{
                            pc_point = 0 ;
                            mission1 = 0 ;
                        }

                            // console.log(pc_point);

                        let originalNumber = pc_point;
                        // let formattedNumber = formatLargeNumber(originalNumber);
                        let formattedNumber = formatLargeNumber(mission1);

                        if (mission1 > 700000) {
                            img_trophy = ` <img class="ms-2" src="{{ url('/img/icon/trophy.png') }}" style="width: 21px;height: 21px;flex-shrink: 0;" alt="">`;
                        } else {
                            img_trophy = ``;
                        }

                        let rank_up ;
                        if( parseInt(result['data'][i].rank_of_week) < parseInt(result['data'][i].rank_last_week) ){
                            rank_up = `<i class="fa-solid fa-triangle rankUP"></i>`;
                        }else if(parseInt(result['data'][i].rank_of_week) > parseInt(result['data'][i].rank_last_week)){
                            rank_up = `<i class="fa-solid fa-triangle fa-flip-vertical rankDOWN"></i>`;
                        }else{
                            rank_up = `<i class="fa-solid fa-hyphen fa-2xl rankNORMAL"></i>`;
                        }

                        let text_id_group = result['data'][i].id.toString();
                        let html ;

                        if("{{ Auth::user()->role }}" == "Player" || "{{ Auth::user()->role }}" == "QR"){

                            html = `
                                <div count="div_`+count_div+`" class="other-team">
                                    <div class="number-my-team">`+result['data'][i].rank_of_week+`</div>
                                    <img src="{{ url('/img/group_profile/profile/id (`+text_id_group+`).png') }}" class="profileTeam" alt="">
                                    <div class="detailTeam">
                                        <div>
                                            <p class="nameTeam">Team `+result['data'][i].name_group+`${img_trophy}</p>
                                        </div>
                                    </div>
                                    <div class="score-my-team">
                                        <span class="text-score" style="color: #E7C517!important;">`+formattedNumber+`</span>
                                        <span class="text-point"> PC</span>

                                    </div>
                                    <div class="statusTeam text-center">
                                        <div> 
                                            `+rank_up+`
                                            <p class="statusNumber ">`+result['data'][i].rank_last_week+`</p>
                                        </div>
                                    </div>
                                </div>
                            `;

                            if(result['data'][i].rank_of_week){
                                content_ASC.insertAdjacentHTML('beforeend', html); // แทรกล่างสุด
                            }
                            
                        }
                        else{

                            html = `
                                <div count="div_`+count_div+`" class="other-team" data-toggle="collapse" href="#data_team_id_`+text_id_group+`" role="button" aria-expanded="false" aria-controls="collapseExample">
                                    <div class="number-my-team">`+result['data'][i].rank_of_week+`</div>
                                    <img src="{{ url('/img/group_profile/profile/id (`+text_id_group+`).png') }}" class="profileTeam" alt="">
                                    <div class="detailTeam">
                                        <div>
                                            <p class="nameTeam">Team `+result['data'][i].name_group+`${img_trophy}</p>
                                        </div>
                                    </div>
                                    <div class="score-my-team">
                                        <span class="text-score" style="color: #E7C517!important;">`+formattedNumber+`</span>
                                        <span class="text-point"> PC</span>

                                    </div>
                                    <div class="statusTeam text-center">
                                        <div>
                                            `+rank_up+`
                                            <p class="statusNumber ">`+result['data'][i].rank_last_week+`</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="collapseContent">
                                    <div class="collapse p-0" id="data_team_id_`+text_id_group+`">
                                        <div class="dataTeam" style="padding: 12px 8px 8px 8px;">
                                            <div class="table-responsive">
                                                <table class="table mb-0 align-middle table-borderless">
                                                    <thead class="head-teble-data-my-team">
                                                        <tr>
                                                            <th class="text-center" style>
                                                                <p>No.</p><br>

                                                                <p></p>
                                                            </th>
                                                            <th class="text-center" style>
                                                                <p>User</p><br>

                                                                <p></p>
                                                            </th>
                                                            <th class="text-center" style>
                                                                <p>Mission 1</p>
                                                                <small style="font-size: 7px;">As of  : `+formattedDate+`</small>
                                                            </th>
                                                            <th class="text-center" style>
                                                                <p>YTD-PC</p><br>

                                                                <p></p>
                                                            </th>
                                                            <!-- <th class="text-center d-flex align-items-top">MTD-Case
                                                            </th>
                                                            <th class="text-center">
                                                                <p>Active AG</p>
                                                                <small style="font-size: 7px;">(include self)</small>
                                                            </th> -->
                                                        </tr>
                                                    </thead>
                                                    <tbody id="tbody_content_id_`+text_id_group+`">
                                                        <!-- ข้อมูลสมาชิก -->
                                                    </tbody>
                                                </table>

                                                <a style="float:right;margin:10px 10px 5px 0px;color: #FFF;font-size: 10px;font-style: normal;font-weight: 500;line-height: normal;text-decoration-line: underline;" href="{{ url('group_show_score')}}/`+result['data'][i].id+`">ดูรายละเอียดเพิ่มเติม</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            `;

                            if(result['data'][i].rank_of_week){
                                content_ASC.insertAdjacentHTML('beforeend', html); // แทรกล่างสุด
                            }
                        }

                        count_div++ ;

                        // ของตัวเอง
                        if(result['data'][i].id == "{{ Auth::user()->group_id }}"){

                            let html_me = ``;
                            let html_request_join = ``;

                            if(result['data'][i].host == "{{ Auth::user()->id }}" && result['data'][i].request_join){
                                html_request_join = `
                                    <span style="position: absolute;top: 0; right: 0;background-color: #FF3A3A;color: #fff;width: 20px;height: 20px;display: flex;align-items: center;justify-content: center;-webkit-border-radius: 50%;border-radius: 50%;-moz-border-radius:50%;-khtml-border-radius:50%;">!</span>
                                `;
                            }

                            if("{{ Auth::user()->group_status }}" == "มีบ้านแล้ว" || "{{ Auth::user()->group_status }}" == "ยืนยันการสร้างบ้านแล้ว"){
                                html_me = `
                                    <div class="my-team">
                                        <div class="number-my-team">`+result['data'][i].rank_of_week+`</div>
                                        <img src="{{ url('/img/group_profile/profile/id (`+text_id_group+`).png') }}" class="profileTeam" alt="">
                                        <div class="detailTeam">
                                            <div>
                                                <p class="nameTeam">Team `+result['data'][i].name_group+`</p>
                                                <p class="nameTeam" style="color: #E7C517!important;">
                                                    PC <span id="">`+formattedNumber+`</span>
                                                </p>
                                            </div>
                                        </div>
                                       
                                        <div class="statusTeam text-center w-100 d-flex justify-content-end">
                                           <a href="{{ url('/group_my_team') . "/" . Auth::user()->group_id }}" class="btn px-3" style="background-color: #FCBF29;color:#07285A;font-size: 15px;font-weight: bolder;">
                                            My team
                                           </a>

                                           `+html_request_join+`
                                        </div>
                                    </div>
                                `;
                            }
                            else if("{{ Auth::user()->group_status }}" == "กำลังขอเข้าร่วมบ้าน" || "{{ Auth::user()->group_status }}" == "Host Accept" || "{{ Auth::user()->group_status }}" == "Host Reject" || "{{ Auth::user()->group_status }}" == "Team Ready"){

                                html_me = `
                                    <div class="my-team">
                                        <div class="detailTeam">
                                            <div>
                                                <p>ตรวจสอบสถานะการขอเข้าร่วม</p>
                                                <p class="nameTeam">
                                                    Team : `+result['data'][i].name_group+`
                                                </p>
                                            </div>
                                        </div>
                                       
                                        <div class="statusTeam text-center w-100 d-flex justify-content-end">
                                           <a href="{{ url('/preview_team') . "/" . Auth::user()->group_id }}" class="btn px-3" style="background-color: #FCBF29;color:#07285A;font-size: 15px;font-weight: bolder;">
                                                สถานะของคุณ
                                           </a>
                                        </div>
                                    </div>
                                `;

                            }

                            document.querySelector('#content_ME').classList.remove('d-none');
                            content_ME.innerHTML = '' ;
                            content_ME.insertAdjacentHTML('beforeend', html_me); // แทรกล่างสุด

                        }

                    }

                    change_menu_view('1-20' , 'Yes');

                }, 500);
            }
        });

    }

    function formatLargeNumber(number) {
        // if (number >= 1e6) { // 1e6 = 1,000,000
        //     return (number / 1e6).toFixed(3).slice(0, -1) + 'M';
        // } else {
        //     return number.toLocaleString();
        // }

        return number.toLocaleString();

    }
</script>

@endsection