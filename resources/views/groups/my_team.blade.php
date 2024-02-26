@extends('layouts.theme_user')

@section('content')

<style>
    .div_alert {
        position: fixed;
        top: -120px;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 50px;
        z-index: 9999;
        font-size: 18px;
        background-color: white;
        display: flex;
        align-items: center;

    }

    .div_alert span {
        color: #2DD284;
        padding: 15px;
        z-index: 9999;
        font-size: 1em;
        width: 100%;
    }

    .up_down {
        animation-name: slideDownAndUp;
        animation-duration:5s;
    }

    @keyframes slideDownAndUp {
        0% {
            transform: translateY(0);
        }
        10% {
            transform: translateY(120px);
        }
        90% {
            transform: translateY(120px);
        }
        100% {
            transform: translateY(0);
        }
    } .content-section{
        padding: 0;
    }.header-team{
        position: relative;
        margin-top: 55px;
        padding: 15px;
        background: rgb(7,139,166);
        background: linear-gradient(180deg, rgba(7,139,166,1) 0%, rgba(40,63,136,1) 51%, rgba(8,49,90,1) 84%, rgba(11,40,70,1) 100%);
        border-radius: 10px 0 0 0;
        display: flex;
        align-items: center;

       
    }
    .header-team img{
        width: 114px;
        height:114px;
        position: absolute;
        bottom: 0;
        left: 15px;
    }
    .header-team div{
        text-indent: 140px;
        color: #fff;
        font-weight: lighter;
    }
    .memberInRoom{
        background-color:#0b2846;
        padding: 15px 10px 10px 15px;
        height: 100%;
    }.text-mamber{
        color:#05ADD0;
    }@media only screen and (max-width: 680px) {
        .member-item{
            width: 30%;
            height: 128px;
            margin: 0 2px;
        }
         
        .member-section{
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            margin-top: 20px;
            width: 100%;
        }
    }

    @media only screen and (min-width: 680px) {
        .member-item{
            width: 150px;
            height: 128px;
            margin: 0 10px;
        }
         
        .member-section{
            display: flex;
            flex-wrap: wrap;
            margin-top: 20px;
            width: 100%;
            

        }
    }.member-card{
        background-color: #fff;
        padding: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 10px;
        position: relative;
    }.img-member{
        width:100%;
        height:87px;
        /* outline: 1px solid #000; */
        border-radius: 5px;
        object-fit: cover;
    }.host-member{
        position:absolute;
        right: -10px;
        top: -10px;
        background-color: #fff;
        border-radius: 50%;
        width: 31px;
        height: 31px;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        padding: 2px 0 0 0;
    }.host-member i{
        margin-left: 5px;
        /* margin-top: 0px; */
        font-size: 17px;
    }
    
    
    .member-card-join{
        background-color: #fff;
        padding: 10px;
        border-radius: 10px;
        position: relative;
    }.name-member{
        width: 95%;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }.btn-close-modal {
        font-size: 22px;
  }
  .btn-close-modal span {
    background-color: #fff;
    color: #002449;
    padding: 0px 12px;
    border-radius: 50%;
    font-size: 22px;
}
  
  
  .modal-header{
    background-color: #002449;
  } .modalHeaderrequest {
    background-color: #002449;
    color: #fff !important;
    padding: 3px;
  }.text-count-down{
    color: #005CD3;
  }.btn-accept{
    background-color: #128DFF;
    color: #fff;
  }.member-section {
    width: 100%;
  }.btn-submit{
      border-radius: 5px;
      font-size: 16px;
      padding: 5px 40px;
      background-color: #005CD3;
      color: #fff;
    }
    .btn-submit:hover{
      border: 1px solid #00E0FF;
      box-shadow: 0px 0px 15px 1px #00FBFF;
      color: #fff;

    }
    
    .padding-btn{
        padding: 8px 20px !important;
    }#modal_cf_answer_request_footer.modal-footer{
        border: none;
    }.text-count-down{
        font-size: 9px;
    } #header-text-login{
        width: 140px !important;
        max-width: 140px !important;
        margin-top: 10px;
    }.imgCloseBTN{
        width: 25px;
        height: 25px;
        position: absolute;
        top: -60%;
        right: 5px;
        transform: translate(-50%, -50%);
    }.warn-text{
        letter-spacing: 0px;
        font-size: 16px;
    }
</style>

