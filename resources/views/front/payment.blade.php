@php
    use Illuminate\Support\Facades\Session;
@endphp

@extends('layouts.frontLayout')

@section('title')
    Payment
@endsection

@section('content')

<form action="{{ route('payment') }}" method="POST">
    @if (Session::get('success'))
    <div class="alert alert-success">
        {{ Session::get('success') }}
    </div>
    @elseif(Session::get('failure'))
      <div class="alert alert-danger">
          {{ Session::get('failure') }}
      </div>
    @endif
    @csrf
    <div class="main-body bg-light d-md-flex align-items-center"> 
            <div class="main-box box1 shadow-sm p-md-5 p-md-5 p-4"> 
                <div class="fw-bolder mb-2">
                    <span class="ps-10">Fine Payment</span>
                </div> 
                <div class="d-flex flex-column"> 
                    <div class="d-flex align-items-center justify-content-between text mb-2"> 
                        <span class="">Here, you can pay your fine amount. So, please fill all details carefully !</span> 
                    </div> 
                    <div class="border-bottom mb-3"></div> 
                    <div class="form-group mb-3">
                        <label for="formGroupExampleInvoice">Invoice ID :</label>
                        <input type="text" class="form-control" id="formGroupExampleInvoice" name="invoiceID">
                        <div class="alert-danger">
                            @error('invoiceID')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>
                    
                    <div class="form-group mb-3">
                        <label for="formGroupExampleDriving">Driving License No. :</label>
                        <input type="text" class="form-control" id="formGroupExampleDriving" name="drivingLicense">
                        <div class="alert-danger">
                            @error('drivingLicense')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>
                    
                    <div class="form-group mb-3">
                        <label for="formGroupExamplePhone">Phone No. :</label>
                        <input type="text" class="form-control" id="formGroupExamplePhone" name="phone">
                        <div class="alert-danger">
                            @error('phone')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>
                    
                    <div class="form-group mb-0">
                        <label for="formGroupExampleRemarks">Remarks :</label>
                        <input type="text" class="form-control" id="formGroupExampleRemarks" name="remarks">
                        <div class="alert-danger">
                            @error('remarks')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>
                    
                </div> 
            </div> 
            <div class="main-box box2 shadow-sm"> 

                <div class="d-flex align-items-center justify-content-between px-5 py-3"> 
                    <span class="h5 fw-bold m-0">Payment methods</span> 
                </div> 
                <ul class="nav nav-tabs mb-3 px-md-4 px-2"> 
                    <li class="nav-item"> 
                        <a class="nav-link px-2 first" id="creditCard" href="#" aria-current="page">Credit Card</a> 
                    </li> 
                    <li class="nav-item"> 
                        <a href="#" class="nav-link px-2 second" id="mobilePayment">Mobile Payment</a> 
                    </li> 
                </ul>  
                <div id="payment-form"> 
                    <div class="row"> 
                        <div class="col-12"> 
                            <div class="d-flex flex-column px-md-5 px-4 mb-4"> 
                                <span>Credit Card</span> 
                                <div class="inputWithIcon"> 
                                    <input class="payment-input" type="text" placeholder="5136 1845 5468 3894" name="cardNumber"> 
                                    <span class=""> <img src="https://www.freepnglogos.com/uploads/mastercard-png/mastercard-logo-logok-15.png" alt=""></span> 
                                </div> 
                                <div class="alert-danger">
                                    @error('cardNumber')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div> 
                            
                        </div> 
                        <div class="col-md-6"> 
                            <div class="d-flex flex-column ps-md-5 px-md-0 px-4 mb-4"> 
                                <span>Expiration<span class="ps-1">Date</span></span> 
                                <div class="inputWithIcon"> 
                                    <input type="text" class="payment-input" placeholder="05/20" name="expiryDate"> 
                                    <span class="fas fa-calendar-alt"></span> 
                                </div>
                                <div class="alert-danger">
                                    @error('expiryDate')
                                        {{ $message }}
                                    @enderror
                                </div>  
                            </div>
                            
                        </div> 
                        <div class="col-md-6"> 
                            <div class="d-flex flex-column pe-md-5 px-md-0 px-4 mb-4"> 
                                <span>Code CVV</span> 
                                <div class="inputWithIcon"> 
                                    <input type="password" class="payment-input" name="cvvCode"> <span class="fas fa-lock"></span> 
                                </div>
                                <div class="alert-danger">
                                    @error('cvvCode')
                                        {{ $message }}
                                    @enderror
                                </div> 
                            </div>
                             
                        </div> 
                        <div class="col-12"> 
                            <div class="d-flex flex-column px-md-5 px-4 mb-4"> 
                                <span>Name</span> 
                                <div class="inputWithIcon"> 
                                    <input class="payment-input" type="text" placeholder="John Cena" name="fullName"> 
                                    <span class="far fa-user"></span> 
                                </div>
                                <div class="alert-danger">
                                    @error('fullName')
                                        {{ $message }}
                                    @enderror
                                </div> 
                            </div> 
                            
                        </div> 
                        <div class="col-12"> 
                            <div class="d-flex flex-column px-md-5 px-4 mb-4"> 
                                <span>Amount (Rs)</span> 
                                <div class="inputWithIcon"> 
                                    <input class="payment-input" type="number" name="fineAmount"> 
                                    <span class="fas fa-dollar-sign"></span>
                                </div>
                                <div class="alert-danger">
                                    @error('fineAmount')
                                        {{ $message }}
                                    @enderror
                                </div> 
                            </div> 
                            
                        </div> 
                        <div class="col-12 px-md-5 px-4 mt-3"> 
                            <input type="submit" class="btn btn-primary w-100" value="Pay">
                            
                        </div> 
                    </div> 
                </div> 
                <div id="mobile-form" style="display:none;">
                    <div class="row"> 
                        <div class="col-12"> 
                            <div class="d-flex flex-column px-md-5 px-4 mb-4"> 
                                <span style="text-align: center;font-weight:bold;">Scan to Pay on Merchant outlets</span>
                                <div class="qrCode my-2">
                                    QR-CODE goes here
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
</form>

<script>
    $(document).ready(function() {
        
        // mobile payment
        $('#mobilePayment').on('click', function () {
            $('#payment-form').css('display','none');
            $('#mobile-form').css('display','block');
            $('.nav.nav-tabs .nav-item .nav-link.first').removeAttr('style');
            $('.nav.nav-tabs .nav-item .nav-link.second').css({'border':'none','border-bottom': '2px solid #3ecc6d'});
        });

        // credit payment
        $('#creditCard').on('click', function () {
            $('#mobile-form').css('display','none');
            $('#payment-form').css('display','block');
            $('.nav.nav-tabs .nav-item .nav-link.second').removeAttr('style');
            $('.nav.nav-tabs .nav-item .nav-link.first').css({'border':'none','border-bottom': '2px solid #3ecc6d'});
        });


    });
</script>

@endsection