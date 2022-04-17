<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\TrafficRules;
use App\Models\Challan;
use Illuminate\Support\Facades\Hash;

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
        return view('front.challan');
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
