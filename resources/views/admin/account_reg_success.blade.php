@extends('layouts.theme_admin')

@section('content')

<style>

    .card_focus {
        animation: backgroundBlink ;
        animation-duration: 4s;
        background-color: #A4EEF3;
        border-radius: 5%;
    }

    @keyframes backgroundBlink {

        0% {
            background-color: #A4EEF3;
        }
        10% {
            background-color: transparent;
        }
        20% {
            background-color: #A4EEF3;
        }
        30% {
            background-color: transparent;
        }
        40% {
            background-color: #A4EEF3;
        }
        50% {
            background-color: transparent;
        }
        70% {
            background-color: #A4EEF3;
        }
        85% {
            background-color: transparent;
        }
        100% {
            background-color: #A4EEF3;
        }
    }
    
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

<!-- moda -->
<button id="btn_cancel_join" class="d-none" data-toggle="modal" data-target="#cancel_join"></button>

<div class="modal fade" id="cancel_join" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered px-3">
        <div class="modal-content" style="border-radius: 10px;">
            <div id="modal_body_content"  class="modal-body text-center">
                <img src="{{ url('/img/icon/alert.png') }}" style="width:115px;height:115px;" class="mt-2 mb-2">
                <p id="title_cancel_join" class="mt-4" style="font-size: 20px;color: red;">
                    <b>ยืนยันการยกเลิก ?</b>
                </p>
                <span id="modal_content_cancel_join" class="mt-2">
                    
                </span>
                <span id="modal_html_warning" class="mt-2">
                    
                </span>
            </div>
            <div class="modal-footer text-center">
                <a id="btn_submit_cancel_join" type="button" class="btn btn-info padding-btn">
                    ยืนยัน
                </a>
                <a id="close_modal_cancel_join" type="button" class="btn btn-submit padding-btn" data-dismiss="modal">
                    Close
                </a>
            </div>
        </div>
    </div>
</div>


<!-- Button trigger modal -->
<button id="btn_Modal_cf_slip" type="button" class="d-none" data-toggle="modal" data-target="#Modal_cf_slip">
    <!--  -->
</button>

<!-- Modal -->
<div class="modal fade" id="Modal_cf_slip" tabindex="-1" aria-labelledby="Label_Modal_cf_slip" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="Label_Modal_cf_slip">โปรดตรวจสอบข้อมูลอีกครั้ง</h5>
                <button id="btn_close_Modal_cf_slip" type="button" class="close btn" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div id="content_Modal_cf_slip" class="col-12 text-center">
                        <!-- DATA -->
                    </div>
                    <div class="col-12 text-center mt-4 mb-0">
                        <p>เจ้าหน้าที่ผู้ยืนยัน : {{ Auth::user()->name }}</p>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button id="btn_change_status" style="width: 40%;" type="button" class="btn btn-success">ยืนยัน</button>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-body">

        <div class="row">
            <div class="col-12 col-md-6">
                <h4 class="mb-0 text-uppercase">
                    รายชื่อผู้เข้าร่วมกิจกรรม
                    <span style="font-size: 15px;color: gray;">
                        ทั้งหมด (<span id="count_account_all" style="font-size: 15px;color: gray;"></span>) คน
                    </span>
                </h4>
                <span class="">
                    อัพเดทข้อมูลล่าสุด : <span id="time_update_data">{{ date("H:i") }}</span> น.
                </span>
            </div>
            <div class="col-12 col-md-6">
                <div class="InputContainer float-end">
                    <input placeholder="ค้นหาด้วยเลขรหัสเท่านั้น" id="Search_input" class="Search_input" name="text" type="text" oninput="Search_data();">
                </div>
            </div>
            
        </div>
        
        <hr class="mt-3 mb-3">

        <div class="d-flex justify-content-end w-100">
            <button id="btn_export_excel" class="btn float-end btn-dark mx-3 d-none" onclick="createExcel()">Export Excel</button>
        </div>

        <br>

        <div class="table-responsive">
            <table id="content_table" class="table mb-0 align-middle">
                <thead>
                    <tr>
                        <th class="text-center">Photo</th>
                        <th class="text-center">Account</th>
                        <th class="text-center">Name</th>
                        <th class="text-center">Email</th>
                        <th class="text-center">Phone</th>
                        <th class="text-center">Time joined</th>
                        <th class="text-center">Team</th>
                        <th class="text-center">Team Host</th>
                        <th class="text-center">Shirt Size</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">QR-code</th>
                    </tr>
                </thead>
                <tbody id="content_tbody">
                    <!-- DATA USER -->
                </tbody>
            </table>
        </div>

    </div>
