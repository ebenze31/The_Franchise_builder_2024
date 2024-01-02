@extends('layouts.theme_user')

@section('content')
<style>
    .content-section{
        padding: 0;
    }
    .header-team{
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
    .header-team h1{
        text-indent: 120px;
        color: #fff;
        font-weight: lighter;
    }

    
    
    
   .memberInRoom{
        background-color:#0b2846;
        padding: 15px 10px 10px 15px;
        height: 100%;
    }.text-mamber{
        color: #05ADD0;
        font-size: 20px;
        font-weight: bold;
    }
    @media only screen and (max-width: 680px) {
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
    }
    .member-card{
        background-color: #fff;
        padding: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 10px;
        position: relative;
        width: 100%;
        
    }
    
    .member-card-join{
        background-color: #fff;
        padding: 10px;
        border-radius: 10px;
        position: relative;
    }
    .font-12{
        font-size: 12px;
        font-weight: bold;
    }.font-14{
        font-size: 14px;
    }#modal_join_team .modal-dialog .modal-content{
        border-radius: 10px;
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
    }
    .modal-footer{
        border-top: none !important;
        justify-content: center !important;
    } 
    .modal-footer button{
        padding: 10px 20px;
        border-radius: 5px;
    }
    
    .text-info-modal{
        color: #00AAAC;
    }.warn-text{
        letter-spacing: -1px;
    }
    .img-member{
        width:100%;
        height:87px;
        /* outline: 1px solid #000; */
        border-radius: 5px;
        object-fit: contain;
    }.host-member{
        position:absolute;
        right: -10px;
        top: -10px;
        background-color: #fff;
        border-radius: 50%;
        width: 31px;
        height: 31px;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 1px 20px 0 rgba(0, 0, 0, 0.19);
        padding: 2px 0 0 0;
    }
    .host-member i{
        margin-left: 5px;
            /* margin-top: 0px; */
            font-size: 17px;
    }
    .modal-backdrop{
   backdrop-filter: blur(5px);
   background-color: #01223770;
}
.modal-backdrop.in{
   opacity: 1 !important;
}
    
    .name-member{
        width: 95%;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }.font-10{
        font-size: 10px !important;
    }.img-member-waiting{
        opacity: 0.6;
    }.text-count-down{
        width: 100%;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        align-items: center;
        color: #fff;
        background-color:rgb(7, 40, 90,0.75);
        padding: 5px 0px;
    }.disable-card{
        background-color:rgb(244, 244, 244,.68) ;
        color: #686666;
        width: 100%;
        padding: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 10px;
        position: relative;
    }
</style>
<!-- modal_join_team -->
<button id="btn_modal_join_team" class="d-none" data-toggle="modal" data-target="#modal_join_team"></button>

<div class="modal fade" id="modal_join_team" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered px-3">
        <div class="modal-content">
            <div id="modal_join_team_content" class="modal-body text-center">
                <!-- content -->
            </div>
            <div id="modal_join_team_footer" class="modal-footer text-center">
                <!-- BTN -->
            </div>
            <a id="link_to_my_team" class="d-none"></a>
        </div>
    </div>
</div>
<!-- END modal_join_team -->
<button class="btn btn-warning d-none" onclick="test_modal('Host Accept');">TEST</button>

<div class="d-flex header-team">
    <img src="{{ url('/img/group_profile/profile/id (') . $group_id . ').png' }}"  class="mt-2 mb-2 img-header-team">
    <h1>
        Team {{ $group_id }}
    </h1>
</div>

@php
    $list_member = json_decode($data_groups->member);
@endphp

