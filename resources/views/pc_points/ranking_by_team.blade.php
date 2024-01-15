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
        border: 3px solid #fff;
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
        margin-bottom: 10px;
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
        margin: 10px 0 10px 0;
        -webkit-border-radius: 20px;    
        border-radius: 20px; 
        -moz-border-radius:20px;
        -khtml-border-radius:20px;
        padding: 10px;
        color: #fff;
        z-index: -5;
        overflow: auto;
    }

    .my-team {
        /* padding: 15px 10px 15px 12px; */
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

    @media screen and (max-device-width: 465px){
        .other-team {
            padding: 10px 10px 10px 18px;
        }
        .my-team {
            padding: 10px 10px 10px 18px;
        }.number-my-team {
/*        margin-right: 15px;*/
            width: 80px
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

        >.text-score {
            color: #FFE500;
            font-size: 16px;
            margin: 0 5px 0 0;
        }
    }

    .number-my-team {
/*        margin-right: 15px;*/
        /* width: 27.5%; */
        display: flex;
        align-items: center;
/*        justify-content: center;*/
    }

    .nameTeam {
        font-size: 14px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        width: 30vw;
    }

    .menberInTeam {
        font-size: 10px;
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
        /* width: 100%; */
        width: 120px;

        display: flex;
        align-items: center;
        justify-content: center;
    }

    .statusNumber {
        text-align: center;
        font-size: 14px;
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
    }
</style>
<div class="d-flex justify-content-center mt-1">
    <div class="container row ">
        <div class="col-4 text-center sub-rank">
            <p class="number-top-rank">No.2</p>
            <img id="img_rank_2" src="{{ url('/img/icon/Frame 495.png') }}" class="sub-rank-img" alt="รูปภาพปก">
            <p id="name_rank_2" class="number-team"></p>
            <p id="score_rank_2" class="score-team" style="color: #E7C517!important;"></p>
        </div>
        <div class="col-4 text-center">
            <p class="number-top-rank">No.1</p>
            <img id="img_rank_1" src="{{ url('/img/icon/Frame 495.png') }}" class="main-rank-img" alt="รูปภาพปก">
            <p id="name_rank_1" class="number-team"></p>
            <p id="score_rank_1" class="score-team" style="color: #E7C517!important;"></p>
        </div>
        <div class="col-4 text-center sub-rank">
            <p class="number-top-rank">No.3</p>
            <img id="img_rank_3" src="{{ url('/img/icon/Frame 495.png') }}" class="sub-rank-img" alt="รูปภาพปก">
            <p id="name_rank_3" class="number-team"></p>
            <p id="score_rank_3" class="score-team" style="color: #E7C517!important;"></p>
        </div>
    </div>
</div>

<div class="contentSection">

    <!-- ของตัวเอง -->
    <div class="mb-4 d-" id="content_ME">
        <!--  -->
    </div>

    <!-- เรียงตามลำดับ -->
    <div id="content_ASC">
        <!--  -->
    </div>

</div>

<script>

    document.addEventListener('DOMContentLoaded', (event) => {
        // console.log("START");
        change_menu_bar('rank-team');
        get_data_rank('team');
    });

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

                    for (let i = 0; i < result['data'].length; i++) {

                        let count_member = JSON.parse(result['data'][i].member).length;

                        let pc_point_arr = [];
                            pc_point_arr = JSON.parse(result['data'][i].rank_record);

                        let pc_point = pc_point_arr[week]['pc_point'] ;
                            // console.log(pc_point);

                        let originalNumber = pc_point;
                        let formattedNumber = formatLargeNumber(originalNumber);

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
                                <div class="other-team">
                                    <div class="number-my-team">`+result['data'][i].rank_of_week+`</div>
                                    <img src="{{ url('/img/group_profile/profile/id (`+text_id_group+`).png') }}" class="profileTeam" alt="">
                                    <div class="detailTeam">
                                        <div>
                                            <p class="nameTeam">Team `+result['data'][i].name_group+`</p>
                                            <p class="menberInTeam">Member : `+count_member+`</p>
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

                            content_ASC.insertAdjacentHTML('beforeend', html); // แทรกล่างสุด
                            
                        }
                        else{

                            html = `
                                <div class="other-team" data-toggle="collapse" href="#data_team_id_`+text_id_group+`" role="button" aria-expanded="false" aria-controls="collapseExample">
                                    <div class="number-my-team">`+result['data'][i].rank_of_week+`</div>
                                    <img src="{{ url('/img/group_profile/profile/id (`+text_id_group+`).png') }}" class="profileTeam" alt="">
                                    <div class="detailTeam">
                                        <div>
                                            <p class="nameTeam">Team `+result['data'][i].name_group+`</p>
                                            <p class="menberInTeam">Member : `+count_member+`</p>
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
                                                            <th class="text-center">No.<p>&nbsp;</p>
                                                            </th>
                                                            <th class="text-center">User<p>&nbsp;</p>
                                                            </th>
                                                            <th class="text-center">YTD-PC<p>&nbsp;</p>
                                                            </th>
                                                            <th class="text-center">MTD-PC<p>&nbsp;</p>
                                                            </th>
                                                            <!-- <th class="text-center d-flex align-items-top">MTD-Case<p>&nbsp;</p>
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
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            `;

                            content_ASC.insertAdjacentHTML('beforeend', html); // แทรกล่างสุด

                            // สมาชิกในทีมของทุกทีม
                            create_html_all_member(result['data'][i].id , week);
                        }


                        // ของตัวเอง
                        if(result['data'][i].id == "{{ Auth::user()->group_id }}"){

                            let html_me = `
                                <div class="my-team" data-toggle="collapse" href="#dataMyteam" role="button" aria-expanded="false" aria-controls="collapseExample">
                                    <div class="number-my-team">`+result['data'][i].rank_of_week+`</div>
                                    <img src="{{ url('/img/group_profile/profile/id (`+text_id_group+`).png') }}" class="profileTeam" alt="">
                                    <div class="detailTeam">
                                        <div>
                                            <p class="nameTeam">Team `+result['data'][i].name_group+`</p>
                                            <p class="menberInTeam">Member : `+count_member+`</p>
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
                                    <div class="collapse p-0" id="dataMyteam">
                                        <div class="dataTeam" style="padding: 12px 8px 8px 8px;">
                                            <div class="table-responsive">
                                                <table class="table mb-0 align-middle table-borderless">
                                                    <thead class="head-teble-data-my-team">
                                                        <tr>
                                                            <th class="text-center">No.<p>&nbsp;</p>
                                                            </th>
                                                            <th class="text-center">User<p>&nbsp;</p>
                                                            </th>
                                                            <th class="text-center">YTD-PC<p>&nbsp;</p>
                                                            </th>
                                                            <th class="text-center">MTD-PC<p>&nbsp;</p>
                                                            </th>
                                                            <!-- <th class="text-center d-flex align-items-top">MTD-Case<p>&nbsp;</p>
                                                            </th>
                                                            <th class="text-center">
                                                                <p>Active AG</p>
                                                                <small style="font-size: 7px;">(include self)</small>
                                                            </th> -->
                                                        </tr>
                                                    </thead>
                                                    <tbody id="tbody_content_ME">
                                                        <!-- ข้อมูลสมาชิก -->
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            `;

                            document.querySelector('#content_ME').classList.remove('d-none');
                            content_ME.insertAdjacentHTML('beforeend', html_me); // แทรกล่างสุด

                            // สมาชิกในทีมของฉัน
                            create_html_member_in_team(result['data'][i].id , week);

                        }

                        if(i == 0 || i == 1 || i == 2){

                            let iii = i + 1 ;
                            document.querySelector('#img_rank_'+iii).setAttribute('src' , `{{ url('/img/group_profile/profile/id (`+text_id_group+`).png') }}`);
                            document.querySelector('#name_rank_'+iii).innerHTML = result['data'][i].name_group;
                            document.querySelector('#score_rank_'+iii).innerHTML = formattedNumber;
                        }

                    }

                }, 500);
            }
        });

    }

    // สมาชิกในทีมของฉัน
    function create_html_member_in_team(group_id , week){

        fetch("{{ url('/') }}/api/get_member_in_team" + "/" + group_id + "/" + week)
            .then(response => response.json())
            .then(member_in_team => {
                // console.log(member_in_team);

                let arr_sum_point = [];
                let arr_of_week = {};
                let sum_point_of_year = 0 ;
                let sum_point_of_month = 0 ;

                for (let xz = 0; xz < member_in_team.length; xz++) {

                    // let text_id_user = member_in_team[xz].user_id.toString();

                    // สร้างวัตถุ Date สำหรับวันที่ปัจจุบัน
                    let currentDate = new Date();

                    // ดึงปีปัจจุบัน
                    let currentYear = currentDate.getFullYear();

                    // ดึงเดือนปัจจุบัน เพิ่ม +1 เพื่อให้เป็นเดือนจริง
                    let currentMonth = (currentDate.getMonth() + 1).toString().padStart(2, '0');

                    // console.log("ปีปัจจุบัน:", currentYear);
                    // console.log("เดือนปัจจุบัน:", currentMonth);

                    let monthlyValue = member_in_team[xz].monthly[currentYear][currentMonth];
                    let monthly_formatted = monthlyValue.toLocaleString('en-UK', {maximumFractionDigits: 0});

                    let yearlyValue = member_in_team[xz].yearly[currentYear];
                    let yearly_formatted = yearlyValue.toLocaleString('en-UK', {maximumFractionDigits: 0});

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
                                `+yearly_formatted+`
                            </td>
                            <td class="text-data-team text-center">
                                `+monthly_formatted+`
                            </td>
                            <!-- <td class="text-data-team text-center">4</td> -->
                            <!-- <td class="text-data-team text-center">2</td> -->
                        </tr>
                    `;
                    let tbody_content_ME = document.querySelector('#tbody_content_ME');
                    tbody_content_ME.insertAdjacentHTML('beforeend', html_tbody_content_ME); // แทรกล่างสุด

                }


        });

    }

    // สมาชิกในทีมของทุกทีม
    function create_html_all_member(group_id , week){

        fetch("{{ url('/') }}/api/get_member_in_team" + "/" + group_id + "/" + week)
            .then(response => response.json())
            .then(member_in_team => {
                // console.log(member_in_team);

                let arr_sum_point = [];
                let arr_of_week = {};
                let sum_point_of_year = 0 ;
                let sum_point_of_month = 0 ;

                for (let xz = 0; xz < member_in_team.length; xz++) {

                    // let text_id_user = member_in_team[xz].user_id.toString();

                    // สร้างวัตถุ Date สำหรับวันที่ปัจจุบัน
                    let currentDate = new Date();

                    // ดึงปีปัจจุบัน
                    let currentYear = currentDate.getFullYear();

                    // ดึงเดือนปัจจุบัน เพิ่ม +1 เพื่อให้เป็นเดือนจริง
                    let currentMonth = (currentDate.getMonth() + 1).toString().padStart(2, '0');

                    // console.log("ปีปัจจุบัน:", currentYear);
                    // console.log("เดือนปัจจุบัน:", currentMonth);

                    let monthlyValue = member_in_team[xz].monthly[currentYear][currentMonth];
                    let monthly_formatted = monthlyValue.toLocaleString('en-UK', {maximumFractionDigits: 0});

                    let yearlyValue = member_in_team[xz].yearly[currentYear];
                    let yearly_formatted = yearlyValue.toLocaleString('en-UK', {maximumFractionDigits: 0});

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
                                `+yearly_formatted+`
                            </td>
                            <td class="text-data-team text-center">
                                `+monthly_formatted+`
                            </td>
                            <!-- <td class="text-data-team text-center">4</td> -->
                            <!-- <td class="text-data-team text-center">2</td> -->
                        </tr>
                    `;

                    let tbody_content = document.querySelector('#tbody_content_id_'+group_id);
                    tbody_content.insertAdjacentHTML('beforeend', html_tbody_content_ME); // แทรกล่างสุด

                }


        });

    }

    function formatLargeNumber(number) {
        if (number >= 1e6) { // 1e6 = 1,000,000
            return (number / 1e6).toFixed(2) + 'M';
        } else {
            return number.toLocaleString();
        }
    }

</script>
@endsection