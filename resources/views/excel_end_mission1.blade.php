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
        -webkit-border-radius: 20px;    
        border-radius: 20px; 
        -moz-border-radius:20px;
        -khtml-border-radius:20px;
    }

</style>

<div class="card">
    <div class="card-body">

        <div class="row">
            <div class="col-12">
                <h4 class="mb-0 text-uppercase">
                    End Mission 1
                </h4>
            </div>
        </div>

        <hr class="mt-3 mb-3">

        <ul class="nav nav-tabs nav-primary" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link active" data-bs-toggle="tab" href="#primaryExcel" role="tab" aria-selected="true">
                    <div class="d-flex align-items-center">
                        <div class="tab-icon">
                            <i class="fa-solid fa-file-excel font-18 me-1"></i>
                        </div>
                        <div class="tab-title">Excel</div>
                    </div>
                </a>
            </li>
        </ul>
        <div class="tab-content py-3">
            <div class="tab-pane fade show active" id="primaryExcel" role="tabpanel">

                <div class="card border-top border-0 border-4 border-info">
                    <div class="card-body p-5">
                        <div class="col-12">
                            <label for="inputLastEnterUsername" class="form-label">Excel file</label>
                            <div class="input-group input-group-lg">
                                <span class="input-group-text bg-transparent">
                                    <i class="fa-solid fa-file-excel"></i>
                                </span>
                                <input class="form-control border-start-0" type="file" id="excelInput" accept=".xlsx, .xls" onclick="clear_div_succell();" onchange="PreviewDATA();">
                            </div>
                        </div>

                        <div id="div_PreviewDATA" class="col-12 mt-4 mb-2 d-none">

                            <hr>
                            <h4 class="text-info">Preview DATA</h4>

                            <div id="PreviewDATA" class="row">
                                <!-- PreviewDATA -->
                            </div>
                        </div>

                        <div class="col-12 d-flex justify-content-end mt-4 mb-2">
                            <br><br>
                            <button class="btn btn-info px-5" onclick="readExcel()">
                                ยืนยัน
                            </button>
                        </div>

                        <hr>

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
                                <!--  -->
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
</div>


<script>
    
    document.addEventListener('DOMContentLoaded', (event) => {
        // console.log("START");
    });


    function PreviewDATA(){

        let input = document.getElementById('excelInput');
        let file = input.files[0];

        if (file) {
            let reader = new FileReader();

            reader.onload = function(e) {
                let data = e.target.result;
                let workbook = XLSX.read(data, { type: 'binary' });

                let previewDATA = document.querySelector('#PreviewDATA');
                    previewDATA.innerHTML = '' ;

                // console.log(workbook.SheetNames)

                for (let i = 1; i < workbook.SheetNames.length; i++) {

                    // เลือกชีทที่ต้องการ 
                    let sheetName = workbook.SheetNames[i];
                    let sheet = workbook.Sheets[sheetName];

                    // แปลงข้อมูลในชีทเป็น JSON
                    let jsonData = XLSX.utils.sheet_to_json(sheet);

                    // ตรวจสอบข้อมูลในคอนโซล
                    // console.log(sheetName);
                    // console.log(jsonData);
                    // console.log("--------------");

                    let text_title ;
                    if(sheetName == "ALL_complete"){
                        text_title = 'ผลรวมทีม เกิน 700,000 และทุกคนในทีม เกิน 50,000';
                    }
                    else if(sheetName == "Team_no10"){
                        text_title = 'ผลรวมทีม เกิน 700,000 และบางคนในทีม เกิน 50,000';
                    }
                    else if(sheetName == "Team_out"){
                        text_title = 'ทีมที่โดนยุบบ้าน (ไม่เกิน 700,000)';
                    }
                    else if(sheetName == "People_noTeam"){
                        text_title = 'ผลรวมทีม ไม่เกิน 700,000 และบางคนในทีม เกิน 50,000';
                    }
                    else if(sheetName == "People_out"){
                        text_title = 'ไม่เกิน 50,000';
                    }

                    let html = `
                        <div class="col-12">
                            <h3>`+text_title+` (`+sheetName+`)</h3>
                            <div id="div_`+sheetName+`" class="row">
                                <div class="col-12">
                                    <span>ไม่มีข้อมูล</span>   
                                </div>
                            </div> 
                        </div>
                    `;

                    previewDATA.insertAdjacentHTML('beforeend', html); // แทรกล่างสุด

                    let account = ``;
                    let team = ``;
                    let arr_team = [];

                    for (let xi = 0; xi < jsonData.length; xi++) {
                        
                        let div_of_data = document.querySelector('#div_'+sheetName);
                            div_of_data.innerHTML = ''


                        if(sheetName == "ALL_complete"){
                            account = "Account : " + jsonData[xi].account + " , " ;
                            team = "TEAM : " + jsonData[xi].group_id ;

                            if(!arr_team.includes(jsonData[xi].group_id)){
                                arr_team.push(jsonData[xi].group_id);
                            }
                        }
                        else if(sheetName == "Team_no10"){
                            account = "Account : " + jsonData[xi].account + " , " ;
                            team = "TEAM : " + jsonData[xi].group_id ;

                            if(!arr_team.includes(jsonData[xi].group_id)){
                                arr_team.push(jsonData[xi].group_id);
                            }
                        }
                        else if(sheetName == "Team_out"){
                            account = "";
                            team = "TEAM : " + jsonData[xi].group_id ;

                            if(!arr_team.includes(jsonData[xi].group_id)){
                                arr_team.push(jsonData[xi].group_id);
                            }
                        }
                        else if(sheetName == "People_noTeam"){
                            account = "Account : " + jsonData[xi].account + " , " ;
                            team = "TEAM : " + jsonData[xi].group_id ;

                            if(!arr_team.includes(jsonData[xi].group_id)){
                                arr_team.push(jsonData[xi].group_id);
                            }
                        }
                        else if(sheetName == "People_out"){
                            account = "Account : " + jsonData[xi].account + " , " ;
                            team = "TEAM : " + jsonData[xi].group_id ;

                            if(!arr_team.includes(jsonData[xi].group_id)){
                                arr_team.push(jsonData[xi].group_id);
                            }
                        }

                        let html = `
                            <div class="col-12">
                                <h6>`+account+``+team+`</h6>
                            </div>
                        `;

                        previewDATA.insertAdjacentHTML('beforeend', html); // แทรกล่างสุด

                    }

                    let html_sum ;
                    if(sheetName == "Team_out"){
                        html_sum = `
                            <div class="col-12">
                                <h5 class="text-danger">รวม : `+arr_team.length+` ทีม</h5>
                            </div>
                        `;
                    }else{
                        html_sum = `
                            <div class="col-12">
                                <h5 class="text-danger">รวม : `+jsonData.length+` คน `+arr_team.length+` ทีม</h5>
                            </div>
                        `;
                    }

                    previewDATA.insertAdjacentHTML('beforeend', html_sum); // แทรกล่างสุด


                    previewDATA.insertAdjacentHTML('beforeend', '<hr class="mt-2 mb-2">'); // แทรกล่างสุด
                }

                document.querySelector('#div_PreviewDATA').classList.remove('d-none');

            };

            reader.readAsBinaryString(file);

        }

    }

