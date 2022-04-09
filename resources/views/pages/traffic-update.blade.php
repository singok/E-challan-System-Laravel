<?php
use Illuminate\Support\Facades\Session;
?>

@extends('layouts.dash')

@push('title')
    <title>Edit Traffic Police</title>
@endpush

@section('contents')
    <div class="row">
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    @if (Session::get('success'))
                        <div class="alert alert-success">
                            {{ Session::get('success') }}
                        </div>
                    @elseif (Session::get('failure'))
                        <div class="alert alert-failure">
                            {{ Session::get('failure') }}
                        </div>
                    @endif
                    <h4 class="card-title">Update Traffic Police details</h4>
                    <h6 class="font-weight-normal mb-2">Please, fill all the details carefully !</h6>
                    <div class="alert alert-warning">
                        NOTE :- Fields with <span style="color:red;">*</span> are mandatory.
                    </div>
                    <form class="form-sample" method="POST"
                        action="{{ route('traffic_update', ['id' => $dataInfo->id]) }}">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">First Name <span
                                            style="color:red;">*</span></label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="firstName"
                                            value="{{ $dataInfo->firstname }}" />
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
                                        <input type="text" class="form-control" name="lastName"
                                            value="{{ $dataInfo->lastname }}" />
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
                                        <select class="form-control" name="gender" value="{{ $dataInfo->gender }}">
                                            <option>Male</option>
                                            <option>Female</option>
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
                                        <input class="form-control" placeholder="dd/mm/yyyy" name="birthDate"
                                            value="{{ $dataInfo->dob }}" />
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
                                        <input type="email" class="form-control" name="email"
                                            value="{{ $dataInfo->email }}" />
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
                                        <input type="text" class="form-control" name="phone"
                                            value="{{ $dataInfo->phone }}" />
                                    </div>
                                    <div class="alert-danger">
                                        @error('phoneNumber')
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
                                        <input type="text" class="form-control" name="addressFirst"
                                            value="{{ $dataInfo->address1 }}" />
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
                                        <input type="text" class="form-control" name="state"
                                            value="{{ $dataInfo->state }}" />
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
                                        <input type="text" class="form-control" name="addressSecond"
                                            value="{{ $dataInfo->address2 }}" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Postcode <span
                                            style="color:red;">*</span></label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="postcode"
                                            value="{{ $dataInfo->postcode }}" />
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
                                        <input type="text" class="form-control" name="city"
                                            value="{{ $dataInfo->city }}" />
                                    </div>
                                    <div class="alert-danger">
                                        @error('city')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                            </div>

                        </div>
                        <button type="submit" class="btn btn-primary mr-2">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
