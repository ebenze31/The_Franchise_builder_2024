@extends('layouts.theme_admin')

@section('content')

<style>
    
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

<div class="card">
    <div class="card-body">

        <div class="row">
            <div class="col-12 col-md-6">
                <h4 class="mb-0 text-uppercase">
                    รายชื่อบ้านทั้งหมด
                </h4>
            </div>
            <div class="col-12 col-md-6">
                <div class="InputContainer float-end">
                    <input placeholder="Search Name group.." id="Search_input" class="Search_input" name="text" type="text" oninput="Search_data();">
                </div>
            </div>
        </div>
        
        <hr class="mt-3">

        <div class="row">
            <div class="col-6">
                <span style="font-size: 15px;color: gray;">
                    Active : <span id="count_team_active" class="text-success" style="font-size: 15px;"></span>
                </span>
            </div>
            <div class="col-6">
                <p class="mt-3 float-end">All : <span id="count_show_group"></span></p>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <button type="button" class="btn btn-info" onclick="select_type('ทั้งหมด');">
                    ทั้งหมด (<span id="count_team_all"></span>)
                </button>
                <button type="button" class="btn btn-success" onclick="select_type('ยืนยันเรียบร้อย');">
                    ยืนยันเรียบร้อย (<span id="count_team_success"></span>)
                </button>
                <button type="button" class="btn btn-warning" onclick="select_type('กำลังรอ');">
                    กำลังรอ (<span id="count_team_waiting"></span>)
                </button>
                <button type="button" class="btn btn-secondary" onclick="select_type('บ้านที่เปิดว่างอยู่');">
                    บ้านที่เปิดว่างอยู่ (<span id="count_team_empty_active"></span>)
                </button>
                <button type="button" class="btn btn-dark" onclick="select_type('บ้านที่ปิดอยู่');">
                    บ้านที่ปิดอยู่ (<span id="count_team_close"></span>)
                </button>
                <!-- <button class="btn float-end btn-dark mx-3" onclick="createExcel()">Excel</button> -->
            </div>
        </div>

        <script>
            
            function select_type(type){
              // console.log.log(type);
                let count_show_group = 0 ;

                let div_eiei = document.querySelectorAll('tr[class="member-list-row"]');
                    div_eiei.forEach(div_eiei => {
                        div_eiei.classList.add('d-none');
                    })

                if(type == "ยืนยันเรียบร้อย"){
                    let div_2 = document.querySelectorAll('tr[tr="tr_list"]');
                        div_2.forEach(div_2 => {
                            div_2.classList.add('d-none');
                        })

                    let div_1 = document.querySelectorAll('tr[status="ยืนยันเรียบร้อย"]');
                        div_1.forEach(div_1 => {
                            div_1.classList.remove('d-none');
                            count_show_group = count_show_group + 1 ;
                        })
                }
                else if(type == "กำลังรอ"){
                    let div_2 = document.querySelectorAll('tr[tr="tr_list"]');
                        div_2.forEach(div_2 => {
                            div_2.classList.add('d-none');
                        })

                    let div_1 = document.querySelectorAll('tr[status="กำลังรอ"]');
                        div_1.forEach(div_1 => {
                            div_1.classList.remove('d-none');
                            count_show_group = count_show_group + 1 ;
                        })
                }
                else if(type == "บ้านที่เปิดว่างอยู่"){
                    let div_2 = document.querySelectorAll('tr[tr="tr_list"]');
                        div_2.forEach(div_2 => {
                            div_2.classList.add('d-none');
                        })

                    let div_1 = document.querySelectorAll('tr[status="บ้านที่เปิดว่างอยู่"]');
                        div_1.forEach(div_1 => {
                            div_1.classList.remove('d-none');
                            count_show_group = count_show_group + 1 ;
                        })
                }
                else if(type == "บ้านที่ปิดอยู่"){
                    let div_2 = document.querySelectorAll('tr[tr="tr_list"]');
                        div_2.forEach(div_2 => {
                            div_2.classList.add('d-none');
                        })

                    let div_1 = document.querySelectorAll('tr[status="บ้านที่ปิดอยู่"]');
                        div_1.forEach(div_1 => {
                            div_1.classList.remove('d-none');
                            count_show_group = count_show_group + 1 ;
                        })
                }
                else if(type == "ทั้งหมด"){
                    let div_2 = document.querySelectorAll('tr[tr="tr_list"]');
                        div_2.forEach(div_2 => {
                            div_2.classList.add('d-none');
                        })

                    let div_1 = document.querySelectorAll('tr[tr="tr_list"]');
                        div_1.forEach(div_1 => {
                            div_1.classList.remove('d-none');
                            count_show_group = count_show_group + 1 ;
                        })
                }

                document.querySelector('#count_show_group').innerHTML = count_show_group ;
            }

        </script>

        <br>

        <div class="table-responsive">
            <table id="content_table" class="table mb-0 align-middle">
                <thead>
                    <tr>
                        <th class="text-center">Photo</th>
                        <th>Information</th>
                        <!-- <th class="text-center">Active</th> -->
                        <th class="text-center">Status</th>
                        <th class="text-center">Action</th>
                        <!-- <th class="text-center">Pay slip</th> -->
                        <!-- <th class="text-center"></th> -->
                    </tr>
                </thead>
                <tbody id="content_tbody">
                    <!-- DATA USER -->
                </tbody>
            </table>
        </div>

    </div>
