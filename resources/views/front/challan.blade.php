@php
  use Illuminate\Support\Facades\Session;
@endphp

@extends('layouts.frontLayout')

@section('title')
    Challan
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
<div class="alert alert-info" role="alert">
    Note :- Fields with <span style="color:red;">*</span> are mandatory.
  </div>
  <form action="{{ route('challanSubmit') }}" method="GET">
    @csrf
    <div class="row g-3">
      <div class="row mb-4 g-3">
        <div class="col-md-6">
          <h4 class="pt-4 mb-2">
            <b>Personal Details</b>
          </h4>
          <hr>
          <article class="blog-post">
    
              <div class="row g-3">
                <div class="col-md-4">
                  <label for="inputFirstName" class="form-label">First Name <span style="color:red;">*</span></label>
                  <input type="text" class="form-control" id="inputFirstName" name="firstName">
                  <div class="alert-danger">
                    @error('firstName')
                        {{ $message }}
                    @enderror
                  </div>
                </div>
                
                <div class="col-md-4">
                  <label for="inputMiddleName" class="form-label">Middle Name</label>
                  <input type="text" class="form-control" id="inputMiddleName" name="middleName">
                </div>

                <div class="col-md-4">
                  <label for="inputLastName" class="form-label">Last Name <span style="color:red;">*</span></label>
                  <input type="text" class="form-control" id="inputLastName" name="lastName">
                  <div class="alert-danger">
                    @error('lastName')
                        {{ $message }}
                    @enderror
                  </div>
                </div>
              </div>
              <div class="col-12">
                <div class="col-md-12 py-2">
                  <label for="inputGender" class="form-label">Gender <span style="color:red;">*</span></label>
                  <select id="inputGender" class="form-select" name="gender">
                    <option value="" selected>Choose...</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                  </select>
                </div>
                <div class="alert-danger">
                  @error('gender')
                      {{ $message }}
                  @enderror
                </div>
              </div>
              <div class="row g-3 py-2">
                <div class="col-md-4">
                  <label for="inputAddress" class="form-label">Address <span style="color:red;">*</span></label>
                <input type="text" class="form-control" id="inputAddress" name="address" placeholder="1234 Main St">
                <div class="alert-danger">
                  @error('address')
                      {{ $message }}
                  @enderror
                </div>
                </div>
                <div class="col-md-4">
                  <label for="inputProvince" class="form-label">Province <span style="color:red;">*</span></label>
                  <select id="inputProvince" class="form-select" name="province">
                    <option value="" selected>Choose...</option>
                    
                    @foreach ($dataInfo as $info)
                      <option value="{{ $info->province }}">{{ $info->province }}</option>
                    @endforeach
                    
                  </select>
                  <div class="alert-danger">
                    @error('province')
                        {{ $message }}
                    @enderror
                  </div>
                </div>
                <div class="col-md-4">
                  <label for="inputDistrict" class="form-label">District <span style="color:red;">*</span></label>
                  <select id="inputDistrict" class="form-select" name="district">
                    <!-- district goes here -->
                  </select>
                  <div class="alert-danger">
                    @error('district')
                        {{ $message }}
                    @enderror
                  </div>
                </div>
              </div>
              
              <div class="col-12 py-2">
                <label for="inputEmail" class="form-label">Email Address <span style="color:red;">*</span></label>
                <input type="email" class="form-control" id="inputEmail" name="email" placeholder="abc@gmail.com">
                <div class="alert-danger">
                  @error('email')
                      {{ $message }}
                  @enderror
                </div>
              </div>
              <div class="row g-3 py-2">
                <div class="col-md-6">
                  <label for="inputMobile" class="form-label">Mobile No. <span style="color:red;">*</span></label>
                  <input type="number" class="form-control" id="inputMobile" name="phoneNumber" placeholder="98########">
                  <div class="alert-danger">
                    @error('phoneNumber')
                        {{ $message }}
                    @enderror
                  </div>
                </div>
                <div class="col-md-6">
                  <label for="inputOccupation" class="form-label">Occupation <span style="color:red;">*</span></label>
                  <input type="text" class="form-control" id="inputOccupation" name="occupation">
                  <div class="alert-danger">
                    @error('occupation')
                        {{ $message }}
                    @enderror
                  </div>
                </div>
              </div>
              <div class="row g-3 py-4">
                <div class="col-md-6">
                  <h5 class="pb-0 mb-2 fst-regular">
                    Select Health Conditions <span style="color:red;">*</span>
                  </h5>
                  <hr>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="healthCondition[]" value="Normal" id="flexCheckNormal" checked>
                    <label class="form-check-label" for="flexCheckNormal">
                      Normal Health Condition
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="healthCondition[]" value="Blood Pressure" id="flexCheckPressure">
                    <label class="form-check-label" for="flexCheckPressure">
                      Blood Pressure (HIGH/LOW)
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="healthCondition[]" value="Heart Disease" id="flexCheckHeart">
                    <label class="form-check-label" for="flexCheckHeart">
                      Heart Disease
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="healthCondition[]" value="Kidney Disease" id="flexCheckKidney">
                    <label class="form-check-label" for="flexCheckKidney">
                      Chronic Kidney Disease
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="healthCondition[]" value="Tuberculosis" id="flexCheckIB">
                    <label class="form-check-label" for="flexCheckTB">
                      Tuberculosis (TB)
                    </label>
                  </div>
                  
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="healthCondition[]" value="Other" id="flexCheckOther">
                    <label class="form-check-label" for="flexCheckOther">
                      Other
                    </label>
                  </div>
                </div>
                <div class="col-md-6">
                  <h5 class="pb-0 mb-2 fst-regular">
                    Disability <span style="color:red;">*</span>
                  </h5>
                  <hr>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="disability" value="Yes" id="flexRadioDefault1" >
                    <label class="form-check-label" for="flexRadioDefault1">
                      Yes
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="disability" value="No" id="flexRadioDefault2" checked>
                    <label class="form-check-label" for="flexRadioDefault2">
                      No
                    </label>
                  </div>
                </div>
              </div>
          </article>
  
        </div>
  
        <div class="col-md-6">
          <div class="position" style="top: 2rem;">
            <div class="p-4 mb-3 bg-light rounded">
                <h4><b>Vehicle Details</b></h4>
                <hr>
                <div class="row g-3">
                  <div class="col-md-4">
                    <label for="inputModel" class="form-label">Model <span style="color:red;">*</span></label>
                    <input type="text" class="form-control" id="inputModel" name="model">
                    <div class="alert-danger">
                      @error('model')
                          {{ $message }}
                      @enderror
                    </div>
                  </div>
                  <div class="col-md-4">
                    <label for="inputCategory" class="form-label">Category <span style="color:red;">*</span></label>
                    <select id="inputCategory" class="form-select" name="category">

                      <option value="" selected>Choose...</option>
                      @foreach ($vehicleInfo as $vehicleData)
                        <option value='{{ $vehicleData->category }}'>{{ $vehicleData->category }}</option>
                      @endforeach

                    </select>
                    <div class="alert-danger">
                      @error('category')
                          {{ $message }}
                      @enderror
                    </div>
                  </div>
                  <div class="col-md-4">
                    <label for="inputCategoryDetails" class="form-label">Category Details</label>
                    <input type="text" class="form-control" id="inputCategoryDetails">
                  </div>
                </div>
                <div class="row g-3 py-2">
                  <div class="col-md-4">
                    <label for="inputEngineNo" class="form-label">Engine No. <span style="color:red;">*</span></label>
                    <input type="text" class="form-control" id="inputEngineNo" name="engineNo">
                    <div class="alert-danger">
                      @error('engineNo')
                          {{ $message }}
                      @enderror
                    </div>
                  </div>
                  <div class="col-md-4">
                    <label for="inputColor" class="form-label">Color <span style="color:red;">*</span></label>
                    <input type="text" class="form-control" id="inputColor" name="color">
                    <div class="alert-danger">
                      @error('color')
                          {{ $message }}
                      @enderror
                    </div>
                  </div>
                  <div class="col-md-4">
                    <label for="inputPower" class="form-label">Power <span style="color:red;">*</span></label>
                    <input type="text" class="form-control" id="inputPower" name="power">
                    <div class="alert-danger">
                      @error('power')
                          {{ $message }}
                      @enderror
                    </div>
                  </div>
                </div>
                <hr>
                <h4><b>Fine Fillup</b></h4>
                <hr>
                  <div class="row g-3">
                    <div class="col-md-6">
                      <label for="inputLicenseNo" class="form-label">Driving License No. <span style="color:red;">*</span></label>
                      <input type="text" class="form-control" id="inputLicenseNo" name="licenseNo">
                      <div class="alert-danger">
                        @error('licenseNo')
                            {{ $message }}
                        @enderror
                      </div>
                    </div>
                    <div class="col-md-6">
                      <label for="inputPassengerNo" class="form-label">No. of Passengers <span style="color:red;">*</span></label>
                      <input type="number" class="form-control" id="inputPassengerNo" name="passengerCount">
                      <div class="alert-danger">
                        @error('passengerCount')
                            {{ $message }}
                        @enderror
                      </div>
                    </div>
                  </div>
                  <div class="row g-3 py-2">
                    <div class="col-md-6">
                      <label for="inputPlace" class="form-label">Place <span style="color:red;">*</span></label>
                      <input type="text" class="form-control" id="inputPlace" name="place">
                      <div class="alert-danger">
                        @error('place')
                            {{ $message }}
                        @enderror
                      </div>
                    </div>
                    <div class="col-md-6">
                      <label for="inputTime" class="form-label">Time <span style="color:red;">*</span></label>
                      <input type="text" class="form-control" id="inputTime" name="time">
                      <div class="alert-danger">
                        @error('time')
                            {{ $message }}
                        @enderror
                      </div>
                    </div>
                  </div>
                  <div class="row g-3 py-2">
                    <div class="col-md-12">
                      <label for="inputPoliceGate" class="form-label">Traffic Checkpost</label> <span style="color:red;">*</span></label>
                      <select id="inputPoliceGate" class="form-select" name="checkpost">
                        <option value="" selected>Choose...</option>
                        @foreach ($dataCheckpost as $data)
                          <option value="{{ $data->checkpost }}">{{ $data->checkpost }}</option>
                        @endforeach
                        
                      </select>
                      <div class="alert-danger">
                        @error('checkpost')
                            {{ $message }}
                        @enderror
                      </div>
                    </div>
                  </div>
                  <div class="row g-3 py-2">
                    <div class="col-md-12">
                      <label for="inputReason" class="form-label">Reason for fine <span style="color:red;">*</span></label>
                      <select id="inputReason" class="form-select" name="reason">

                        <option value="" selected>Choose...</option>
                        @foreach ($rulesInfo as $rulesData)
                          <option value='{{ $rulesData->rule_description }}'>{{ $rulesData->rule_description }}</option>
                        @endforeach

                      </select>
                      <div class="alert-danger">
                        @error('reason')
                            {{ $message }}
                        @enderror
                      </div>
                    </div>
                  </div>
                <hr>
                <button type="submit" class="printable-search">Submit</button>
              
            </div>
          </div>
        </div>
  
      </div>
    </div>
  </form>

  <script>
    $(document).ready(function() {
      
      // get province value
      $('#inputProvince').on('change', function() {
        let province = $(this).val();

        $.ajax({
          url : "{{ route('loadDistrict') }}",
          type : "POST",
          data : {province:province, _token: '{{csrf_token()}}' },
          success : function (data) {
            $('#inputDistrict').html(data);
          }
        });
      });

      // get category details
      $('#inputCategory').on('change', function() {
        let category = this.value;
        $.ajax({
          url : "{{ route('loadCategoryDetails') }}",
          type : "POST",
          data : {category:category, _token: '{{csrf_token()}}' },
          success : function (data) {
              $('#inputCategoryDetails').val(data);
          }
        });
      });

    });
  </script>

@endsection