</div>

<script>
    
    var loop_get_account_reg_success ;
    document.addEventListener('DOMContentLoaded', (event) => {
        // console.log("START");
        get_account_reg_success('เข้าร่วมแล้ว');

        loop_get_account_reg_success = setInterval(function() {
            // console.log("LOOP");
            get_account_reg_success('เข้าร่วมแล้ว');
        }, 5000);
    });

    function Stop_loop_get_account_reg_success() {
        clearInterval(loop_get_account_reg_success);
    }

    function updateTimestamp() {
        let timestampElement = document.getElementById('time_update_data');
        let currentTimestamp = new Date();
        let hours = currentTimestamp.getHours().toString().padStart(2, '0');
        let minutes = currentTimestamp.getMinutes().toString().padStart(2, '0');
        let timeString = hours + ':' + minutes;
            timestampElement.textContent = timeString;
    }

    var delaySearch_data ;
    function Search_data(){

        clearTimeout(delaySearch_data);

        let Search_input = document.querySelector('#Search_input').value ;

        // console.log(Search_input);

        delaySearch_data = setTimeout(() => {
            
            if(Search_input){
                let div_1 = document.querySelectorAll('tr[tpye="เข้าร่วมแล้ว"]');
                    div_1.forEach(div_1 => {
                        div_1.classList.add('d-none');
                    })

                document.querySelector('tr[account="'+Search_input+'"]').classList.remove('d-none');
            }else{
                let div_1 = document.querySelectorAll('tr[tpye="เข้าร่วมแล้ว"]');
                    div_1.forEach(div_1 => {
                        div_1.classList.remove('d-none');
                    })
            }

        }, 1000);
    }

    var arr_member = [] ;
    var check_first_data = true;

    function get_account_reg_success(type_get_data){
        // console.log(type_get_data);

        fetch("{{ url('/') }}/api/get_account_reg_success", {
            method: 'post',
            body: JSON.stringify({ arr_member: arr_member }),
            headers: {
                'Content-Type': 'application/json'
            }
        }).then(function (response){
            return response.json();
        }).then(function(result){
            // console.log(result);

            updateTimestamp();

            setTimeout(() => {
                if(result){

                    let content_tbody = document.querySelector('#content_tbody');
                        // content_tbody.innerHTML = '';

                    let class_card_focus = '' ;
                    if (!check_first_data) {
                        class_card_focus = 'card_focus';
                    }else{
                        check_first_data = false;
                    }

                    for (let i = 0; i < result.length; i++) {

                        arr_member.push(result[i].id);

                        // status
                        let class_status = '';
                        let html_status = '';
                        let dropdown_status = '';
                        if(result[i].status == "เข้าร่วมแล้ว"){
                            class_status = 'success';
                            html_status = 'เข้าร่วมแล้ว';
                            dropdown_status = `
                                <div class="btn-group">
                                    <button class="btn btn-sm btn-success radius-30 dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        เข้าร่วมแล้ว
                                    </button>
                                    <div class="dropdown-menu">
                                        <span class="dropdown-item btn text-danger" onclick="Cancel_join('`+result[i].account+`');">
                                            ยกเลิกการเข้าร่วม
                                        </span>
                                    </div>
                                </div>
                            `;

                        }
                        else if(result[i].status == "รอยืนยัน"){
                            class_status = 'warning';
                            html_status = 'รอยืนยัน';
                        }
                        else{
                            class_status = 'danger';
                            html_status = 'ยังไม่เข้าร่วม';
                        }

                        // check role
                        let class_role = '';

                        if(result[i].role == "AL"){
                            class_role = 'secondary';
                        }else{
                            class_role = 'primary';
                        }

                        // photo 
                        let html_img = ''
                        if(result[i].photo){
                            html_img = `<img src="{{ url('storage')}}/`+result[i].photo+`" class="p-1" alt="">
                                        <span class="d-none">{{ url('storage')}}/`+result[i].photo+`</span>`;
                        }else{
                            html_img = `<img src="{{ url('/img/icon/profile.png') }}" class="p-1" alt="">
                                        <span class="d-none">{{ url('/img/icon/profile.png') }}</span>`;
                        }

                        // Pay_slip 
                        let html_Pay_slip = ''
                        if(result[i].pay_slip){
                            html_Pay_slip = `
                                <div class="product-img bg-transparent border" id="small_Pay_slip_`+result[i].account+`">
                                    <img src="{{ url('storage')}}/`+result[i].pay_slip+`" class="p-1" alt="" style="object-fit: cover;">
                                </div>
                                <div class="overlay" id="overlayPay_slip_`+result[i].account+`">
                                    <!-- เพิ่มภาพที่ใหญ่ขึ้นมาที่นี่ -->
                                    <img id="large_Pay_slip_`+result[i].account+`" src="{{ url('storage')}}/`+result[i].pay_slip+`" alt="Large Image">
                                </div>
                            `;

                            if(result[i].status != "เข้าร่วมแล้ว"){
                                btn_cf_Pay_slip = `
                                    <button type="button" class="btn btn-success" onclick="func_cf_pay_slip(`+result[i].account+`,'`+result[i].name+`','`+result[i].pay_slip+`');">ยืนยัน</button>
                                `;
                            }else{
                                btn_cf_Pay_slip = ``;
                            }

                        }else{
                            html_Pay_slip = ``;
                            btn_cf_Pay_slip = ``;
                        }

                        let text_shirt_size = '-' ;
                        if(result[i].shirt_size){
                            text_shirt_size = result[i].shirt_size ;
                        }

                        let text_group_id = '-' ;
                        if(result[i].group_id){
                            text_group_id = result[i].group_id ;
                        }

                        let html = `
                            <tr id="div_player_id_`+result[i].id+`" account=`+result[i].account+` tpye="`+html_status+`" class="`+class_card_focus+`">
                                <td>
                                    <center>
                                        <div id="product_img_account_111" class="product-img bg-transparent border">
                                            `+html_img+`
                                        </div>
                                    </center>
                                </td>
                                <td class="text-center">
                                    `+result[i].account+`
                                </td>
                                <td class="text-center">
                                    `+result[i].name+`
                                </td>
                                <td class="text-center">
                                    `+result[i].email+`
                                </td>
                                <td class="text-center">
                                    `+result[i].phone+`
                                </td>
                                <td id="td_role_`+result[i].account+`" class="text-center">
                                    `+result[i].time_cf_pay_slip+`
                                </td>
                                <td id="td_team_of_`+result[i].id+`" class="text-center">
                                    `+text_group_id+`
                                </td>
                                <td id="td_team_host_`+result[i].id+`" class="text-center">
                                    
                                </td>
                                <td id="td_shirt_size_of_`+result[i].id+`" class="text-center" style="font-size:13px;">
                                     `+text_shirt_size+`
                                </td>
                                <td id="td_status_`+result[i].account+`" class="text-center" style="font-size:13px;">
                                    `+dropdown_status+`
                                </td>
                                <td class="text-center">
                                    <a href="{{ url('/img/qr_profile')}}/`+result[i].qr_profile+`" target="bank">
                                    <img src="{{ url('/img/qr_profile')}}/`+result[i].qr_profile+`" class="p-1" alt="" style="width:100px;">
                                    </a>
                                    <span class="d-none">{{ url('/img/qr_profile')}}/`+result[i].qr_profile+`</span>
                                </td>
                            </tr>
                        `;

                        content_tbody.insertAdjacentHTML('afterbegin', html); // แทรกบนสุด

                    }

                    document.querySelector('#count_account_all').innerHTML = arr_member.length ;

                    setTimeout(() => {
                    let div_card_focus_all = document.querySelectorAll('tr[class="card_focus"]');
                        div_card_focus_all.forEach(card_item => {
                            card_item.classList.remove('card_focus');
                        })
                    }, 4500);

                    check_Team_and_Shirt_Size(arr_member);

                    // console.log("-----");
                    // console.log(arr_member);

                    document.querySelector('#btn_export_excel').classList.remove('d-none');

                }

            }, 500);
            
        }).catch(function(error){
            // console.error(error);
        });

    }

    function check_Team_and_Shirt_Size(arr_member){

        console.log('check_Team_and_Shirt_Size');

        fetch("{{ url('/') }}/api/check_Team_and_Shirt_Size", {
            method: 'post',
            body: JSON.stringify({ arr_member: arr_member }),
            headers: {
                'Content-Type': 'application/json'
            }
        }).then(function (response){
            return response.json();
        }).then(function(result){
            // console.log(result);

            setTimeout(() => {
                if(result){
                    for (let i = 0; i < result.length; i++) {
                        
                        let text_shirt_size = '-' ;
                        if(result[i].shirt_size){
                            text_shirt_size = result[i].shirt_size ;
                        }

                        let text_group_id = '-' ;
                        if(result[i].group_id){
                            text_group_id = result[i].group_id ;
                        }

                        let text_group_host = '-' ;
                        if(result[i].user_host_name){
                            text_group_host = result[i].user_host_name + " ("+result[i].user_host_account+")" ;
                        }

                        document.querySelector('#td_team_host_'+result[i].id).innerHTML = text_group_host;
                        document.querySelector('#td_team_of_'+result[i].id).innerHTML = text_group_id;
                        document.querySelector('#td_shirt_size_of_'+result[i].id).innerHTML = text_shirt_size;
                    }
                }

            }, 500);
            
        }).catch(function(error){
            // console.error(error);
        });

    }


