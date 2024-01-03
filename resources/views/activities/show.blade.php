@extends('layouts.theme_admin')

@section('content')
<div class="container-fluid">
    <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">

                        <div class="col-12 card radius-10 border shadow-none">
                            <div class="card-body">

                                <div class="row">
                                    <div class="col-12 col-md-3">
                                        <center>
                                            <img src="{{ url('storage')}}/{{ $activity->icon }}" style="width:50%;">
                                        </center>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="float-start">
                                            <h4>
                                                กิจกรรม : {{ $activity->name_Activities }}
                                            </h4>
                                            <p class="text-start">
                                                รายละเอียด : {{ $activity->detail }}
                                            </p>
                                            <p class="text-start">
                                                จำนวนผู้เข้าร่วม : {{ $activity->member }}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-3 text-center">
                                        <div class="d-flex justify-content-center w-100">
                                            <img src="{{ url('img/qr_Activities')}}/{{ $activity->qr_code }}" class="qr-profile" alt="รูปภาพ QR Code" style="width:35%;">
                                        </div>
                                        <a href="{{ url('img/qr_Activities')}}/{{ $activity->qr_code }}" class="btn btn-sm btn-primary" download>
                                            Download
                                        </a>
                                    </div>
                                </div>

                                <hr>

                                <div class="row">
                                    <div class="col-12 mt-3">
                                        <h5 class="text-start">ผู้เข้าร่วมกิจกรรม</h5>
                                    </div>
                                    <div class="col-12 mt-3 mb-2">
                                        <div class="btn-group" role="group" aria-label="Basic example" style="width:40%;">
                                            <button id="btn_change_view_user" type="button" class="btn btn-info" onclick="change_view('user');">
                                                บุคคล
                                            </button>
                                            <button id="btn_change_view_team" type="button" class="btn btn-outline-primary" onclick="change_view('team');">
                                                บ้าน
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-2">
                                    <!-- บุคคล -->
                                    <div id="view_user" class="col-12">
                                        <!--  -->
                                    </div>

                                    <!-- บ้าน -->
                                    <div id="view_team" class="col-12 d-none">
                                        บ้าน
                                    </div>
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
        get_detail_activity("{{ $activity->id }}");
    });


    function get_detail_activity(id){

        fetch("{{ url('/') }}/api/get_detail_activity/" + id)
            .then(response => response.json())
            .then(result => {
                console.log(result);

                let arr_group = [] ;

                let view_user = document.querySelector('#view_user');
                    view_user.innerHTML = '';

                if(result){
                    setTimeout(() => {

                        // user
                        for (let i = 0; i < result.length; i++) {
                            
                            let name_group = '';
                            if(result[i].group_id < 9){
                                name_group = "0"+result[i].group_id ;
                            }else{
                                name_group = result[i].group_id ;
                            }

                            let check_team = arr_group.includes(result[i].group_id.toString());

                            if(!check_team){
                                arr_group.push(result[i].group_id.toString());
                            }


                            let html_user = `
                                <div class="p-1">
                                    <div class="customers-list-item d-flex align-items-center border-top border-bottom p-2 cursor-pointer row">
                                        <div class="col-2">
                                        <center>
                                            <img src="{{ url('storage')}}/`+result[i].photo+`" class="rounded-circle" width="46" height="46" alt="">
                                        </center>
                                        </div>
                                        <div class="col-5">
                                            <h6 class="mb-1 font-14">
                                                Name : `+result[i].name+`
                                            </h6>
                                            <p class="mb-0 font-13 text-secondary">
                                                Account : `+result[i].account+`
                                            </p>
                                            <p class="mb-0 font-13 text-secondary">
                                                Phone : `+result[i].phone+`
                                            </p>
                                        </div>
                                        <div class="col-2">
                                            <b>Time joined</b> <br> `+result[i].time_join+`
                                        </div>
                                        <div class="col-2">
                                            <div class="float-end text-center">
                                                Team : `+name_group+`
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            `;

                            view_user.insertAdjacentHTML('beforeend', html_user); // แทรกล่างสุด

                        }

                        setTimeout(() => {
                            console.log(arr_group);

                            // Team
                        }, 1000);

                    }, 500);

                }

        });

    }

    function change_view(type) {
        
        if(type == 'user'){
            document.querySelector('#btn_change_view_user').classList.remove('btn-outline-info');
            document.querySelector('#btn_change_view_user').classList.add('btn-info');

            document.querySelector('#btn_change_view_team').classList.remove('btn-primary');
            document.querySelector('#btn_change_view_team').classList.add('btn-outline-primary');

            document.querySelector('#view_user').classList.remove('d-none');
            document.querySelector('#view_team').classList.add('d-none');
        }
        else if(type == 'team'){
            document.querySelector('#btn_change_view_user').classList.add('btn-outline-info');
            document.querySelector('#btn_change_view_user').classList.remove('btn-info');

            document.querySelector('#btn_change_view_team').classList.add('btn-primary');
            document.querySelector('#btn_change_view_team').classList.remove('btn-outline-primary');

            document.querySelector('#view_user').classList.add('d-none');
            document.querySelector('#view_team').classList.remove('d-none');
        }

    }
</script>
@endsection
