
@php
use Illuminate\Support\Facades\Session;
@endphp

@extends('layouts.auths')

@section('title')
Setup
@endsection

@section('content')

<form method="POST" class="mb-4 sign-in" action="{{ route('admin.setNewPassword') }}">

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
  <span id="title-signin">Update</span>
  <img src="{{ asset('images/fornt-logo/signin-logo.png') }}" class="signin-logo" alt="logo"/>
</div>
<div class="mb-1">
    <p class="heading">{{ session('email') }}</p>
  </div>
<div class="mb-4">
  <label for="formGroupExampleInput" class="form-label">Password</label>
  <input type="password" class="form-control" id="formGroupExampleInput"
    placeholder="Enter new password" name="pass1">
</div>
<div class="alert-danger">
  @error('pass1')
      {{ $message }}
  @enderror
</div>
<div class="mb-4">
  <label for="formGroupExampleInput2" class="form-label">Confirm</label>
  <input type="password" class="form-control" id="formGroupExampleInput2" placeholder="Re-enter your password" name="pass2">
</div>
<div class="alert-danger">
  @error('pass2')
      {{ $message }}
  @enderror
</div>
<button type="submit">Submit</button>
</form>

@endsection
