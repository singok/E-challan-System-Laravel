<?php
use Illuminate\Support\Facades\Session;
?>

@extends('layouts.dash')

@section('title')
    <title>Province & district</title>
@endsection

@section('search')
    <form action="{{ route('admin.province-display') }}">
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
                        <div class="alert alert-failure">
                            {{ Session::get('failure') }}
                        </div>
                    @endif
                    <h4 class="card-title">Province and District Details</h4>
                    <p class="card-description">
                        Here, you can either edit or permanently delete records.
                    </p>
                    <h3 class="card-title">Province</h3>
                    <div class="table-responsive">
                        <table class="table table-striped expandable-table dataTable">
                            <thead>
                                <tr>
                                    <th>
                                        Province Name
                                    </th>
                                    <th colspan="2">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- list all province  -->
                                @foreach ($dataProvince as $val)
                                    <tr>
                                        <td>
                                            {{ $val->province }}
                                        </td>
                                        <td>
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <a href="{{ route('admin.province-edit', ['id' => $val->pid]) }}"><button
                                                        type="button"
                                                        class="btn btn-dark btn-rounded btn-fw">Edit</button></a>
                                                <a
                                                    href="{{ route('admin.province-delete-permanent', ['id' => $val->pid]) }}"><button
                                                        type="button"
                                                        class="btn btn-danger btn-rounded btn-fw">Delete</button></a>
                                            </div>
                                        
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{ $dataProvince->links() }}
                    <hr>
                    <h3 class="card-title">District</h3>
                    <div class="table-responsive">
                        <table class="display table-striped expandable-table dataTable" style="width: 100%;" role="grid">
                            <thead>
                                <tr>
                                    <th>
                                        District Name
                                    </th>
                                    <th colspan="2">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- list all district -->
                                @foreach ($dataDistrict as $info)
                                    <tr>
                                        <td>
                                            {{ $info->district }}
                                        </td>
                                        <td>
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <a
                                                    href="{{ route('admin.district-update', ['id' => $info->id]) }}"><button
                                                        type="button"
                                                        class="btn btn-dark btn-rounded btn-fw">Edit</button></a>
                                                <a
                                                    href="{{ route('admin.district-delete-permanent', ['id' => $info->id]) }}"><button
                                                        type="button"
                                                        class="btn btn-danger btn-rounded btn-fw">Delete</button></a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{ $dataDistrict->links() }}
                </div>
            </div>

        </div>
    </div>
@endsection
