@extends('layouts.theme_user')

@section('content')

<!-- {{$data}} -->
<style>
    .btn-outline-light,
    #header-text-login {
        display: none;
    }

    .profile-header {
        background-color: rgb(255, 255, 255, .25);
        border-radius: 0 0 40px 40px;
        position: relative;
        padding-bottom: 10px;
    }

    .btn-edit-profile {
        position: absolute;
        bottom: 0;
        right: 10px;


    }

    .btn-edit-profile img {
        width: 26px;
        height: 26px;
    }

    .user-new-img {
        margin-top: 20px;
        width: 100px;
        height: 100px;
        border-radius: 50%;
    }

    .edit-profile {
        position: relative;
    }

    .content-section {
        margin: 0;
    }

    .btn-logout {
        color: rgb(244, 244, 244, .7);
        outline: 1px solid rgb(244, 244, 244, .7);
        border-radius: 50px;
        font-size: 12px;
        display: flex;
        align-items: center;
    }

    .btn-logout i {
        font-size: 15px;
        margin-top: -12px;
    }

    .textScore {
        color: #FCBF29;
    }

    .text-rank {
        color: #FCBF29;
        font-size: 30px;
    }

    .header-badges {
        color: #fff;
        margin: 40px 40px;
    }

    .badges-item {
        display: flex;
        justify-content: center;
        margin-bottom: 30px;
    }

    .badges-item img {
        width: 90px;
        height: 90px;
    }.img-show-badges{
        width: 137px;
        height: 137px;
        flex-shrink: 0;
        position: absolute;
        position: absolute;
        top: 0;
        left: 50%;
        transform: translate(-50%, -50%);
    }
    #contentBadges{
        border: #2E2E2E 1px solid;
        background-color: #686666;
    }
    #contentBadges.active{
        border: #00E0FF 1px solid;
        background-color: #07203F;
    }
</style>

<div class="profile-header">
    <div class=" d-flex justify-content-center w-100">
        <div class="edit-profile" id="DivEditProfile">
            @if( !empty(Auth::user()->photo) )
            <img src="{{ url('storage')}}/{{ Auth::user()->photo }}" class="user-new-img" alt="รูปภาพผู้ใช้">
            @else
            <img src="{{ url('/img/icon/profile.png') }}" class="user-new-img" alt="รูปภาพผู้ใช้">
            @endif
            <a href="{{url('/first_profile?type=edit_profile')}}" class="btn-edit-profile">
                <img src="{{ url('/img/icon/edit-profile.png') }}" alt="รูปภาพผู้ใช้">
            </a>
        </div>

    </div>
    <h4 class="text-center mb-0 mt-3 text-white">
        {{Auth::user()->name}}
    </h4>
    <p class="text-center ">
        <small class="mt-3 text-white">id : {{Auth::user()->id}}</small>
    </p>
    <a class="btn btn-logout" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" style="position: absolute;top:10px;right: 20px;">
        <i class='bx bx-log-out-circle'></i> logout
    </a>

    @if(Auth::user()->rank_of_week)
    <div class="d-flex justify-content-center align-items-center text-white h6">
        <span class="textPC"> PC :</span> <span class="textScore"> &nbsp;24.4M</span>
    </div>
    <div class="d-flex justify-content-around">
        <div class="text-center">
            <p class="text-white">Ranking of Individual</p>
            <h4 class="text-rank">as</h4>
        </div>
        <div class="text-center">
            <p class="text-white">Ranking of team</p>
            <h4 class="text-rank">as</h4>
        </div>
    </div>
    @endif


</div>
<h4 class="header-badges">
    My badges
