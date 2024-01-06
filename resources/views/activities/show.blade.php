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
                                                @if( !empty($activity->member) )
                                                    จำนวนผู้เข้าร่วม : {{ $activity->member }}
                                                @else
                                                    จำนวนผู้เข้าร่วม : 0
                                                @endif
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
                                            <button id="btn_change_view_team" type="button" class="btn btn-primary" onclick="change_view('team');">
                                                Team
                                            </button>
                                            <button id="btn_change_view_user" type="button" class="btn btn-outline-info" onclick="change_view('user');">
                                                Individuals
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-2">
                                    <!-- บ้าน -->
                                    <div id="view_team" class="col-12">
                                        <!--  -->
                                    </div>

                                    <!-- บุคคล -->
                                    <div id="view_user" class="col-12 d-none">
                                        <!--  -->
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
                // console.log(result);

                let arr_group = [] ;
                // let arr_user = [] ;

                if(result){
                    setTimeout(() => {

                        // user
                        for (let i = 0; i < result.length; i++) {
                            
                            // arr_user.push(result[i].id.toString());

                            if(result[i].group_id){

                                let check_team = arr_group.includes(result[i].group_id.toString());

                                if(!check_team){
                                    arr_group.push(result[i].group_id.toString());
                                }
                            }

                        }

                        setTimeout(() => {
                            create_html_team(arr_group);
                        }, 200);

                        setTimeout(() => {
                            create_html_user(result);
                        }, 1000);


                    }, 500);

                }

        });

    }

    function create_html_team(arr_group){

        // console.log(arr_group);

        for (let zz = 0; zz < arr_group.length; zz++) {
                                
            fetch("{{ url('/') }}/api/get_data_groups/" + arr_group[zz])
                .then(response => response.json())
                .then(groups => {
                    // console.log(groups);

                    let view_team = document.querySelector('#view_team');
                    view_team.innerHTML = '';

                    if(groups){
                        setTimeout(() => {

                            let arr_member ;
                            let count_member ;
                            if(groups.member){
                                arr_member = JSON.parse(groups.member);
                                count_member = arr_member.length ;
                            }
                            
                            let html_team = `
                                <div class="p-1">
                                    <div class="customers-list-item d-flex align-items-center border-top border-bottom p-2 cursor-pointer row">
                                        <div class="col-2">
                                        <center>
                                            <img src="{{ url('/img/group_profile/profile/id (`+groups.id+`).png')}}" class="rounded-circle" width="60" height="60" alt="">
                                        </center>
                                        </div>
                                        <div class="col-3">
                                            <h6 class="mb-1 font-14">
                                                Team : `+groups.name_group+`
                                            </h6>
                                        </div>
                                        <div class="col-3 text-center">
                                            <b>สมาชิกทั้งหมด</b> <br>
                                            `+count_member+`
                                        </div>
                                        <div class="col-3 text-center">
                                            <b>สมาชิกที่ร่วมกิจกรรมนี้</b> <br>
                                            <span id="count_member_join_of_`+groups.id+`">0</span>
                                        </div>
                                        <div class="col-1 float-end">
                                            <span class="btn btn-sm" onclick="document.querySelector('#div_show_user_of_`+groups.id+`').classList.toggle('d-none');">
                                                <i class="fa-solid fa-caret-down"></i>
                                            </span>
                                        </div>

                                        <div id="div_show_user_of_`+groups.id+`" class="row mt-3 mb-3 px-5 d-none">
                                            
                                        </div>
                                    </div>
                                </div>
                            `;

                            view_team.insertAdjacentHTML('beforeend', html_team); 

                        }, 200);
                    }
            });

        }

    }

    function create_html_user(result){

        // console.log(result);

        let view_user = document.querySelector('#view_user');
            view_user.innerHTML = '';

        for (let i = 0; i < result.length; i++) {

            let name_group = '';
            if(result[i].group_id < 9){
                name_group = "0"+result[i].group_id ;
            }else{
                name_group = result[i].group_id ;
            }

            let html_name_group ;
            if(result[i].group_id){
                html_name_group = 
                    `<div class="float-end text-center">
                        Team : `+name_group+`
                    </div>`;
            }else{
                html_name_group = `
                    <div class="float-end text-center">
                        -
                    </div>
                ` ;
            }

            let html_check_Activities ;
            if("{{ $activity->name_Activities }}" == "รับเสื้อ"){
                html_check_Activities = `
                    <div class="col-3">
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
                    <div class="col-2 text-center">
                        <h6 class="mb-1 font-14">
                            Size
                        </h6>
                        <p class="mb-0 font-13 text-secondary">
                            `+result[i].shirt_size+`
                        </p>
                    </div>
                `;
            }else{
                html_check_Activities = `
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
                `;
            }

            let html_user = `
                <div class="p-1">
                    <div class="customers-list-item d-flex align-items-center border-top border-bottom p-2 cursor-pointer row">
                        <div class="col-2">
                        <center>
                            <img src="{{ url('storage')}}/`+result[i].photo+`" class="rounded-circle" width="46" height="46" alt="">
                        </center>
                        </div>
                        `+html_check_Activities+`
                        <div class="col-2">
                            <b>Time joined</b> <br> `+result[i].time_join+`
                        </div>
                        <div class="col-2">
                            `+html_name_group+`
                        </div>
                    </div>
                </div>
            `;

            if( document.querySelector('#count_member_join_of_'+result[i].group_id) ){

                let count_member_join = document.querySelector('#count_member_join_of_'+result[i].group_id).innerHTML;
                let new_count_member_join = parseInt(count_member_join) + 1 ;
                document.querySelector('#count_member_join_of_'+result[i].group_id).innerHTML = new_count_member_join ;

                document.querySelector('#div_show_user_of_'+result[i].group_id).insertAdjacentHTML('beforeend', html_user);
            }
            

            view_user.insertAdjacentHTML('beforeend', html_user);
        }

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
