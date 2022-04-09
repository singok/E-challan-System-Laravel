<?php

use Illuminate\Support\Facades\Session;

?>

@extends('layouts.auths')

@push('title')
    Admin Login
@endpush

@push('heading')
    <h3>Admin Login</h3>
@endpush


@section('contents')
    <h4>Hello! let's get started</h4>
    <h6 class="font-weight-light">Sign in to continue.</h6>
    <form class="pt-3" method="POST" action="{{ route('admin.check') }}">

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

        <div class="form-group">
            <input type="email" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Username"
                name="email">
        </div>
        <div class="alert-danger">
            @error('email')
                {{ $message }}
            @enderror
        </div>
        <div class="form-group">
            <input type="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password"
                name="password">
        </div>
        <div class="alert-danger">
            @error('password')
                {{ $message }}
            @enderror
        </div>
        <div class="mt-3">
            <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">SIGN
                IN</button>
        </div>
        <div class="my-2 d-flex justify-content-between align-items-center">
            <a href="{{ route('admin.forgetpassword') }}" class="auth-link text-black">Forgot
                password?</a>
        </div>
    </form>
@endsection