</script>

<script>
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

                for (let i = 1; i < workbook.SheetNames.length; i++) {

                    // เลือกชีทที่ต้องการ
                    let sheetName = workbook.SheetNames[i];
                    let sheet = workbook.Sheets[sheetName];

                    // แปลงข้อมูลในชีทเป็น JSON
                    let jsonData = XLSX.utils.sheet_to_json(sheet);

                    // ตรวจสอบข้อมูลในคอนโซล
                    // console.log(sheetName);
                    // console.log(jsonData);
                    // console.log('----------');

                    if(sheetName == "ALL_complete"){

                        document.querySelector('#div_success_Excel').classList.remove('d-none');

                        let html_sheet_success = `
                            <svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
                                <circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none" />
                                <path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8" />
                            </svg>
                            <center>
                                <h5 class="mt-3">`+sheetName+` เสร็จสิ้น</h5>
                            </center>
                            <br>
                        `;

                        document.querySelector('#div_success_Excel').insertAdjacentHTML('beforeend', html_sheet_success); // แทรกล่างสุด

                        if(i >= 5){
                            document.querySelector('#div_loader_Excel').classList.add('d-none');
                        }

                    }
                    else{

                        delete_account_mission_1(sheetName , jsonData);

                        if(i >= 5){
                            document.querySelector('#div_loader_Excel').classList.add('d-none');
                        }

                    }


                }

            };

            reader.readAsBinaryString(file);

        } else {
            document.querySelector('#div_loader_Excel').classList.add('d-none');
            alert('กรุณาเลือกไฟล์ Excel');
        }
    }

    function delete_account_mission_1(sheetName , jsonData){

        let url ;

        if(sheetName == "Team_no10"){
            url = "{{ url('/') }}/api/mission_1_Team_no10" ;
        }
        else if(sheetName == "Team_out"){
            url = "{{ url('/') }}/api/mission_1_Team_out" ;
        }
        else if(sheetName == "People_noTeam"){
            url = "{{ url('/') }}/api/mission_1_People_noTeam" ;
        }
        else if(sheetName == "People_out"){
            url = "{{ url('/') }}/api/mission_1_People_out" ;
        }

        // console.log(sheetName);
        // console.log(jsonData);
        // console.log('----------');


        fetch(url, {
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

                // document.querySelector('#div_loader_Excel').classList.add('d-none');
                document.querySelector('#div_success_Excel').classList.remove('d-none');

                let html_sheet_success = `
                    <svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
                        <circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none" />
                        <path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8" />
                    </svg>
                    <center>
                        <h5 class="mt-3">`+sheetName+` เสร็จสิ้น</h5>
                    </center>
                    <br>
                `;

                document.querySelector('#div_success_Excel').insertAdjacentHTML('beforeend', html_sheet_success); // แทรกล่างสุด
            }

        }).catch(function(error){
            console.error(error);
        });

    }



    // เคลียไฟล์ออกจาก input หลัง reader เรียบร้อย
    function clearFileInput(type){
        let input = document.getElementById(type+'Input');
        
        // กำหนดค่า input ให้เป็น null หรือเปลี่ยนเป็นไฟล์ว่าง
        input.value = null; // หรือ input.value = '';

    }

    function clear_div_succell(){
        document.querySelector('#div_success_Excel').classList.add('d-none');
        // document.querySelector('#div_PreviewDATA').classList.add('d-none');
    }

</script>

<!-- ใส่ลิงก์ไปยังไลบรารี XLSX -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.16.9/xlsx.full.min.js"></script>
@endsection
