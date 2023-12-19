@extends('layouts.theme_user')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="card">
            <div class="card-body">

            	<div class="row">
            		<div class="col-12" style="background-color: skyblue;height: auto;position: relative;">
            			<div class="row">
            				<div class="col-3">
            					<img src="{{ url('/img/bg_group/logo_group/bg_group_1.png') }}" style="width: 90%;position: absolute;top:-20px;left: 4%;width: 50px;" class="mt-2 mb-2">
            				</div>
            				<div class="col-9 mt-2 mb-2">
            					Team 1 <br>
            					<span style="font-size: 14px;color: yellow;">PC : <span>xxxx</span></span>
            				</div>
            			</div>
            		</div>
            		<div class="col-12 mt-2 mb-2 text-dark">
            			Members : Team 1 <span class="float-end">Member : 1/10</span>
            		</div>
            	</div>

                <div class="row mt-3">
                    <!-- ออกแบบบล็อคมาตรงนี้ -->
                    <!-- ตัวอย่าง -->
                    <a id="Team_no" class="div_Team_Ex col-4 mt-2 mb-2" href="{{ url('/group_my_team/1') }}">
                        <div class="bg-secondary" style="width: 95%;height: auto;">
                            <span class="float-end">2/10</span>
                            <center>
                                <img src="{{ url('/img/bg_group/logo_group/bg_group_1.png') }}" style="width: 90%;" class="mt-2 mb-2">
                                <p>Team Ex.</p>
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
        get_data_groups('all');
    });

    function get_data_groups(type_get_data){
        // console.log(type_get_data);

        fetch("{{ url('/') }}/api/get_data_groups/" + type_get_data)
            .then(response => response.json())
            .then(result => {
                // console.log(result);

        });
    }
    
</script>

@endsection