@extends('layouts.frontLayout')

@section('title')
    Traffic login
@endsection

@section('content')

<form action="#" class="mb-4 sign-in">
  <div class="mb-3 mt-4">
    <span id="title-signin">TRAFFIC</span>
    <img src="{{ asset('images/fornt-logo/signin-logo.png') }}" class="signin-logo" alt="logo"/>
  </div>
  <div class="mb-4">
    <label for="formGroupExampleInput" class="form-label">Traffic ID</label>
    <input type="text" class="form-control" id="formGroupExampleInput"
      placeholder="Enter your traffic ID">
  </div>
  <div class="mb-4">
    <label for="formGroupExampleInput2" class="form-label">Password</label>
    <input type="password" class="form-control" id="formGroupExampleInput2" placeholder="Enter your password">
  </div>
  <button type="submit">Login</button>
  <div class="mt-3">
    <a href="{{ route('adminlogin') }}" class="admin-login">Admin Login</a>
  </div>
  <div class="mt-1">
    <a href="{{ route('trafficforget') }}" class="forget-password">Forget Password ?</a>
  </div>
</form>
  
@endsection