<div class="memberInRoom">
    <div class="d-flex justify-content-between px-4 align-items-center">
        <div>

            <span class="text-mamber">Members</span>  <span class="text-white">: Team {{ $group_id }}</span>
        </div>
        <div>
            @if( empty($data_groups->member) )
            <span class="text-white">Member : <span id="amount_member">00</span>/10</span>
            @else
            <span class="text-white">Member : <span id="amount_member">{{ count($list_member) }}</span>/10</span>
            @endif
        </div>
    </div>
    <div class="member-section ">
        @if( empty($data_groups->member) )

            <!-- เช็คว่ามีบ้านแล้ว -->
            @if( Auth::user()->group_status == "มีบ้านแล้ว" || Auth::user()->group_status == "ยืนยันการสร้างบ้านแล้ว" )
                @for ($i = 0; $i < 10; $i++)
                <div id="Team_no" class="member-item col-4 mt-2 mb-2" >
                    <div class="member-card h-100" style="width: 100%;height: auto;">
                        <div class="text-center">
                            <p class="font-12 w-100">ว่าง</p>
                        </div>
                    </div>
                </div>
                @endfor
            @else
                @for ($i = 0; $i < 10; $i++) 
                    @if($i == 0)
                        <div id="Team_no" class="member-item mt-2 mb-2" onclick="open_modal_join_team('host','{{ $data_groups->id }}');">
                            <div class="member-card h-100" style="width: 100%;height: auto;">
                                <div class="text-center w-100">
                                    <i class="fa-solid fa-user-plus"></i>
                                    <p class="font-12 w-100"> Be the host</p>
                                </div>
                                <span class="btn host-member">
                                    <i class="fa-solid fa-key text-warning"></i>
                                </span>
                            </div>
                        </div>
                    @else
                        <div id="Team_no" class="member-item mt-2 mb-2">
                            <div class="disable-card h-100" >
                                <div class="text-center">
                                    <i class="fa-solid fa-user-plus"></i>
                                    <p class="font-12">Join as member</p>
                                </div>
                                
                            </div>
                        </div>
                    @endif
                @endfor

            @endif

        @else
            
            
            @for ($i = 0; $i < count($list_member); $i++) 

                @php $member = App\User::where('id' , $list_member[$i] )->first(); @endphp
                
                <div class="member-item mt-2 mb-3" >
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

                @if($group_status == 'กำลังขอเข้าร่วมบ้าน')

                    <div class="member-item col-4 mt-2 mb-2" style="position:relative;">
                        <div class="member-card-join">
                            <div class="text-center">
                                <div class="text-center" >
                                    <img src="{{ url('storage')}}/{{ Auth::user()->photo }}"  class="img-member img-member-waiting">

                                </div>
                                <div class="name-member">
                                    <span class="font-10"><b>{{ Auth::user()->name }}</b></span> 
                                </div>
                            </div>
                            

                            @php
                                $time_request_join = Auth::user()->time_request_join;

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

                            <p id="show_timer_wait_host" class="text-count-down text-center">{{ $text_time }}</p>
                        </div>
                    </div>

                    <script>

                        show_timer_wait_host();

                        function show_timer_wait_host(){

                            let hours = "{{ $hours }}";
                            let minutes = "{{ $minutes }}";

                            setInterval(function () {

                                // ลดนาทีลง 1
                                minutes--;

                                // ถ้านาทีเป็น -1 ลดชั่วโมงลง 1 และตั้งนาทีเป็น 59
                                if (minutes < 0) {
                                    hours--;
                                    minutes = 59;
                                }

                                // แสดงเวลาที่เหลือ
                                document.querySelector('#show_timer_wait_host').innerHTML = "Waiting : " +hours + ":" + minutes ;

                            }, 60000);
                        }
                    </script>

                    @php $add_div = 9 - count($list_member) ; @endphp
                @else
                    @php $add_div = 10 - count($list_member) ; @endphp
                @endif


                @for ($i = 0; $i < $add_div; $i++)

                    <!-- เช็คว่ามีบ้านแล้ว -->
                    @if( Auth::user()->group_status == "มีบ้านแล้ว" || Auth::user()->group_status == "ยืนยันการสร้างบ้านแล้ว" )
                        <div id="Team_no" class="member-item col-4 mt-2 mb-2" >
                            <div class="member-card h-100" style="width: 100%;height: auto;">
                                <div class="text-center">
                                    <p class="font-12 w-100">ว่าง</p>
                                </div>
                            </div>
                        </div>
                    @else

                        @if($group_status == 'กำลังขอเข้าร่วมบ้าน')
                        <div id="Team_no" class="member-item col-4 mt-2 mb-2" >
                        @else
                        <div id="Team_no" class="member-item col-4 mt-2 mb-2" onclick="open_modal_join_team('member','{{ $data_groups->id }}');">
                        @endif
                            <div class="member-card h-100" style="width: 100%;height: auto;">
                                <div class="text-center">
                                    <i class="fa-solid fa-user-plus"></i>
                                    <p class="font-12">Join our team</p>
                                </div>
                            </div>
                        </div>

                    @endif

                @endfor
            @endif

        @endif
    </div>
