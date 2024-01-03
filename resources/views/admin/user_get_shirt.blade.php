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
            <div class="col-12 col-md-5">
                <h4 class="mb-0 text-uppercase">
                    รายชื่อสมาชิกที่ได้รับเสื้อแล้ว
                    <span class="d-none" style="font-size: 15px;color: gray;">
                        ทั้งหมด (<span id="count_account_all" style="font-size: 15px;color: gray;"></span>) คน
                    </span>
                </h4>
            </div>
            <div class="col-12 col-md-7">
                <div class="float-end">
                    <button type="button" class="btn btn-success" onclick="select_type('S');">
                        Size S (<span id="count_size_s"></span>)
                    </button>
                    <button type="button" class="btn btn-danger" onclick="select_type('M');">
                        Size M (<span id="count_size_m"></span>)
                    </button>
                    <button type="button" class="btn btn-primary" onclick="select_type('L');">
                        Size L (<span id="count_size_l"></span>)
                    </button>
                    <button type="button" class="btn btn-warning" onclick="select_type('XL');">
                        Size XL (<span id="count_size_xl"></span>)
                    </button>
                    <button type="button" class="btn btn-info" onclick="select_type('all');">
                        ทั้งหมด (<span id="count_size_all"></span>)
                    </button>
                </div>
            </div>
        </div>

        <script>
            
            function select_type(type){
                // console.log(type);
                let amount_select = 0 ;

                if(type != "all"){

                    let div_2 = document.querySelectorAll('tr[tr="shirt_size"]');
                        div_2.forEach(div_2 => {
                            div_2.classList.add('d-none');
                        })

                    let div_1 = document.querySelectorAll('tr[shirt_size="'+type+'"]');
                        div_1.forEach(div_1 => {
                            div_1.classList.remove('d-none');
                            amount_select = amount_select + 1 ;
                        })
                    
                }
                else{
                    let div_2 = document.querySelectorAll('tr[tr="shirt_size"]');
                        div_2.forEach(div_2 => {
                            div_2.classList.remove('d-none');
                            amount_select = amount_select + 1 ;
                        })
                }

                document.querySelector('#amount_select').innerHTML = amount_select ;
            }

        </script>
        
        <hr class="mt-3 mb-3">

        <div class="d-flex justify-content-between">
            <div>
                <p class="float-end m-auto">ที่กำลังดู : <span id="amount_select"></span></p>
            </div>
            <div >
                <div class=" d-flex align-items-center juustify-content-end w-100">
                    <button id="btn_export_excel" class="btn float-end btn-dark mx-3 d-none" onclick="createExcel()">
                        Export Excel
                    </button>
                </div>
            </div>
        </div>
        <br>
        <div class="table-responsive">
            <table id="content_table" class="table mb-0 align-middle" id="element-to-print">
                <thead>
                    <tr>
                        <th class="text-center">Photo</th>
                        <th class="text-center">Account</th>
                        <th class="text-center">Name</th>
                        <th class="text-center">Email</th>
                        <th class="text-center">Phone</th>
                        <th class="text-center">Size</th>
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
    <script src="https://cdn.bootcss.com/html2pdf.js/0.9.1/html2pdf.bundle.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.1/html2pdf.bundle.min.js"></script>
  <script src='https://cdn.jsdelivr.net/npm/table2excel@1.0.4/dist/table2excel.min.js'></script>

<script>

    document.addEventListener('DOMContentLoaded', (event) => {
        // console.log("START");
        get_user_get_shirt('all');
    });

    function get_user_get_shirt(type){

        fetch("{{ url('/') }}/api/get_user_get_shirt" + '/' + type)
            .then(response => response.json())
            .then(result => {
                // console.log(result);

                if(result){
                    setTimeout(() => {
                        document.querySelector('#count_account_all').innerHTML = result.length ;
                        document.querySelector('#amount_select').innerHTML = result.length ;
                        document.querySelector('#count_size_all').innerHTML = result.length ;
                        
                        let content_tbody = document.querySelector('#content_tbody');
                            content_tbody.innerHTML = '';

                        let count_size_s = 0 ;
                        let count_size_m = 0 ;
                        let count_size_l = 0 ;
                        let count_size_xl = 0 ;

                        for (let i = 0; i < result.length; i++) {

                            if (result[i].shirt_size == 'S') {
                                count_size_s = count_size_s + 1;
                            }
                            else if (result[i].shirt_size == 'M') {
                                count_size_m = count_size_m + 1;
                            }
                            else if (result[i].shirt_size == 'L') {
                                count_size_l = count_size_l + 1;
                            }
                            else if (result[i].shirt_size == 'XL') {
                                count_size_xl = count_size_xl + 1;
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

                            let html = `
                                <tr tr="shirt_size" shirt_size="`+result[i].shirt_size+`" class="">
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
                                    <td class="text-center">
                                        `+result[i].shirt_size+`
                                    </td>
                                </tr>
                            `;

                            content_tbody.insertAdjacentHTML('beforeend', html); // แทรกล่างสุด
                        }


                        document.querySelector('#count_size_s').innerHTML = count_size_s ;
                        document.querySelector('#count_size_m').innerHTML = count_size_m ;
                        document.querySelector('#count_size_l').innerHTML = count_size_l ;
                        document.querySelector('#count_size_xl').innerHTML = count_size_xl ;

                        document.querySelector('#btn_export_excel').classList.remove('d-none');

                    }, 500);
                }

            });

    }

    function createExcel() {
        let table2excel = new Table2Excel();
        let currentDate = new Date();
        let formattedDate = currentDate.toISOString().replace(/[:.]/g, "_"); // สร้างรูปแบบของวันที่ในรูปแบบที่ไม่มีเครื่องหมาย : และ .

        // ตั้งชื่อไฟล์เป็น "รายชื่อสมาชิกทั้งหมด-2023-12-31T12_30_45.678Z.xlsx" (ตัวอย่าง)
        let fileName = `รายชื่อสมาชิกที่ได้รับเสื้อแล้ว-${formattedDate}.xlsx`;

        table2excel.export(document.querySelector("#content_table"), fileName);
    };
</script>
@endsection