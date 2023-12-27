@extends('layouts.theme_user')

@section('content')

<style>
    .div_alert {
        position: fixed;
        top: -100px;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 50px;
        text-align: center;
        font-family: 'Kanit', sans-serif;
        z-index: 9999;
        font-size: 18px;

    }

    .div_alert span {
        background-color: white;
        border-radius: 10px;
        color: #2DD284;
        padding: 15px;
        font-family: 'Kanit', sans-serif;
        z-index: 9999;
        font-size: 1em;
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
        font-size: 18px;

    
  }.btn-close-modal span {
      background-color: #fff;
      color: #002449;
      padding: 0px 8px;
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
        width: 140px;
        margin-top: 10px;
    }
</style>

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
                <div class="w-100 text-center">

                    <p class="modal-request-title text-white text-center" id="exampleModalLongTitle">Pending requests</p>
                </div>
                <button id="close_Pending" type="button" class="close btn btn-close-modal" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
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
                <div class="w-100 text-center">
                    <h5 class="modal-title text-center text-white" id="Label_cf">
                        Request to join
                    </h5>
                </div>
                <button id="close_Pending" type="button" class="close btn btn-close-modal" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
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
        <h1 class="text-white">Team {{ $group_id }}</h1>
        @if( !empty($data_groups->rank_of_week) )
            <p style="font-size: 14px;color: yellow;">PC : <span>xxxx</span></p>
        @endif
    </div>
</div>