<div class="div-btn-back d-">
    <!-- <button type="button" class="btn btn-sm btn-back  mt-3" onclick="goBack();">
       <i class="fa-solid fa-chevron-left"></i>
    </button> -->
    <a href="{{ url('/end_mission_1') }}" class="btn btn-sm btn-back  mt-3" >
       <i class="fa-solid fa-chevron-left"></i>
    </a>
</div>

<div id="alert_success" class="div_alert" role="alert">
    <span id="alert_text">
        <!--  -->
    </span>
</div>

<!-- modal_request_join -->
<button id="btn_modal_request_join" class="d-none" data-toggle="modal" data-target="#modal_request_join"></button>

<div class="modal fade" id="modal_request_join" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header modalHeaderrequest">
                <div class="w-100 text-center py-3">
                    <p class="modal-request-title text-white text-center" id="exampleModalLongTitle" style="font-size:20px;">
                        Pending requests
                    </p>
                </div>
                <button id="close_Pending" type="button" class="close btn" data-dismiss="modal" aria-label="Close">
                    <img src="{{ url('/img/icon/closeBTN.png') }}"  class="mt-2 mb-2 imgCloseBTN">
                </button>
            </div>
            <div class="modal-body">
                <h5 class="text-primary"><b>Members</b></h5>
                <div id="modal_request_join_content" class="text-center">
                    <!-- content -->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END modal_request_join -->

<!-- modal_cf_answer_request -->
<button id="btn_modal_cf_answer_request" class="d-none" data-toggle="modal" data-target="#modal_cf_answer_request"></button>

<div class="modal fade" id="modal_cf_answer_request" tabindex="-1" aria-labelledby="Label_cf" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header modalHeaderrequest">
                <div class="w-100 text-center py-3">
                    <p class="modal-title text-center text-white" id="Label_cf" style="font-size:20px;">
                        Request to join
                    </p>
                </div>
                <button id="close_Pending" type="button" class="close btn" data-dismiss="modal" aria-label="Close">
                    <img src="{{ url('/img/icon/closeBTN.png') }}"  class="mt-2 mb-2 imgCloseBTN">
                </button>
            </div>
            <div class="modal-body">
                <div id="modal_cf_answer_request_content" class="text-center">
                    <!-- content -->
                </div>
                <div id="modal_cf_answer_request_footer" class="modal-footer text-center">
                    <!-- BTN -->
                </div>
                <a id="a_group_my_team" href="{{ url('/group_my_team') . '/' . $group_id }}" class="d-none"></a>
            </div>
        </div>
    </div>
</div>
<!-- END modal_cf_answer_request -->


@php
    $list_member = json_decode($data_groups->member);
@endphp

<div class="d-flex header-team">
    <img src="{{ url('/img/group_profile/profile/id (') . $group_id . ').png' }}"  class="mt-2 mb-2 img-header-team">
    <div>
        <h1 class="text-white">
            Team {{ $group_id }}
            <span style="font-size:12px;">(My team)</span>
        </h1>
        @if( !empty($data_groups->rank_of_week) )
            <!-- <p style="font-size: 14px;color: yellow;">PC : <span></span></p> -->
        @endif
    </div>
</div>

<div class="memberInRoom">
    <div class="d-flex justify-content-between px-4 mt-2 align-items-center">
        @if($data_groups->host == Auth::user()->id)
            <div>
                <span class="text-mamber h4">Members</span>  <span class="text-white">: Team {{ $group_id }}</span>
                @if( count($list_member) < 10 )
                <p class="text-white">Member : <span id="amount_member">{{ count($list_member) }}</span>/10</p>
                @endif
            </div>
            <div id="div_Pending_request">
                <!-- ปุ่ม คำร้องขอเข้าร่วมบ้าน -->
            </div>
        @else
            <div>
                <span class="text-mamber h4">Members</span>  <span class="text-white">: Team {{ $group_id }}</span>
            </div>
            <div>
                <p class="text-white">Member : <span id="amount_member">{{ count($list_member) }}</span>/10</p>
            </div>
        @endif
    </div>

    <div class="member-section ">

        @for ($i = 0; $i < count($list_member); $i++) 

            @php 
                $member = App\User::where('id' , $list_member[$i] )->first();
                $data_pc_point = App\Models\Pc_point::where('week' , $current_week)->where('user_id' , $list_member[$i])->first();
            @endphp
            
            <div class="member-item col-4 mt-2 mb-2" >
                <div class="member-card-join">
                    @if( $list_member[$i] == $data_groups->host )
                    <span class="btn host-member">
                        <i class="fa-solid fa-key text-warning"></i>
                    </span>
                    @endif
                    <div class="text-center">
                        <div class="text-center" >
                            @if( !empty($member->photo) )
                            <img src="{{ url('storage')}}/{{ $member->photo }}" class="img-member">
                            @else
                            <img src="{{ url('/img/icon/profile.png') }}" style="width: 100%;height: auto;" class="img-member">
                            @endif
                        </div>
                        <div class="name-member">
                            <span style="font-size: 10px;"><b>{{ $member->name }}</b></span> 
                        </div>
                    </div>
                    
                </div>
                
            </div>
            
        @endfor

        @if( count($list_member) < 10)

            @php $add_div = 10 - count($list_member) ; @endphp

            @for ($i = 0; $i < $add_div; $i++) 
            <div id="Team_no" class="member-item col-4 mt-2 mb-2">
                <div class="member-card h-100" style="width: 100%;height: auto;">
                        <div class="text-center">
                            <i class="fa-solid fa-hourglass-clock"></i>
                            <p class="font-12">Waiting for member</p>
                        </div>
                    </div>
            </div>
            @endfor
        @endif
    </div>
