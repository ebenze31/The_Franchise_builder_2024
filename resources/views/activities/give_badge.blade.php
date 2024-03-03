@extends('layouts.theme_admin')

@section('content')

<style>
    
    .loader {
        display: flex;
        /* align-items: center;*/
        /* justify-content: center;*/
        flex-direction: row;
    }

    .slider {
        overflow: hidden;
        background-color: white;
        margin: 0 15px;
        height: 40px;
        width: 20px;
        border-radius: 30px;
        box-shadow: 15px 15px 20px rgba(0, 0, 0, 0.1), -15px -15px 30px #fff,
        inset -5px -5px 10px rgba(0, 0, 255, 0.1),
        inset 5px 5px 10px rgba(0, 0, 0, 0.1);
        position: relative;
    }

    .slider::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        height: 20px;
        width: 20px;
        border-radius: 100%;
        box-shadow: inset 0px 0px 0px rgba(0, 0, 0, 0.3), 0px 420px 0 400px #2697f3,
        inset 0px 0px 0px rgba(0, 0, 0, 0.1);
        animation: animate_2 2.5s ease-in-out infinite;
        animation-delay: calc(-0.5s * var(--i));
    }

    @keyframes animate_2 {
        0% {
            transform: translateY(250px);
            filter: hue-rotate(0deg);
        }

        50% {
            transform: translateY(0);
        }

        100% {
            transform: translateY(250px);
            filter: hue-rotate(180deg);
        }
    }

    .loading-container {
        display: flex;
    }

    .loading-spinner {
        border: 4px solid rgba(0, 0, 0, 0.1);
        border-left-color: #000;
        animation: spin 1s linear infinite;
        border-radius: 50%;
        width: 40px;
        height: 40px;
        margin-right: 20px;
        margin-top: 50px;
        margin-bottom: 50px;
    }


    @keyframes spin {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(360deg);
        }
    }

    @keyframes drawCheck {
        0% {
            transform: scale(0);
        }

        100% {
            transform: scale(1);
        }
    }

    .checkmark {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        display: block;
        stroke-width: 2;
        stroke: #29cc39;
        stroke-miterlimit: 10;
        margin: 10% auto;
        box-shadow: inset 0px 0px 0px #ffffff;
        animation: fill 0.9s ease-in-out .4s forwards, scale .3s ease-in-out .9s both
    }

    .checkmark__check {
        transform-origin: 50% 50%;
        stroke-dasharray: 48;
        stroke-dashoffset: 48;
        animation: stroke 0.8s cubic-bezier(0.65, 0, 0.45, 1) 0.8s forwards
    }

    @keyframes stroke {
        100% {
            stroke-dashoffset: 0
        }
    }

    @keyframes scale {

        0%,
        100% {
            transform: none
        }

        50% {
            transform: scale3d(1.1, 1.1, 1)
        }
    }

    @keyframes fill {
        100% {
            box-shadow: inset 0px 0px 0px 60px #fff
        }
    }

    .radius-20 {
        border-radius: 20px;
    }

    .overlay {
        display: none;
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        z-index: 9999;
    }
    .overlay img {
        min-width: 50vh;
        min-height: auto;
    
        max-width: 50vh;
        max-height: 90vh;

        object-fit: contain;

    }

    /*Search*/
    .InputContainer {
        width: 305px;
        height: 45px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: linear-gradient(to bottom,#0021E8,#0BD5D3);
        border-radius: 30px;
        overflow: hidden;
        cursor: pointer;
        ox-shadow: 2px 2px 10px rgba(0, 0, 0, 0.075);
    }

    .Search_input {
        width: 300px;
        height: 40px;
        border: none;
        outline: none;
        caret-color: rgb(255, 81, 0);
        background-color: rgb(255, 255, 255);
        border-radius: 30px;
        padding-left: 20px;
        letter-spacing: 0.8px;
        color: rgb(19, 19, 19);
        font-size: 13.4px;
    }   
    
}

</style>

