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
        border: 3px solid #fff;
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
        padding: 10px 20px;
        display: flex;
        -webkit-border-radius: 10px;    
        border-radius: 10px; 
        -moz-border-radius:10px;
        -khtml-border-radius:10px;
        background-color: #25238A;
        z-index: 9999 !important;
        position: relative;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    }

    .other-team {
        padding: 10px 20px;
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
        width: 40px;
        height: 40px;
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
        margin: 0 15px;
        display: flex;
        align-items: center;
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
        margin: 0 5px 0 15px;
    }

    .statusNumber {
        text-align: center;
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
    }
</style>
<div class="d-flex justify-content-center mt-1">
    <div class="container row ">
        <div class="col-4 text-center sub-rank">
            <p class="number-top-rank">No.2</p>
            <img id="img_rank_2" src="{{ url('/img/icon/profile.png') }}" class="sub-rank-img" alt="รูปภาพปก">
            <p id="name_rank_2" class="number-team"></p>
            <p id="score_rank_2" class="score-team"></p>
        </div>
        <div class="col-4 text-center">
            <p class="number-top-rank">No.1</p>
            <img id="img_rank_1" src="{{ url('/img/icon/profile.png') }}" class="main-rank-img" alt="รูปภาพปก">
            <p id="name_rank_1" class="number-team"></p>
            <p id="score_rank_1" class="score-team"></p>
        </div>
        <div class="col-4 text-center sub-rank">
            <p class="number-top-rank">No.3</p>
            <img id="img_rank_3" src="{{ url('/img/icon/profile.png') }}" class="sub-rank-img" alt="รูปภาพปก">
            <p id="name_rank_3" class="number-team"></p>
            <p id="score_rank_3" class="score-team"></p>
        </div>
    </div>
</div>

<div class="contentSection">

    <!-- ของตัวเอง -->
    <div class="mb-4 d-none" id="content_ME">
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
        change_menu_bar('rank-individual');
        get_data_rank('individual');
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

                    for (var i = 0; i < result.length; i++) {

                        let originalNumber = result[i].pc_point;
                        let formattedNumber = formatLargeNumber(originalNumber);

                        let rank_up ;
                        if( parseInt(result[i].rank_of_week) < parseInt(result[i].rank_last_week) ){
                            rank_up = `<i class="fa-solid fa-triangle rankUP"></i>`;
                        }else if(parseInt(result[i].rank_of_week) > parseInt(result[i].rank_last_week)){
                            rank_up = `<i class="fa-solid fa-triangle fa-flip-vertical rankDOWN"></i>`;
                        }else{
                            rank_up = `<i class="fa-solid fa-rectangle-wide rankNORMAL"></i>`;
                        }

                        let html = `
                            <div class="other-team">
                                <div class="number-my-team">`+result[i].rank_of_week+`</div>
                                <img src="{{ url('storage')}}/`+result[i].user_photo+`" class="profileTeam" alt="">
                                <div class="detailTeam">
                                    <div>
                                        <p class="nameTeam">`+result[i].user_name+`</p>
                                    </div>
                                </div>
                                <div class="score-my-team">
                                    <span class="text-score" style="content: #E7C517!important;">`+formattedNumber+`</span>
                                    <span class="text-point"> Pc</span>

                                </div>
                                <div class="statusTeam">
                                    `+rank_up+`
                                    <p class="statusNumber ">`+result[i].rank_last_week+`</p>
                                </div>
                            </div>
                        `;

                        content_ASC.insertAdjacentHTML('beforeend', html); // แทรกล่างสุด

                        if(result[i].user_id == "{{ Auth::user()->id }}"){
                            // ของตัวเอง
                            let html_me = `
                                <div class="my-team">
                                    <div class="number-my-team">`+result[i].rank_of_week+`</div>
                                    <img src="{{ url('storage')}}/`+result[i].user_photo+`" class="profileTeam" alt="">
                                    <div class="detailTeam">
                                        <div>
                                            <p class="nameTeam">`+result[i].user_name+`</p>
                                        </div>
                                    </div>
                                    <div class="score-my-team">
                                        <span class="text-score" style="content: #E7C517!important;">`+formattedNumber+`</span>
                                        <span class="text-point"> Pc</span>

                                    </div>
                                    <div class="statusTeam">
                                        `+rank_up+`
                                        <p class="statusNumber ">`+result[i].rank_last_week+`</p>
                                    </div>
                                </div>
                            `;

                            document.querySelector('#content_ME').classList.remove('d-none');
                            content_ME.insertAdjacentHTML('beforeend', html_me); // แทรกล่างสุด

                        }

                        if(i == 0 || i == 1 || i == 2){

                            let iii = i + 1 ;
                            document.querySelector('#img_rank_'+iii).setAttribute('src' , "{{ url('storage')}}/"+result[i].user_photo);
                            document.querySelector('#name_rank_'+iii).innerHTML = result[i].user_name;
                            document.querySelector('#score_rank_'+iii).innerHTML = formattedNumber;
                        }

                    }

                }, 500);
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