<div class="memberInRoom">
    <div class="d-flex justify-content-between px-4 align-items-center">
         @if($data_groups->host == Auth::user()->id)
            <div>
                <span class="text-mamber h4">Members</span>  <span class="text-white">: Team {{ $group_id }}</span>
                @if( count($list_member) < 10 )
                <p class="text-white">Member : <span id="amount_member">{{ count($list_member) }}</span>/10</p>
                @endif
            </div>
            <div>
                @php
                    $list_request_join = json_decode($data_groups->request_join);

                    $class_div_request_join = '';

                    if( !empty($data_groups->request_join) ){
                        $class_div_request_join = 'warning';
                    }else{
                        $class_div_request_join = 'secondary';
                    }

                    $requests_little_h = 25;
                    $requests_little_m = 59;

                    if( !empty($data_groups->request_join) ){
                        for ($i = 0; $i < count($list_request_join); $i++) {

                            $member = App\User::where('id' , $list_request_join[$i] )->first();

                            $time_request_join = $member->time_request_join;

                            // สร้าง DateTime object จากเวลาที่กำหนด
                            $specifiedTime = new DateTime($time_request_join);

                            // เพิ่มเวลา 24 ชั่วโมง
                            $specifiedTime->modify("+24 hours");

                            // สร้าง DateTime object สำหรับเวลาปัจจุบัน
                            $currentTime = new DateTime();

                            // ตรวจสอบว่าเวลาที่กำหนดหลังจากเพิ่ม 24 ชั่วโมงยังไม่ผ่านหรือไม่
                            if ($specifiedTime > $currentTime) {
                                // คำนวณความแตกต่าง
                                $interval = $specifiedTime->diff($currentTime);

                                // แปลงความแตกต่างเป็นชั่วโมงและนาที
                                $hours = $interval->h;
                                $hours = $hours + ($interval->days * 24); // เพิ่มชั่วโมงจากวันที่มีความแตกต่าง
                                $minutes = $interval->i;

                                if( $hours < $requests_little_h){
                                    $requests_little_h = $hours ;
                                    $requests_little_m = $minutes ;
                                }
                                else if( $hours == $requests_little_h && $minutes < $requests_little_m){
                                    $requests_little_h = $hours ;
                                    $requests_little_m = $minutes ;
                                }
                            } 
                        }
                    }

                @endphp

                @if( count($list_member) < 10 )
                @if( !empty($data_groups->request_join) )
                <button style="font-size:9px;" class="float-end btn btn-sm btn-{{ $class_div_request_join }} position-relative" onclick="open_modal_request_join();">
                @else
                <button style="font-size:9px;" class="float-end btn btn-sm btn-{{ $class_div_request_join }} position-relative">
                @endif
                    Pending requests

                    @if( !empty($data_groups->request_join) )
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                        {{ count($list_request_join) }}
                    </span>
                    <p class="text-count-down">Countdown : <span id="requests_little">{{ $requests_little_h }}:{{ $requests_little_m }}</span></p>
                    @endif
                </button>
                @else
                <div>
                    <p class="text-white">Member : <span id="amount_member">{{ count($list_member) }}</span>/10</p>
                </div>
                @endif
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
                            <img src="{{ url('storage')}}/{{ $member->photo }}" class="img-member">
                        </div>
                        <div class="name-member">
                            <span class="font-10"><b>{{ $member->name }}</b></span> 
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
                            <i class="fa-solid fa-user-plus"></i>
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
    
    document.addEventListener('DOMContentLoaded', (event) => {
        // console.log("START");
        change_menu_bar('team');

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

    function open_modal_request_join(){

        document.querySelector('#modal_request_join_content').innerHTML = '' ;
        let html_modal ;

        @if( !empty($data_groups->request_join) )
            @php
                $list_request_join = json_decode($data_groups->request_join);
            @endphp

            @for ($i = 0; $i < count($list_request_join); $i++) 

            @php 
                $member = App\User::where('id' , $list_request_join[$i] )->first();

                $time_request_join = $member->time_request_join;

                // สร้าง DateTime object จากเวลาที่กำหนด
                $specifiedTime = new DateTime($time_request_join);

                // เพิ่มเวลา 24 ชั่วโมง
                $specifiedTime->modify("+24 hours");

                // สร้าง DateTime object สำหรับเวลาปัจจุบัน
                $currentTime = new DateTime();

                // ตรวจสอบว่าเวลาที่กำหนดหลังจากเพิ่ม 24 ชั่วโมงยังไม่ผ่านหรือไม่
                if ($specifiedTime > $currentTime) {
                    // คำนวณความแตกต่าง
                    $interval = $specifiedTime->diff($currentTime);

                    // แปลงความแตกต่างเป็นชั่วโมงและนาที
                    $hours = $interval->h;
                    $hours = $hours + ($interval->days * 24); // เพิ่มชั่วโมงจากวันที่มีความแตกต่าง
                    $minutes = $interval->i;

                    $text_time = "Waiting : $hours:$minutes";
                    $Countdown = "Countdown : $hours:$minutes";
                } else {
                    $text_time = "เวลาที่กำหนดหลังจากเพิ่ม 24 ชั่วโมงได้ผ่านไปแล้ว";
                }
            @endphp

            html_modal = `
                <div class="customers-list-item d-flex align-items-center border-top border-bottom p-2 cursor-pointer">
                    <div class="">
                        <img src="{{ url('storage')}}/{{ $member->photo }}" class="rounded-circle" width="50" height="50" alt="">
                    </div>
                    <div class="ms-2 d-flex align-items-center">
                        <div> 
                            <h6 class="mb-0 font-14">{{ $member->name }}</h6>
                            <p class="mb-0 font-13 text-count-down text-start">{{ $text_time }}</p>
                        </div>
                       
                    </div>
                    <div class="list-inline d-flex customers-contacts ms-auto">
                        <span class="btn btn-sm btn-accept list-inline-item" onclick="answer_request('Accept', '{{ $group_id }}','{{ $member->id }}' , '{{ $member->name }}' , '{{ $member->photo }}','{{ $Countdown }}')">Accept</span>
                        <span class="btn btn-sm btn-danger list-inline-item" onclick="answer_request('Reject', '{{ $group_id }}','{{ $member->id }}' , '{{ $member->name }}' , '{{ $member->photo }}','{{ $Countdown }}')">Reject</span>
                    </div>
                </div>
            `;

            // แทรกล่างสุด
            document.querySelector('#modal_request_join_content').insertAdjacentHTML('beforeend', html_modal); 

            @endfor

        @else
            html_modal = `<h6 class="mb-1 font-14">ไม่มีคำขอในขณะนี้</h6>`;
        @endif
        
        document.querySelector('#btn_modal_request_join').click();

    }

    function answer_request(answer , group_id , member_id , member_name , member_photo ,Countdown)
    {
        document.querySelector('#close_Pending').click();

        let html_modal = `
            <img src="{{ url('storage')}}/`+member_photo+`" style="width:115px;height:115px;border-radius:50%" class="mt-2 mb-2">
            <h4 class="mt-3 mb-0" style="color:#002449;">`+member_name+`</h4>
            <p style="color:#07285A;" class="warn-text"><b>ตอบรับคำขอเข้าร่วมทีม</b></p>
            <div  style="color:#005CD3  ;">
                <p>`+Countdown+`</p>
            </div>
        `;

        let html_footer ;

        if(answer == "Accept"){
            html_footer = `
                <div class="d-flex justify-content-center w-100">
                <button type="button" class="btn btn-submit padding-btn" onclick="CF_answer_request('Accept' , '`+member_id+`' , '`+group_id+`')">
                    Confirm
                </button>
                </div>

                <p class="mt-4 text-center w-100">หาก Confirm แล้วจะเป็นการยืนยันสมาชิก และ <span class="text-danger">ไม่สามารถเปลี่ยนได้อีก</span></p>
               
            `;
        }else if(answer == "Reject"){

            html_footer = `
                <div class="d-flex justify-content-center w-100">
                    <button type="button" class=" padding-btn btn btn-danger" onclick="CF_answer_request('Reject' , '`+member_id+`' , '`+group_id+`')">
                        Reject
                    </button>
                </div>

                <span class="mt-4 text-center">
                    หาก Reject แล้วจะเป็นการปฎิเสธคำขอเข้าร่วมทีม
                </span>
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


</script>

@endsection