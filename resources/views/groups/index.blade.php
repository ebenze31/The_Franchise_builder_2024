@extends('layouts.theme_user')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="card">
            <div class="card-body">

                <div id="div_menu_view" class="text-danger">
                    @php
                        $menu_row = ceil($activeGroupsCount / 20) ;
                        $start = 1 ;
                        $end = 20 ;
                    @endphp
                    <div class="col">
                        <div class="btn-group" role="group" aria-label="First group">
                        @for ($i=1; $i <= $menu_row; $i++) 
                            @if($i == $menu_row)
                                <button btn="menu_view" id="btn_view_{{ $start }}_{{ $activeGroupsCount }}" type="button" class="btn btn-outline-primary" onclick="change_menu_view('{{ $start }}-{{ $activeGroupsCount }}');">
                                    {{ $start }} - {{ $activeGroupsCount }}
                                </button>
                            @else
                                <button btn="menu_view" id="btn_view_{{ $start }}_{{ $end }}" type="button" class="btn btn-outline-primary" onclick="change_menu_view('{{ $start }}-{{ $end }}');">
                                    {{ $start }} - {{ $end }}
                                </button>
                            @endif
                            <br>
                            @php
                                $start = $start + 20 ;
                                $end = $end + 20 ;
                            @endphp
                        @endfor
                        </div>
                    </div>
                </div>

                <div class="row mt-3">
                    <!-- ออกแบบบล็อคมาตรงนี้ -->
                    <!-- ตัวอย่าง -->
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
                                            <img src="{{ url('/img/bg_group/logo_group/bg_group_`+result[i].id+`.png') }}" style="width: 90%;" class="mt-2 mb-2">
                                            <p>Team `+result[i].id+`</p>
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

        let menu_view = document.querySelectorAll('[btn="menu_view"]');
            menu_view.forEach(menu_view => {
                menu_view.setAttribute('class' , 'btn btn-outline-primary');
            });

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
