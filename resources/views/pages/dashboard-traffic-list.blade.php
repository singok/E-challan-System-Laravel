<?php
use Illuminate\Support\Facades\Session;
?>

@extends('layouts.dash')

@section('title')
    <title>Traffic Police Details</title>
@endsection

@section('search')
    <form action="{{ route('admin.traffic-display') }}">
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
                    <h4 class="card-title">Traffic Police Details</h4>
                    <p class="card-description">
                        Here, you can find the list of all available traffic police.
                    </p>
                    <div class="table-responsive">
                        <table class="table table-striped expandable-table dataTable">
                            <thead>
                                <tr>
                                    <th>
                                        User
                                    </th>
                                    <th>
                                        First name
                                    </th>
                                    <th>
                                        Last name
                                    </th>
                                    <th>
                                        Gender
                                    </th>
                                    <th>
                                        Date of birth
                                    </th>
                                    <th>
                                        Email
                                    </th>
                                    <th>
                                        Phone
                                    </th>
                                    <th>
                                        Address 1
                                    </th>
                                    <th>
                                        Address 2
                                    </th>
                                    <th>
                                        State
                                    </th>
                                    <th>
                                        Postcode
                                    </th>
                                    <th>
                                        City
                                    </th>
                                    <th>
                                        Action
                                    </th>
                                </tr>
                            </thead>
@endsection
