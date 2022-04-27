<?php
use Illuminate\Support\Facades\Session;
?>
@extends('layouts.dash')

@section('title')
    <title>Edit District</title>
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
                    <h4 class="card-title">Update District</h4>
                    <p class="card-description">
                        Please, edit district name carefully !<br>
                    </p>
                    <form class="forms-sample" method="POST"
                        action="{{ route('district_name_update', ['id' => $dataDistrict->id]) }}">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputPoint3">District Name : </label>
                            <input type="text" class="form-control" id="exampleInputPoint3" name="district"
                                value="{{ $dataDistrict->district }}">
                            <div class="alert-danger">
                                @error('district')
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
