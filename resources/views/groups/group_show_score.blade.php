@extends('layouts.theme_user')

@section('content')
<style>
    .header-team {
        position: relative;
        margin-top: 55px;
        padding: 5px 15px 15px 15px;
        background: rgb(7, 139, 166);
        background: linear-gradient(180deg, rgba(7, 139, 166, 1) 0%, rgba(40, 63, 136, 1) 51%, rgba(8, 49, 90, 1) 84%, rgba(11, 40, 70, 1) 100%);
        border-radius: 10px 0 0 0;
        display: flex;
        align-items: center;


    }

    .header-team img {
        width: 100px;
        height: 100px;
        position: absolute;
        bottom: 0;
        left: 15px;
    }

    .header-team .detail-team {
        text-indent: 120px;
        color: #fff;
        font-weight: lighter;
    }

    .content-section {
        padding: 0;
    }.memberInRoom{
        padding: 0px 10px 10px 15px;
    }

    .member-section {
    width: 100%;
  }

  @media only screen and (max-width: 680px) {
        .member-item{
            width: 30%;
            height: 128px;
            margin: 0 2px;
        }
         
        .member-section{
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            margin-top: 20px;
            width: 100%;
        }
    }

    @media only screen and (min-width: 680px) {
        .member-item{
            width: 150px;
            height: 128px;
            margin: 0 10px;
        }
         
        .member-section{
            display: flex;
            flex-wrap: wrap;
            margin-top: 20px;
            width: 100%;
            

        }
    }.member-card{
        background-color: #fff;
        padding: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 10px;
        position: relative;
    }.member-card-join{
        background-color: #fff;
        padding: 10px;
        border-radius: 10px;
        position: relative;
    }.host-member{
        position:absolute;
        right: -10px;
        top: -10px;
        background-color: #fff;
        border-radius: 50%;
        width: 31px;
        height: 31px;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        padding: 2px 0 0 0;
    }.host-member i{
        margin-left: 5px;
        /* margin-top: 0px; */
        font-size: 17px;
    }.img-member{
        width: 100%;
height: 87px;
        /* outline: 1px solid #000; */
        border-radius: 5px;
        -webkit-border-radius: 5px; 
    -moz-border-radius: 5px;
        object-fit: cover;
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

  }#header-text-login {
        width: 45% !important;
    }
</style>

<div class="div-btn-back">
    <a href="{{ url('/ranking_by_team') }}" class="btn btn-sm btn-back  mt-3" >
       <i class="fa-solid fa-chevron-left"></i>
    </a>
</div>

<button id="btn_mission_success" class="d-none" style="margin-top: -500px;" data-toggle="modal" data-target="#mission_success"></button>

<div class="d-flex header-team">
    <img src="{{ url('/img/group_profile/profile/id (') . $group_id . ').png' }}" width="114" height="114" class="mt-2 mb-2 img-header-team">
    <div class="d-flex justify-content-between w-100" >
        <div class="detail-team"style="white-space: nowrap;  overflow: hidden;  text-overflow: ellipsis;width:65%">
            <h1 class="mb-0" style="color: #FFF;font-size: 24px;font-style: normal;font-weight: 400;line-height: 1.5;">
                Team {{ $group_id }}
            </h1>
            <!-- <p style="color: #FCBF29;font-family: Inter;font-size: 12px;font-style: normal;font-weight: 700;line-height: normal;">
                PC : xxxxxxx
            </p> -->
            <div>
                <div>
                    <span style="color: #FCBF29;font-size: 12px;font-style: normal;font-weight: 700;line-height: 1;">Mission #1PC 
                        <span id="trophy_for_700K" class="d-none"><img src="{{ url('/img/icon/trophy.png') }}" style="width: 16px;height:16px;position: relative!important;left: 5px !important;"></span>
                    
                    </span>
                    <p id="span_sum_score_team" style="color: #FCBF29;font-size: 12px;font-style: normal;font-weight: 700;line-height: 1;">88,888,888</p>
                    
                        
                    </span>
                </div>
            </div>
        </div>
        <div class="d-flex align-items-center float-end">
            <div>
                <p style="color: #fff;font-size: 14px;font-style: normal;font-weight: 500;line-height: normal;float:right;width: 100%;">Minimum PC 50K</p>
                <div>
                    <div class="float-end" style="margin-top:-1px">
                        <i class="fa-regular fa-user text-white me-2"></i>
                        <span style="color: #FCBF29;font-size: 12px;font-style: normal;font-weight: 700;line-height: normal;"><span id="span_amount_member_50k"></span>/10</span>
                    </div>
                </div>
            </div>
        </div>
        <span style="position: absolute;bottom: 5px; right: 15px;color: #FFF;font-size: 7px;font-style: normal;font-weight: 500;line-height: normal;">
            As of  : <span id="date_as_of"></span>
        </span>
    </div>
