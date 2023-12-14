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
                    รายชื่อสมาชิกทั้งหมด
                    <span style="font-size: 15px;color: gray;">
                        ทั้งหมด (<span id="count_account_all" style="font-size: 15px;color: gray;"></span>) คน
                    </span>
                </h4>
            </div>
            <div class="col-12 col-md-6">
                <div class="InputContainer float-end">
                    <input placeholder="Search.." id="Search_input" class="Search_input" name="text" type="text" oninput="Search_data();">
                </div>
            </div>
        </div>
        
        <hr class="mt-3 mb-3">

        <div class="table-responsive">
            <table class="table mb-0 align-middle">
                <thead>
                    <tr>
                        <th class="text-center">Photo</th>
                        <th>Information</th>
                        <th class="text-center">Role</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Pay slip</th>
                        <th class="text-center"></th>
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
    
    document.addEventListener('DOMContentLoaded', (event) => {
        // console.log("START");
        get_data_account('all');
    });

    var delaySearch_data ;
    function Search_data(){

        clearTimeout(delaySearch_data);

        let Search_input = document.querySelector('#Search_input').value ;

        delaySearch_data = setTimeout(() => {
            // console.log(Search_input);
            if(Search_input){
                get_data_account(Search_input);
            }else{
                get_data_account('all');
            }
        }, 1000);
    }

    function get_data_account(type_get_data){
        // console.log(type_get_data);

        fetch("{{ url('/') }}/api/get_data_account/" + type_get_data)
            .then(response => response.json())
            .then(result => {
                // console.log(result);

                setTimeout(() => {
                    document.querySelector('#count_account_all').innerHTML = result.length ;
                    if(result){

                        let content_tbody = document.querySelector('#content_tbody');
                            content_tbody.innerHTML = '';

                        for (let i = 0; i < result.length; i++) {

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

                            if(result[i].role == "Member"){
                                class_role = 'secondary';
                            }else{
                                class_role = 'primary';
                            }

                            // photo 
                            let html_img = ''
                            if(result[i].photo){
                                html_img = `<img src="{{ url('storage')}}/`+result[i].photo+`" class="p-1" alt="">`;
                            }else{
                                html_img = `<img src="{{ url('/img/icon/profile.png') }}" class="p-1" alt="">`;
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

                            let html = `
                                <tr>
                                    <td>
                                        <center>
                                            <div id="product_img_account_111" class="product-img bg-transparent border">
                                                `+html_img+`
                                            </div>
                                        </center>
                                    </td>
                                    <td>
                                        <b>Account</b> : `+result[i].account+`
                                        <br>
                                        <b>Name</b> : `+result[i].name+`
                                        <br>
                                        <b>Email</b> : `+result[i].email+`
                                        <br>
                                        <b>Phone</b> : `+result[i].phone+`
                                    </td>
                                    <td id="td_role_`+result[i].account+`" class="text-center">
                                        <a class="btn btn-sm btn-`+class_role+` radius-30">
                                            `+result[i].role+`
                                        </a>
                                    </td>
                                    <td id="td_status_`+result[i].account+`" class="text-center">
                                        <a class="btn btn-sm btn-`+class_status+` radius-30">
                                            `+html_status+`
                                        </a>
                                    </td>
                                    <td>
                                        <center>
                                            `+html_Pay_slip+`
                                        </center>
                                    </td>
                                    <td id="td_btn_cf_Pay_slip_`+result[i].account+`">
                                        <center>
                                            `+btn_cf_Pay_slip+`
                                        </center>
                                    </td>
                                </tr>
                            `;

                            content_tbody.insertAdjacentHTML('beforeend', html); // แทรกล่างสุด

                            if(result[i].pay_slip){
                                const thumbnail = document.getElementById('small_Pay_slip_' + result[i].account);
                                const overlay = document.getElementById('overlayPay_slip_' + result[i].account);
                                const overlayImage = document.getElementById('large_Pay_slip_' + result[i].account);

                                thumbnail.addEventListener('mouseenter', function() {
                                    overlay.style.display = 'block';
                                    overlayImage.src = "{{ url('storage')}}/" + result[i].pay_slip ;
                                });

                                thumbnail.addEventListener('mouseleave', function() {
                                    overlay.style.display = 'none';
                                });

                                thumbnail.addEventListener('click', function() {
                                    overlay.style.display = 'block';
                                    overlayImage.src = "{{ url('storage')}}/" + result[i].pay_slip ;
                                });
                            }

                        }

                    }

                }, 500);

            });
    }

    function func_cf_pay_slip(account, name , pay_slip){
        // console.log(account);
        let html = `
            <img src="{{ url('storage')}}/`+pay_slip+`" class="p-1" style="width: 60%;">
            <h5 class="mt-3"><b>Account</b> : `+account+`</h5>
            <h5><b>Name</b> : `+name+`</h5>
        `;

        document.querySelector('#content_Modal_cf_slip').innerHTML = html ;
        document.querySelector('#btn_Modal_cf_slip').click();

        let btn_change_status = document.querySelector('#btn_change_status');
            btn_change_status.setAttribute("onclick", "change_status('" + account + "');");
    }

    function change_status(account){

        fetch("{{ url('/') }}/api/change_status/" + account + "/" + "{{ Auth::user()->id }}")
            .then(response => response.text())
            .then(result => {
                // console.log(result);
                if(result == "success"){
                    let td_role = document.querySelector('#td_role_' + account) ;
                    let td_status = document.querySelector('#td_status_' + account) ;
                    let td_btn_cf_Pay_slip = document.querySelector('#td_btn_cf_Pay_slip_' + account) ;

                    let html_role = `
                        <a class="btn btn-sm btn-primary radius-30">
                            Challenger
                        </a>
                    `;
                    td_role.innerHTML = html_role ;

                    let html_status = `
                        <a class="btn btn-sm btn-success radius-30">
                            เข้าร่วมแล้ว
                        </a>
                    `;
                    td_status.innerHTML = html_status ;

                    td_btn_cf_Pay_slip.innerHTML = '' ;
                    document.querySelector('#btn_close_Modal_cf_slip').click();
                }

            });
    }

</script>

<!-- เพิ่ม jQuery -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

@endsection
