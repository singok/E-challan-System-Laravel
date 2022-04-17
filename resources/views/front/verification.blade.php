@extends('layouts.frontLayout')

@section('title')
    Verification
@endsection

@section('content')

<div class="verification-box p-4 mb-3 bg-light rounded">
    <h4 class="fst-regular"><b>Printable</b></h4>
    <p>Verification Status</p>
    <hr>
    <form method="GET" action="{{ route('verificationpage') }}">
        @csrf
        <div class="form-group">
            <label for="exampleInputLicense">Driving License No.</label>
            <input type="text" name="driving_license" class="form-control mt-2 mb-2" id="exampleInputLincese" aria-describedby="licenseHelp" required/>
            <div class="alert-danger">
                {{ $feedback }}
            </div>
            <small id="licenseHelp" class="form-text text-muted">We'll never share your details with anyone
                else.</small>
        </div>
        <hr>
        <button type="submit" class="printable-search">Search</button>
    </form>

</div>

@php
    echo $dataInfo;
@endphp

@endsection