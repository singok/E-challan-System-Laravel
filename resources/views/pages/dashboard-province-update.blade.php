<?php
use Illuminate\Support\Facades\Session;
?>
@extends('layouts.dash')

@section('title')
    <title>Edit Province</title>
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
                    <h4 class="card-title">Update Province</h4>
                    <p class="card-description">
                        Please, edit province name carefully !<br>
                    </p>
                    <form class="forms-sample" method="POST"
                        action="{{ route('province_name_update', ['pid' => $dataProvince->pid]) }}">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputPoint3">Province Name : </label>
                            <input type="text" class="form-control" id="exampleInputPoint3" name="province"
                                value="{{ $dataProvince->province }}">
                            <div class="alert-danger">
                                @error('province')
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
