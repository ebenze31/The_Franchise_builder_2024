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
                    บ้านเปิดอยู่ :  <span id="count_team_active" style="font-size: 15px;color: gray;"></span>
                </span>
            </div>
            <div class="col-6">
                <p class="mt-3 float-end">ที่กำลังดู : <span id="count_show_group"></span></p>
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
            </div>
        </div>

        <script>
            
            function select_type(type){
                console.log(type);
                let count_show_group = 0 ;

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
            <table class="table mb-0 align-middle">
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
                console.log(result);

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

                            if (result[i].member) {
                                member_arr = JSON.parse(result[i].member);
                                count_member = member_arr.length ;
                            }

                            let html_action = '' ;
                            if (count_member == 0) {

                                if(result[i].active == "Yes"){
                                    html_action = `
                                        <a class="btn btn-sm btn-warning radius-30" style="width:80%;">
                                            ปิดบ้านนี้
                                        </a>
                                    `;
                                }else{
                                    html_action = `
                                        <a class="btn btn-sm btn-info radius-30" style="width:80%;">
                                            เปิดบ้านนี้
                                        </a>
                                    `;
                                }

                            }else if(count_member > 0 && count_member < 10){

                                if(result[i].active == "Yes"){
                                    html_action = `
                                        <a class="btn btn-sm btn-danger radius-30" style="width:80%;">
                                            ยุบบ้าน
                                        </a>
                                    `;
                                }

                                
                            }

                            let html_list_member = `` ;
                            let btn_view_member = `` ;

                            if(count_member != 0){
                                html_list_member = `
                                    <tr id="list_member_`+result[i].id+`" class="member-list-row d-none">
                                        <td colspan="5">
                                            <div class="d-flex align-items-center py-3 border-bottom cursor-pointer">
                                            <div class="product-img me-2">
                                                 <img src="assets/images/products/06.png" alt="product img">
                                              </div>
                                            <div class="">
                                                <h6 class="mb-0 font-14">Grey Long Chair</h6>
                                                <p class="mb-0">146 Sales</p>
                                            </div>
                                            <div class="ms-auto">
                                                <h6 class="mb-0">158.24</h6>
                                            </div>
                                          </div>
                                        </td>
                                    </tr>
                                `;

                                btn_view_member = `
                                    <br>
                                    <a style="cursor: pointer;text-decoration: underline;" class="text-info" onclick="document.querySelector('#list_member_`+result[i].id+`').classList.toggle('d-none');">ดูสมาชิกทั้งหมด</a>
                                `;
                            }

                            let text_active ;

                            if(result[i].active == "Yes"){
                                text_active = `<span class="text-info">เปิด</span>` ;
                            }else{
                                text_active = `<span class="text-secondary">ปิด</span>` ;
                            }

                            let html = `
                                <tr status="`+text_status+`" name_group="`+result[i].name_group+`" tr="tr_list" class="">
                                    <td>
                                        <center>
                                            <div id="product_img_account_111" class="product-img bg-transparent border">
                                                <img src="{{ url('/img/group_profile/`+class_status+`/id (`+result[i].id+`).png') }}" class="p-1" alt="">
                                            </div>
                                        </center>
                                    </td>
                                    <td>
                                        <b>ชื่อบ้าน</b> : `+result[i].name_group+`
                                        <br>
                                        <b>จำนวนสมาชิก</b> : `+count_member+`
                                        `+btn_view_member+`
                                    </td>
                                    <td class="text-center d-none">
                                        `+text_active+`
                                    </td>
                                    <td id="td_status_`+text_status+`" class="text-center">
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

@endsection
