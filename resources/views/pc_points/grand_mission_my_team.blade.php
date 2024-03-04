@extends('layouts.theme_user')
@section('content')
<style>
    *:not(i){
        font-family: Sukhumvit !important;
        letter-spacing: 0px !important;
      -webkit-letter-spacing: 0px !important;  
      letter-spacing:0px !important; 
      -moz-letter-spacing:0px !important;
      -khtml-letter-spacing:0px !important;
        word-spacing: 0rem !important;
        -webkit-word-spacing: 0rem !important;
        -moz-word-spacing: 0rem !important;
    }
    .header-team {
        position: relative;
        margin-top: 55px;
        padding: 5px 5px 15px 15px;
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
        text-indent: 110px;
        color: #fff;
        font-weight: lighter;
    }

    .content-section {
        margin-top: -20px;
        padding: 0;
    }.memberInRoom{
        padding: 0px 10px 10px 15px;
    }

    .member-section {
    width: 100%;
  }
  .member-item{
            margin: 10px 2px;
            
        }
  @media only screen and (max-width: 680px) {
        .member-item{
            width: 32%;
            margin: 10px 2px;
            /* margin-bottom: 75px !important; */
            
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
        }
         
        .member-section{
            display: flex;
            flex-wrap: wrap;
            justify-content: space-evenly;

            margin-top: 50px;
            width: 100%;
        }
    }
   
    .member-card{
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

    .btn-sort-data.not-open{
        color: #365F91;
        width: 110px;

        border: 1px solid #365F91;
        background-color: #091636;
        font-size: 14px;
        font-weight: bold;
    }.item-team{
        padding: 5px 5px 0 5px;
    }
    .item-team .img_team{
        /* border: 2px solid #00E0FF; */
        border-radius: 5px !important;
            -webkit-border-radius: 5px; 
        -moz-border-radius: 5px;
    }
    .team_color_0{
        border: 2px solid #FF0000 !important;
        background-color: #FF0000;
    }

    .team_color_1{
        border: 2px solid #FFD233 !important;
        background-color: #FFD233;
    }

    .team_color_2{
        border: 2px solid #04F80D !important;
        background-color: #04F80D;
    }
    .progress{
        height: 23px; 
        border-radius: 50px !important;
        -webkit-border-radius: 50px; 
        -moz-border-radius: 50px;
    }.progress-bar{
        background: rgb(27,92,217);
background: linear-gradient(100deg, rgba(27,92,217,1) 0%, rgba(0,255,255,1) 100%);
    }.img-rocket::before{
        content: "";
        display: inline-block;
        position: absolute;
        width: 15px;
        height: 23px;
        margin-right: 5px;
        background: rgba(0,255,255,1);
    }
    .img-rocket-120-score::before{
        content: "";
        display: inline-block;
        position: absolute;
        width: 100% !important;
        height: 23px;
        margin-right: 5px;
        border-radius: 0 !important;
        background: rgba(0,255,255,1);
    }
</style>


<div class="d-flex header-team">
    <img src="{{ url('/img/group_profile/profile/id (') . $group_id . ').png' }}" width="114" height="114" class="mt-2 mb-2 img-header-team">
    <div class="d-flex justify-content-between w-100" >
        <div class="detail-team"style="white-space: nowrap;  overflow: hidden;  text-overflow: ellipsis;width:63%">
            <h1 class="mb-0" style="color: #FFF;font-size: 24px;font-style: normal;font-weight: 400;line-height: 1.5;">
                Team {{ $group_id }}
            </h1>
            <!-- <p style="color: #FCBF29;font-family: Inter;font-size: 12px;font-style: normal;font-weight: 700;line-height: normal;">
                PC : xxxxxxx
            </p> -->
            <div>
                <p style="color: #FCBF29;font-size: 12px;font-style: normal;font-weight: 700;line-height: 1;">Grand mission PC</p>
                    
                <span style="margin-left:110px;color: #FCBF29;font-size: 12px;font-style: normal;font-weight: 700;line-height: 1;">PC : <span id="span_sum_score_team"></span></span> 
                <span id="trophy_for_2m" class="d-none"><img src="{{ url('/img/icon/trophy-gold.png') }}" style="margin-top: -2px;width: 16px;height:16px;position: relative!important;left: 5px !important;"></span>

            </div>
        </div>

        <div class="d-flex align-items-top float-end pe-1 text-center">
            <div>
                
            <span style="position: absolute;bottom: 15px; right: 15px;color: #FFF;font-size: 9px;font-style: normal;font-weight: 500;line-height: normal;">
                Data As of <span id="date_as_of"></span>
            </span>
                <!-- <div>
                    <div class="float-end" style="margin-top:-1px">
                        <i class="fa-regular fa-user text-white me-2"></i>
                        <span style="color: #FCBF29;font-size: 12px;font-style: normal;font-weight: 700;line-height: normal;"><span id="span_amount_member_50k"></span>/10</span>
                    </div>
                </div> -->
            </div>
        </div>
        
    </div>
</div>
<input type="text" name="" placeholder="กรอกเลขสิ" class="form-control d-none" id="" oninput="convertToPercentage(this.value)">
<div class="d-flex" >
    <div class="p-3" style="width: calc(100%);">
        <div class="w-100 d-flex justify-content-between px-2 mb-2">
            <div>                
                <img src="{{ url('/img/icon/trophy-sliver.png') }}" style="width: 16px;height:16px;">
            </div>
            <div>
                <p style="color: #FFD233;">Active agent</p>
            </div>
            <div>        
                <img src="{{ url('/img/icon/trophy-gold.png') }}" style="width: 16px;height:16px;">
            </div>
        </div>
        <div class="w-100 d-flex justify-content-between px-2" style="margin-bottom:-21px;position: relative;z-index: 99999999;">
            <span style="color: #fff;" id="text_progress_0">                
                0
            </span>
            <span style="color: #fff;" id="text_progress_60">
                60
            </span>
            <span style="color: #fff;" id="text_progress_120">        
                120
            </span>
        </div>  
        <div style="border-radius: 50px;position: relative;">
            <div class="progress mb-3" style="background-color: #0A102E; border: #03ABCE solid 1px;">
                <div  class="progress-bar bg-success" role="progressbar" id="progressBar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;height: 23px;"></div>
                <div class="text-white" id="rocket_progressBar" style="transition: all .5s ease-in-out;position: relative;z-index: 999999999999999;">
                    <!-- <p id="textprogressBar">15</p> -->
                    <span class="img-rocket"></span>
                    <img src="{{ url('/img/icon/rocket.png') }}"  style="height:23px;position: relative;right: 0%;">
                    <span id="textprogressBar" style="position: absolute;  top: 57%;  left: 65%;  transform: translate(-50%, -50%);font-size: 8px;color: #FFD233;">0</span>
                </div>
            </div>
        </div>
    </div>

</div>

<div class="memberInRoom d-flex justify-content-center text-center px-1">
    <div class="member-section mt-0" id="div_content_data">
        <!-- DATA -->
    </div>
</div>
<script>

    document.addEventListener('DOMContentLoaded', (event) => {
        // console.log("START");
        get_data_user_grand_mission_my_team()
    });

    function get_data_user_grand_mission_my_team(){

        fetch("{{ url('/') }}/api/get_data_user_grand_mission_my_team" + "/" + "{{ $group_id }}")
            .then(response => response.json())
            .then(result => {
                // console.log(result);

                let sum_grandmission = 0 ;
                let sum_Newcode_team = 0 ;
                let sum_active_dream_team = 0 ;

                if(result){

                    let div_content_data = document.querySelector('#div_content_data');
                        div_content_data.innerHTML = '' ;

                    // let as_of = result['data'][0]['as_of'];
                    // let datePart = as_of.substring(0, 10); // 2024-01-31

                    // let parts = datePart.split('-'); // แยกวันที่เป็นส่วนย่อย
                    // let formattedDate = parts[2] + '/' + parts[1] + '/' + parts[0]; 

                    let as_of = result['data'][0]['as_of']; // เป็นวันที่ในรูปแบบ 'YYYY-MM-DD'
                    let dateObject = new Date(as_of);
                    dateObject.setDate(dateObject.getDate() - 1);

                    let day = dateObject.getDate();
                    let month = dateObject.getMonth() + 1;
                    let year = dateObject.getFullYear();

                    // ทำการเพิ่ม leading zero ถ้าจำเป็น
                    if (day < 10) {
                        day = '0' + day;
                    }
                    if (month < 10) {
                        month = '0' + month;
                    }

                    let formattedDate = day + '/' + month + '/' + year;
                    // console.log(formattedDate); // แสดงผลลัพธ์ 'DD/MM/YYYY'

                    for (var i = 0; i < result['data'].length; i++) {
                    
                        let html_host = `` ;
                        if(result['data'][i].id == result['host']){
                            html_host = `
                                <span class="btn host-member">
                                    <i class="fa-solid fa-key text-warning"></i>
                                </span>
                            `;
                        }

                        let grandmission = result['data'][i].grandmission.toLocaleString();
                        // let new_code = result['data'][i].new_code.toLocaleString();
                        let active_dream = result['data'][i].active_dream.toLocaleString();

                        sum_grandmission = sum_grandmission + result['data'][i].grandmission;
                        sum_active_dream_team = sum_active_dream_team + result['data'][i].active_dream;

                        if (sum_grandmission >= 2000000) {
                            // document.querySelector('#trophy_for_2m').classList.remove('d-none');
                        } else {
                            document.querySelector('#trophy_for_2m').classList.add('d-none');
                        }

                        let img_star = ``;
                        if(result['data'][i].active_dream >= 2){
                            // img_star = `
                            //     <img src="{{ url('/img/icon/star.png') }}" style="width: 13px;height:13px;" class="img-member">
                            // `;
                            img_star = ``;
                        }

                        let html = `
                            <div class="member-item col-4 ">
                                <div class="member-card-join">
                                    `+html_host+`
                                    <div class="text-center">
                                        <div class="text-center">
                                            <img src="{{ url('storage')}}/`+result['data'][i].photo+`"" style="width: 100%;height: auto;" class="img-member">
                                        </div>
                                        
                                        <div class="name-member w-100 mt-1" style="white-space: nowrap;  overflow: hidden;  text-overflow: ellipsis;width:95%">
                                            <span class="mt-1" style="color:#102160;font-size: 12px;font-style: normal;line-height: normal;">`+result['data'][i].name+`</span>
                                            <div class=" mb-1 d-flex justify-content-between ps-2" style="border-radius: 5px;background:#102160;-webkit-border-radius: 5px;-moz-border-radius: 5px;white-space: nowrap;  overflow: hidden;  text-overflow: ellipsis;width:100%">
                                                <div >
                                                    <span style="color: #FCBF29;font-size: 10px;font-style: normal;line-height: normal;">
                                                        PC : 
                                                    </span>
                                                    <span style="margin-left: 2.5px;color: #fff;font-size: 10px;font-style: normal;line-height: normal;"">
                                                    `+grandmission+`
                                                    </span>
                                                </div> 
                                            </div>
                                            <div class="d-flex justify-content-between ps-2" style="border-radius: 5px;background:#102160;-webkit-border-radius: 5px;-moz-border-radius: 5px;white-space: nowrap;  overflow: hidden;  text-overflow: ellipsis;width:100%">
                                                <div>
                                                    <span style="color: #FCBF29;font-size: 10px;font-style: normal;line-height: normal;">
                                                        AA : 
                                                    </span>
                                                    <span style="margin-left: 2.5px;color: #fff;font-size: 10px;font-style: normal;line-height: normal;"">
                                                    `+active_dream+`
                                                    </span>
                                                </div> 
                                                <div class="me-1">
                                                `+img_star+`
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        `;

                        div_content_data.insertAdjacentHTML('beforeend', html);
                    }

                    document.querySelector('#date_as_of').innerHTML = formattedDate ;
                    document.querySelector('#span_sum_score_team').innerHTML = sum_grandmission.toLocaleString() ;
                    // convertToPercentage(sum_Newcode_team);
                    convertToPercentage(sum_active_dream_team);

                }

            });

    }

</script>


<script>
   function convertToPercentage(value) {
    // ตรวจสอบว่าค่าที่รับเข้ามาอยู่ในช่วง 1-30 หรือไม่
    let text_0 = document.getElementById('text_progress_0');
    let text_60 = document.getElementById('text_progress_60');
    let text_120 = document.getElementById('text_progress_120');

    // if (value >= 0 && value <= 25) {
    if (value >= 0) {
        
        let value_bar = 0 ;
        if(value >= 120){
            value_bar = 120 ;
            document.querySelector('.img-rocket').classList.add('img-rocket-120-score');
        }
        else if(value == 60){
            value_bar = value - 8 ;
            document.querySelector('.img-rocket').classList.remove('img-rocket-120-score');

        }
        else if(value != 0){
            value_bar = value - 8 ;
            document.querySelector('.img-rocket').classList.remove('img-rocket-120-score');

        }

        // คำนวณเป็นเปอร์เซ็นต์
        if(value_bar < 0){
            value_bar = 0 ;
        }

        let percentage = (value_bar / 120) * 100;

        // console.log(percentage);

        let progressBar = document.getElementById('progressBar');
            progressBar.style.width = percentage + '%';
        let textprogressBar = document.getElementById('textprogressBar');
            textprogressBar.innerHTML = value;
            // let rocket_progressBar = document.getElementById('rocket_progressBar');
            // rocket_progressBar  .style.left = percentage + '%';
        // return percentage;

        if (value >= 0 && value <= 60) {
            text_0.style.color = '#07285A'
            text_60.style.color = '#646D73'
            text_120.style.color = '#646D73'
        }else if(value >= 60 && value <= 120){
            text_0.style.color = '#07285A'
            text_60.style.color = '#07285A'
            text_120.style.color = '#646D73'
        }else{
            text_0.style.color = '#07285A'
            text_60.style.color = '#07285A'
            text_120.style.color = '#07285A'
        }
    } else {
        // ถ้าค่าไม่ได้อยู่ในช่วงที่กำหนดให้
        return "กรุณาใส่ค่าระหว่าง 0 ถึง 25 เท่านั้น";
    }
    }

</script>
@endsection