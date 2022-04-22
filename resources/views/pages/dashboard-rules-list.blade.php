<?php
use Illuminate\Support\Facades\Session;
?>

@extends('layouts.dash')

@section('title')
    <title>Traffic Rules Details</title>
@endsection

@section('search')
    <form action="{{ route('admin.rules-display') }}">
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
                        Here, you can find the list of all available traffic rules.
                    </p>
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
                                <!-- list all traffic data -->
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
                                                <a href="{{ route('admin.traffic-rules-update', ['id' => $info->id]) }}"><button
                                                        type="button"
                                                        class="btn btn-dark btn-rounded btn-fw">Edit</button></a>
                                                <a href="{{ route('admin.rule-delete', ['id' => $info->id]) }}"><button
                                                        type="button"
                                                        class="btn btn-warning btn-rounded btn-fw">Trash</button></a>
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