</div>
<div class="d-flex  justify-content-between w-100 pt-4" style="padding: 0 18px;">
    <div class="d-flex align-items-center" >
        <span style="color: #05ADD0;font-size: 20px;font-style: normal;font-weight: 600;line-height: normal;">Members : </span><span style="color: #F4F4F4;font-size: 18px;font-style: normal;font-weight: 400;line-height: normal;margin-left: 5px;">Team {{ $group_id }}</span>
    </div>
    <div class="d-flex align-items-center float-end">
        <div>
            <img src="{{ url('/img/icon/mission-1.png') }}" style="width: 120px;height: 14px;" alt="">
            
        </div>
    </div>
</div>
<div style="padding: 0 18px;">
    <div class="float-end mt-0" style="color: #fff;font-size: 12px;font-style: normal;font-weight: 700;line-height: normal;">
        <span id="span_amount_Active_dream"></span>/10
    </div>
</div>

<div class="memberInRoom">
    <div class="member-section mt-4" id="div_content_data">

        <!-- DATA -->
   
    </div>
</div>


<!-- moda -->

<div class="modal fade" style="z-index:999999999" id="mission_success" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered px-3">
        <div class="modal-content " style="border-radius: 10px; margin: 0 40px;">
            <div id="modal_body_content"  class="modal-body text-center pb-0">
                <div class="px-3">
                    <img src="{{ url('/img/icon/mission_success.png') }}"  class="mt-2 mb-2 w-100">
                </div>
                <p id="title_mission_success" class="mt-1" style="color: #1F1F1F;text-align: center;font-size: 14px;font-style: normal;font-weight: 600;line-height: normal;">
                    <b>ยินดีด้วย <br>
                        คุณมี PC สะสมครบ 50,000 <br>
                        ได้สำเร็จ!
                    </b>
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


