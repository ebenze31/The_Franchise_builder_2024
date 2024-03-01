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
            <div class="col-6">
                <h4 class="mb-0 text-uppercase">
                    เพิ่มคะแนน PC
                </h4>
            </div>
            <div class="col-6 text-end">
                <b>Update : Week <span id="last_week"></span></b>
                <br>
                Date/Time : <span id="last_update"></span>
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
                        <div class="card-title text-center">
                            <i class="fa-solid fa-file-excel text-info font-50"></i>
                            <h5 class="mb-5 mt-2 text-info">เพิ่มคะแนน PC</h5>
                        </div>
                        <hr>
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

                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">account</th>
                                        <th scope="col">group_id</th>
                                        <th scope="col">week</th>
                                        <th scope="col">pc_point</th>
                                        <th scope="col">new_code</th>
                                        <th scope="col">rank_of_week</th>
                                        <th scope="col">rank_last_week</th>
                                        <th scope="col">csta</th>
                                        <th scope="col">pers</th>
                                        <th scope="col">mission 1</th>
                                        <th scope="col">mission 3</th>
                                        <th scope="col">grand mission</th>
                                        <th scope="col">active_dream</th>
                                        <th scope="col">team_rank_of_week</th>
                                        <th scope="col">team_rank_last_week</th>
                                        <th scope="col">pc_grand_of_gweek</th>
                                        <th scope="col">pc_grand_last_gweek</th>
                                        <th scope="col">nc_grand_of_gweek</th>
                                        <th scope="col">nc_grand_last_gweek</th>
                                        <th scope="col">pc_grand_of_week_individual</th>
                                        <th scope="col">pc_grand_last_week_individual</th>
                                        <th scope="col">nc_grand_of_week_individual</th>
                                        <th scope="col">nc_grand_last_week_individual</th>
                                        <th scope="col">sum_newcode_team</th>
                                        <th scope="col">aa_grand_of_week</th>
                                        <th scope="col">aa_grand_last_week</th>
                                        <th scope="col">aa_grand_of_week_individual</th>
                                        <th scope="col">aa_grand_last_week_individual</th>
                                    </tr>
                                </thead>
                                <tbody id="tbody_PreviewDATA">
                                    <!--  -->
                                </tbody>
                            </table>
                        </div>

                        <div class="col-12 d-flex justify-content-end mt-4 mb-2">
                            <br><br>
                            <button class="btn btn-primary px-5" onclick="readExcel()">
                                Upload
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
        </div>
    </div>
</div>


<script>
    
    document.addEventListener('DOMContentLoaded', (event) => {
        // console.log("START");
        check_last_update_pc_point();
    });

    function check_last_update_pc_point(){
        // console.log(type_get_data);

        fetch("{{ url('/') }}/api/check_last_update_pc_point" )
            .then(response => response.json())
            .then(result => {
                // console.log(result);

                setTimeout(() => {
                    if(result){
                        if(result){
                            // ตัวอย่างข้อมูลจาก PHP
                            const phpDateString = result.created_at;

                            // สร้างวัตถุ Date จากข้อมูลที่ได้จาก PHP
                            const phpDate = new Date(phpDateString);

                            // สร้าง Options สำหรับการจัดรูปแบบ
                            const options = { year: 'numeric', month: 'short', day: 'numeric', hour: 'numeric', minute: 'numeric' };

                            // ใช้ toLocaleString() เพื่อแปลงวันที่
                            const formattedDate = phpDate.toLocaleString('en-UK', options);

                            // console.log(formattedDate);


                            document.querySelector('#last_week').innerHTML = result.week ;
                            document.querySelector('#last_update').innerHTML = formattedDate ;
                        }

                    }
                }, 500);

            });
    }

    function PreviewDATA(){

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

                let tbody_PreviewDATA = document.querySelector('#tbody_PreviewDATA');
                    tbody_PreviewDATA.innerHTML = '' ;

                for (let i = 0; i < jsonData.length; i++) {
                    
                    let html = `
                        <tr>
                            <th>`+jsonData[i].account+`</th>
                            <td>`+jsonData[i].group_id+`</td>
                            <td>`+jsonData[i].week+`</td>
                            <td>`+jsonData[i].pc_point+`</td>
                            <td>`+jsonData[i].new_code+`</td>
                            <td>`+jsonData[i].rank_of_week+`</td>
                            <td>`+jsonData[i].rank_last_week+`</td>
                            <td>`+jsonData[i].csta+`</td>
                            <td>`+jsonData[i].pers+`</td>
                            <td>`+jsonData[i].mission1+`</td>
                            <td>`+jsonData[i].mission3+`</td>
                            <td>`+jsonData[i].grandmission+`</td>
                            <td>`+jsonData[i].active_dream+`</td>
                            <td>`+jsonData[i].team_rank_of_week+`</td>
                            <td>`+jsonData[i].team_rank_last_week+`</td>
                            <td>`+jsonData[i].pc_grand_of_gweek+`</td>
                            <td>`+jsonData[i].pc_grand_last_gweek+`</td>
                            <td>`+jsonData[i].nc_grand_of_gweek+`</td>
                            <td>`+jsonData[i].nc_grand_last_gweek+`</td>
                            <td>`+jsonData[i].pc_grand_of_week_individual+`</td>
                            <td>`+jsonData[i].pc_grand_last_week_individual+`</td>
                            <td>`+jsonData[i].nc_grand_of_week_individual+`</td>
                            <td>`+jsonData[i].nc_grand_last_week_individual+`</td>
                            <td>`+jsonData[i].sum_newcode_team+`</td>
                            <td>`+jsonData[i].aa_grand_of_week+`</td>
                            <td>`+jsonData[i].aa_grand_last_week+`</td>
                            <td>`+jsonData[i].aa_grand_of_week_individual+`</td>
                            <td>`+jsonData[i].aa_grand_last_week_individual+`</td>
                        </tr>
                    `;

                    tbody_PreviewDATA.insertAdjacentHTML('beforeend', html); // แทรกล่างสุด

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

                // เลือกชีทที่ต้องการ (0 คือชีทแรก)
                let sheetName = workbook.SheetNames[0];
                let sheet = workbook.Sheets[sheetName];

                // แปลงข้อมูลในชีทเป็น JSON
                let jsonData = XLSX.utils.sheet_to_json(sheet);

                // ตรวจสอบข้อมูลในคอนโซล
                // console.log(jsonData);

                fetch("{{ url('/') }}/api/create_score/excel", {
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

                        document.querySelector('#div_loader_Excel').classList.add('d-none');
                        document.querySelector('#div_success_Excel').classList.remove('d-none');
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
