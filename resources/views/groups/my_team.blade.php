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
            <div class="modal-header">
                <h5 class="modal-title text-center" id="exampleModalLabel">
                    Pending requests
                </h5>
                <button id="close_Pending" class="close btn" data-dismiss="modal" aria-label="Close">
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
            <div class="modal-header">
                <h5 class="modal-title text-center" id="Label_cf">
                    Request to join
                </h5>
                <button class="close btn" data-dismiss="modal" aria-label="Close">
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

<div class="container-fluid">
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
</div>

<script>
    
    document.addEventListener('DOMContentLoaded', (event) => {
        // console.log("START");

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
                } else {
                    $text_time = "เวลาที่กำหนดหลังจากเพิ่ม 24 ชั่วโมงได้ผ่านไปแล้ว";
                }
            @endphp

            html_modal = `
                <div class="customers-list-item d-flex align-items-center border-top border-bottom p-2 cursor-pointer">
                    <div class="">
                        <img src="{{ url('storage')}}/{{ $member->photo }}" class="rounded-circle" width="46" height="46" alt="">
                    </div>
                    <div class="ms-2">
                        <h6 class="mb-1 font-14">{{ $member->name }}</h6>
                        <p class="mb-0 font-13 text-secondary">{{ $text_time }}</p>
                    </div>
                    <div class="list-inline d-flex customers-contacts ms-auto">
                        <span class="btn btn-sm btn-primary list-inline-item" onclick="answer_request('Accept', '{{ $group_id }}','{{ $member->id }}' , '{{ $member->name }}' , '{{ $member->photo }}')">Accept</span>
                        <span class="btn btn-sm btn-danger list-inline-item" onclick="answer_request('Reject', '{{ $group_id }}','{{ $member->id }}' , '{{ $member->name }}' , '{{ $member->photo }}')">Reject</span>
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

    function answer_request(answer , group_id , member_id , member_name , member_photo)
    {
        document.querySelector('#close_Pending').click();

        let html_modal = `
            <img src="{{ url('storage')}}/`+member_photo+`" style="width:115px;height:115px;" class="mt-2 mb-2">
            <h4 class="mt-3 mb-0" style="color:#37BCBC;">`+member_name+`</h4>
            <p style="color:#37BCBC;" class="warn-text"><b>ตอบรับคำขอเข้าร่วมทีม</b></p>
            <div class="text-dark">
                <p>Countdown : 20:51</p>
            </div>
        `;

        let html_footer = `
            <button type="button" class="btn btn-primary padding-btn" onclick="CF_answer_request('Accept' , '`+member_id+`' , '`+group_id+`')">
                Confirm
            </button>
            <button type="button" class=" padding-btn btn btn-danger" onclick="CF_answer_request('Reject' , '`+member_id+`' , '`+group_id+`')">
                Reject
            </button>

            <span class="mt-4 text-center">
                หาก Confirm แล้วจะเป็นการยืนยันสมาชิก
                <br>
                และ ไม่สามารถเปลี่ยนได้อีก
            </span>
        `;

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