<div class="card">
    <div class="card-body">

        <div class="row">
            <div class="col-12 col-md-12">
                <h3 class="mb-0 text-uppercase">
                    Give badge
                </h3>
            </div>
        </div>

        <hr class="mt-3 mb-3">

        <div class="row">
            <div class="col-12 col-md-5">
                <div class="row">
                    <div class="col-12">
                        <h5>เลือกกิจกรรมที่ต้องการ</h5>
                        <select id="select_badge" class="form-control mt-5" onchange="change_select_badge();">
                            <option selected value="">เลือกกิจกรรม</option>
                        </select>
                    </div>
                    <div id="div_badge" class="col-12">
                        <!-- data badge -->
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-7">
                <div class="row">
                    <div class="col-12">
                        <h5>เพิ่ม Account ที่ต้องการ</h5>
                        <span class="text-danger">โดยใช้การเว้นบรรทัดหรือเครื่องหมาย (,) เป็นการแยก Account หรือ..</span>
                    </div>
                    <div class="col-12">
                        <div class="input-group mb-2 mt-4">
                            <span class="btn btn-outline-secondary" id="select_all_player" style="width: 40%;" onclick="select_account_by('all');">
                                เลือก Player ทั้งหมด
                            </span>
                            <span class="btn btn-outline-secondary" id="select_player_by_team" style="width: 40%;" onclick="select_account_by('team');">
                                เลือก Player บ้านที่
                            </span>
                            <input type="text" class="form-control" id="input_player_by_team" readonly style="width: 20%;" oninput="oninput_search_account_api();">
                        </div>
                    </div>
                    <div class="col-12">
                        <textarea id="inputText" rows="6" class="form-control mt-2" oninput="select_account_by('key')"></textarea>
                        <br><br>
                    </div>
                    <div class="col-12">
                        <button id="btn_search_account" class="btn btn-info" style="width:50%;" onclick="processText()" disabled>
                            ค้นหา Account
                        </button>
                        <br><br>
                        <div id="result" class="d-none"></div>
                    </div>
                </div>
                
            </div>
        </div>
        
        <br>
        <hr class="mt-3 mb-3">
        <br>

        <div id="div_result_search_account" class="row d-none">
            <div class="col-12 col-md-12">
                <h5>
                    ผลการค้นหา <span class="text-secondary" style="font-size: 14px;">(<span id="count_for_give_badge"></span>)</span>
                </h5>
            </div>
            <div class="col-12 col-md-12 mt-3">
                <div class="table-responsive">
                    <table class="table mb-0 align-middle">
                        <thead>
                            <tr>
                                <th class="text-center">Photo</th>
                                <th class="text-center">Account</th>
                                <th class="text-center">Name</th>
                                <th class="text-center">Role</th>
                                <th class="text-center">Team</th>
                                <th class="text-center">Status Team</th>
                            </tr>
                        </thead>
                        <tbody id="content_tbody">
                            <!-- DATA USER -->
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-12 col-md-12 mt-5">
                <button class="btn btn-info float-end" style="width:20%;" onclick="give_badge_to_user();">
                    ยืนยันการมอบ Badge
                </button>
            </div>

            <div id="div_loader_Excel" class="col-12 mt-5 d-none">
                <section class="loader">
                    <div class="slider" style="--i:0"></div>
                    <div class="slider" style="--i:1"></div>
                    <div class="slider" style="--i:2"></div>
                    <div class="slider" style="--i:3"></div>
                    <div class="slider" style="--i:4"></div>
                    <span class="text-success" style="margin-top: 25px;">กำลังประมวลผล..</span>
                </section>
            </div>
            <div  class="loading-container" class="col-12 mt-5">
                <div id="div_success_Excel" class="contrainerCheckmark d-none">
                    <svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
                        <circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none" />
                        <path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8" />
                    </svg>
                    <center>
                        <h5 class="mt-3">เสร็จสิ้น</h5>
                    </center>
                </div>
            </div>

        </div>
        

    </div>
</div>

