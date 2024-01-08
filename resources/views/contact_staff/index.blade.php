@extends('layouts.theme_admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
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


                            }
                        }

                    }, 500);

                });
        }

    </script>
@endsection
