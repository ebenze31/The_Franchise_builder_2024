@extends('layouts.theme_user')

@section('content')
<style>
    #header-text-login{
        width: 140px;
    }
    .nav-menu {
        margin-top: 15px;
        padding: 0 20px;
        background-color: rgb(255, 255, 255, 0.5);
        position: relative;
        z-index: 1;
        display: flex;
            align-items: center;
    }   

    .owl-carousel {
        /* background-color: rgb(255, 255, 255,0.5); */
    }

    .content-section {
        padding: 0;
    }

    .owl-prev,
    .owl-carousel__next,
    .owl-carousel__prev {
        position: absolute;
        color: #fff;
        top: 50%;
        transform: translate(-50%, -50%);
        z-index: 9999999;
        width: 20px;
        display: flex;
        justify-content: center;
    }
    .owl-carousel__next{
        right: -5px;
    }.owl-carousel__prev{
        left: 15px;
    }.btn-sort-group{
        color: #fff;
        padding: 10px 0;
        font-size: 12px;
        height: 100%;
    }.btn:hover ,.btn:active{
    color: #0a58ca !important;
}
    .btn-sort-group .item{
        display: flex;
        align-items: center;
    }
    
    .btn-sort-group-active{
        color: #0a58ca;
        padding: 10px 0;

    }.item-team{
        padding: 10px 10px 0 10px;
    }
    .item-team img{
        outline: 1px solid #00E0FF;
        border-radius: 5px !important;
        -webkit-border-radius: 5px; 
    -moz-border-radius: 5px;
    }

    #content_groups{
        display: flex;
        justify-content: space-around;
    }
</style>
<div class="nav-menu" id="div_menu_view">

    @php
    $menu_row = ceil($activeGroupsCount / 20) ;
    $start = 1 ;
    $end = 20 ;
    @endphp
        <div class="btn-group owl-carousel carousel_group owl-theme" role="group" aria-label="First group">
            @for ($i=1; $i <= $menu_row; $i++) @if($i==$menu_row) 
                <div class="item text-center">
                    <button btn="menu_view" id="btn_view_{{ $start }}_{{ $activeGroupsCount }}" type="button" class="btn btn-sort-group text-center mt-1" onclick="change_menu_view('{{ $start }}-{{ $activeGroupsCount }}');">
                       ลำดับที่ {{ $start }} - {{ $activeGroupsCount }}
                    </button>
                </div>
                @else
                <div class="item text-center">
                    <button btn="menu_view" id="btn_view_{{ $start }}_{{ $end }}" type="button" class="btn btn-sort-group text-center mt-1" onclick="change_menu_view('{{ $start }}-{{ $end }}');">
                    ลำดับที่ {{ $start }} - {{ $end }}
                    </button>
                </div>
                @endif
                @php
                $start = $start + 20 ;
                $end = $end + 20 ;
                @endphp
                @endfor
        </div>
        <div class="owl-carousel__prev"><i class="fa-solid fa-caret-right fa-rotate-180"></i></div>
        <div class="owl-carousel__next"><i class="fa-solid fa-caret-right"></i></div>
</div>

<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.js'></script>


<script>
    $(document).ready(function() {
        const owl = $('.carousel_group')
        owl.owlCarousel({
            loop: false,
            margin: 5,
            nav: false,
            items: 3,
            dots: false
        });

        // Custom Nav

        $('.owl-carousel__next').click(() => owl.trigger('next.owl.carousel'))

        $('.owl-carousel__prev').click(() => owl.trigger('prev.owl.carousel'))
    })
</script>

@if( Auth::user()->group_status == "มีบ้านแล้ว" || Auth::user()->group_status == "ยืนยันการสร้างบ้านแล้ว" )
<div class="container">
    <h5 class="mt-4 mb-2 text-white">
        My team
    </h5>
</div>

<div class="container-fluid">
    <div class="">
        <div class="row">
            @php
                $class_team = '';

                if(Auth::user()->group_status == "มีบ้านแล้ว"){
                    $class_team = 'warning' ;
                }else if(Auth::user()->group_status == "ยืนยันการสร้างบ้านแล้ว"){
                    $class_team = 'success' ;
                }
            @endphp

            <a id="MyTeam_{{ Auth::user()->group_id }}" class="col-4 mt-2 mb-2 p-0" href="{{ url('/group_my_team') . '/' . Auth::user()->group_id }}">
                <div class="item-team" style="width: 100%;height: auto;">
                    <img src="{{ url('/img/group_profile') . '/' . $class_team . '/id (' . Auth::user()->group_id . ').png' }}" style="width: 100%;">
                </div>
            </a>
            
        </div>
    </div>
</div>
@endif