</div>


<div class="container-fluid d-none">
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
                                Team {{ $group_id }}
                            </div>
                        </div>
                    </div>
                    <div class="col-12 mt-2 mb-2 text-dark">
                        Members : Team {{ $group_id }} 
                        @if( empty($data_groups->member) )
                        <span class="text-white">Member : <span id="amount_member">00</span>/10</span>
                        @else
                        <span class="text-white">Member : <span id="amount_member">{{ count($list_member) }}</span>/10</span>
                        @endif
                    </div>
                </div>

                <div class="row mt-3">
                    
                    @if( empty($data_groups->member) )
                        @for ($i = 0; $i < 10; $i++) 
                        <div id="Team_no" class=" col-4 mt-2 mb-2" onclick="open_modal_join_team('host','{{ $data_groups->id }}');">
                            <div class="bg-secondary text-center" style="width: 95%;height: auto;">
                                <i class="fa-solid fa-user-plus"></i>
                                <p>Join our team</p>
                            </div>
                        </div>
                        @endfor
                    @else
                        @php
                            $list_member = json_decode($data_groups->member);
                        @endphp
                        

                        @for ($i = 0; $i < count($list_member); $i++) 

                            @php $member = App\User::where('id' , $list_member[$i] )->first(); @endphp
                            
                            <div class=" col-4 mt-2 mb-2" style="position:relative;">
                                @if( $list_member[$i] == $data_groups->host )
                                <span class="btn" style="position:absolute;right: 1%;top: -25px;">
                                    <i class="fa-solid fa-key text-warning"></i>
                                </span>
                                @endif
                                <div class="text-center" style="width: 95%;height: auto;">
                                    <img src="{{ url('storage')}}/{{ $member->photo }}" style="width: 90%;" class="mt-2 mb-2">
                                    {{ $member->name }}
                                </div>
                            </div>
                            
                        @endfor

                        @if( count($list_member) < 10)

                            @if($group_status == 'กำลังขอเข้าร่วมบ้าน')

                                <div class=" col-4 mt-2 mb-2" style="position:relative;">
                                    <div class="text-center" style="width: 95%;height: auto;">
                                        <img src="{{ url('storage')}}/{{ Auth::user()->photo }}" style="width: 90%;" class="mt-2 mb-2">
                                        {{ Auth::user()->name }}

                                        @php
                                            $time_request_join = Auth::user()->time_request_join;

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

                                        <p id="show_timer_wait_host" class="text-danger">{{ $text_time }}</p>
                                    </div>
                                </div>

                                <script>

                                    show_timer_wait_host();

                                    function show_timer_wait_host(){

                                        let hours = "{{ $hours }}";
                                        let minutes = "{{ $minutes }}";

                                        setInterval(function () {

                                            // ลดนาทีลง 1
                                            minutes--;

                                            // ถ้านาทีเป็น -1 ลดชั่วโมงลง 1 และตั้งนาทีเป็น 59
                                            if (minutes < 0) {
                                                hours--;
                                                minutes = 59;
                                            }

                                            // แสดงเวลาที่เหลือ
                                            document.querySelector('#show_timer_wait_host').innerHTML = "Waiting : " +hours + ":" + minutes ;

                                        }, 60000);
                                    }
                                </script>

                                @php $add_div = 9 - count($list_member) ; @endphp
                            @else
                                @php $add_div = 10 - count($list_member) ; @endphp
                            @endif


                            @for ($i = 0; $i < $add_div; $i++) 
                                @if($group_status == 'กำลังขอเข้าร่วมบ้าน')
                                <div id="Team_no" class=" col-4 mt-2 mb-2" >
                                @else
                                <div id="Team_no" class=" col-4 mt-2 mb-2" onclick="open_modal_join_team('member','{{ $data_groups->id }}');">
                                @endif
                                    <div class="bg-secondary text-center" style="width: 95%;height: auto;">
                                        <i class="fa-solid fa-user-plus"></i>
                                        <p>Join our team</p>
                                    </div>
                                </div>
                            @endfor
                        @endif

                    @endif

                </div>

                <!-- <div id="content_my_team" class="row mt-3">
                    data
                </div> -->
            </div>
        </div>
    </div>