</div>
<!-- เพิ่ม jQuery -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script>
	
	document.addEventListener('DOMContentLoaded', (event) => {
        // console.log("START");
        get_data_view_group('all');
    });

    var delaySearch_data ;
    function Search_data(){

        clearTimeout(delaySearch_data);

        let Search_input = document.querySelector('#Search_input').value ;

        delaySearch_data = setTimeout(() => {
            // console.log(Search_input);
            if(Search_input){
                get_data_view_group(Search_input);
            }else{
                get_data_view_group('all');
            }
        }, 1000);
    }

    function get_data_view_group(Search_input){

        fetch("{{ url('/') }}/api/get_data_view_group" + "/" + Search_input)
            .then(response => response.json())
            .then(result => {
                // console.log(result);

                setTimeout(() => {

                    if(result){

                        document.querySelector('#count_show_group').innerHTML = result.length ;

                        let content_tbody = document.querySelector('#content_tbody');
                            content_tbody.innerHTML = '';

                        let count_team_success = 0 ;
                        let count_team_waiting = 0 ;
                        let count_team_empty_active = 0 ;
                        let count_team_close = 0 ;
                        let count_team_active = 0 ;

                        let Player = 0 ;
                        for (let i = 0; i < result.length; i++) {

                            if(result[i].active == "Yes"){
                                count_team_active = count_team_active + 1;
                            }

                            // check role
                            let class_status = '';
                            let text_status = '';

                            if(result[i].status == "ยืนยันเรียบร้อย"){
                                class_status = 'success';
                                text_status = 'ยืนยันเรียบร้อย';
                                count_team_success = count_team_success + 1 ;
                            }
                            else if(result[i].status == "กำลังรอ"){
                                class_status = 'warning';
                                text_status = 'กำลังรอ';
                                count_team_waiting = count_team_waiting + 1
                            }
                            else{
                                class_status = 'secondary';
                                // text_status = 'ว่าง';

                                if(result[i].active == "Yes"){
                                    count_team_empty_active = count_team_empty_active + 1;
                                    text_status = 'บ้านที่เปิดว่างอยู่' ;
                                }else{
                                    count_team_close = count_team_close + 1 ;
                                    text_status = 'บ้านที่ปิดอยู่' ;
                                }
                            }

                            let count_member = 0;
                            let member_arr ;

                            let count_request_join = 0;
                            let request_join_arr ;

                            if (result[i].member) {
                                member_arr = JSON.parse(result[i].member);
                                count_member = member_arr.length ;
                            }

                            if (result[i].request_join) {
                                request_join_arr = JSON.parse(result[i].request_join);
                                count_request_join = request_join_arr.length ;
                            }

                            let html_action = '' ;
                            if (count_member == 0) {

                                if(result[i].active == "Yes"){
                                    // html_action = `
                                    //     <a class="btn btn-sm btn-warning radius-30" style="width:80%;">
                                    //         ปิดบ้านนี้
                                    //     </a>
                                    // `;
                                    html_action = `
                                        
                                    `;
                                }else{
                                    // html_action = `
                                    //     <a class="btn btn-sm btn-info radius-30" style="width:80%;">
                                    //         เปิดบ้านนี้
                                    //     </a>
                                    // `;
                                    html_action = `
                                        
                                    `;
                                }

                            }else if(count_member > 0 && count_member < 10){

                                if(result[i].active == "Yes"){
                                    html_action = `
                                        <a id="btn_delete_team_id_`+result[i].id+`" class="btn btn-sm btn-danger radius-30" style="width:80%;" onclick="delete_team('`+result[i].id+`');">
                                            ยุบบ้าน
                                        </a>
                                    `;
                                }

                                
                            }

                            let html_list_member = `` ;
                            let btn_view_member = `` ;

                            // console.log(count_member);

                            if(count_member != 0){

                                html_list_member = `
                                    <tr id="list_member_`+result[i].id+`" class="member-list-row d-none">
                                        <td colspan="4" class="container p-3">
                                        <div id="content_list_member_`+result[i].id+`" >
                                        </div>
                                        <div id="content_list_request_join_`+result[i].id+`" >
                                        </div>
                                        </td>
                                    </tr>
                                `;

                                btn_view_member = `
                                    <br>
                                    <a id="view_all_member_`+result[i].id+`" style="cursor: pointer;text-decoration: underline;" class="text-info" onclick="document.querySelector('#list_member_`+result[i].id+`').classList.toggle('d-none');">ดูสมาชิกทั้งหมด</a>
                                `;
                            }

                            let text_active ;

                            if(result[i].active == "Yes"){
                                text_active = `<span class="text-info">เปิด</span>` ;
                            }else{
                                text_active = `<span class="text-secondary">ปิด</span>` ;
                            }

                            let html = `
                                <tr id="tr_group_id_`+result[i].id+`" status="`+text_status+`" name_group="`+result[i].name_group+`" tr="tr_list" class="">
                                    <td>
                                        <center>
                                            <div class="product-img bg-transparent border">
                                                <img id="img_group_proficle_`+result[i].id+`" src="{{ url('/img/group_profile/`+class_status+`/id (`+result[i].id+`).png') }}" class="p-1" alt="">
                                            </div>
                                        </center>
                                    </td>
                                    <td>
                                        <b>ชื่อบ้าน</b> : `+result[i].name_group+`
                                        <br>
                                        <b>จำนวนสมาชิก</b> : <span id="count_member_of_group_`+result[i].id+`">`+count_member+` </span>
                                        `+btn_view_member+`
                                    </td>
                                    <td class="text-center d-none">
                                        `+text_active+`
                                    </td>
                                    <td id="td_status_id_`+result[i].id+`" class="text-center">
                                        <span class="text-`+class_status+`">
                                            <b>`+text_status+`</b>
                                        </span>
                                    </td>
                                    <td class="text-center">
                                        `+html_action+`
                                    </td>
                                </tr>
                                `+html_list_member+`
                            `;

                            content_tbody.insertAdjacentHTML('beforeend', html); // แทรกล่างสุด


                            if(count_member != 0){

                                let loop_member ;
                                for (let zx = 0; zx < count_member; zx++) {
                                    fetch("{{ url('/') }}/api/get_data_user" + "/" + member_arr[zx])
                                        .then(response => response.json())
                                        .then(user => {
                                            // console.log(user);

                                            let html_shirt_size ;
                                            if(user.shirt_size){
                                                html_shirt_size = `
                                                    <h6 class="mb-1 font-14 text-success"><b>รับเสื้อแล้ว</b></h6>
                                                    <p class="mb-0 font-13 text-secondary">Size : `+user.shirt_size+`</p>
                                                `;
                                            }else{
                                                html_shirt_size = `
                                                    <h6 class="mb-1 font-14 text-danger"><b>ยังไม่ได้รับเสื้อ</b></h6>
                                                `;
                                            }

                                            let html_time_get_shirt ;
                                            if(user.time_get_shirt){
                                                html_time_get_shirt = user.time_get_shirt;
                                            }else{
                                                html_time_get_shirt = `-`;
                                            }

                                            let check_host = ``;
                                            let html_for_member = ``;
                                            if(member_arr[zx] == result[i].host){
                                                check_host = `(<span class="text-danger">Host</span>)`;
                                            }else{
                                                html_for_member = `
                                                    <div class="float-end text-center">
                                                        <a class="btn btn-sm btn-warning radius-30" style="width:100%;" onclick="cancel_join('`+user.account+`');">
                                                            ยกเลิกการเป็นสมาชิก
                                                        </a>
                                                    </div>
                                                `;
                                            }

                                            loop_member = `
                                                <div id="div_member_id_`+user.id+`"  class="div_member customers-list-item d-flex align-items-center border-top border-bottom p-2 cursor-pointer row">
                                                    <div class="col-1">
                                                    <center>
                                                        <img src="{{ url('storage')}}/`+user.photo+`" class="rounded-circle" width="46" height="46" alt="">
                                                    </center>
                                                    </div>
                                                    <div class="col-3">
                                                        <h6 class="mb-1 font-14">
                                                            Name : `+user.name+` `+check_host+`
                                                        </h6>
                                                        <p class="mb-0 font-13 text-secondary">
                                                            Account : `+user.account+`
                                                        </p>
                                                        <p class="mb-0 font-13 text-secondary">
                                                            Phone : `+user.phone+`
                                                        </p>
                                                    </div>
                                                    <div class="col-3 text-center">
                                                        <h6 class="mb-1 font-14">
                                                            รับเสื้อเมื่อเวลา
                                                        </h6>
                                                        <p class="mb-0 font-13 text-secondary">
                                                            `+html_time_get_shirt+`
                                                        </p>
                                                    </div>
                                                    <div class="col-2">
                                                        <div class="float-end text-center">
                                                            `+html_shirt_size+`
                                                        </div>
                                                    </div>
                                                    <div class="col-3">
                                                        `+html_for_member+`
                                                    </div>
                                                </div>
                                            `; 


                                            if(member_arr[zx] == result[i].host){
                                                document.querySelector('#content_list_member_'+result[i].id).insertAdjacentHTML('afterbegin', loop_member); // แทรกบนสุด
                                                document.querySelector('#content_list_member_'+result[i].id).insertAdjacentHTML('afterbegin', '<h4>สมาชิก</h4>'); // แทรกบนสุด
                                            }else{
                                                document.querySelector('#content_list_member_'+result[i].id).insertAdjacentHTML('beforeend', loop_member); // แทรกล่างสุด
                                            }

                                    });
                                }

                                // request_join
                                setTimeout(() => {
                                    if(count_request_join != 0){
                                        document.querySelector('#content_list_request_join_'+result[i].id).insertAdjacentHTML('beforeend', '<h4 class="mt-2">ขอเข้าร่วมบ้าน</h4>'); // แทรกล่างสุด
                                        
                                        let loop_request_join ;
                                        for (let zx = 0; zx < count_request_join; zx++) {
                                            fetch("{{ url('/') }}/api/get_data_user" + "/" + request_join_arr[zx])
                                                .then(response => response.json())
                                                .then(user => {
                                                    // console.log(user);

                                                    let html_shirt_size ;
                                                    if(user.shirt_size){
                                                        html_shirt_size = `
                                                            <h6 class="mb-1 font-14 text-success"><b>รับเสื้อแล้ว</b></h6>
                                                            <p class="mb-0 font-13 text-secondary">Size : `+user.shirt_size+`</p>
                                                        `;
                                                    }else{
                                                        html_shirt_size = `
                                                            <h6 class="mb-1 font-14 text-danger"><b>ยังไม่ได้รับเสื้อ</b></h6>
                                                        `;
                                                    }

                                                    let html_time_get_shirt ;
                                                    if(user.time_get_shirt){
                                                        html_time_get_shirt = user.time_get_shirt;
                                                    }else{
                                                        html_time_get_shirt = `-`;
                                                    }

                                                    loop_request_join = `
                                                        <div id="div_request_join_id_`+user.id+`" class="div_request_join customers-list-item d-flex align-items-center border-top border-bottom p-2 cursor-pointer row">
                                                            <div class="col-1">
                                                            <center>
                                                                <img src="{{ url('storage')}}/`+user.photo+`" class="rounded-circle" width="46" height="46" alt="">
                                                            </center>
                                                            </div>
                                                            <div class="col-3">
                                                                <h6 class="mb-1 font-14">
                                                                    Name : `+user.name+`
                                                                </h6>
                                                                <p class="mb-0 font-13 text-secondary">
                                                                    Account : `+user.account+`
                                                                </p>
                                                                <p class="mb-0 font-13 text-secondary">
                                                                    Phone : `+user.phone+`
                                                                </p>
                                                            </div>
                                                            <div class="col-3 text-center">
                                                                <h6 class="mb-1 font-14">
                                                                    รับเสื้อเมื่อเวลา
                                                                </h6>
                                                                <p class="mb-0 font-13 text-secondary">
                                                                    `+html_time_get_shirt+`
                                                                </p>
                                                            </div>
                                                            <div class="col-2">
                                                                <div class="float-end text-center">
                                                                    `+html_shirt_size+`
                                                                </div>
                                                            </div>
                                                            <div class="col-3">
                                                                <div class="float-end text-center">
                                                                    <a class="btn btn-sm btn-warning radius-30" style="width:100%;" onclick="cancel_join('`+user.account+`');">
                                                                        ยกเลิกการเป็นสมาชิก
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    `;

                                                    document.querySelector('#content_list_request_join_'+result[i].id).insertAdjacentHTML('beforeend', loop_request_join); // แทรกล่างสุด
                                            });
                                        }
                                    }
                                }, 1000);

                            }

                        }

                        document.querySelector('#count_team_success').innerHTML = count_team_success ;
                        document.querySelector('#count_team_waiting').innerHTML = count_team_waiting ;
                        document.querySelector('#count_team_empty_active').innerHTML = count_team_empty_active ;
                        document.querySelector('#count_team_close').innerHTML = count_team_close ;

                        document.querySelector('#count_team_active').innerHTML = count_team_active ;
                        document.querySelector('#count_team_all').innerHTML = result.length ;


                    }

                }, 500);

            });
    }

