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

        $data = DB::table('challan')->where('driving_license', '=', $search)->first();
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
                                                    Phone No.
                                                </th>
                                                <th>
                                                    Challan
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
                                                        $data->full_name
                                                    .'
                                                    </td>
                                                    <td>'.
                                                        $data->contact_no
                                                    .'
                                                    </td>
                                                    <td>'.
                                                        $data->file
                                                    .'
                                                    </td>
                                                    <td>
                                                        <div class="btn-group" role="group" aria-label="Basic example">
                                                            <a href="'.asset("echallans").'/'.$data->file.'" download><button
                                                                    type="button"
                                                                    class="btn btn-success btn-rounded btn-fw">Download</button></a>
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
        $provinceData = Province::select('name')->distinct()->get();

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
            'inputFirstName' => 'required',
            'inputLastName' => 'required'

        ]);

        $challan = new Challan();

        // personal detail
        $challan->fname = $request->inputFirstName;
        $challan->mname = $request->inputMiddleName;
        $challan->lname = $request->inputLastName;
        $challan->gender = $request->inputGender;
        $challan->address = $request->inputAddress;
        $challan->province = $request->inputProvince;
        $challan->district = $request->inputDistrict;
        $challan->email = $request->inputEmail;
        $challan->phone = $request->inputMobile;
        $challan->occupation = $request->inputOccupation;
        $challan->health_condition = $request->inputHealthCondition;
        $challan->disability = $request->inputDisability;

        // vehicle detail
        $challan->model = $request->inputModel;
        $challan->category = $request->inputCategory;
        $challan->engine_no = $request->inputEngineNo;
        $challan->color = $request->inputColor;
        $challan->power = $request->inputPower;

        // fine fillup
        $challan->driving_license = $request->inputLicenseNo;
        $challan->passenger_no = $request->inputPassengerNo;
        $challan->place = $request->inputPlace;
        $challan->time = $request->inputTime;
        $challan->police_brit = $request->inputPoliceGate;
        $challan->fine_reason = $request->inputReason;

        $challan->save();

        if($challan) {
            echo "Challan Registered Successfully";
        } else {
            echo "Couldn't register challan";
        }
    }

    // display district
    function displayDistrict(Request $request)
    {
        // get district names
        $data = DB::table('province')->select('district')->where('name', $request->province)->get();

        $value = "";
        if($data) {
            $value .="<option value='' selected>Choose...</option>";
            foreach($data as $val) {
                $value .= "<option value='".$val->district."'>".$val->district."</option>";
            }
            echo $value;
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
                $request->session()->put('username', $userInfo->firstname);
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
