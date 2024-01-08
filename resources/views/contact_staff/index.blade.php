@extends('layouts.theme_admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-2">
                                <h4>Date/Time</h4>
                            </div>
                            <div class="col-3">
                                <h4>User</h4>
                            </div>
                            <div class="col-4">
                                <h4>Question</h4>
                            </div>
                            <div class="col-3">
                                <h4>Approve / Finish</h4>
                            </div>
                        </div>

                        <hr>

                        <div id="row_content" class="row">
                            
                        </div>
                    </div>
                </div>

                <div class="card d-none">
                    <div class="card-header">FAQ</div>
                    <div class="card-body">

                        <div class="table-responsive">
                            <table class="table mb-0 align-middle" id="content_table">
                                <thead>
                                    <tr>
                                        <th class="text-center">Date/Time</th>
                                        <th class="text-center">Account</th>
                                        <th class="text-center">Name</th>
                                        <th class="text-center">Phone</th>
                                        <th class="text-center">Question</th>
                                        <th class="text-center">Approve</th>
                                        <th class="text-center">Finish</th>
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

    <script>

        document.addEventListener('DOMContentLoaded', (event) => {
        // console.log("START");
            get_contact_staffs();
        });
        
        function get_contact_staffs(){

            fetch("{{ url('/') }}/api/get_contact_staffs")
                .then(response => response.json())
                .then(result => {
                    console.log(result);

                    setTimeout(() => {

                        if(result){

                            let content_tbody = document.querySelector('#content_tbody');
                                content_tbody.innerHTML = '';

                            let row_content = document.querySelector('#row_content');
                                row_content.innerHTML = '';

                            for (let i = 0; i < result.length; i++) {

                                // ข้อมูลจาก PHP
                                let phpDateString = result[i].created_at;

                                // สร้างวัตถุ Date จากข้อมูลที่ได้จาก PHP
                                let phpDate = new Date(phpDateString);

                                // สร้าง Options สำหรับการจัดรูปแบบ
                                let options = { day: 'numeric', month: 'short', year: 'numeric', hour: 'numeric', minute: 'numeric' };

                                // ใช้ toLocaleString() เพื่อแปลงวันที่
                                let formattedDate = phpDate.toLocaleString('en-UK', options);


                                let html = `
                                    <tr class="">
                                        <td class="text-center">
                                            `+formattedDate+`
                                        </td>
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
                                            `+result[i].question+`
                                        </td>
                                        <td class="text-center">
                                            -
                                        </td>
                                        <td class="text-center">
                                            -
                                        </td>
                                    </tr>
                                `;

                                content_tbody.insertAdjacentHTML('beforeend', html); // แทรกล่างสุด


                                let html_row_content = `
                                    <div class="col-2">
                                        `+formattedDate+`
                                    </div>
                                    <div class="col-3">
                                        <b>Account :</b>  `+result[i].user_account+`
                                        <br>
                                        <b>Name :</b> `+result[i].user_name+`
                                        <br>
                                        <b>Phone :</b> `+result[i].user_phone+`
                                        <br>
                                        <b>Group id :</b> `+result[i].user_group_id+`
                                        <br>
                                        <b>Group status :</b> `+result[i].user_group_status+`
                                        <br>
                                    </div>
                                    <div class="col-4">
                                        `+result[i].question+`
                                    </div>
                                    <div class="col-3">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="gridCheck3">
                                                    <label class="form-check-label" for="gridCheck3">Approve</label>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="gridCheck3">
                                                    <label class="form-check-label" for="gridCheck3">Finish</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <hr class="mt-3 mb-3">
                                `;

                                row_content.insertAdjacentHTML('beforeend', html_row_content); // แทรกล่างสุด


                            }
                        }

                    }, 500);

                });
        }

    </script>
@endsection
