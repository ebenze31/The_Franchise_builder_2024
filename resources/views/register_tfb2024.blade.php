@extends('layouts.theme_login')

@section('content')

<div class="card border-top border-0 border-4 border-primary">
  <div class="card-body p-5">
    <div class="card-title d-flex align-items-center">
      <div><i class="bx bxs-user me-1 font-22 text-primary"></i>
      </div>
      <h5 class="mb-0 text-primary">User Registration</h5>
    </div>
    <hr>
    <form class="row g-3">
      <div class="col-md-6">
        <label for="inputFirstName" class="form-label">First Name</label>
        <input type="email" class="form-control" id="inputFirstName">
      </div>
      <div class="col-md-6">
        <label for="inputLastName" class="form-label">Last Name</label>
        <input type="password" class="form-control" id="inputLastName">
      </div>
      <div class="col-md-6">
        <label for="inputEmail" class="form-label">Email</label>
        <input type="email" class="form-control" id="inputEmail">
      </div>
      <div class="col-md-6">
        <label for="inputPassword" class="form-label">Password</label>
        <input type="password" class="form-control" id="inputPassword">
      </div>
      <div class="col-12">
        <div class="form-check">
          <input class="form-check-input" type="checkbox" id="gridCheck">
          <label class="form-check-label" for="gridCheck">Check me out</label>
        </div>
      </div>
      <div class="col-12">
        <button type="submit" class="btn btn-primary px-5">Register</button>
      </div>
    </form>
  </div>
</div>


<a class="btn btn-sm btn-danger" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" style="position:fixed;bottom: 2%;">
    <i class='bx bx-log-out-circle'></i>
    <span>Logout</span>
</a>

<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
    @csrf
</form>


@endsection