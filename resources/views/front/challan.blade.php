@extends('layouts.frontLayout')

@section('title')
    Challan
@endsection

@section('content')

<div class="alert alert-info" role="alert">
    Please, fill all the details carefully !
  </div>
  
  <form action="#">
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
                  <label for="inputFirstName" class="form-label">First Name</label>
                  <input type="text" class="form-control" id="inputFirstName" name="firstName">
                </div>
                <div class="col-md-4">
                  <label for="inputMiddleName" class="form-label">Middle Name</label>
                  <input type="text" class="form-control" id="inputMiddleName" name="middleName">
                </div>
                <div class="col-md-4">
                  <label for="inputLastName" class="form-label">Last Name</label>
                  <input type="text" class="form-control" id="inputLastName" name="lastName">
                </div>
              </div>
              <div class="col-12">
                <div class="col-md-12 py-2">
                  <label for="inputGender" class="form-label">Gender</label>
                  <select id="inputGender" class="form-select" name="inputGender">
                    <option value="" selected>Choose...</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                  </select>
                </div>
              </div>
              <div class="row g-3 py-2">
                <div class="col-md-4">
                  <label for="inputAddress" class="form-label">Address</label>
                <input type="text" class="form-control" id="inputAddress" name="inputAddress" placeholder="1234 Main St">
                </div>
                <div class="col-md-4">
                  <label for="inputProvince" class="form-label">Province</label>
                  <select id="inputProvince" class="form-select">
                    <option value="" selected>Choose...</option>
                    <option value="Province No. 1">Province No. 1</option>
                  </select>
                </div>
                <div class="col-md-4">
                  <label for="inputState" class="form-label">District</label>
                  <select id="inputState" class="form-select">
                    <option selected>Choose...</option>
                    <option>...</option>
                  </select>
                </div>
              </div>
              
              <div class="col-12 py-2">
                <label for="inputEmail" class="form-label">Email Address</label>
                <input type="email" class="form-control" id="inputEmail" name="inputEmail" placeholder="abc@gmail.com">
              </div>
              <div class="row g-3 py-2">
                <div class="col-md-6">
                  <label for="inputMobile" class="form-label">Mobile No.</label>
                  <input type="number" class="form-control" id="inputMobile" name="inputMobile" placeholder="98########">
                </div>
                <div class="col-md-6">
                  <label for="inputOccupation" class="form-label">Occupation</label>
                  <input type="text" class="form-control" id="inputOccupation" name="inputOccupation">
                </div>
              </div>
              <div class="row g-3 py-4">
                <div class="col-md-6">
                  <h5 class="pb-0 mb-2 fst-regular">
                    Select Health Conditions
                  </h5>
                  <hr>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="inpuHealthCondition" value="Normal" id="flexCheckNormal">
                    <label class="form-check-label" for="flexCheckNormal">
                      Normal Health Condition
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="inpuHealthCondition" value="Blood Pressure" id="flexCheckPressure">
                    <label class="form-check-label" for="flexCheckPressure">
                      Blood Pressure (HIGH/LOW)
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="inpuHealthCondition" value="Heart Disease" id="flexCheckHeart">
                    <label class="form-check-label" for="flexCheckHeart">
                      Heart Disease
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="inpuHealthCondition" value="Kidney Disease" id="flexCheckKidney">
                    <label class="form-check-label" for="flexCheckKidney">
                      Chronic Kidney Disease
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="inpuHealthCondition" value="Tuberculosis" id="flexCheckIB">
                    <label class="form-check-label" for="flexCheckTB">
                      Tuberculosis (TB)
                    </label>
                  </div>
                  
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="inpuHealthCondition" value="Other" id="flexCheckOther">
                    <label class="form-check-label" for="flexCheckOther">
                      Other
                    </label>
                  </div>
                </div>
                <div class="col-md-6">
                  <h5 class="pb-0 mb-2 fst-regular">
                    Disability
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
                    <label for="inputPlateNo" class="form-label">Plate No.</label>
                    <input type="email" class="form-control" id="inputPlateNo" name="inputPlateNo">
                  </div>
                  <div class="col-md-4">
                    <label for="inputVehicleType" class="form-label">Vehicle Type</label>
                    <select id="inputVehicleType" class="form-select" name="inputVehicleType">
                      <option selected>Choose...</option>
                      <option>A</option>
                      <option>B</option>
                      <option>C</option>
                      <option>D</option>
                    </select>
                  </div>
                  <div class="col-md-4">
                    <label for="inputModel" class="form-label">Model</label>
                    <input type="text" class="form-control" id="inputModel" name="inputModel">
                  </div>
                </div>
                <div class="row g-3 py-2">
                  <div class="col-md-4">
                    <label for="inputEngineNo" class="form-label">Engine No.</label>
                    <input type="text" class="form-control" id="inputEngineNo" name="inputEngineNo">
                  </div>
                  <div class="col-md-4">
                    <label for="inputColor" class="form-label">Color</label>
                    <input type="text" class="form-control" id="inputColor" input="inputColor">
                  </div>
                  <div class="col-md-4">
                    <label for="inputPower" class="form-label">Power</label>
                    <input type="text" class="form-control" id="inputPower" name="inputPower">
                  </div>
                </div>
                <hr>
                <h4><b>Fine Fillup</b></h4>
                <hr>
                  <div class="row g-3">
                    <div class="col-md-6">
                      <label for="inputLicenseNo" class="form-label">Driving License No.</label>
                      <input type="text" class="form-control" id="inputLicenseNo" name="inputLicenseNo">
                    </div>
                    <div class="col-md-6">
                      <label for="inputPassengerNo" class="form-label">No. of Passengers</label>
                      <input type="number" class="form-control" id="inputPassengerNo" name="inputPassengerNo">
                    </div>
                  </div>
                  <div class="row g-3 py-2">
                    <div class="col-md-6">
                      <label for="inputPlace" class="form-label">Place</label>
                      <input type="text" class="form-control" id="inputPlace" name="inputPlace">
                    </div>
                    <div class="col-md-6">
                      <label for="inputTime" class="form-label">Time</label>
                      <input type="text" class="form-control" id="inputTime" name="inputTime">
                    </div>
                  </div>
                  <div class="row g-3 py-2">
                    <div class="col-md-12">
                      <label for="inputPoliceGate" class="form-label">Police Gate</label>
                      <select id="inputPoliceGate" class="form-select" name="inputPoliceGate">
                        <option selected>Choose...</option>
                        <option>...</option>
                      </select>
                    </div>
                  </div>
                  <div class="row g-3 py-2">
                    <div class="col-md-12">
                      <label for="inputReason" class="form-label">Reason for fine</label>
                      <select id="inputReason" class="form-select" name="inputReason">
                        <option selected>Choose...</option>
                        <option>...</option>
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

@endsection