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
                    <div class="table-responsive">
                        <table class="display table-striped expandable-table dataTable" style="width: 100%;" role="grid">
                            <thead>
                                <tr>
                                    <th>
                                        Category
                                    </th>
                                    <th>
                                        Category Details
                                    </th>
                                    <th colspan="2">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- list all vehicle data -->
                                @foreach ($dataVehicle as $info)
                                    <tr>
                                        <td>
                                            {{ $info->category }}
                                        </td>
                                        <td>
                                            {{ $info->details }}
                                        </td>
                                        <td>
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <a href="{{ route('admin.vehicle-detail-update', ['id' => $info->cid]) }}"><button
                                                        type="button"
                                                        class="btn btn-dark btn-rounded btn-fw">Edit</button></a>
                                                <a href="{{ route('admin.vehicle-delete-permanently', ['id' => $info->cid]) }}"><button
                                                        type="button"
                                                        class="btn btn-danger btn-rounded btn-fw">Delete</button></a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{ $dataVehicle->links() }}
                </div>

            </div>
        </div>
    </div>
@endsection
