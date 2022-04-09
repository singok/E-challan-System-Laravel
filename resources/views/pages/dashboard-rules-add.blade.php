<?php
use Illuminate\Support\Facades\Session;
?>
@extends('layouts.dash')

@push('title')
    <title>Add Traffic Rules</title>
@endpush

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
                    <h4 class="card-title">Add Traffic Rules</h4>
                    <p class="card-description">
                        Please, add traffic rules details carefully !<br>
                    <div class="alert alert-warning">
                        NOTE :- All fields are mandatory.
                    </div>
                    </p>
                    <form class="forms-sample" method="POST" action="{{ route('traffic_rules_add') }}">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputRule1">Rule No.</label>
                            <input type="number" class="form-control" id="exampleInputRule1" name="rule_no">
                            <div class="alert-danger">
                                @error('rule_no')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleTextarea1">Rule Description</label>
                            <textarea class="form-control" id="exampleTextarea1" rows="4" name="rule_description"></textarea>
                            <div class="alert-danger">
                                @error('rule_description')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPoint3">Penalty Point (Rs)</label>
                            <input type="number" class="form-control" id="exampleInputPoint3" name="penalty_point">
                            <div class="alert-danger">
                                @error('penalty_point')
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
