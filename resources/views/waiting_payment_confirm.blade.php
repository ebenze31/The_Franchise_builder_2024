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
    }.qr-section{
        padding: 35px;
        margin-top: 40px;
    }
</style>
<div class="w-100 qr-section">
    <div class="card p-5 text-center">
        <div class=" d-flex justify-content-center w-100 ">
            @if( !empty(Auth::user()->photo) )
                <img src="{{ url('storage')}}/{{ Auth::user()->photo }}" class="user-img" alt="รูปภาพผู้ใช้">
            @else
                <img src="{{ url('/img/icon/profile.png') }}" class="user-img" alt="รูปภาพผู้ใช้">
            @endif

        </div>
        <p class="info-user mt-3 mb-0">{{ Auth::user()->name }}</p>
        <p class="info-user">{{ Auth::user()->email }}</p>

        <img src="{{ url('storage')}}/{{ Auth::user()->qr_profile }}" class="qr-profile" alt="รูปภาพ QR Code">
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