<script>
    
    document.addEventListener('DOMContentLoaded', (event) => {
        // console.log("START");
        get_data_group_show_score();
    });

    var sum_score_of_team = 0 ;
    var amount_member_50k = 0 ;
    var amount_Active_dream = 0 ;
    var score_of_me = 0 ;

    function get_data_group_show_score(){

        fetch("{{ url('/') }}/api/get_data_group_show_score" + "/" + "{{ $group_id }}")
            .then(response => response.json())
            .then(result => {
            // console.log(result);

            let as_of = result['json'][0]['created_at'];
            let datePart = as_of.substring(0, 10);

            let parts = datePart.split('-'); // แยกวันที่เป็นส่วนย่อย
            let formattedDate = parts[2] + '/' + parts[1] + '/' + parts[0]; // ประกอบวันที่ใหม่ในรูปแบบที่ต้องการ

            document.querySelector('#date_as_of').innerHTML = formattedDate ;

            let div_content_data = document.querySelector('#div_content_data');
                div_content_data.innerHTML = '' ;

            for (let i = 0; i < result['json'].length; i++) {

                let for_host = ``;
                if(result['host'] == result['json'][i]['user_id']){
                    for_host = `
                        <span class="btn host-member">
                            <i class="fa-solid fa-key text-warning"></i>
                        </span>
                    `;
                }

                let img_profile = `
                        <img src="{{ url('/img/icon/profile.png') }}" style="width: 100%;height: auto;" class="img-member">
                    `;
                if(result['json'][i]['photo_user']){
                    img_profile = `
                        <img src="{{ url('storage')}}/`+result['json'][i]['photo_user']+`" class="img-member">
                    `;
                }

                if(result['json'][i]['active_dream'] >= 2){
                   amount_Active_dream = amount_Active_dream + 1 ; 
                }

                sum_score_of_team = sum_score_of_team + result['json'][i]['mission1'] ;


                if("{{ Auth::user()->id }}" == result['json'][i]['user_id']){
                    score_of_me = result['json'][i]['mission1'];
                }

                let originalNumber = result['json'][i]['mission1'];
                let formattedNumber = formatLargeNumber(originalNumber);
                if (originalNumber > 50000) {

                    amount_member_50k = amount_member_50k + 1 ;

                    img_star = `<img src="{{ url('/img/icon/star.png') }}" style="width: 13px;height:13px;" class="img-member">`;
                } else {
                    img_star = ``;
                }
                let html = `
                    <div class="member-item col-4 mt-2 " style="margin-bottom: 42px;">
                        <div class="member-card-join">
                            `+for_host+`
                            <div class="text-center">
                                <div class="text-center">
                                    `+img_profile+`
                                </div>
                                
                                <div class="name-member w-100" style="white-space: nowrap;  overflow: hidden;  text-overflow: ellipsis;width:95%">
                                    <span style="color: #07285A;font-size: 10px;font-style: normal;font-weight: bolder !important;line-height: normal;">`+result['json'][i]['name_user']+`</span>
                                   
                                    <div class="d-flex justify-content-between ps-2" style="border-radius: 5px;background:#102160;-webkit-border-radius: 5px;-moz-border-radius: 5px;white-space: nowrap;  overflow: hidden;  text-overflow: ellipsis;width:100%">
                                        <div>
                                            <span style="color: #FCBF29;font-size: 10px;font-style: normal;font-weight: 700;line-height: normal;">
                                                PC : 
                                            </span>
                                            <span style="margin-left: 2.5px;color: #fff;font-size: 10px;font-style: normal;font-weight: 700;line-height: normal;"">
                                            `+formattedNumber+`
                                            </span>
                                        </div> 
                                        <div class="me-1">
                                            ${img_star}
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-start ps-2 mt-1" style="border-radius: 5px;background:#102160;-webkit-border-radius: 5px;-moz-border-radius: 5px;white-space: nowrap;  overflow: hidden;  text-overflow: ellipsis;width:100%">
                                        <span style="color: #FCBF29;font-size: 10px;font-style: normal;font-weight: 700;line-height: normal;">
                                        Active :
                                        </span>
                                        <span style="margin-left: 2.5px;color: #fff;font-size: 10px;font-style: normal;font-weight: 700;line-height: normal;"">
                                        `+result['json'][i]['active_dream']+`
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                `;

                div_content_data.insertAdjacentHTML('beforeend', html); // แทรกล่างสุด
                
            }

            let original_score_of_team = sum_score_of_team;
            let format_score_of_team = formatLargeNumber(original_score_of_team);

            document.querySelector('#span_sum_score_team').innerHTML = format_score_of_team;

            if(sum_score_of_team > 700000){
                document.querySelector('#trophy_for_700K').classList.remove('d-none');
            }

            if( amount_member_50k < 10 ){
                amount_member_50k = "0"+amount_member_50k;
            }

            document.querySelector('#span_amount_member_50k').innerHTML = amount_member_50k ;

            if( amount_Active_dream < 10 ){
                amount_Active_dream = "0"+amount_Active_dream;
            }

            document.querySelector('#span_amount_Active_dream').innerHTML = amount_Active_dream ;

            check_alert_50k();

        });

    }

    function check_alert_50k(group_id){

        if(score_of_me > 50000){

            fetch("{{ url('/') }}/api/check_alert_50k" + "/" + "{{ Auth::user()->id }}")
                .then(response => response.text())
                .then(result => {
                    // console.log(result);

                    if(result == "alert"){
                        document.querySelector('#btn_mission_success').click();
                    }

            });

        }


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