<?php
use Illuminate\Support\Facades\Session;
?>
@extends('layouts.dash')

@section('title')
    <title>Add Province/district</title>
@endsection

@section('contents')

<div class="mt-4">
    <div class="accordion accordion-bordered" id="accordion-2" role="tablist">
        @if (Session::get('success'))
                        <div class="alert alert-success">
                            {{ Session::get('success') }}
                        </div>
                    @elseif(Session::get('failure'))
                        <div class="alert alert-danger">
                            {{ Session::get('failure') }}
                        </div>
                    @endif
      <div class="card">
        <div class="card-header" role="tab" id="heading-4">
          <h6 class="mb-0">
            <a data-bs-toggle="collapse" href="#collapse-4" aria-expanded="true" aria-controls="collapse-4" class="">
                <h4>Add District</h4>
            </a>
          </h6>
        </div>
        <div id="collapse-4" class="collapse show" role="tabpanel" aria-labelledby="heading-4" data-parent="#accordion-2" style="">
          <div class="card-body">
                    <div class="alert alert-warning">
                        NOTE :- Choose province and insert district value.
                    </div>
                    </p>
                    <form class="forms-sample" method="POST" action="{{ route('admin.district-register') }}">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label" id="inputProvince">Province : </label>
                                    <div class="col-sm-9">
                                        <select id="inputProvince" class="form-control" name="province">
                                            <option value="" selected>Choose...</option>
                                            
                                            @foreach ($dataInfo as $info)
                                                <option value="{{ $info->name }}">{{ $info->name }}</option>
                                            @endforeach
                      
                                        </select>
                                        <div class="alert-danger">
                                            @error('province')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">District : </label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="district" />
                                        <div class="alert-danger">
                                            @error('district')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>

                        </div>
                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    </form>
          </div>
        </div>
      </div>
      <div class="card">
        <div class="card-header" role="tab" id="heading-5">
          <h6 class="mb-0">
            <a class="collapsed" data-bs-toggle="collapse" href="#collapse-5" aria-expanded="false" aria-controls="collapse-5">
              I can’t sign in to my account
            </a>
          </h6>
        </div>
        <div id="collapse-5" class="collapse" role="tabpanel" aria-labelledby="heading-5" data-parent="#accordion-2">
          <div class="card-body">
              <p>If while signing in to your account you see an error message, you can do the following</p>
            <ol class="ps-3">
              <li>Check your network connection and try again</li>
              <li>Make sure your account credentials are correct while signing in</li>
              <li>Check whether your account is accessible in your region</li>
            </ol>
            <br>
            <i class="ti-alert-octagon me-2"></i>If the problem persists, you can contact our support.
          </div>
        </div>
      </div>
     
    </div>
  </div>

  @endsection
