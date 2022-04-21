@extends('layouts.frontLayout')

@section('title')
    Challan
@endsection

@section('content')

<div class="alert alert-info" role="alert">
    Note :- Fields with <span style="color:red;">*</span> are mandatory.
  </div>
  
  <form>
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
                  <input type="text" class="form-control" id="inputFirstName" name="inputFirstName">
                </div>
                <div class="col-md-4">
                  <label for="inputMiddleName" class="form-label">Middle Name</label>
                  <input type="text" class="form-control" id="inputMiddleName" name="inputMiddleName">
                </div>
                <div class="col-md-4">
                  <label for="inputLastName" class="form-label">Last Name <span style="color:red;">*</span></label>
                  <input type="text" class="form-control" id="inputLastName" name="inputLastName">
                </div>
              </div>
              <div class="col-12">
                <div class="col-md-12 py-2">
                  <label for="inputGender" class="form-label">Gender <span style="color:red;">*</span></label>
                  <select id="inputGender" class="form-select" name="inputGender">
                    <option value="" selected>Choose...</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                  </select>
                </div>
              </div>
              <div class="row g-3 py-2">
                <div class="col-md-4">
                  <label for="inputAddress" class="form-label">Address <span style="color:red;">*</span></label>
                <input type="text" class="form-control" id="inputAddress" name="inputAddress" placeholder="1234 Main St">
                </div>
                <div class="col-md-4">
                  <label for="inputProvince" class="form-label">Province <span style="color:red;">*</span></label>
                  <select id="inputProvince" class="form-select" name="inputProvince">
                    <option value="" selected>Choose...</option>
                    
                    @foreach ($dataInfo as $info)
                      <option value="{{ $info->name }}">{{ $info->name }}</option>
                    @endforeach
                    
                  </select>
                </div>
                <div class="col-md-4">
                  <label for="inputDistrict" class="form-label">District <span style="color:red;">*</span></label>
                  <select id="inputDistrict" class="form-select" name="inputDistrict">
                    <!-- district goes here -->
                  </select>
                </div>
              </div>
              
              <div class="col-12 py-2">
                <label for="inputEmail" class="form-label">Email Address <span style="color:red;">*</span></label>
                <input type="email" class="form-control" id="inputEmail" name="inputEmail" placeholder="abc@gmail.com">
              </div>
              <div class="row g-3 py-2">
                <div class="col-md-6">
                  <label for="inputMobile" class="form-label">Mobile No. <span style="color:red;">*</span></label>
                  <input type="number" class="form-control" id="inputMobile" name="inputMobile" placeholder="98########">
                </div>
                <div class="col-md-6">
                  <label for="inputOccupation" class="form-label">Occupation <span style="color:red;">*</span></label>
                  <input type="text" class="form-control" id="inputOccupation" name="inputOccupation">
                </div>
              </div>
              <div class="row g-3 py-4">
                <div class="col-md-6">
                  <h5 class="pb-0 mb-2 fst-regular">
                    Select Health Conditions <span style="color:red;">*</span>
                  </h5>
                  <hr>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="inputHealthCondition" value="Normal" id="flexCheckNormal">
                    <label class="form-check-label" for="flexCheckNormal">
                      Normal Health Condition
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="inputHealthCondition" value="Blood Pressure" id="flexCheckPressure">
                    <label class="form-check-label" for="flexCheckPressure">
                      Blood Pressure (HIGH/LOW)
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="inputHealthCondition" value="Heart Disease" id="flexCheckHeart">
                    <label class="form-check-label" for="flexCheckHeart">
                      Heart Disease
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="inputHealthCondition" value="Kidney Disease" id="flexCheckKidney">
                    <label class="form-check-label" for="flexCheckKidney">
                      Chronic Kidney Disease
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="inputHealthCondition" value="Tuberculosis" id="flexCheckIB">
                    <label class="form-check-label" for="flexCheckTB">
                      Tuberculosis (TB)
                    </label>
                  </div>
                  
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="inputHealthCondition" value="Other" id="flexCheckOther">
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
                    <input class="form-check-input" type="radio" name="inputDisability" value="Yes" id="flexRadioDefault1" >
                    <label class="form-check-label" for="flexRadioDefault1">
                      Yes
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="inputDisability" value="No" id="flexRadioDefault2" checked>
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
                    <input type="text" class="form-control" id="inputModel" name="inputModel">
                  </div>
                  <div class="col-md-4">
                    <label for="inputCategory" class="form-label">Category <span style="color:red;">*</span></label>
                    <select id="inputCategory" class="form-select" name="inputCategory">

                      <option value="" selected>Choose...</option>
                      @foreach ($vehicleInfo as $vehicleData)
                        <option value='{{ $vehicleData->category }}'>{{ $vehicleData->category }}</option>
                      @endforeach

                    </select>
                  </div>
                  <div class="col-md-4">
                    <label for="inputCategoryDetails" class="form-label">Category Details</label>
                    <input type="text" class="form-control" id="inputCategoryDetails">
                  </div>
                </div>
                <div class="row g-3 py-2">
                  <div class="col-md-4">
                    <label for="inputEngineNo" class="form-label">Engine No. <span style="color:red;">*</span></label>
                    <input type="text" class="form-control" id="inputEngineNo" name="inputEngineNo">
                  </div>
                  <div class="col-md-4">
                    <label for="inputColor" class="form-label">Color <span style="color:red;">*</span></label>
                    <input type="text" class="form-control" id="inputColor" name="inputColor">
                  </div>
                  <div class="col-md-4">
                    <label for="inputPower" class="form-label">Power <span style="color:red;">*</span></label>
                    <input type="text" class="form-control" id="inputPower" name="inputPower">
                  </div>
                </div>
                <hr>
                <h4><b>Fine Fillup</b></h4>
                <hr>
                  <div class="row g-3">
                    <div class="col-md-6">
                      <label for="inputLicenseNo" class="form-label">Driving License No. <span style="color:red;">*</span></label>
                      <input type="text" class="form-control" id="inputLicenseNo" name="inputLicenseNo">
                    </div>
                    <div class="col-md-6">
                      <label for="inputPassengerNo" class="form-label">No. of Passengers <span style="color:red;">*</span></label>
                      <input type="number" class="form-control" id="inputPassengerNo" name="inputPassengerNo">
                    </div>
                  </div>
                  <div class="row g-3 py-2">
                    <div class="col-md-6">
                      <label for="inputPlace" class="form-label">Place <span style="color:red;">*</span></label>
                      <input type="text" class="form-control" id="inputPlace" name="inputPlace">
                    </div>
                    <div class="col-md-6">
                      <label for="inputTime" class="form-label">Time <span style="color:red;">*</span></label>
                      <input type="text" class="form-control" id="inputTime" name="inputTime">
                    </div>
                  </div>
                  <div class="row g-3 py-2">
                    <div class="col-md-12">
                      <label for="inputPoliceGate" class="form-label">Police Gate <span style="color:red;">*</span></label>
                      <select id="inputPoliceGate" class="form-select" name="inputPoliceGate">
                        <option selected>Choose...</option>
                        <option value="Chabahil">Chabahil</option>
                      </select>
                    </div>
                  </div>
                  <div class="row g-3 py-2">
                    <div class="col-md-12">
                      <label for="inputReason" class="form-label">Reason for fine <span style="color:red;">*</span></label>
                      <select id="inputReason" class="form-select" name="inputReason">

                        <option value="" selected>Choose...</option>
                        @foreach ($rulesInfo as $rulesData)
                          <option value='{{ $rulesData->rule_description }}'>{{ $rulesData->rule_description }}</option>
                        @endforeach

                      </select>
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

      // form submit
      $('form').on('submit', function(e) {
        e.preventDefault();

        $.ajax({
          url : "{{ route('challanSubmit') }}",
          type : "POST",
          data : $('form').serialize(),
          success : function (data) {
            alert(data);
            $('form')[0].reset();
          }
        });

      });

    });
  </script>

@endsection