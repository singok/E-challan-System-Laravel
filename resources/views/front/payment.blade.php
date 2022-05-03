@extends('layouts.frontLayout')

@section('title')
    Payment
@endsection

@section('content')
    <form action="{{ route('sms') }}" method="POST">
        @csrf
        Driving License No. : <input type="text" name="driving_license" /><br><br>
        Full Name : <input type="text" name="full_name" /><br><br>
        Mobile No. : <input type="number" name="phone" /><br><br>
        Amount(Rs) : <input type="number" name="amount" /><br><br>
        Remarks : <input type="text" name="remarks" /><br><br>
        <input type="submit" value="Pay" />
    </form>
@endsection