@php
  use Illuminate\Support\Facades\Session;
@endphp

@extends('layouts.frontLayout')

@section('title')
    Traffic login
@endsection

@section('content')

<form action="{{ route('checkTraffic') }}" method="POST" class="mb-4 sign-in">
  @if (Session::get('success'))
      <div class="alert alert-success">
          {{ Session::get('success') }}
      </div>
  @elseif(Session::get('failure'))
      <div class="alert alert-danger">
          {{ Session::get('failure') }}
      </div>
  @endif
  @csrf
  <div class="mb-3 mt-4">
    <span id="title-signin">TRAFFIC</span>
    <img src="{{ asset('images/fornt-logo/signin-logo.png') }}" class="signin-logo" alt="logo"/>
  </div>
  <div class="mb-4">
    <label for="formGroupExampleInput" class="form-label">Traffic ID</label>
    <input type="text" class="form-control" id="formGroupExampleInput"
      placeholder="Enter your traffic ID" name="user_id">
  </div>
  <div class="alert-danger">
    @error('user_id')
        {{ $message }}
    @enderror
  </div>
  <div class="mb-4">
    <label for="formGroupExampleInput2" class="form-label">Password</label>
    <input type="password" class="form-control" id="formGroupExampleInput2" placeholder="Enter your password" name="user_password">
  </div>
  <div class="alert-danger">
    @error('user_password')
        {{ $message }}
    @enderror
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