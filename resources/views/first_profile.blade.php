@extends('layouts.theme_login')

@section('content')
<style>
    .user-img{
        width: 83px;
        height: 83px;
    }
    .info-user{
        color: #002449;
        font-weight: lighter;
    }
    .qr-profile{
        width: 180px;
        height: 180px;
        object-fit: contain;
        margin-top: 20px;

    }.qr-section{
        padding: 35px;
        margin-top: 35px;
    }.btn-download{
        background-color: #005CD3;
        padding: 10px 40px;
        width: auto;
        color: #fff;
        border-radius: 5px;
        margin-top: 45px;
        font-size: 12px;
    }
    .qr-card{
	    padding: 1.5rem 3rem 1.8rem 3.5rem!important;
        border-radius: 10px;
    }
</style>
<div class="w-100 qr-section">
    <div class="card qr-card text-center">
        <div class=" d-flex justify-content-center w-100 ">
            @if( !empty(Auth::user()->photo) )
                <img src="{{ url('storage')}}/{{ Auth::user()->photo }}" class="user-img" alt="รูปภาพผู้ใช้">
            @else
                <img src="{{ url('/img/icon/profile.png') }}" class="user-img" alt="รูปภาพผู้ใช้">
            @endif

        </div>
        <p class="info-user mt-3 mb-0">{{ Auth::user()->name }}</p>
        <p class="info-user">{{ Auth::user()->email }}</p>
        <div class="d-flex justify-content-center w-100">
            <img src="{{ url('img/qr_profile')}}/{{ Auth::user()->qr_profile }}" class="qr-profile" alt="รูปภาพ QR Code">
            
        </div>
        <div>
            <a href="{{ url('img/qr_profile')}}/{{ Auth::user()->qr_profile }}" class="btn btn-download" download>
                Download
            </a>
        </div>
    </div>
</div>

<img id="preview" src="{{ url('/') }}" alt="ภาพพรีวิว" style="max-width:100%; height:auto; display:none;">


<a class="btn btn-sm btn-danger" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" style="position: absolute;top: 2%;right: 1%;">
    <i class='bx bx-log-out-circle'></i>
</a>

<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
    @csrf
</form>

@endsection