</script>

<!-- เพิ่ม jQuery -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script src='https://cdn.jsdelivr.net/npm/table2excel@1.0.4/dist/table2excel.min.js'></script>

<script>
// function createExcel() {
//     let table2excel = new Table2Excel();
//     table2excel.export(document.querySelector("#content_table"));
// };

function createExcel() {
    let table2excel = new Table2Excel();
    let currentDate = new Date();
    let formattedDate = currentDate.toISOString().replace(/[:.]/g, "_"); // สร้างรูปแบบของวันที่ในรูปแบบที่ไม่มีเครื่องหมาย : และ .

    // ตั้งชื่อไฟล์เป็น "รายชื่อสมาชิกทั้งหมด-2023-12-31T12_30_45.678Z.xlsx" (ตัวอย่าง)
    let fileName = `รายชื่อผู้เข้าร่วมกิจกรรม-${formattedDate}.xlsx`;

    table2excel.export(document.querySelector("#content_table"), fileName);
};


function Cancel_join(account){

    // console.log(account);

    fetch("{{ url('/') }}/api/check_account_Cancel_join" + "/" + account)
        .then(response => response.json())
        .then(result => {
            // console.log(result);

            let modal_html_warning = document.querySelector('#modal_html_warning');
                modal_html_warning.innerHTML = '' ;

            let html = `
                    Account : `+result.account+` <br>
                    Name : `+result.name+` <br>
                    Phone : `+result.phone+` <br> 
                `;

            if(result){

                let text_warning = `
                    <br>
                    <b class="text-danger mt-3">
                        หากกดยืนยัน สมาชิกท่านนี้จะเปลี่ยนสถานะเป็น <br>
                        "<u>ยกเลิกการเข้าร่วมกิจกรรม</u>"
                    </b>
                    <br>
                `;

                modal_html_warning.insertAdjacentHTML('beforeend', text_warning); // แทรกล่างสุด

                // เช็คว่ารับเสื้อหรือยัง
                let html_shirt_size = ``;
                if(result.shirt_size){
                    html_shirt_size = `
                        <div class="card radius-10 bg-info bg-gradient mt-2">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <h5 class="mb-0 text-white">
                                            ผู้ใช้ท่านนี้เข้าร่วมกิจกรรมรับเสื้อแล้ว
                                        </h5>
                                        <h4 class="my-1">
                                            Size : `+result.shirt_size+`
                                        </h4>
                                        <p class="mb-0 font-13 text-danger">
                                            สามารถดูข้อมูลได้ที่เมนู "สมาชิก => ยกเลิกการเข้าร่วม"
                                        </p>
                                    </div>
                                    <div class="widgets-icons bg-light-whith text-danger ms-auto">
                                        <img src="{{ url('img/icon/Badge_polo_300.png')}}" style="width:80%;">
                                    </div>
                                </div>
                            </div>
                        </div>
                    `;
                    modal_html_warning.insertAdjacentHTML('beforeend', html_shirt_size); // แทรกล่างสุด
                }


                // เช็คว่ามีบ้านหรือไม่
                let html_group = ``;
                if(result.group_id){

                    let text_name_group ;
                    if(parseInt(result.group_id) < 9){
                        text_name_group = '0'+result.group_id;
                    }else{
                        text_name_group = result.group_id;
                    }

                    // เช็คว่าเป็น host หรือไม่
                    if(result.check_host == "Yes"){

                        html_group = `
                            <div class="card radius-10 bg-warning bg-gradient mt-2">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <h4 class="mb-2 text-white">
                                            ผู้ใช้ท่านนี้เป็น Host บ้าน `+text_name_group+`
                                        </h4>
                                        <b class="text-danger mt-2">
                                            หากกดยืนยัน สมาชิกทุกคนในบ้านนี้รวมถึงสมาชิกที่กำลังขอเข้าร่วมบ้าน
                                            จะเปลี่ยนสถานะเป็น "<u>ไม่มีบ้าน</u>"
                                        </b>
                                    </div>
                                </div>
                            </div>
                        </div>
                        `;
                    }
                    else if(result.check_host == "No"){

                        // เช็คว่าเป็น สมาชิก หรือไม่
                        if(result.group_status == "มีบ้านแล้ว"){

                            html_group = `
                                <div class="card radius-10 bg-warning bg-gradient mt-2">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <h4 class="mb-2 text-white">
                                                ผู้ใช้ท่านนี้เป็นสมาชิกบ้าน `+text_name_group+`
                                            </h4>
                                            <b class="text-danger mt-2">
                                                หากกดยืนยัน สมาชิกท่านนี้จะเปลี่ยนสถานะเป็น "<u>ไม่มีบ้าน</u>"
                                            </b>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            `;
                        }
                        else if(result.group_status == "กำลังขอเข้าร่วมบ้าน"){
                            html_group = `
                                <div class="card radius-10 bg-warning bg-gradient mt-2">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <h4 class="mb-2 text-white">
                                                ผู้ใช้ท่านนี้กำลังขอเข้าร่วมบ้าน `+text_name_group+`
                                            </h4>
                                            <b class="text-danger mt-2">
                                                หากกดยืนยัน สมาชิกท่านนี้จะเปลี่ยนสถานะเป็น "<u>ไม่มีบ้าน</u>"
                                            </b>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            `;
                        }
                    }

                    modal_html_warning.insertAdjacentHTML('beforeend', html_group); // แทรกล่างสุด

                }
                

                document.querySelector('#title_cancel_join').innerHTML = `<b>ยืนยันการยกเลิก ?</b>`;
                document.querySelector('#modal_content_cancel_join').innerHTML = html;
                document.querySelector('#btn_submit_cancel_join').setAttribute('onclick' , 'CF_cancel_player("'+result.id+'")');

                document.querySelector('#btn_cancel_join').click();
            }

    });
}

