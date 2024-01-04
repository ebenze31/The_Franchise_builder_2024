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

    #qrcode {
  width:160px;
  height:160px;
  margin-top:15px;
}

</style>

<div class="card">
    <div class="card-body">

        <div class="row">
            <div class="col-6">
                <h4 class="mb-0 text-uppercase">
                    เพิ่มข้อมูลสมาชิก
                </h4>
            </div>
            <div class="col-6 text-end">
                <b>สมาชิกทั้งหมด : <span id="count_user"></span></b>
                <br>
                อัพเดทล่าสุด : <span id="last_update"></span>
            </div>
        </div>
        
        <hr class="mt-3 mb-3">

        <ul class="nav nav-tabs nav-primary" role="tablist">
            <li class="nav-item" role="presentation" onclick="clear_div_succell();">
                <a class="nav-link active" data-bs-toggle="tab" href="#primaryExcel" role="tab" aria-selected="true">
                    <div class="d-flex align-items-center">
                        <div class="tab-icon">
                            <i class="fa-solid fa-file-excel font-18 me-1"></i>
                        </div>
                        <div class="tab-title">Excel</div>
                    </div>
                </a>
            </li>
            <li class="nav-item" role="presentation" onclick="clear_div_succell();">
                <a class="nav-link" data-bs-toggle="tab" href="#primaryADDuser" role="tab" aria-selected="false">
                    <div class="d-flex align-items-center">
                        <div class="tab-icon">
                            <i class="fa-solid fa-plus font-18 me-1"></i>
                        </div>
                        <div class="tab-title">เพิ่มข้อมูลรายบุคคล</div>
                    </div>
                </a>
            </li>
        </ul>
        <div class="tab-content py-3">
            <div class="tab-pane fade show active" id="primaryExcel" role="tabpanel">

                <div class="card border-top border-0 border-4 border-success">
                    <div class="card-body p-5">
                        <div class="card-title text-center">
                            <i class="fa-solid fa-file-excel text-success font-50"></i>
                            <h5 class="mb-5 mt-2 text-success">เพิ่มข้อมูลสมาชิก</h5>
                        </div>
                        <hr>
                        <div class="col-12">
                            <label for="inputLastEnterUsername" class="form-label">Excel file</label>
                            <div class="input-group input-group-lg">
                                <span class="input-group-text bg-transparent">
                                    <i class="fa-solid fa-file-excel"></i>
                                </span>
                                <input class="form-control border-start-0" type="file" id="excelInput" accept=".xlsx, .xls" onclick="clear_div_succell();">
                            </div>
                        </div>
                        <div class="col-12 mt-4 mb-2">
                            <button class="btn btn-primary px-5" onclick="readExcel()">
                                Read Excel
                            </button>
                        </div>
                    </div>
                </div>

            </div>
            <div class="tab-pane fade" id="primaryADDuser" role="tabpanel">

                <div class="card border-top border-0 border-4 border-dark">
                    <div class="card-body p-5">
                        <div class="col-12">
                            <div class="card-body p-5">
                                <div class="card-title d-flex align-items-center">
                                    <div><i class="bx bxs-user me-1 font-22 text-primary"></i>
                                    </div>
                                    <h5 class="mb-0 text-primary">User Registration</h5>
                                </div>
                                <hr>
                                <div class="row g-3">
                                    <div class="col-12 col-md-6">
                                        <label for="account" class="form-label">Account</label>
                                        <input type="text" class="form-control" name="account" id="account" onchange="check_data_Registration();">
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="text" class="form-control" name="password" id="password" onchange="check_data_Registration();">
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <label for="name" class="form-label">Name</label>
                                        <input type="text" class="form-control" name="name" id="name" onchange="check_data_Registration();">
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <label for="phone" class="form-label">Phone</label>
                                        <input type="text" class="form-control" name="phone" id="phone" onchange="check_data_Registration();">
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="text" class="form-control" name="email" id="email" onchange="check_data_Registration();">
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <label for="role" class="form-label">Role</label>
                                        <select name="role" id="role" class="form-select" onchange="check_data_Registration();">
                                            <option selected value="AL">AL</option>
                                            <option value="Super-admin">Super-admin</option>
                                            <option value="Admin">Admin</option>
                                            <option value="Staff">Staff</option>
                                        </select>
                                    </div>
                                    <div class="col-12">
                                        <button id="btn_Registration" class="btn btn-primary px-5" disabled onclick="Registration_user();">
                                            ยืนยัน
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <hr>

            <div id="div_loader_Excel" class="col-12 mt-5 d-none">
                <section class="loader">
                    <div class="slider" style="--i:0"></div>
                    <div class="slider" style="--i:1"></div>
                    <div class="slider" style="--i:2"></div>
                    <div class="slider" style="--i:3"></div>
                    <div class="slider" style="--i:4"></div>
                    <span id="text_load" class="text-success" style="margin-top: 25px;">กำลังประมวลผล..</span>
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
        get_data_account('add_account');
    });

    function get_data_account(type_get_data){
        // console.log(type_get_data);

        fetch("{{ url('/') }}/api/get_data_account/" + type_get_data)
            .then(response => response.json())
            .then(result => {
                // console.log(result);

                setTimeout(() => {
                    if(result){
                        let last = result.length - 1 ;
                        // console.log(result[last]);

                        if(result[last]){
                            // ตัวอย่างข้อมูลจาก PHP
                            const phpDateString = result[last].created_at;

                            // สร้างวัตถุ Date จากข้อมูลที่ได้จาก PHP
                            const phpDate = new Date(phpDateString);

                            // สร้าง Options สำหรับการจัดรูปแบบ
                            const options = { year: 'numeric', month: 'short', day: 'numeric', hour: 'numeric', minute: 'numeric' };

                            // ใช้ toLocaleString() เพื่อแปลงวันที่
                            const formattedDate = phpDate.toLocaleString('en-UK', options);

                            // console.log(formattedDate);


                            document.querySelector('#count_user').innerHTML = result.length ;
                            document.querySelector('#last_update').innerHTML = formattedDate ;
                        }

                    }
                }, 500);

            });
    }

    function check_data_Registration(){

        let account = document.querySelector('#account').value ;
        let password = document.querySelector('#password').value ;
        let name = document.querySelector('#name').value ;
        let phone = document.querySelector('#phone').value ;
        let email = document.querySelector('#email').value ;
        let role = document.querySelector('#role').value ;

        // console.log(account);
        // console.log(password);
        // console.log(name);
        // console.log(phone);
        // console.log(email);
        // console.log(role);

        // ใช้ ternary operator และ every() เพื่อตรวจสอบทุกตัวแปร
        let allFieldsFilled = [account, password, name, phone, email, role].every(field => field !== '');

        // ตรวจสอบค่า allFieldsFilled
        if (allFieldsFilled) {
            document.querySelector('#btn_Registration').disabled = false ;
        }else{
            document.querySelector('#btn_Registration').disabled = true ;
        }

    }

    function Registration_user(){

        // console.log('Registration_user');
        document.querySelector('#btn_Registration').disabled = true ;

        let account = document.querySelector('#account').value ;
        let password = document.querySelector('#password').value ;
        let name = document.querySelector('#name').value ;
        let phone = document.querySelector('#phone').value ;
        let email = document.querySelector('#email').value ;
        let role = document.querySelector('#role').value ;

        let jsonData = [] ;
            jsonData = {
                    "account" : account,
                    "password" : password,
                    "name" : name,
                    "phone" : phone,
                    "email" : email,
                    "role" : role,
                };

        // create_user
        fetch("{{ url('/') }}/api/Registration_user", {
            method: 'post',
            body: JSON.stringify(jsonData),
            headers: {
                'Content-Type': 'application/json'
            }
        }).then(function (response){
            return response.text();
        }).then(function(data){
            // console.log(data);

            if(data == "success"){
                // เคลียร์ input
                document.querySelector('#account').value = '' ;
                document.querySelector('#password').value = '' ;
                document.querySelector('#name').value = '' ;
                document.querySelector('#phone').value = '' ;
                document.querySelector('#email').value = '' ;

                document.querySelector('#text_load').innerHTML = 'กำลังสร้าง QR-Code..';

                fetch("{{ url('/') }}/api/qr_profile/")
                    .then(response => response.text())
                    .then(result => {
                        // console.log(result);

                        if(result){
                            document.querySelector('#div_loader_Excel').classList.add('d-none');
                            document.querySelector('#text_load').innerHTML = 'กำลังประมวลผล..';
                            document.querySelector('#div_success_Excel').classList.remove('d-none');

                        }
                });
                
            }

        }).catch(function(error){
            // console.error(error);
        });
    }

    // EXCEL
    function readExcel() {

        document.querySelector('#div_loader_Excel').classList.remove('d-none');

        let input = document.getElementById('excelInput');
        let file = input.files[0];

        if (file) {
            let reader = new FileReader();

            reader.onload = function(e) {
                let data = e.target.result;
                let workbook = XLSX.read(data, { type: 'binary' });

                // เลือกชีทที่ต้องการ (0 คือชีทแรก)
                let sheetName = workbook.SheetNames[0];
                let sheet = workbook.Sheets[sheetName];

                // แปลงข้อมูลในชีทเป็น JSON
                let jsonData = XLSX.utils.sheet_to_json(sheet);

                // ตรวจสอบข้อมูลในคอนโซล
                // console.log(jsonData);
                
                // // create_qr_code
                // fetch("{{ url('/') }}/api/create_qr_code", {
                //     method: 'post',
                //     body: JSON.stringify(jsonData),
                //     headers: {
                //         'Content-Type': 'application/json'
                //     }
                // }).then(function (response){
                //     return response.text();
                // }).then(function(data){
                //     console.log(data);
                // }).catch(function(error){
                //     // console.error(error);
                // });
                    
                // create_user
                fetch("{{ url('/') }}/api/create_user/excel", {
                    method: 'post',
                    body: JSON.stringify(jsonData),
                    headers: {
                        'Content-Type': 'application/json'
                    }
                }).then(function (response){
                    return response.text();
                }).then(function(data){
                    // console.log(data);

                    if(data == "success"){
                        // เคลียร์ input
                        clearFileInput('excel');

                        document.querySelector('#text_load').innerHTML = 'กำลังสร้าง QR-Code..';

                        fetch("{{ url('/') }}/api/qr_profile/")
                            .then(response => response.text())
                            .then(result => {
                                // console.log(result);

                                if(result){
                                    document.querySelector('#div_loader_Excel').classList.add('d-none');
                                    document.querySelector('#text_load').innerHTML = 'กำลังประมวลผล..';
                                    document.querySelector('#div_success_Excel').classList.remove('d-none');

                                }
                        });
                        
                    }

                }).catch(function(error){
                    // console.error(error);
                });

            };

            reader.readAsBinaryString(file);

        } else {
            document.querySelector('#div_loader_Excel').classList.add('d-none');
            alert('กรุณาเลือกไฟล์ Excel');
        }
    }

    // CSV
    function readCSV() {

        document.querySelector('#div_loader_CSV').classList.remove('d-none');

        let input = document.getElementById('csvInput');
        let file = input.files[0];

        if (file) {
            let reader = new FileReader();

            reader.onload = function(e) {
                let csvData = e.target.result;
                
                // แปลงข้อมูล CSV เป็น JSON
                let jsonData = csvToJSON(csvData);

                // ตรวจสอบข้อมูลในคอนโซล
                // console.log(jsonData);

                fetch("{{ url('/') }}/api/create_user/excel", {
                    method: 'post',
                    body: JSON.stringify(jsonData),
                    headers: {
                        'Content-Type': 'application/json'
                    }
                }).then(function (response){
                    return response.text();
                }).then(function(data){
                    // console.log(data);

                    if(data == "success"){
                        // เคลียร์ input
                        clearFileInput('csv');

                        document.querySelector('#div_loader_CSV').classList.add('d-none');
                        document.querySelector('#div_success_CSV').classList.remove('d-none');
                    }

                }).catch(function(error){
                    // console.error(error);
                });

            };

            reader.readAsText(file);
        } else {
            document.querySelector('#div_loader_CSV').classList.add('d-none');
            alert('กรุณาเลือกไฟล์ CSV');
        }
    }

    function csvToJSON(csvData) {
        let lines = csvData.split("\n");
        let result = [];

        let headers = lines[0].split(",");
        for (let i = 1; i < lines.length; i++) {
            let obj = {};
            let currentline = lines[i].split(",");

            for (let j = 0; j < headers.length; j++) {
                obj[headers[j]] = currentline[j];
            }

            result.push(obj);
        }

        return result;
    }

    // เคลียไฟล์ออกจาก input หลัง reader เรียบร้อย
    function clearFileInput(type){
        let input = document.getElementById(type+'Input');
        
        // กำหนดค่า input ให้เป็น null หรือเปลี่ยนเป็นไฟล์ว่าง
        input.value = null; // หรือ input.value = '';

    }

    function clear_div_succell(){
        // console.log('clear_div_succell');
        document.querySelector('#div_success_Excel').classList.add('d-none');
    }

</script>

<!-- ใส่ลิงก์ไปยังไลบรารี XLSX -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.16.9/xlsx.full.min.js"></script>
@endsection