</h4>
<div class="row ">
    <div class="col-4 badges-item active" activity="ป้าย1"  onclick="open_badges(this)">
        <img src="{{ url('/img/icon/badges-1.png') }}" alt="รูปภาพป้ายประกาศ">
        <div class="d-none detail">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa temporibus eum, cupiditate blanditiis voluptates neque. Ut et optio necessitatibus expedita debitis deleniti non nobis, ratione soluta nesciunt ipsum. Omnis molestias molestiae nostrum rem dolorum soluta aspernatur, accusantium praesentium alias ex accusamus eos hic recusandae reiciendis adipisci laboriosam neque? Possimus, corrupti!
        </div>
    </div>
    <div class="col-4 badges-item active" activity="ป้าย2" onclick="open_badges(this)">
        <img src="{{ url('/img/icon/badges-2.png') }}" alt="รูปภาพป้ายประกาศ">
        <div class="d-none detail">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa temporibus eum, cupiditate blanditiis voluptates neque. Ut et optio necessitatibus expedita debitis deleniti non nobis, ratione soluta nesciunt ipsum. Omnis molestias molestiae nostrum rem dolorum soluta aspernatur, accusantium praesentium alias ex accusamus eos hic recusandae reiciendis adipisci laboriosam neque? Possimus, corrupti!
        </div>
    </div>
    <div class="col-4 badges-item " activity="ป้าย3" onclick="open_badges(this)">
        <img src="{{ url('/img/icon/badges-3.png') }}" alt="รูปภาพป้ายประกาศ">
        <div class="d-none detail">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa temporibus eum, cupiditate blanditiis voluptates neque. Ut et optio necessitatibus expedita debitis deleniti non nobis, ratione soluta nesciunt ipsum. Omnis molestias molestiae nostrum rem dolorum soluta aspernatur, accusantium praesentium alias ex accusamus eos hic recusandae reiciendis adipisci laboriosam neque? Possimus, corrupti!
        </div>
    </div>
    <div class="col-4 badges-item " activity="ป้าย4" onclick="open_badges(this)">
        <img src="{{ url('/img/icon/badges-3.png') }}" alt="รูปภาพป้ายประกาศ">
        <div class="d-none detail">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa temporibus eum, cupiditate blanditiis voluptates neque. Ut et optio necessitatibus expedita debitis deleniti non nobis, ratione soluta nesciunt ipsum. Omnis molestias molestiae nostrum rem dolorum soluta aspernatur, accusantium praesentium alias ex accusamus eos hic recusandae reiciendis adipisci laboriosam neque? Possimus, corrupti!
        </div>
    </div>
    <div class="col-4 badges-item " activity="ป้าย5" onclick="open_badges(this)">
        <img src="{{ url('/img/icon/badges-3.png') }}" alt="รูปภาพป้ายประกาศ">
        <div class="d-none detail">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa temporibus eum, cupiditate blanditiis voluptates neque. Ut et optio necessitatibus expedita debitis deleniti non nobis, ratione soluta nesciunt ipsum. Omnis molestias molestiae nostrum rem dolorum soluta aspernatur, accusantium praesentium alias ex accusamus eos hic recusandae reiciendis adipisci laboriosam neque? Possimus, corrupti!
        </div>
    </div>
    <div class="col-4 badges-item " activity="ป้าย6" onclick="open_badges(this)">
        <img src="{{ url('/img/icon/badges-3.png') }}" alt="รูปภาพป้ายประกาศ">
        <div class="d-none detail">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa temporibus eum, cupiditate blanditiis voluptates neque. Ut et optio necessitatibus expedita debitis deleniti non nobis, ratione soluta nesciunt ipsum. Omnis molestias molestiae nostrum rem dolorum soluta aspernatur, accusantium praesentium alias ex accusamus eos hic recusandae reiciendis adipisci laboriosam neque? Possimus, corrupti!
        </div>
    </div>
    <div class="col-4 badges-item " activity="ป้าย7" onclick="open_badges(this)">
        <img src="{{ url('/img/icon/badges-3.png') }}" alt="รูปภาพป้ายประกาศ">
        <div class="d-none detail">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa temporibus eum, cupiditate blanditiis voluptates neque. Ut et optio necessitatibus expedita debitis deleniti non nobis, ratione soluta nesciunt ipsum. Omnis molestias molestiae nostrum rem dolorum soluta aspernatur, accusantium praesentium alias ex accusamus eos hic recusandae reiciendis adipisci laboriosam neque? Possimus, corrupti!
        </div>
    </div>
    <div class="col-4 badges-item " activity="ป้าย8" onclick="open_badges(this)">
        <img src="{{ url('/img/icon/badges-3.png') }}" alt="รูปภาพป้ายประกาศ">
        <div class="d-none detail">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa temporibus eum, cupiditate blanditiis voluptates neque. Ut et optio necessitatibus expedita debitis deleniti non nobis, ratione soluta nesciunt ipsum. Omnis molestias molestiae nostrum rem dolorum soluta aspernatur, accusantium praesentium alias ex accusamus eos hic recusandae reiciendis adipisci laboriosam neque? Possimus, corrupti!
        </div>
    </div>
    <div class="col-4 badges-item " activity="ป้าย9" onclick="open_badges(this)">
        <img src="{{ url('/img/icon/badges-3.png') }}" alt="รูปภาพป้ายประกาศ">
        <div class="d-none detail">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa temporibus eum, cupiditate blanditiis voluptates neque. Ut et optio necessitatibus expedita debitis deleniti non nobis, ratione soluta nesciunt ipsum. Omnis molestias molestiae nostrum rem dolorum soluta aspernatur, accusantium praesentium alias ex accusamus eos hic recusandae reiciendis adipisci laboriosam neque? Possimus, corrupti!
        </div>
    </div>
    
