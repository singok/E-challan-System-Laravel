<?php
use Illuminate\Support\Facades\Session;
?>

@extends('layouts.dash')

@push('title')
    <title>Setting</title>
@endpush

@section('contents')
    <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
            <div class="col-lg-6 mx-auto">
                <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                    @if (Session::get('success'))
                        <div class="alert alert-success">
                            {{ Session::get('success') }}
                        </div>
                    @elseif (Session::get('failure'))
                        <div class="alert alert-danger">
                            {{ Session::get('failure') }}
                        </div>
                    @endif
                    <h4>Setting</h4>
                    <h6 class="font-weight-light">Edit your details here.</h6>
                    <form class="pt-3" method="POST" action="{{ route('admin.setting-update') }}">
                        @csrf
                        <div class="form-group">
                            <input type="text" class="form-control form-control-lg" id="exampleInputUsername1"
                                placeholder="Fullname" name="adminName" value="{{ $dataInfo->fullname }}">
                        </div>
                        <div class="alert-danger">
                            @error('adminName')
                                {{ $message }}
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control form-control-lg" id="exampleInputEmail1"
                                placeholder="Email" name="adminEmail" value="{{ $dataInfo->email }}">
                        </div>
                        <div class="alert-danger">
                            @error('adminEmail')
                                {{ $message }}
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control form-control-lg" id="exampleInputPassword1"
                                placeholder="New Password" name="password1">
                        </div>
                        <div class="alert-danger">
                            @error('password1')
                                {{ $message }}
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control form-control-lg" id="exampleInputPassword2"
                                placeholder="Confirm" name="password2">
                        </div>
                        <div class="alert-danger">
                            @error('password2')
                                {{ $message }}
                            @enderror
                        </div>
                        <div class="mt-3">
                            <button type="submit"
                                class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
