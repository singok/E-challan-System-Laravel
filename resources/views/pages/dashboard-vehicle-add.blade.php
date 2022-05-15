<?php
use Illuminate\Support\Facades\Session;
?>
@extends('layouts.dash')

@section('title')
    <title>Add Vehicle Category</title>
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
                    <h4 class="card-title">Add Vehicle Category with details</h4>
                    <p class="card-description">
                    <div class="alert alert-warning">
                        NOTE :- All fields are mandatory.
                    </div>
                    </p>
                    <form class="forms-sample" method="POST" action="{{ route('admin.vehicle-register') }}">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputCategory">Category</label>
                            <input type="text" class="form-control" id="exampleInputCategory" name="category">
                            <div class="alert-danger">
                                @error('category')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputDetails">Category Details</label>
                            <textarea class="form-control" id="exampleInputDetails" rows="4" name="categoryDetails"></textarea>
                            <div class="alert-danger">
                                @error('categoryDetails')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
