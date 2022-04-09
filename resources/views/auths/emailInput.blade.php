<?php
use Illuminate\Support\Facades\Session;
?>

@extends('layouts.auths')

@push('title')
    Password Reset
@endpush

@push('heading')
    <h3>Forget your password?</h3>
@endpush

@section('contents')
    <h6 class="font-weight-light">Please, provide a valid email.</h6>
    <form class="pt-3" method="POST" action="{{ route('admin.passwordlink') }}">

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
            <input type="email" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="email"
                name="email">
        </div>
        <div class="alert-danger">
            @error('email')
                {{ $message }}
            @enderror
        </div>
        <div class="mt-3">
            <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">Send a Reset
                Link</button>
        </div>
        <div class="my-2 d-flex justify-content-between align-items-center">
            <a href="{{ route('admin.login') }}" class="auth-link text-black">Login</a>
        </div>
    </form>
@endsection