</div>













<!-- <div class="container-fluid d-none">
    <div class="row">
        <div class="card">
            <div class="card-body">

            	<div class="row">
            		<div class="col-12" style="background-color: skyblue;height: auto;position: relative;">
            			<div class="row">
            				<div class="col-3">
            					<img src="{{ url('/img/bg_group/logo_group/bg_group_') . $group_id . '.png' }}" style="width: 90%;position: absolute;top:-20px;left: 4%;width: 50px;" class="mt-2 mb-2">
            				</div>
            				<div class="col-9 mt-2 mb-2">
            					Team {{ $group_id }} <br>

                                @if( !empty($data_groups->rank_of_week) )
                                   <span style="font-size: 14px;color: yellow;">PC : <span>xxxx</span></span>
                                @else
            					   <span style="font-size: 14px;color: yellow;">PC : <span>ตัวนี้จะแสดงวันที่ 24 แต่งเสร็จลบให้ด้วย</span></span>
                                @endif

            				</div>
            			</div>
            		</div>
            		

                    @if($data_groups->host == Auth::user()->id)
                        <div class="col-7 mt-2 mb-2 text-dark">
                            <p><b class="text-info">Members :</b> Team {{ $group_id }}</p>
                            <span class="">Member : 1/10</span>
                        </div>
                        <div class="col-5 mt-2 mb-2 text-dark">
                            <div class="col">
                                <button style="font-size:9px;" class="float-end btn btn-sm btn-warning position-relative" onclick="open_modal_request_join();">
                                    Pending requests

                                    @if( !empty($data_groups->request_join) )
                                    @php
                                        $list_request_join = json_decode($data_groups->request_join);
                                    @endphp
                                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                        {{ count($list_request_join) }}
                                    </span>
                                    @endif

                                </button>
                            </div>
                        </div>
                    @else
                        <div class="col-7 mt-2 mb-2 text-dark">
                            <p><b class="text-info">Members :</b> Team {{ $group_id }}</p>
                        </div>
                        <div class="col-5 mt-2 mb-2 text-dark">
                            <span class="float-end">Member : 1/10</span>
                        </div>
                    @endif
                    
            	</div>

                <div class="row mt-3">

                    @php
                        $list_member = json_decode($data_groups->member);
                    @endphp
                    

                    @for ($i = 0; $i < count($list_member); $i++) 

                        @php 
                            $member = App\User::where('id' , $list_member[$i] )->first();
                            $data_pc_point = App\Models\Pc_point::where('week' , $current_week)->where('user_id' , $list_member[$i])->first();
                        @endphp
                        
                        <div class=" col-4 mt-2 mb-2" style="position:relative;">
                            @if( $list_member[$i] == $data_groups->host )
                            <span class="btn" style="position:absolute;right: 1%;top: -25px;">
                                <i class="fa-solid fa-key text-warning"></i>
                            </span>
                            @endif
                            <div class="text-center" style="width: 95%;height: auto;">
                                <img src="{{ url('storage')}}/{{ $member->photo }}" style="width: 90%;" class="mt-2 mb-2">
                                {{ $member->name }}

                                @if( !empty($data_groups->rank_of_week) && !empty($data_pc_point->pc_point) )
                                <span>PC :  {{ $data_pc_point->pc_point }}</span>
                                @endif
                            </div>
                        </div>
                        
                    @endfor

                    @if( count($list_member) < 10)

                        @php $add_div = 10 - count($list_member) ; @endphp

                        @for ($i = 0; $i < $add_div; $i++) 
                            <div id="Team_no" class=" col-4 mt-2 mb-2">
                                <div class="bg-info text-center" style="width: 95%;height: auto;">
                                    <p>Waiting for members</p>
                                </div>
                            </div>
                        @endfor
                    @endif

                </div>

            </div>
        </div>
    </div>
