@extends('layouts.theme_user')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="card">
            <div class="card-body">

                <div class="col">
                    <div class="btn-group" role="group" aria-label="First group">
                        <button id="btn_view_1_20" type="button" class="btn btn-outline-primary" onclick="change_menu_view('1-20');">
                            1-20
                        </button>
                        <button id="btn_view_21_40" type="button" class="btn btn-outline-primary" onclick="change_menu_view('21-40');">
                            21-40
                        </button>
                        <button id="btn_view_41_60" type="button" class="btn btn-outline-primary" onclick="change_menu_view('41-60');">
                            41-60
                        </button>
                        <button id="btn_view_61_80" type="button" class="btn btn-outline-primary" onclick="change_menu_view('61-80');">
                            61-80
                        </button>
                        <button id="btn_view_81_100" type="button" class="btn btn-outline-primary" onclick="change_menu_view('81-100');">
                            81-100
                        </button>
                        <button id="btn_view_101_120" type="button" class="btn btn-outline-primary" onclick="change_menu_view('101-120');" onch>
                            101-120
                        </button>
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

                <div id="content_groups" class="row mt-3">
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

                setTimeout(() => {
                    if(result){

                        let content_groups = document.querySelector('#content_groups');
                            content_groups.innerHTML = '';

                        for (let i = 0; i < result.length; i++) {
                            
                            let member = JSON.parse(result[i].member);

                            let class_team = '';
                            let count_member = '';

                            if(!member){
                                class_team = 'secondary';
                                count_member = 0;
                            }else if(member.length == "10"){
                                class_team = 'success';
                                count_member = member.length;
                            }else{
                                class_team = 'warning';
                                count_member = member.length;
                            }

                            let html = `
                                <a id="Team_`+result[i].id+`" class="div_Team col-4 mt-2 mb-2" href="{{ url('/preview_team/`+result[i].id+`') }}">
                                    <div class="bg-`+class_team+`" style="width: 95%;height: auto;">
                                        <span class="float-end">`+count_member+`/10</span>
                                        <center>
                                            <img src="{{ url('/img/bg_group/logo_group/bg_group_`+result[i].name_group+`.png') }}" style="width: 90%;" class="mt-2 mb-2">
                                            <p>Team `+result[i].name_group+`</p>
                                        </center>
                                    </div>
                                </a>
                            `;

                            content_groups.insertAdjacentHTML('beforeend', html); // แทรกล่างสุด
                        }

                        change_menu_view('1-20');

                    }

                }, 500);

            });
    }

    function change_menu_view(type_get_data){

        type_get_data = type_get_data.replace("-", "_");

        document.querySelector('#btn_view_1_20').setAttribute('class' , 'btn btn-outline-primary');
        document.querySelector('#btn_view_21_40').setAttribute('class' , 'btn btn-outline-primary');
        document.querySelector('#btn_view_41_60').setAttribute('class' , 'btn btn-outline-primary');
        document.querySelector('#btn_view_61_80').setAttribute('class' , 'btn btn-outline-primary');
        document.querySelector('#btn_view_81_100').setAttribute('class' , 'btn btn-outline-primary');
        document.querySelector('#btn_view_101_120').setAttribute('class' , 'btn btn-outline-primary');

        document.querySelector('#btn_view_'+type_get_data).setAttribute('class' , 'btn btn-primary');

        let team_start = type_get_data.split('_')[0];
        let team_end = type_get_data.split('_')[1];

        let div_Team = document.querySelectorAll('.div_Team');
            div_Team.forEach(item => {
                // console.log(item);
                item.classList.add('d-none');
            })

        for (let i = parseInt(team_start); i <= parseInt(team_end); i++) {
            if(document.querySelector('#Team_'+i)){
                document.querySelector('#Team_'+i).classList.remove('d-none');
            }
        }

    }

</script>

@endsection
