@extends('layouts.theme_login')

@section('content')
<h1>asdf</h1>
<img id="preview" src="{{ url('/') }}" alt="ภาพพรีวิว" style="max-width:100%; height:auto; display:none;">

<a class="btn btn-sm btn-danger" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" style="position: absolute;top: 2%;right: 1%;">
    <i class='bx bx-log-out-circle'></i>
</a>

<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
    @csrf
</form>

@endsection