</div> -->

<script>
    
    var loop_check_request_join ;

    document.addEventListener('DOMContentLoaded', (event) => {
        // console.log("START");
        // change_menu_bar('team');

        @if( $data_groups->host == Auth::user()->id )
            func_check_request_join();

            loop_check_request_join = setInterval(function() {
                // console.log("LOOP");
                func_check_request_join();
            }, 5000);
        @endif

        var group_id = "{{ $group_id }}" ;

        let check_first = "{{ url()->full() }}";
            check_first = check_first.split('?first=')[1];

            if(check_first){
                document.querySelector('#alert_text').innerHTML = `
                   <i class="fa-solid fa-check text-success"></i> Success fully !
                `;
                document.querySelector('#alert_success').classList.add('up_down');

                const animated = document.querySelector('.up_down');
                animated.onanimationend = () => {
                    document.querySelector('#alert_success').classList.remove('up_down');
                };
            }

    });

    function Stop_loop_check_request_join() {
        clearInterval(loop_check_request_join);
    }

    function open_modal_request_join(){

        document.querySelector('#modal_request_join_content').innerHTML = '' ;
        let html_modal ;

        fetch("{{ url('/') }}/api/check_request_join" + '/' + "{{ $group_id }}")
            .then(response => response.text())
            .then(result => {
                // console.log(result);

                if(result){

                    let list_request_join = JSON.parse(result);

                    for (let i = 0; i < list_request_join.length; i++) {
                        let memberId = list_request_join[i];

                        fetch("{{ url('/') }}/api/get_data_user" + '/' + memberId)
                            .then(response => response.json())
                            .then(users => {
                                // console.log(users[0]);
                                // console.log(memberId +" >> "+ users[0].time_request_join);

                                let timeRequestJoin = users[0].time_request_join;

                                // สร้าง Date object จากเวลาที่กำหนด
                                let specifiedTime = new Date(timeRequestJoin);
                                specifiedTime.setHours(specifiedTime.getHours() + 24); // เพิ่มเวลา 24 ชั่วโมง

                                // สร้าง Date object สำหรับเวลาปัจจุบัน
                                let currentTime = new Date();

                                let textTime;
                                let countdown;
                                // ตรวจสอบว่าเวลาที่กำหนดหลังจากเพิ่ม 24 ชั่วโมงยังไม่ผ่านหรือไม่
                                if (specifiedTime > currentTime) {
                                    // คำนวณความแตกต่าง
                                    let timeDiff = specifiedTime - currentTime;
                                    let hours = Math.floor(timeDiff / (60 * 60 * 1000));
                                    let minutes = Math.floor((timeDiff % (60 * 60 * 1000)) / (60 * 1000));

                                    textTime = `Waiting : ${hours}:${minutes}`;
                                    countdown = `Countdown : ${hours}:${minutes}`;
                                } else {
                                    textTime = "เวลาที่กำหนดหลังจากเพิ่ม 24 ชั่วโมงได้ผ่านไปแล้ว";
                                }

                                let format_mission1 = users[0].mission1.toLocaleString();

                                html_modal = `
                                    <div class="customers-list-item d-flex align-items-center p-2 cursor-pointer">
                                        <div class="">
                                            <img src="{{ url('storage')}}/`+users[0].photo+`" class="rounded-circle" width="50" height="50" alt="">
                                        </div>
                                        <div class="ms-2 d-flex align-items-center">
                                            <div> 
                                                <h6 class="mb-0 text-start" style="font-size: 16px;white-space: nowrap;overflow: hidden;text-overflow: ellipsis;width:80px">`+users[0].name+`</h6>
                                                <p class="mb-0 text-count-down text-start"  style="font-size: 12px;">`+textTime+`</p>
                                                <p class="mb-0 text-count-down text-start"  style="font-size: 11px;color:#fdbe21!important;">PC M#1 : `+format_mission1+`</p>
                                            </div>
                                        </div>
                                        <div class="list-inline d-flex customers-contacts ms-auto">
                                            <span class="btn btn-sm btn-accept list-inline-item" onclick="answer_request('Accept', '{{ $group_id }}','`+users[0].id+`' , '`+users[0].name+`' , '`+users[0].photo+`','`+countdown+`','`+format_mission1+`')">Accept</span>
                                            <span class="btn btn-sm btn-danger list-inline-item" onclick="answer_request('Reject', '{{ $group_id }}','`+users[0].id+`' , '`+users[0].name+`' , '`+users[0].photo+`','`+countdown+`','`+format_mission1+`')">Reject</span>
                                        </div>
                                    </div>
                                `;

                                // แทรกล่างสุด
                                document.querySelector('#modal_request_join_content').insertAdjacentHTML('beforeend', html_modal);
                        });

                    }

                }
        });
        
        
        document.querySelector('#btn_modal_request_join').click();

    }

    function answer_request(answer , group_id , member_id , member_name , member_photo ,Countdown,format_mission1)
    {
        document.querySelector('#close_Pending').click();

        // let html_modal = `
        //     <img src="{{ url('storage')}}/`+member_photo+`" style="width:115px;height:115px;border-radius:50%" class="mt-2 mb-2">
        //     <h4 class="mt-3 mb-0" style="color:#002449;">`+member_name+`</h4>
        //     <p style="color:#07285A;" class="warn-text"><b>ตอบรับคำขอเข้าร่วมทีม</b></p>
        //     <div  style="color:#005CD3  ;">
        //         <p>`+Countdown+`</p>
        //     </div>
        // `;
        let html_modal
        let html_footer ;

        if(answer == "Accept"){
            html_modal = 
            `
                <img src="{{ url('storage')}}/`+member_photo+`" style="width:115px;height:115px;border-radius:50%" class="mt-2 mb-2">
                <p style="color:#07285A; font-size:12px" class="warn-text">คุณต้องการตอบรับคำขอเข้าร่วมทีมของ</p>
                <h4 class="mt-2 mb-2" style="color:#002449;font-weight:bold;">`+member_name+`</h4>
                <div style="color:#feb90f ;">
                    <p>PC M#1 : `+format_mission1+`</p>
                </div>
                <div class="mt-1" style="color:#005CD3 ;">
                    <p>`+Countdown+`</p>
                </div>
            `;

            html_footer = `
                <div class="d-flex justify-content-center w-100">
                <button  style="background-color:#128DFF;" type="button" class="btn btn-submit padding-btn" onclick="CF_answer_request('Accept' , '`+member_id+`' , '`+group_id+`')">
                    Confirm
                </button>
                </div>

                <p class="mt-4 text-danger w-100 warn-text">* หาก Confirm แล้วจะเป็นการยืนยันสมาชิก <br> และ <u>ไม่สามารถเปลี่ยนได้อีก</u></p>
               
            `;
        }else if(answer == "Reject"){
            html_modal = 
            `
                <img src="{{ url('storage')}}/`+member_photo+`" style="width:115px;height:115px;border-radius:50%" class="mt-2 mb-2">
                <p style="color:#07285A; font-size:12px" class="warn-text">คุณต้องการปฎิเสธคำขอเข้าร่วมทีมของ</p>
                <h4 class="mt-2 mb-2" style="color:#002449;font-weight:bold;">`+member_name+`</h4>
                <div style="color:#feb90f ;">
                    <p>PC M#1 : `+format_mission1+`</p>
                </div>
                <div class="mt-1" style="color:#005CD3 ;">
                    <p>`+Countdown+`</p>
                </div>
            `;

            html_footer = `
                <div class="d-flex justify-content-center w-100">
                    <button type="button" class=" padding-btn btn btn-danger" onclick="CF_answer_request('Reject' , '`+member_id+`' , '`+group_id+`')">
                        Reject
                    </button>
                </div>
                <p class="mt-4 text-center w-100" style="font-size:10px">หาก Reject แล้วจะเป็นการปฎิเสธคำขอเข้าร่วมทีม</span></p>

            `;
        }


        document.querySelector('#modal_cf_answer_request_content').innerHTML = html_modal;
        document.querySelector('#modal_cf_answer_request_footer').innerHTML = html_footer;
        
        document.querySelector('#btn_modal_cf_answer_request').click();
        
    }

    function CF_answer_request(answer , member_id , group_id)
    {
        // console.log("answer >> " + answer);
        // console.log("member_id >> " + member_id);
        // console.log("group_id >> " + group_id);

        fetch("{{ url('/') }}/api/CF_answer_request/" + answer + "/" + member_id + "/" + group_id)
            .then(response => response.text())
            .then(result => {
                // console.log(result);

                if(result){
                    document.querySelector('#a_group_my_team').click();
                }
        });
    }


    var count_list_request_join = 0 ;

    function func_check_request_join(){
        @if( $data_groups->host == Auth::user()->id && count($list_member) < 10 )

            fetch("{{ url('/') }}/api/check_request_join" + '/' + "{{ $group_id }}")
                .then(response => response.text())
                .then(result => {
                    // console.log(result);

                    let html ;

                    if(result){

                        let list_request_join = JSON.parse(result);


                        let requestsLittleH = 25;
                        let requestsLittleM = 59;

                        if ( list_request_join.length != count_list_request_join) {

                            count_list_request_join = list_request_join.length ;

                            for (let i = 0; i < list_request_join.length; i++) {
                                let memberId = list_request_join[i];

                                console.log(memberId);

                                fetch("{{ url('/') }}/api/get_time_request_join" + '/' + memberId)
                                    .then(response => response.text())
                                    .then(time_request_join => {
                                        console.log(memberId +" >> "+ time_request_join);

                                        let timeRequestJoin = time_request_join;

                                        // สร้าง Date object จากเวลาที่กำหนด
                                        let specifiedTime = new Date(timeRequestJoin);
                                        specifiedTime.setHours(specifiedTime.getHours() + 24); // เพิ่มเวลา 24 ชั่วโมง

                                        // สร้าง Date object สำหรับเวลาปัจจุบัน
                                        let currentTime = new Date();

                                        // ตรวจสอบว่าเวลาที่กำหนดหลังจากเพิ่ม 24 ชั่วโมงยังไม่ผ่านหรือไม่
                                        if (specifiedTime > currentTime) {
                                            // คำนวณความแตกต่าง
                                            let timeDiff = specifiedTime - currentTime;
                                            let hours = Math.floor(timeDiff / (60 * 60 * 1000));
                                            let minutes = Math.floor((timeDiff % (60 * 60 * 1000)) / (60 * 1000));

                                            if (hours < requestsLittleH || (hours === requestsLittleH && minutes < requestsLittleM)) {
                                                requestsLittleH = hours;
                                                requestsLittleM = minutes;

                                                if(hours >= 0 && hours < 10){
                                                    requestsLittleH = "0"+requestsLittleH;
                                                }

                                                if(minutes >= 0 && minutes < 10){
                                                    requestsLittleM = "0"+requestsLittleM;
                                                }
                                            }
                                        }

                                });
                            }

                            setTimeout(() => {
                                html = `
                                    <button style="font-size:11px;" class="float-end btn btn-sm btn-warning position-relative" onclick="open_modal_request_join();">
                                        <b style="color:#273c54;">Pending requests</b>
                                        <span style="position: absolute;top: -12px; right: -10px;background-color: #FF3A3A;color: #fff;width: 20px;height: 20px;display: flex;align-items: center;justify-content: center;-webkit-border-radius: 50%;border-radius: 50%;-moz-border-radius:50%;-khtml-border-radius:50%;">
                                            `+list_request_join.length+`
                                        </span>
                                        <p class="text-count-down">
                                            Countdown : 
                                            <span id="requests_little">
                                                `+requestsLittleH+`:`+requestsLittleM+`
                                            </span>
                                        </p>
                                    </button>

                                `;

                                document.querySelector('#div_Pending_request').innerHTML = html;
                            }, 1000);

                        }

                    }else{
                        html = `
                                <button style="font-size:9px;" class="float-end btn btn-sm btn-secondary position-relative">
                                    <p style="margin: 7px 0;">
                                        Pending requests
                                    </p>
                                </button>
                            `;

                        document.querySelector('#div_Pending_request').innerHTML = html;

                    }


            });
        @else
            let html = `
                <div>
                    <p class="text-white">Member : <span id="amount_member">{{ count($list_member) }}</span>/10</p>
                </div>
            `;

            document.querySelector('#div_Pending_request').innerHTML = html;

            Stop_loop_check_request_join();
        @endif
    }


</script>

@endsection