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
                  <label for="inputEmail4" class="form-label">First Name</label>
                  <input type="email" class="form-control" id="inputEmail4">
                </div>
                <div class="col-md-4">
                  <label for="inputPassword4" class="form-label">Middle Name</label>
                  <input type="password" class="form-control" id="inputPassword4">
                </div>
                <div class="col-md-4">
                  <label for="inputPassword4" class="form-label">Last Name</label>
                  <input type="password" class="form-control" id="inputPassword4">
                </div>
              </div>
              <div class="col-12">
                <div class="col-md-12 py-2">
                  <label for="inputState" class="form-label">Gender</label>
                  <select id="inputState" class="form-select">
                    <option selected>Choose...</option>
                    <option>...</option>
                  </select>
                </div>
              </div>
              <div class="row g-3 py-2">
                <div class="col-md-4">
                  <label for="inputAddress" class="form-label">Address</label>
                <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
                </div>
                <div class="col-md-4">
                  <label for="inputState" class="form-label">Province</label>
                  <select id="inputState" class="form-select">
                    <option selected>Choose...</option>
                    <option>...</option>
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
                <label for="inputAddress" class="form-label">Email Address</label>
                <input type="text" class="form-control" id="inputAddress" placeholder="abc@gmail.com">
              </div>
              <div class="row g-3 py-2">
                <div class="col-md-6">
                  <label for="inputAddress2" class="form-label">Mobile No.</label>
                  <input type="text" class="form-control" id="inputAddress2" placeholder="98########">
                </div>
                <div class="col-md-6">
                  <label for="inputCity" class="form-label">Occupation</label>
                  <input type="text" class="form-control" id="inputCity">
                </div>
              </div>
              <div class="row g-3 py-4">
                <div class="col-md-6">
                  <h5 class="pb-0 mb-2 fst-regular">
                    Select Health Conditions
                  </h5>
                  <hr>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                      Normal Health Condition
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                    <label class="form-check-label" for="flexCheckChecked">
                      Blood Pressure (HIGH/LOW)
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                    <label class="form-check-label" for="flexCheckChecked">
                      Heart Disease
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                      Chronic Kidney Disease
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                    <label class="form-check-label" for="flexCheckChecked">
                      Tuberculosis (TB)
                    </label>
                  </div>
                  
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                    <label class="form-check-label" for="flexCheckChecked">
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
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" >
                    <label class="form-check-label" for="flexRadioDefault1">
                      Yes
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
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
                    <label for="inputEmail4" class="form-label">Plate No.</label>
                    <input type="email" class="form-control" id="inputEmail4">
                  </div>
                  <div class="col-md-4">
                    <label for="inputPassword4" class="form-label">Vehicle Type</label>
                    <input type="password" class="form-control" id="inputPassword4">
                  </div>
                  <div class="col-md-4">
                    <label for="inputPassword4" class="form-label">Model</label>
                    <input type="password" class="form-control" id="inputPassword4">
                  </div>
                </div>
                <div class="row g-3 py-2">
                  <div class="col-md-4">
                    <label for="inputEmail4" class="form-label">Engine No.</label>
                    <input type="email" class="form-control" id="inputEmail4">
                  </div>
                  <div class="col-md-4">
                    <label for="inputPassword4" class="form-label">Color</label>
                    <input type="password" class="form-control" id="inputPassword4">
                  </div>
                  <div class="col-md-4">
                    <label for="inputPassword4" class="form-label">Power</label>
                    <input type="password" class="form-control" id="inputPassword4">
                  </div>
                </div>
                <hr>
                <h4><b>Fine Fillup</b></h4>
                <hr>
                  <div class="row g-3">
                    <div class="col-md-6">
                      <label for="inputAddress2" class="form-label">Driving License No.</label>
                      <input type="text" class="form-control" id="inputAddress2">
                    </div>
                    <div class="col-md-6">
                      <label for="inputCity" class="form-label">No. of Passengers</label>
                      <input type="text" class="form-control" id="inputCity">
                    </div>
                  </div>
                  <div class="row g-3 py-2">
                    <div class="col-md-6">
                      <label for="inputAddress2" class="form-label">Place</label>
                      <input type="text" class="form-control" id="inputAddress2">
                    </div>
                    <div class="col-md-6">
                      <label for="inputCity" class="form-label">Time</label>
                      <input type="text" class="form-control" id="inputCity">
                    </div>
                  </div>
                  <div class="row g-3 py-2">
                    <div class="col-md-12">
                      <label for="inputState" class="form-label">Reason for fine</label>
                      <select id="inputState" class="form-select">
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