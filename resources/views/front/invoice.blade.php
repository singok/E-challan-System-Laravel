<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.88.1">
  <title>Invoice</title>

  <style>
      
        /* challan values */
        #challan_values {
            font-style: italic;
            font-weight: bold;
        }

        .list_item {
            list-style: none;
            font-family: 'Times New Roman', Times, serif;
            font-size: 15px;
        }
        .main_heading {
            text-align: center;
            margin-bottom: 40px;
        }
        #traffic {
            margin-bottom: 0px;
        }
        .invoice-heading-left {
            width: 70%;
            float: left;
            height: 130px;
        }
        .invoice-heading-right {
            width: 30%;
            float: left;
            height: 130px;
        }
        .wrapp-headings {
            margin: 0;
            padding: 0;
        }
        .blank {
            width: 65%;
            float: left;
            height: 30px;
        }
        .receivable {
            margin-top: 10px;
            float: left;
            width: 35%;
            height: 30px;
            font-size: 16px;
        }
        .footer {
            text-align: left;
            font-size: 15px;
            margin-top: 70px;
        }
        .reason {
            padding:10px;
            font-size: 15px;
            font-weight: bold;
        }
        .reason_details {
            font-size: 15px;
            padding:10px;
        }
        .subtitle {
            font-size: 15px;
        }


  </style>
</head>

<body>
    <div class="main_heading">
        <h3 id="traffic">NEPAL TRAFFIC POLICE</h3>
        <p class='subtitle'><u>NEPALTRAFFIC.GOV.NP</u></p>
    </div>
    <hr>
    <div class="wrap-headings">
        <div class="invoice-heading-left">
            <h3>Department of Traffic Control</h3>
            <ul class="list_item">
                <li>Singha Durbar</li>
                <li>Kathmandu, Nepal</li>
                <li>+977-1-4219641</li>
            </ul>
        </div>
        <div class="invoice-heading-right">
            <h3>Invoice #BBB1243</h3>
            Date : {{ Carbon\Carbon::now()->format('d-M-Y') }}
        </div>
    </div>
    <div> <h3>Invoice To:</h3>
        <ul class="list_item">
            <li>
                <h3>{{ $heading->fname." ".$heading->mname." ".$heading->lname }}</h3>
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
      
    <table class="invoice_table" border="1px solid" cellspacing="0" cellpadding="5px">
        <thead>
            <tr>
                <th>S.N.</th>
                <th>Description</th>
                <th>Created At</th>
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
                        <span class="reason">{{ $info->fine_reason }}</span> <br>
                        <div class="reason_details">
                            Was found riding <label id="challan_values">{{ $info->category }}</label> category vehicle with <label id="challan_values">{{ $info->passenger_no }}</label> passenger(s) at <label id="challan_values">{{ $info->time }}</label> in <label id="challan_values">{{ $info->place }}</label>. With regards to vehicle details, the vehicle model was <label id="challan_values">{{ strtolower($info->model) }}</label> and it was <label id="challan_values">{{ strtolower($info->color) }}</label> colored which was having <label id="challan_values">{{ $info->power }}</label> powered <label id="challan_values">{{ $info->engine_no }}</label> engine. 
                            @php
                                if($info->disability == 'Yes') {
                                    echo "At that time, the person was having health issues like <label id='challan_values'>".strtolower(rtrim($info->health_condition,", "))."</label>.";
                                } else {
                                    echo "At that time, the person was in <label id='challan_values'>".strtolower(rtrim($info->health_condition, ", "))."</label> state.";
                                }
                            @endphp 
                        </div>
                    </td>
                    <td>{{ Carbon\Carbon::parse($info->created_at)->format('d-M-Y') }}</td>
                    <td><span class="subtitile">{{ $info->traffic_name }}</span></td>
                    <td><span class="subtitile">{{ $info->fine_amount }}</span></td>
                </tr>
            @endforeach
            
        </tbody>
    </table>

    <div class="blank"></div>
    <div class="receivable">
        Total Amount to be paid (Rs) : <b>{{ $total_amount }}</b>
    </div>  
    
    <div class="footer">This is computer generated invoice.</div> 

</body>

</html>