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
            <div class="col-12 col-md-6">
                <h4 class="mb-0 text-uppercase">
                    Log Web
                </h4>
            </div>
            <div class="col-12 col-md-6">
                <button id="btn_export_excel" class="btn float-end btn-dark mx-3 d-none" onclick="createExcel()">
                    Export Excel
                </button>
            </div>
        </div>
        
        <hr class="mt-3 mb-3">

        <div class="table-responsive">
            <table class="table mb-0 align-middle" id="content_table">
                <thead>
                    <tr>
                        <th class="text-center">Photo</th>
                        <th class="text-center">Account</th>
                        <th class="text-center">Name</th>
                        <th class="text-center">Date Time</th>
                        <th class="text-center">Log content</th>
                        <th class="text-center">Role</th>
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
<script src="https://cdn.bootcss.com/html2pdf.js/0.9.1/html2pdf.bundle.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.1/html2pdf.bundle.min.js"></script>
<script src='https://cdn.jsdelivr.net/npm/table2excel@1.0.4/dist/table2excel.min.js'></script>

<script>

    document.addEventListener('DOMContentLoaded', (event) => {
        // console.log("START");
        get_data_log_web();
    });

    function get_data_log_web(){

        fetch("{{ url('/') }}/api/get_data_log_web")
            .then(response => response.json())
            .then(result => {
                // console.log(result);

                setTimeout(() => {

                    if(result){

                        let content_tbody = document.querySelector('#content_tbody');
                            content_tbody.innerHTML = '';

                        for (let i = 0; i < result.length; i++) {

                            // photo 
                            let html_img = ''
                            if(result[i].photo){
                                html_img = `<img src="{{ url('storage')}}/`+result[i].photo+`" class="p-1" alt=""> 
                                            <span class="d-none">{{ url('storage')}}/`+result[i].photo+`</span>`;
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
                                        `+result[i].account+`
                                    </td>
                                    <td class="text-center">
                                        `+result[i].name+`
                                    </td>
                                    <td class="text-center">
                                        `+result[i].log_create+`
                                    </td>
                                    <td class="text-center">
                                        `+result[i].log_content+`
                                    </td>
                                    <td class="text-center">
                                        `+result[i].role+`
                                    </td>
                                </tr>
                            `;

                            content_tbody.insertAdjacentHTML('beforeend', html); // แทรกล่างสุด


                        }

                        document.querySelector('#btn_export_excel').classList.remove('d-none');
                    }

                }, 500);

            });
    }

    function createExcel() {
        let table2excel = new Table2Excel();
        let currentDate = new Date();
        let formattedDate = currentDate.toISOString().replace(/[:.]/g, "_"); // สร้างรูปแบบของวันที่ในรูปแบบที่ไม่มีเครื่องหมาย : และ .

        // ตั้งชื่อไฟล์เป็น "รายชื่อสมาชิกทั้งหมด-2023-12-31T12_30_45.678Z.xlsx" (ตัวอย่าง)
        let fileName = `Log-web-${formattedDate}.xlsx`;

        table2excel.export(document.querySelector("#content_table"), fileName);
    };

</script>
@endsection