function CF_cancel_player(user_id){

    // console.log('user_id >> ' + user_id);

    fetch("{{ url('/') }}/api/CF_cancel_player" + "/" + user_id)
        .then(response => response.text())
        .then(result => {
            // console.log(result);

            if(result == 'success'){
                let html = `
                    <img src="{{ url('/img/icon/Frame 2.png') }}" style="width:115px;height:115px;" class="mt-2 mb-2">
                    <p class="mt-4" style="font-size: 20px;color: green;">
                        <b>เสร็จสิ้น</b>
                    </p>
                `;

                document.querySelector('#modal_body_content').innerHTML = html;

                if(document.querySelector('#div_player_id_'+user_id)){
                    document.querySelector('#div_player_id_'+user_id).classList.add('d-none');
                }

                setTimeout(() => {
                    document.querySelector('#close_modal_cancel_join').click();

                    let old_html = `
                        <img src="{{ url('/img/icon/alert.png') }}" style="width:115px;height:115px;" class="mt-2 mb-2">
                        <p id="title_cancel_join" class="mt-4" style="font-size: 20px;color: red;">
                            <b>ยืนยันการยกเลิก ?</b>
                        </p>
                        <span id="modal_content_cancel_join" class="mt-2">
                            
                        </span>
                        <span id="modal_html_warning" class="mt-2">
                            
                        </span>
                    `;

                    document.querySelector('#modal_body_content').innerHTML = old_html;
                }, 1000);

            }
    });

}

</script>

@endsection
