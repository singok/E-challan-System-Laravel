<?php
use Illuminate\Support\Facades\Session;
?>

@extends('layouts.dash')

@section('title')
    <title>Category Details</title>
@endsection

@section('search')
    <form action="{{ route('admin.vehicle-list') }}">
        @csrf
        <input type="search" name="search" class="form-control" id="navbar-search-input" placeholder="Search now" aria-label="search"
            aria-describedby="search">
    </form>
@endsection

@section('contents')
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    @if (Session::get('success'))
                        <div class="alert alert-success">
                            {{ Session::get('success') }}
                        </div>
                    @elseif (Session::get('failure'))
                        <div class="alert alert-danger">
                            {{ Session::get('failure') }}
                        </div>
                    @endif
                    <h4 class="card-title">Traffic Rules Details</h4>
                    <p class="card-description">
                        Here, you can find the list of all available vehicle categories.
                    </p>
                    
@endsection
