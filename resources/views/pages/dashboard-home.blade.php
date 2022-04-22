@extends('layouts.dash')

@section('title')
    <title>Dashboard</title>
@endsection

@section('contents')
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                    <h3 class="font-weight-bold">Welcome to Echallan</h3>
                    <h6 class="font-weight-normal mb-0">Here you can see an overview of the content.</h6>
                </div>

            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card tale-bg">
                <div class="card-people mt-auto">
                    <img src="{{ asset('images/dashboard/people.svg') }}" alt="people">
                </div>
            </div>
        </div>
        <div class="col-md-6 grid-margin transparent">
            <div class="row">
                <div class="col-md-6 mb-4 stretch-card transparent">
                    <div class="card card-tale">
                        <div class="card-body">
                            <p class="mb-4">Total Traffic Police</p>
                            <p class="fs-30 mb-2">{{ $totalPolice }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-4 stretch-card transparent">
                    <div class="card card-dark-blue">
                        <div class="card-body">
                            <p class="mb-4">Total Traffic Rules</p>
                            <p class="fs-30 mb-2">{{ $totalRules }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-4 mb-lg-0 stretch-card transparent">
                    <div class="card card-light-blue">
                        <div class="card-body">
                            <p class="mb-4">Total Challans</p>
                            <p class="fs-30 mb-2">{{ $totalChallans }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 stretch-card transparent">
                    <div class="card card-light-danger">
                        <div class="card-body">
                            <p class="mb-4">Total items in Trash</p>
                            <p class="fs-30 mb-2">{{ $trashPolice + $trashRules }}</p>
                            <p>Traffic Police ({{ $trashPolice }})</p>
                            <p>Traffic Rules ({{ $trashRules }})</p>
                          </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
