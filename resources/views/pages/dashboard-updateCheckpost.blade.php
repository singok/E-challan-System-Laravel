<?php
use Illuminate\Support\Facades\Session;
?>
@extends('layouts.dash')

@section('title')
    <title>Edit Checkpost Details</title>
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
                    <h4 class="card-title">Update Checkpost Details</h4>
                    <form class="forms-sample" method="POST"
                        action="{{ route('checkpost_details_update', ['id' => $dataInfo->id]) }}">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputCheckpost">Category</label>
                            <input type="text" class="form-control" id="exampleInputCheckpost" name="checkpost"
                                value="{{ $dataInfo->checkpost }}">
                            <div class="alert-danger">
                                @error('checkpost')
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