</div>


<script>

    var loop_check_wait_host ;
    
    document.addEventListener('DOMContentLoaded', (event) => {
        // console.log("START");
        // get_data_groups("{{ $group_id }}");
        check_wait_host("{{ $group_status }}");

        loop_check_wait_host = setInterval(function() {
            // console.log("LOOP");
            fetch("{{ url('/') }}/api/get_data_me" + '/' + "{{ Auth::user()->id }}")
                .then(response => response.text())
                .then(result => {
                    // console.log(result);
                    check_wait_host(result);
            });
        }, 5000);

    });

    function Stop_loop_check_wait_host() {
        clearInterval(loop_check_wait_host);
    }

    function test_modal(status){

        create_modal(status , "{{ $group_id }}");
        document.querySelector('#btn_modal_join_team').click();

    }

    function open_modal_join_team(type , type_get_data){

        // console.log('เช็คอีกครั้งว่าบ้านนี้มี Host แล้วหรือยัง');

        // เช็คอีกครั้งว่าบ้านนี้มี Host แล้วหรือยัง
        fetch("{{ url('/') }}/api/get_data_groups/" + type_get_data)
            .then(response => response.json())
            .then(result => {
              // console.log(result);

                if(type == "host"){

                    if( !result.host){
                        // console.log('ยังไม่มี host');
                        create_modal('host' , type_get_data);
                        document.querySelector('#btn_modal_join_team').click();

                    }else{
                      // console.log('ขออภัย มี Host แล้วขณะคุณทำรายการ');
                        create_modal('home_have_host' , type_get_data);
                        document.querySelector('#btn_modal_join_team').click();
                    }

                }else if(type != "host"){

                    create_modal('member' , type_get_data);
                    document.querySelector('#btn_modal_join_team').click();

                }
        });
    }

    function cf_join_team(type , group_id){

        // เช็คอีกครั้งว่าบ้านนี้มี Host แล้วหรือยัง
        fetch("{{ url('/') }}/api/get_data_groups/" + group_id)
            .then(response => response.json())
            .then(result => {
            // console.log.log(result);

                let list_member = JSON.parse(result.member);
                let list_request_join = JSON.parse(result.request_join);

                // console.log("{{ Auth::user()->id }}");
                // console.log("------------");
                // console.log(result.host);
                // console.log(list_member);
                // console.log(list_request_join);

                let check_list_member = false ;
                let check_list_request_join = false ;

                if(list_member){
                    check_list_member = list_member.includes("{{ Auth::user()->id }}");
                }

                if(list_request_join){
                    check_list_request_join = list_request_join.includes("{{ Auth::user()->id }}");
                }

                if( "{{ Auth::user()->id }}" == result.host || "{{ Auth::user()->group_status }}" == "กำลังขอเข้าร่วมบ้าน" || check_list_member || check_list_request_join ){
                    // console.log('ไม่ทำงาน');
                    location.reload();
                }else{
                    // console.log('ทำงาน');
                    if(type == "host"){

                        if(!result.host){
                            // console.log('ยังไม่มี host');
                            fetch("{{ url('/') }}/api/user_join_team/" + type + "/" + group_id + "/{{ Auth::user()->id }}")
                                .then(response => response.text())
                                .then(result => {
                                  // console.log(result);

                                    let link_to_my_team = document.querySelector('#link_to_my_team');
                                        link_to_my_team.setAttribute("href","{{ url('/group_my_team') . '/' . $group_id }}?first=Yes");

                                    link_to_my_team.click();
                            });
                        }else{
                            // console.log('ขออภัย มี Host แล้วขณะคุณทำรายการ');
                            create_modal('home_have_host' , group_id);
                        }
                        
                    }else if(type != "host"){
                        let count_member = JSON.parse(result.member);
                        
                        if(count_member.length < 10){

                            fetch("{{ url('/') }}/api/user_join_team/" + type + "/" + group_id + "/{{ Auth::user()->id }}")
                                .then(response => response.text())
                                .then(result => {
                                  // console.log(result);

                                    // console.log('รอการตอบรับจาก host');
                                    create_modal('wait_host_accept' , group_id);

                            });

                        }else if(count_member.length >= 10){
                            // console.log('ขออภัย บ้านนี้มีสมาชิกครับ 10 ท่านแล้ว');
                            create_modal('full_house' , group_id);
                        }
                    }
                }

        });

    }

    function create_modal(type , id_group){

        if (id_group <= 9) {
            name_group = '0'+id_group ;
            // name_group = id_group ;
        }else if(id_group > 9 && id_group < 100){
            // name_group = '0'.id_group ;
            name_group = id_group ;
        }else{
            name_group = id_group ;
        }

        if (type == "host") {

            let html_modal = `
                <img src="{{ url('/img/icon/Frame 7.png') }}" style="width:90%;" class="mt-2 mb-2">
                <h4 class="text-info-modal">Team `+name_group+`</h4>
                <p class="text-info-modal">คุณต้องการที่จะเป็น Host ประจำทีม หรือไม่ ?</p>
                <br>
                <span class="text-dark mt-3 font-14 warn-text">
                    Host สามารถอนุมัติ หรือ ปฏิเสธคำขอเข้าร่วมทีมของผู้เล่นท่านอื่นได้ <br> (ตัดสินใจภายใน 24ชั่วโมงมิเช่นนั้นระบบจะยกเลิกคำขออัตโนมัติ)
                </span>
            `;

            let html_footer = `
                <button type="button" class="btn btn-warning" onclick="cf_join_team('host','`+id_group+`')"><b>Join as host</b></button>
                <button id="close_modal_join_team" type="button" class="btn btn-secondary btn-cancel-modal" data-dismiss="modal">Cancel</button>
            `;

            document.querySelector('#modal_join_team_content').innerHTML = html_modal;
            document.querySelector('#modal_join_team_footer').innerHTML = html_footer;

        }
        else if(type == "home_have_host"){

            let html_modal = `
                <img src="{{ url('/img/icon/Frame 5.png') }}" style="width:185px;" class="mt-2 mb-2">
                <h4 class="mb-0" style="color:#FF7800;">ขออภัย !</h4>
                <p style="color:#FF7800;">ตอนนี้ทีม `+name_group+` มี Host  เรียบร้อยเเล้ว</p>
                <br>
                <span class="text-dark mt-3">
                    คุณต้องการเข้าร่วมทีม `+name_group+` ในสถานะ <b>สมาชิก</b> หรือไม่
                </span>
            `;

            let html_footer = `
                <button type="button" class="btn btn-submit" onclick="cf_join_team('member','`+id_group+`')">Join our member</button>
                <button id="close_modal_join_team" type="button" class="btn btn-secondary padding-btn" data-dismiss="modal">Cancel</button>
            `;

            document.querySelector('#modal_join_team_content').innerHTML = html_modal;
            document.querySelector('#modal_join_team_footer').innerHTML = html_footer;

        }
        else if(type == "member"){

            let html_modal = `
                <img src="{{ url('/img/icon/Frame 3.png') }}" style="width:115px;height:115px;" class="mt-2 mb-2">
                <h4 class="mt-3 mb-0" style="color:#37BCBC;">Team `+name_group+`</h4>
                <p style="color:#37BCBC;" class="warn-text"><b>คุณต้องการที่จะเป็นสมาชิกทีมนี้ใช่หรือไม่</b></p>
                <div class="text-dark">
                    <p>คำขอของคุณจะได้รับการยืนยันภายใน 24 ชั่วโมง</p>
                    <p class="warn-text">(หาก host ตอบรับคุณเข้าทีมแล้ว จะไม่สามารถเปลี่ยนทีมได้อีก)</p>
                </div>
            `;

            let html_footer = `
                <button type="button" class="btn btn-submit padding-btn " onclick="cf_join_team('member','`+id_group+`')">Join</button>
                <button id="close_modal_join_team" type="button" class=" padding-btn btn btn-secondary" data-dismiss="modal">Cancel</button>
            `;

            document.querySelector('#modal_join_team_content').innerHTML = html_modal;
            document.querySelector('#modal_join_team_footer').innerHTML = html_footer;

        }
        else if(type == "full_house"){

            let html_modal = `
                <img src="{{ url('/img/icon/sorry.png') }}" style="width:115px;" class="mt-2 mb-2">
                <h4 class="mt-2 mb-0" style="color:#3055CD;"><b>ขออภัย !</b></h4>
                <p style="color:#3055CD;">ทีม `+name_group+` มีสมาชิกครบเเล้ว </p>

                <div class="mt-3">
                    <p class="mb-0">คุณยังสามารถสมัครเข้าทีมอื่นๆได้</p>
                    <p>โดยระบบจะปิดการสมัครภายในวันที่ 24 ม.ค. 2567</p>
                </div>
            `;

            let html_footer = `
                <button id="close_modal_join_team" type="button" class="btn btn-submit padding-btn" data-dismiss="modal">Close</button>
            `;

            document.querySelector('#modal_join_team_content').innerHTML = html_modal;
            document.querySelector('#modal_join_team_footer').innerHTML = html_footer;

        }
        else if(type == "wait_host_accept"){

           let html_modal = `
                <img src="{{ url('/img/icon/Frame 1.png') }}" style="width:115px;height:115px;" class="mt-2 mb-2">
                <p class="text-dark" style="font-size:font-size: 18px;;"><b>สถานะ : รอการตอบรับจาก host</b></p>
                <h4 style="color:#00AAAC;margin-bottom:0;margin-top:15px ;font-size: 20px;font-style: normal;font-weight: 700;line-height: normal;">Team `+name_group+`</h4>
                <p style="color: #005CD3;text-align: center;font-family: Inter;font-size: 12px;font-style: normal;font-weight: 400;line-height: normal;">Waiting : <span id="modal_timer">23:59</span></p>

                <div class="text-center mt-3">
                    <p class=" m-0 text-danger" style="color: #FF3838;text-align: center;font-family: Inter;font-size: 10px;font-style: normal;font-weight: 500;line-height: normal;">ระหว่างรอการยืนยันจาก Host <br>คุณจะไม่สามารถกดคำขอเข้าทีมอื่นได้</p>
                    <p class=" mt-3 text-danger" style="color: #FF3838;text-align: center;font-family: Inter;font-size: 10px;font-style: normal;font-weight: 500;line-height: normal;">เเละหากครบ 24 ชั่วโมง เเล้วยังไม่มีการตอบกลับจาก Host <br>คำขอนี้จะถูกระบบยกเลิกโดยอัตโนมัติ</p>
                </div>
                <span class="text-dark">
                    
                    
                </span>
            `;

            let html_footer = `
                
                <a href="{{ url('/preview_team/`+id_group+`') }}" type="button" class="btn btn-submit padding-btn">
                    Close
                </a>
                <button id="close_modal_join_team" type="button" class="d-none padding-btn btn btn-secondary" data-dismiss="modal">Cancel</button>
            `;

            document.querySelector('#modal_join_team_content').innerHTML = html_modal;
            document.querySelector('#modal_join_team_footer').innerHTML = html_footer;

            let hours = 23;
            let minutes = 59;

            setInterval(function () {

                // ลดนาทีลง 1
                minutes--;

                // ถ้านาทีเป็น -1 ลดชั่วโมงลง 1 และตั้งนาทีเป็น 59
                if (minutes < 0) {
                    hours--;
                    minutes = 59;
                }

                // แสดงเวลาที่เหลือ
                document.querySelector('#modal_timer').innerHTML = hours + ":" + minutes ;

            }, 60000);

        }
        else if(type == "Host Accept"){

            let html_modal = `
                 <img src="{{ url('/img/icon/Group 694.png') }}" style="width:250px;" class="mt-2 mb-2">
                <h4 class="text-info">Team `+name_group+`</h4>
                <p class="text-dark">ได้อนุมัติคำขอเข้าร่วมทีมของคุณเเล้ว</p>
            `;

            let html_footer = `
                <a href="{{ url('/group_my_team/`+id_group+`') }}" type="button" class="btn btn-submit padding-btn">
                    Next
                </a>
            `;

            document.querySelector('#modal_join_team_content').innerHTML = html_modal;
            document.querySelector('#modal_join_team_footer').innerHTML = html_footer;

        }
        else if(type == "Host Reject"){

            let html_modal = `
                <img src="{{ url('/img/icon/Group 695 (1).png') }}" style="width:200px;" class="mt-2 mb-2">
                <h4 class="text-danger"><b>คำขอของคุณถูกปฏิเสธ !</b></h4>
                <p class="text-dark mt-4">คุณยังสามารถสมัครเข้าทีมอื่นๆได้ โดยระบบจะปิดการสมัครภายในวันที่ 24 ม.ค. 2567</p>
            `;

            let html_footer = `
                
                <a href="{{ url('/groups') }}" type="button" class="btn btn-submit padding-btn">
                    Close
                </a>
            `;

            document.querySelector('#modal_join_team_content').innerHTML = html_modal;
            document.querySelector('#modal_join_team_footer').innerHTML = html_footer;

        }
        else if(type == "Team Ready"){

            let html_modal = `
                <img src="{{ url('/img/icon/Frame 8.png') }}" style="width:205px;" class="mt-2 mb-2">
                <h4 class="text-success">Completed ! </h4>
                <p style="color:#193490;margin-top:15px">ทีมของคุณพร้อมเเล้วสำหรับภารกิจที่รออยู่</p>
            `;

            let html_footer = `
                
                <a href="{{ url('/group_my_team/`+id_group+`') }}" type="button" class="btn btn-submit padding-btn">
                    Close
                </a>
            `;

            document.querySelector('#modal_join_team_content').innerHTML = html_modal;
            document.querySelector('#modal_join_team_footer').innerHTML = html_footer;

        }

        else if(type == "Delete team"){

        let html_modal = `
            <img src="{{ url('/img/icon/alert.png') }}" style="width:calc(100% - 70%);" class="mt-4 mb-2">
            <h4 class="text-success" style="color:#00AAAC;margin-top:15px">ทีมของคุณไม่ผ่านเกณฑ์ !</h4>
            <p style=";margin-top:15px">เนื่องจากทีมของคุณมีสมาชิกไม่ครบตามข้อตกลง ระบบจึงทำการรีเซ็ตทีมของคุณ</p>
            <p class="text-danger" style=";margin-top:30px">คุณสามารถทำการสร้างทีม หรือขอเข้าร่วมทีมที่ยังว่างได้จนถึง 17:00 น. ของวันที่ 23 ม.ค. 2567</p>
        `;

        let html_footer = `
            
            <a href="{{ url('/group_my_team/`+id_group+`') }}" type="button" class="btn btn-submit padding-btn">
                Close
            </a>
        `;

        document.querySelector('#modal_join_team_content').innerHTML = html_modal;
        document.querySelector('#modal_join_team_footer').innerHTML = html_footer;

        }

    }



    function check_wait_host(group_status){

        if(group_status == 'กำลังขอเข้าร่วมบ้าน'){
            // ขึ้นเวลาที่รอผ่านไปกี่ ชม แล้ว
        }else if(group_status == 'Host Accept'){
            // เปลี่ยนสถานะเป็น มีบ้านแล้ว
            // เด้งไปหน้า my team
            document.querySelector('#close_modal_join_team').click();
            
            fetch("{{ url('/') }}/api/change_group_status/" + 'มีบ้านแล้ว' + "/" + "{{ $group_id }}" + "/{{ Auth::user()->id }}")
                .then(response => response.text())
                .then(result => {
                  // console.log(result);

                    // modal แจ้งเตือนการเข้าร่วมบ้าน ครั้งแรกครั้งเดียว
                    create_modal('Host Accept' , "{{ $group_id }}");
                    document.querySelector('#btn_modal_join_team').click();
                    Stop_loop_check_wait_host();

            });

        }else if(group_status == 'Host Reject'){
            // หลังจากนั้นเปลี่ยนสถานะเป็น null | group_id = null
            // เด้งไปหน้า groups หาบ้านใหม่
            document.querySelector('#close_modal_join_team').click();
            
            fetch("{{ url('/') }}/api/change_group_status/" + 'Host Reject' + "/" + "{{ $group_id }}" + "/{{ Auth::user()->id }}")
                .then(response => response.text())
                .then(result => {
                  // console.log(result);

                    // modal แจ้งเตือน Host Reject ครั้งเดียว
                    create_modal('Host Reject' , "{{ $group_id }}");
                    document.querySelector('#btn_modal_join_team').click();
                    Stop_loop_check_wait_host();

            });
        }else if(group_status == 'Team Ready'){
            // เปลี่ยนสถานะเป็น ยืนยันการสร้างบ้านแล้ว
            // เด้งไปหน้า my team
            document.querySelector('#close_modal_join_team').click();
            
            fetch("{{ url('/') }}/api/change_group_status/" + 'ยืนยันการสร้างบ้านแล้ว' + "/" + "{{ $group_id }}" + "/{{ Auth::user()->id }}")
                .then(response => response.text())
                .then(result => {
                  // console.log(result);

                    // modal แจ้งเตือนการเข้าร่วมบ้าน ครั้งแรกครั้งเดียว
                    create_modal('Team Ready' , "{{ $group_id }}");
                    document.querySelector('#btn_modal_join_team').click();
                    Stop_loop_check_wait_host();

            });
        }

    }






    // function get_data_groups(type_get_data){
    //   // console.log(type_get_data);

    //     fetch("{{ url('/') }}/api/get_data_groups/" + type_get_data)
    //         .then(response => response.json())
    //         .then(result => {
    //           // console.log('get_data_groups');
    //           // console.log(result);

    //             let content_my_team = document.querySelector('#content_my_team');
    //                 content_my_team.innerHTML = '' ;

    //             setTimeout(() => {
    //                 if(result){
    //                     let member = JSON.parse(result.member);
    //                   // console.log(member);

    //                     if(member){
    //                         document.querySelector('#amount_member').innerHTML = member.length ;

    //                         for (let zx = 0; zx < member.length; zx++) {

    //                             let html_member = `
    //                                 <div class="col-4 mt-2 mb-2 text-dark">Member ID : `+member[zx]+`</div>
    //                             `;

    //                             content_my_team.insertAdjacentHTML('beforeend', html_member); // แทรกล่างสุด
    //                         }


                            
    //                         let html_for_join ;
    //                         let member_next ;

    //                         if("{{ $group_status }}" == 'กำลังขอเข้าร่วมบ้าน'){
    //                             member_next = member.length ;
    //                             let html_me = `
    //                                 <div class="col-4 mt-2 mb-2 text-dark">
    //                                     ฉันกำลังขอเข้าร่วม
    //                                     <br>
    //                                     เหลือเวลา 22:26
    //                                 </div>
    //                             `;

    //                             content_my_team.insertAdjacentHTML('beforeend', html_me); // แทรกล่างสุด

    //                             html_for_join = `
    //                                 <div id="Team_no" class=" col-4 mt-2 mb-2">
    //                                     <div class="bg-secondary text-center" style="width: 95%;height: auto;">
    //                                         <i class="fa-solid fa-user-plus"></i>
    //                                         <p>Join our team</p>
    //                                     </div>
    //                                 </div>
    //                             `;

    //                         }else{
    //                             member_next = member.length + 1 ;

    //                             html_for_join = `
    //                                 <div id="Team_no" class=" col-4 mt-2 mb-2" onclick="open_modal_join_team('member',`+type_get_data+`);">
    //                                     <div class="bg-secondary text-center" style="width: 95%;height: auto;">
    //                                         <i class="fa-solid fa-user-plus"></i>
    //                                         <p>Join our team</p>
    //                                     </div>
    //                                 </div>
    //                             `;
    //                         }

    //                         for (let i = member_next; i <= 10; i++) {
    //                             content_my_team.insertAdjacentHTML('beforeend', html_for_join); // แทรกล่างสุด
    //                         }

    //                     }else{
    //                         document.querySelector('#amount_member').innerHTML = "0" ;

    //                         let html_for_join = `
    //                             <div id="Team_no" class=" col-4 mt-2 mb-2" onclick="open_modal_join_team('host',`+type_get_data+`);">
    //                                 <div class="bg-secondary text-center" style="width: 95%;height: auto;">
    //                                     <i class="fa-solid fa-user-plus"></i>
    //                                     <p>Join our team</p>
    //                                 </div>
    //                             </div>
    //                         `;

    //                         for (let i = 0; i < 10; i++) {
    //                             content_my_team.insertAdjacentHTML('beforeend', html_for_join); // แทรกล่างสุด
    //                         }
    //                     }
    //                 }
    //             }, 500);

    //     });
    // }
    
</script>

@endsection