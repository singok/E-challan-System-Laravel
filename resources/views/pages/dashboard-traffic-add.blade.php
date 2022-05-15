<?php
use Illuminate\Support\Facades\Session;
?>

@extends('layouts.dash')

@section('title')
    <title>Add Traffic Police</title>
@endsection

@section('contents')
    <div class="row">
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    @if (Session::get('success'))
                        <div class="alert alert-success">
                            {{ Session::get('success') }}
                        </div>
                    @elseif(Session::get('failure'))
                        <div class="alert alert-danger">
                            {{ Session::get('failure') }}
                        </div>
                    @endif
                    <h4 class="card-title">Add/register Traffic Police</h4>
                    <h6 class="font-weight-normal mb-2">Please, fill all the details carefully !</h6>
                    <div class="alert alert-warning">
                        NOTE :- Fields with <span style="color:red;">*</span> are mandatory.
                    </div>
                    <form class="form-sample" method="POST" action="{{ route('traffic_police_add') }}"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">First Name <span
                                            style="color:red;">*</span></label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="firstName" />
                                    </div>
                                    <div class="alert-danger">
                                        @error('firstName')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Last Name <span
                                            style="color:red;">*</span></label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="lastName" />
                                    </div>
                                    <div class="alert-danger">
                                        @error('lastName')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Gender <span style="color:red;">*</span></label>
                                    <div class="col-sm-9">
                                        <select class="form-control" name="gender">
                                            <option value="" selected>Select</option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>
                                    </div>
                                    <div class="alert-danger">
                                        @error('gender')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                            </div>

@endsection
