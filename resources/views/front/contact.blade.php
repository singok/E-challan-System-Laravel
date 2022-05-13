@php
  use Illuminate\Support\Facades\Session;
@endphp

@extends('layouts.frontLayout')

@section('title')
    Contact us
@endsection

@section('content')

@if (Session::get('success'))
    <div class="alert alert-success">
        {{ Session::get('success') }}
    </div>
@elseif (Session::get('failure'))
    <div class="alert alert-danger">
        {{ Session::get('failure') }}
    </div>
@endif

<section id="contact" class="contact">
    <div class="container">
      <div class="section-title">
        <p>We are here to answer any question you may have about our appliction. Reach out to us and we will respond as soon as we can even if there is something you have awlays wanted to exprience and cann't find it, let us know and we promise we our best to find it for you.</p>
      </div>
    </div>

    <div>
      <iframe style="border:0; width: 100%; height: 350px;" src="https://www.google.com/maps/d/embed?mid=1rt_sQrD4EBgLtpmL56XHfTH706k&msa=0&hl=en&ie=UTF8&ll=27.719556229454916%2C85.33516881002177&spn=0.076188%2C0.168308&t=m&vpsrc=1&output=embed&z=13" frameborder="0" allowfullscreen></iframe>
    </div>

    <div class="container">
      <div class="row mt-5">

        <div class="col-lg-4">
          <div class="info">
            <div class="address">
              <i class="bi bi-geo-alt"></i>
              <h4>Location:</h4>
              <p>Singha Durbar, Kathmandu, Bagmati, Nepal</p>
            </div>

            <div class="email">
              <i class="bi bi-envelope"></i>
              <h4>Email:</h4>
              <p>nepalpolice@trafficpolice.com.np</p>
            </div>

            <div class="phone">
              <i class="bi bi-phone"></i>
              <h4>Call:</h4>
              <p>01-520100</p>
            </div>
          </div>
        </div>

        <div class="col-lg-8 mt-5 mt-lg-0">

          <form action="{{ route('contactSubmit') }}" method="post" role="form" class="php-email-form">
            @csrf
            <div class="row">
              <div class="col-md-6 form-group">
                <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" >
                <div class="alert-danger">
                    @error('name')
                        {{ $message }}
                    @enderror
                  </div>
              </div>
              <div class="col-md-6 form-group mt-3 mt-md-0">
                <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" >
                <div class="alert-danger">
                    @error('email')
                        {{ $message }}
                    @enderror
                  </div>
              </div>
            </div>
            <div class="form-group mt-3">
              <input type="number" class="form-control" name="phone" id="phone" placeholder="Your Phone Number" >
              <div class="alert-danger">
                @error('phone')
                    {{ $message }}
                @enderror
              </div>
            </div>
            <div class="form-group mt-3">
              <textarea class="form-control" name="message" rows="5" placeholder="Message" ></textarea>
              <div class="alert-danger">
                @error('message')
                    {{ $message }}
                @enderror
              </div>
            </div>
            <div class="text-center"><button type="submit">Send Message</button></div>
          </form>
        </div>

      </div>
    </div>
  </section>

@endsection