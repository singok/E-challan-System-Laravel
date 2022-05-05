@php
  use Illuminate\Support\Facades\Session;
@endphp


@extends('layouts.frontLayout')

@section('title')
  Traffic Forget
@endsection

@section('content')

<form action="{{ route('traffic.passwordlink') }}" method="POST" class="mb-4 sign-in">
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
    <label for="formGroupExampleInput" class="form-label">Please provide a valid email address where you will receive an email with a link.</label>
    <input type="text" class="form-control" id="formGroupExampleInput" name="email" placeholder="Email Address">
  </div>
  <div class="alert-danger">
    @error('email')
        {{ $message }}
    @enderror
  </div>
  <button type="submit">Send a Reset Link</button>
  <div class="mt-3">
    <a href="{{ route('trafficlogin') }}" class="admin-login">Traffic Login</a>
  </div>
</form>

@endsection