<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TrafficPolice;
use App\Models\TrafficRules;
use App\Models\Challan;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class TrafficController extends Controller
{
    // display traffic register page
    function registerTrafficDisplay()
    {
        return view('pages.dashboard-traffic-add');
    }

    // display rules register page
    function registerRulesDisplay()
    {
        return view('pages.dashboard-rules-add');
    }

    // display all available traffic police details
    function listTrafficPolice(Request $request)
    {
        $search = $request['search'] ?? "";
        if($search == "") {
            $data = TrafficPolice::select('id','image','firstname','lastname','gender','dob','email','phone','address1','address2','state','postcode','city')->SimplePaginate(5);
        } else {
            $data = TrafficPolice::where('firstname', 'LIKE', "%$search%")->orwhere('lastname', 'LIKE', "%$search%")->orwhere('gender', 'LIKE', "%$search%")->orwhere('email', 'LIKE', "%$search%")->orwhere('phone', 'LIKE', "%$search%")->orwhere('address1', 'LIKE', "%$search%")->orwhere('state', 'LIKE', "%$search%")->orwhere('city', 'LIKE', "%$search%")->SimplePaginate(5);
        }

        return view('pages.dashboard-traffic-list', ['dataInfo' => $data]);
    }

    // display dashboard
    function dashboard()
    {
        $policeCount = TrafficPolice::count();
        $rulesCount = TrafficRules::count();
        $challanCount = Challan::select('driving_license')->distinct('driving_license')->count();
        $trashPoliceCount = TrafficPolice::onlyTrashed()->count();
        $trashRulesCount = TrafficRules::onlyTrashed()->count();
        return view('pages.dashboard-home',['totalPolice' => $policeCount, 'totalRules' => $rulesCount, 
        'totalChallans' => $challanCount, 'trashPolice' => $trashPoliceCount, 'trashRules' => $trashRulesCount]);
    }

    // register new police
    function registerPolice(Request $request)
    {
        // validate
        $request->validate([
            'firstName' => 'required',
            'lastName' => 'required',
            'gender' => 'required',
            'birthDate' => 'required',
            'email' => 'required | unique:trafficpolice',
            'phone' => 'required | unique:trafficpolice',
            'addressFirst' => 'required',
            'state' => 'required',
            'image' => 'file | required | mimes:jpg',
            'postcode' => 'required',
            'city' => 'required',
            'user_id' => 'required | unique:trafficpolice',
            'user_password' => 'required'
        ]);
        $traffic = new TrafficPolice();

        // data insert
        $traffic->firstname = $request['firstName'];
        $traffic->lastname = $request['lastName'];
        $traffic->gender = $request['gender'];
        $traffic->dob = $request['birthDate'];
        $traffic->email = $request['email'];
        $traffic->phone = $request['phone'];
        $traffic->address1 = $request['addressFirst'];
        $traffic->address2 = $request['addressSecond'];
        $traffic->state = $request['state'];
        $traffic->postcode = $request['postcode'];
        $traffic->city = $request['city'];
        $traffic->user_id = $request['user_id'];
        $traffic->user_password = Hash::make($request['user_password']);

        // image upload
        $temp = $request->file('image');
        $filename = date('YmdHi').$temp->getClientOriginalName();
        $temp->move(public_path('images/faces') , $filename);
        $traffic->image = $filename;

        $feedback = $traffic->save();

        if($feedback) {
            return back()->with('success', "New traffic police has been added successfully !");
        } else {
            return back()->with('failure',"Couldn't register new traffic police !");
        }
    }

    // register new rules
    function registerRules(Request $request)
    {
        // validate
        $request->validate([
            'rule_no' => 'required | unique:trafficrules',
            'rule_description' => 'required | unique:trafficrules',
            'penalty_point' => 'required'
        ]);

        $traffic = new TrafficRules();

        // data insert
        $traffic->rule_no = $request['rule_no'];
        $traffic->rule_description = $request['rule_description'];
        $traffic->penalty_point = $request['penalty_point'];
        $feedback = $traffic->save();

        if($feedback) {
            return back()->with('success', "New rule has been added successfully !");
        } else {
            return back()->with('failure',"Couldn't add new rule !");
        }
    }

    // list all the available traffic Rules
    function listTrafficRules(Request $request)
    {
        $search = $request['search'] ?? "";
        if($search == "") {
            $data = TrafficRules::select('id','rule_no','rule_description','penalty_point')->SimplePaginate(5);
        } else {
            $data = TrafficRules::where('rule_no', 'LIKE', "$search%")->orwhere('rule_description', 'LIKE', "%$search%")->orwhere('penalty_point', 'LIKE', "$search%")->SimplePaginate(5);
        }

        return view('pages.dashboard-rules-list', ['dataInfo' => $data]);
    }

    // delete traffic details
    function deleteTraffic($id)
    {
        $data =  TrafficPolice::find($id)->delete();
        if($data) {
            return back()->with('success', "Traffic Police moved to Trash successfully.");
        } else {
            return back()->with('failure', "Not able to delete Traffic police.");
        }
    }

    // delete traffic rule
    function deleteRule($id)
    {
        $data = TrafficRules::find($id)->delete();
        if($data) {
            return back()->with('success', "Traffic Rule moved to Trash successfully.");
        } else {
            return back()->with('failure', "Not able to delete Traffic Rule.");
        }
    }

    // show update form with traffic details
    function updateTrafficDetails($id)
    {
        $data = DB::table('trafficpolice')->where('id', $id)->select('id','firstname','lastname','gender','dob','email','phone','address1','address2','state','postcode','city')->first();
        return view('pages.traffic-update', ['dataInfo' => $data]);
    }

    // update traffic details
    function trafficDetailsUpdate($id, Request $request)
    {
        // validate
        $request->validate([
            'firstName' => 'required',
            'lastName' => 'required',
            'gender' => 'required',
            'birthDate' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'addressFirst' => 'required',
            'state' => 'required',
            'postcode' => 'required',
            'city' => 'required'
        ]);
        $traffic = TrafficPolice::firstWhere('id', $id);

        // data update
        $traffic->firstname = $request['firstName'];
        $traffic->lastname = $request['lastName'];
        $traffic->gender = $request['gender'];
        $traffic->dob = $request['birthDate'];
        $traffic->email = $request['email'];
        $traffic->phone = $request['phone'];
        $traffic->address1 = $request['addressFirst'];
        $traffic->address2 = $request['addressSecond'];
        $traffic->state = $request['state'];
        $traffic->postcode = $request['postcode'];
        $traffic->city = $request['city'];
        $feedback = $traffic->save();

        if($feedback) {
            return back()->with('success', "Traffic Details has been updated successfully !");
        } else {
            return back()->with('failure',"Couldn't update the traffic details !");
        }
    }

    // display traffic rules edit form
    function updateTrafficRules($id)
    {
        $data = DB::table('trafficrules')->where('id', $id)->first();
        return view('pages.traffic-rules-update', ['dataInfo' => $data]);
    }

    // update traffic rules details
    function trafficRulesUpdate($id, Request $request)
    {
        // validate
        $request->validate([
            'rule_no' => 'required',
            'rule_description' => 'required',
            'penalty_point' => 'required'
        ]);

        $traffic = TrafficRules::firstWhere('id', $id);

        // new data
        $traffic->rule_no = $request['rule_no'];
        $traffic->rule_description = $request['rule_description'];
        $traffic->penalty_point = $request['penalty_point'];
        $feedback = $traffic->save();

        if($feedback) {
            return back()->with('success', "New rule has been added successfully !");
        } else {
            return back()->with('failure',"Couldn't add new rule !");
        }
    }

}
