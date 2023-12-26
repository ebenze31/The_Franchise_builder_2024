@extends('layouts.theme_user')

@section('content')

<!-- modal_join_team -->
<button id="btn_modal_join_team" class="d-none" data-toggle="modal" data-target="#modal_join_team"></button>

<div class="modal fade" id="modal_join_team" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
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
            					Team {{ $group_id }}
            				</div>
            			</div>
            		</div>
            		<div class="col-12 mt-2 mb-2 text-dark">
            			Members : Team {{ $group_id }} <span class="float-end">Member : <span id="amount_member"></span>/10</span>
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
                                            $time_cf_pay_slip = Auth::user()->time_cf_pay_slip;

                                            // สร้าง DateTime object จากเวลาที่กำหนด
                                            $specifiedTime = new DateTime($time_cf_pay_slip);

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

<button class="btn btn-warning" onclick="test_modal();">TEST</button>

<script>
	
	document.addEventListener('DOMContentLoaded', (event) => {
        // console.log("START");
        // get_data_groups("{{ $group_id }}");
        check_wait_host();
    });

    function test_modal(){

        create_modal('home_have_host' , "{{ $group_id }}");
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
              // console.log(result);

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
                <img src="{{ url('/img/icon/Frame 7.png') }}" style="width:100%;" class="mt-2 mb-2">
                <h4 class="text-info">Team `+name_group+`</h4>
                <p class="text-info">คุณต้องการที่จะเป็น Host ประจำทีม หรือไม่ ?</p>
                <br>
                <span class="text-dark mt-3">
                    Host สามารถอนุมัติ หรือ ปฏิเสธคำขอเข้าร่วมทีมของผู้เล่นท่านอื่นได้ (ตัดสินใจภายใน 24ชั่วโมงมิเช่นนั้นระบบจะยกเลิกคำขออัตโนมัติ)
                </span>
            `;

            let html_footer = `
                <button type="button" class="btn btn-warning" onclick="cf_join_team('host','`+id_group+`')">Join our host</button>
                <button id="close_modal_join_team" type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            `;

            document.querySelector('#modal_join_team_content').innerHTML = html_modal;
            document.querySelector('#modal_join_team_footer').innerHTML = html_footer;

        }
        else if(type == "home_have_host"){

            let html_modal = `
                <img src="{{ url('/img/icon/Frame 5.png') }}" style="width:100%;" class="mt-2 mb-2">
                <h4 style="color:#FF7800;">ขออภัย !</h4>
                <p style="color:#FF7800;">ตอนนี้ทีม `+name_group+` มี Host  เรียบร้อยเเล้ว</p>
                <br>
                <span class="text-dark mt-3">
                    คุณต้องการเข้าร่วมทีม `+name_group+` ในสถานะ <b>สมาชิก</b> หรือไม่
                </span>
            `;

            let html_footer = `
                <button type="button" class="btn btn-primary" onclick="cf_join_team('member','`+id_group+`')">Join our member</button>
                <button id="close_modal_join_team" type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            `;

            document.querySelector('#modal_join_team_content').innerHTML = html_modal;
            document.querySelector('#modal_join_team_footer').innerHTML = html_footer;

        }
        else if(type == "member"){

            let html_modal = `
                <img src="{{ url('/img/icon/Frame 3.png') }}" style="width:100%;" class="mt-2 mb-2">
                <h4 style="color:#37BCBC;">Team `+name_group+`</h4>
                <p style="color:#37BCBC;">คุณต้องการที่จะเป็นสมาชิกทีมนี้ใช่หรือไม่</p>
                <br>
                <span class="text-dark">
                    คำขอของคุณจะได้รับการยืนยันภายใน 24 ชั่วโมง (หาก host ตอบรับคุณเข้าทีมแล้ว จะไม่สามารถเปลี่ยนทีมได้อีก)
                </span>
            `;

            let html_footer = `
                <button type="button" class="btn btn-primary" onclick="cf_join_team('member','`+id_group+`')">Join</button>
                <button id="close_modal_join_team" type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            `;

            document.querySelector('#modal_join_team_content').innerHTML = html_modal;
            document.querySelector('#modal_join_team_footer').innerHTML = html_footer;

        }
        else if(type == "full_house"){

            let html_modal = `
                <img src="{{ url('/img/icon/sorry.png') }}" style="width:100%;" class="mt-2 mb-2">
                <h4 style="color:#3055CD;">ขออภัย !</h4>
                <p style="color:#3055CD;">ทีม `+name_group+` มีสมาชิกครบเเล้ว </p>
                <br>
                <span class="text-dark">
                    คุณยังสามารถสมัครเข้าทีมอื่นๆได้ โดยระบบจะปิดการสมัครภายในวันที่ 24 ม.ค. 2567
                </span>
            `;

            let html_footer = `
                <button id="close_modal_join_team" type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
            `;

            document.querySelector('#modal_join_team_content').innerHTML = html_modal;
            document.querySelector('#modal_join_team_footer').innerHTML = html_footer;

        }
        else if(type == "wait_host_accept"){

            let html_modal = `
                <img src="{{ url('/img/icon/Frame 1.png') }}" style="width:100%;" class="mt-2 mb-2">
                <h4 class="text-dark">สถานะ : รอการตอบรับจาก host</h4>
                <h4>Team `+name_group+`</h4>
                <p class="text-info">Waiting : <span id="modal_timer">23:59</span></p>
                <span class="text-dark">
                    ระหว่างรอการยืนยันจาก Host คุณจะไม่สามารถกดคำขอเข้าทีมอื่นได้
                    <br>
                    เเละหากครบ 24 ชั่วโมง เเล้วยังไม่มีการตอบกลับจาก Host คำขอนี้จะถูกระบบยกเลิกโดยอัตโนมัติ
                </span>
            `;

            let html_footer = `
                
                <a href="{{ url('/preview_team/`+id_group+`') }}" type="button" class="btn btn-primary">
                    Close
                </a>
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
                <img src="{{ url('/img/icon/Group 694.png') }}" style="width:100%;" class="mt-2 mb-2">
                <h4 class=text-info>Team `+name_group+`</h4>
                <p class="text-dark">ได้อนุมัติคำขอเข้าร่วมทีมของคุณเเล้ว</p>
            `;

            let html_footer = `
                
                <a href="{{ url('/group_my_team/`+id_group+`') }}" type="button" class="btn btn-primary">
                    Close
                </a>
            `;

            document.querySelector('#modal_join_team_content').innerHTML = html_modal;
            document.querySelector('#modal_join_team_footer').innerHTML = html_footer;

        }
        else if(type == "Host Reject"){

            let html_modal = `
                <img src="{{ url('/img/icon/Group 695 (1).png') }}" style="width:100%;" class="mt-2 mb-2">
                <h4 class=text-danger>คำขอของคุณถูกปฏิเสธ !</h4>
                <p class="text-dark">คุณยังสามารถสมัครเข้าทีมอื่นๆได้ โดยระบบจะปิดการสมัครภายในวันที่ 24 ม.ค. 2567</p>
            `;

            let html_footer = `
                
                <a href="{{ url('/groups') }}" type="button" class="btn btn-primary">
                    Close
                </a>
            `;

            document.querySelector('#modal_join_team_content').innerHTML = html_modal;
            document.querySelector('#modal_join_team_footer').innerHTML = html_footer;

        }
        else if(type == "Team Ready"){

            let html_modal = `
                <img src="{{ url('/img/icon/Frame 8.png') }}" style="width:100%;" class="mt-2 mb-2">
                <h4 class=text-success>Completed ! </h4>
                <p class="text-info">ทีมของคุณพร้อมเเล้วสำหรับภารกิจที่รออยู่</p>
            `;

            let html_footer = `
                
                <a href="{{ url('/group_my_team/`+id_group+`') }}" type="button" class="btn btn-primary">
                    Close
                </a>
            `;

            document.querySelector('#modal_join_team_content').innerHTML = html_modal;
            document.querySelector('#modal_join_team_footer').innerHTML = html_footer;

        }

    }



    function check_wait_host(){

        if("{{ $group_status }}" == 'กำลังขอเข้าร่วมบ้าน'){
            // ขึ้นเวลาที่รอผ่านไปกี่ ชม แล้ว
        }else if("{{ $group_status }}" == 'Host Accept'){
            // เปลี่ยนสถานะเป็น มีบ้านแล้ว
            // เด้งไปหน้า my team
            fetch("{{ url('/') }}/api/change_group_status/" + 'มีบ้านแล้ว' + "/" + "{{ $group_id }}" + "/{{ Auth::user()->id }}")
                .then(response => response.text())
                .then(result => {
                  // console.log(result);

                    // modal แจ้งเตือนการเข้าร่วมบ้าน ครั้งแรกครั้งเดียว
                    create_modal('Host Accept' , "{{ $group_id }}");
                    document.querySelector('#btn_modal_join_team').click();

            });

        }else if("{{ $group_status }}" == 'Host Reject'){
            // หลังจากนั้นเปลี่ยนสถานะเป็น null | group_id = null
            // เด้งไปหน้า groups หาบ้านใหม่
            fetch("{{ url('/') }}/api/change_group_status/" + 'Host Reject' + "/" + "{{ $group_id }}" + "/{{ Auth::user()->id }}")
                .then(response => response.text())
                .then(result => {
                  // console.log(result);

                    // modal แจ้งเตือน Host Reject ครั้งเดียว
                    create_modal('Host Reject' , "{{ $group_id }}");
                    document.querySelector('#btn_modal_join_team').click();

            });
        }else if("{{ $group_status }}" == 'Team Ready'){
            // เปลี่ยนสถานะเป็น ยืนยันการสร้างบ้านแล้ว
            // เด้งไปหน้า my team
            fetch("{{ url('/') }}/api/change_group_status/" + 'ยืนยันการสร้างบ้านแล้ว' + "/" + "{{ $group_id }}" + "/{{ Auth::user()->id }}")
                .then(response => response.text())
                .then(result => {
                  // console.log(result);

                    // modal แจ้งเตือนการเข้าร่วมบ้าน ครั้งแรกครั้งเดียว
                    create_modal('Team Ready' , "{{ $group_id }}");
                    document.querySelector('#btn_modal_join_team').click();

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