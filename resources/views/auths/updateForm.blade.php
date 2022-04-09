<?php
use Illuminate\Support\Facades\Session;
?>

@extends('layouts.auths')

@push('title')
    Setup
@endpush

@push('heading')
    <h3>Setup new password</h3>
@endpush

@section('contents')
    <p class="login-box-msg">{{ session('email') }}</p>
    <form class="pt-3" action="{{ route('admin.setNewPassword') }}" method="post">

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
                name="pass1">
        </div>
        <div class="alert-danger">
            @error('pass1')
                {{ $message }}
            @enderror
        </div>
        <div class="form-group">
            <input type="password" class="form-control form-control-lg" id="exampleInputPassword2" placeholder="Confirm"
                name="pass2">
        </div>
        <div class="alert-danger">
            @error('pass2')
                {{ $message }}
            @enderror
        </div>
        <div class="mt-3">
            <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">Update</button>
        </div>
    </form>
    </div>
@endsection
