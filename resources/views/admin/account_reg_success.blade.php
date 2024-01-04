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
            console.log(result);

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
                        if(result[i].status == "เข้าร่วมแล้ว"){
                            class_status = 'success';
                            html_status = 'เข้าร่วมแล้ว';
                        }else if(result[i].status == "รอยืนยัน"){
                            class_status = 'warning';
                            html_status = 'รอยืนยัน';
                        }else{
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

                        let html = `
                            <tr account=`+result[i].account+` tpye="`+html_status+`" class="`+class_card_focus+`">
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
                                <td id="shirt_size_id`+result[i].id+`" class="text-center" style="font-size:13px;">
                                     `+text_shirt_size+`
                                </td>
                                <td id="td_status_`+result[i].account+`" class="text-center" style="font-size:13px;">
                                    <a class="btn btn-sm btn-`+class_status+` radius-30" style="width:90%;">
                                        `+html_status+`
                                    </a>
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

                    // console.log("-----");
                    // console.log(arr_member);

                    document.querySelector('#btn_export_excel').classList.remove('d-none');

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

</script>

@endsection
