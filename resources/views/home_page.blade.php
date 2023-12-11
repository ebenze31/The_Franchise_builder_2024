@extends('layouts.theme_user')

@section('content')

<center>
	<h1 class="text-white">สวัสดีครับ</h1>
</center>

<a class="btn btn-sm btn-danger" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" style="position:fixed;bottom: 10%;">
    <i class='bx bx-log-out-circle'></i>
    <span>Logout</span>
</a>

<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
    @csrf
</form>


@endsection