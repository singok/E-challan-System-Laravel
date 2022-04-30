<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.88.1">
  <title>Invoice</title>

  <link type="text/css" rel="stylesheet" href="{{ asset('css/style.css') }}">
  <link rel="icon" type="image/x-icon" href="{{ asset('images/fornt-logo/nepal-govt.png') }}">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

</head>

<body>
    <div class="front-row">
        <div class="item gov-logo">
          <img src="{{ asset('images/fornt-logo/nepal-govt.png') }}" alt="logo" class="logos">
        </div>
    
        <div class="item gov-title">
          <div class="title">
            <span class="welcome-message">नेपाल सरकारको आधिकारिक पोर्टल</span>
            <br>
            <span class="welcome-message">The Official Portal of Government of Nepal for e-Challan</span>
            <br>
            <span class="web-address">NEPALTRAFFIC.GOV.NP</span>
          </div>
        </div>
    
        <div class="item flag-logo">
          <img src="{{ asset('images/fornt-logo/R.png') }}" alt="logo" class="logos">
        </div>
    
      </div>
    
      <div class="container d-flex justify-content-center mt-50 mb-50">
        <div class="row">
            <div class="col-md-12">
                <div class="card mt-5">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="mb-4 pull-left">
                                    <h6>OFFICE OF NEPAL TRAFFIC POLICE</h6>
                                    <ul class="list list-unstyled mb-0 text-left">
                                        <li>Singha Durbar</li>
                                        <li>Kathmandu, Nepal</li>
                                        <li>+977-1-4219641</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-sm-4">
                            </div>
                            <div class="col-sm-4">
                                <div class="mb-4 ">
                                    <div class="text-sm-right">
                                        <h4 class="invoice-color mb-2 mt-md-2">Invoice #BBB1243</h4>
                                        <ul class="list list-unstyled mb-0">
                                            <li>Date: <span class="font-weight-semibold">{{ Carbon\Carbon::now()->format('d-M-Y') }}</span></li>
                                            
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="d-md-flex flex-md-wrap">
                            <div class="mb-4 mb-md-2 text-left"> <span class="text-muted">Invoice To:</span>
                                <ul class="list list-unstyled mb-0">
                                    <li>
                                        <h5 class="my-2">{{ $heading->fname." ".$heading->mname." ".$heading->lname }}</h5>
                                    </li>
                                    <li>Driving License No. : {{ $heading->driving_license }}</li>
                                    <li>Sex : {{ $heading->gender }}</li>
                                    <li>Address : {{ $heading->address }}</li>
                                    <li>Province & district : {{ $heading->province.", ".$heading->district }}</li>
                                    <li>Email : {{ $heading->email }}</li>
                                    <li>Phone No. : {{ $heading->phone }}</li>
                                    <li>Occupation : {{ $heading->occupation }}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table-lg">
                            <thead>
                                <tr>
                                    <th>S.N.</th>
                                    <th>Description</th>
                                    <th>Registered Date</th>
                                    <th>Created By</th>
                                    <th>Fine Amt(Rs.)</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $count = 1;
                                @endphp
                                @foreach ($dataInfo as $info)
                                    <tr>
                                        <td>{{ $count++ }}</td>
                                        <td>
                                            <h6 class="mb-0">{{ $info->fine_reason }}</h6> 
                                            <span class="text-muted">
                                                Was found riding <label id="challan_values">{{ $info->category }}</label> category vehicle with <label id="challan_values">{{ $info->passenger_no }}</label> passenger/s at <label id="challan_values">{{ $info->time }}</label> in <label id="challan_values">{{ $info->place }}</label>. With regards to vehicle details, the vehicle model was <label id="challan_values">{{ strtolower($info->model) }}</label> and it was <label id="challan_values">{{ strtolower($info->color) }}</label> colored which was having <label id="challan_values">{{ $info->power }}</label> powered <label id="challan_values">{{ $info->engine_no }}</label> engine. 
                                                @php
                                                    if($info->disability == 'Yes') {
                                                        echo "At that time, the person was having health issues like <label id='challan_values'>".strtolower(rtrim($info->health_condition,", "))."</label>.";
                                                    } else {
                                                        echo "At that time, the person was in <label id='challan_values'>".strtolower(rtrim($info->health_condition, ", "))."</label> state.";
                                                    }
                                                @endphp 
                                            </span>
                                        </td>
                                        <td>{{ Carbon\Carbon::parse($info->created_at)->format('d-M-Y') }}</td>
                                        <td>{{ $info->traffic_name }}</td>
                                        <td><span class="font-weight-semibold">{{ $info->fine_amount }}</span></td>
                                    </tr>
                                @endforeach
                                
                            </tbody>
                        </table>
                    </div>
                    <div class="card-body">
                        <div class="d-md-flex flex-md-wrap">
                            <div class="pt-2 mb-3 wmin-md-400 ml-auto">
                                <h6 class="mb-3 text-left"><b>Amount to be paid</b></h6>
                                <div class="table-responsive">
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <th class="text-left">Total Receivable : </th>
                                                <td class="text-right text-dark">
                                                    <h5 class="font-weight-bold">{{ $total_amount }}</h5>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <div class="card-footer"> <span class="text-muted">This is computer generated invoice.</span> </div>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
    integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
    integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous">
  </script>
</body>

</html>