</script>

<!-- cancel_join -->
<script>
    
    function cancel_join(account){

        // console.log("account >> " + account);

        fetch("{{ url('/') }}/api/get_users" + "/" + account)
            .then(response => response.json())
            .then(result => {
                // console.log(result);

                let html = `
                    Account : `+result.account+` <br>
                    Name : `+result.name+` <br>
                    Phone : `+result.phone+` <br>
                    Group id : `+result.group_id+` <br>
                    Group status : `+result.group_status+` <br>
                `;

                let html_warning = `
                    <br>
                    <b class="text-danger mt-3">หากกดยืนยัน สมาชิกท่านนี้จะเปลี่ยนสถานะเป็น <u>"ไม่มีบ้าน"</u></b>
                `;

                document.querySelector('#title_cancel_join').innerHTML = `<b>ยืนยันการยกเลิก ?</b>`;
                document.querySelector('#modal_content_cancel_join').innerHTML = html;
                document.querySelector('#modal_html_warning').innerHTML = html_warning;
                document.querySelector('#btn_submit_cancel_join').setAttribute('onclick' , 'CF_cancel_join("'+result.id+'")');
                document.querySelector('#btn_cancel_join').click();
        });

    }

    function CF_cancel_join(user_id){

        // console.log("CF_cancel_join");
        // console.log("user_id >> " + user_id);

        fetch("{{ url('/') }}/api/CF_cancel_join" + "/" + user_id)
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

                    if(document.querySelector('#div_request_join_id_'+user_id)){
                        document.querySelector('#div_request_join_id_'+user_id).classList.add('d-none');
                    }

                    if(document.querySelector('#div_member_id_'+user_id)){
                        document.querySelector('#div_member_id_'+user_id).classList.add('d-none');
                    }

                    setTimeout(() => {
                        document.querySelector('#close_modal_cancel_join').click();

                        let old_html = `
                            <img src="{{ url('/img/icon/alert.png') }}" style="width:115px;height:115px;" class="mt-2 mb-2">
                            <p class="mt-4" style="font-size: 20px;color: red;">
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

    function delete_team(group_id){

        // console.log("group_id >> " + group_id);

        let text_group_id ;
        if(parseInt(group_id) < 9){
            text_group_id = '0'+group_id ;
        }else{
            text_group_id = group_id ;
        }

        let html = `
            <b>ยืนยันการยุบบ้าน `+text_group_id+ ` ?</b>
        `;

        let html_warning = `
            <br>
            <b class="text-dark mt-3">หากกดยืนยัน สมาชิกทุกคนในบ้านนี้รวมถึงสมาชิกที่กำลังขอเข้าร่วม <br> จะเปลี่ยนสถานะเป็น <u>"ไม่มีบ้าน"</u></b>
        `;

        document.querySelector('#title_cancel_join').innerHTML = html;
        document.querySelector('#modal_html_warning').innerHTML = html_warning;
        document.querySelector('#btn_submit_cancel_join').setAttribute('onclick' , 'CF_delete_team("'+group_id+'")');
        document.querySelector('#btn_cancel_join').click();

    }

    function CF_delete_team(group_id){
        // console.log("group_id >> " + group_id);

        fetch("{{ url('/') }}/api/CF_delete_team" + "/" + group_id)
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

                    let img_url = `{{ url('/img/group_profile/secondary/id (`+group_id+`).png') }}`;
                        // console.log(img_url);
                    document.querySelector('#img_group_proficle_'+group_id).setAttribute('src' , img_url);
                    document.querySelector('#view_all_member_'+group_id).classList.add('d-none');
                    document.querySelector('#list_member_'+group_id).classList.add('d-none');
                    document.querySelector('#count_member_of_group_'+group_id).innerHTML = '0';
                    document.querySelector('#tr_group_id_'+group_id).setAttribute('status','บ้านที่เปิดว่างอยู่');
                    document.querySelector('#btn_delete_team_id_'+group_id).classList.add('d-none');
                    document.querySelector('#td_status_id_'+group_id).innerHTML = `
                        <span class="text-secondary">
                            <b>บ้านที่เปิดว่างอยู่</b>
                        </span>
                    `;

                    let count_team_waiting = document.querySelector('#count_team_waiting').innerHTML;
                    let count_team_empty_active = document.querySelector('#count_team_empty_active').innerHTML;

                    let update_count_team_waiting = parseInt(count_team_waiting) - 1 ;
                    let update_count_team_empty_active = parseInt(count_team_empty_active) + 1 ;

                    document.querySelector('#count_team_waiting').innerHTML = update_count_team_waiting;
                    document.querySelector('#count_team_empty_active').innerHTML = update_count_team_empty_active;

                    setTimeout(() => {
                        document.querySelector('#close_modal_cancel_join').click();

                        let old_html = `
                            <img src="{{ url('/img/icon/alert.png') }}" style="width:115px;height:115px;" class="mt-2 mb-2">
                            <p class="mt-4" style="font-size: 20px;color: red;">
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

<!-- <script src='https://cdn.jsdelivr.net/npm/table2excel@1.0.4/dist/table2excel.min.js'></script>

<script>
function createExcel() {
    let table2excel = new Table2Excel();
    table2excel.export(document.querySelector("#content_table"));
};
</script> -->

@endsection
