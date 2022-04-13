@extends('layouts.frontLayout')

@section('title')
    Forget Password
@endsection

@section('content')

<form action="#" class="mb-4 sign-in">
    <div class="mb-3 mt-4">
      <span id="title-signin">ADMIN</span>
      <img src="{{ asset('images/fornt-logo/signin-logo.png') }}" class="signin-logo" alt="logo"/>
    </div>
    <div class="mb-4">
      <label for="formGroupExampleInput" class="form-label">Please provide a valid email address where you will receive an email with a link.</label>
      <input type="text" class="form-control" id="formGroupExampleInput"
        placeholder="Email Address">
    </div>
    <button type="submit">Send a Reset Link</button>
    <div class="mt-3">
      <a href="{{ route('adminlogin') }}" class="admin-login">Admin Login</a>
    </div>
  </form>

@endsection