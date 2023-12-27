@extends('layouts.theme_user')

@section('content')

<!-- {{$data}} -->
<style>
    .btn-outline-light,#header-text-login{
        display: none;
    }.profile-header{
        background-color: rgb(255, 255, 255,.25);
        border-radius: 0 0 40px 40px;
    }.btn-edit-profile {
    position: absolute;
    bottom: 0;
    right: 20px;
    width: 47px;
    height: 47px;
  }.user-new-img {
    margin-top: 20px;
    width: 100px;
    height: 100px;
    border-radius: 50%;
  } .edit-profile {
    position: relative;
  }.content-section{
    padding: 0;
  }.btn-logout{
    color:rgb(244, 244, 244 ,.7);
    outline: 1px solid rgb(244, 244, 244 ,.7);
    border-radius: 50px;
    font-size: 12px;
    display: flex;
    align-items: center;
    >i{
    font-size: 15px;    
        margin-top: -12px;
    }
  }
</style>

<div class="profile-header">
<div class=" d-flex justify-content-center w-100">
      <div class="edit-profile" id="DivEditProfile">
        <img src="{{ url('/img/icon/profile.png') }}" class="user-new-img" alt="รูปภาพผู้ใช้">
        <label for="photo" class="btn-edit-profile">
          <img src="{{ url('/img/icon/edit-profile.png') }}" alt="รูปภาพผู้ใช้">
        </label>
      </div>
      <img id="preview" src="{{ url('/') }}" alt="ภาพพรีวิว" class="d-none" style="max-width:100%; height:auto;">
    
    </div> 
</div>
<a class="btn btn-logout" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" style="position: absolute;top: 2%;right: 1%;">
    <i class='bx bx-log-out-circle'></i> logout
</a>

<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
    @csrf
</form>

@endsection