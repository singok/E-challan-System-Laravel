<?php
use Illuminate\Support\Facades\Session;
?>

@extends('layouts.dash')

@section('title')
    <title>Checkpost Details</title>
@endsection

@section('search')
    <form action="{{ route('admin.checkpost-show') }}">
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
                    <h4 class="card-title">Traffic Checkpost Details</h4>
                    <p class="card-description">
                        Here, you can find the list of all available checkpost.
                    </p>
                    <div class="table-responsive">
                        <table class="display table-striped expandable-table dataTable" style="width: 100%;" role="grid">
                            <thead>
                                <tr>
                                    <th>
                                        Checkpost
                                    </th>
                                    <th colspan="2">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- list all checkpost data -->
                                @foreach ($dataCheckpost as $info)
                                    <tr>
                                        <td>
                                            {{ $info->checkpost }}
                                        </td>
                                        <td>
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <a href="{{ route('admin.checkpost-detail-update', ['id' => $info->id]) }}"><button
                                                        type="button"
                                                        class="btn btn-dark btn-rounded btn-fw">Edit</button></a>
                                                <a href="{{ route('admin.checkpost-delete-permanently', ['id' => $info->id]) }}"><button
                                                        type="button"
                                                        class="btn btn-danger btn-rounded btn-fw">Delete</button></a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{ $dataCheckpost->links() }}
                </div>

            </div>
        </div>
    </div>
@endsection
