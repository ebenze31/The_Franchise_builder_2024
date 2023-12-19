@extends('layouts.theme_user')

@section('content')

<!-- Button trigger modal -->
<button id="btn_modal_join_team" class="d-none" data-toggle="modal" data-target="#modal_join_team"></button>

<!-- Modal -->
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
                    <!-- ออกแบบบล็อคมาตรงนี้ -->
                    <!-- Host -->
                    <a id="Team_no" class="div_Team_Ex col-4 mt-2 mb-2" href="{{ url('/group_my_team/1') }}" style="position: relative;">
                        <span class="btn" style="position:absolute;right: 1%;top: -25px;">
                            <i class="fa-solid fa-key text-warning"></i>
                        </span>
                        <div class="bg-secondary" style="width: 95%;height: auto;">
                            <center>
                                <img src="{{ url('/img/bg_group/logo_group/bg_group_1.png') }}" style="width: 90%;" class="mt-2 mb-2">
                                <p>Host Ex.</p>
                            </center>
                        </div>
                    </a>
                    <!-- Member -->
                    <a id="Team_no" class="div_Team_Ex col-4 mt-2 mb-2" href="{{ url('/group_my_team/1') }}">
                        <div class="bg-secondary" style="width: 95%;height: auto;">
                            <center>
                                <img src="{{ url('/img/bg_group/logo_group/bg_group_1.png') }}" style="width: 90%;" class="mt-2 mb-2">
                                <p>Mb Ex.</p>
                            </center>
                        </div>
                    </a>

                    <!-- Empty -->
                    <div id="Team_no" class="div_Team_Ex col-4 mt-2 mb-2" onclick="open_modal_join_team();">
                        <div class="bg-secondary text-center" style="width: 95%;height: auto;">
                            <i class="fa-solid fa-user-plus"></i>
                            <p>Join our team</p>
                        </div>
                    </div>
                </div>

                <div id="content_my_team" class="row mt-3">
                    <!-- data -->
                </div>
            </div>
        </div>
    </div>
</div>



