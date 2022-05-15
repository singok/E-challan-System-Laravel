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

                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Date of Birth <span
                                            style="color:red;">*</span></label>
                                    <div class="col-sm-9">
                                        <input class="form-control" placeholder="dd/mm/yyyy" name="birthDate" />
                                    </div>
                                    <div class="alert-danger">
                                        @error('birthDate')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Email Address <span
                                            style="color:red;">*</span></label>
                                    <div class="col-sm-9">
                                        <input type="email" class="form-control" name="email" />
                                    </div>
                                    <div class="alert-danger">
                                        @error('email')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Phone Number <span
                                            style="color:red;">*</span></label></label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control" name="phone" />
                                    </div>
                                    <div class="alert-danger">
                                        @error('phone')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Address 1 <span
                                            style="color:red;">*</span></label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="addressFirst" />
                                    </div>
                                    <div class="alert-danger">
                                        @error('addressFirst')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">State <span style="color:red;">*</span></label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="state" />
                                    </div>
                                    <div class="alert-danger">
                                        @error('state')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Address 2</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="addressSecond" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Postcode <span
                                            style="color:red;">*</span></label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="postcode" />
                                    </div>
                                    <div class="alert-danger">
                                        @error('postcode')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">City <span style="color:red;">*</span></label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="city" />
                                    </div>
                                    <div class="alert-danger">
                                        @error('city')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                            </div>

                        </div>
                        <p class="card-description">
                            Image
                        </p>
                        <h6 class="font-weight-normal mb-2">Please, provide a passport size image.</h6>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Upload jpg file <span
                                            style="color:red;">*</span></label></label>
                                    <div class="col-sm-9">
                                        <input type="file" class="form-control" name="image" />
                                    </div>
                                    <div class="alert-danger">
                                        @error('image')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p class="card-description">
                            User ID/Password
                        </p>
                        <h6 class="font-weight-normal mb-2">Please, provide User ID and Password for Traffic Police.</h6>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">User ID <span style="color:red;">*</span></label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="user_id" />
                                    </div>
                                    <div class="alert-danger">
                                        @error('user_id')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Password <span
                                            style="color:red;">*</span></label>
                                    <div class="col-sm-9">
                                        <input type="password" class="form-control" name="user_password" />
                                    </div>
                                    <div class="alert-danger">
                                        @error('user_password')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
