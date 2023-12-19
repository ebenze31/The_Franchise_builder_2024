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
                            <span class="float-end">2/10</span>
                            <center>
                                <img src="{{ url('/img/bg_group/logo_group/bg_group_1.png') }}" style="width: 90%;" class="mt-2 mb-2">
                                <p>Team Ex.</p>
                            </center>
                        </div>
                    </a>
                    <!-- Member -->
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

@endsection