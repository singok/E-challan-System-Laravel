<?php
use Illuminate\Support\Facades\Session;
?>
@extends('layouts.dash')

@section('title')
    <title>Edit Vehicle Details</title>
@endsection

@section('contents')
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
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
                    <h4 class="card-title">Update Vehicle Details</h4>
                    <p class="card-description">
                        Please, edit vehicle details carefully !<br>
                    <div class="alert alert-warning">
                        NOTE :- All fields are mandatory.
                    </div>
                    </p>
                    <form class="forms-sample" method="POST"
                        action="{{ route('vehicle_details_update', ['id' => $dataVehicle->cid]) }}">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputRule1">Category</label>
                            <input type="text" class="form-control" id="exampleInputRule1" name="category"
                                value="{{ $dataVehicle->category }}">
                            <div class="alert-danger">
                                @error('category')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPoint3">Category Details</label>
                            <input type="text" class="form-control" id="exampleInputPoint3" name="details"
                                value="{{ $dataVehicle->details }}">
                            <div class="alert-danger">
                                @error('details')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mr-2">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
