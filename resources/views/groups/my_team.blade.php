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
        คัดลอกเรียบร้อย
    </span>
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
            					Team {{ $group_id }} <br>
            					<span style="font-size: 14px;color: yellow;">PC : <span>xxxx</span></span>
            				</div>
            			</div>
            		</div>
            		<div class="col-12 mt-2 mb-2 text-dark">
            			Members : Team {{ $group_id }} <span class="float-end">Member : 1/10</span>
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
                                <img src="{{ url('/img/icon/profile.png') }}" style="width: 90%;" class="mt-2 mb-2">
                                <p>Name ..</p>
                            </center>
                        </div>
                    </a>
                    <!-- Member -->
                    <a id="Team_no" class="div_Team_Ex col-4 mt-2 mb-2" href="{{ url('/group_my_team/1') }}">
                        <div class="bg-secondary" style="width: 95%;height: auto;">
                            <center>
                                <img src="{{ url('/img/icon/profile.png') }}" style="width: 90%;" class="mt-2 mb-2">
                                <p>Name ..</p>
                            </center>
                        </div>
                    </a>
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

        get_data_my_team(group_id);

    });


    function get_data_my_team(group_id){
        console.log(group_id);

        fetch("{{ url('/') }}/api/get_data_my_team/" + group_id)
            .then(response => response.json())
            .then(result => {
                console.log('get_data_my_team');
                console.log(result);
        });
    }

</script>

@endsection