@extends('layouts.theme_admin')

@section('content')
    <div class="card">
        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-body row">
                        <div class="col-10">
                            <button id="btn_view_all" type="button" class="btn btn-info" onclick="view_data('all');">
                                ทั้งหมด
                            </button>
                            &nbsp;&nbsp;&nbsp;
                            <button id="btn_view_Return_shirt" type="button" class="btn btn-outline-info" onclick="view_data('Return_shirt');">
                                คืนเสื้อแล้ว
                            </button>
                            <button id="btn_view_Not_Return_shirt" type="button" class="btn btn-outline-info" onclick="view_data('Not_Return_shirt');">
                                ยังไม่ได้คืนเสื้อ
                            </button>
                        </div>
                        <div class="col-2 text-end">
                            กำลังดู : <span id="amount_select"></span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12">

                <div class="card">
                    <h3 class="card-header row">
                        <div class="col-6">
                            รายชื่อสมาชิกยกเลิกการเข้าร่วมกิจกรรม
                        </div>
                        <div class="col-6">
                            <div class="d-flex justify-content-end w-100">
                                <button id="btn_export_excel" class="btn float-end btn-dark mx-3 d-none" onclick="createExcel()">Export Excel</button>
                            </div>
                        </div>
                    </h3>
                    <div class="card-body">

                        <div class="table-responsive">
                            <table class="table mb-0 align-middle" id="content_table">
                                <thead>
                                    <tr>
                                        <th class="text-center">Account</th>
                                        <th class="text-center">Name</th>
                                        <th class="text-center">Phone</th>
                                        <th class="text-center">Email</th>
                                        <th class="text-center">Joined time</th>
                                        <th class="text-center">Canceled time</th>
                                        <th class="text-center">Get shirt</th>
                                        <th class="text-center">Get shirt time</th>
                                        <th class="text-center">Return shirt</th>
                                    </tr>
                                </thead>
                                <tbody id="content_tbody">
                                    <!-- DATA USER -->
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- เพิ่ม jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <script src='https://cdn.jsdelivr.net/npm/table2excel@1.0.4/dist/table2excel.min.js'></script>

    <!-- EXPORT EXCEL -->
    <script>
        function createExcel() {
            let table2excel = new Table2Excel();
            let currentDate = new Date();
            let formattedDate = currentDate.toISOString().replace(/[:.]/g, "_"); // สร้างรูปแบบของวันที่ในรูปแบบที่ไม่มีเครื่องหมาย : และ .

            // ตั้งชื่อไฟล์เป็น "รายชื่อสมาชิกทั้งหมด-2023-12-31T12_30_45.678Z.xlsx" (ตัวอย่าง)
            let fileName = `สมาชิกยกเลิกการเข้าร่วมกิจกรรม-${formattedDate}`;

            table2excel.export(document.querySelector("#content_table"), fileName);
        };
    </script>

    <script>

        document.addEventListener('DOMContentLoaded', (event) => {
        // console.log("START");
            get_data_cancel_join();
        });
        
        function get_data_cancel_join(){

            fetch("{{ url('/') }}/api/get_data_cancel_join")
                .then(response => response.json())
                .then(result => {
                    // console.log(result);

                    setTimeout(() => {
                        if(result){

                            let content_tbody = document.querySelector('#content_tbody');
                                content_tbody.innerHTML = '';

                            for (let i = 0; i < result.length; i++) {

                                // Joined time
                                let Joined_DateString = result[i].time_joined;
                                let Joined_Date = new Date(Joined_DateString);
                                let Joined_options = { day: 'numeric', month: 'short', year: 'numeric', hour: 'numeric', minute: 'numeric' };
                                let Joined_formattedDate = Joined_Date.toLocaleString('en-UK', Joined_options);

                                // Canceled time
                                let Canceled_DateString = result[i].created_at;
                                let Canceled_Date = new Date(Canceled_DateString);
                                let Canceled_options = { day: 'numeric', month: 'short', year: 'numeric', hour: 'numeric', minute: 'numeric' };
                                let Canceled_formattedDate = Joined_Date.toLocaleString('en-UK', Canceled_options);

                                // Get shirt time
                                let Get_shirt_DateString = result[i].time_get_shirt;
                                let Get_shirt_Date = new Date(Get_shirt_DateString);
                                let Get_shirt_options = { day: 'numeric', month: 'short', year: 'numeric', hour: 'numeric', minute: 'numeric' };
                                let Get_shirt_formattedDate = Joined_Date.toLocaleString('en-UK', Get_shirt_options);

                                // คืนเสื้อ
                                let text_shirt_size = ``;
                                let html_return_shirt = `` ;
                                let check_return_shirt = `` ;

                                if(result[i].shirt_size){

                                    text_shirt_size = result[i].shirt_size ;

                                    if(result[i].return_shirt == 'Yes'){
                                        check_return_shirt = 'คืนเสื้อแล้ว';
                                        html_return_shirt = `
                                            <div class="btn-group">
                                                <button class="btn btn-sm btn-success radius-30 dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    คืนเสื้อแล้ว
                                                </button>
                                                <div class="dropdown-menu" onclick="change_return_shirt('ยังไม่ได้คืนเสื้อ','`+result[i].id+`');">
                                                    <span class="dropdown-item btn text-danger">
                                                        ยังไม่ได้คืนเสื้อ
                                                    </span>
                                                </div>
                                            </div>
                                        `;
                                    }
                                    else{
                                        check_return_shirt = 'ยังไม่ได้คืนเสื้อ';
                                        html_return_shirt = `
                                            <div class="btn-group">
                                                <button class="btn btn-sm btn-danger radius-30 dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    ยังไม่ได้คืนเสื้อ
                                                </button>
                                                <div class="dropdown-menu d-none" onclick="change_return_shirt('คืนเสื้อแล้ว','`+result[i].id+`');">
                                                    <span class="dropdown-item btn text-success">
                                                        คืนเสื้อแล้ว
                                                    </span>
                                                </div>
                                            </div>
                                        `;
                                    }
                                }
                                
                                let html = `
                                    <tr tr_data="Yes" check_return_shirt="`+check_return_shirt+`" class="">
                                        <td class="text-center">
                                            `+result[i].user_account+`
                                        </td>
                                        <td class="text-center">
                                            `+result[i].user_name+`
                                        </td>
                                        <td class="text-center">
                                            `+result[i].user_phone+`
                                        </td>
                                        <td class="text-center">
                                            `+result[i].user_email+`
                                        </td>
                                        <td class="text-center">
                                            `+Joined_formattedDate+`
                                        </td>
                                        <td class="text-center">
                                            `+Canceled_formattedDate+`
                                        </td>
                                        <td class="text-center">
                                            `+text_shirt_size+`
                                        </td>
                                        <td class="text-center">
                                            `+Get_shirt_formattedDate+`
                                        </td>
                                        <td id="td_return_shirt_id_`+result[i].id+`" class="text-center">
                                            `+html_return_shirt+`
                                        </td>
                                    </tr>
                                `;

                                content_tbody.insertAdjacentHTML('beforeend', html); // แทรกล่างสุด
                            }

                            document.querySelector('#amount_select').innerHTML = result.length;
                            document.querySelector('#btn_export_excel').classList.remove('d-none');
                        }

                    }, 500);

                });
        }

        function change_return_shirt(type , id){
            // console.log("id >> " + id);
            // console.log("type >> " + type);

            fetch("{{ url('/') }}/api/change_return_shirt" + '/' + type + '/' + id)
                .then(response => response.text())
                .then(result => {
                    // console.log(result);

                    setTimeout(() => {
                        if(result == 'success'){

                            let td_return_shirt = document.querySelector('#td_return_shirt_id_'+id);

                            let html_return_shirt ;

                            if(type == "คืนเสื้อแล้ว"){
                                html_return_shirt = `
                                    <div class="btn-group">
                                        <button class="btn btn-sm btn-success radius-30 dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            คืนเสื้อแล้ว
                                        </button>
                                        <div class="dropdown-menu" onclick="change_return_shirt('ยังไม่ได้คืนเสื้อ','`+id+`');">
                                            <span class="dropdown-item btn text-danger">
                                                ยังไม่ได้คืนเสื้อ
                                            </span>
                                        </div>
                                    </div>
                                `;
                            }
                            else if(type == "ยังไม่ได้คืนเสื้อ"){
                                html_return_shirt = `
                                    <div class="btn-group">
                                        <button class="btn btn-sm btn-danger radius-30 dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            ยังไม่ได้คืนเสื้อ
                                        </button>
                                        <div class="dropdown-menu" onclick="change_return_shirt('คืนเสื้อแล้ว','`+id+`');">
                                            <span class="dropdown-item btn text-success">
                                                คืนเสื้อแล้ว
                                            </span>
                                        </div>
                                    </div>
                                `;
                            }

                            td_return_shirt.innerHTML = html_return_shirt ;

                        }
                    }, 200);


            });
        }

        function view_data(type){

            // console.log(type);

            let amount_select = 0 ;

            document.querySelector('#btn_view_all').setAttribute('class' , 'btn btn-outline-info');
            document.querySelector('#btn_view_Return_shirt').setAttribute('class' , 'btn btn-outline-info');
            document.querySelector('#btn_view_Not_Return_shirt').setAttribute('class' , 'btn btn-outline-info');

            document.querySelector('#btn_view_'+type).setAttribute('class' , 'btn btn-info');

            if(type == 'all'){
                let div = document.querySelectorAll('tr[tr_data="Yes"]');
                div.forEach(div => {
                    div.classList.remove('d-none');
                    amount_select = amount_select + 1 ;
                })
            }
            else if(type == 'Return_shirt'){
                let div = document.querySelectorAll('tr[tr_data="Yes"]');
                div.forEach(div => {
                    div.classList.add('d-none');
                })

                setTimeout(() => {
                    let select = document.querySelectorAll('tr[check_return_shirt="คืนเสื้อแล้ว"]');
                    select.forEach(select => {
                        select.classList.remove('d-none');
                        amount_select = amount_select + 1 ;
                    })
                }, 500);
            }
            else if(type == 'Not_Return_shirt'){
                let div = document.querySelectorAll('tr[tr_data="Yes"]');
                div.forEach(div => {
                    div.classList.add('d-none');
                })

                setTimeout(() => {
                    let select = document.querySelectorAll('tr[check_return_shirt="ยังไม่ได้คืนเสื้อ"]');
                    select.forEach(select => {
                        select.classList.remove('d-none');
                        amount_select = amount_select + 1 ;
                    })
                }, 500);
            }

            setTimeout(() => {
                document.querySelector('#amount_select').innerHTML = amount_select ;
            }, 800);

        }

    </script>
            
@endsection