<div class="container">
    <h5 class="mt-4 mb-2 text-white">
        All team
    </h5>
</div>

<div class="container-fluid">
    <div class="">
        <!-- <div class="row mt-3"> -->
            <!-- ออกแบบบล็อคมาตรงนี้ -->
            <!-- ตัวอย่าง -->
        <!-- </div> -->

        <div id="content_groups" class="row">
            <!-- data -->
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', (event) => {
        // console.log("START");
        get_data_groups('all');
    });

    function get_data_groups(type_get_data) {
        // console.log(type_get_data);

        fetch("{{ url('/') }}/api/get_data_groups/" + type_get_data)
            .then(response => response.json())
            .then(result => {
                // console.log(result);

                setTimeout(() => {
                    if (result) {

                        let content_groups = document.querySelector('#content_groups');
                        content_groups.innerHTML = '';

                        // @php
                        //     $class_team = '';

                        //     if(Auth::user()->group_status == "มีบ้านแล้ว"){
                        //         $class_team = 'warning' ;
                        //     }else if(Auth::user()->group_status == "ยืนยันการสร้างบ้านแล้ว"){
                        //         $class_team = 'success' ;
                        //     }
                        // @endphp

                        // let html_my_tem ;
                        // @if( Auth::user()->group_status == "มีบ้านแล้ว" || Auth::user()->group_status == "ยืนยันการสร้างบ้านแล้ว" )
                        //     html_my_tem = `<a id="MyTeam_{{ Auth::user()->group_id }}" class="col-4 mt-2 mb-2 p-0" href="{{ url('/preview_team') . '/' . Auth::user()->group_id }}">
                        //         <div class="item-team" style="width: 100%;height: auto;">
                        //             <img src="{{ url('/img/group_profile') . '/' . $class_team . '/id (' . Auth::user()->group_id . ').png' }}" style="width: 100%;">
                        //         </div>
                        //     </a>`;
                        // @endif

                        // content_groups.insertAdjacentHTML('beforeend', html_my_tem); // แทรกล่างสุด

                        let count_a = 1 ;

                        for (let i = 0; i < result.length; i++) {

                            if(result[i].active == "Yes"){
                                // เช็คว่าเป็นบ้านตัวเอง
                                let url_to = 'preview_team' ;
                                if( "{{ Auth::user()->group_status }}" == "มีบ้านแล้ว" || "{{ Auth::user()->group_status }}" == "ยืนยันการสร้างบ้านแล้ว" ){
                                    if("{{ Auth::user()->group_id }}" == result[i].id){
                                        url_to = 'group_my_team' ;
                                    }
                                }


                                let member = JSON.parse(result[i].member);

                                let class_team = '';
                                let count_member = '';

                                if (!member) {
                                    class_team = 'secondary';
                                    count_member = 0;
                                } else if (member.length == "10") {
                                    class_team = 'success';
                                    count_member = member.length;
                                } else {
                                    class_team = 'warning';
                                    count_member = member.length;
                                }


                                let html = `
                                    <a count="a_`+count_a+`" id="Team_` + result[i].id + `" class="div_Team col-4 mt-2 mb-2 p-0" href="{{ url('/`+url_to+`/` + result[i].id + `') }}">
                                        <div class="item-team" style="width: 100%;height: auto;">
                                            <img src="{{ url('/img/group_profile/` + class_team + `/id (` + result[i].id + `).png') }}" style="width: 100%;">
                                        </div>
                                    </a>
                                `;

                                content_groups.insertAdjacentHTML('beforeend', html); // แทรกล่างสุด

                                count_a++ ;
                            }
                        }

                        change_menu_view('1-20');

                    }

                }, 500);

            });
    }

    function change_menu_view(type_get_data) {

        type_get_data = type_get_data.replace("-", "_");

        let menu_view = document.querySelectorAll('[btn="menu_view"]');
        menu_view.forEach(menu_view => {
            menu_view.setAttribute('class', 'btn btn-sort-group mt-1');
        });

        document.querySelector('#btn_view_' + type_get_data).setAttribute('class', 'btn btn-sort-group-active');

        let team_start = type_get_data.split('_')[0];
        let team_end = type_get_data.split('_')[1];

        let div_Team = document.querySelectorAll('.div_Team');
        div_Team.forEach(item => {
            // console.log(item);
            item.classList.add('d-none');
        })

        for (let i = parseInt(team_start); i <= parseInt(team_end); i++) {
            // if (document.querySelector('#Team_' + i)) {
            if (document.querySelector('a[count="a_'+i+'"]')) {
                // document.querySelector('#Team_' + i).classList.remove('d-none');
                document.querySelector('a[count="a_'+i+'"]').classList.remove('d-none');

            }
        }

    }
</script>

@endsection