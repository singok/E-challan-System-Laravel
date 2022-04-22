<?php
use Illuminate\Support\Facades\Session;
?>

@extends('layouts.dash')

@section('title')
    <title>Challans</title>
@endsection

@section('search')
    <form action="{{ route('admin.challan-show') }}">
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
                    <h4 class="card-title">Listed Challans</h4>
                    <p class="card-description">
                        Here, you can find all the available challans.
                    </p>
                    <div class="table-responsive">
                        <table class="display table-striped expandable-table dataTable" style="width: 100%;" role="grid">
                            <thead>
                                <tr>
                                    <th>
                                        Driving License No.
                                    </th>
                                    <th>
                                        Full Name
                                    </th>
                                    <th>
                                        Address
                                    </th>
                                    <th>
                                        Province
                                    </th>
                                    <th>
                                        Phone
                                    </th>
                                    <th>
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- list all challans -->
                                @foreach ($dataInfo as $info)
                                    <tr>
                                        <td>
                                            {{ $info->driving_license }}
                                        </td>
                                        <td>
                                            {{ $info->fname." ".$info->mname." ".$info->lname }}
                                        </td>
                                        <td>
                                            {{ $info->address }}
                                        </td>
                                        <td>
                                            {{ $info->province }}
                                        </td>
                                        <td>
                                            {{ $info->phone }}
                                        </td>
                                        <td>
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <a href="#"><button
                                                        type="button"
                                                        class="btn btn-primary btn-rounded btn-fw">Show more</button></a>
                                                <a href="{{ route('admin.challan-delete', ['license' => $info->driving_license]) }}"><button
                                                        type="button" class="btn btn-danger btn-rounded btn-fw">Delete</button></a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{ $dataInfo->links() }}
                </div>

            </div>
        </div>
    </div>
@endsection