<script>
	
	document.addEventListener('DOMContentLoaded', (event) => {
        // console.log("START");
        get_data_groups("{{ $group_id }}");
    });

    function get_data_groups(type_get_data){
        console.log(type_get_data);

        fetch("{{ url('/') }}/api/get_data_groups/" + type_get_data)
            .then(response => response.json())
            .then(result => {
                console.log(result);

                let content_my_team = document.querySelector('#content_my_team');
                    content_my_team.innerHTML = '' ;

                setTimeout(() => {
                    if(result){
                        let member = JSON.parse(result.member);
                        console.log(member);

                        if(member){
                            document.querySelector('#amount_member').innerHTML = member.length ;

                            let html_member = `

                            `;

                            let html_for_join = `
                                <div id="Team_no" class="div_Team_Ex col-4 mt-2 mb-2" onclick="open_modal_join_team('member',`+type_get_data+`);">
                                    <div class="bg-secondary text-center" style="width: 95%;height: auto;">
                                        <i class="fa-solid fa-user-plus"></i>
                                        <p>Join our team</p>
                                    </div>
                                </div>
                            `;

                            let member_next = member.length + 1 ;
                            for (let i = member_next; i <= 10; i++) {
                                content_my_team.insertAdjacentHTML('beforeend', html_for_join); // แทรกล่างสุด
                            }

                        }else{
                            document.querySelector('#amount_member').innerHTML = "0" ;

                            let html_for_join = `
                                <div id="Team_no" class="div_Team_Ex col-4 mt-2 mb-2" onclick="open_modal_join_team('host',`+type_get_data+`);">
                                    <div class="bg-secondary text-center" style="width: 95%;height: auto;">
                                        <i class="fa-solid fa-user-plus"></i>
                                        <p>Join our team</p>
                                    </div>
                                </div>
                            `;

                            for (let i = 0; i < 10; i++) {
                                content_my_team.insertAdjacentHTML('beforeend', html_for_join); // แทรกล่างสุด
                            }
                        }
                    }
                }, 500);

        });
    }

    function open_modal_join_team(type , type_get_data){

        // console.log('เช็คอีกครั้งว่าบ้านนี้มี Host แล้วหรือยัง');

        // เช็คอีกครั้งว่าบ้านนี้มี Host แล้วหรือยัง
        fetch("{{ url('/') }}/api/get_data_groups/" + type_get_data)
            .then(response => response.json())
            .then(result => {
                console.log(result);

                if(type == "host"){
                    if( !result.host){
                        // console.log('ยังไม่มี host');

                        let html_modal = `
                            <h5>เนื่องจากคุณเป็นสมาชิกคนเเรกที่ได้เข้าร่วม</h5>
                            <h4>Team `+type_get_data+`</h4>
                            <span class="text-dark">
                                คุณต้องการที่จะเป็น Host ประจำทีม หรือไม่ ?ซึ่ง Host สามารถอนุมัติคำขอเข้าร่วมทีม หรือ ปฏิเสธคำขอคำเข้าร่วมทีมของสมาชิกท่านอื่นที่ขอเข้าร่วมทีมหลังจากคุณได้
                            </span>
                        `;

                        let html_footer = `
                            <button type="button" class="btn btn-warning" onclick="cf_join_team('host','`+type_get_data+`')">Join our host</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        `;

                        document.querySelector('#modal_join_team_content').innerHTML = html_modal;
                        document.querySelector('#modal_join_team_footer').innerHTML = html_footer;

                        document.querySelector('#btn_modal_join_team').click();
                    }else{
                        console.log('ขออภัย มี Host แล้วขณะคุณทำรายการ');
                    }
                }else if(type != "host"){

                    let html_modal = `
                        <h5>ต้องการเข้าร่วมทีม</h5>
                        <h4>Team `+type_get_data+`</h4>
                        <span class="text-dark">
                            คุณจะสามารถเข้าร่วมทีมได้เมื่อ Host ทำการอนุมัติคำขอเข้าร่วมทีมของคุณเเละคุณสามารถออกจากทีมได้ทุกเมื่อในกรณีที่ทีมของคุณยังไม่ครบ 10 คน เมื่อทีมมีสมาชิกครบ 10 คน ระบบจะทำการปิดทีมทันที จากนั้นคุณจะไม่สามารถออกจากทีมได้
                        </span>
                    `;

                    let html_footer = `
                        <button type="button" class="btn btn-primary" onclick="cf_join_team('member','`+type_get_data+`')">Join</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    `;

                    document.querySelector('#modal_join_team_content').innerHTML = html_modal;
                    document.querySelector('#modal_join_team_footer').innerHTML = html_footer;

                    document.querySelector('#btn_modal_join_team').click();
                }
        });
    }

    function cf_join_team(type , group_id){

        // เช็คอีกครั้งว่าบ้านนี้มี Host แล้วหรือยัง
        fetch("{{ url('/') }}/api/get_data_groups/" + group_id)
            .then(response => response.json())
            .then(result => {
                console.log(result);

                if(type == "host"){

                    if(!result.host){
                        // console.log('ยังไม่มี host');

                        fetch("{{ url('/') }}/api/user_join_team/" + type + "/" + group_id + "/{{ Auth::user()->id }}")
                            .then(response => response.text())
                            .then(result => {
                                console.log(result);

                                let link_to_my_team = document.querySelector('#link_to_my_team');
                                    link_to_my_team.setAttribute("href","{{ url('/group_my_team') . '/' . $group_id }}");

                                link_to_my_team.click();
                        });
                    }else{
                        console.log('ขออภัย มี Host แล้วขณะคุณทำรายการ');
                    }
                    
                }else if(type != "host"){
                    let count_member = JSON.parse(result.member);
                    
                    if(count_member.length < 10){

                        fetch("{{ url('/') }}/api/user_join_team/" + type + "/" + group_id + "/{{ Auth::user()->id }}")
                            .then(response => response.text())
                            .then(result => {
                                console.log(result);

                                let link_to_my_team = document.querySelector('#link_to_my_team');
                                    link_to_my_team.setAttribute("href","{{ url('/group_my_team') . '/' . $group_id }}");

                                link_to_my_team.click();
                        });

                    }else if(count_member.length >= 10){
                        console.log('ขออภัย บ้านนี้มีสมาชิกครับ 10 ท่านแล้ว');
                    }
                }
        });

    }
    
</script>

@endsection