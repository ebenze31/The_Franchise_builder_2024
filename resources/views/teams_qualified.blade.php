@extends('layouts.theme_user')

@section('content')
<style>
    #header-text-login{
        width: 140px;
        margin-top: 10px;
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
        /* border: 1px solid #00E0FF; */

    }
    .item-team div{
        border: 2px solid #00E0FF;
        border-radius: 5px !important;
        -webkit-border-radius: 5px; 
    -moz-border-radius: 5px;
    }
    .item-team div img{
        /* border: 1px solid #00E0FF; */
        border-radius: 5px !important;
        -webkit-border-radius: 5px; 
    -moz-border-radius: 5px;
    }

    #content_groups{
        display: flex;
        justify-content: space-around;
    }
    .not_qualified{
        filter: grayscale(100%);
    }.text-header-team{
        color: #FFF;
        text-shadow: 0px 0.5px 0px #827EAC;
        font-size: 20px;
        margin-top: 20px;
    }.btn-submit{
      border-radius: 5px;
      font-size: 16px;
      background-color: #005CD3;
      color: #fff;
    }
    .btn-submit:hover{
      border: 1px solid #00E0FF;
      box-shadow: 0px 0px 15px 1px #00FBFF;
      color: #fff;

    }
    
    .padding-btn{
        padding: 8px 30px !important;
    }.modal-footer{
        border: none;
    }.team-section{
        position: relative;
    }
    .img_team_qualified{
        width: 100px;
        height: 100px;
        border-radius: 50%!important;
        -webkit-border-radius: 50%;
         -moz-border-radius: 50%;
         margin-top: -50px;
         box-shadow: 1px 10px 11px -5px rgba(0,0,0,0.66);
-webkit-box-shadow: 1px 10px 11px -5px rgba(0,0,0,0.66);
-moz-box-shadow: 1px 10px 11px -5px rgba(0,0,0,0.66);
margin-bottom: 20px;
    }.text_team_qualified{
        color: #005CD3;
text-align: center;
font-size: 15px;
font-style: normal;
font-weight: 600;
    }.text_warn_team_qualified{
        color: #FF4A4A;
text-align: center;
font-size: 14px;
font-style: normal;
font-weight: 400;
line-height: normal;
    }#navbar-botttom{
/*        display: none;*/
    }

    .btn-logout {
        color: rgb(244, 244, 244, .7);
        border: 1px solid rgb(244, 244, 244, .7);
        -webkit-border-radius: 50px;    
        border-radius: 50px; 
        -moz-border-radius:50px;
        -khtml-border-radius:50px;
        font-size: 12px;
        display: flex;
        align-items: center;
    }

    .btn-logout i {
        font-size: 15px;
        margin-top: -12px;
    }
</style>

@php
    
    $activeGroupsCount = App\Models\Group::where('active', 'Yes')->where('status' , 'ยืนยันเรียบร้อย')->count();
    $menu_row = ceil($activeGroupsCount / 20) ;
    $start = 1 ;
    $end = 20 ;

@endphp

<div class="nav-menu" id="div_menu_view">
    <div class="btn-group owl-carousel carousel_all_team owl-theme" role="group" aria-label="First group">
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

@php
    $data_user = Auth::user() ;
    $My_group_id = $data_user->group_id ;
    $MyGroup = App\Models\Group::where('id', $My_group_id)->first();
@endphp

@if(!empty($My_group_id))
<div class="container">
    <p class="text-header-team">
        My team
    </p>
</div>

<div class="container-fluid">
    <div class="">
        <div class="row">

            @if($MyGroup->status == "ยืนยันเรียบร้อย")
                <div class="col-4 mt-0 mb-2 p-0" >
                    <div class="item-team" style="width: 100%;height: auto;">
                        <div>
                            <img src="{{ url('/img/group_profile') . '/success/id ('.$MyGroup->id.').png' }}" style="width: 100%;">
                        </div>
                    </div>
                </div>
            @else
                <div class="col-4 mt-0 mb-2 p-0" >
                    <div class="item-team" style="width: 100%;height: auto;">
                        <div>
                            <img class="not_qualified" src="{{ url('/img/group_profile') . '/success/id ('.$MyGroup->id.').png' }}" style="width: 100%;">
                        </div>
                    </div>
                </div>
            @endif

            
        </div>
    </div>
</div>
@endif

<div class="container">
    <p class="text-header-team">
        All team
    </p>
</div>

<div class="container-fluid">
    <div class="">
        <div id="content_groups" class="row">
            <!-- data -->
        </div>
    </div>
</div>

<br>
<br>
<!-- <div class="d-flex justify-content-center w-100">
    <a class="btn btn-logout" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
        <img src="{{ url('/img/icon/Logo-logout.png') }}" alt="" width="15" height="15"> <span class="mx-2 my-1">logout</span>
    </a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>
</div>
<br><br> -->

<button id="btn_team_qualified"  class="d-none" data-toggle="modal" data-target="#modal_team_qualified"></button>

<div class="modal fade" id="modal_team_qualified" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered px-3">
        <div class="modal-content" style="  border-radius: 10px!important;-webkit-border-radius: 10px;-moz-border-radius: 10px;">
            <div class="team-section text-center">
                <img src="{{ url('/img/icon/stars.png') }}" style="width:100%">
            </div>
            <div  class="modal-body text-center py-0">
                <!-- content -->
                <p class="text_team_qualified">ขอแสดงความยินดีกับทีมที่ได้ไปต่อ (บ้านสีเขียว)
                    รวมพลพร้อมกัน 24 ม.ค. เวลา 13.00 น. <br>
                    โรงละครสยามพิฆเนศ <br>
                    ชั้น 8 Siam Square One
                </p>

                <p class="text_warn_team_qualified mt-2">*Dress Code  เสื้อ Franchise Builder 2024*</p>
            </div>
            <div  class="modal-footer d-flex justify-content-center">
                <!-- BTN -->
                <button  type="button" class="btn btn-submit padding-btn"  data-dismiss="modal">
                    Close
                </button>
            </div>
        </div>
    </div>
</div>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.js'></script>


<script>
    $(document).ready(function() {
        const owl = $('.carousel_all_team')
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

<script>
    document.addEventListener('DOMContentLoaded', (event) => {
        // console.log("START");
        document.querySelector('#btn_team_qualified').click();
        get_data_groups('Completed');
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

                        let count_a = 1 ;

                        for (let i = 0; i < result.length; i++) {

                            let html = `
                                <div count="a_`+count_a+`" class="div_Team col-4 mt-2 mb-2 p-0" >
                                    <div class="item-team" style="width: 100%;height: auto;">
                                        <img src="{{ url('/img/group_profile') . '/success/id (`+result[i].id+`).png' }}" style="width: 100%;border:#00E0FF 1px solid;  border-radius: 5px!important;-webkit-border-radius: 5px; -moz-border-radius: 5px;">
                                    </div>
                                </div>
                            `;

                            content_groups.insertAdjacentHTML('beforeend', html); // แทรกล่างสุด

                            count_a++ ;
                        }

                        change_menu_view('1-20');

                    }

                }, 500);

            });
    }

    function change_menu_view(type_get_data) {

        // console.log("change_menu_view");
        // console.log(type_get_data);

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
            if (document.querySelector('div[count="a_'+i+'"]')) {
                // document.querySelector('#Team_' + i).classList.remove('d-none');
                document.querySelector('div[count="a_'+i+'"]').classList.remove('d-none');

            }
        }

    }
</script>
@endsection