</div>

<!-- Modal -->
<div class="modal fade" id="modalBadges" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content mx-5" id="contentBadges">
            <div class="modal-body p-4">
                <img id="imgContentBadges" class="img-show-badges mb-3" src="{{ url('/img/icon/badges-1.png') }}" alt="">
                <h5 class="text-center text-white mt-5" id="badgesName">asd</h5>
                <p class="text-white" id="detailBadges"></p>
            </div>
        </div>
    </div>
</div>

<button type="button" id="btnmodalBadges" class="btn btn-primary d-none" data-toggle="modal" data-target="#modalBadges">
  Launch demo modal
</button>
<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
    @csrf
</form>
<script>
    document.addEventListener('DOMContentLoaded', (event) => {
        // console.log("START");
        change_menu_bar('profile');
    });

    function open_badges(data_badges) {
        document.querySelector('#btnmodalBadges').click();
        // เช็คว่าป้ายประกาศมีคลาส "active" หรือไม่
        if (data_badges.classList.contains('active')) {

            document.querySelector('#contentBadges').classList.add('active');
            // ดึงรูปภาพที่อยู่ในป้ายประกาศ
            let imgElement = data_badges.querySelector('img');

            let badgesDetail = data_badges.querySelector('.detail').textContent;
            let badgesName = data_badges.getAttribute('activity');
            // ดึง URL ของรูปภาพ
            let imgUrl = imgElement.getAttribute('src');

            document.querySelector('#imgContentBadges').src = imgUrl;
            document.querySelector('#badgesName').innerHTML  = badgesName;
            document.querySelector('#detailBadges').innerHTML  = badgesDetail;
        } else {
            document.querySelector('#contentBadges').classList.remove('active');

            let imgElement = data_badges.querySelector('img');

            let badgesDetail = data_badges.querySelector('.detail').textContent;
            let badgesName = data_badges.getAttribute('activity');
            // ดึง URL ของรูปภาพ
            let imgUrl = imgElement.getAttribute('src');

            document.querySelector('#imgContentBadges').src = imgUrl;
            document.querySelector('#badgesName').innerHTML  = badgesName;
            document.querySelector('#detailBadges').innerHTML  = badgesDetail;
        }

    }
</script>
@endsection