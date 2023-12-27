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
        right: 20px;

        >img {
            width: 26px;
            height: 26px;
        }
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
        padding: 0;
    }

    .btn-logout {
        color: rgb(244, 244, 244, .7);
        outline: 1px solid rgb(244, 244, 244, .7);
        border-radius: 50px;
        font-size: 12px;
        display: flex;
        align-items: center;

        >i {
            font-size: 15px;
            margin-top: -12px;
        }
    }.textScore{
        color: #FCBF29;
    }.text-rank{
        color: #FCBF29;
        font-size: 30px;
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
    <div class="d-flex justify-content-center align-items-center text-white h6">
       <span class="textPC"> PC :</span> <span class="textScore"> &nbsp;24.4M</span>
    </div>
    <a class="btn btn-logout" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" style="position: absolute;top:10px;right: 20px;">
        <i class='bx bx-log-out-circle'></i> logout
    </a>

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
</div>


<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
    @csrf
</form>
<script>
    document.addEventListener('DOMContentLoaded', (event) => {
        // console.log("START");
        change_menu_bar('profile');
    });
</script>
@endsection