<script>

    document.addEventListener('DOMContentLoaded', (event) => {
        // console.log("START");
        search_name_badge();
    });

    function search_name_badge(){

        fetch("{{ url('/') }}/api/search_name_badge")
            .then(response => response.json())
            .then(result => {
                // console.log(result);

                let select_badge = document.querySelector('#select_badge');
                let div_badge = document.querySelector('#div_badge');

                if(result){
                    for (let i = 0; i < result.length; i++) {
                        let html_option = `
                            <option value="`+result[i].id+`">`+result[i].name_Activities+`</option>
                        `;

                        select_badge.insertAdjacentHTML('beforeend', html_option); // แทรกล่างสุด

                        let data_badge = `
                            <div id="data_badge_id_`+result[i].id+`" class="row g-0 mt-5 d-none loop_data_badge">
                                <div class="col-md-3 border-end">
                                    <img src="{{ url('storage')}}/`+result[i].icon+`" class="img-fluid" style="width:100%;">
                                </div>
                                <div class="col-md-9">
                                    <div class="card-body">
                                        <h4 class="card-title">`+result[i].name_Activities+`</h4>
                                        <p class="card-text fs-6">`+result[i].detail+`</p>
                                    </div>
                                </div>
                            </div>
                        `;

                        div_badge.insertAdjacentHTML('beforeend', data_badge); // แทรกล่างสุด

                    }

                    let html_mock_up = `
                        <div id="data_badge_id_mock_up" class="row g-0 mt-5 loop_data_badge">
                            <div class="col-md-3 border-end">
                                <img src="{{ url('/img/icon/cry.png') }}" class="img-fluid" style="width:100%;">
                            </div>
                            <div class="col-md-9">
                                <div class="card-body">
                                    <h4 class="card-title">กรุณาเลือกกิจกรรมที่ต้องการ</h4>
                                </div>
                            </div>
                        </div>
                    `;

                    div_badge.insertAdjacentHTML('beforeend', html_mock_up); // แทรกล่างสุด
                }

            });

    }

    function change_select_badge(){

        let select_badge = document.querySelector('#select_badge');
            // console.log(select_badge.value);

        document.querySelector('#div_badge').classList.remove('d-none');

        let loop_data_badge = document.querySelectorAll('.loop_data_badge');
        loop_data_badge.forEach(item => {
            // console.log(item);
            item.classList.add('d-none');
        })

        if(select_badge.value){
            document.querySelector('#data_badge_id_'+select_badge.value).classList.remove('d-none');
            document.querySelector('#btn_search_account').disabled = false;
        }else{
            document.querySelector('#data_badge_id_mock_up').classList.remove('d-none');
            document.querySelector('#btn_search_account').disabled = true;
        }

    }

    function select_account_by(type) {
        
        let content_tbody = document.querySelector('#content_tbody');
            content_tbody.innerHTML = '';

        document.querySelector('#div_result_search_account').classList.add('d-none');
        document.querySelector('#result').classList.add('d-none');

        if(type == 'all'){

            document.querySelector('#select_all_player').classList.remove('btn-outline-secondary');
            document.querySelector('#select_all_player').classList.add('btn-success');
            document.querySelector('#select_player_by_team').classList.remove('btn-success');
            document.querySelector('#select_player_by_team').classList.add('btn-outline-secondary');

            document.querySelector('#input_player_by_team').readOnly  = true ;
            document.querySelector('#input_player_by_team').value  = '' ;
            // document.querySelector('#inputText').value = '' ;

            search_account_api('all');

        }
        else if(type == 'team'){

            document.querySelector('#select_player_by_team').classList.add('btn-success');
            document.querySelector('#select_player_by_team').classList.remove('btn-outline-secondary');
            document.querySelector('#select_all_player').classList.add('btn-outline-secondary');
            document.querySelector('#select_all_player').classList.remove('btn-success');

            document.querySelector('#input_player_by_team').readOnly  = false ;
            document.querySelector('#inputText').value = '' ;

        }
        else if(type == 'key'){

            document.querySelector('#select_player_by_team').classList.remove('btn-success');
            document.querySelector('#select_player_by_team').classList.add('btn-outline-secondary');
            document.querySelector('#select_all_player').classList.add('btn-outline-secondary');
            document.querySelector('#select_all_player').classList.remove('btn-success');

            document.querySelector('#input_player_by_team').readOnly  = true ;
            document.querySelector('#input_player_by_team').value  = '' ;

        }

    }

    var timer; 
    function oninput_search_account_api(){
        // หยุดการทำงานของ setTimeout ก่อนหน้า (ถ้ามี)
        clearTimeout(timer);
        
        // เริ่มการดีเลย์ใหม่
        timer = setTimeout(function() {
            let input_player_by_team = document.querySelector('#input_player_by_team').value;
            search_account_api(input_player_by_team); 
        }, 800);
    }

    function search_account_api(type){

        fetch("{{ url('/') }}/api/search_account_api" + "/" + type)
            .then(response => response.json())
            .then(result => {
                // console.log(result);

                let text_account ;
                document.querySelector('#inputText').value = '' ;

                if(result.length != 0){
                    for (let i = 0; i < result.length; i++) {
                        if(!text_account){
                            text_account = result[i].account;
                        }else{
                            text_account = text_account + "," + result[i].account;
                        }
                    }

                    document.querySelector('#inputText').value = text_account ;
                }
            });

    }

    var filteredCharacters ;

    function processText() {

        document.querySelector('#div_loader_Excel').classList.add('d-none');
        document.querySelector('#div_success_Excel').classList.add('d-none');
        document.querySelector('#result').classList.remove('d-none');
        document.getElementById('result').innerText = "กำลังค้นหา..";

        // รับค่าจาก TextArea
        let inputText = document.getElementById('inputText').value;
        
        // แยกตัวอักษรออกเมื่อพบเว้นบรรทัดหรือเครื่องหมาย ','
        let separatedCharacters = inputText.split(/[,\n]/);
        
        // ลบช่องว่างที่เป็นไปได้
        filteredCharacters = separatedCharacters.filter(function(character) {
            return character.trim() !== '';
        });
        
        // แสดงผลลัพธ์ใน console และบนหน้าเว็บ
        // console.log(filteredCharacters);
        // document.getElementById('result').innerText = filteredCharacters.join(', ');

        fetch("{{ url('/') }}/api/search_account_for_give_badge", {
            method: 'post',
            body: JSON.stringify(filteredCharacters),
            headers: {
                'Content-Type': 'application/json'
            }
        }).then(function (response){
            return response.json();
        }).then(function(data){
            // console.log(data);

            if(data){

                let content_tbody = document.querySelector('#content_tbody');
                    content_tbody.innerHTML = '';

                setTimeout(function() {

                document.querySelector('#count_for_give_badge').innerHTML = data.length ;
                document.querySelector('#div_result_search_account').classList.remove('d-none');

                for (let i = 0; i < data.length; i++) {
                    // photo 
                    let html_img = ''
                    if(data[i].photo){
                        html_img = `<img src="{{ url('storage')}}/`+data[i].photo+`" class="p-1" alt=""> 
                                    <span class="d-none">{{ url('storage')}}/`+data[i].photo+`</span>`;
                    }else{
                        html_img = `<img src="{{ url('/img/icon/profile.png') }}" class="p-1" alt=""> 
                                    <span class="d-none">{{ url('/img/icon/profile.png') }}</span>`;
                    }

                    let html = `
                        <tr class="">
                            <td>
                                <center>
                                    <div id="product_img_account_111" class="product-img bg-transparent border">
                                        `+html_img+`
                                    </div>
                                </center>
                            </td>
                            <td class="text-center">
                                `+data[i].account+`
                            </td>
                            <td class="text-center">
                                `+data[i].name+`
                            </td>
                            <td class="text-center">
                                `+data[i].role+`
                            </td>
                            <td class="text-center">
                                `+data[i].group_id+`
                            </td>
                            <td class="text-center">
                                `+data[i].group_status+`
                            </td>
                        </tr>
                    `;

                    content_tbody.insertAdjacentHTML('beforeend', html); // แทรกล่างสุด
                }

                document.querySelector('#result').classList.add('d-none');
                document.getElementById('result').innerText = "";
                // console.log(filteredCharacters);
            }, 500);
            }

        }).catch(function(error){
            // console.error(error);
        });
    }

    function give_badge_to_user(){

        let arr_data = [];
        let select_badge = document.querySelector('#select_badge');
            // console.log(select_badge.value);
        // console.log(filteredCharacters);

        fetch("{{ url('/') }}/api/give_badge_to_user/"+select_badge.value, {
            method: 'post',
            body: JSON.stringify(filteredCharacters),
            headers: {
                'Content-Type': 'application/json'
            }
        }).then(function (response){
            return response.text();
        }).then(function(data){
            // console.log(data);

            if(data == "success"){

                document.querySelector('#div_loader_Excel').classList.add('d-none');
                document.querySelector('#div_success_Excel').classList.remove('d-none');

                document.querySelector('#select_player_by_team').classList.remove('btn-success');
                document.querySelector('#select_player_by_team').classList.add('btn-outline-secondary');
                document.querySelector('#select_all_player').classList.add('btn-outline-secondary');
                document.querySelector('#select_all_player').classList.remove('btn-success');

                document.querySelector('#input_player_by_team').readOnly  = true ;
                document.querySelector('#input_player_by_team').value  = '' ;
                document.querySelector('#inputText').value = '' ;
            }

        }).catch(function(error){
            // console.error(error);
        });

    }

</script>
@endsection
