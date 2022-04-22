<?php
use Illuminate\Support\Facades\Session;
?>

@extends('layouts.dash')

@section('title')
    <title>Trash bin</title>
@endsection

@section('search')
    <form action="{{ route('admin.trash') }}">
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
                    <h4 class="card-title">Recycle Bin</h4>
                    <p class="card-description">
                        Here, you can either restore or permanently delete records.
                    </p>
                    <h3 class="card-title">Traffic Police</h3>
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
                                        State
                                    </th>
                                    <th>
                                        City
                                    </th>
                                    <th>
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- list all trashed traffic data -->
                                @foreach ($dataPolice as $val)
                                    <tr>
                                        <td class="py-1">
                                            <img src="{{ asset('images/faces') . '/' . $val->image }}" alt="image">
                                        </td>
                                        <td>
                                            {{ $val->firstname }}
                                        </td>
                                        <td>
                                            {{ $val->lastname }}
                                        </td>
                                        <td>
                                            {{ $val->gender }}
                                        </td>
                                        <td>
                                            {{ $val->dob }}
                                        </td>
                                        <td>
                                            {{ $val->email }}
                                        </td>
                                        <td>
                                            {{ $val->state }}
                                        </td>
                                        <td>
                                            {{ $val->city }}
                                        </td>
                                        <td>
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <a href="{{ route('admin.traffic-restore', ['id' => $val->id]) }}"><button
                                                        type="button"
                                                        class="btn btn-success btn-rounded btn-fw">Restore</button></a>
                                                <a
                                                    href="{{ route('admin.traffic-delete-permanent', ['id' => $val->id]) }}"><button
                                                        type="button"
                                                        class="btn btn-danger btn-rounded btn-fw">Delete</button></a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <hr>
                    <h3 class="card-title">Traffic Rules</h3>
                    <div class="table-responsive">
                        <table class="display table-striped expandable-table dataTable" style="width: 100%;" role="grid">
                            <thead>
                                <tr>
                                    <th>
                                        Rule No.
                                    </th>
                                    <th>
                                        Rule Description
                                    </th>
                                    <th>
                                        Penalty Point(Rs)
                                    </th>
                                    <th>
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- list all trashed traffic rules -->
                                @foreach ($dataInfo as $info)
                                    <tr>
                                        <td>
                                            {{ $info->rule_no }}
                                        </td>
                                        <td>
                                            {{ $info->rule_description }}
                                        </td>
                                        <td>
                                            {{ $info->penalty_point }}
                                        </td>
                                        <td>
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <a
                                                    href="{{ route('admin.traffic-rules-restore', ['id' => $info->id]) }}"><button
                                                        type="button"
                                                        class="btn btn-success btn-rounded btn-fw">Restore</button></a>
                                                <a
                                                    href="{{ route('admin.rule-delete-permanent', ['id' => $info->id]) }}"><button
                                                        type="button"
                                                        class="btn btn-danger btn-rounded btn-fw">Delete</button></a>
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
