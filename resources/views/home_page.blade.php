@extends('layouts.theme_user')

@section('content')

<center>
    <h1 class="text-white">สวัสดีครับ</h1>
    <h1 class="text-white">สวัสดีครับ</h1>
    <h1 class="text-white">สวัสดีครับ</h1>
    <h1 class="text-white">สวัสดีครับ</h1>
    <h1 class="text-white">สวัสดีครับ</h1>
    <h1 class="text-white">สวัสดีครับ</h1>
    <h1 class="text-white">สวัสดีครับ</h1>
    <h1 class="text-white">สวัสดีครับ</h1>
    <h1 class="text-white">สวัสดีครับ</h1>
    <h1 class="text-white">สวัสดีครับ</h1>
    <h1 class="text-white">สวัสดีครับ</h1>
    <h1 class="text-white">สวัสดีครับ</h1>
    <h1 class="text-white">สวัสดีครับ</h1>
    <h1 class="text-white">สวัสดีครับ</h1>
    <h1 class="text-white">สวัสดีครับ</h1>
    <h1 class="text-white">สวัสดีครับ</h1>
    <h1 class="text-white">สวัสดีครับ</h1>
    <h1 class="text-white">สวัสดีครับ</h1>
    <h1 class="text-white">สวัสดีครับ</h1>
    <h1 class="text-white">สวัสดีครับ</h1>
    <h1 class="text-white">สวัสดีครับ</h1>
    <h1 class="text-white">สวัสดีครับ</h1>
    <h1 class="text-white">สวัสดีครับ</h1>
    <h1 class="text-white">สวัสดีครับ</h1>
    <h1 class="text-white">สวัสดีครับ</h1>
</center>

<a class="btn btn-sm btn-danger" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" style="position: absolute;top: 2%;right: 1%;">
    <i class='bx bx-log-out-circle'></i>
</a>

<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
    @csrf
</form>


@endsection