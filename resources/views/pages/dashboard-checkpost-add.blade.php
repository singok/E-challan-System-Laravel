<?php
use Illuminate\Support\Facades\Session;
?>
@extends('layouts.dash')

@section('title')
    <title>Add Checkpost</title>
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
                    <h4 class="card-title">Add Checkpost Details</h4>
                    <form class="forms-sample" method="POST" action="{{ route('admin.checkpost-add') }}">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputPost">Checkpost Name</label>
                            <input type="text" class="form-control" id="exampleInputPost" name="checkpost">
                            <div class="alert-danger">
                                @error('checkpost')
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