<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\TrafficRules;
use App\Models\Challan;
use Illuminate\Support\Facades\Hash;
use App\Models\Province;
use App\Models\Vehicle;

class FrontController extends Controller
{
    // display rule page
    function rulePage() 
    {
        $rule = new TrafficRules();
        $data = $rule::select('rule_no','rule_description')->SimplePaginate(5);
        return view('front.rules', ['dataInfo' => $data]);
    }

    // display verification page
    function verificationPage(Request $request)
    {
        $search = $request['driving_license'] ?? "";

        $data = DB::table('challan')->select('fname','mname','lname','driving_license','address','province','phone')->where('driving_license', '=', $search)->first();
        if($data) {
            $message = "";
            $value = '
                <div class="row">
                    <div class="col-lg-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Challan Details</h4>
                                <p class="card-description">
                                    Please, kindly visit the office along with the hard copy of this document.
                                </p>
                                <div class="table-responsive">
                                    <table class="display table-striped expandable-table dataTable" style="width: 100%;" role="grid">
                                        <thead>
                                            <tr>
                                                <th>
                                                    Driving License No.
                                                </th>
                                                <th>
                                                    Full Name
                                                </th>
                                                <th>
                                                    Address
                                                </th>
                                                <th>
                                                    Province
                                                </th>
                                                <th>
                                                    Phone No.
                                                </th>
                                                <th>
                                                    Action
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- list all challans detials-->
                                                <tr>
                                                    <td>'.
                                                        $data->driving_license
                                                    .'
                                                    </td>
                                                    <td>'.
                                                        $data->fname." ".$data->mname." ".$data->lname
                                                    .'
                                                    </td>
                                                    <td>'.
                                                        $data->address
                                                    .'
                                                    </td>
                                                    <td>'.
                                                        $data->province
                                                    .'
                                                    </td>
                                                    <td>'.
                                                        $data->phone
                                                    .'
                                                    </td>
                                                    <td>
                                                        <div class="btn-group" role="group" aria-label="Basic example">
                                                            <a href="#"><button
                                                                    type="button"
                                                                    class="btn btn-primary btn-rounded btn-fw">Show more</button></a>
                                                        </div>
                                                    </td>
                                                </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                
                        </div>
                    </div>
                </div>

                ';

            return view('front.verification', ['dataInfo' => $value, 'feedback' => $message]);
        } else {
            if($search == "") {
                $message = "";
            } else {
                $message = "No record found with the specified driving license number.";
            }
            $value = "";
            return view('front.verification', ['dataInfo' => $value, 'feedback' => $message]);
        }
    }

    // display challan page
    function challanPage() 
    {
        // get province data 
        $provinceData = Province::select('province')->get();

        // get vehicle data
        $vehicleData = Vehicle::select('category')->get();

        // get rules data
        $rulesData = TrafficRules::select('rule_description')->get();

        return view('front.challan', ['dataInfo' => $provinceData, 'vehicleInfo' => $vehicleData, 'rulesInfo' => $rulesData]);
    }

    // challan details insert
    function submitChallan(Request $request)
    {
        // validate
        $request->validate([
            'firstName' => 'required',
            'lastName' => 'required',
            'gender' => 'required',
            'address' => 'required',
            'province' => 'required',
            'district' => 'required',
            'email' => 'required | email',
            'phoneNumber' => 'required',
            'occupation' => 'required',
            'disability' => 'required',
            'model' => 'required',
            'category' => 'required',
            'engineNo' => 'required',
            'color' => 'required',
            'power' => 'required',
            'licenseNo' => 'required',
            'passengerCount' => 'required',
            'place' => 'required',
            'time' => 'required',
            'policeGate' => 'required',
            'reason' => 'required'
        ]);
        
        $challan = new Challan();
       
        // personal detail
        $challan->fname = $request->firstName;
        $challan->mname = $request->middleName;
        $challan->lname = $request->lastName;
        $challan->gender = $request->gender;
        $challan->address = $request->address;
        $challan->province = $request->province;
        $challan->district = $request->district;
        $challan->email = $request->email;
        $challan->phone = $request->phoneNumber;
        $challan->occupation = $request->occupation;

        // health condition
        $val = "";
        foreach($request->healthCondition as $data) {
            $val .= $data.",";
        }
        $challan->health_condition = $val;

        $challan->disability = $request->disability;

        // vehicle detail
        $challan->model = $request->model;
        $challan->category = $request->category;
        $challan->engine_no = $request->engineNo;
        $challan->color = $request->color;
        $challan->power = $request->power;

        // fine fillup
        $challan->driving_license = $request->licenseNo;
        $challan->passenger_no = $request->passengerCount;
        $challan->place = $request->place;
        $challan->time = $request->time;
        $challan->police_brit = $request->policeGate;
        $challan->fine_reason = $request->reason;
        
        // fine amount
        $fine = DB::table('trafficrules')->select('penalty_point')->where('rule_description', $request->reason)->first();
        $challan->fine_amount = $fine->penalty_point;

        // police name
        $challan->traffic_name = session('username');

        $challan->save();

        if($challan) {
            return back()->with('success','Challan registered successfully !');
        } else {
            return back()->with('failure','Something went wrong !');
        }
    }

    // display district
    function displayDistrict(Request $request)
    {   
        $value = "";
        if($request->province != "") {

            // get province id 
            $provinceID = DB::table('province')->select('pid')->where('province', $request->province)->first();

            // get district names
            $data = DB::table('district')->where('province_id', $provinceID->pid)->get();

            
            if($data) {
                $value .="<option value='' selected>Choose...</option>";
                foreach($data as $val) {
                    $value .= "<option value='".$val->district."'>".$val->district."</option>";
                }
                echo $value;
            }

        } else {
            echo $value;
        }

    }

    // display category details
    function displayCategoryDetails(Request $request)
    {
        // get district names
        $data = DB::table('vehicle')->select('details')->where('category', $request->category)->first();

        $value = "";
        if($data) {
            $value .= $data->details;
            echo $value;
        } else {
            echo $value;
        }
    }

    // display traffic login page
    function trafficLogin()
    {
        return view('front.traffic-login');
    }

    // display admin login page
    function adminLogin()
    {
        return view('front.admin-login');
    }

    // display admin forget page
    function adminForget()
    {
        return view('front.admin-forgetpassword');
    }

    // display traffic forget page
    function trafficForget()
    {
        return view('front.traffic-forgetpassword');
    }

    // check traffic login details
    function verifyTraffic(Request $request) 
    {
        // validate
        $request->validate([
            'user_id' => 'required',
            'user_password' => 'required'
         ]);

         // check
         $userInfo = DB::table('trafficpolice')->where('user_id', $request['user_id'])->first();
         if($userInfo) {
            // password check
            if(Hash::check($request['user_password'], $userInfo->user_password)) {
                $request->session()->put('username', $userInfo->firstname." ".$userInfo->lastname);
                return redirect()->route('challanpage');
            } else {
                return back()->with('failure', "You have entered incorrect password !");
            }
         } else {
             return back()->with('failure', "Couldn't recognized the Traffic id.");
         }
    }

    // logout traffic
    function logoutTraffic()
    {
        if(session()->has('username')) {
            // destroy session
            session()->pull('username');
            return redirect()->route('trafficlogin');
        }
    }
}
